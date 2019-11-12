<?php
@include_once "../model/Person.php";
@include_once "../model/Login.php";

function insertPerson(Person $person)
{
    $connection = mysqli_connect("localhost", "root", "bulbul", "event_organizer");
    if (!$connection) {
        return -1;
    }
    $query = "INSERT INTO person ( user_name, name, email, phone, password, address, status) 
    VALUES ('" . $person->getUsername() . "' ,'" . $person->getName() . "' , '" . $person->getEmail() . "', '" . $person->getPhone() . "', '" . $person->getPassword() . "', '" . $person->getAddress() . "',1)";
    if (mysqli_query($connection, $query)) {
        return 1;
    } else {
        return 0;
    }
    mysqli_close($connection);
}

function loginPerson(Login $login)
{
    $connection = new PDO("mysql:host=localhost; dbname=event_organizer", "root", "bulbul");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * from person where user_name = '" . $login->getUsername() . "' and password = '" . $login->getPassword() . "'";
    $statement = $connection->prepare($query);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $result = $statement->fetch(PDO::FETCH_OBJ);
        return $result;
    } else {
        return null;
    }
}
function updatePerson(Person $person)
{
    $connection = new PDO("mysql:host=localhost; dbname=event_organizer", "root", "bulbul");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "update person set name = '" . $person->getName() . "' , email = '" . $person->getEmail() . "', phone = '" . $person->getPhone() . "',address = '" . $person->getAddress() . "' where user_name = '" . $person->getUsername() . "'";
    $statement = $connection->prepare($query);
    $result = $statement->execute();
    return $result;
}
function updatePassword($username, $newPassword)
{
    $connection = new PDO("mysql:host=localhost; dbname=event_organizer", "root", "bulbul");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "update person set password = '" . $newPassword . "'  where user_name = '" . $username . "'";
    $statement = $connection->prepare($query);
    $result = $statement->execute();
    return $result;
}

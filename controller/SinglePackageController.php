<?php
include_once "../model/SinglePackage.php";

function getAllCaterers()
{
    $connection = new PDO("mysql:host=localhost; dbname=event_organizer", "root", "bulbul");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * from single_package where category = '".Caterers."'";
    $statement = $connection->prepare($query);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $result = $statement->fetch(PDO::FETCH_OBJ);
        return $result;
    } else {
        return null;
    }
}

<?php
include_once "../model/SinglePackage.php";

function getAllPackage(){
    $connection = new PDO("mysql:host=localhost; dbname=event_organizer", "root", "bulbul");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * from single_package";
    
}
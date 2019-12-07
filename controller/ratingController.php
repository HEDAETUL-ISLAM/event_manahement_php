<?php
include_once "../model/Rating.php";

function insertRating(Rating $rating)
{
    $connection = mysqli_connect("localhost", "root", "bulbul", "event_organizer");
    $query = "INSERT INTO rating(package_name, vendor_username, customer_name, rating) 
        VALUES(
            '" . $rating->getPackage_name() . "',
            '" . $rating->getVendor_name() . "',
            '" . $rating->getCustomer_name() . "',
            '" . $rating->getRating() . "'
            )";
    mysqli_query($connection, $query);
}

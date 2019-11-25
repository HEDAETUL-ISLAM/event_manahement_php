<?php
@include_once "../model/booking.php";

function insertBookingDetails(Booking $booking)
{
    $connection = mysqli_connect("localhost", "root", "bulbul", "event_organizer");
    if (!$connection) {
        return -1;
    } else {
        $query = "INSERT INTO booking ( username, email, phone, address, bookingdate, vendorname, packagename, totalcost, halfpaid, fullpaid)
        VALUES ('" . $booking->getUsername() . "' ,'" . $booking->getEmail() . "' ,'" . $booking->getPhone() . "' ,'" . $booking->getAddress() . "' ,'" . $booking->getBookingDate() . "' ,'" . $booking->getVendorName() . "' ,'" . $booking->getPackageName() . "' ,'" . $booking->getTotalCost() . "' ,'" . $booking->getHalfPaid() . "' ,'" . $booking->getFullPaid() . "' )";
        if (mysqli_query($connection, $query)) {
            return 1;
        } else {
            return 0;
        }
    }
    mysqli_close($connection);
}

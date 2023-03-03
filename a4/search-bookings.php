<?php

$bookingData = [];

function searchBookings()
{

    global $bookingData;

    $email = $_POST['search']['email'];
    $mobile = $_POST['search']['mobile'];
    $foundEmail = false;
    $foundMobile = false;

    $bookings = fopen('bookings.txt', 'r');

    while (($line = fgets($bookings)) !== false) {

        echo $line;

        $foundEmail = false;
        $foundMobile = false;

        $values = explode(',', $line);

        foreach ($values as $value) {
            if ($value === $email) {
                $foundEmail = true;
            }
            if ($value === $mobile) {
                $foundMobile = true;
            }
            if ($foundEmail && $foundMobile) {
                $bookingData = $values;
                return true;
            }
        }
    }

    fclose($bookings);

    if (!$foundEmail || !$foundMobile) {
        return false;
    }
}

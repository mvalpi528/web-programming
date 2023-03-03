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
                $bookingData['order-date'] = $values[0];
                $bookingData['name'] = $values[1];
                $bookingData['email'] = $values[2];
                $bookingData['mobile'] = $values[3];
                $bookingData['movie-code'] = $values[4];
                $bookingData['day-of-movie'] = $values[5];
                $bookingData['time-of-movie'] = $values[6];
                $bookingData['#STA'] = $values[7];
                $bookingData['$STA'] = $values[8];
                $bookingData['#STP'] = $values[9];
                $bookingData['$STP'] = $values[10];
                $bookingData['#STC'] = $values[11];
                $bookingData['$STC'] = $values[12];
                $bookingData['#FCA'] = $values[13];
                $bookingData['$FCA'] = $values[14];
                $bookingData['#FCP'] = $values[15];
                $bookingData['$FCP'] = $values[16];
                $bookingData['#FCC'] = $values[17];
                $bookingData['$FCC'] = $values[18];
                $bookingData['Total'] = $values[19];
                $bookingData['GST'] = $values[20];


                return true;
            }
        }
    }

    fclose($bookings);


    return false;
}

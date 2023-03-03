<?php
include('tools.php');
include('search-bookings.php');
searchBookings();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <link rel="stylesheet" type="text/css" href="receipt.css">
    <script src='../wireframe.js'></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Questrial&display=swap' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>
    <title>Current Bookings</title>
</head>

<body>
    <?php

    generateHeader();

    if (searchBookings()) {

    ?>
        <h1 id="search-heading">Your booking details</h1>
        <div class="container">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Booking date: <?php echo $bookingData['order-date']; ?>
                                </td>
                                <td class="title">

                                </td>


                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Lunardo Cinemas<br />
                                    Address: 132 main st, Lunardo, NSW<br />
                                    Phone: 9876 5432<br>
                                    Email: contact_us@lunardocinemas.com<br>

                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php echo $bookingData['name'] ?><br />
                                    <?php echo $bookingData['email'] ?><br />
                                    <?php echo $bookingData['mobile'] ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="heading">
                    <td>Movie</td>
                    <td></td>
                    <td></td>
                    <td><?php echo $bookingData['movie-code']  ?></td>
                </tr>

                <tr class="details">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr class="heading">
                    <td>Seat type</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Subtotal</td>
                </tr>



                <tr class="item">
                    <td>Standard Adult</td>


                    <td><?php echo $bookingData['#STA'] ?></td>
                    <td><?php echo $bookingData['$STA'] ?></td>
                    <td><?php echo '$' . floatval(str_replace('$', '', $bookingData['$STA']) * $bookingData['#STA']) ?></td>
                </tr>

                <tr class="item">



                    <td>Standard Concession</td>
                    <td><?php echo $bookingData['#STP'] ?></td>
                    <td><?php echo $bookingData['$STP'] ?></td>
                    <td><?php echo '$' . floatval(str_replace('$', '', $bookingData['$STP']) * $bookingData['#STP']) ?></td>
                </tr>

                <tr class="item">

                    <td>Standard Child</td>
                    <td><?php echo $bookingData['#STC'] ?></td>
                    <td><?php echo $bookingData['$STC'] ?></td>
                    <td><?php echo '$' . floatval(str_replace('$', '', $bookingData['$STC']) * $bookingData['#STC']) ?></td>
                </tr>

                <tr class="item">

                    <td>First Class Adult</td>
                    <td><?php echo $bookingData['#FCA'] ?></td>
                    <td><?php echo $bookingData['$FCA'] ?></td>
                    <td><?php echo '$' . floatval(str_replace('$', '', $bookingData['$FCA']) * $bookingData['#FCA']) ?></td>
                </tr>

                <tr class="item">


                    <td>First Class Concession</td>
                    <td><?php echo $bookingData['#FCP'] ?></td>
                    <td><?php echo $bookingData['$FCP'] ?></td>
                    <td><?php echo '$' . floatval(str_replace('$', '', $bookingData['$FCP']) * $bookingData['#FCP']) ?></td>
                </tr>

                <tr class="item last">
                    <td>First Class Child</td>
                    <td><?php echo $bookingData['#FCC'] ?></td>
                    <td><?php echo $bookingData['$FCC'] ?></td>
                    <td><?php echo '$' . floatval(str_replace('$', '', $bookingData['$FCC']) * $bookingData['#FCC']) ?></td>
                </tr>

                <tr class="total">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total: <?php echo $bookingData['Total'] ?></td>
                </tr>

                <tr class="item">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>GST: <?php echo $bookingData['GST'] ?></td>
                </tr>

            </table>
        </div>
    <?php
    }

    ?>


</body>

</html>
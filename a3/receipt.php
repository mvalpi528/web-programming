<?php
include('tools.php');

// To test if the reciept page is printer freindly try 'command p'

if (empty($_SESSION['movie'])) {
    header("Location: index.php");
    exit();
}

$priceData = calculatePrice();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>

    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <link rel="stylesheet" type="text/css" href="receipt.css">
    <script src='../wireframe.js'></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Questrial&display=swap' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>



</head>

<body>
    <?php generateHeader(); ?>

    <div class="container">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Ticket number: <?php echo $ticketNumber ?><br />
                                Created: <?php echo date('d/m/y'); ?>
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
                                <?php echo $_SESSION['user']['name'] ?><br />
                                <?php echo $_SESSION['user']['email'] ?><br />
                                <?php echo $_SESSION['user']['mobile'] ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Movie</td>
                <td></td>
                <td></td>
                <td><?php echo $moviesObject[$_SESSION['movie']]['title']  ?></td>
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
                <td><?php echo $_SESSION['standard-adult-seats'] ?></td>
                <td><?php echo '$' . $priceData['standard-adult-ticket-price'] ?></td>
                <td><?php echo '$' . $priceData['subtotal-standard-adult'] ?></td>
            </tr>

            <tr class="item">
                <td>Standard Concession</td>
                <td><?php echo $_SESSION['standard-concession-seats'] ?></td>
                <td><?php echo '$' . $priceData['standard-concession-ticket-price'] ?></td>
                <td><?php echo '$' . $priceData['subtotal-standard-concession'] ?></td>
            </tr>

            <tr class="item">
                <td>Standard Child</td>
                <td><?php echo $_SESSION['standard-child-seats'] ?></td>
                <td><?php echo '$' . $priceData['standard-child-ticket-price'] ?></td>
                <td><?php echo '$' . $priceData['subtotal-standard-child'] ?></td>
            </tr>

            <tr class="item">
                <td>First Class Adult</td>
                <td><?php echo $_SESSION['first-class-adult-seats'] ?></td>
                <td><?php echo '$' . $priceData['first-class-adult-ticket-price'] ?></td>
                <td><?php echo '$' . $priceData['subtotal-first-class-adult'] ?></td>
            </tr>

            <tr class="item">
                <td>First Class Concession</td>
                <td><?php echo $_SESSION['first-class-concession-seats'] ?></td>
                <td><?php echo '$' . $priceData['first-class-concession-ticket-price'] ?></td>
                <td><?php echo '$' . $priceData['subtotal-first-class-concession'] ?></td>
            </tr>

            <tr class="item last">
                <td>First Class Child</td>
                <td><?php echo $_SESSION['first-class-child-seats'] ?></td>
                <td><?php echo '$' . $priceData['first-class-child-ticket-price'] ?></td>
                <td><?php echo '$' . $priceData['subtotal-first-class-child'] ?></td>
            </tr>

            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td>Total: <?php echo '$' . $priceData['total-price'] ?></td>
            </tr>

            <tr class="item">
                <td></td>
                <td></td>
                <td></td>
                <td>GST: <?php echo '$' . number_format($priceData['GST'], 2, '.', ',') ?></td>
            </tr>

        </table>
    </div>

    <?php generateDebugModule() ?>




</body>

</html>
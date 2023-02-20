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


    <script src='../wireframe.js'></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Questrial&display=swap' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>

</head>

<body>
    <header>
        <h1>Lunardo Cinemas</h1>
    </header>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Ticket number: CHECK SPREADSHEET<br />
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
                <td>GST: <?php echo '$' . $priceData['GST'] ?></td>
            </tr>

        </table>
    </div>



    <aside id="debug">
        <hr>
        <h3>Debug Area</h3>
        <pre>
GET Contains:
<?php print_r($_GET) ?>
POST Contains:
<?php print_r($_POST) ?>
SESSION Contains:
<?php print_r($_SESSION) ?>
      </pre>
    </aside>

</body>

</html>
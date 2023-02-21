<?php
include('tools.php');
// if the form is submitted then the request method will be post

isValidMovieCode();

$errorMessages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // the script will only run once
  // the difference between include and require is that if the file that
  // is 'required' is not found then a fatal error is generated
  require_once('post-validation.php');
  if (!empty($_POST)) {
    validateBooking();
    $errorMessages = findBookingErrors();
  }

  // if there are no errors then add the post data to the session
  if (count($errorMessages) == 0) {
    $_SESSION = $_POST;
    $cells = generateCells();
    $outputToFile = fopen("bookings.txt", "a");
    flock($outputToFile, LOCK_EX);
    fputcsv($outputToFile, $cells, ",");
    flock($outputToFile, LOCK_UN);
    fclose($outputToFile);
    $ticketNumber++;
    header("Location: receipt.php");
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lunardo Booking Page</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
  <script src='../wireframe.js'></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100&display=swap" rel="stylesheet">
  <script src="script.js" defer></script>
</head>

<body>

  <?php
  if (!empty($_POST)) {
    // isDiscounted();
    // calculatePrice();
  } ?>

  <?php generateHeader(); ?>

  <nav>
    <div>
      <ul>
        <li><a href="index.php">Home</a></li>
      </ul>
    </div>
  </nav>

  <main>

    <div id="booking-banner-image">
      <div class="banner-image-container">
        <div class="banner-content-container">
          <div class="text-background">
            <h1 class="banner-title"><?php echo $moviesObject[$_GET['movie']]["title"]; ?></h1>
          </div>
        </div>


        <?php loadBannerImage($_GET['movie']); ?>

      </div>
    </div>

    <section id="trailer">

      <h3>Cast and crew</h3>

      <div class="container body-text">
        <?php loadCastAndCrew(); ?>
      </div>




      <h3>Synopsis</h3>
      <br>
      <p class="container body-text"><?php echo $moviesObject[$_GET['movie']]["synopsis"]; ?></p>
      <br>

      <?php loadTrailer(); ?>


    </section>

    <section id="form">

      <form action="booking.php?movie=ACT" target="_blank" class="booking_form" method="post">

        <h2>Book now</h2>
        <div class="form-container">

          <fieldset>
            <legend>Contact Information</legend>

            <label for="name">Name:</label>

            <input type="text" id="name" name="user[name]" required title="Name must include only letters" pattern="[-A-Za-z '.]{1,64}" value="<?php if (!empty($_POST['user']['name'])) {
                                                                                                                                                  echo $_POST['user']['name'];
                                                                                                                                                } ?>">

            <?php if (isset($errorMessages['user']['name'])) {
              echo $errorMessages['user']['name'];
            } ?>

            <label for="email">Email Address:</label>

            <input type="email" id="email" name="user[email]" required value="<?php if (!empty($_POST['user']['email'])) {
                                                                                echo $_POST['user']['email'];
                                                                              } ?>">

            <?php if (isset($errorMessages['user']['email'])) {
              echo $errorsMessages['user']['email'];
            } ?>

            <label for="mobile-number">Mobile Number:</label>

            <?php if (isset($errorMessages['user']['mobile'])) {
              echo $errorsMessages['user']['mobile'];
            } ?>

            <input type="tel" id="mobile-number" name="user[mobile]" required pattern="(\(04\)|04|\+614)( ?\d){8}" title="Please enter a valid Australian Mobile Number" value="<?php if (!empty($_POST['user']['mobile'])) {
                                                                                                                                                                                  echo $_POST['user']['mobile'];
                                                                                                                                                                                } ?>">

          </fieldset>

          <?php loadSessionTimes($_GET['movie']) ?>

          <fieldset>
            <legend>Seats</legend>
            <span class='error'><?php if (isset($errorMessages['seats'])) {
                                  echo $errorsMessages['seats'];
                                }  ?></span>
            <label for="standard-adult-seats">Standard Adult Seats</label>
            <select name="standard-adult-seats" id="standard-adult-seats" data-fullprice="21.5" data-discprice="16" onchange="calculatePrice()">
              <option value="0">please select</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>


            <label for="standard-concession-seats">Standard Concession Seats</label>
            <select name="standard-concession-seats" id="standard-concession-seats" data-fullprice="19" data-discprice="14.5" onchange="calculatePrice()">
              <option value="0">please select</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>


            <label for="standard-child-seats">Standard Child Seats</label>
            <select name="standard-child-seats" id="standard-child-seats" data-fullprice="17.5" data-discprice="13" onchange="calculatePrice()">
              <option value="0">please select</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>


            <label for="first-class-adult-seats">First Class Adult Seats</label>
            <select name="first-class-adult-seats" id="first-class-adult-seats" data-fullprice="31" data-discprice="25" onchange="calculatePrice()">
              <option value="0">please select</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>


            <label for="first-class-concession-seats">First Class Concession Seats</label>
            <select name="first-class-concession-seats" id="first-class-concession-seats" data-fullprice="28" data-discprice="23.5" onchange="calculatePrice()">
              <option value="0">please select</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>


            <label for="first-class-child-seats">First Class Child Seats</label>
            <select name="first-class-child-seats" id="first-class-child-seats" data-fullprice="25" data-discprice="22" onchange="calculatePrice()">
              <option value="0">please select</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>

          </fieldset>



          <input type="hidden" name="movie" value="<?php echo $_GET['movie'] ?>">





        </div>
        <button type="submit" class="submit-booking">Submit</button>

        <p id="total-price">Current Total:</p>
      </form>


    </section>



  </main>
  <?php generateFooter() ?>

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
ERRORS Contains:
<?php print_r($errorMessages) ?>
      </pre>
  </aside>

</body>

</html>
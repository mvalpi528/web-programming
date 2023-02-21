<?php
include('tools.php');
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lunardo Home Page</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
  <script src='../wireframe.js'></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href='https://fonts.googleapis.com/css?family=Questrial&display=swap' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100&display=swap" rel="stylesheet">
  <script src="script.js" defer></script>
</head>

<body>

  <?php generateHeader(); ?>

  <nav>
    <ul>
      <li><a href="#about-us">About Us</a></li>
      <li><a href="#seats-and-prices">Seats and prices</a></li>
      <li><a href="#now-showing">Now Showing</a></li>
      <!-- Bookings page defaults to Avatar -->
      <li><a href="booking.php?movie=ACT">Book</a></li>
    </ul>
  </nav>

  <main>




    <img src="../../media/couple-watching-movie.png" alt="Couple watching a movie" class="about-us-banner-image">


    <section id="about-us">
      <h2>About Us</h2>
      <div class="about_us_container">
        <div class="about_us_content_item">
          <h3>The Grand Re-Opening</h3>
          <br>
          <p class="container body-text"><em>After extensive improvements Lunardo cinema is reopening!</em></p>
          <p class="container body-text">Experience the latest movies in comfort and style without leaving town.</p>
        </div>
        <div class="about_us_content_item">
          <h3>What's New</h3>
          <br>
          <p class="container body-text">Enjoy your cinema experience in either our standard or first class seats</p>
          <p class="container body-text">Experience high fidelity audio with Dolby Atmos 3D sound and high resolution quailty with 3D Dolby Vision projection</p>
          <p></p>
        </div>
      </div>
      <img src="../../media/empty-cinema-seats.png" alt="Empty Cinema Seats" class="about-us-banner-image">
    </section>

    <section id="seats-and-prices">
      <h2>Seats and prices</h2>
      <br>
      <p class="container">Discounted prices apply on weekday afternoons and all day on Monday</p>
      <br>
      <div class="seats-and-prices-containter">
        <div class="seats-and-prices-content-item">
          <h3 class="seat_prices_header">Seat Prices</h3>
          <br>
          <table class="seat_prices">
            <tr>
              <th>Seat Type</th>
              <th>Seat Code</th>
              <th>Discounted Prices</th>
              <th>Normal Prices</th>
            </tr>
            <tr>
              <td>Standard Adult</td>
              <td>STA</td>
              <td>16.00</td>
              <td>21.50</td>
            </tr>
            <tr>
              <td>Standard Concession</td>
              <td>STP</td>
              <td>14.50</td>
              <td>19.00</td>
            </tr>
            <tr>
              <td>Standard Child</td>
              <td>STC</td>
              <td>13.00</td>
              <td>17.50</td>
            </tr>
            <tr>
              <td>First Class Adult</td>
              <td>FCA</td>
              <td>25.00</td>
              <td>31.00</td>
            </tr>
            <tr>
              <td>First Class Concession</td>
              <td>FCP</td>
              <td>23.50</td>
              <td>28.00</td>
            </tr>
            <tr>
              <td>First Class Child</td>
              <td>FCC</td>
              <td>22.00</td>
              <td>25.00</td>
            </tr>
          </table>
        </div>
        <div class="seats-and-prices-content-item">
          <figure>
            <img src='../../media/profern-standard-twin.png' alt='standard seat' class="seats-and-prices-image" />
            <figcaption>Standard Seat</figcaption>
          </figure>
        </div>
        <div class="seats-and-prices-content-item">
          <figure>
            <img src='../../media/profern-verona-twin.png' alt='standard seat' class="seats-and-prices-image" />
            <figcaption>First Class Seat seat</figcaption>
          </figure>
        </div>
        <div class="seats-and-prices-content-item">
        </div>
      </div>
    </section>

    <!-- Now Showing -->

    <section id="now-showing">
      <h2>Now Showing</h2>

      <?php createMoviePanel('ACT') ?>
      <?php createMoviePanel('RMC') ?>
      <?php createMoviePanel('FAM') ?>
      <?php createMoviePanel('AHF') ?>


    </section>

  </main>

  <?php generateFooter() ?>

</body>

</html>
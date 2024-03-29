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

  <header class="header-section">
    <img src="../../media/lunardo-logo.png" alt="Lunardo Logo" class="header-logo">
    <h1 class="website-heading">Lunardo Cinemas</h1>
  </header>

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
            <h1 class="banner-title">Avatar: The Way Of The Water</h1>
          </div>
        </div>

        <img src="../../media/ACT-banner-image.png" alt="Na'vi preparing to fire an arrow" class="banner-image">
      </div>
    </div>

    <section id="trailer">

      <h3>Cast and crew</h3>

      <div class="container body-text">
        <br>
        <p>Director - James Cameron</p>
        <p>Jake Sully - Sam Worthington</p>
        <p>Neytiri - Zoe Saldana</p>
        <p>Kiri Sully - Sigourney Waever</p>
        <br>
      </div>




      <h3>Synopsis</h3>
      <br>
      <p class="container body-text">Jake Sully and Ney'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.</p>
      <br>

      <video class="trailer-video container" controls>
        <source src="../../media/ACT-trailer.mp4" type="video/mp4">
      </video>
    </section>

    <section id="form">
      <form action="booking.php" target="_blank" class="booking_form" method="post">


        <div class="form-container">
          <h2>Book now</h2>
          <fieldset>
            <legend>Contact Information</legend>
            <br>
            <label for="name">Name:</label>
            <br>
            <input type="text" id="name" name="user[name]" required>
            <br>

            <label for="email">Email Address:</label>
            <br>
            <input type="email" id="email" name="user[email]" required>
            <br>

            <label for="mobile-number">Mobile Number:</label>
            <br>
            <input type="number" id="mobile-number" name="user[mobile]" required>
            <br>
          </fieldset>

          <fieldset onchange="getSessionTime()">
            <legend>Session Times</legend>

            <input type="radio" id="monday" name="day" value="monday" data-pricing="discprice">
            <label for="monday">Monday - 9pm</label>

            <input type="radio" id="tuesday" name="day" value="tuesday" data-pricing="fullprice">
            <label for="tuesday">Tuesday - 9pm</label>

            <input type="radio" id="wednesday" name="day" value="wednesday" data-pricing="fullprice">
            <label for="wednesday">Wednesday - 9pm</label>


            <input type="radio" id="thursday" name="day" value="thursday" data-pricing="fullprice">
            <label for="thursday">Thursday - 9pm</label>


            <input type="radio" id="friday" name="day" value="friday" data-pricing="fullprice">
            <label for="friday">Friday - 9pm</label>


            <input type="radio" id="saturday" name="day" value="saturday" data-pricing="fullprice">
            <label for="saturday">Saturday - 6pm</label>


            <input type="radio" id="sunday" name="day" value="sunday" data-pricing="fullprice">
            <label for="sunday">Sunday - 6pm</label>

          </fieldset>

          <fieldset>
            <legend>Seats</legend>
            <label for="standard-adult-seats">Standard Adult Seats</label>
            <select name="standard-adult-seats" id="standard-adult-seats" data-fullprice="21.5" data-discprice="16" onchange="getNumStandardAdultSeats()">
              <option value="">please select</option>
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
            <br>

            <label for="standard-concession-seats">Standard Concession Seats</label>
            <select name="standard-concession-seats" id="standard-concession-seats" data-fullprice="19" data-discprice="14.5" onchange="getNumStandardConcessionSeats()">
              <option value="">please select</option>
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
            <br>

            <label for="standard-child-seats">Standard Child Seats</label>
            <select name="standard-child-seats" id="standard-child-seats" data-fullprice="17.5" data-discprice="13" onchange="getNumStandardChildSeats()">
              <option value="">please select</option>
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
            <br>

            <label for="first-class-adult-seats">First Class Adult Seats</label>
            <select name="first-class-adult-seats" id="first-class-adult-seats" data-fullprice="31" data-discprice="25" onchange="getNumFirstClassAdultSeats()">
              <option value="">please select</option>
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
            <br>

            <label for="first-class-concession-seats">First Class Concession Seats</label>
            <select name="first-class-concession-seats" id="first-class-concession-seats" data-fullprice="28" data-discprice="23.5" onchange="getNumFirstClassConcessionSeats()">
              <option value="">please select</option>
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
            <br>

            <label for="first-class-child-seats">First Class Child Seats</label>
            <select name="first-class-child-seats" id="first-class-child-seats" data-fullprice="25" data-discprice="22" onchange="getNumFirstClassChildSeats()">
              <option value="">please select</option>
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
            <br>
          </fieldset>



          <input type="hidden" name="movie" value="ACT">

          <button type="submit" class="submit-booking">Submit</button>

        </div>

      </form>


    </section>



  </main>
  <footer>

    <address id="contact_information">
      Phone: 9876 5432<br>
      Email: contact_us@lunardocinemas.com<br>
      Address: 132 main st, Lunardo, NSW
    </address>

    <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Marc Valpiani, s3907456, Last Modified: <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
    <a href="https://github.com/mvalpi528/wp" id="github_link" class="github-link">Find me on github</a>
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
    <div>
      <button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button>
    </div>
  </footer>
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
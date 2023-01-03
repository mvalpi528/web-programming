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
    <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet'>

  </head>

  <body>

    <header>
      <div>
        <h1>Lunardo Cinemas</h1>
      </div>
    </header>

      <nav>
        <div>
          <ul>
            <li><a href="#about-us">About Us</a></li>
            <li><a href="#seats-and-prices">Seats and prices</a></li>
            <li><a href="#now-showing">Now Showing</a></li>
            <li><a href="/wp/a2/booking.php">Book</a></li>
          </ul>
        </div>
      </nav>
    
    <main>
      <article id='Website Under Construction'>
    <!-- Creative Commons image sourced from https://pixabay.com/en/maintenance-under-construction-2422173/ and used for educational purposes only -->
       <!-- <img src='../../media/website-under-construction.png' alt='Website Under Construction' /> -->
      </article>


      <section id="about-us">
        <h2>About Us</h2>
        <h3>The Grand Re-Opening</h3>
        <p>After extensive improvements Lunardo cinema is reopening</p>

        <h3>What's New</h3>
        <p>Enjoy your cinema experience in either our standard or first class seats</p>

        
        
        <p>Dolby Atmos 3D sound</p>



      </section>

      <section id="seats-and-prices">
        <h2>Seats and prices</h2>

        <p>Discounted prices apply on weekday afternoons and all day on Monday</p>

        <h4 class="seat_prices_header">Seat Prices</h4>
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

        <figure>
          <img src='../../media/profern-standard-twin.png' alt='standard seat' />
          <figcaption>Standard Seat</figcaption>
        </figure>

        <figure>
          <img src='../../media/profern-verona-twin.png' alt='standard seat' />
          <figcaption>First Class Seat seat</figcaption>
        </figure>

        


      </section>

      <section id="now-showing">
        <h2>Now Showing</h2>

      <div class="panels_container">
        <div class="card3D" id="Avatar">

          <div class="panel_front">
            <h3 class="movie_title">Avatar - Way Of The Water (PG-13)</h3>
            <img src='../../media/avatar-poster.png' alt='Avatar - Way Of The Water' class="movie_poster"/>

          </div>
          <div class="panel_back">
            <p class="synopsis">
            Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na'vi race to protect their home.
            </p>
            <h4 class="session_times_header">Session Times</h4>
            <table class="session_times">
              <tr>
                <th>Mon-Tue</th>
                <th>Wed-Fri</th>
                <th>Sat-Sun</th>
              </tr>
              <tr>
                <td>9pm</td>
                <td>9pm</td>
                <td>6pm</td>
              </tr>
            </table>
            <a href="/wp/a2/booking.php?movie=ACT" class="booking_button">Book Now</a>

          </div>
        </div>

        <div class="card3D" id="Weird_Al">

          <div class="panel_front">
            <h3 class="movie_title"> Weird Al Yankovic - The Al Yankovic Story (TV-14)</h3>
            <img src='../../media/weird-al-yankovic-poster.png' alt='Weird Al Yankovic - The Al Yankovic Story'  class="movie_poster"/>
          </div>

          <div class="panel_back">
            <p class="synopsis">
            Explores every facet of Yankovic's life, from his meteoric rise to fame with early hits like 'Eat It' and 'Like a Surgeon' to his torrid celebrity love affairs and famously depraved lifestyle.
            </p> 
            <h4 class="session_times_header">Session Times</h4>
            <table class="session_times">
              <tr>
                <th>Mon-Tue</th>
                <th>Wed-Fri</th>
                <th>Sat-Sun</th>
              </tr>
              <tr>
                <td>-</td>
                <td>12pm</td>
                <td>3pm</td>
              </tr>
            </table>
            <a href="/wp/a2/booking.php?movie=RMC" class="booking_button">Book Now</a> 
          </div>
        </div>

        
        <div class="card3D" id="Puss_in_Boots">
          
          <div class="panel_front">
          <h3 class="movie_title"> Puss in Boots - The Last Wish (PG-13) </h3>
            <img src='../../media/puss-in-boots-poster.png' alt='Puss in Boots - The Last Wish' class="movie_poster"/>
          </div>

          <div class="panel_back">
            <p class="synopsis">
            Puss in Boots discovers that his passion for adventure has taken its toll: he has burned through eight of his nine lives. Puss sets out on an epic journey to find the mythical Last Wish and restore his nine lives.
            </p>
            <h4 class="session_times_header">Session Times</h4>
            <table class="session_times">
              <tr>
                <th>Mon-Tue</th>
                <th>Wed-Fri</th>
                <th>Sat-Sun</th>
              </tr>
              <tr>
                <td>12pm</td>
                <td>6pm</td>
                <td>12pm</td>
              </tr>
            </table>
            <a href="/wp/a2/booking.php?movie=FAM" class="booking_button">Book Now</a> 

          </div>
        </div>


        <div class="card3D" id="Margrete">
         
        <div class="panel_front">
            <h3 class="movie_title"> Margrete - Queen Of The North (MA-15) </h3>
            <img src='../../media/margrete-queen-of-the-north-poster.png' alt='Margrete - Queen Of The North' class="movie_poster"/>
          </div>

          <div class="panel_back">
            <p class="synopsis">
            1402. Queen Margrete is ruling Sweden, Norway and Denmark through her adopted son, Erik. But a conspiracy is in the making and Margrete finds herself in an impossible dilemma that could shatter her life's work: the Kalmar Union.
            </p>
            <h4 class="session_times_header">Session Times</h4>
            <table class="session_times">
              <tr>
                <th>Mon-Tue</th>
                <th>Wed-Fri</th>
                <th>Sat-Sun</th>
              </tr>
              <tr>
                <td>6pm</td>
                <td>-</td>
                <td>9pm</td>
              </tr>
            </table>
            <a href="/wp/a2/booking.php?movie=AHF" class="booking_button">Book Now</a> 
          </div>
        </div>
      </div>

        


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
      </script> Marc Valpiani, s3907456, Last Modified: <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div><br>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <br>
      <div>
        <a href="https://github.com/mvalpi528/wp" id="github_link">Find me on github</a>
      </div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>

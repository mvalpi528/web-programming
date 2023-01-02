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
        <img src='../../media/website-under-construction.png' alt='Website Under Construction' />
      </article>


      <section id="about-us">
        <h2>About Us</h2>
      </section>

      <section id="seats-and-prices">
        <h2>Seats and prices</h2>
      </section>

      <section id="now-showing">
        <h2>Now Showing</h2>
      </section>
      
    </main>

    
    
    

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>

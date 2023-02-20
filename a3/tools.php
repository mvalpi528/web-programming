<?php
// this gives access to the Session data
session_start();

// put any custom php functions here


/* Put your PHP functions and modules here.
   Many will be provided in the teaching materials,
   keep a look out for them!
*/

// needs tweaks ---- 
function debugModule()
{
  echo "<pre id='debug'>";
  print_r($_POST);
  echo "</pre>";
}

function printMyCode()
{
  $allLinesOfCode = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre id='myCode'><ol>";
  foreach ($allLinesOfCode as $oneLineOfCode) {
    echo "<li>" . rtrim(htmlentities($oneLineOfCode)) . "</li>";
  }
  echo "</ol></pre>";
}

function php2js($arr, $arrName)
{
  $arrJSON = json_encode($arr, JSON_PRETTY_PRINT);
  echo <<<"CDATA"
  <script>
    /* Variable generated with Trev's handy php2js() function */
    var $arrName = $arrJSON;
  </script>
CDATA;
}

$pricesObject = [
  "standard-adult" => [
    "full" => 21.5,
    "disc" => 16,
  ], "standard-concession" => [
    "full" => 19,
    "disc" => 14.5,
  ], "standard-child" => [
    "full" => 17.5,
    "disc" => 13,
  ], "first-class-adult" => [
    "full" => 31,
    "disc" => 25,
  ], "first-class-concession" => [
    "full" => 28,
    "disc" => 23.5,
  ], "first-class-child" => [
    "full" => 25,
    "disc" => 22,
  ]
];

$moviesObject = [
  'ACT' => [
    "title" => 'Avatar - Way Of The Water (PG-13)',
    "id" => 'Avatar',
    "alt" => 'Avatar - Way Of The Water',
    "synopsis" =>
    "Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na'vi race to protect their home.",
    "session-times" => [
      "Mon-Tue" => "9pm",
      "Wed-Fri" => "9pm",
      "Sat-Sun" => "6pm",
    ],
    "session-times-by-day" => [
      "monday" => "21",
      "tuesday" => "21",
      "wednesday" => "21",
      "thursday" => "21",
      "friday" => "21",
      "saturday" => "18",
      "sunday" => "18",
    ],
    "cast-and-crew" => [
      "Director - James Cameron",
      "Jake Sully - Sam Worthington",
      "Neytiri - Zoe Saldana",
      "Kiri Sully - Sigourney Waever"
    ]
  ], 'RMC' => [
    "title" => 'Weird Al Yankovic - The Al Yankovic Story (TV-14)',
    "id" => 'Weird_Al',
    "alt" => 'Weird Al Yankovic - The Al Yankovic Story',
    "synopsis" =>
    "Explores every facet of Yankovic's life, from his meteoric rise to fame with early hits like 'Eat It' and 'Like a Surgeon' to his torrid celebrity love affairs and famously depraved lifestyle.",
    "session-times" => [
      "Mon-Tue" => "-",
      "Wed-Fri" => "12pm",
      "Sat-Sun" => "3pm"
    ],
    "session-times-by-day" => [
      "monday" => "-",
      "tuesday" => "-",
      "wednesday" => "12",
      "thursday" => "12",
      "friday" => "12",
      "saturday" => "15",
      "sunday" => "15",
    ],
    "cast-and-crew" => [
      "Director - Eric Appel",
      "Weird Al - Daniel Radcliffe",
      "Madonna - Evan Rachel Wood",
      "Dr. Demento - Rainn Wilson"
    ]
  ], 'FAM' => [
    "title" => 'Puss in Boots - The Last Wish (PG-13)',
    "id" => 'Puss_in_Boots',
    "alt" => 'Puss in Boots - The Last Wish',
    "synopsis" =>
    "Puss in Boots discovers that his passion for adventure has taken its toll: he has burned through eight of his nine lives. Puss sets out on an epic journey to find the mythical Last Wish and restore his nine lives.",
    "session-times" => [
      "Mon-Tue" => "12pm",
      "Wed-Fri" => "6pm",
      "Sat-Sun" => "12pm",
    ],
    "session-times-by-day" => [
      "monday" => "12",
      "tuesday" => "12",
      "wednesday" => "12",
      "thursday" => "18",
      "friday" => "18",
      "saturday" => "12",
      "sunday" => "12",
    ],
    "cast-and-crew" => [
      "Director - Joel Crawford, Januel Mercado",
      "Puss in Boots (voice) - Antonio Banderas",
      "Kitty Softpaws (voice) - Salma Hayek",
      "Perrito (voice) - Harvey Guillén"
    ]
  ],
  'AHF' => [
    "title" => 'Margrete - Queen Of The North (MA-15)',
    "id" => 'Margrete',
    "alt" => 'Margrete - Queen Of The North',
    "synopsis" =>
    "1402. Queen Margrete is ruling Sweden, Norway and Denmark through her adopted son, Erik. But a conspiracy is in the making and Margrete finds herself in an impossible dilemma that could shatter her life's work: the Kalmar Union.",
    "session-times" => [
      "Mon-Tue" => "6pm",
      "Wed-Fri" => "-",
      "Sat-Sun" => "9pm",
    ],
    "session-times-by-day" => [
      "monday" => "18",
      "tuesday" => "18",
      "wednesday" => "-",
      "thursday" => "-",
      "friday" => "-",
      "saturday" => "21",
      "sunday" => "21",
    ],
    "cast-and-crew" => [
      "Director - Charlotte Sieling",
      "Margrete - Trine Dyrholm",
      "Peder - Søren Malling",
      "Erik - Morten Hee Andersen"
    ]
  ]
];


// Function set up in a utilities file like tools.php
// This is copied from the lecture materials and must be modified
// this can be used to create the movie panels in the index.page
// this takes the movie code as an argument and creates a custom movie panel
// use an 'article' for each movie panel
// keep the old code while developing so you can check that the code generated by the function matches the old code
// what the hell is heredoc syntax?
// the global keyword is used to access the global variable $moviesObject because it is not declared in the function but somewhere else in the tools.php file. The function does not automatically inherit scope.
// the name CDATA is just a random name - its not a reserved word

function createMoviePanel($movieID)
{
  global $moviesObject;

  $sessionDays = array_keys($moviesObject[$movieID]['session-times']);

  foreach ($moviesObject[$movieID]['session-times'] as $session => $time) {
  }

  echo <<<"CDATA"
  <div class="panel">
          <div class="panel-title">
            <h4 class="movie_title"> {$moviesObject[$movieID]['title']} </h4>
          </div>
          <div class="card3D" id='{$moviesObject[$movieID]['id']}'>

            <div class="panel_front">

              <img src='../../media/{$movieID}-poster.png' alt='{$moviesObject[$movieID]['alt']}' class="movie_poster" />
            </div>

            <div class="panel_back">
              <p class="synopsis">
              {$moviesObject[$movieID]['synopsis']}
              </p>
              <h4 class="session_times_header">Session Times</h4>
              <table class="session_times">
                <tr>
                  <th>{$sessionDays[0]}</th>
                  <th>{$sessionDays[1]}</th>
                  <th>{$sessionDays[2]}</th>
                </tr>
                <tr>
                  <td>{$moviesObject[$movieID]['session-times']['Mon-Tue']}</td>
                  <td>{$moviesObject[$movieID]['session-times']['Wed-Fri']}</td>
                  <td>{$moviesObject[$movieID]['session-times']['Sat-Sun']}</td>
                </tr>
              </table>
              <a href="booking.php?movie=$movieID" class="booking_button">Book Now</a>
            </div>
          </div>
        </div>
CDATA;
}

function loadBannerImage($movieID)
{
  global $moviesObject;
  echo <<<"CDATA"
  <img src="../../media/{$_GET['movie']}-banner-image.png" alt="{$moviesObject[$movieID]['alt']}" class="banner-image">
  CDATA;
}

function loadTrailer()
{
  echo <<<"CDATA"
  <video class="trailer-video container" controls>
  <source src="../../media/{$_GET['movie']}-trailer.mp4" type="video/mp4">
  </video>
  CDATA;
}

function loadCastAndCrew()
{
  global $moviesObject;

  foreach ($moviesObject[$_GET['movie']]['cast-and-crew'] as $castAndCrew) {
    echo "<li>$castAndCrew</li>";
  }
  echo "</ul></div>";
}

function loadSessionTimes($movieID)
{
  global $moviesObject;

  echo <<<"CDATA"
  <fieldset onchange="getSessionTime()">
            <legend>Session Times</legend>

            <input type="radio" id="monday" name="day" value="monday" data-pricing="discprice" onchange="getSessionTime(); calculatePrice()">
            <label for="monday">Monday - {$moviesObject[$movieID]['session-times']['Mon-Tue']}</label>

            <input type="radio" id="tuesday" name="day" value="tuesday" data-pricing="fullprice" onchange="getSessionTime(); calculatePrice()">
            <label for="tuesday">Tuesday - {$moviesObject[$movieID]['session-times']['Mon-Tue']}</label>

            <input type="radio" id="wednesday" name="day" value="wednesday" data-pricing="fullprice" onchange="getSessionTime(); calculatePrice()">
            <label for="wednesday">Wednesday - {$moviesObject[$movieID]['session-times']['Wed-Fri']}</label>


            <input type="radio" id="thursday" name="day" value="thursday" data-pricing="fullprice" onchange="getSessionTime(); calculatePrice()">
            <label for="thursday">Thursday - {$moviesObject[$movieID]['session-times']['Wed-Fri']}</label>


            <input type="radio" id="friday" name="day" value="friday" data-pricing="fullprice" onchange="getSessionTime(); calculatePrice()">
            <label for="friday">Friday - {$moviesObject[$movieID]['session-times']['Wed-Fri']}</label>


            <input type="radio" id="saturday" name="day" value="saturday" data-pricing="fullprice" onchange="getSessionTime(); calculatePrice()">
            <label for="saturday">Saturday - {$moviesObject[$movieID]['session-times']['Sat-Sun']}</label>


            <input type="radio" id="sunday" name="day" value="sunday" data-pricing="fullprice" onchange="getSessionTime(); calculatePrice()">
            <label for="sunday">Sunday - {$moviesObject[$movieID]['session-times']['Sat-Sun']}</label>

          </fieldset>

  CDATA;
}

// This function has been tested - works on core teaching but not locally
function isValidMovieCode()
{
  global $moviesObject;
  if (!isset($moviesObject[$_GET['movie']])) {
    header("Location: index.php"); // redirect if movie code invalid
    exit();
  } else {
    // echo 'movie code is valid' . '<br><br>';
  }
}

function calculatePrice()
{
  global $pricesObject;

  $numberOfStandardAdultSeats = $_SESSION['standard-adult-seats'];
  $numberOfStandardConcessionSeats = $_SESSION['standard-concession-seats'];
  $numberOfStandardChildSeats = $_SESSION['standard-child-seats'];
  $numberOfFirstClassAdultSeats = $_SESSION['first-class-adult-seats'];
  $numberOfFirstClassConcessionSeats = $_SESSION['first-class-concession-seats'];
  $numberOfFirstClassChildSeats = $_SESSION['first-class-child-seats'];

  if (isDiscounted()) {
    // echo 'calculating discounted price' . '<br><br>';

    $standardAdultDiscountPrice = $pricesObject['standard-adult']['disc'];
    // echo 'standard adult discount price: $' . $standardAdultDiscountPrice . '<br>';

    $standardConcessionDiscountPrice = $pricesObject['standard-concession']['disc'];
    // echo 'standard concession discount price: $' . $standardConcessionDiscountPrice . '<br>';

    $standardChildDiscountPrice = $pricesObject['standard-child']['disc'];
    // echo 'standard child discount price: $' . $standardChildDiscountPrice . '<br>';

    $firstClassAdultDiscountPrice = $pricesObject['first-class-adult']['disc'];
    // echo 'first class adult discount price: $' . $firstClassAdultDiscountPrice . '<br>';

    $firstClassConcessionDiscountPrice = $pricesObject['first-class-concession']['disc'];
    // echo 'first class concession discount price: $' . $firstClassConcessionDiscountPrice . '<br>';

    $firstClassChildDiscountPrice = $pricesObject['first-class-child']['disc'];
    // echo 'first class child discount price: $' . $firstClassChildDiscountPrice . '<br><br>';

    $subtotalStandardAdultSeats = $standardAdultDiscountPrice * $numberOfStandardAdultSeats;
    // echo '(discount price) subtotal for standard adult seats: $' . $subtotalStandardAdultSeats . '<br>';

    $subtotalStandardConcessionSeats = $standardConcessionDiscountPrice * $numberOfStandardConcessionSeats;
    // echo '(discount price) subtotal for standard concession seats: $' . $subtotalStandardConcessionSeats . '<br>';

    $subtotalStandardChildSeats = $standardChildDiscountPrice * $numberOfStandardChildSeats;
    // echo '(discount price) subtotal for standard child seats: $' . $subtotalStandardChildSeats . '<br>';

    $subtotalFirstClassAdultSeats = $firstClassAdultDiscountPrice * $numberOfFirstClassAdultSeats;
    // echo '(discount price) subtotal for first class adult seats: $' . $subtotalFirstClassAdultSeats . '<br>';

    $subtotalFirstClassConcessionSeats = $firstClassConcessionDiscountPrice * $numberOfFirstClassConcessionSeats;
    // echo '(discount price) subtotal for first class concession seats: $' . $subtotalFirstClassConcessionSeats . '<br>';

    $subtotalFirstClassChildSeats = $firstClassChildDiscountPrice * $numberOfFirstClassChildSeats;
    // echo '(discount price) subtotal for first class child seats: $' . $subtotalFirstClassChildSeats . '<br><br>';

    $totalPrice = $subtotalStandardAdultSeats + $subtotalStandardConcessionSeats + $subtotalStandardChildSeats + $subtotalFirstClassAdultSeats + $subtotalFirstClassConcessionSeats + $subtotalFirstClassChildSeats;

    // echo 'Total price: $' . $totalPrice;

    return [
      'number-of-standard-adult-seats' => $numberOfStandardAdultSeats,
      'number-of-standard-concession-seats' => $numberOfStandardConcessionSeats,
      'number-of-standard-child-seats' => $numberOfStandardChildSeats,
      'number-of-first-class-adult-seats' => $numberOfFirstClassAdultSeats,
      'number-of-first-class-concession-seats' => $numberOfFirstClassConcessionSeats,
      'number-of-first-class-child-seats' => $numberOfFirstClassChildSeats,

      'standard-adult-ticket-price' => $standardAdultDiscountPrice,
      'standard-concession-ticket-price' => $standardConcessionDiscountPrice,
      'standard-child-ticket-price' => $standardChildDiscountPrice,
      'first-class-adult-ticket-price' => $firstClassAdultDiscountPrice,
      'first-class-concession-ticket-price' => $firstClassConcessionDiscountPrice,
      'first-class-child-ticket-price' => $firstClassChildDiscountPrice,

      'subtotal-standard-adult' => $subtotalStandardAdultSeats,
      'subtotal-standard-concession' => $subtotalStandardConcessionSeats,
      'subtotal-standard-child' => $subtotalStandardChildSeats,
      'subtotal-first-class-adult' => $subtotalFirstClassAdultSeats,
      'subtotal-first-class-concession' => $subtotalFirstClassConcessionSeats,
      'subtotal-first-class-child' => $subtotalFirstClassChildSeats,
      'total-price' => $totalPrice
    ];
  } else {
    //echo 'calculating full price' . '<br><br>';

    $standardAdultFullPrice = $pricesObject['standard-adult']['full'];
    //echo 'standard adult full price: $' . $standardAdultFullPrice . '<br>';

    $standardConcessionFullPrice = $pricesObject['standard-concession']['full'];
    //echo 'standard concession full price: $' . $standardConcessionFullPrice . '<br>';

    $standardChildFullPrice = $pricesObject['standard-child']['full'];
    //echo 'standard child full price: $' . $standardChildFullPrice . '<br>';

    $firstClassAdultFullPrice = $pricesObject['first-class-adult']['full'];
    //echo 'first class adult full price: $' . $firstClassAdultFullPrice . '<br>';

    $firstClassConcessionFullPrice = $pricesObject['first-class-concession']['full'];
    //echo 'first class concession full price: $' . $firstClassConcessionFullPrice . '<br>';

    $firstClassChildFullPrice = $pricesObject['first-class-child']['full'];
    //echo 'first class child full price: $' . $firstClassChildFullPrice . '<br><br>';

    $subtotalStandardAdultSeats = $standardAdultFullPrice * $numberOfStandardAdultSeats;
    //echo '(full price) subtotal for standard adult seats: $' . $subtotalStandardAdultSeats . '<br>';

    $subtotalStandardConcessionSeats = $standardConcessionFullPrice * $numberOfStandardConcessionSeats;
    //echo '(full price) subtotal for standard concession seats: $' . $subtotalStandardConcessionSeats . '<br>';

    $subtotalStandardChildSeats = $standardChildFullPrice * $numberOfStandardChildSeats;
    //echo '(full price) subtotal for standard child seats: $' . $subtotalStandardChildSeats . '<br>';

    $subtotalFirstClassAdultSeats = $firstClassAdultFullPrice * $numberOfFirstClassAdultSeats;
    //echo '(full price) subtotal for first class adult seats: $' . $subtotalFirstClassAdultSeats . '<br>';

    $subtotalFirstClassConcessionSeats = $firstClassConcessionFullPrice * $numberOfFirstClassConcessionSeats;
    //echo '(full price) subtotal for first class concession seats: $' . $subtotalFirstClassConcessionSeats . '<br>';

    $subtotalFirstClassChildSeats = $firstClassChildFullPrice * $numberOfFirstClassChildSeats;
    //echo '(full price) subtotal for first class child seats: $' . $subtotalFirstClassChildSeats . '<br><br>';

    $totalPrice = $subtotalStandardAdultSeats + $subtotalStandardConcessionSeats + $subtotalStandardChildSeats + $subtotalFirstClassAdultSeats + $subtotalFirstClassConcessionSeats + $subtotalFirstClassChildSeats;

    $GST = $totalPrice / 11;

    //echo 'Total price: $' . $totalPrice;
    return [
      'number-of-standard-adult-seats' => $numberOfStandardAdultSeats,
      'number-of-standard-concession-seats' => $numberOfStandardConcessionSeats,
      'number-of-standard-child-seats' => $numberOfStandardChildSeats,
      'number-of-first-class-adult-seats' => $numberOfFirstClassAdultSeats,
      'number-of-first-class-concession-seats' => $numberOfFirstClassConcessionSeats,
      'number-of-first-class-child-seats' => $numberOfFirstClassChildSeats,

      'standard-adult-ticket-price' => $standardAdultFullPrice,
      'standard-concession-ticket-price' => $standardConcessionFullPrice,
      'standard-child-ticket-price' => $standardChildFullPrice,
      'first-class-adult-ticket-price' => $firstClassAdultFullPrice,
      'first-class-concession-ticket-price' => $firstClassConcessionFullPrice,
      'first-class-child-ticket-price' => $firstClassChildFullPrice,

      'subtotal-standard-adult' => $subtotalStandardAdultSeats,
      'subtotal-standard-concession' => $subtotalStandardConcessionSeats,
      'subtotal-standard-child' => $subtotalStandardChildSeats,
      'subtotal-first-class-adult' => $subtotalFirstClassAdultSeats,
      'subtotal-first-class-concession' => $subtotalFirstClassConcessionSeats,
      'subtotal-first-class-child' => $subtotalFirstClassChildSeats,

      'total-price' => $totalPrice,

      'GST' => $GST


    ];
  }
}


function isDiscounted()
{
  global $moviesObject;
  if ($_SESSION['day'] == 'monday') {
    //echo 'This session is discounted' . '<br><br>';
    return true;
  } else if ($_SESSION['day'] == 'tuesday' && intval($moviesObject[$_SESSION['movie']]['session-times-by-day']['tuesday']) < 18) {
    //echo 'is discounted';
    return true;
  } else if ($_SESSION['day'] == 'wednesday' && intval($moviesObject[$_SESSION['movie']]['session-times-by-day']['wednesday']) < 18) {
    //echo 'is discounted';
    return true;
  } else if ($_SESSION['day'] == 'thursday' && intval($moviesObject[$_SESSION['movie']]['session-times-by-day']['thursday']) < 18) {
    //echo 'is discounted';
    return true;
  } else if ($_SESSION['day'] == 'friday' && intval($moviesObject[$_SESSION['movie']]['session-times-by-day']['friday']) < 18) {
    //echo 'is discounted';
    return true;
  } else {
    //echo 'is not discounted' . '<br><br>';
    return false;
  }
}

function generateCells()
{
  global $moviesObject;
  global $pricesObject;
  $priceData = calculatePrice();
  $GST = $priceData['GST'];
  $date = date('d/m/Y');
  if (isDiscounted()) {
    $cells = [
      $date, $_POST['user']['name'], $_POST['user']['email'], $_POST['user']['mobile'], $_POST['movie'], $_POST['day'],
      $moviesObject[$_POST['movie']]['session-times-by-day'][$_POST['day']] . ':00', $_POST['standard-adult-seats'], '$' . number_format($pricesObject['standard-adult']['disc'], 2, '.', ','), $_POST['standard-concession-seats'], '$' . number_format($pricesObject['standard-concession']['disc'], 2, '.', ','), $_POST['standard-child-seats'], '$' . number_format($pricesObject['standard-child']['disc'], 2, '.', ','), $_POST['first-class-adult-seats'], '$' . number_format($pricesObject['first-class-adult']['disc'], 2, '.', ','), $_POST['first-class-concession-seats'], '$' . number_format($pricesObject['first-class-concession']['disc'], 2, '.', ','), $_POST['first-class-child-seats'], '$' . number_format($pricesObject['first-class-child']['disc'], 2, '.', ','), '$' . number_format($priceData['total-price'], 2, '.', ','), '$' . number_format($GST, 2, '.', ',')
    ];
  } else {
    $cells = [
      $date, $_POST['user']['name'], $_POST['user']['email'], $_POST['user']['mobile'], $_POST['movie'], $_POST['day'],
      $moviesObject[$_POST['movie']]['session-times-by-day'][$_POST['day']] . ':00', $_POST['standard-adult-seats'], '$' . number_format($pricesObject['standard-adult']['full'], 2, '.', ','), $_POST['standard-concession-seats'], '$' . number_format($pricesObject['standard-concession']['full'], 2, '.', ','), $_POST['standard-child-seats'], '$' . number_format($pricesObject['standard-child']['full'], 2, '.', ','), $_POST['first-class-adult-seats'], '$' . number_format($pricesObject['first-class-adult']['full'], 2, '.', ','), $_POST['first-class-concession-seats'], '$' . number_format($pricesObject['first-class-concession']['full'], 2, '.', ','), $_POST['first-class-child-seats'], '$' . number_format($pricesObject['first-class-child']['full'], 2, '.', ','), '$' . number_format($priceData['total-price'], 2, '.', ','), '$' . number_format($GST, 2, '.', ',')
    ];
  }
  return $cells;
}

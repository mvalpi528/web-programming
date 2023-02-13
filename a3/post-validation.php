<?php

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
    "cast-and-crew" => [
      "Director - Charlotte Sieling",
      "Margrete - Trine Dyrholm",
      "Peder - Søren Malling",
      "Erik - Morten Hee Andersen"
    ]
  ]
];



/* Call this function in the booking page like so:
   $postErrors = validateBooking();
   If the array is empty, then no errors were generated
*/

if (!empty($_POST)) {
  validateBooking();
}

$errors = []; // new empty array to return multiple error messages

function validateBooking()
{

  global $errors;

  // Checking to see if post data has been submitted
  postDataExists();

  // Checks for dishonest users

  // 1. Function from tools.php to check if the movie code is valid
  isValidMovieCode();

  // 2. Check if the day is valid and that the movie is playing on that day
  isValidDay();

  // 3. The seats are blank or integers within the range 1 - 10.
  isValidSeatsAmount($_POST['standard-adult-seats']);
  isValidSeatsAmount($_POST['standard-concession-seats']);
  isValidSeatsAmount($_POST['standard-child-seats']);
  isValidSeatsAmount($_POST['first-class-adult-seats']);
  isValidSeatsAmount($_POST['first-class-concession-seats']);
  isValidSeatsAmount($_POST['first-class-child-seats']);

  // Checks for honest users

  isAtLeastOneSeatSelected();

  return $errors; // empty array -> no errors; populated array -> errors.
}


function postDataExists()
{
  if (empty($_POST)) {
    header("Location: index.php"); // redirect if movie code invalid
    exit();
  }
}
// This function has been tested - works on core teaching but not locally
function isValidMovieCode()
{
  global $moviesObject;
  if (!isset($moviesObject[$_GET['movie']])) {
    header("Location: index.php"); // redirect if movie code invalid
    exit();
  }
}

// This function has been tested - works on core teaching but not locally
function isValidDay()
{
  $day = $_POST['day'];
  switch ($day) {
    case "monday":
    case "tuesday":
    case "wednesday":
    case "thursday":
    case "friday":
    case "saturday":
    case "sunday":
      break;
    default:
      header("Location: index.php"); // redirect dishonest user attempting to manipulate day field
      exit();
      break;
  }
}

// function isIsMoviePlaying()
// {
//   global $moviesObject;
//   $day = $_POST['day'];
//   switch ($day) {
//     case "Monday":
//     case "Tuesday":
//       if ($moviesObject[$_GET['movie']]['session-times']['Mon-Tue'] == '-') {
//         $errors['day']['session-time'] = "Your selected movie is not playing on this day";
//       }
//       break;
//     case "Wednesday":
//     case "Thursday":
//     case "Friday":
//       break;
//     case "Saturday":
//     case "Sunday":
//       break;
//     default:
//       array_push($errors, 'Please enter a valid day');
//       break;
//   }
// }

function isValidSeatsAmount($seatType)
{
  $numOfSeatTypeOrdered = $_POST["$seatType"];
  if ($numOfSeatTypeOrdered > 10 or $numOfSeatTypeOrdered < 10) {
    header("Location: index.php"); // redirect dishonest user attempting to manipulate day field
    exit();
  }
}

// function isValidName()
// {
//   $username = trim($_POST['user']['name']);
//   if ($username == '') {
//     $errors['user']['name'] = "Name can't be blank";
//   } else {
//     // more advanced name checks here with better error message
//   }
// }

// function isValidEmail(){
//   $email = trim($_POST['user']['email']);
//   if ($email == '') {
//     $errors['user']['email'] = "Email can't be blank";
//   } else {
//     // more advanced email checks here with better error message
//   }
//   // ... repeat for all other form field checks
// }

function isAtLeastOneSeatSelected()
{
  $totalSeatsSelected = $_POST['standard-adult-seats'] + $_POST['standard-concession-seats'] + $_POST['standard-child-seats'] + $_POST['first-class-adult-seats'] + $_POST['first-class-concession-seats'] + $_POST['first-class-child-seats'];

  echo $totalSeatsSelected;
}

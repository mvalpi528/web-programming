<?php





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

  // 3. The seats are blank or integers within the range 0 - 10.
  isValidSeatsQuantity($_POST['standard-adult-seats']);
  isValidSeatsQuantity($_POST['standard-concession-seats']);
  isValidSeatsQuantity($_POST['standard-child-seats']);
  isValidSeatsQuantity($_POST['first-class-adult-seats']);
  isValidSeatsQuantity($_POST['first-class-concession-seats']);
  isValidSeatsQuantity($_POST['first-class-child-seats']);

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

function isValidSeatsQuantity($numOfSeatTypeOrdered)
{

  if ($numOfSeatTypeOrdered > 10 or $numOfSeatTypeOrdered < 0) {
    header("Location: index.php"); // redirect dishonest user attempting to seats field field
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

// function isValidEmail()
// {
//   $email = trim($_POST['user']['email']);
//   if ($email == '') {
//     $errors['user']['email'] = "Email can't be blank";
//   } else {
//     // more advanced email checks here with better error message
//   }
//   // ... repeat for all other form field checks
// }

// function isValidPhoneNumber()
// {
//   $phoneNumber = trim($_POST['user']['email']);
//   if ($phoneNumber == '') {
//     $errors['user']['email'] = "Email can't be blank";
//   } else {
//     // more advanced email checks here with better error message
//   }
//   // ... repeat for all other form field checks
// }



function isAtLeastOneSeatSelected()
{
  $totalSeatsSelected = $_POST['standard-adult-seats'] + $_POST['standard-concession-seats'] + $_POST['standard-child-seats'] + $_POST['first-class-adult-seats'] + $_POST['first-class-concession-seats'] + $_POST['first-class-child-seats'];
}

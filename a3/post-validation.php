<?php
/* Call this function in the booking page like so:
   $postErrors = validateBooking();
   If the array is empty, then no errors were generated
*/


function validateBooking()
{
  global $errorMessages;
  // clearing the errors array each time the function is called
  array_splice($errorMessages, 0, count($errorMessages));
  // clearing the session each time the function is called
  session_unset();

  // Checking to see if post data has been submitted
  postDataExists();

  // Checks for dishonest users

  // 1. Function from tools.php to check if the movie code is valid
  isValidMovieCode();

  // 2. Check if the day is valid
  // isValidDay();

  // 3. Check if the movie is playing on that day
  if (isMoviePlaying() == false) {
    header("Location: index.php");
    exit();
  }

  // 3. The seats are blank or integers within the range 0 - 10.
  if (isInvalidSeatsQuantity($_POST['standard-adult-seats'])) {
    header("Location: index.php");
    exit();
  }
  if (isInvalidSeatsQuantity($_POST['standard-concession-seats'])) {
    header("Location: index.php");
    exit();
  }
  if (isInvalidSeatsQuantity($_POST['standard-child-seats'])) {
    header("Location: index.php");
    exit();
  }
  if (isInvalidSeatsQuantity($_POST['first-class-adult-seats'])) {
    header("Location: index.php");
    exit();
  }
  if (isInvalidSeatsQuantity($_POST['first-class-concession-seats'])) {
    header("Location: index.php");
    exit();
  }
  if (isInvalidSeatsQuantity($_POST['first-class-child-seats'])) {
    header("Location: index.php");
    exit();
  }

  // Checks for honest users

  isAtLeastOneSeatSelected();

  // // Check test fields
  isValidName();
  isValidEmail();
  isValidPhoneNumber();
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
      echo 'day is valid' . '<br>';
      break;
    default:
      header("Location: index.php"); // redirect dishonest user attempting to manipulate day field
      exit();
      break;
  }
}

function isMoviePlaying()
{
  global $moviesObject;
  $day = $_POST['day'];
  $movie = $_POST['movie'];

  if ($moviesObject[$movie]['session-times-by-day'][$day] == '-') {
    return false;
  } else {
    return true;
  }
}

function isInvalidSeatsQuantity($numOfSeatTypeOrdered)
{
  if ($numOfSeatTypeOrdered > 10 or $numOfSeatTypeOrdered < 0) {
    return true;
  }
}

function isValidName()
{
  global $errorMessages;
  $username = trim($_POST['user']['name']);

  if ($_POST['user']['name'] == '') {
    $errorMessages['user']['name'] = "You must enter a username";
  } else {
    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
      $errorMessages['user']['name'] = "Name can only contain letters and whitespace";
    }
  }
}

function isValidEmail()
{
  global $errorMessages;
  $email = trim($_POST['user']['email']);
  if ($email == '') {
    $errorMessages['user']['email'] = "Please enter a valid email address";
  } else {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return;
    } else {
      $errorMessages['user']['email'] = "Please enter a valid email address";
    }
  }
}

function isValidPhoneNumber()
{
  global $errorMessages;
  $phoneNumber = trim($_POST['user']['mobile']);
  if ($phoneNumber == '') {
    $errorMessages['user']['mobile'] = "Please enter a valid Australian mobile number";
  } else {
    if (preg_match("/^[0-9]{10}$/", $phoneNumber)) {
      return;
    } else {
      $errorMessages['user']['mobile'] = "Please enter valid Australian mobile number - (10 digits no punctuation)";
    }
  }
}

function isAtLeastOneSeatSelected()
{
  global $errorMessages;
  $totalSeatsSelected = $_POST['standard-adult-seats'] + $_POST['standard-concession-seats'] + $_POST['standard-child-seats'] + $_POST['first-class-adult-seats'] + $_POST['first-class-concession-seats'] + $_POST['first-class-child-seats'];

  if ($totalSeatsSelected == 0) {
    $errorMessages['seats'] = "Please select at least one seat";
  }
}

function findBookingErrors()
{
  global $errors;
  return $errors;
}

//
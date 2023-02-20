<?php
/* Call this function in the booking page like so:
   $postErrors = validateBooking();
   If the array is empty, then no errors were generated
*/


$errors = []; // new empty array to return multiple error messages


function validateBooking()
{
  global $errors;
  // clearing the errors array each time the function is called
  array_splice($errors, 0, count($errors));
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

  // // 3. The seats are blank or integers within the range 0 - 10.
  // if (!isValidSeatsQuantity($_POST['standard-adult-seats'])) {
  //   header("Location: index.php");
  //   exit();
  // }
  // if (!isValidSeatsQuantity($_POST['standard-concession-seats'])) {
  //   header("Location: index.php");
  //   exit();
  // }
  // if (!isValidSeatsQuantity($_POST['standard-child-seats'])) {
  //   header("Location: index.php");
  //   exit();
  // }
  // if (!isValidSeatsQuantity($_POST['first-class-adult-seats'])) {
  //   header("Location: index.php");
  //   exit();
  // }
  // if (!isValidSeatsQuantity($_POST['first-class-concession-seats'])) {
  //   header("Location: index.php");
  //   exit();
  // }
  // if (!isValidSeatsQuantity($_POST['first-class-child-seats'])) {
  //   header("Location: index.php");
  //   exit();
  // }

  // // Checks for honest users

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

function isValidSeatsQuantity($numOfSeatTypeOrdered)
{

  if ($numOfSeatTypeOrdered > 10 or $numOfSeatTypeOrdered < 0) {
    return false;
  }
}

function isValidName()
{
  $username = trim($_POST['user']['name']);

  if ($username == '') {
    $errors['user']['name'] = "Name can't be blank";
  } else {
    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
      $errors['user']['name'] = "Name can only contain letters and whitespace";
    }
  }
}

function isValidEmail()
{
  $email = trim($_POST['user']['email']);
  if ($email == '') {
    $errors['user']['email'] = "Email can't be blank";
  } else {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return;
    } else {
      $errors['user']['email'] = "Please enter a valid email address";
    }
  }
}

function isValidPhoneNumber()
{
  $phoneNumber = trim($_POST['user']['mobile']);
  if ($phoneNumber == '') {
    $errors['user']['mobile'] = "Mobile can't be blank";
  } else {
    if (preg_match("/^[0-9]{10}$/", $phoneNumber)) {
      return;
    } else {
      $errors['user']['mobile'] = "Please enter a valid mobile number";
    }
  }
}

function isAtLeastOneSeatSelected()
{
  global $errors;
  $totalSeatsSelected = $_POST['standard-adult-seats'] + $_POST['standard-concession-seats'] + $_POST['standard-child-seats'] + $_POST['first-class-adult-seats'] + $_POST['first-class-concession-seats'] + $_POST['first-class-child-seats'];

  if ($totalSeatsSelected == 0) {
    $errors['seats'] = "Please select at least one seat";
  }
}

function findBookingErrors()
{
  global $errors;
  return $errors;
}

//
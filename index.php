<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
//we are going to use session variables so we need to enable sessions
session_start();

// $_POST['streetnumber'] = ('');
// $_POST['zipcode'] = ('');
// $_POST['email'] = ('');

// define variables and set to empty values
$fillAllFields = "";
$emailErr = $streetErr = $streetNumberErr = $zipcodeErr = $cityErr = "";
$email = $street = $streetnumber = $city = $zipcode = "";
$emailSession = $streetSession = $streetNumberSession = $citySession = $zipcodeSession = "";

function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
//your products with their price for food.
$products = "";
$productsDrinks = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];
//your products with their price for drinks.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];
//Array of both arrays.


function validateEmail($mailValidation)
{
    return filter_var($mailValidation, FILTER_VALIDATE_EMAIL);
}

if (isset($_POST['email']) && isset($_POST['streetnumber']) && isset($_POST['zipcode']) && isset($_POST['street']) && isset($_POST['city'])) {
    $fillAllFields = ('Some forms have value');
    if (validateEmail($_POST['email'])) {
        $emailErr = 'Somewhat valid mail';

    } else {
        $emailErr = 'Valid email please';


    }
    if (checkForNumber($_POST['streetnumber'])) {
        $streetNumberErr = 'You have entered a valid number';

    } else {
        $streetNumberErr = 'Use a number in the streetnumber inputfield';

    }

    if (checkForNumber($_POST['zipcode'])) {
        $zipcodeErr = 'You have entered a valid number';

    } else {
        $zipcodeErr = 'Use a number in the zipcode inputfield';

    }
} else {
    $fillAllFields = ('Completely fill in all the forms');
}

$int = 100;
function checkForNumber($inputValue)
{
    return filter_var($inputValue, FILTER_VALIDATE_INT);
}


function removeStuff($data)
{
    //
    $data = trim($data);
    //
    $data = stripslashes($data);
    //
    $data = htmlspecialchars($data);

    return $data;
}


// foreach ($_POST as $tempInput){
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Mail is required </br>";
    } else {
        $_SESSION['email'] = $emailSession = removeStuff($_POST["email"]);
    }

    if (empty($_POST["street"])) {
        $streetErr = "Street is required";
    } else {
        $_SESSION['street'] = $streetSession = removeStuff($_POST["street"]);
    }

    if (empty($_POST["streetnumber"])) {
        $streetNumberErr = "Streetnumber is required";
    } else {
        $_SESSION['streetnumber'] = $streetNumberSession = removeStuff($_POST["streetnumber"]);
    }

    if (empty($_POST["city"])) {
        $cityErr = "City is required";
    } else {
        $_SESSION['city'] = $citySession = removeStuff($_POST["city"]);
    }

    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "Zipcode is required";
    } else {
        $_SESSION['zipcode'] = $zipcodeSession = removeStuff($_POST["zipcode"]);
    }
}


if (isset($_POST['submitted'])) {
    if ($_POST['submitted']) {


// Unset all of the session variables.
        $_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    }
// Finally, destroy the session.
    session_destroy();
// start new session
    session_start();
// refresh page
    header('refresh');
}
whatIsHappening();


$totalValue = 0;

if (!isset($_GET['food'])){
    $_GET['food'] = 1;
}
if ($_GET['food'] == 1){
    $products = $products;
}
else {
    $products = $productsDrinks;
}

//
// echo date('H:i:s Y-m-d');
require 'form-view.php';

?>
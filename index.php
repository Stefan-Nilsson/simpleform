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
$fillAllFields = "";


function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];







function validateEmail($mailValidation){
    return filter_var($mailValidation, FILTER_VALIDATE_EMAIL);
}
if (isset($_POST['email']) && isset($_POST['streetnumber']) && isset($_POST['zipcode']) && isset($_POST['street']) && isset($_POST['city'])) {

    if (validateEmail($_POST['email'])) {
        echo('Somewhat valid mail');
        echo("</br>");
    } else {
        echo('Valid email please');
        ('<input id="email');
        echo("</br>");
    }
    if (checkForNumber($_POST['streetnumber'])){
        echo('You have entered a valid number');
        echo("</br>");
    }
    else {
        echo('Use a number in the streetnumber inputfield');
        echo("</br>");
    }

    if (checkForNumber($_POST['zipcode'])){
        echo('You have entered a valid number');
        echo("</br>");
    }
    else {
        echo('Use a number in the zipcode inputfield');
        echo("</br>");
    }
}
else {
    $fillAllFields = ('Completely fill in all the forms');
}

$int = 100;
function checkForNumber ($inputValue){
    return filter_var($inputValue, FILTER_VALIDATE_INT);
}


function removeStuff($data) {
    //
    $data = trim($data);
    //
    $data = stripslashes($data);
    //
    $data = htmlspecialchars($data);

    return $data;
}


// define variables and set to empty values

$emailErr = $streetErr = $streetNumberErr = $zipcodeErr = $cityErr = "";
$name = $email = $gender = $comment = $website = "";
// foreach ($_POST as $tempInput){
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Mail is required </br>";
    } else {
        $email = removeStuff($_POST["email"]);
    }

    if (empty($_POST["street"])) {
        $streetErr = "Street is required";
    } else {
        $street = removeStuff($_POST["street"]);
    }

    if (empty($_POST["streetnumber"])) {
        $streetNumberErr = "Streetnumber is required";
    } else {
        $streetnumber = removeStuff($_POST["streetnumber"]);
    }

    if (empty($_POST["city"])) {
        $cityErr = "City is required";
    } else {
        $city = removeStuff($_POST["city"]);
    }

    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "Zipcode is required";
    } else {
        $zipcode = removeStuff($_POST["zipcode"]);
    }
}


if (isset($_POST['submitted'])) {
    if ($_POST['submitted']) {
        header('refresh');
    }
}

whatIsHappening();


$totalValue = 0;

//
// echo date('H:i:s Y-m-d');
require 'form-view.php';



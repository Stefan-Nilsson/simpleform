<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
//we are going to use session variables so we need to enable sessions
session_start();

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

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// define variables and set to empty values

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
foreach ($_POST as $tempInput){

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        echo ($nameErr = "Mail is required </br>");
    } else {
        $name = test_input($_POST["email"]);
    }

    if (empty($_POST["street"])) {
        echo($emailErr = "Street is required</br>");
    } else {
        $email = test_input($_POST["street"]);
    }

    if (empty($_POST["streetnumber"])) {
        echo($website = "Streetnumber is required</br>");
    } else {
        $website = test_input($_POST["streetnumber"]);
    }

    if (empty($_POST["city"])) {
        echo($comment = "City is required</br>");
    } else {
        $comment = test_input($_POST["city"]);
    }

    if (empty($_POST["zipcode"])) {
        echo($genderErr = "Zipcode is required</br>");
    } else {
        $gender = test_input($_POST["zipcode"]);
    }
}





function validateEmail($mailValidation){
    return filter_var($mailValidation, FILTER_VALIDATE_EMAIL);
}
if (validateEmail($_POST['email'])){
    echo ('gege');
}
else {
    echo ('Valid email please');
}


$int = 100;
function checkForNumber ($inputValue){
    return filter_var($inputValue, FILTER_VALIDATE_INT);
}
if (checkForNumber($_POST['streetnumber'])){
    echo('you have entered a valid number');
}
else {
    echo('fill in a number in your street number');
}

if (checkForNumber($_POST['zipcode'])){
    echo('you have entered a valid number');
}
else {
    echo('fill in a number in your zipcode');
}
// echo($_POST['email']);

whatIsHappening();


$totalValue = 0;


require 'form-view.php';



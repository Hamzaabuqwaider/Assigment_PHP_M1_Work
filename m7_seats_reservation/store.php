<?php
include "./includes/function.php";

$_SESSION['error'] = null;

if ($_SERVER['REQUEST_METHOD'] != "POST" || empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

$seat_name = isset($_POST['seat_name']) ? $_POST['seat_name'] : null;
$seat_num = isset($_POST['seat_num']) ? $_POST['seat_num'] : null;


$error = false;
$error_msg = '';


if (!empty($seat_name) && !empty($seat_num)) {
    $new_seat = create_seat($seat_name, $seat_num);
} else {
    $error_msg = "Please fillout the required information (seat_name,seat_num)";
    $error = true;
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    header("Location: ./create.php");
} else {
    header("Location: ./home.php");
}

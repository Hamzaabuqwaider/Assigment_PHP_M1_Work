<?php
include '../includes/function.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST' && empty($_POST))
    die('You are someone a bad guy trying to access our code directly!');

$_SESSION['error'] = null;

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : null;
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : null;
$error = false;
$error_msg = '';

if (!empty($email) && !empty($password)) {
    Reg_user($first_name, $last_name, $email, $password);
} else {
    $error_msg = "Please fillout the required information (First Name, Last Name)";
    $error = true;
}

if (strlen($first_name) < 3) {
    $error_msg = "Please the name is character min 3 ";
    $error = true;
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    header("Location: ../register.php");
} else {
    header("Location: ../index.php");
}

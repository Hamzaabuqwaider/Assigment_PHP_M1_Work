<?php
include '../includes/function.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST' && empty($_POST))
    die('You are someone a bad guy trying to access our code directly!');

$_SESSION['error'] = null;

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$error = false;
$error_msg = '';



if (!empty($email) && !empty($password)) {

    $users = get_users();
    $valid_user;
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $valid_user = $user;
            break;
        }
    }

    if (!empty($valid_user)) {
        if ($password != $valid_user['password']) {
            $error = true;
            $error_msg = 'Incorrect email or password';
        }
    } else {
        $error = true;
        $error_msg = 'Incorrect email or password';
    }
} else {
    $error = true;
    $error_msg = 'You need to enter some information';
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    header("location: ../index.php");
} else {
    $_SESSION['user_id'] = $valid_user['id'];
    header("location:../home.php");
}

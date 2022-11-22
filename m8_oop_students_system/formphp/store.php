<?php
include './functions/connect.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] != "POST" || empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

$firstname = isset($_POST['first_name']) ? $_POST['first_name'] : null;
$lastname = isset($_POST['last_name']) ? $_POST['last_name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$color = isset($_POST['color']) ? $_POST['color'] : null;
$age = isset($_POST['age']) ? $_POST['age'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$bio = isset($_POST['bio']) ? $_POST['bio'] : null;
$birth = date('Y-m-d', strtotime($_POST['birth']));

$error = false;
$error_msg = '';


if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)) { {
        $connection = connect();
        $sql = "INSERT INTO informations (first_name, last_name, email, password,data_birth,color,age,gender,phone,bio) VALUES ('$firstname', '$lastname', '$email' , '$password' , '$birth','$color','$age','$gender','$phone','$bio')";
        echo 'you data is inserted';
        $result = mysqli_query($connection, $sql);
    }
} else {
    $error_msg = "Please fillout the required information (First Name, Last Name)";
    $error = true;
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    header("Location: ./index.php");
} else {
    $_SESSION['insert'] = 'inserted data succses';
    header("Location: ./index.php");
}

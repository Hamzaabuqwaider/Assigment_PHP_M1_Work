<?php include './database.php';
session_start();
$data = new Database();
if (isset($_POST["submit"])) {
    $insert_array = array(
        'first_name' => isset($_POST['first_name']) ? $_POST['first_name'] : null,
        'last_name' => isset($_POST['last_name']) ? $_POST['last_name'] : null,
        'email' => isset($_POST['email']) ? $_POST['email'] : null,
        'password' => isset($_POST['password']) ? $_POST['password'] : null,
        'color' => isset($_POST['color']) ? $_POST['color'] : null,
        'age' => isset($_POST['age']) ? $_POST['age'] : null,
        'gender' => isset($_POST['gender']) ? $_POST['gender'] : null,
        'phone' => isset($_POST['phone']) ? $_POST['phone'] : null,
        'bio' => isset($_POST['bio']) ? $_POST['bio'] : null,
        'data_birth' => date('Y-m-d', strtotime($_POST['birth']))
    );
    if ($data->insert('informations', $insert_array)) {
        $_SESSION['success'] = 'Post Inserted';
        header("location: ./index.php");
    }
}

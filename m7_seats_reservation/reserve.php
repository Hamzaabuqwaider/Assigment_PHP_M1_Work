<?php
include './includes/function.php';
$seat_id = isset($_GET['id']) ? $_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;
$session = (int) $_SESSION['user_id'];

if ($action == 'reserve') {
    update_resrve_seat($seat_id, $session);
    header("location: ./seat.php?id=$seat_id");
} elseif ($action == 'back_reserve') {
    update_resrve_back($seat_id);
    header("location: ./seat.php?id=$seat_id");
}

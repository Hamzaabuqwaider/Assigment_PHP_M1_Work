<?php
include './includes/function.php';
$seat_id = isset($_GET['id']) ? $_GET['id'] : null;

delete_seat($seat_id);

<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

deleteReview($pdo, $_GET['id']);

header("Location: ../restaurant.php?id=" . $_GET['place_id']);
exit;
?>
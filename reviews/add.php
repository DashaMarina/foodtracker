<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

addReview($pdo, $_POST['place_id'], $_SESSION['user_id'], $_POST['comment'], $_POST['visit_date']);

header("Location: ../restaurant.php?id=" . $_POST['place_id']);
exit;
?>
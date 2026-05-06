<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

addFavourite($pdo, $_SESSION['user_id'], $_GET['id']);

header("Location: ../restaurant.php?id=" . $_GET['id']);
exit;
?>
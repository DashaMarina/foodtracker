<?php
require 'config.php';
require 'Models/models.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$favourites = getFavourites($pdo, $_SESSION['user_id']);

include 'views/favourites.view.php';
?>
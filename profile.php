<?php
require 'config.php';
require 'Models/models.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user = getUserById($pdo, $_SESSION['user_id']);

include 'views/profile.view.php';
?>
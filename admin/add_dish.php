<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: ../index.php');
    exit;
}

if (isset($_POST['add_dish'])) {
    $place_id = $_POST['place_id'];
    $dish_name = $_POST['name'];
    $dish_price = $_POST['price'];
    addDish($pdo, $place_id, $dish_name, $dish_price);
    header("Location: dishes.php?place_id=" . $place_id);
    exit;
}

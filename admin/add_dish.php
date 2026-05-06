<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: ../index.php');
    exit;
}

addDish($pdo, $_POST['place_id'], $_POST['name'], $_POST['price']);

header("Location: dishes.php?place_id=" . $_POST['place_id']);
exit;
?>
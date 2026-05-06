<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: ../index.php');
    exit;
}

deleteDish($pdo, $_GET['id']);

header("Location: dishes.php?place_id=" . $_GET['place_id']);
exit;
?>
<?php
require 'config.php';
require 'Models/models.php';

$id = $_GET['id'];

$restaurant = getRestaurantById($pdo, $id);
$dishes = getDishesByPlaceId($pdo, $id);
$reviews = getReviewsByPlaceId($pdo, $id);

$inFavourites = false;
if (isset($_SESSION['user_id'])) {
    $inFavourites = isFavourite($pdo, $_SESSION['user_id'], $id);
}

include 'views/restaurant.view.php';
?>
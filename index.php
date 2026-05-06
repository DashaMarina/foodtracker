<?php
require 'config.php';
require 'Models/models.php';

$restaurants = getAllRestaurants($pdo);

include 'views/index.view.php';
?>
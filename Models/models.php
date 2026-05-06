<?php

// 1.РЕСТОРАНЫ 

function getAllRestaurants($pdo) {
    $sql = "SELECT * FROM places ORDER BY name";
    $result = $pdo->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function getRestaurantById($pdo, $id) {
    $sql = "SELECT * FROM places WHERE id = $id";
    $result = $pdo->query($sql);
    return $result->fetch(PDO::FETCH_ASSOC);
}

function addPlace($pdo, $name, $address, $cuisine) {
    $sql = "INSERT INTO places (name, address, cuisine_type) VALUES ('$name', '$address', '$cuisine')";
    $pdo->query($sql);
}

function updatePlace($pdo, $id, $name, $address, $cuisine) {
    $sql = "UPDATE places SET name='$name', address='$address', cuisine_type='$cuisine' WHERE id=$id";
    $pdo->query($sql);
}

function deletePlace($pdo, $id) {
    $sql = "DELETE FROM places WHERE id=$id";
    $pdo->query($sql);
}

// 2.БЛЮДА 
function getDishesByPlaceId($pdo, $place_id) {
    $sql = "SELECT * FROM dishes WHERE place_id = $place_id ORDER BY name";
    $result = $pdo->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function addDish($pdo, $place_id, $name, $price) {
    $sql = "INSERT INTO dishes (place_id, name, price) VALUES ($place_id, '$name', $price)";
    $pdo->query($sql);
}

function deleteDish($pdo, $id) {
    $sql = "DELETE FROM dishes WHERE id=$id";
    $pdo->query($sql);
}

// 3.ОТЗЫВЫ 
function getReviewsByPlaceId($pdo, $place_id) {
    $sql = "SELECT reviews.*, users.name 
            FROM reviews 
            JOIN users ON reviews.user_id = users.id 
            WHERE reviews.place_id = $place_id 
            ORDER BY reviews.visit_date DESC";
    $result = $pdo->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function addReview($pdo, $place_id, $user_id, $comment, $visit_date) {
    $sql = "INSERT INTO reviews (place_id, user_id, comment, visit_date) 
            VALUES ($place_id, $user_id, '$comment', '$visit_date')";
    $pdo->query($sql);
}

function deleteReview($pdo, $review_id) {
    $sql = "DELETE FROM reviews WHERE id = $review_id";
    $pdo->query($sql);
}

// 4.ИЗБРАННОЕ 
function isFavourite($pdo, $user_id, $place_id) {
    $sql = "SELECT *  FROM favourites WHERE user_id = $user_id AND place_id = $place_id";
    $result = $pdo->query($sql);
    return $result->fetch(PDO::FETCH_ASSOC);
}

function addFavourite($pdo, $user_id, $place_id) {
    $sql = "INSERT INTO favourites (user_id, place_id) VALUES ($user_id, $place_id)";
    $pdo->query($sql);
}

function removeFavourite($pdo, $user_id, $place_id) {
    $sql = "DELETE FROM favourites WHERE user_id = $user_id AND place_id = $place_id";
    $pdo->query($sql);
}

function getFavourites($pdo, $user_id) {
    $sql = "SELECT places.* FROM places 
            JOIN favourites ON places.id = favourites.place_id 
            WHERE favourites.user_id = $user_id 
            ORDER BY places.name";
    $result = $pdo->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

// 5.ПОЛЬЗОВАТЕЛИ 
function getUserById($pdo, $user_id) {
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $pdo->query($sql);
    return $result->fetch(PDO::FETCH_ASSOC);
}

function getPlaceName($pdo, $place_id) {
    $sql = "SELECT name FROM places WHERE id = $place_id";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['name'];
}
?>
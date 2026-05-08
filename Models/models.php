<?php

// 1.РЕСТОРАНЫ 

//Все рестораны
function getAllRestaurants($pdo) {
    $sql = "SELECT * FROM places";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//1 рест по Id
function getRestaurantById($pdo, $id) {
    $sql = "SELECT * FROM places WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

//добавить
function addPlace($pdo, $name, $address, $cuisine) {
    $sql = "INSERT INTO places (name, address, cuisine_type) VALUES (:name, :address, :cuisine)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'address' => $address,
        'cuisine' => $cuisine
    ]);
}

//редактирование
function updatePlace($pdo, $id, $name, $address, $cuisine) {
    $sql = "UPDATE places SET name = :name, address = :address, cuisine_type = :cuisine WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'name' => $name,
        'address' => $address,
        'cuisine' => $cuisine
    ]);
}

//удаление
function deletePlace($pdo, $id) {
    $sql = "DELETE FROM places WHERE id=:id";
    $stmt = $pdo->prepary($sql);
    $stmt->execute(['id' => $id]);
}

// 2.БЛЮДА 

//блюда по рест
function getDishesByPlaceId($pdo, $place_id) {
    $sql = "SELECT * FROM dishes WHERE place_id = :place_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['place_id' => $place_id]);
    return $stmt->fetchAll();
}

//добавить
function addDish($pdo, $place_id, $name, $price) {
    $sql = "INSERT INTO dishes (place_id, name, price) 
    VALUES (:place_id, :name, :price)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'place_id' => $place_id,
        'name' => $name,
        'price' => $price
    ]);
}

//удалить
function deleteDish($pdo, $id) {
    $sql = "DELETE FROM dishes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

// 3.ОТЗЫВЫ 

//отзывы по рест
function getReviewsByPlaceId($pdo, $place_id) {
    $sql = "SELECT reviews.id, reviews.comment, reviews.visit_date, reviews.user_id, reviews.place_id, users.name 
            FROM reviews 
            JOIN users ON reviews.user_id = users.id 
            WHERE reviews.place_id = :place_id 
            ORDER BY reviews.visit_date DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['place_id' => $place_id]);
    return $stmt->fetchAll();
}

//lj,fdbnm
function addReview($pdo, $place_id, $user_id, $comment, $visit_date) {
    $sql = "INSERT INTO reviews (place_id, user_id, comment, visit_date) 
            VALUES (:place_id, :user_id, :comment, :visit_date)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
'place_id' => $place_id,
        'user_id' => $user_id,
        'comment' => $comment,
        'visit_date' => $visit_date
    ]);
}

//удалить
function deleteReview($pdo, $review_id) {
    $sql = "DELETE FROM reviews WHERE reviews.id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $review_id]);
}

// 4.ИЗБРАННОЕ 

//есть в избранном или нет
function isFavourite($pdo, $user_id, $place_id) {
    $sql = "SELECT favourites.user_id, favourites.place_id 
            FROM favourites 
            WHERE favourites.user_id = :user_id 
            AND favourites.place_id = :place_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'user_id' => $user_id,
        'place_id' => $place_id
    ]);
    return $stmt->fetch() ? true : false;
}

//добавить

function addFavourite($pdo, $user_id, $place_id) {
    $sql = "INSERT INTO favourites (user_id, place_id) 
            VALUES (:user_id, :place_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'user_id' => $user_id,
        'place_id' => $place_id
    ]);
}

//удалить 
function removeFavourite($pdo, $user_id, $place_id) {
    $sql = "DELETE FROM favourites 
            WHERE favourites.user_id = :user_id 
            AND favourites.place_id = :place_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'user_id' => $user_id,
        'place_id' => $place_id
    ]);
}

// все рест человека
function getFavouritesByUserId($pdo, $user_id) {
    $sql = "SELECT places.id, places.name, places.address, places.cuisine_type 
            FROM places 
            JOIN favourites ON places.id = favourites.place_id 
            WHERE favourites.user_id = :user_id 
            ORDER BY places.name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
    return $stmt->fetchAll();
}


// вход
function getUserByEmailAndPassword($pdo, $email, $password) {
    $sql = "SELECT users.id, users.name, users.email, users.is_admin 
            FROM users 
            WHERE users.email = :email 
            AND users.password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email' => $email,
        'password' => $password
    ]);
    return $stmt->fetch();
}

// регистр
function createUser($pdo, $name, $email, $password) {
    $sql = "INSERT INTO users (name, email, password, is_admin) 
            VALUES (:name, :email, :password, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);
}

// получить по ID
function getUserById($pdo, $user_id) {
    $sql = "SELECT users.id, users.name, users.email, users.is_admin 
            FROM users 
            WHERE users.id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $user_id]);
    return $stmt->fetch();
}


// название рест по ID
function getPlaceName($pdo, $place_id) {
    $sql = "SELECT places.name FROM places WHERE places.id = :id";
    $stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $place_id]);
    $row = $stmt->fetch();
    return $row ? $row['name'] : '';
}
?>
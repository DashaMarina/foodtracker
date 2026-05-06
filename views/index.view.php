<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FoodTracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">FoodTracker</a>
        <div class="navbar-nav ms-auto">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="nav-link text-white">Привет, <?php echo $_SESSION['user_name']; ?>!</span>
                <a class="nav-link" href="profile.php">👤 Профиль</a>
                <a class="nav-link" href="favourites.php">💕 Избранное</a>
                <?php if ($_SESSION['is_admin'] == 1): ?>
                    <a class="nav-link" href="admin/places.php">Админка</a>
                <?php endif; ?>
                <a class="nav-link btn btn-outline-danger btn-sm ms-2" href="logout.php">Выйти</a>
            <?php else: ?>
                <a class="nav-link" href="login.php">Вход</a>
                <a class="nav-link" href="register.php">Регистрация</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container py-4">
    <h1 class="text-center mb-4">Карта вкусных мест</h1>
    
    <div class="row">
        <?php foreach ($restaurants as $place): ?>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $place['name']; ?></h5>
                    <p class="card-text">
                        🗺️ <?php echo $place['address']; ?><br>
                        👩🏻‍🍳 <strong><?php echo $place['cuisine_type']; ?></strong>
                    </p>
                    <a href="restaurant.php?id=<?php echo $place['id']; ?>" class="btn btn-primary w-100">Подробнее</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
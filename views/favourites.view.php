<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Избранное</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">🍽️ FoodTracker</a>
        <div class="navbar-nav ms-auto">
            <span class="nav-link text-white">Привет, <?php echo $_SESSION['user_name']; ?>!</span>
            <a class="nav-link" href="profile.php">👤 Профиль</a>
            <a class="nav-link" href="favourites.php">💕 Избранное</a>
            <?php if ($_SESSION['is_admin'] == 1): ?>
                <a class="nav-link" href="admin/places.php">Админ панель</a>
            <?php endif; ?>
            <a class="nav-link btn btn-outline-danger btn-sm ms-2" href="logout.php">Выйти</a>
        </div>
    </div>
</nav>

<div class="container py-4">
    <h2>💕 Избранные рестораны</h2>
    
    <div class="row">
        <?php if (count($favourites) > 0): ?>
            <?php foreach ($favourites as $place): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5><?php echo $place['name']; ?></h5>
                        <p><?php echo $place['address']; ?></p>
                        <a href="restaurant.php?id=<?php echo $place['id']; ?>" class="btn btn-primary w-100">Подробнее</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info">У вас пока нет избранных ресторанов</div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
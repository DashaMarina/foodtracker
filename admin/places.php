<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: ../index.php');
    exit;
}

$restaurants = getAllRestaurants($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Управление ресторанами</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <div class="d-flex justify-content-between mb-4">
        <h2>Управление ресторанами</h2>
        <div>
            <a href="add_place.php" class="btn btn-success">Добавить ресторан</a>
            <a href="../index.php" class="btn btn-outline-secondary">На сайт</a>
            <a href="../logout.php" class="btn btn-danger">Выйти</a>
        </div>
    </div>

    <div class="row">
        <?php foreach ($restaurants as $place): ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5><?php echo $place['name']; ?></h5>
                    <p><?php echo $place['address']; ?></p>
                    <p><strong><?php echo $place['cuisine_type']; ?></strong></p>
                    <a href="edit_place.php?id=<?php echo $place['id']; ?>" class="btn btn-warning btn-sm">Редактировать</a>
                    <a href="delete_place.php?id=<?php echo $place['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Удалить?')">Удалить</a>
                    <a href="dishes.php?place_id=<?php echo $place['id']; ?>" class="btn btn-info btn-sm">Блюда</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
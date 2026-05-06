<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: ../index.php');
    exit;
}

$place_id = $_GET['place_id'];
$dishes = getDishesByPlaceId($pdo, $place_id);
$place_name = getPlaceName($pdo, $place_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Блюда - <?php echo $place_name; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <a href="places.php" class="btn btn-outline-secondary mb-3">← Назад к ресторанам</a>
    <h2>Блюда ресторана "<?php echo $place_name; ?>"</h2>

    <div class="card mb-4">
        <div class="card-header bg-success text-white">Добавить блюдо</div>
        <div class="card-body">
            <form action="add_dish.php" method="post">
                <input type="hidden" name="place_id" value="<?php echo $place_id; ?>">
                <input type="text" name="name" class="form-control mb-2" placeholder="Название блюда" required>
                <input type="number" step="0.01" name="price" class="form-control mb-2" placeholder="Цена" required>
                <button type="submit" class="btn btn-success">➕</button>
            </form>
        </div>
    </div>

    <?php foreach ($dishes as $dish): ?>
        <div class="border-bottom pb-2 mb-2">
            <strong><?php echo $dish['name']; ?></strong> — <?php echo $dish['price']; ?> ₽
            <a href="delete_dish.php?id=<?php echo $dish['id']; ?>&place_id=<?php echo $place_id; ?>" class="btn btn-sm btn-danger float-end" onclick="return confirm('Удалить?')">🗑</a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
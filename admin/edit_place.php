<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: ../index.php');
    exit;
}

$id = $_GET['id'];

if (isset($_POST['edit_place'])) {
    updatePlace($pdo, $id, $_POST['name'], $_POST['address'], $_POST['cuisine']);
    header('Location: places.php');
    exit;
}

$place = getRestaurantById($pdo, $id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Редактировать ресторан</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-white">
                    <h4>Редактировать ресторан</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <input type="text" name="name" class="form-control mb-2" value="<?php echo $place['name']; ?>" required>
                        <input type="text" name="address" class="form-control mb-2" value="<?php echo $place['address']; ?>" required>
                        <input type="text" name="cuisine" class="form-control mb-2" value="<?php echo $place['cuisine_type']; ?>" required>
                        <button type="submit" name="edit_place" class="btn btn-warning w-100">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
require '../config.php';
require '../Models/models.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: ../index.php');
    exit;
}

if (isset($_POST['add_place'])) {
    addPlace($pdo, $_POST['name'], $_POST['address'], $_POST['cuisine']);
    header('Location: places.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Добавить ресторан</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4>Добавить ресторан</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <input type="text" name="name" class="form-control mb-2" placeholder="Название" required>
                        <input type="text" name="address" class="form-control mb-2" placeholder="Адрес" required>
                        <input type="text" name="cuisine" class="form-control mb-2" placeholder="Кухня" required>
                        <button type="submit" name="add_place" class="btn btn-success w-100">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Регистрация - FoodTracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h4>Регистрация</h4>
                </div>
                <div class="card-body">
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                    <?php endif; ?>
                    
                    <form action="Controllers/auth.php?action=register" method="post">
                        <input type="text" name="name" class="form-control mb-2" placeholder="Ваше имя" required>
                        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                        <input type="password" name="password" class="form-control mb-3" placeholder="Пароль" required>
                        <button type="submit" class="btn btn-info w-100">Зарегистрироваться</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="login.php">Уже есть аккаунт? Войти</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
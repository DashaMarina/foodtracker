<?php
require '../config.php';

$action = $_GET['action'];

//ВХОД 
if ($action == 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $pdo->query($sql);
    $user = $result->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['is_admin'] = $user['is_admin'];
        header('Location: ../index.php');
    } else {
        $_SESSION['error'] = 'Неверный email или пароль';
        header('Location: ../login.php');
    }
    exit;
}

//РЕГИСТРАЦИЯ 
if ($action == 'register') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Есть ли в бд
    $check_sql = "SELECT * FROM users WHERE email = '$email'";
    $check_result = $pdo->query($check_sql);
    $existing_user = $check_result->fetch(PDO::FETCH_ASSOC);
    
    if ($existing_user) {
        $_SESSION['error'] = 'Пользователь с таким email уже существует';
        header('Location: ../register.php');
        exit;
    }
    
    // Добавление нового юзера
    $sql = "INSERT INTO users (name, email, password, is_admin) VALUES ('$name', '$email', '$password', 0)";
    $pdo->query($sql);
    
    $_SESSION['message'] = 'Регистрация прошла успешно! Теперь войдите в систему';
    header('Location: ../login.php');
    exit;
}
?>
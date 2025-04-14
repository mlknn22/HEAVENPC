<?php
require_once __DIR__ . '/../db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["login"]); // Может быть email или телефон
    $password = $_POST["password"];

    // Проверяем, является ли введенный логин email или телефон
    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        // Если это email, не удаляем никакие символы
        $email = $login;
        $phone = null;
    } else {
        // Если это телефон, убираем все нецифровые символы
        $email = null;
        $phone = preg_replace('/[^\d+]/', '', $login);
    }

    // Поиск пользователя по email или телефону
    if ($email) {
        // Поиск по email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :login");
        $stmt->execute(['login' => $email]);
    } else {
        // Поиск по телефону
        $stmt = $pdo->prepare("SELECT * FROM users WHERE phone = :login");
        $stmt->execute(['login' => $phone]);
    }
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Проверка пароля
    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["phone"] = $user["phone"];

        // Редирект на страницу аккаунта
        header("Location: ../account.php");
        exit();
    } else {
        echo "Неверный логин или пароль.";
    }
}
?>

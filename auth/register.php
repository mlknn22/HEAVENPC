<?php
require_once __DIR__ . '/../db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = $_POST["password"];

    // Валидация email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Неверный email.");
    }

    // Удаление всех символов кроме цифр и "+"
    $phone = preg_replace('/[^\d+]/', '', $phone);

    // Валидация номера телефона (проверка формата +7xxxxxxxxxx)
    if (!preg_match("/^\+7\d{10}$/", $phone)) {
        die("Неверный номер телефона.");
    }

    // Проверка на уникальность email или телефона
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email OR phone = :phone");
    $stmt->execute(['email' => $email, 'phone' => $phone]);

    if ($stmt->fetch()) {
        die("Пользователь с таким email или телефоном уже существует.");
    }

    // Хеширование пароля
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Вставка данных в таблицу
    $insert = $pdo->prepare("INSERT INTO users (email, phone, password) VALUES (:email, :phone, :password)");
    $insert->execute([
        'email' => $email,
        'phone' => $phone,
        'password' => $hash
    ]);

    // Получаем данные нового пользователя
    $userId = $pdo->lastInsertId(); // Получаем id нового пользователя

    // Сохраняем данные пользователя в сессии
    $_SESSION["user_id"] = $userId;
    $_SESSION["email"] = $email;
    $_SESSION["phone"] = $phone; // Если нужно сохранять телефон

    // Устанавливаем успешное сообщение в сессии
    $_SESSION['success_message'] = "Регистрация прошла успешно!";

    // Редирект на личный кабинет
    header("Location: ../account.php");
    exit();
}
?>

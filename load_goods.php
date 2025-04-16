<?php
// require_once __DIR__ . './db.php'; // путь к вашему файлу подключения к БД

// header('Content-Type: application/json');

// try {
//     // Получаем все товары из таблицы goods
//     $stmt = $pdo->query("SELECT id, type, price, name, description, path_to_img FROM goods");
//     $goods = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     echo json_encode($goods);
// } catch (PDOException $e) {
//     // В случае ошибки возвращаем сообщение
//     echo json_encode([
//         'success' => false,
//         'message' => 'Ошибка при получении товаров: ' . $e->getMessage()
//     ]);
// } 


// header('Content-Type: application/json');
require_once './db.php'; // Подключение к БД

// $category = $_GET['category'] ?? '';

// try {
//     $stmt = $pdo->prepare("SELECT * FROM goods WHERE type = ?");
//     $stmt->execute([$category]);
//     $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
//     echo json_encode($products);
// } catch (PDOException $e) {
//     echo json_encode(['error' => $e->getMessage()]);
// }








header('Content-Type: application/json');

try {
    $type = $_GET['type'] ?? null;

    if ($type) {
        $stmt = $pdo->prepare("SELECT * FROM goods WHERE type = :type");
        $stmt->execute(['type' => $type]);
    } else {
        $stmt = $pdo->query("SELECT * FROM goods");
    }

    $goods = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($goods);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Ошибка: ' . $e->getMessage()]);
}
?>
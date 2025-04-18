<?php
session_start();
require_once __DIR__ . '/db.php';

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    // Если пользователь не авторизован, редиректим на страницу входа
    header("Location: login.php");
    exit();
}

// Извлекаем данные пользователя по его ID
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT email, phone FROM users WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch();

if (!$user) {
    die("Пользователь не найден.");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeavenPC</title>
    <link rel="icon" href="images/klown.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/accountstyles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/buttonstyles.css">
    <link rel="stylesheet" href=".css">
    <link rel="icon" href="eminicon.ico">
</head>
<body>
    <div class="header-top">
        <div class="header-location_container">
            <ul class="header-location">
                <li>
                    <i class="bi bi-geo-alt" style="font-size: 12px;"></i>
                    <a href="#">Ростов-на-Дону</a>
                </li>
            </ul>
        </div>
        
        <div class="header-top-menu_container">
            <ul class="header-top-menu">
                <li><a href="delivery.html">Доставка и оплата</a></li>
                <li><a href="#">Тех поддержка</a></li>
                <li><a href="account.php">Личный кабинет</a></li>
                <li><a href="favourites.html">Избранное</a></li>
            </ul>
        </div>

        <div class="header-about-us_container">
            <ul class="header-about-us">
                <li><a href="aboutUs.html">О нас</a></li>
            </ul>
        </div>
    </div>
    <header>
        <div class="header-bottom">
            <div class="header-bottom_container">
                <div class="header-bottom_Title">
                    <a href="index.php">
                        <img src="images/logo/end-4-logo.jpg" alt="Логотип">
                    </a>
                </div>
                <div class="header-bottom-search_container" action="#" method="GET">
                    <div class="header-bottom-search">
                        <input type="text" placeholder="Поиск по сайту" class="search-input">
                    <button type="submit" class="search-button"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="header-bottom-button_container">
                    <a href="favourites.html" class="header-bottom-button" title="Избранные">
                        <i class="bi bi-heart"></i>
                        <p>Избранное</p>
                    </a>
                    <a href="configurator.html" class="header-bottom-button" title="Конфигуратор">
                        <i class="bi bi-tools"></i>
                        <p>Конфигуратор</p>
                    </a>
                    <a href="shopping.html" class="header-bottom-button" title="Корзина">
                        <i class="bi bi-cart3"></i>
                        <p>Корзина</p>
                    </a>
                    <a href="account.php" class="header-bottom-button" title="Личный Кабинет">
                        <i class="bi bi-person"></i>
                        <p>Войти</p>
                    </a>
                </div>
            </div>
        </div>
    </header>
   <div class="account_container">
    <nav class="sidebar">
    <div class="photo">
        <img src="images/5382304379870243058.jpg" alt="">
        <div class="fio">
            Лешка
        </div>
    </div>

        <ul>
            <li><a href="#" class="active">Профиль</a></li>
            <li><a href="#">Заказы</a></li>
            <li><a href="#">Избранное</a></li>
            <li><a href="#">Настройки</a></li>
            <!-- <li><a href="logout.html" class="logout-btn">Выйти</a></li> Новая кнопка выхода -->
            <li><a href="auth/login.php?login=&password=&action=logout" class="logout-btn">Выйти</a></li> <!-- Новая кнопка выхода -->
        </ul>
    </nav>

    <main class="content">
        <div class="content-header">
            <h2>Настройки профиля</h2>
        </div>
        <div class="form-card">
            <form>
                <h3>Контактные данные:</h3>
                <div class="input-group">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="input-info-percon">
                        </div>
                    <div class="form-group">
                        <label for="phone">Телефон:</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" class="input-info-percon">
                        </div>
                </div>
                <h3>Личные данные:</h3>
                <div class="input-group">
                    <div class="form-group">
                        <label for="lastname">Фамилия:</label>
                        <input type="text" id="lastname" name="lastname" value="Ваша фамилия" class="input-info-percon">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Имя:</label>
                        <input type="text" id="firstname" name="firstname" value="Ваше имя" class="input-info-percon">
                    </div>
                    <div class="form-group">
                        <label for="middlename">Отчество:</label>
                        <input type="text" id="middlename" name="middlename" value="Ваше отчество" class="input-info-percon">
                    </div>
                </div>
                <button type="submit" class="save-information-of-account-btn">Сохранить</button>
            </form>
        </div>
    </main>
</div>

<div class="mobile-menu-button_container">
    <div class="mobile-menu-button">
        <a href="index.php" class="header-bottom-button" title="На главную">
            <i class="bi bi-house"></i>
            <p>Главная</p>
        </a>
        <a href="favourites.html" class="header-bottom-button" title="Избранные">
            <i class="bi bi-heart"></i>
            <p>Избранное</p>
        </a>
        <a href="configurator.html" class="header-bottom-button" title="Конфигуратор">
            <i class="bi bi-tools"></i>
            <p>Конфигуратор</p>
        </a>
        <a href="shopping.html" class="header-bottom-button" title="Корзина">
            <i class="bi bi-cart3"></i>
            <p>Корзина</p>
        </a>
        <a href="account.php" class="header-bottom-button" title="Личный Кабинет">
            <i class="bi bi-person"></i>
            <p>Войти</p>
        </a>
    </div>
   
</div>

<footer>
    <div class="footer_container">
        <div class="footer-info">
            <h3>Связаться с нами</h3>
            <div class="contact-information">
                <p>Телефон: <a href="tel:+79556125487">+7 (955) 612-54-87</a></p>
                <p>Электронная почта: <a href="mailto:info@heavenpc.com">info@heavenpc.com</a></p>
                <p>Адрес: Ростов-на-Дону, ул. Примерная, 1</p>
            </div>
        </div>
        <div class="footer-links">
            <h3>Полезные ссылки:</h3>
            <ul>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Доставка и оплата</a></li>
                <li><a href="#">Тех поддержка</a></li>
                <li><a href="#">Обратная связь</a></li>
                <li><a href="accountstr.html">Личный кабинет</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <h3>Мы в социальных сетях:</h3>
            <div class="links-of-social-network_container">
                <div class="links-of-social-network">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="https://vk.com/al_im.php?peers=245384842_c65_279601992"><i class="fab fa-vk"></i></a>
                </div>
                <p class="copyright">© 2024 HeavenPC. Все права защищены.</p>
            </div>
        </div>
    </div>
</footer>
    <script src="scripts/swiper-bundle.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>

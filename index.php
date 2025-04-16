<?php
session_start();
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeavenPC</title>
    <!--<link rel="icon" href="images/klown.png" type="image/png">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/buttonstyles.css">
    <link rel = "icon" href = "eminicon.ico">

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


                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Показываем "Личный кабинет", если пользователь вошел -->
                        <a href="account.php" class="header-bottom-button" title="Личный Кабинет">
                            <i class="bi bi-person-check"></i>
                            <p>Кабинет</p>
                        </a>
                    <?php else: ?>
                        <!-- Показываем "Войти", если пользователь не вошел -->
                        <a href="#" id="loginBtn" class="header-bottom-button" title="Войти">
                            <i class="bi bi-person"></i>
                            <p>Войти</p>
                        </a>
                    <?php endif; ?>

                    
                </div>
            </div>
        </div>
    </header>


    <!-- Модальное окно для регистрации -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeRegisterModal">&times;</span>
            <h2>Регистрация</h2>
            <form action="auth/register.php" method="POST">
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="tel" name="phone" placeholder="Телефон" required>
                <input type="password" name="password" placeholder="Пароль" required>
                <button type="submit">Зарегистрироваться</button>
            </form>

            <p>У вас уже есть аккаунт? <a href="#" id="loginLink">Войти</a></p>
        </div>
    </div>

    <!-- Модальное окно для входа -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeLoginModal">&times;</span>
            <h2>Вход</h2>
            <div id="loginError" class="error-message" style="display: none;"></div>
            <form action="auth/login.php" method="POST" id="loginForm">
                <input type="text" name="login" placeholder="E-mail или номер телефона" required>
                <input type="password" name="password" placeholder="Пароль" required>
                <button type="submit">Войти</button>
            </form>
        </div>
    </div>

    
    <div class="category-links">
        <div class="links_container">
            <div class="link-button"><a href="category-of-goods.html">Блоки питания</a></div>
            <div class="link-button"><a href="#">Видеокарты</a></div>
            <div class="link-button"><a href="#">Игровая гарнитура</a></div>
            <div class="link-button"><a href="#">Игровые мыши</a></div>
            <div class="link-button"><a href="#">Клавиатуры</a></div>
            <div class="link-button"><a href="#">Материнские платы</a></div>
            <div class="link-button"><a href="#">Мониторы</a></div>
            <div class="link-button"><a href="#">Оперативная память</a></div>
            <div class="link-button"><a href="#">Процессоры</a></div>
            </ul>
        </div>
    </div>
    <div class="configurator-banner_container">
        <img src="images/banner-images/ff825617-25f0-4704-96cb-5802a336442f_enhanced_enhanced_enhanced.jfif" alt="">
        <!-- <div class="configurator_container">
            <div class="configurator">
                <div class="configurator-wallpapper"></div>
                <div class="configurator-button"><button >Создать сборку</button></div>
            </div>
        </div>
        <div class="add-banner">
            <div class="banner-swiper swiper">
                <div class="banner-wrapper swiper-wrapper">
                <div class="banner-slide swiper-slide"><img src="images/banner-images/1.jpg" alt="slide 1"></div>
                <div class="banner-slide swiper-slide"><img src="images/banner-images/2.jpg" alt="slide 2"></div>
                <div class="banner-slide swiper-slide"><img src="images/banner-images/3.jpg" alt="slide 3"></div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div> -->
    </div>
    <div class="category-of-goods_container">
        <h2>Популярные категории</h2>
        <div class="category-of-goods">
            <a href="category-of-goods.html#bp" data-type="bp">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/bp/bp_aerovool500.jpg" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>Блоки питания <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a>
            <a href="category-of-goods.html#gpu" data-type="gpu">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/gpu/gpu_msi4060ti.png" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>Видеокарты <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a>
            <!-- <a href="#">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/ram/ram_dexp1x8.jpg" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>Оперативная память <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a>
            <a href="#">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/box/box_dexp.jpg" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>Корпуса <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a>
            <a href="#">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/ssd/ssd_ardor1tb.jpg" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>SSD накопители <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a>
            <a href="#">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/mb/mb_gigabyteB550M.jpg" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>Материнские платы <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a>
            <a href="#">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/svo/svo_se224white.jpg" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>Охлаждение <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a> -->
            <a href="category-of-goods.html#cpu" data-type="cpu">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/cpu/cpu_10400f.jpg" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>Процессоры <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a>
            <!-- <a href="#">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/hh/hh_acer.jpg" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>Наушники <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a> -->
            <a href="category-of-goods.html#monitores" data-type="monitores">
                <div class="category">

                        <div class="category-wallpapper">

                                <img src="images/good-images/mt/mt_msi.jpg" alt="картинка категории">

                        </div>
                        <div class="named-category">
                            <span><p>Мониторы <i class="bi bi-arrow-right"></i></p></span>
                        </div>

                </div>
            </a>
        </div>
    </div>
    <div class="add-info">
        <div class="info">
            <img src="images/banner_sale/banner_sale14.jpg" alt="Баннер">
        </div>
        <div class="info">
            <img src="images/banner_sale/banner_sale3.jpg" alt="">
        </div>
        <div class="info">
            <img src="images/more_banners_sale/banner_sale24.jpg" alt="">
        </div>
    </div>
    <div class="popular-goods_container">
        <h2 style="color: white;">Хиты продаж</h2>
        <div class="pop-swiper">
            <div class="pop-wrapper swiper-wrapper">
                <div class="pop-slide swiper-slide">
                    <div class="p-good">
                        <div class="p-good-wallpapper">
                            <a href="page-of-goods.html">
                                <img src="images/good-images/ssd/ssd_kingstonkc600.jpg" alt="картинка товара">     
                            </a>
                            <button class="p-favourite-button"><i class="bi-heart"></i></button>    
                        </div>
                        <div class="p-price_container">
                            <span class="price">29 990</span>
                            <span><i class="fas fa-ruble-sign"></i></span>
                        </div> 
                        <div class="p-description"><a href="page-of-goods.html"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="box-button"><a href="#"><button class="buy-button"><i class="bi bi-cart3"></i> В корзину</button></a></div>
                    </div>     
                </div>
                <div class="pop-slide swiper-slide">
                    <div class="p-good">
                        <div class="p-good-wallpapper">
                            <a href="#">
                                <img src="images/good-images/ssd/ssd_kingstonkc600.jpg" alt="картинка товара">     
                            </a>
                            <button class="p-favourite-button"><i class="bi-heart"></i></button>    
                        </div>
                        <div class="p-price_container">
                            <span class="price">29 990</span>
                            <span><i class="fas fa-ruble-sign"></i></span>
                        </div> 
                        <div class="p-description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="box-button"><a href="#"><button><i class="bi bi-cart3" style="margin-right: 8px;"></i> В корзину</button></a></div>
                    </div>     
                </div>
                <div class="pop-slide swiper-slide">
                    <div class="p-good">
                        <div class="p-good-wallpapper">
                            <a href="#">
                                <img src="images/good-images/ssd/ssd_kingstonkc600.jpg" alt="картинка товара">     
                            </a>
                            <button class="p-favourite-button"><i class="bi-heart"></i></button>    
                        </div>
                        <div class="p-price_container">
                            <span class="price">29 990</span>
                            <span><i class="fas fa-ruble-sign"></i></span>
                        </div> 
                        <div class="p-description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="box-button"><a href="#"><button><i class="bi bi-cart3" style="margin-right: 8px;"></i> В корзину</button></a></div>
                    </div>     
                </div>
                <div class="pop-slide swiper-slide">
                    <div class="p-good">
                        <div class="p-good-wallpapper">
                            <a href="#">
                                <img src="images/good-images/ssd/ssd_kingstonkc600.jpg" alt="картинка товара">     
                            </a>
                            <button class="p-favourite-button"><i class="bi-heart"></i></button>    
                        </div>
                        <div class="p-price_container">
                            <span class="price">29 990</span>
                            <span><i class="fas fa-ruble-sign"></i></span>
                        </div> 
                        <div class="p-description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="box-button"><a href="#"><button><i class="bi bi-cart3" style="margin-right: 8px;"></i> В корзину</button></a></div>
                    </div>     

                </div>
                <div class="pop-slide swiper-slide">
                    <div class="p-good">
                        <div class="p-good-wallpapper">
                            <a href="#">
                                <img src="images/good-images/ssd/ssd_kingstonkc600.jpg" alt="картинка товара">     
                            </a>
                            <button class="p-favourite-button"><i class="bi-heart"></i></button>    
                        </div>
                        <div class="p-price_container">
                            <span class="price">29 990</span>
                            <span><i class="fas fa-ruble-sign"></i></span>
                        </div> 
                        <div class="p-description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="box-button"><a href="#"><button><i class="bi bi-cart3" style="margin-right: 8px;"></i> В корзину</button></a></div>
                    </div>     
                </div>
                <div class="pop-slide swiper-slide">
                    <div class="p-good">
                        <div class="p-good-wallpapper">
                            <a href="#">
                                <img src="images/good-images/ssd/ssd_kingstonkc600.jpg" alt="картинка товара">     
                            </a>
                            <button class="p-favourite-button"><i class="bi-heart"></i></button>    
                        </div>
                        <div class="p-price_container">
                            <span class="price">29 990</span>
                            <span><i class="fas fa-ruble-sign"></i></span>
                        </div> 
                        <div class="p-description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="box-button"><a href="#"><button><i class="bi bi-cart3" style="margin-right: 8px;"></i> В корзину</button></a></div>
                    </div>     
                </div>
                <div class="pop-slide swiper-slide">
                    <div class="p-good">
                        <div class="p-good-wallpapper">
                            <a href="#">
                                <img src="images/good-images/ssd/ssd_kingstonkc600.jpg" alt="картинка товара">     
                            </a>
                            <button class="p-favourite-button"><i class="bi-heart"></i></button>    
                        </div>
                        <div class="p-price_container">
                            <span class="price">29 990</span>
                            <span><i class="fas fa-ruble-sign"></i></span>
                        </div> 
                        <div class="p-description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="box-button"><a href="#"><button><i class="bi bi-cart3" style="margin-right: 8px;"></i> В корзину</button></a></div>
                    </div>     
                </div>
                <div class="pop-slide swiper-slide">
                    <div class="p-good">
                        <div class="p-good-wallpapper">
                            <a href="#">
                                <img src="images/good-images/ssd/ssd_kingstonkc600.jpg" alt="картинка товара">     
                            </a>
                            <button class="p-favourite-button"><i class="bi-heart"></i></button>    
                        </div>
                        <div class="p-price_container">
                            <span class="price">29 990</span>
                            <span><i class="fas fa-ruble-sign"></i></span>
                        </div> 
                        <div class="p-description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="box-button"><a href="#"><button><i class="bi bi-cart3" style="margin-right: 8px;"></i> В корзину</button></a></div>
                    </div>     
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    
    </div>
    <div class="add-information">
        <span class="add-banner-information">
            <img src="images/banner_sale/banner_sale6.jpg" alt="">
        </span>
        <span class="add-banner-information">
            <img src="images/more_banners_sale/banner_sale21.jpg" alt="">
        </span>
    </div>
    <div class="recommended-goods_container">
        <h2>Рекомендуемые товары:</h2>
        <div class="recommended-swiper">
            <div class="recommended-wrapper swiper-wrapper">
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>    
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>
                <div class="recommended-slide swiper-slide">
                    <div class="good">
                        <div class="sale">распродажа</div>
                        <div class="wallpapper-description">
                            <div class="wallpapper">
                                <a href="#">
                                    <img src="images/good-images/bp/bp_msi650.jpg" alt="картинка товара"
                                    class="good-image">
                                </a>
                                <button class="favourite-button"><i class="bi bi-heart"></i></button>    
                            </div>
                            <div class="description"><a href="#"><p>1024 ГБ SSD M.2 накопитель ARDOR GAMING Ally AL1288 [ALMAYM1024-AL1288]</p></a></div>
                        </div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i> <!-- Пустая звезда -->
                        </div>
                        <div class="price-box-button">
                            <div class="price_container">
                                <span class="price">10 990</span>
                                <span><i class="fas fa-ruble-sign"></i></span>
                            </div>
                            <button class="bi bi-cart3"></button>
                        </div>
        
                    </div>
                
                </div>     
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
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
                <h3>Полезные ссылки</h3>
                <ul>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Доставка и оплата</a></li>
                    <li><a href="#">Тех поддержка</a></li>
                    <li><a href="#">Обратная связь</a></li>
                    <li><a href="account.php">Личный кабинет</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h3>Мы в социальных сетях</h3>
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
    <script src="scripts/modal.js"></script>


    <script>

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Отменяем стандартную отправку формы
            
            const form = e.target;
            const errorDiv = document.getElementById('loginError');
            
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '../account.php'; // Редирект при успехе
                } else {
                    errorDiv.textContent = data.message; // Показываем ошибку
                    errorDiv.style.display = 'block';
                }
            })
            .catch(error => {
                errorDiv.textContent = 'Произошла ошибка при отправке формы';
                errorDiv.style.display = 'block';
            });
        });

    </script>


</body>
</html>

document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector(".goods-choose-category_container");
    const titleElement = document.querySelector(".title-of-page h1");

    const categoryNames = {
        "bp": "Блоки питания",
        "gpu": "Видеокарты",
        "monitores": "Мониторы",
        "cpu": "Процессоры"
    };

    const hash = window.location.hash.substring(1);

    function loadGoods(type = "") {
        let url = './load_goods.php';
        let currentType = type || hash;

        if (currentType) {
            url += `?type=${encodeURIComponent(currentType)}`;
        }

        // Обновление заголовка
        if (categoryNames[currentType]) {
            titleElement.textContent = categoryNames[currentType];
        } else {
            titleElement.textContent = "Товары";
        }

        fetch(url)
            .then(response => response.json())
            .then(data => {
                container.innerHTML = "";

                if (!Array.isArray(data)) {
                    container.innerHTML = "<p>Ошибка получения данных</p>";
                    return;
                }

                data.forEach(good => {
                    const goodHTML = `
                    <div class="category-of-p-goods p-good">
                        <div class="p-good-wallpapper">
                            <a href="#"><img src="${good.path_to_img}" alt="${good.name}"></a>
                            <button class="p-favourite-button"><i class="bi-heart"></i></button>
                        </div>
                        <div class="p-price_container">
                            <span class="price">${good.price.toLocaleString()}</span>
                            <span><i class="fas fa-ruble-sign"></i></span>
                        </div>
                        <div class="p-description"><a href="#"><p>${good.name}</p></a></div>
                        <div class="p-description"><a href="#"><p>${good.description}</p></a></div>
                        <div class="score">
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill" style="color: orange;"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="box-button">
                            <a href="#"><button><i class="bi bi-cart3" style="margin-right: 8px;"></i> В корзину</button></a>
                        </div>
                    </div>`;
                    container.insertAdjacentHTML("beforeend", goodHTML);
                });
            })
            .catch(error => {
                console.error("Ошибка загрузки товаров:", error);
                container.innerHTML = "<p>Ошибка загрузки товаров</p>";
            });
    }

    // Загружаем товары при старте
    loadGoods();

    // Обработчики кликов по категориям
    const categoryLinks = document.querySelectorAll(".sort-link-button a");
    categoryLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const type = this.dataset.type;
            loadGoods(type);
        });
    });
});

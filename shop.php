<?php
require_once("db.php");
error_reporting(0);
$chekAut = false;
$idUser = 0;

if (isset($_COOKIE["login"])) {
    $users = R::findAll('usersite');
    $emails = array();
    foreach ($users as $user) {
        $emails[] = $user->email;
        if ($user->email == $_COOKIE["login"]) {
            $chekAut = true;
            $idUser = $user->id;
        }
    }
}

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Центр Новых Технологий</title>
    <!--== Favicon ==-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700%7CPoppins:400,400i,500,600&display=swap" rel="stylesheet" />
    <!-- build:css assets/css/app.min.css -->
    <!--== Leaflet Min CSS ==-->
    <link href="assets/css/leaflet.min.css" rel="stylesheet" />
    <!--== Nice Select Min CSS ==-->
    <link href="assets/css/nice-select.min.css" rel="stylesheet" />
    <!--== Slick Slider Min CSS ==-->
    <link href="assets/css/slick.min.css" rel="stylesheet" />
    <!--== Magnific Popup Min CSS ==-->
    <link href="assets/css/magnific-popup.min.css" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="assets/css/slicknav.min.css" rel="stylesheet" />
    <!--== Animate Min CSS ==-->
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <!--== Ionicons Min CSS ==-->
    <link href="assets/css/ionicons.min.css" rel="stylesheet" />
    <!--== Font-Awesome Min CSS ==-->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--== Bootstrap Min CSS ==-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--== Main Style CSS ==-->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!--== Helper Min CSS ==-->
    <link href="assets/css/helper.min.css" rel="stylesheet" />
    <!-- endbuild -->
</head>
<body>
    <!--== Start Header Area ==-->
    <header class="header-area">
        <div class="container container-wide">
            <div class="row align-items-center">
                <div class="col-sm-4 col-lg-2">
                    <div class="site-logo text-center text-sm-left">
                        <a href="index.php"><img src="assets/img/logo.png" alt="Logo" /></a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <div class="site-navigation">
                        <ul class="main-menu nav">
                            <li class="has-submenu"><a href="index.php">Главная</a></li>
                            <li class="has-submenu"><a href="shop.php">Магазин</a></li>
                            <li class="has-submenu"><a href="index.php#onlyseils">Акция</a></li>
                            <li><a href="index.php#contact">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-3">
                    <div class="site-action d-flex justify-content-center justify-content-sm-end align-items-center">
                        <ul class="main-menu nav">
                            <?php if ($idUser == 0) { ?>
                                <li class="has-submenu"><a href="#mmcontainer" onclick="auth(3)">Войти</a></li>
                            <?php } else if ($idUser != 0) { ?>
                                <li class="has-submenu"><a href="#mmcontainer" onclick="auth(4)">Выйти</a></li>
                            <?php } ?>
                        </ul>
                        <div class="mini-cart-wrap">
                            <a href="cart.php" class="btn-mini-cart">
                                <i class="ion-bag"></i>
                            </a>
                        </div>
                        <div class="responsive-menu d-lg-none">
                            <button class="btn-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--== End Header Area ==-->
    <div class="mmcontainer" id="mmcontainer">
        <div class="form-mmcontainer">
            <form class="registration-form" action="add_new_user.php" method="post">
                <h4>Регистрация</h4><a href="#mmcontainer" onclick="auth(2)" style="position: absolute; top:3%;right: 5%; font-size: 40px;text-decoration: none;">X</a><br>
                <input type="text" name="name" placeholder="Имя" required />
                <input type="email" name="email" placeholder="E-mail" required />
                <input type="password" name="pass" placeholder="Пароль" required />
                <button type="submit">Зарегистрироваться</button>
                <p>Уже есть аккаунт? <a href="#mmcontainer" onclick="auth(0)" class="toggle-forms">Авторизуйтесь</a></p>
            </form>
            <form class="login-form" action="add_new_user.php" method="post">
                <h4>Авторизация</h4><a href="#mmcontainer" onclick="auth(2)" style="position: absolute; top:3%;right: 5%; font-size: 40px;text-decoration: none;">X</a><br>
                <input type="email" name="email" placeholder="E-mail" required />
                <input type="password" name="pass" placeholder="Пароль" required />
                <button type="submit">Войти</button>
                <p>Нет аккаунта? <a href="#mmcontainer" onclick="auth(1)" class="toggle-forms">Зарегистрируйтесь</a></p>
            </form>
        </div>
    </div>
    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img" data-bg="assets/img/bg/page-header-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        <div class="page-header-content-inner">
                            <h1 style="font-size: 50px;">Магазин</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area ==-->

    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper sp-y mainShop" >
        <div class="shop-page-action-bar mb-30">
            <div class="container container-wide">
                <div class="action-bar-inner">
                    <div class="row align-items-center katShop">
                        <div class="col-sm-12">
                            <div class="shop-layout-switcher mb-15 mb-sm-0" style="display: flex;justify-content: space-between;align-items: stretch;align-content: center; flex-direction: column;">
                                <input type="text" id="search" placeholder="Наименование товара" name="search"><br>
                                <input type="button" class="btn" name="but1" onclick="search_product()" value="найти"><br>
                            </div>
                        </div>
                        <div class="col-sm-12 katShop">
                                    <button class="shop_btn">Бетон</button>
                                    <button class="shop_btn">Растворы</button>
                                    <button class="shop_btn">Цемент</button>
                                    <button class="shop_btn">Другое</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-page-product">
            <div class="container container-wide">
                <div class="product-wrapper product-layout layout-list">
                    <div class="row mtn-30">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->
    <!--== Start Footer Area Wrapper ==-->
    <footer class="footer-area">
        <div class="footer-widget-area">
            <div class="container container-wide">
                <div class="row mtn-40" style="display: flex; justify-content: space-between">
                    <div class="col-lg-3">
                        <div class="widget-item">
                            <div class="about-widget">
                                <a href="index.php"><img src="assets/img/logo.png" alt="Logo" /></a>
                                <p>Новые технологии для крепких фундаментов: выбирайте товарный бетон от Центра Новых Технологий!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="widget-item">
                            <h4 class="widget-title">Навигация</h4>
                            <div class="widget-body">
                                <ul class="widget-list">
                                    <li><a href="index.php">Главная</a></li>
                                    <li><a href="index.php#shop">Магазин</a></li>
                                    <li><a href="index.php#contact">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="widget-item">
                            <h4 class="widget-title">Контактная информация</h4>
                            <div class="widget-body">
                                <address>
                                    Брянская область, г. Унеча, ул. Залинейная д. 21<br />
                                    8 (800) 777-58-91
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--== End Footer Area Wrapper ==-->
    <!-- Scroll Top Button -->
    <button class="btn-scroll-top"><i class="ion-chevron-up"></i></button>
    <!--== Start Responsive Menu Wrapper ==-->
    <aside class="off-canvas-wrapper off-canvas-menu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner">
            <!-- Start Off Canvas Content -->
            <div class="off-canvas-content">
                <div class="off-canvas-header">
                    <div class="logo">
                        <a href="index.html"><img src="assets/img/logo.png" alt="Logo"></a>
                    </div>
                    <div class="close-btn">
                        <button class="btn-close"><i class="ion-android-close"></i></button>
                    </div>
                </div>
                <!-- Content Auto Generate Form Main Menu Here -->
                <div class="res-mobile-menu mobile-menu">
                </div>
            </div>
        </div>
    </aside>
    <!--== End Responsive Menu Wrapper ==-->
    <!--=======================Javascript============================-->
    <!-- build:js assets/js/app.min.js -->
    <!--=== Modernizr Min Js ===-->
    <script src="assets/js/modernizr-3.6.0.min.js"></script>
    <!--=== jQuery Min Js ===-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--=== Slick Slider Min Js ===-->
    <script src="assets/js/slick.min.js"></script>
    <!--=== Nice Select Min Js ===-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!--=== Leaflet Min Js ===-->
    <script src="assets/js/leaflet.min.js"></script>
    <!--=== Countdown Js ===-->
    <script src="assets/js/countdown.js"></script>
    <!--=== Active Js ===-->
    <script src="assets/js/active.js"></script>
    <!-- endbuild -->
    <script type="text/javascript">
       search_product();

        function get_product(key) {
            $.ajax({
                url: "get_category.php",
                type: "post",
                dataType: 'json',
                data: {
                    product: key
                },
                success: function(data) {
                    create_block((data));
                },
            });
        }
        function search_product() {
            let key = document.querySelector('#search').value;
            $.ajax({
                url: "get_category.php",
                type: "post",
                dataType: 'json',
                data: {
                    search: key
                },
                success: function(data) {
                    create_block((data));
                },
            });
        }
        function showNotification(message, type) {
            const notification = document.createElement("div");
            notification.innerText = message;
            notification.classList.add("notification", `notification-${type}`);
            document.body.appendChild(notification);
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 3000);
        }
        function create_block(bloks) {
            let main_block = document.querySelector(".row.mtn-30");
            main_block.innerHTML = '';
            bloks.forEach((block) => {
                let newDiv = document.createElement("div");
                newDiv.classList.add("col-sm-6");
                newDiv.classList.add("col-lg-4");
                newDiv.classList.add("col-xl-3");
                newDiv.innerHTML = '<div class="product-item"><div class="product-item__thumb"><a ><img class="thumb-primary" src="assets/img/product/' + block["img_600x"] + '.png" alt="Product"><img class="thumb-secondary" src="assets/img/product/600/' + block["img_600x"] + '.png" alt="Product"></a><div class="ratting"><span><i class="ion-android-star"></i></span><span><i class="ion-android-star"></i></span><span><i class="ion-android-star"></i></span><span><i class="ion-android-star"></i></span><span><i class="ion-android-star-half"></i></span></div> </div> <div class="product-item__content"><div class="product-item__info"><h4 class="title"><a >' + block["name"] + '</a></h4><span class="price"><strong>Цена: </strong>' + block["price"] + ' Р</span></div><div class="product-item__action"><button class="btn-add-to-cart" onclick="add_product_basket(' + block["id"] + ')"><i class="ion-bag"></i></button></div><div class="product-item__desc"><p>' + block["opisanie"] + '</p></div> </div> </div>';
                main_block.appendChild(newDiv);
            });
        }
        $(document).ready(function() {
            $(".shop_btn").click(function() {
                get_product(this.innerText);
            });
        });
        function add_product_basket(product_id) {
            if (<?php print_r($idUser) ?> == 0) {
                return showNotification("Авторизуйтесь на сайте", "error");
            }
            $.ajax({
                url: "add_product_basket.php",
                type: "post",
                dataType: 'json',
                data: {
                    product_id: product_id,
                    user_id: <?php print_r($idUser) ?>
                },
                success: function(data) {
                    console.log(data);
                },
            });
            showNotification("Товар успешно добавлен в корзину", "success");
        }
        function auth(key) {
            if (key === 0) {
                document.querySelector('.registration-form').style.display = "none"
                document.querySelector('.login-form').style.display = "block"
            } else if (key === 1) {
                document.querySelector('.registration-form').style.display = "block"
                document.querySelector('.login-form').style.display = "none"
            } else if (key === 2) {
                document.querySelector('.mmcontainer').style.display = "none"
            } else if (key === 3) {
                document.querySelector('.mmcontainer').style.display = "block"
            } else if (key === 4) {
                document.cookie = "login=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                location.reload();
            }
        }
    </script>
</body>
</html>
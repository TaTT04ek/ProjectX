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
                            <h1 style="font-size: 50px;">Корзина товаров</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area ==-->

    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper sp-y">
        <div class="cart-page-content-wrap">
            <div class="container container-wide">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping-cart-list-area">
                            <div class="shopping-cart-table table-responsive">
                                <table class="table table-bordered text-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Товар</th>
                                            <th>Цена</th>
                                        </tr>
                                    </thead>
                                    <tbody id="maintr">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Cart Calculate Area -->
                        <div class="cart-calculate-area mt-sm-40 mt-md-60">
                            <h5 class="cal-title">Коризина</h5>

                            <div class="cart-cal-table table-responsive">
                                <table class="table table-borderless">
                                    <tr class="cart-sub-total">
                                        <th>Общая цена</th>
                                        <td class="price1">-</td>
                                    </tr>
                                    <tr class="cart-sub-total">
                                        <th>Скидка</th>
                                        <td>0%</td>
                                    </tr>
                                    <tr class="cart-sub-total">
                                        <th>Оплата осуществляется после доставки</th>
                                    </tr>

                                    <tr class="order-total">
                                        <th>Итого</th>
                                        <td><b class="price2">-</b></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="proceed-checkout-btn">
                                <a onclick="saveOrder(<?php echo $idUser  ?>)" class="btn btn-brand d-block">Оформить заказ</a>
                            </div>
                        </div>
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
                  <p>ООО "Центр Новых Технологий" 2007-2023.</p>
                  <p>ИНН: 3253003375</p>
                  <p>ОГРН: 1073253000050</p>
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
                    +7 (980) 313-04-91<br />
                    +7 (919) 195-14-03<br />
                    +7 (919) 190-60-19<br />
                    Факс: +7 (48351) 2-24-24
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
    <script>
        get_product();

        function get_product() {
            $.ajax({
                url: "get_product.php",
                type: "get",
                dataType: 'json',
                data: {
                    user_id: <?php print_r($idUser) ?>},
                success: function(data) {
                    create_block(data);
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
            console.log(bloks);
            let main_block = document.querySelector("#maintr");
            bloks.forEach((block) => {
                let newDiv = document.createElement("tr");
                newDiv.innerHTML = '<td class="product-list"><div class="cart-product-item d-flex align-items-center"><div class="remove-icon"><button onclick="deleteCor(' + block["id"] + ')"><i class="fa fa-trash-o"></i></button></div><p class="product-thumb"><img src="assets/img/product/' + block["img_200x"] + '.png" alt="Product"></p><p href="single-product.html" class="product-name">' + block["name"] + '</p></div></td><td><span class="price">' + block["price"] + '</span></td>';
                main_block.appendChild(newDiv);
            });
            arrs = document.querySelectorAll('.price');
            let sum = 0;
            arrs.forEach(element => 
                sum = sum + Number(element.innerText)
                );
                document.querySelector('.price1').innerText = sum;
                document.querySelector('.price2').innerText = sum;
            
        }
        function deleteCor(product_id) {
            $.ajax({
                url: "add_product_basket.php",
                type: "get",
                dataType: 'text',
                data: {
                    delete_product_id: product_id},
                success: function(data) {
                    console.log(data);
                },
            });
            //showNotification("Товар успешно удален из коризны", "success");
            location.reload();
        }
        function saveOrder(key){
            if (<?php print_r($idUser) ?> == 0) {
                return showNotification("Авторизуйтесь на сайте", "error");
            }
            $.ajax({
                url: "add_product_basket.php",
                type: "get",
                dataType: 'text',
                data: {
                    keys: key},
                        success: function(data) {
                    console.log(data);
                },
            });
            showNotification("Ваш заказ оформлен с вами свяжется менеджер", "success");
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
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
  <title>Центр Новых Технологий – купить бетон с доставкой от производителя</title> 
  <meta name="keywords" content="купить бетон, купить бетон с доставкой, купить бетон с доставкой по брянской области, купить бетон в унече">
  <meta name="yandex-verification" content="356f0a328760a017" />
  <meta name="description" content="Купить бетон у Центр Новых Технологий - это гарантия качества, а также высокая прочность и долговечность вашей будущей конструкции. Обращайтесь к нам, и мы с удовольствием поможем вам реализовать любой проект.">
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
              <li class="has-submenu"><a href="#shop">Каталог</a></li>
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
  <!--== Start Slider Area Wrapper ==-->
  <div class="slider-area-wrapper">
    <div class="slider-content-active">
      <div class="slider-slide-item bg-img" data-bg="assets/img/slider/slider-13.jpeg">
        <div class="container container-wide h-100">
          <div class="row align-items-center h-100">
            <div class="col-lg-8">
              <div class="slide-content">
                <div class="slide-content-inner">
                  <h3>Бетон, удивительным образом объединяющий качество и технологии!</h3>
                  <h2>Центр Новых Технологий</h2>
                  <a class="btn btn-white" href="#contact">Оставить заявку</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slider-slide-item bg-img" data-bg="assets/img/slider/slider-14.jpg">
        <div class="container container-wide h-100">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="slide-content">
                <div class="slide-content-inner">
                  <h3>Идеальный выбор для инновационных проектов!</h3>
                  <h2>Центр Новых Технологий</h2>
                  <a class="btn btn-white" href="#contact">Оставить заявку</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slider-slide-item bg-img" data-bg="assets/img/slider/slider-15.png">
        <div class="container container-wide h-100">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="slide-content">
                <div class="slide-content-inner">
                  <h3>Надежность и качество!</h3>
                  <h2>Центр Новых Технологий</h2>
                  <a class="btn btn-white" href="#contact">Оставить заявку</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slider-slide-item bg-img" data-bg="assets/img/slider/slider-16.png">
        <div class="container container-wide h-100">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="slide-content">
                <div class="slide-content-inner">
                  <h3>Современный бетон - новая эра строительства!</h3>
                  <h2>Центр Новых Технологий</h2>
                  <a class="btn btn-white" href="#contact">Оставить заявку</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br />
  <!--== End Banner Area Wrapper ==-->
  <!--== Start Call to Action Area ==-->
  <div class="call-to-action-area sm-top" id="onas">
    <div class="container">
      <div class="section-title">
        <h1 class="h3" style="text-align: center">О нас</h1>
      </div>
      <div class="row">
        <div class="col-md-4 col-lg-4">
          <div class="call-to-action-item mt-0">
            <div class="call-to-action-item__icon">
              <img src="assets/img/icons/icon-4.png" alt="fast delivery" />
            </div>
            <div class="call-to-action-item__info">
              <h3>Оформление онлайн</h3>
              <p>Подайте заявку онлайн без помощи специалиста</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-4">
          <div class="call-to-action-item">
            <div class="call-to-action-item__icon">
              <img src="assets/img/icons/icon-5.png" alt="quality" />
            </div>
            <div class="call-to-action-item__info">
              <h3>Лидеры на рынке</h3>
              <p>Входим в топ 10 компаний рынка</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-4">
          <div class="call-to-action-item">
            <div class="call-to-action-item__icon">
              <img src="assets/img/icons/icon-6.png" alt="return" />
            </div>
            <div class="call-to-action-item__info">
              <h3>Быстрая доставка</h3>
              <p>Множество машин трудятся ежедневно ради вас</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--== End Call to Action Area ==-->
  
  <div class="page-content-wrapper sm-top">
    <div class="about-page-content">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-1 order-md-0">
            <div class="about-content">
              <h2 class="h3 mb-sm-20">Преимущество сотрудничества с нами</h2>
              <p>ООО «Центр Новых Технологий»  уже более 10 - ти лет  один из ведущих заводов – изготовителей товарного бетона и раствора в юго-западной части Брянской области.  Главные преимущества нашей компании: качественные материалы, доставка любыми видами транспорта на строительную площадку, доступные условия, гибкая система скидок. </p>
              <p>Вы получаете превосходный продукт с паспортом качества на каждую партию товара. </p>
              <p>В соответствие  ГОСТ26633-2015, ГОСТ 7473-2010. Продукция нашего завода задекларирована и соответствует санитарно-эпидемиологическим нормам. </p>
            </div>
          </div>
          <div class="col-lg-6 order-0">
            <div class="about-thumb mb-sm-30">
              <img src="assets/img/extra/pic1.png" alt="About" />
            </div>
          </div>
        </div>
        <div class="row align-items-center sm-top">
          <div class="col-lg-6">
            <div class="about-thumb video-play mb-sm-30">
              <img src="assets/img/extra/pic2.png" alt="About" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="about-content">
              <p>Наша компания является крупным потребителем сырья для производства товарного бетона и раствора, за счет этого мы можем предоставить максимально комфортные цены для наших клиентов.</p>
              <p>Если вы сомневаетесь, какую марку бетона выбрать, наши специалисты обязательно посоветуют вам именно то, что в наибольшей степени отвечает вашим запросам. Это очень важно, так как именно в этом случае вы будете уверены в том, что купите самый подходящий материал. Поступивший заказ на производство бетона, в течении 30мин рассчитывается нашими менеджерами и уже в течении суток, готовая продукция будет доставлена к вам</p>
              <p>В зависимости от объемов, мы предлагаем различные варианты доставки. Доставка бетона будет осуществлена наиболее удобным для Вас способом, в удобное время и срок.</p>
              <p>Абсолютно каждая машина перед отправкой к Вам, проходит точный весовой контроль, таким образом, мы исключаем значительный недовес при транспортировке.</p>
              <p>Мы ежедневно производим до 200 м3 бетона. Так же мы готовы увеличивать объемы производства под конкретные задачи.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--== End Page Content Wrapper ==-->
    <!--== Start Products Area Wrapper ==-->
    <div class="products-area-wrapper sm-top" id="shop">
      <div class="container container-wide" id="shoping">
        <div class="row">
          <div class="col-lg-5 m-auto text-center">
            <div class="section-title">
              <h2 class="h3">Наша продукция</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12" id="prod12">
            <div class="product-wrapper columns-5" id="product-wrapper12"></div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Products Area Wrapper ==-->
  
    <div class="page-content-wrapper sm-top" id="contact">
      <div class="contact-page-content">
        <div class="contact-info-wrapper">
          <div class="container">
            <div class="row mtn-30">
              <div class="col-sm-6 col-lg-4">
                <div class="contact-info-item">
                  <div class="con-info-icon">
                    <i class="ion-ios-location-outline"></i>
                  </div>
                  <div class="con-info-txt">
                    <h4>Адрес</h4>
                    <p>
                      243302, Брянская область<br />
                      Унеченский р-н г. Унеча<br />
                      ул. Залинейная д. 21, корпус 1<br />
                      
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="contact-info-item">
                  <div class="con-info-icon">
                    <i class="ion-iphone"></i>
                  </div>
                  <div class="con-info-txt">
                    <h4>Наш контактный телефон</h4>
                    <p>
                      +7 (48351) 2-24-24<br />
                      +7 (980)-313-04 99<br />
                      +7 (919)-195-14-03<br />
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="contact-info-item">
                  <div class="con-info-icon">
                    <i class="ion-ios-email-outline"></i>
                  </div>
                  <div class="con-info-txt">
                    <h4>Наша электронная почта</h4>
                    <p>oooznt2014@yandex.ru</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="contact-form-wrapper sm-top">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="contact-form-content">
                  <h2>Задать вопрос</h2>
                  <div class="contact-form-wrap">
                    <div class="contact-form-inner">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-item">
                            <label class="sr-only" for="name">Ваше имя</label>
                            <input type="text" name="name" id="name" placeholder="Имя" required />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-item">
                            <label class="sr-only" for="email">email</label>
                            <input type="text" name="email" id="email" placeholder="Email" required />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-item">
                            <label class="sr-only" for="email">Телефон</label>
                            <input type="phone" name="phone" id="phone" placeholder="Телефон" required />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="input-item">
                            <label class="sr-only" for="message">Сообщение</label>
                            <textarea name="text" id="text" cols="30" rows="8" placeholder="Введите сообщение" required></textarea>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="input-item">
                            <button type="button" class="btn btn-brand" id="formBut">Отправить вопрос</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Content Wrapper ==-->
    <br /><br />
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
              <a href="index.php"><img src="assets/img/logo.png" alt="Logo" /></a>
            </div>
            <div class="close-btn">
              <button class="btn-close"><i class="ion-android-close"></i></button>
            </div>
          </div>
          <!-- Content Auto Generate Form Main Menu Here -->
          <div class="res-mobile-menu mobile-menu"></div>
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
          type: "post",
          success: function(data) {
            create_block(JSON.parse(data));
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

      function add_product_basket(product_id) {
        if (<?php print_r($idUser) ?> == 0){
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

      function create_block(bloks) {
        console.log(bloks);
        let main_block = document.querySelector("#product-wrapper12");
        let mai_block = document.querySelector("#shop");
        bloks.forEach((block) => {
          let newDiv = document.createElement("div");
          newDiv.classList.add("col");
          newDiv.innerHTML = '<div class="product-item" id=' + block["id"] + '><div class="product-item__thumb"><a onclick="close_and_up(' + block["id"] + ')"><img class="thumb-primary" src="assets/img/product/' + block["img_200x"] + '.png" alt="Product"><img class="thumb-secondary" src="assets/img/product/600/' + block["img_600x"] + '.png" alt="Product"></a></div><div class="product-item__content"><div class="ratting"><span><i class="ion-android-star"></i></span><span><i class="ion-android-star"></i></span><span><i class="ion-android-star"></i></span><span><i class="ion-android-star"></i></span><span><i class="ion-android-star-half"></i></span></div><h4 class="title"><a  onclick="close_and_up(' + block["id"] + ')">' + block["name"] + '</a></h4><span class=""><strong>Цена:</strong> ' + block["price"] + ' ₽ </span> <button class="btn-add-to-cart" onclick="add_product_basket(' + block["id"] + ')"><i class="ion-bag"> </i> Добавить в корзину</button></div></div>';
          main_block.appendChild(newDiv);
        });

        bloks.forEach((block) => {
          let newDiv = document.createElement("div");
          let nuiblock = document.createElement("div");
          nuiblock.classList.add("veublock");
          nuiblock.innerHTML = '<div class="page-content-wrapper sp-y smart" id="block' + block["id"] + '" style="display: none;z-index: 100;"><div class="product-details-page-content"><div class="container container-wide"> <div class="row"> <div class="col-12"> <div class="row"> <!-- Start Product Thumbnail Area --> <div class="col-md-5"> <div class="product-thumb-area"> <div class="product-details-thumbnail"> <img src="assets/img/product/' + block["img_200x"] + '.png"alt="Product Details" /> </div> </div> </div> <div class="col-md-7"> <div class="product-details-info-content-wrap"> <div class="prod-details-info-content"> <h2>' + block["name"] + '</h2> <h5 class="price"><strong>Цена:</strong> <span class="price-amount">' + block["price"] + ' ₽</span></h5><p>' + block["opisanie"] + '</p> <p>' + block["category"] + '</p>  <div class="product-action"> <div class="action-top d-sm-flex"> <button class="btn btn-bordered" onclick="add_product_basket(' + block["id"] + ')" style="margin-left: 10px ;margin-top: 10px;">В корзину</button> <button class="btn btn-bordered" style="margin-left: 10px ;margin-top: 10px;" onclick="close_and_up(' + block["id"] + ')">Закрыть</button> </div> </div> </div> </div> </div> </div> </div> </div> </div> </div> </div>';

          $(nuiblock).insertAfter("#shoping");
        });
      }

      function close_and_up(id) {
        let ids = document.querySelector("#block" + id);
        if (ids.style.display == "none") {
          ids.style = "display:block";
        } else if (ids.style.display == "block") {
          ids.style = "display:none";
        }
      }

      $(document).ready(function() {
        

        $(".btn-add-to-cart").click(function() {
          showNotification("Функция корзины и оплаты будет доступна после получениея данных экваринга от организации", "warning");
        });
        $("#formBut").click(function() {
          // Получаем значения полей формы
          const name = document.getElementById("name").value.trim();
          const email = document.getElementById("email").value.trim();
          const phone = document.getElementById("phone").value.trim();
          const text = document.getElementById("text").value.trim();
          // Проверяем, что поля не пустые
          if (name === "" || email === "" || phone === "" || text === "") {
            showNotification("Заполните все поля!", "error");
            return false;
          }
          // Проверяем, что имя состоит только из букв и пробелов
          const nameRegex = /^[a-zA-Zа-яА-Я ]+$/;
          if (!nameRegex.test(name)) {
            showNotification("Напишите имя правильно!", "error");
            return false;
          }
          // Проверяем, что email соответствует формату email-адреса
          const emailRegex = /\S+@\S+\.\S+/;
          if (!emailRegex.test(email)) {
            showNotification("Напишите email правильно!", "error");
            return false;
          }
          // Проверяем, что номер телефона состоит только из цифр и знаков +, -, (, )
          const phoneRegex = /^[+()\d-]+$/;
          if (!phoneRegex.test(phone)) {
            showNotification("Напишите телефон правильно!", "error");
            return false;
          }
          $.ajax({
            url: "add_application.php",
            data: {
              name: name,
              email: email,
              phone: phone,
              text: text
            },
            type: "post",
            success: function(data) {
              console.log(data);
              showNotification("Ваш email, успешно отправлен", "success");
            },
          });
        });
        $("#button-addon2").click(function() {
          let subs = document.querySelector("#subs").value;
          const emailRegex = /\S+@\S+\.\S+/;
          if (!emailRegex.test(subs)) {
            showNotification("Введите email правильно", "error");
            return false;
          }
          $.ajax({
            url: "add_application.php",
            data: {
              sub: subs
            },
            type: "post",
            success: function(data) {
              console.log(data);
              showNotification("Ваш email, успешно отправлен", "success");
            },
          });
        });

        
      });

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
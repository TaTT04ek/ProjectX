<?php
require_once("db.php");
error_reporting(0);
$chekAut = false;
$application = [];


if ($_COOKIE["auth"] == NULL) {
    if ($_POST["login"] != NULL) {
        $id = 1;
        $book = R::load('admin', $id);
        if ($book->login = $_POST["login"] && $book->pass = $_POST["pass"]) {
            $chekAut = true;
            setcookie("auth", "smis13", time() + 360000);
            $application = R::getAll('SELECT * FROM `users`');
        };
    };
} else if ($_COOKIE["auth"] == "smis13") {
    $chekAut = true;
    $application = R::getAll('SELECT * FROM `users`');
}
if ($_POST["adress"] != NULL) {
    $id = 1;
    $book = R::load('contact', $id);
    $book->number = $_POST["telephone"];
    $book->adress = $_POST["adress"];
    $book->email = $_POST["email"];
    R::store($book);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/adminStyle.css">
    <title>Центр Новых Технологий</title>
</head>

<body>
    <? if ($chekAut === false) { ?>
        <div style="display: flex;justify-content: space-evenly;align-items: center; height: 900px;">
            <div class="form-container">
                <form action="admin.php" method="post" class="subscription relative">
                    <h2>Вход в систему</h2><br>
                    <div class="form-group">
                    <h4>Введите логин</h4>
                        <input type="text" placeholder="Логин" name="login" required>
                        
                    </div><br>
                    <div class="form-group">
                    <h4>Введите пароль</h4>
                        <input type="password" placeholder="Пароль" name="pass" required>
                        
                    </div>
                    <button class="primary_btn" type="submit">Войти</button>
                </form>
            </div>
        </div>
    <? } elseif ($chekAut === true) { ?>
        <div style="display: flex;justify-content: space-evenly;align-items: center; ">
        <form action="updateProduct.php"  enctype="multipart/form-data" method="post" style="padding: 50px; background-color:#f0ecec" class="subscription relative">
                <div style="display: flex;align-items: center;flex-direction: column">
                    <span>
                        <h2>Удлаить товар</h2>
                    </span>
                    <div>
                        <span>
                            <h4>Введите id товара</h4>
                        </span>
                        <input name="id" type="text" placeholder="введите id" style="width:300px">
                    </div>
                    <div>
                        <span>
                            <h4>Название</h4>
                        </span>
                        <input name="name" type="text" placeholder="введите Название" style="width:300px">
                    </div>
                    <div >
                        <span>
                            <h4>Описание</h4>
                        </span>
                        <textarea style="resize: vertical" rows="5" cols="40" name="opis" type="text" placeholder="введите описание" style="width:300px"></textarea>
                    </div>
                    <div >
                        <span>
                            <h4>Категория</h4>
                        </span>
                        <textarea style="resize: vertical" rows="5" cols="40" name="categ" type="text" placeholder="введите Категорию" style="width:300px"></textarea>
                    </div>
                    <div >
                        <span>
                            <h4>Цена</h4>
                        </span>
                        <input name="price" type="text" placeholder="введите цену" style="width:300px">
                    </div>
                    <div >
                        <span>
                            <h4>Цвет</h4>
                        </span>
                        <input name="color" type="text" placeholder="введите цвет" style="width:300px">
                    </div>
                    <div>
                        <span>
                            <h4>Размер</h4>
                        </span>
                        <input name="size" type="text" placeholder="введите размер" style="width:300px">
                    </div>
                    <div>
                        <span>
                            <h4>Фото 200*200</h4>
                        </span>
                        <input name="pic200" type="file" placeholder="введите размер" style="width:300px">
                    </div>
                    <div>
                        <span>
                            <h4>Фото 600*600</h4>
                        </span>
                        <input name="pic600" type="file" placeholder="введите размер" style="width:300px">
                    </div>
                    <button class="primary_btn" preventDefault type="submit" style="margin-top:20px ;">Изменить</button>
                </div>
            </form>
        <form action="addProduct.php"  enctype="multipart/form-data" method="post" style="padding: 50px; background-color:#f0ecec" class="subscription relative">
                <div style="display: flex;align-items: center;flex-direction: column">
                    <span>
                        <h2>Добавить товар</h2>
                    </span>
                    <div>
                        <span>
                            <h4>Название</h4>
                        </span>
                        <input name="name" type="text" placeholder="введите название" style="width:300px">
                    </div>
                    <div >
                        <span>
                            <h4>Описание</h4>
                        </span>
                        <textarea style="resize: vertical" rows="5" cols="40" name="opis" type="text" placeholder="введите описание" style="width:300px"></textarea>
                    </div>
                    <div >
                        <span>
                            <h4>Категория</h4>
                        </span>
                        <textarea style="resize: vertical" rows="5" cols="40" name="categ" type="text" placeholder="введите Категорию" style="width:300px"></textarea>
                    </div>
                    <div >
                        <span>
                            <h4>Цена</h4>
                        </span>
                        <input name="price" type="text" placeholder="введите цену" style="width:300px">
                    </div>
                    <div >
                        <span>
                            <h4>Цвет</h4>
                        </span>
                        <input name="color" type="text" placeholder="введите цвет" style="width:300px">
                    </div>
                    <div>
                        <span>
                            <h4>Размер</h4>
                        </span>
                        <input name="size" type="text" placeholder="введите размер" style="width:300px">
                    </div>
                    <div>
                        <span>
                            <h4>Фото 200*200</h4>
                        </span>
                        <input name="pic200" type="file" placeholder="введите размер" style="width:300px">
                    </div>
                    <div>
                        <span>
                            <h4>Фото 600*600</h4>
                        </span>
                        <input name="pic600" type="file" placeholder="введите размер" style="width:300px">
                    </div>
                    <button class="primary_btn" preventDefault type="submit" style="margin-top:20px ;">Добавить</button>
                </div>
            </form>
            <form action="deleteProduct.php"  enctype="multipart/form-data" method="post" style="padding: 50px; background-color:#f0ecec" class="subscription relative">
                <div style="display: flex;align-items: center;flex-direction: column">
                    <span>
                        <h2>Редактировать товар</h2>
                    </span>
                    <div>
                        <span>
                            <h4>Введите id товара</h4>
                        </span>
                        <input name="id" type="text" placeholder="введите id" style="width:300px">
                    </div>
                    <button class="primary_btn" preventDefault type="submit" style="margin-top:20px ;">Удалить</button>
                </div>
            </form>
        </div>
    <? }  ?>




</body>

</html>
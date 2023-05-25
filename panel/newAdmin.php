<?php
require_once('../db.php');
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
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<link href="../assets/css/css.css" rel="stylesheet">
	<title>Shop</title>
</head>

<body>
	<? if ($chekAut === false) { ?>
		<div style="display: flex;justify-content: space-evenly;align-items: center; height: 900px;">
			<div class="form-container">
				<form action="newAdmin.php" method="post" class="subscription relative">
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
		<div class="menu">
			<div class="fixed">
				<div class="menu_select">
					<h2>Меню</h2>
					<form class="searh" onsubmit="return false;">
						<input class="searh_input" type="text" id="input_text" placeholder="Введите товар">
						<button type="button" class="searh_button" id="like_sql">Поиск</button>
					</form>
					<button type="button" class="searh_button" onclick="add_block_hiden(1)">Добавить товар</button>
					<button type="button" class="searh_button" onclick="get_order()">Заказы</button>
					<button type="button" class="searh_button" onclick="get_zaivka()">Заявки</button>
					<button type="button" class="searh_button" style="margin-top: auto; margin-bottom: 20px" onclick="add_block_hiden(2)">Все товары</button>
				</div>
			</div>
		</div>
		<div class="full_screen" id="full_screen" style="display:none">
			<form action="addProduct.php" enctype="multipart/form-data" method="post" style="padding: 50px; background-color:#f0ecec" class="subscription relative">
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
					<div>
						<span>
							<h4>Стоймость перевозки</h4>
						</span>
						<textarea style="resize: vertical" rows="5" cols="40" name="opis" type="text" placeholder="введите описание" style="width:300px"></textarea>
					</div>
					<div>
						<span>
							<h4>Мин доставка</h4>
						</span>
						<textarea style="resize: vertical" rows="5" cols="40" name="categ" type="text" placeholder="введите Категорию" style="width:300px"></textarea>
					</div>
					<div>
						<span>
							<h4>Цена</h4>
						</span>
						<input name="price" type="text" placeholder="введите цену" style="width:300px">
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
		</div>
		<div class="full_screen" id="update_prod" style="display:none">
			<form action="updateProduct.php" enctype="multipart/form-data" method="post" style="padding: 50px; background-color:#f0ecec" class="subscription relative">
				<div style="display: flex;align-items: center;flex-direction: column">
					<span>
						<h2>Изменить товар</h2>
					</span>
					<div>
						<span>
							<h4></h4>
						</span>
						<input name="id" id="update_id_prod"  type="text" placeholder="введите id" style="width:300px">
					</div>
					<div>
						<span>
							<h4>Название</h4>
						</span>
						<input name="name" type="text" placeholder="введите Название" style="width:300px">
					</div>
					<div>
						<span>
							<h4>Стоймость перевозки</h4>
						</span>
						<textarea style="resize: vertical" rows="5" cols="40" name="opis" type="text" placeholder="введите описание" style="width:300px"></textarea>
					</div>
					<div>
						<span>
							<h4>Мин доставка</h4>
						</span>
						<textarea style="resize: vertical" rows="5" cols="40" name="categ" type="text" placeholder="введите Категорию" style="width:300px"></textarea>
					</div>
					<div>
						<span>
							<h4>Цена</h4>
						</span>
						<input name="price" type="text" placeholder="введите цену" style="width:300px">
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
					<div class="div_but">
						<button class="primary_btn butt" preventDefault type="submit" style="margin-top:20px ;">Изменить</button>
						<input class="primary_btn butt" type="button" onclick="add_block_hiden(10)" value="Отмена" style="margin-top:20px ;">
					</div>
				</div>
			</form>
		</div>
		<div class="center">
			<h1 style="margin-top: 35px">Администрирование</h1>
			<br>

			<div class="history">
				<!-- тут вся история -->
			</div>
			<div class="product">
				<!-- тут все блоки -->
			</div>
		</div>
	<? }  ?>
</body>

<script type="text/javascript">
	get_sql();
	function delete_product(but , id) {
		$.ajax({
			url: '../deleteProduct.php',
			data: {
				id: id
			},
			type: 'post',
			success: function(data) {
				$(but.parentNode.parentNode).hide('fast');
			}
		});
	}

	function update_product(but) {
		document.querySelector("#update_prod").style.display = "flex";
		document.querySelector("#update_id_prod").value = but;
	}


	function get_sql() {
		let clear_product = document.querySelector(".product");
		clear_product.innerHTML = "";
		$.ajax({
			url: '../get_product.php',
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			type: 'post',
			success: function(data) {
				create_product(JSON.parse(data));
			}
		});
	}

	function get_order() {
		let clear_product = document.querySelector(".product");
		clear_product.innerHTML = "";
		$.ajax({
			url: '../get_order.php',
			dataType: 'json',
			type: 'post',
			success: function(data) {
				create_order(data);
			}
		});
	}

	function create_order(data) {
		let fasElement = document.querySelector(".product");
		fasElement.innerHTML = "";
		const groupedData = data.reduce((acc, curr) => {
			const id = curr.id;
			if (!acc[id]) {
				acc[id] = [];
			}
			acc[id].push(curr);
			return acc;
		}, {});
		const arr = Object.values(groupedData);
		console.log(arr);
		for (i = 0; i !== arr.length; i++) {
			let newElement = document.createElement("div");
			newElement.classList.add("order_block");
			newElement.setAttribute("data-id", arr[i][0]["id"]);
			newElement.innerHTML = '<div><h3>Заказ № ' + arr[i][0]["id"] + '</h3><p>' + arr[i][0]["email"] + '</p></div><div class="all_item all_item' + arr[i][0]["id"] + '"></div><div class="div_but"><button id="but_delete" class="butt" onclick="orderNo('+arr[i][0]["id"]+', this)">Отменено</button><button id="but_delete" class="butt" onclick="orderYes('+arr[i][0]["id"]+', this)">Оплачено</button></div>';
			fasElement.appendChild(newElement);

			let Element = document.querySelector(".all_item" + arr[i][0]["id"]);

			for (ins = 0; ins !== arr[i].length; ins++) {

				let child = document.createElement("div");
				child.classList.add("order_item");
				child.innerHTML = '<img class="ord_img" src="../assets/img/product/' + arr[i][ins]['img_200x'] + '.png"><p>' + arr[i][ins]["name"] + '</p><p>' + arr[i][ins]["price"] + ' ₽</p>';
				Element.appendChild(child);
			}

			
		}

	}

	function create_product(data) {
		let fasElement = document.querySelector(".product");
		for (i = 0; i !== data.length; i++) {
			let newElement = document.createElement("div");
			newElement.classList.add("product_block");
			newElement.setAttribute("data-id", data[i]["id"]);
			newElement.innerHTML = '<img class="product_img" src="../assets/img/product/' + data[i]['img_200x'] + '.png"><p>' + data[i]['category'] + '</p><h4>' + data[i]['name'] + '</h4><div class="product_menu"><br><span>Цена: ' + data[i]['price'] + ' ₽ </span></div><div class="div_but"><button id="but_delete" class="butt" onclick="delete_product(this ,'+ data[i]["id"] + ')"> Удалить</button><button id="but_delete" class="butt" onclick="update_product(' + data[i]["id"] + ')">Изменить</button></div>';
			fasElement.appendChild(newElement);
		}
	}
	function zaivkaDelete(key , object){
		$.ajax({
			url: '../get_zaivka.php',
			data: {
				key: key, ids: 0,
			},
			type: 'get',
			success: function(data) {
			}
		});
		$(object.parentNode.parentNode).hide('fast');
	}
	function orderNo(key , object){
		$.ajax({
			url: '../add_product_basket.php',
			data: {
				key: key, ids: 0,
			},
			type: 'get',
			success: function(data) {
			}
		});
		$(object.parentNode.parentNode).hide('fast');
	}

	function orderYes(key , object){
		$.ajax({
			url: '../add_product_basket.php',
			data: {
				key: key, ids: 1,
			},
			type: 'get',
			success: function(data) {
			}
		});
		$(object.parentNode.parentNode).hide('fast');
	}
	like_sql.onclick = function() {
		add_block_hiden(4);
		let input_text = document.querySelector("#input_text").value;
		let clear_product = document.querySelector(".product");
		clear_product.innerHTML = "";
		$.ajax({
			url: '../get_category.php',
			data: {
				search: input_text
			},
			type: 'post',
			success: function(data) {
				create_product(JSON.parse(data));
			}
		});
	}
	function get_zaivka() {
		let clear_product = document.querySelector(".product");
		clear_product.innerHTML = "";
		$.ajax({
			url: '../get_zaivka.php',
			dataType: 'json',
			type: 'post',
			success: function(data) {
				console.log(data);
				create_zaivka(data);
			}
		});
	}

	function create_zaivka(data) {
		let fasElement = document.querySelector(".product");
		fasElement.innerHTML = "";
		const groupedData = data.reduce((acc, curr) => {
			const id = curr.id;
			if (!acc[id]) {
				acc[id] = [];
			}
			acc[id].push(curr);
			return acc;
		}, {});
		const arr = Object.values(groupedData);
		console.log(arr);
		for (i = 0; i !== arr.length; i++) {
			let newElement = document.createElement("div");
			newElement.classList.add("order_block");
			newElement.setAttribute("data-id", arr[i][0]["id"]);
			newElement.innerHTML = '<div><h3>Заявка № ' + arr[i][0]["id"] + '</h3><p>' + arr[i][0]["email"] + '</p><p>' + arr[i][0]["phone"] + '</p></div><div style="text-align: left; justify-content: left;" class="all_item all_item' + arr[i][0]["id"] + '">' + arr[i][0]["text"] + '</div><div class="div_but" style="justify-content: center"><button id="but_delete" class="butt" onclick="zaivkaDelete('+arr[i][0]["id"]+', this)">Решено</button></div>';
			fasElement.appendChild(newElement);
			let Element = document.querySelector(".all_item" + arr[i][0]["id"]);
			
		}
	}
	
	function add_block_hiden(key) {
		doc = document.querySelector("#full_screen");
		history_r = document.querySelector(".history");
		if (key === 1) {
			doc.style.display = "flex";
			document.body.style.overflow = "hidden";
		} else if (key === 0) {
			doc.style.display = "none";
			document.body.style.overflow = "auto";
		} else if (key === 2) {
			history_r.innerHTML = "";
			get_sql();
		} else if (key === 3) {
			let clear_product = document.querySelector(".product");
			clear_product.innerHTML = "";
			get_history();
		} else if (key === 4) {
			let clear_product = document.querySelector(".product");
			clear_product.innerHTML = "";
			history_r.innerHTML = "";
		} else if (key === 10) {
			document.querySelector("#update_prod").style.display = "none";
		} 
	}

	function mask(event) {
		if ("1234567890".indexOf(event.key) == -1) {
			event.preventDefault();
		};
	}

	var input = document.getElementById("input_text");
	input.addEventListener("keyup", function(event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("like_sql").click();
		}
	});
</script>

</html>
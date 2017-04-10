<div id="block-header">
	
	<div id="header-top-block">
	<!-- СПИСОК С НАВИГАЦИЕЙ -->
		<ul id="header-top-menu">
			<li>Ваш город - <span>Баку</span></li>
			<li><a href="about.php">О нас</a></li>
			<li><a href="shops.php">Магазины</a></li>
			<li><a href="contacts.php">Контакты</a></li>
		</ul>
	<!-- ВХОД И РЕГИСТРАЦИЯ -->
		<p id="reg-auth-title" align="right">
			<button class="top-auth">Вход</button>
			<a href="registration.php">Мой аккаунт</a>
		</p>

		<div id="block-top-auth">
			<div class="corner"></div>
			<form action="" method="POST">
				<ul id="input-email-pass">
				<h3>Вход</h3>
				<p id="message-auth">Неверный логин и(или) пароль!</p>
					<li>
						<input id="auth-login" placeholder="Логин или E-mail" type="text" >
						<input id="auth-pass" placeholder="Пароль" type="text" >
						<span id="button-pass-show-hide" class="pass-show"></span>
					</li>
					<ul id="list-auth">
						<li><input type="checkbox" id="rememberme" name="rememberme"><label for="rememberme">Запомнить меня</label></li>
						<li><a href="#" id="remindpass">Забыли пароль?</a></li>
					</ul>
					<!-- <p align="right" id="button-auth"><a href="#">Вход</a></p> -->
					<button id="button-auth"><a href="#">Вход</a></button>
					<p align="right" class="auth-loading"><img src="../img/loading.gif" alt=""></p>


				</ul>
			</form>
		</div>
		
	</div>
	<!-- ЛИНИЯ -->
	<div id="top-line"></div>
	<!-- ЛОГОТИП -->
	<img src="../img/logo.png" id="img-logo" alt="">

	<div id="personal-info">
		<p align="right">Звонок бесплатный</p>
		<h3 align="right">+994 50 799 79 95</h3>
		<img src="../img/phone-icon.png" alt="">
		<p align="right">Режим работы:</p>
		<p align="right">Будние дни: с 9:00 до 18:00</p>
		<p align="right">Суббота, Воскресенье - выходные</p>
		<img src="../img/time-icon.png" alt="">
	</div>
	

	<div id="block-search">
		
		<form method="GET" action="search.php?q=">
			<span></span>
			<input id="input-search" name="q" type="text" placeholder="Поиск среди более 100 000 товаров">

			<input type="submit" id="button-search" value="Поиск">
		</form>

	</div>
</div>

<div id="top-menu">
	<ul >
		<li><img src="../img/shop.png" alt=""><a href="../index.php">Главная</a></li>
		<li><img src="../img/new-32.png" alt=""><a href="">Лидеры продаж</a></li>
		<li><img src="../img/bestprice-32.png" alt=""><a href="">Лидеры продаж</a></li>
		<li><img src="../img/sale-32.png" alt=""><a href="">Распродажа</a></li>
	</ul>

	<p align="right" id="block-basket"><img src="../img/cart-icon.png" alt=""><a href="">Корзина пуста</a></p>

	<div id="nav-line"></div>
</div>
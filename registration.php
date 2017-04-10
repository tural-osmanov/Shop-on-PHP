<?php 
	include('include/db_connect.php');
	include('functions/functions.php');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="trackbar/trackbar.css">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js" defer></script>
	<script type="text/javascript" src="js/jcarousellite_1.0.1.js" defer></script>
	<script type="text/javascript" src="js/jquery.cookie.min.js" defer></script>
	<script type="text/javascript" src="js/shop-script.js" defer></script>
	<script type="text/javascript" src="trackbar/jquery.trackbar.js" defer></script>
	<script type="text/javascript" src="js/jquery.form.js" defer></script>
	<script type="text/javascript" src="js/jquery.validate.js" defer></script>

	<script type="text/javascript" defer>
	$(document).ready(function() {	
		$('#form_reg').validate({
			rules:{
				"#reg_login":{
					required:true,
					minlenght:5,
					maxlenght: 15,
					remote: {
						type:"POST",
						url: "/reg/check_login.php"
					}
				},
				"reg_pass":{
					required: true,
					minlenght: 7,
					maxlenght: 15
				},
				"reg_surname":{
					required: true,
					minlenght: 3,
					maxlenght: 15
				},
				"reg_patronymic":{
					required: true,
					minlenght: 3,
					maxlenght: 25
				},
				"reg_email":{
					required: true,
					email: true
				},
				"reg_phone":{
					required: true
				},
				"reg_address":{
					required: true,
				},
				"reg_captcha":{
					required: true,
					remote: {
						type: "POST",
						url: "/reg/check_captcha.php"
					}
				}


			},

			// ВЫВОДИМЫЕ СООБЩЕНИЯ ПРИ НАРУШЕНИИ

			messages: {
				"reg_login": {
					required: "Укажите Логин!",
					minlenght: "От 5 до 15 символов!",
					maxlenght: "От 5 до 15 символов!",
					remote: "Логин занят!"
				},
				"reg_pass": {
					required: "Укажите Пароль!",
					minlenght: "От 7 до 15 символов!",
					maxlenght: "От 7 до 15 символов!",
				},
				"reg_surname": {
					required: "Укажите вашу Фамилию!",
					minlenght: "От 5 до 15 символов!",
					maxlenght: "От 5 до 15 символов!",
				},
				"reg_name": {
					required: "Укажите ваше Имя!",
					minlenght: "От 3 до 20 символов!",
					maxlenght: "От 3 до 20 символов!",
				},
				"reg_patronymic": {
					required: "Укажите ваше Отчество!",
					minlenght: "От 3 до 20 символов!",
					maxlenght: "От 3 до 20 символов!",
				},
				"reg_email": {
					required: "Укажите свой E-mail!",
					email: "Не корректный E-mail"
				},
				"reg_phone": {
					required: "Укажите номер телефона!",
				},
				"reg_address": {
					required: "Необходимо указать адрес доставки!",
				},
				"reg_captcha": {
					required: "Введите код с картинки!",
					remote: "не верный код проверки!"
				}


			},

			submitHandler: function(form){
				$(form).ajaxSubmit({
					success: function(data){
						if(data == 'true'){
							$("#block-form-registration").fadeOut(300.function(){
								$("#reg_message").addClass("reg_message_good").fadeIn(400).html("Вы успешно зарегестрировались!");
								$("#form_submit").hide();
							});
						} else {
							$("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
						}
					}
				});
			}
		});
	});
	</script>

</head>
<body>
	
	<div id="block-body">
		<?php 
		include("include/block-header.php");
		 ?>

		<div id="block-right">

		<?php 
		include("include/block-category.php");
		include("include/block-parameter.php");
		include("include/block-news.php");
		?>
			

		</div>
		<section id="content">
			<div id="block-registration">
				<h2 class="h2-title">Регистрация</h2>
				<form id="form_reg" action="reg/handler_reg.php" method="POST">
					<!-- <p id="reg_message">Вы успешно заренстрировались!</p> -->
					<div id="block-form-registration">
						<ul id="form-registration">
							<li>
								<label>Логин</label>
								<span class="star">*</span>
								<input type="text" name="reg_login" id="reg_login">
							</li>
							<li>
								<label>Пароль</label>
								<span class="star">*</span>
								<input type="text" name="reg_pass" id="reg_pass">
								<span id="genpass">Сгенерировать</span>
							</li>
							<li>
								<label>Фамилия</label>
								<span class="star">*</span>
								<input type="text" name="reg_surname" id="reg_surname">
							</li>
							<li>
								<label>Имя</label>
								<span class="star">*</span>
								<input type="text" name="reg_name" id="reg_name">
							</li>
							<li>
								<label>Отчество</label>
								<span class="star">*</span>
								<input type="text" name="reg_patronymic" id="reg_patronymic">
							</li>
							<li>
								<label>E-mail</label>
								<span class="star">*</span>
								<input type="text" name="reg_email" id="reg_email">
							</li>
							<li>
								<label>Телефон</label>
								<span class="star">*</span>
								<input type="text" name="reg_phone" id="reg_phone">
							</li>
							<li>
								<label>Адрес доставки</label>
								<span class="star">*</span>
								<input type="text" name="reg_address" id="reg_address">
							</li>
							<li>
								<div id="block-captcha">
									<img src="reg/reg_captcha" alt="">
									<input type="text" name="reg_captcha" id="reg_captcha">
									<p id="reloadcaptcha">Обновить</p>
								</div>
							</li>
						</ul>
					</div>
					<p align="right"><input type="submit" name="reg_submit" id="form_submit" value="Регистрация"></p>
				</form>
			</div>
		</section>
		
		<?php 
		include("include/block-footer.php");
		 ?>

	</div>

</body>
</html>
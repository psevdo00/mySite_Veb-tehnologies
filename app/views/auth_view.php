<div style="text-align: center; margin-top: 300px; margin-bottom: 600px;">

	<h2> Авторизация </h2>

    <form action="" method="post">
        <div class = "input">
			<label for = "login">Логин: </label>
			<input type = "text" name = "login" id = "login"><br>
			<span id="error_message_login_err" style="color: red;">
				<?php
					if (isset($data['login_err'])){
						echo $data['login_err'].'<br>';
					}
				?>
			</span>
		</div>
        <div class = "input">
			<label for = "password">Пароль: </label>
			<input type = "password" name = "password" id = "password"><br>
			<span id="error_message_password_err" style="color: red;">
				<?php
					if (isset($data['password_err'])){
						echo $data['password_err'].'<br>';
					}
				?>
			</span>
		</div>
		<button>Войти!</button><br><br>
		<span>Еще нет аккаунта?</span>
		<a href = "./reg">Зарегестрируйтесь!</a>
    </form>

</div>
<script src="../mySite/js/no_active_button.js"></script>
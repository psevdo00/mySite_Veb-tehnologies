<div style="text-align: center; margin-top: 300px; margin-bottom: 600px;">

	<h2> Регистрация </h2>

    <form action="" method="post">

        <div class = "input">
				<label for = "fio">ФИО: </label>
				<input type = "text" name = "fio" id = "fio"><br>
				<span id="error_message_fio" style="color: red;">
					<?php

						if (isset($data["error"]['fio'])){

							foreach ($data["error"]['fio'] as $key => $value){

								echo $value.'<br>';

							}

						}

					?>
				</span>
			</div>
            <div class = "input">
				<label for = "email">Email: </label>
				<input type = "text" name = "email" id = "email"><br>
				<span id="error_message_fio" style="color: red;">
					<?php

						if (isset($data["error"]['email'])){

							foreach ($data["error"]['email'] as $key => $value){

								echo $value.'<br>';

							}

						}

					?>
				</span>
			</div>
            <div class = "input">
				<label for = "login">Логин: </label>
				<input type = "text" name = "login" id = "login"><br>
				<span id="error_message_fio" style="color: red;">
					<?php

						if (isset($data["error"]['login'])){

							if (is_array($data["error"]['login'])) {
								foreach ($data["error"]['login'] as $value) {
									echo $value.'<br>';
								}
							} else {
								echo $data["error"]['login'].'<br>';
							}

						}

					?>
				</span>
			</div>
            <div class = "input">
				<label for = "password">Пароль: </label>
				<input type = "password" name = "password" id = "password"><br>
				<span id="error_message_fio" style="color: red;">
					<?php

						if (isset($data["error"]['password'])){

							foreach ($data["error"]['password'] as $key => $value){

								echo $value.'<br>';

							}

						}

					?>
				</span>
			</div>

			<button>Зарегестрироваться!</button><br><br>
			<span>Уже есть аккаунт?</span>
			<a href = "./auth">Авторизуйтесь!</a>

    </form>

</div>
<script src="../mySite/js/no_active_button.js"></script>
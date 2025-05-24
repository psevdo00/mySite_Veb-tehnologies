<div style="text-align: center; margin-top: 300px; margin-bottom: 600px;">

    <form>

        <div class = "input">
				<label for = "fio">ФИО: </label>
				<input type = "text" name = "fio" id = "fio"><br>
				<span id="error_message_fio" style="color: red;">
					<?php

						if (isset($data['fio'])){

							foreach ($data['fio'] as $key => $value){

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

						if (isset($data['fio'])){

							foreach ($data['fio'] as $key => $value){

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

						if (isset($data['fio'])){

							foreach ($data['fio'] as $key => $value){

								echo $value.'<br>';

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

						if (isset($data['fio'])){

							foreach ($data['fio'] as $key => $value){

								echo $value.'<br>';

							}

						}

					?>
				</span>
			</div>

    </form>

</div>
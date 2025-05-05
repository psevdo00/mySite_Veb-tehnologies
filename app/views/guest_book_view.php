<div class = "main_div">

    <div class = "form_info">
    <form method="post">
			<h2>Оставьте отзыв</h2>
		    <div class = "input">
				<label for = "fio">ФИО: </label>
				<input type = "text" name = "fio" id = "fio"><br>
				<span id="error_message_fio" style="color: red;">
					<?php

						if (isset($data['errors']['fio'])){

							foreach ($data['errors']['fio'] as $key => $value){

								echo $value.'<br>';

							}

						}

					?>
				</span>
			</div>
			<div class = "input">
				<label for = "email">Email: </label>
				<input type = "text" name = "email" id = "email"><br>
				<span id="error_message_email" style="color: red;">
					<?php

						if (isset($data['errors']['email'])){

							foreach ($data['errors']['email'] as $key => $value){

								echo $value.'<br>';

							}

						}

					?>
				</span>
			</div>
			<div class = "input">
				<label for = "massage">Введите текст отзыва: </label><br>
				<textarea class = "massage_contact" cols = "50" rows = "10" name = "massage" id = "massage"></textarea>
			</div>
			<button> Отправить </button>
			<button type = "reset">Очистить поля</button>
		</form>
    </div>
    <div class = "reviews">
		<h2 style = "text-align: center">Отзывы</h2>
		<div class = "review">
			<?php

				$messages = $data['message'];
				$messages = array_reverse($messages);
				foreach ($messages as $key => $value) {
					$message = explode(';', $value);
					$message = array_map('trim', $message);

					$date = isset($message[0]) ? $message[0] : '';
					$name = isset($message[1]) ? $message[1] : '';
					$email = isset($message[2]) ? $message[2] : '';
					$comment = isset($message[3]) ? $message[3] : '';

					echo '
					<div class="message">
						<div class="head_message">
							<p class="head_info">(' . $date . ') ' . $name . ' (' . $email . '):</p>
						</div>
						<div class="main_message">
							<p class="info_message">' . $comment . '</p>
						</div>
					</div>';
				}
						
			?>
		</div>
	</div>
</div>



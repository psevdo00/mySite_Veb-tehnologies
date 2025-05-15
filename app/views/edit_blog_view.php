<div class = "post_div">

    <div class = "form_info_post">
    <form method="post" enctype="multipart/form-data">
			<h2 style = "text-align: center;">Создать пост</h2>
		    <div class = "input">
				<label for = "title_post">Тема поста: </label>
				<input type = "text" name = "title_post" id = "title_post"><br>
				<span id="error_message_title_post" style="color: red;">
					<?php

						if (isset($data['errors']['title_post'])){

							foreach ($data['errors']['title_post'] as $key => $value){

								echo $value.'<br>';

							}

						}

					?>
				</span>
			</div>
			<div class = "input">
				<label for = "photo_post">Изображение: </label>
				<input type = "file" name = "photo_post" id = "photo_post"><br>
			</div>
			<div class = "input">
				<label for = "info_post">Введите текст поста: </label><br>
				<textarea class = "massage_contact" cols = "50" rows = "10" name = "info_post" id = "info_post"></textarea>
				<span id="error_message_title_post" style="color: red;">
					<?php

						if (isset($data['errors']['info_post'])){

							foreach ($data['errors']['info_post'] as $key => $value){

								echo '<br>'.$value.'<br>';

							}

						}

					?>
				</span>
			</div>
			<button> Отправить </button>
			<button type = "reset">Очистить поля</button>
		</form>
		<form style = "margin-top: 30px" method="post" enctype="multipart/form-data">
			<div class = "input">
				<p>Добавление поста из CSV файла</p>
				<label for = "csv_file">Выберите файл: </label>
				<input type = "file" name = "csv_file" id = "csv_file"><br><br>
				<button> Отправить </button>
			</div>
		</form>
    </div>
    <div class = "posts">
		<h2 style = "text-align: center">Блог</h2>
		<div class = "post">
			<?php

				$posts = $data['post'];
				foreach ($posts as $postObject) {
					// Получаем данные из объекта Model_post
					$title = $postObject->title_post ?? '';
					$photo = $postObject->photo ?? '';
					$info_post = $postObject->info_post ?? '';

					$date = method_exists($postObject, 'getDate') 
						  ? $postObject->getDate() 
						  : '';

					if ($photo) {

						echo '
						<div class="message">
							<div class="head_message">
								<p class="head_info">'. $title .' ('. $date .'):</p>
							</div>
							<div class="image_container">
								<img class="post_img" src="img/'. htmlspecialchars($photo) .'" alt="">
							</div>
							<div class="main_message">
								<p class="info_message">' . $info_post . '</p>
							</div>
						</div>';

					} else {

						echo '
						<div class="message">
							<div class="head_message">
								<p class="head_info">'. $title .' ('. $date .'):</p>
							</div>
							<div class="main_message">
								<p class="info_message">' . $info_post . '</p>
							</div>
						</div>';

					}

					
				}
						
			?>
		</div>
	</div>
</div>



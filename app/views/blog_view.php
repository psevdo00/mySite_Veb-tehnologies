<div class = "main_div">
<div style = "width: 50%">
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



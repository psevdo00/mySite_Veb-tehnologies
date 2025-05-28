<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Личный блог по принуждению</title>
		<link rel="stylesheet" href="../mySite/css/style.css">
		<link rel="icon" href="../mySite/img/icon.png">
	</head>
	<body>
		<header class = "header">
			<div class="auth-buttons">
				<a id = "btn_reg" href = "./reg"><button>Регистрация</button></a>
				<a id = "btn_auth" href = "./auth"><button>Авторизация</button></a>
				<p id = "txt_user">Пользователь: <span id = "user"></span></p>
				<a id = "a_exit" href = "./exit"><button id = "btn_exit">Выйти</button></a>
			</div>
			<div class = "menu-container">
				<div class="user-menu-wrapper">
					<nav class = "main_menu">
						<ul class = "list_menu">
							<li class = "elem_menu">	
								<a class = "elem_link" href = "./index">Главная работа</a>
							</li>
							<li class = "elem_menu">
								<a class = "elem_link" href = "./person_info">Обо мне</a>
							</li>
							<li class = "elem_menu">					
								<div class = "hyper_list">
									<a class = "elem_link" href = "./hobby">Мои интересы</a>
									<ul class = "list_hobby">
										<li class = "elem_main_menu">
											<a class = "elem_main_link" href = "./hobby#part1">Моё хобби</a>
										</li>
										<li class = "elem_main_menu">
											<a class = "elem_main_link" href = "./hobby#part2">Любимые книги</a>
										</li>
										<li class = "elem_main_menu">
											<a class = "elem_main_link" href = "./hobby#part3">Любимая музыка</a>
										</li>
										<li class = "elem_main_menu">
											<a class = "elem_main_link" href = "./hobby#part4">Любимые фильмы</a>
										</li>
										<li class = "elem_main_menu">
											<a class = "elem_main_link" href = "./hobby#part5">Любимые игры</a>
										</li>
									</ul>
								</div>
							</li>
							<li class = "elem_menu">
								<a class = "elem_link" href = "./study">Учеба</a>
							</li>
							<li class = "elem_menu">
								<a class = "elem_link" href = "./photo_album">Фотоальбом</a>
							</li>	
							<li class = "elem_menu">	
								<a class = "elem_link" href = "./contact">Контакты</a>
							</li>
							<li class = "elem_menu">	
								<a class = "elem_link" href = "./study_text">Тест по дисциплине</a>
							</li>
							
							<li class = "elem_menu">	
								<a class = "elem_link" href = "./guest_book">Гостевая книга</a>
							</li>
							
							<li class = "elem_menu">	
								<a class = "elem_link" href = "./blog">Блог</a>
							</li>
						</ul>
					</nav>
				</div>

				<hr></hr>
					
				<?php
					// Проверяем, существует ли сессия и роль
					if (isset($_SESSION['role'])) {
						
						if ($_SESSION['role'] == "isAdmin") {

							echo '<div class="admin-menu-wrapper">
								<ul class = "admin_list_menu">
									<li class = "elem_menu">	
										<a class = "elem_link" href = "./edit_blog">Редактор блога</a>
									</li>
									<li class = "elem_menu">	
										<a class = "elem_link" href = "./save_message">Сохранить гостевую книгу</a>
									</li>
									<li class = "elem_menu">	
										<a class = "elem_link" href = "./history">История посещений</a>
									</li>
									<li class = "elem_menu">	
										<a class = "elem_link" href = "./statistic">Статистика посещений</a>
									</li>
								</ul>
							</div>';

						}

						if ($_SESSION['role'] == "isUser" || $_SESSION['role'] == "isAdmin") {

							$login = htmlspecialchars($_SESSION['login'], ENT_QUOTES, 'UTF-8');
							
							echo "<script>
								document.getElementById('btn_auth').style.display = 'none';
								document.getElementById('btn_reg').style.display = 'none';
								document.getElementById('txt_user').style.display = 'inline-block';
								document.getElementById('btn_exit').style.display = 'block'; 
								document.getElementById('user').textContent = '$login';
							</script>";
						}

					} else {

						echo "<script>
								document.getElementById('btn_auth').style.display = 'block';
								document.getElementById('btn_reg').style.display = 'block';
								document.getElementById('txt_user').style.display = 'none';
								document.getElementById('btn_exit').style.display = 'none'; 
								document.querySelector('.admin-menu-wrapper').style.display = 'none';
							</script>";

					}

				?>
						
			</div>
		</header>
		<main class = "main_index">
			<?php 
			
				include("app/views/".$content_view); 
				
			?>
		</main>	
        <footer>
			<p>Это подвал сайта. <br> Текущая дата:</p>
			<div id = "current_time"></div>
		</footer>
		<script src="../mySite/js/main.js"></script>
		<script src="../mySite/js/visit_to_page.js"></script>
		<script src="../mySite/js/current_time.js"></script>
	</body>
</html>


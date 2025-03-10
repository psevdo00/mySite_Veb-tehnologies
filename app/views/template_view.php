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
			<div class = "menu">
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
							<a class = "elem_link" href = "./history">История посещений</a>
						</li>
					</ul>
					<hr></hr>
				</nav>
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


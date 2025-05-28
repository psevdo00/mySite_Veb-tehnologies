<?php

	if (!isset($_SESSION['role']) || $_SESSION['role'] == "isUser") {

		header("Location: /mySite/auth");
    	exit();

	}

?>

<h1 class = "title_visit">История просмотра</h1>
			<div class = "visit_container">
				<p class = "visit_text">Количество посещений всего</p>
				<p class = "visit_text">Количество посещений за текущий сеанс</p>
				<div class = "local_visit">
					<p>Главная страница: <span class = "visit_count" id = "visit_index">0</span></p>
					<p>Оба мне: <span class = "visit_count" id = "visit_person_info">0</span></p>
					<p>Мои интересы: <span class = "visit_count" id = "visit_hobby">0</span></p>
					<p>Сведения об учебе: <span class = "visit_count" id = "visit_study">0</span></p>
					<p>Фооальбом: <span class = "visit_count" id = "visit_photo_album">0</span></p>
					<p>Контакты: <span class = "visit_count" id = "visit_contact">0</span></p>
					<p>Тест по дисциплине: <span class = "visit_count" id = "visit_study_test">0</span></p>
				</div>
				<div class = "session_visit">
					<p>Главная страница: <span class = "session_count" id = "session_index">0</span></p>
					<p>Оба мне: <span class = "session_count" id = "session_person_info">0</span></p>
					<p>Мои интересы: <span class = "session_count" id = "session_hobby">0</span></p>
					<p>Сведения об учебе: <span class = "session_count" id = "session_study">0</span></p>
					<p>Фооальбом: <span class = "session_count" id = "session_photo_album">0</span></p>
					<p>Контакты: <span class = "session_count" id = "session_contact">0</span></p>
					<p>Тест по дисциплине: <span class = "session_count" id = "session_study_test">0</span></p>
				</div>
			</div>
            <script src="../mySite/js/display_count_visit.js"></script>
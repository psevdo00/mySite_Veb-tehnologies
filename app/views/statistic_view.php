<?php 

    if (!isset($_SESSION['role']) || $_SESSION['role'] == "isUser") {
        header("Location: /mySite/auth");
        exit();
    }
?>
<h1 style="text-align: center;"></h1>
<div class = "reviews">
	<h2 style = "text-align: center">Посещение</h2>
	<?php
		echo '<div class = "review">';

		$statistic = $data['statistic'];
		$totalPage = $data['totalPage'];
		$page = $data['page'];

		foreach ($statistic as $item) {
			echo '
				<div class="message">
					<div class="head_statistic">
						<p class="head_info">(' . $item->time_statistic . '):</p>
					</div>
					<div class="main_statistic">
						<p class="info_statistic"><strong>Страница:</strong> ' . $item->web_page . '</p>
						<p class="info_statistic"><strong>IP:</strong> ' . $item->ip_address . '</p>
						<p class="info_statistic"><strong>Хост:</strong> ' . $item->host_name . '</p>
						<p class="info_statistic"><strong>Браузер:</strong> ' . $item->browser_name . '</p>
					</div>
				</div>';
			
		}
		echo '</div>';
		if ($totalPage > 1){

			echo '<div class = "pagination">';

				if ($page > 1){

					echo '<a href="?'. $page - 1 .'"> ← Назад </a>';

				}

				for ($i = 1; $i <= $totalPage; $i++){

					echo '<a href="?' . $i . '"' . ($i == $page ? ' class="active"' : '') . '>' . $i . '</a>';

				}

				if ($page < $totalPage){

					echo '<a href="?'. $page + 1 .'"> Вперед → </a>';

				}

			echo '</div>';

		}
	?>
</div>

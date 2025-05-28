<?php

	if (!isset($_SESSION['role']) || $_SESSION['role'] == "isUser") {

		header("Location: /mySite/auth");
    	exit();

	}

?>

<h1 style="text-align: center;"></h1>
<div class = "reviews">
	<h2 style = "text-align: center">Посещение</h2>
	<div class = "review">
		<?php

			$statistic = $data;
			$statistic = array_reverse($data);
			foreach ($statistic as $item) {
				echo '
				<div class="statistic-entry">
					<div class="head_statistic">
						<p class="head_info">(' . $item->time_statistic . ') ' . $item->web_page . ':</p>
					</div>
					<div class="main_statistic">
						<p class="info_statistic"><strong>IP:</strong> ' . $item->ip_address . '</p>
						<p class="info_statistic"><strong>Хост:</strong> ' . $item->host_name . '</p>
						<p class="info_statistic"><strong>Браузер:</strong> ' . $item->browser_name . '</p>
					</div>
					<div class="statistic-separator">---</div>
				</div>';
			}

		?>
	</div>
</div>

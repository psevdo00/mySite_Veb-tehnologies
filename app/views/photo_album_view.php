<div class = "photo">
				<h1 class = "photos_title">Фотоальбом</h1>			
				<div id = "container" class = "photo_cards">
					<?php

						$count_photo = $data[0];
						for($i = 0; $i < sizeof($count_photo); $i++) {

							echo '<div class = "photo_card"><img src = "'.$data[0][$i].'" title = "'.$data[1][$i].'" class = "photo_img"><p class = "photo_title">'.$data[1][$i].'</p></div>';

						}

					?>
				</div>
				<div id = "largeContainer" class = "modal">
					<span id = "close" class = "close">&times;</span>
					<img id = "largeImage" class = "modal_photo">
				</div>
			</div>
            <!--<script src = "../mySite/js/photo_block.js"></script>-->
		    <script src = "../mySite/js/small-large_photo.js"></script>
<div class = "person_info">
				<div class = "person_text">	
					<?php 
						// echo "<pre>";
						// print_r($data);
						// echo "</pre>";
					?>
				

					<h1 class = "person_title">Результаты теста</h1>
					<p>Вопрос 1: </p>
					<p>
						<?php

							if (!isset($data["err"]['quest1_1'])){

								echo "Вы ответили верно!";

							} else {

								foreach ($data["err"]['quest1_1'] as $key => $value){

									echo $value.'<br>';
	
								}

							} 

						?>
					</p>
                    <p>Вопрос 2: </p>
					<p>
						<?php

							if (!isset($data["err"]['quest2'])){

								echo "Вы ответили верно!";

							} else {

								foreach ($data["err"]['quest2'] as $key => $value){

									echo $value.'<br>';
	
								}

							}

						?>
					</p>
					<p>Вопрос 3: </p>
					<p>
						<?php

							if (!isset($data["err"]['quest3'])){

								echo "Вы ответили верно!";

							} else {

								foreach ($data["err"]['quest3'] as $key => $value){

									echo $value.'<br>';
	
								}

							}

						?>
					</p>
				</div>
				<br>
				<form method="POST">

					<label for="result">Сохранить ответы в базе данных!</label><br>

					<?php
						echo '<input type="hidden" name="date" value="'.$data["ask"]["date"].'">
							<input type="hidden" name="ask1" value="'.array_values($data["ask"])[1].'">
							<input type="hidden" name="ask2" value="'.$data["ask"]["quest2"].'">
						 	<input type="hidden" name="ask3" value="'.$data["ask"]["quest3"].'">
							<input type="hidden" name="fio" value="'.$data["ask"]["fio"].'">'
					?>

					<button>Сохранить!</button>

				</form>
			</div>
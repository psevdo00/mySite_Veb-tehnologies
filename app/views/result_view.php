<div class = "person_info">
				<div class = "person_text">	
					<?php 
						echo "<pre>";
						print_r($data);
						echo "</pre>";
					?>
				
					<h1 class = "person_title">Результаты теста</h1>
					<p>Вопрос 1: </p>
					<p>
						<?php

							if (!isset($data['quest1_1'])){

								echo "Вы ответили верно!";

							} else {

								foreach ($data['quest1_1'] as $key => $value){

									echo $value.'<br>';
	
								}

							} 

						?>
					</p>
                    <p>Вопрос 2: </p>
					<p>
						<?php

							if (!isset($data['quest2'])){

								echo "Вы ответили верно!";

							} else {

								foreach ($data['quest2'] as $key => $value){

									echo $value.'<br>';
	
								}

							}

						?>
					</p>
					<p>Вопрос 3: </p>
					<p>
						<?php

							if (!isset($data['quest3'])){

								echo "Вы ответили верно!";

							} else {

								foreach ($data['quest3'] as $key => $value){

									echo $value.'<br>';
	
								}

							}

						?>
					</p>
				</div>
			</div>
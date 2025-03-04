<div class = "test">
				<h1 class = "test_title">Тест по дициплине "Основы программирования и алгоритмические языки"</h1>
				<form id = "student_test" action = "" onsubmit = "return handleSubmit()">
					<div class = "question">	
						<h4 class = "question_title">Вопрос 1:</h4>
						<p>Цикл с постусловием может ни разу не выполниться?</p>
						<label class = "contain_quest">
							<input type = "checkbox" id = "quest1_1" value = "Правда">
							<span class = "checkmark"></span>
						Правда </label>
						<label class = "contain_quest">
							<input type = "checkbox" id = "quest1_2" value = "Ложь">
							<span class = "checkmark"></span>
						Ложь </label>
					</div>
					<div class = "question">
						<h4 class = "question_title">Вопрос 2:</h4>
						<p>Что выведет данный код:</p> 
						<p class = "program_code">s = 14,05735; <br> printf("%08.3f", s);</p>
						<select class = "list_quest" id = "quest2" required>
							<option value = "" hidden>Выбрать</option>
							<optgroup label = "Целое число">
								<option>14</option>
								<option>0014</option>
								<option>014</option>
							</optgroup>
							<optgroup label = "Число с плавающей запятой">
								<option>14,05735</option>
								<option>0014,057</option>
								<option>14,057</option>
							</optgroup>
						</select>
					</div>
					<div class = "question">
						<h4 class = "question_title">Вопрос 3:</h4>
						<p>Что позволяет выполнить определенный участок кода несколько раз?</p>
						<input type = "text" class = "ask_quest" placeholder = "Введите ответ" id = "quest3" required>
						<span id="error_message" style="color: red;"></span>
					</div>
					<div class = "info_student">
						<label for = "message">Введите ваше ФИО: </label>
						<input type = "text" name = "fio" id = "message" required>
						<p>Выберете вашу учебную группу: </p>
						<select class = "list_group" id = "group" name = "group" required>
							<option value = "">Выбрать</option>
							<optgroup label = "1-й курс">
								<option>ИТ/б-24-1-о</option>
								<option>ИТ/б-24-2-о</option>
								<option>ИТ/б-24-3-о</option>
								<option>ИТ/б-24-4-о</option>
							</optgroup>
							<optgroup label = "2-й курс">
								<option>ИТ/б-23-1-о</option>
								<option>ИТ/б-23-2-о</option>
								<option>ИТ/б-23-3-о</option>
								<option>ИТ/б-23-4-о</option>
							</optgroup>
							<optgroup label = "3-й курс">
								<option>ИС/б-22-1-о</option>
								<option>ИС/б-22-2-о</option>
								<option>ПИН/б-22-3-о</option>
								<option>ПИН/б-22-4-о</option>
							</optgroup>
							<optgroup label = "4-й курс">
								<option>ИС/б-21-1-о</option>
								<option>ИС/б-21-2-о</option>
								<option>ПИН/б-21-3-о</option>
								<option>ПИН/б-21-4-о</option>
							</optgroup>
						</select>
					</div>
					<div class = "button_test">
						<button type = "submit">Отправить</button>
						<button type = "reset">Очистить поля</button>
					</div>
				</form>
			</div>
            <script src="../mySite/js/study_test.js"></script>
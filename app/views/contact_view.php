<div class = "contact">
	<h1 class = "contact_title">Отправить свои данные</h1>
    <div class = "student_form">
		<form id = "student_form" action = "" onsubmit = "return handleSubmit()">
		    <div class = "input">
				<label for = "fio">ФИО: </label>
				<input type = "text" name = "fio" id = "fio" required><br>
				<span id="error_message_fio" style="color: red;"></span>
			</div>
			<div class = "input">
				<span>Пол: </span>
				<label class = "radio-button">
					<input type = "radio" name = "gender" value = "Мужской"> Муж.
				</label>
			    <label class = "radio-button">
					<input type = "radio" name = "gender" value = "Женский"> Жен.
				</label>
			</div>
			<div class = "input">
				<span>Возраст: </span>
				<select id = "age" name = "age" required>
					<option value = "">Выбрать</option>
					<option>16</option>
					<option>17</option>
					<option>18</option>
					<option>19</option>
					<option>20</option>
					<option>21</option>
					<option>22</option>
					<option>23</option>
					<option>24</option>
					<option>25</option>
				    <option>26</option>
					<option>27</option>
					<option>28</option>
					<option>29</option>   
					<option>30</option>
				</select>
			</div>
			<div class = "input" id = "input">
				<span>Дата рождения: </span>
				<input class = "date_of_birth" id = "date_of_birth" required>
				<div class = "calendar" id = "calendar">
					<div class = "choose_year_month">
						<div class = "lists">
							<select id = "months">
								<option class = "month" value = "0">January</option>
								<option class = "month" value = "1">February</option>
								<option class = "month" value = "2">March</option>
								<option class = "month" value = "3">April</option>
								<option class = "month" value = "4">May</option>
								<option class = "month" value = "5">June</option>
								<option class = "month" value = "6">July</option>
								<option class = "month" value = "7">August</option>
								<option class = "month" value = "8">September</option>
								<option class = "month" value = "9">October</option>
								<option class = "month" value = "10">November</option>
								<option class = "month" value = "11">December</option>
							</select>
							<select id = "years" class = "years"></select>
						</div>
					</div>
					<hr>
					<div class = "days">
						<div id = "choose_day" class = "choose_day"></div>
					</div>
				</div>
			</div>
			<div class = "input">
				<label for = "num_phone">Номер телефона: </label>
				<input class = "phone_input" type = "text" name = "num_phone" id = "num_phone" required>
				<span id="error_message_phone" style="color: red;"></span>
			</div>
			<div class = "input">
				<label for = "email">Email: </label>
				<input type = "text" name = "email" id = "email" required><br>
				<span id="error_message_email" style="color: red;"></span>
			</div>
			<div class = "input">
				<label for = "massage">Введите текст: </label><br>
				<textarea class = "massage_contact" cols = "50" rows = "10" name = "massage" id = "massage"></textarea>
			</div>
			<button id = "submit" type = "submit" disabled> Отправить </button>
			<button type = "reset">Очистить поля</button>
		</form>
	</div>
</div>
<script src="../mySite/js/handle_submit.js"></script>
<script src="../mySite/js/calendar.js"></script>
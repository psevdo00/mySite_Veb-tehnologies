const selects = document.getElementById('years');

const day_need = [
	"Su",
	"Mo",
	"Tu",
	"We",
	"Th",
	"Fr",
	"Sa"
];

for (let i = 1900; i < 2025; i++){
	const options = document.createElement('option');
	options.textContent = i;
	options.value = i;
	if (i === 2008){
		options.selected = true;
	}
	selects.appendChild(options);
}

const day_container = document.getElementById('choose_day');
const month_selects = document.getElementById('months');
const year_selects = document.getElementById('years');
const input = document.querySelector('.date_of_birth');
const calendar = document.querySelector('.calendar');

const print_day = () => {
	const selected_month = parseInt(month_selects.value);
	const year = parseInt(year_selects.value);
	day_container.innerHTML = '';
	
	if (!isNaN(selected_month) && !isNaN(year)){
		const days_in_month = new Date(year, selected_month + 1, 0).getDate();
		const first_day = new Date(year, selected_month, 1).getDay();
		
		day_need.forEach(days => {
			const dayHead = document.createElement('div');
			dayHead.classList.add("day_head");
			dayHead.textContent = days;
			day_container.appendChild(dayHead);
		})
		
		for (let i = 0; i < first_day; i++){
			const emp = document.createElement('div');
			emp.classList.add('emp');
			day_container.appendChild(emp);
		}
		
		for (let i = 1; i <= days_in_month; i++){
			const day = document.createElement('div');
			day.classList.add("day");
			day.textContent = i;
			
			day.addEventListener('click', () => {
				const select_day = day_container.querySelectorAll('.day.selected');
				select_day.forEach(d => d.classList.remove('selected'));
				
				day.classList.add('selected');
				
				input.value = `${String(i).padStart(2, '0')}.${String(selected_month + 1).padStart(2, '0')}.${year}`;
			});
			
			day_container.appendChild(day);
		}
	}
};

input.addEventListener('focus', () => {
	calendar.style.display = 'block';
	print_day();
});

month_selects.addEventListener('change', print_day);
year_selects.addEventListener('change', print_day);

document.addEventListener('click', (event) => {
	if (!calendar.contains(event.target) && !input.contains(event.target)){
		calendar.style.display = 'none';
	}
});

month_selects.value = "0";
print_day();


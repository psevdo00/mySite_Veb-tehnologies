function update_time() {
	const date = new Date;
	
	let options = {
		day: 'numeric',
		month: 'long',
		year: 'numeric'
	}
	
	const current_date = document.getElementById('current_time');
	
	current_date.textContent = date.toLocaleString("ru", options);
}

setTimeout(update_time, 1000);
update_time();
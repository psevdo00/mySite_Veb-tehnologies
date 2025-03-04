function validatePhone() {
    const phone = document.getElementById('num_phone');
	const phoneInput = document.getElementById('num_phone').value;
    const errorMessage = document.getElementById('error_message_phone');
    const phoneRegex = /^\+([78])\d{10}$/;
    
	if (!phoneInput) {
		phone.style.border = "";
		errorMessage.textContent = "";
	} else if (!phoneRegex.test(phoneInput)) {
        phone.style.border = "2px solid red";
		errorMessage.textContent = "Введите корректный номер телефона.";
        return false;
    } else {
		phone.style.border = "2px solid green";
		errorMessage.textContent = "";
		return true;
	}
}

function validateFIO() {
	const fio = document.getElementById('fio');
	const fioInput = document.getElementById('fio').value.trim();
	const errorMessage = document.getElementById('error_message_fio');
	
	const regex = /^[а-яА-Я]+ [а-яА-Я]+ [а-яА-Я]+$/;
	
	if (!fioInput) {
		phone.style.border = "";
		errorMessage.textContent = "";
	} else if (!regex.test(fioInput)){
		fio.style.border = "2px solid red";
		errorMessage.textContent = "Некоректное ФИО";
		return false;
	} else {
		fio.style.border = "2px solid green";
		errorMessage.textContent = "";
		return true;
	}
}

function validateEmail() {
	const email = document.getElementById('email');
	const emailInput = document.getElementById('email').value;
	const errorMessage = document.getElementById('error_message_email');
	
	const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	
	if (!emailInput) {
		phone.style.border = "";
		errorMessage.textContent = "";
	} else if (!regex.test(emailInput)){
		email.style.border = "2px solid red";
		errorMessage.textContent = "Некоректный адрес эл. почты";
		return false;
	} else {
		email.style.border = "2px solid green";
		errorMessage.textContent = "";
		return true;
	}
}

function validateForm() {
	const fio = validateFIO();
	const phone = validatePhone();
	const email = validateEmail();
	
	const submitButton = document.getElementById("submit");
    if (fio && phone && email) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

document.getElementById("num_phone").addEventListener("blur", function () {
    validatePhone();
    validateForm();
});

document.getElementById("fio").addEventListener("blur", function () {
    validateFIO();
    validateForm();
});

document.getElementById("email").addEventListener("blur", function () {
    validateEmail();
    validateForm();
});

function sendMail() {
	
    let fio = document.getElementById('fio').value.trim();
    let gender = document.querySelector('input[name="gender"]:checked').value;
    let age = document.getElementById('age').value;
	let date_dirth = document.getElementById('date_of_birth').value.trim();;
    let email = document.getElementById('email').value.trim();
	let phone = document.getElementById('num_phone').value.trim();
	let massage = document.getElementById('massage').value;
	
	let _age;
	if (age % 10 == 1 && age != 11) {
        _age = "год";
    } else if (age % 10 >= 2 && age % 10 <= 4 && !(age >= 12 && age <= 14)) {
        _age = "года";
    } else {
        _age = "лет";
    }
	
    let body = "ФИО: " + encodeURIComponent(fio) + "%0D%0A" +
               "Пол: " + encodeURIComponent(gender) + "%0D%0A" +
               "Возраст: " + encodeURIComponent(age) + "%20" + encodeURIComponent(_age) + "%0D%0A" +
			   "Дата рождения: " + encodeURIComponent(date_dirth) + "%0D%0A" +
			   "Номер телефона: " + encodeURIComponent(phone) + "%0D%0A" +
               "Email: " + encodeURIComponent(email) + "%0D%0A" + "%0D%0A" +
			   encodeURIComponent(massage);

    let mailtoLink = "mailto:djcnbrjd.012535@gmail.com?subject=Информация%20о%20студенте&body=" + body;

    window.location.href = mailtoLink;
}

function handleSubmit() {
    if (validateForm()) {
        sendMail();
    }
    return false;
}
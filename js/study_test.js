function validateAnswer() {
	const answerInput = document.getElementById('quest3').value.trim();
	const errorMessage = document.getElementById('error_message');
   
    const floatRegex = /^[+-]?\d+(\.\d+)?$/;

	if (floatRegex.test(answerInput)) {
		errorMessage.textContent = "Введите корректный ответ!";
		document.getElementById('quest3').focus();
		return false;
    }
	
	errorMessage.textContent = "";
    return true;
}


function sendMail() {
    let fio = document.getElementById('message').value;
    let group = document.querySelector('#group').value;
    let q1_1 = document.getElementById('quest1_1').checked
	let q1_2 = document.getElementById('quest1_2').checked;
    let q2 = document.getElementById('quest2').value;
	let q3 = document.getElementById('quest3').value;
	
	let q1 = "";
	if (q1_1 && q1_2) {
		q1 = "Неопределенность";
	} else if (q1_1 && !q1_2) {
		q1 = "Правда";
	} else if (q1_2 && !q1_1) {
		q1 = "Ложь";
	} else  {
		q1 = "Без ответа";
	}
	
    let body = "ФИО: " + encodeURIComponent(fio) + "%0D%0A" +
               "Учебная группа: " + encodeURIComponent(group) + "%0D%0A" +
               "Ответ на первый вопрос: " + encodeURIComponent(q1) + "%0D%0A" +
               "Ответ на второй вопрос: " + encodeURIComponent(q2) + "%0D%0A" +
			   "Ответ на третий вопрос: " + encodeURIComponent(q3);

    let mailtoLink = "mailto:djcnbrjd.012535@gmail.com?subject=Информация%20о%20тесте&body=" + body;

    window.location.href = mailtoLink;
  }
  
function handleSubmit() {
    if (validateAnswer()) {
        sendMail();
		
    }
    return false;
}
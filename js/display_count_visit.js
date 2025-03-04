function displayVisitCount() {
	let study_textCount = localStorage.getItem('study_textCount');
	let study_textSessCount = sessionStorage.getItem('study_textSessCount');
	let indexCount = localStorage.getItem('indexCount');
	let indexSessCount = sessionStorage.getItem('indexSessCount');
	let person_infoCount = localStorage.getItem('person_infoCount');
	let person_infoSessCount = sessionStorage.getItem('person_infoSessCount');
	let hobbyCount = localStorage.getItem('hobbyCount');
	let hobbySessCount = sessionStorage.getItem('hobbySessCount');
	let studyCount = localStorage.getItem('studyCount');
	let studySessCount = sessionStorage.getItem('studySessCount');
	let photo_albumCount = localStorage.getItem('photo_albumCount');
	let photo_albumSessCount = sessionStorage.getItem('photo_albumSessCount');
	let contactCount = localStorage.getItem('contactCount');
	let contactSessCount = sessionStorage.getItem('contactSessCount');
	
	if (!indexCount) indexCount = 0;
	if (!indexSessCount) indexSessCount = 0;
	if (!person_infoCount) person_infoCount = 0;
	if (!person_infoSessCount) person_infoSessCount = 0;
	if (!hobbyCount) hobbyCount = 0;
	if (!hobbySessCount) hobbySessCount = 0;
	if (!studyCount) studyCount = 0;
	if (!studySessCount) studySessCount = 0;
	if (!photo_albumCount) photo_albumCount = 0;
	if (!photo_albumSessCount) photo_albumSessCount = 0;
	if (!contactCount) contactCount = 0;
	if (!contactSessCount) contactSessCount = 0;
	if (!study_textCount) study_textCount = 0;
	if (!study_textSessCount) study_textSessCount = 0;
	
	document.getElementById('visit_index').textContent = indexCount;
	document.getElementById('session_index').textContent = indexSessCount;
	document.getElementById('visit_person_info').textContent = person_infoCount;
	document.getElementById('session_person_info').textContent = person_infoSessCount;
	document.getElementById('visit_hobby').textContent = hobbyCount;
	document.getElementById('session_hobby').textContent = hobbySessCount;
	document.getElementById('visit_study').textContent = studyCount;
	document.getElementById('session_study').textContent = studySessCount;
	document.getElementById('visit_photo_album').textContent = photo_albumCount;
	document.getElementById('session_photo_album').textContent = photo_albumSessCount;
	document.getElementById('visit_contact').textContent = contactCount;
	document.getElementById('session_contact').textContent = contactSessCount;
	document.getElementById('visit_study_test').textContent = study_textCount;
	document.getElementById('session_study_test').textContent = study_textSessCount;
}

displayVisitCount();
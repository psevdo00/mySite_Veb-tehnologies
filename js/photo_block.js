const fotos = [
	"../mySite/img/cat_and_moon.jpg",
	"../mySite/img/boloto.jpg",
	"../mySite/img/romashka.jpg",
	"../mySite/img/head.jpg",
	"../mySite/img/floor.jpg",
	"../mySite/img/lavanda.jpg",
	"../mySite/img/picture_art.jpg",
	"../mySite/img/rosa.jpg",
	"../mySite/img/stone_home.jpg",
	"../mySite/img/Yellow_bool.jpg",
	"../mySite/img/second_romashka.jpg",
	"../mySite/img/sky.jpg",
	"../mySite/img/star_sky.jpg",
	"../mySite/img/sakura.jpg",
	"../mySite/img/dragon.jpg"
]

const titles = [
	"Кот на фоне луны",
	"Болото с камышами",
	"Ромашка под стеклом",
	"Каменная арка в виде сердца",
	"Букет цветов",
	"Лавандовое поле",
	"Картина современного искусства",
	"Роза с капельками росы",
	"Каменный дом на полуострове",
	"Желтое неведомое существо",
	"Ромашки с капельками росы",
	"Облачное небо",
	"Звездное небо",
	"Линия цветущей сакуры",
	"Золотой дракон"
] 

const container = document.getElementById('container');

const numberOfDivs = 15; 

for (let i = 0; i < numberOfDivs; i++) {

    const newDiv = document.createElement('div');
	newDiv.classList.add('photo_card');
	
	const img = document.createElement('img');
	const imgLarge = document.createElement('img');
    img.src = fotos[i];
    img.title = titles[i];
    img.classList.add('photo_img');
	
	const title = document.createElement('p');
    title.textContent = titles[i];
    title.classList.add('photo_title');
	
	newDiv.appendChild(img);
    newDiv.appendChild(title);

    container.appendChild(newDiv);
}



const fotos = [
	"../assets/img/cat_and_moon.jpg",
	"../assets/img/boloto.jpg",
	"../assets/img/romashka.jpg",
	"../assets/img/head.jpg",
	"../assets/img/floor.jpg",
	"../assets/img/lavanda.jpg",
	"../assets/img/picture_art.jpg",
	"../assets/img/rosa.jpg",
	"../assets/img/stone_home.jpg",
	"../assets/img/Yellow_bool.jpg",
	"../assets/img/second_romashka.jpg",
	"../assets/img/sky.jpg",
	"../assets/img/star_sky.jpg",
	"../assets/img/sakura.jpg",
	"../assets/img/dragon.jpg"
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



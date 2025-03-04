const book = [
	'"1984"',
	'"Гарри Поттер и филосовский камень"',
	'"Судьба человека"',
	'"Собачье сердце"',
	'"20000 лье под водой"'
];

const film = [
	'"Джанго освобожденный"',
	'"Крестный отец"',
	'"Бойцовский клуб"',
	'"Голодные игры"',
	'"Бегущий в лабиринте"'
];

const container_book = document.getElementById('book_list');
const container_film = document.getElementById('film_list');

container_book.innerHTML += book.join(", ");
container_book.innerHTML += '.';
container_film.innerHTML += film.join(", ");
container_film.innerHTML += '.';
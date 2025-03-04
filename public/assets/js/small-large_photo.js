let modal = document.getElementById("largeContainer");
let modalImg = document.getElementById("largeImage");
let close = document.getElementById("close");

let smallImages = document.querySelectorAll('.photo_img');

smallImages.forEach(imag => {
    imag.addEventListener('click', function() {
        modal.style.display = "block"; // Показываем модальное окно
        modalImg.src = this.src; // Устанавливаем src увеличенного изображения
    });
});

close.addEventListener('click', function() {
    modal.style.display = "none"; // Скрываем модальное окно
});

window.addEventListener('click', function(event) {
    if (event.target == modal) {
        modal.style.display = "none"; // Скрываем модальное окно
    }
});
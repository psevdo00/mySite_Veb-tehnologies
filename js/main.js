(function (){
	const header = document.querySelector('.header');
	window.onscroll = () => {
		if (window.pageYOffset > 50){
			header.classList.add('header_active');
		}
	};
}());
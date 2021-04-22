/*
activa el navegador y lo desactiva dependiendo de la 
posicion que se encuentra en el momento de pulsar el boton o
overlay 
*/
$('#activeNav, .overlay1').click(function () {
	if($('.lateralNav').hasClass('active')){
		$('.lateralNav, .overlay1').removeClass('active');
		$('html').css('overflow-y', 'scroll');
	}
	else{
		$('.lateralNav, .overlay1').addClass('active');
		$('html').css('overflow-y', 'hidden');
	}
});



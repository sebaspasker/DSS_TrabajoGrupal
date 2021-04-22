$('#activeMenu, .overlay1').click(function () {
	if($('.leftSecondMenu').hasClass('active')){
		$('.leftSecondMenu,.menuPalo1, .menuPalo2, .menuPalo3, .overlay1').removeClass('active');
		$('.rightNav, .centerNav, .bottomNav, .minicon').removeClass('remove');
		$('html').css('overflow-y', 'scroll');
	}
	else{
		$('.leftSecondMenu,.menuPalo1, .menuPalo2, .menuPalo3, .overlay1').addClass('active');
		$('.rightNav, .centerNav, .bottomNav, .minicon').addClass('remove');
		$('.mainNav').addClass('bg-active');
		$('html').css('overflow-y', 'hidden');
	}
});

$('#activarBuscador, .overlay2').click(function () {
	if($('.buscador').hasClass('active')){
		$('.buscador, .overlay2').removeClass('active');
		$('html').css('overflow-y', 'scroll');
	}
	else{
		$('.buscador, .overlay2').addClass('active');
		$('html').css('overflow-y', 'hidden');
		$('#inputBuscador').focus();
	}
});




$('.bottomNav, .mainNav').addClass("active2");
$('.bottomNav, .mainNav').removeClass("active1");
$('.centerNav, .mainNav, .minicon').addClass("active");

 // *******************
// ACTIVE NAV FUNCTION
// *******************

$('#activeMenu, .overlay1').click(function () {
	if($('.leftSecondMenu').hasClass('active')){
		$('.leftSecondMenu,.menuPalo1, .menuPalo2, .menuPalo3, .overlay1').removeClass('active');
		$('.rightNav, .centerNav, .bottomNav, .minicon').removeClass('remove');
		$('html').css('overflow-y', 'scroll');
	}
	else{
		$('.leftSecondMenu,.menuPalo1, .menuPalo2, .menuPalo3, .overlay1').addClass('active');
		$('.rightNav, .centerNav, .bottomNav, .minicon').addClass('remove');
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


// *******************
// NAV SCROLL FUNCTION
// *******************

$(window).scroll(function(){
	if(screen.width > 900){
		if ($(this).scrollTop() > 72 &&  $(this).scrollTop() < 110){
			$('.bottomNav, .mainNav').addClass("active1");
			$('.bottomNav, .mainNav').removeClass("active2");
			$('.centerNav, .minicon, .goToTop').removeClass("active");
		}
		else if ($(this).scrollTop() >= 110){
			$('.bottomNav, .mainNav').addClass("active2");
			$('.bottomNav, .mainNav').removeClass("active1");
			$('.centerNav, .mainNav, .minicon').addClass("active");
		}
		else {
			$('.bottomNav, .mainNav').removeClass("active1");
			$('.bottomNav, .mainNav').removeClass("active2");
			$('.centerNav, .mainNav, .minicon').removeClass("active");
		}
	}
});

if ($(this).scrollTop() > 72 &&  $(this).scrollTop() < 110){
	$('.bottomNav, .mainNav').addClass("active1");
	$('.bottomNav, .mainNav').removeClass("active2");
	$('.centerNav, .minicon, .goToTop').removeClass("active");
}
else if ($(this).scrollTop() >= 110){
	$('.bottomNav, .mainNav').addClass("active2");
	$('.bottomNav, .mainNav').removeClass("active1");
	$('.centerNav, .mainNav, .minicon').addClass("active");
}
else {
	$('.bottomNav, .mainNav').removeClass("active1");
	$('.bottomNav, .mainNav').removeClass("active2");
	$('.centerNav, .mainNav, .minicon').removeClass("active");
}

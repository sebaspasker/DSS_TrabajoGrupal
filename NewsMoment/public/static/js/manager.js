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


/*
función que lee la url de un input type file y la coloca
como fondo de un div para poder ser previsualizada 
y mejorar la experiencia de usuario
*/
function readURL(input) {
	if (input.files && input.files[0]) {
	var reader = new FileReader();
	reader.onload = function(e) {
		$('#bluh').css("background", "url('" + e.target.result + "') no-repeat" );
		$('#bluh').css("background-size", "cover" );
		$('#bluh').css("background-position", "center" );
	}
	reader.readAsDataURL(input.files[0]);
	}
}

/*
esto activa la función de arriba cuando detecta que el input 
ha sido modificado
*/
$("#id_imagen").change(function() {
		readURL(this);
});


/*
esta funcón sirve para darle a un text area la misma cantidad de 
lineas que requiere el texto que hay escrito en él en ese momento
para hacer mejor la experiencia de usuario 
*/
function setTextareaHeight(textareas) {
    textareas.each(function () {
        var textarea = $(this);
        if ( !textarea.hasClass('autoHeightDone') ) {
            textarea.addClass('autoHeightDone');
            var extraHeight = parseInt(textarea.css('padding-top')) + parseInt(textarea.css('padding-bottom')), // to set total height - padding size
                h = textarea[0].scrollHeight - extraHeight;
            // init height
            textarea.height('auto').height(h);
            textarea.bind('keyup', function() {
                textarea.removeAttr('style'); // no funciona el height auto
                h = textarea.get(0).scrollHeight - extraHeight;
                textarea.height(h+'px'); // set new height
            });
        }
    })
}

/*
esto activa la función de arriba en cualquier textarea 
*/
$(function(){
  setTextareaHeight($('textarea'));
})





/*
esto activa o desactiva el video
*/
if ($('#siButton').prop('checked')) {
	$('#videoIdentificador').addClass('active')
}
else {
	$('#videoIdentificador').removeClass('active')
}

$('#siButton').click(function () {
	$('#videoIdentificador').addClass('active')
});
$('#noButton').click(function () {
	$('#videoIdentificador').removeClass('active')
});
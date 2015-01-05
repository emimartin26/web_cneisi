$(function() {
	$(".boton_envio").click(function() {
		var nombre = $(".nombre").val();
		email = $(".email").val();
		validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		mensaje = $(".mensaje").val();
		asunto = $(".asunto").val();

		if (nombre == "") {
			$(".nombre").focus();
			return false;
		} else if (email == "" || !validacion_email.test(email)) {
			$(".email").focus();
			return false;
		} else if (mensaje == "") {
			$(".mensaje").focus();
			return false;
		} else if (asunto == ""){
			$(".asunto").focus();
			return false;	
		} else {
			// Si todo paso, aqui ira la llamada AJAX
			$('.ajaxgif').removeClass('hide');
			var datos = 'nombre=' + nombre + '&email=' + email  + '&mensaje=' + mensaje + '&asunto=' + asunto;
			$.ajax({
				type : "POST",
				url : "procesar.php",
				data : datos,
				success : function() {
					$('.ajaxgif').hide("slow");
					$('.msg').text('Mensaje enviado!').addClass('msg_ok').animate({
						'right' : '149px'
					}, 300);
				},
				error : function() {
					$('.ajaxgif').hide();
					$('.msg').text('Hubo un error!').addClass('msg_error').animate({
						'right' : '149px'
					}, 300);
				}
			});
			return false;
		}

	});
})();

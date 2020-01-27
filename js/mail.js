$(".btnEnviar").on("click", function(){
	var nombre   = $(".nombre").val();
	    email     = $(".email").val(),
	    telefono = $(".telefono").val(),
	    mensaje  = $(".mensaje").val();

	var datos = new FormData();

	  datos.append("nombre", nombre);
	  datos.append("email", email);
	  datos.append("telefono", telefono);
	  datos.append("mensaje", mensaje);
	  

	if(nombre == ""){
		$(".ajaxAlertas").html(
		'<div class="callout callout-warning">'
		+'<h4>Atención!</h4>'
		+'<p>No debes dejar el nombre vacío</p>'
		+' </div>');
	}else

	if(email == ""){
		$(".ajaxAlertas").html(
		'<div class="callout callout-warning">'
		+'<h4>Atención!</h4>'
		+'<p>No debes dejar el email vacío</p>'
		+' </div>');
	}else

	if(telefono == ""){
		$(".ajaxAlertas").html(
		'<div class="callout callout-warning">'
		+'<h4>Atención!</h4>'
		+'<p>No debes dejar el teléfono vacío</p>'
		+' </div>');
	}else

	if(mensaje == ""){
		$(".ajaxAlertas").html(
		'<div class="callout callout-warning">'
		+'<h4>Atención!</h4>'
		+'<p>No debes dejar el mensaje vacío</p>'
		+' </div>');
	}else{

		$.ajax({

			url: "ajax/contacto.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if (respuesta == "ok") {

									swal({
					  type: "success",
					  title: "En un momento nos pondremos en contacto contigo",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
						if (result.value) {

						window.location = "mail.html";

						}
					})

				}

		

		    }
	    })
    }

})
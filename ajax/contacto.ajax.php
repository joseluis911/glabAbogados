<?php

require_once "../controladores/contacto.controlador.php";
require_once "../modelos/contacto.modelo.php";

class AjaxContacto{

	public $nombre;
	public $email;
	public $telefono;
	public $mensaje;

	public function ajaxActivarAlerta(){

		$datos = array (
		 "nombre" => $this->nombre,
		 "email" => $this->email,
		 "telefono" => $this->telefono,
		 "mensaje" => $this->mensaje);

		$respuesta = ControladorContacto::ctrCrearContacto($datos);

		if ($respuesta == "ok") {

			$para  = "contacto@glababogados.com";

				// título
				$titulo = 'Ha recibido una nueva consulta';

				// mensaje
				$mensaje = '<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

						<div style="position:relative; margin:auto; width:600px; background:white; padding-bottom:20px">

							<center>

							<img style="padding-top:20px; width:15%" src="http://www.tutorialesatualcance.com/tienda/icon-email.png">


							<h3 style="font-weight:100; color:#999;">HAS RECIBIDO UNA NUEVA CONSULTA</h3>

							<hr style="width:80%; border:1px solid #ccc">

							<h4 style="font-weight:100; color:#999; padding:0px 20px; text-transform:uppercase">De: '.$_POST["nombre"].'</h4>

							<h4 style="font-weight:100; color:#999; padding:0px 20px;">Email: '.$_POST["email"].'</h4>

							<h4 style="font-weight:100; color:#999; padding:0px 20px">Telefono: '.$_POST["telefono"].'</h4>

							<h4 style="font-weight:100; color:#999; padding:0px 20px">Mensaje: '.$_POST["mensaje"].'</h4>

							<hr style="width:80%; border:1px solid #ccc">

							</center>

						</div>

					</div>';



				// Para enviar un correo HTML, debe establecerse la cabecera Content-type
				$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$cabeceras .= 'From: Contacto <contacto@glababogados.com>' . "\r\n";


				// Enviarlo
				$envio = mail($para, $titulo, $mensaje, $cabeceras);



					if(!$envio){

						echo '<script>

							swal({
								  title: "¡ERROR!",
								  text: "¡Ha ocurrido un problema enviando el mensaje!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

					}
		}

		echo $respuesta;

	}
}
















/*=============================================
       CREAR CONTACTO
=============================================*/


if (isset($_POST["nombre"])) {
	$activar = new AjaxContacto();
	$activar -> nombre = $_POST["nombre"];
	$activar -> email = $_POST["email"];
	$activar -> telefono = $_POST["telefono"];
	$activar -> mensaje = $_POST["mensaje"];
	$activar -> ajaxActivarAlerta();
}
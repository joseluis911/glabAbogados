<?php


class ControladorContacto{

	static public function ctrCrearContacto($datos){

		$tabla = "contacto";

		$respuesta = ModeloContacto::mdlCrearContacto($datos, $tabla);

		return $respuesta;
	}
}
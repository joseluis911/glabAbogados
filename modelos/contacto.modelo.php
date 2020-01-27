<?php

require_once "conexion.php";

class ModeloContacto{

	static public function mdlCrearContacto($datos, $tabla) {

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, telefono, mensaje) VALUES (:nombre, :email, :telefono, :mensaje)");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);


			if($stmt->execute()){

				return "ok";	

			}else{

				return "error";
			
			}

			$stmt->close();
			
			$stmt = null;

	}

}
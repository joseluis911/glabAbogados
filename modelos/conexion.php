<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=db759966953.hosting-data.io;dbname=db759966953",
						"dbo759966953",
						"S@ntiago123",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;

	}


}

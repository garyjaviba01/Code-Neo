<?php 
// Datos de Configuracion BD
include("config/config.php");
/*---------------------------------------------------------------------------------------------*/
#Titulo: CONEXION BBDD
/*---------------------------------------------------------------------------------------------*/
#►Descripcion:Clase para la conexion con base de datos
#►Clase: Conexion Backend
class Conexion{
#►Metodo: Para Conectar
	public static function ConectarBDB(){
		// Conexion PDO
		try{
			// Instacio clase PDO
			$conexionPDO = new PDO("mysql:host=".HOST.";dbname=".DB, USUARIO, PASSWORD);
			// Cpatura de la Exepcion
			$conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// Cambio a caracteres latinos
			$conexionPDO->exec("SET CHARACTER SET UTF8");
			// Retorno de la conexion
			return $conexionPDO;

		}catch(PDOException $e){
			//Mensaje de error
			die("Error: ".$e->getMessage());
			// Captura de la linea de error
			echo "Error line: ".$e->getLine();
		}
	}
}

#►Variables:
/*Fin------------------------------------------------------------------------------------------*/
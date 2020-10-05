<?php 
/*----------------------------------------------------------------------*/
#Titulo:CONTROLADOR UTILIDADES
/*----------------------------------------------------------------------*/
#►CLASE CONEXION:c
require_once "conect.php";
#►CLASE MODELO:
class UtilitiesMdl extends Conexion{
	/*-------------------------------------------------------------*/
	//Propiedad para la Conexion interna de la clase
	/*-------------------------------------------------------------*/
	protected static $cnx_BD;
	/*-------------------------------------------------------------*/
	#►Metodo para llamar la conexion de forma static
	/*-------------------------------------------------------------*/
	private static function getConection(){
		// Conexion Estatica
		self::$cnx_BD = Conexion::ConectarBDB();
	}
	/*-------------------------------------------------------------*/
	#►Metodo para cierre de conexion de forma static
	/*-------------------------------------------------------------*/
	private static function closeConection(){
		// Cierre de Conexion
		self::$cnx_BD = null;
	
	}
 	#►Metodo-1: Listado de Departamentos-------------------------------------->
	public function get_departaments_list_mdl($data, $table){
		// Permiso
		if($data == 1){
			// Query
			$sql_query = "SELECT codigo, nombre FROM $table ORDER BY nombre DESC";
			// Conexion
			self::getConection();
			// Objeto Statement
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Validar y ejecutar
			if($stmt->execute()){
				// Retorno de datos
				$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}else{
				// Retorno de Error
				$r = 0;
			}
			// Cierre de conexion
			self::closeConection();
			// Retorno de Respuesta
			return $r;
		}
	}
 	#►Metodo-2: Listado de Ciudad / Departamento------------------------>
	public function get_cities_list_mdl($data, $table){
		// Permiso
		if($data[0] == 1){
			// Query
			$sql_query = "SELECT codigo, nombre FROM $table WHERE departamento = :dep ORDER BY nombre DESC";
			// Conexion
			self::getConection();
			// Objeto Statement
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Paso de valores
			$stmt->bindParam(":dep", $data[1]);
			// Validar y ejecutar
			if($stmt->execute()){
				// Retorno de datos
				$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}else{
				// Retorno de Error
				$r = 0;
			}
			// Cierre de conexion
			self::closeConection();
			// Retorno de Respuesta
			return $r;
		}
	}	
	#►Metodo-3: Listado de Convocatorias-------------------------------------->
	public function get_convos_list_mdl($data, $table){
		// Permiso
		if($data == 1){
			// Query
			$sql_query = "SELECT id, nombre, entidad FROM $table ORDER BY id ASC";
			// Conexion
			self::getConection();
			// Objeto Statement
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Validar y ejecutar
			if($stmt->execute()){
				// Retorno de datos
				$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}else{
				// Retorno de Error
				$r = 0;
			}
			// Cierre de conexion
			self::closeConection();
			// Retorno de Respuesta
			return $r;
		}
	}
	
	public function get_enterprises_mdl($data, $table){
		// Query 
		$sql_query = "SELECT id, razon_social FROM $table ORDER BY id DESC";
		
		// Conexion
		self::getConection();
		
		// Statement
		$stmt = self::$cnx_BD->prepare($sql_query);
		
		// Validar y Ejecutar
		if($stmt->execute()){
		
			// Retorno de datos
			$r = [1, $stmt->fetchAll(PDO::FETCH_ASSOC)];
		
		}else{

			$r = [0, "error"];

		}
		// Cierre de conexion
		self::closeConection();
		// Retorno de Respuesta
		return $r;

	}
	
	
}
#►INSERTAR NUEVO USARIO:

/*Fin-------------------------------------------------------------------*/
?>
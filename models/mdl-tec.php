<?php 
/*------------------------------------------------------------*/
#Titulo:MODELO GESTOR TECNICO
/*------------------------------------------------------------*/
#►CLASE CONEXION:
require_once "conect.php";
#►CLASE CONTROLLER:
class TecnicMdl extends Conexion{
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
	#►OPERACIONES NODO CONVOCATORIAS--------------------------:
 	#►Metodo-1:INSERTAR NUEVA CONVOCATORIA------------------>
	public function add_announcement_mdl($data, $table){
		// Validar permiso
		if($data["per"] == 1){
			// Consulta
			$sql_query = "INSERT INTO $table(id, nombre, fecha_ini, fecha_fin, descripcion, entidad, url) VALUES(0, :nom, :feci, :fece, :des, :ent, :url)";
			// Llamado de conexion
			self::getConection();
			// Statement->
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Paso de Valores
			$stmt->bindParam(":nom", $data["titulo"]);
			$stmt->bindParam(":feci", $data["startfec"]);
			$stmt->bindParam(":fece", $data["endfec"]);
			$stmt->bindParam(":des", $data["descripcion"]);
			$stmt->bindParam(":ent", $data["entidad"]);
			$stmt->bindParam(":url", $data["urlconv"]);
			// Ejecutar y Validar
			if($stmt->execute()){

				$r = 1;
			
			}else{
			
				$r = 0;
			
			}
			// Cierre de conexion
			self::closeConection();
			// Retorno
			return $r;


		}
	}
	public function upd_announcement_mdl($data, $table){
		// Validar permiso
	
			// Consulta
			$sql_query = "UPDATE `convocatoria` SET `nombre` = :nom, `fecha_ini` = :feci, `fecha_fin` = :fece, `descripcion` = :des, `entidad` = :ent, `url` = :url WHERE `convocatoria`.`id` = :cod";
			
			// Llamado de conexion
			self::getConection();
			// Statement->
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Paso de Valores
			$stmt->bindParam(":nom", $data["titulo"]);
			$stmt->bindParam(":feci", $data["startfec"]);
			$stmt->bindParam(":fece", $data["endfec"]);
			$stmt->bindParam(":des", $data["descripcion"]);
			$stmt->bindParam(":ent", $data["entidad"]);
			$stmt->bindParam(":url", $data["urlconv"]);
			$stmt->bindParam(":cod", $data["cod"]);
			// Ejecutar y Validar
			if($stmt->execute()){

				$r = 1;
			
			}else{
			
				$r = 0;
			
			}
			// Cierre de conexion
			self::closeConection();
			// Retorno
			return $r;

	}
	public function del_convo($data, $table){
		// Validar permiso
		
			// Consulta
			$sql_query = "delete from $table where id=:id";
			// Llamado de conexion
			self::getConection();
			// Statement->
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Paso de Valores
			$stmt->bindParam(":id", $data["id"]);
			// Ejecutar y Validar
			if($stmt->execute()){
				echo "Convocatoria eliminada";
			
			}else{
	     echo "Error al eliminar";
			 
			}
			// Cierre de conexion
			self::closeConection();
		
	}
	public function del_per($data, $table){
		// Validar permiso
		
			// Consulta
			$sql_query = "delete from usuarios where cod=:id";
			//echo "delete from usuarios where cod=".$data["id"]."";
			// Llamado de conexion
			self::getConection();
			// Statement->
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Paso de Valores
			$stmt->bindParam(":id", $data["id"]);
			// Ejecutar y Validar
		try{
			if($stmt->execute()){
				echo "usuario eliminado";
			
			}else{
	     echo "Error al eliminar";
			 
			}
		    
		}
		catch(PDOException $e){
		    echo "Error al eliminar";
		}
			// Cierre de conexion
			self::closeConection();
		
	}
	public function updst_per($data, $table){
		// Validar permiso
		
			// Consulta
			$sql_query = "update usuarios set estado=:st where cod=:id";
			// Llamado de conexion
			self::getConection();
			// Statement->
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Paso de Valores
			$stmt->bindParam(":id", $data["id"]);
			$stmt->bindParam(":st", $data["st"]);
			// Ejecutar y Validar
			if($stmt->execute()){
				echo "estado actualizado";
			
			}else{
	     echo "Error al actualizar";
			 
			}
			// Cierre de conexion
			self::closeConection();
		
	}
	#►Metodo-2:LISTADO DE USUARIOS------------------------->
	public function list_users_ctr($data, $table){
		// Permiso
		if($data[0] == 1){
			// QUERY
			$sql_query = "SELECT * FROM $table ORDER BY id DESC";
			// Llamado de conexion
			self::getConection();
			// Statement
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Ejecutar
			if($stmt->execute()){
				// Contar datos
				if($stmt->rowCount() > 0){

					$r = [1, $stmt->fetchAll(PDO::FETCH_ASSOC)];															
				}else{
					$r = [2, "no-data"];
				}
			}else{
				$r = [0, "error"];
			}
			// Cierre de conexion
			self::closeConection();
			// Retorno de respuesta
			return $r;
		}
	}
	#►OPERACIONES NODO PERSONAL-------------------------------:
 	#►Metodo-1:INSERTAR NUEVO USARIO------------------------->
	public function add_user_mdl($data, $table){
		if($data['per'] == 1){
			// Validar Si el usuario ya ha sido creado
			if($this->user_exist($data["email"], $table) > 0){
				// Usuario Existente
				$r = 2;
			
			}else{
				// Zona Horaria
				date_default_timezone_set("America/Bogota");
				$fecha = date("Y-m-d h:i:s");
				// Imagen
				$img = "null";
				// Consulta
				$sql_query = "INSERT INTO $table(cod, usuario, contra, rol, estado, fecha_creacion, tip_ide, num_ide, nombre, email, telefono, direccion, ciudad, imagen, profesion) VALUES (0, :us, :ps, :rol, :es, :fec, :tp, :ide, :nom, :em, :tel, :dir, :ciu, :img, :prof)";
				// Llamado de Conexion
				self::getConection();
				// Statement
				$stmt = self::$cnx_BD->prepare($sql_query);
				$ps_crypt = crypt($data['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				// Paso de valores
				$stmt->bindParam(":us", $data['email']);
				$stmt->bindParam(":ps", $ps_crypt);
				$stmt->bindParam(":rol", $data['rol']);
				$stmt->bindParam(":es", $data['estado']);
				$stmt->bindParam(":fec", $fecha);
				$stmt->bindParam(":tp", $data['tident']);
				$stmt->bindParam(":ide", $data['identificacion']);
				$stmt->bindParam(":nom", $data['nombre']);
				$stmt->bindParam(":em", $data['email']);
				$stmt->bindParam(":tel", $data['telefono']);
				$stmt->bindParam(":dir", $data['direccion']);
				$stmt->bindParam(":ciu", $data['ciudad']);
				$stmt->bindParam(":img", $img);
				$stmt->bindParam(":prof", $data['profesion']);
				// Ejecutar y validar
				if($stmt->execute()){
					// Usuario Creado
					$r = 1;
				}else{
					// Error
					$r = 0;
				}
				
			}
			// Cierre de conexion
			self::closeConection();
			// retorno
			return $r;
		}
	}
	public function upd_user_mdl($data, $table){

		
			// Validar Si el usuario ya ha sido creado
		
				// Zona Horaria
				date_default_timezone_set("America/Bogota");
				$fecha = date("Y-m-d h:i:s");
				// Imagen
				$img = "null";
				// Consulta
				if($data["password"]==""){
				$sql_query = "UPDATE `usuarios` SET `usuario` = :em,  `rol` = :rol, `estado` = :es, `tip_ide` = :tp, `num_ide` = :ide, `nombre` = :nom, `email` = :em, `telefono` = :tel, `direccion` = :dir, `ciudad` = :ciu, `profesion` =:prof WHERE `usuarios`.`cod` = :cod";}
			  else{
			  $sql_query = "UPDATE `usuarios` SET `usuario` = :em, contra=:ps, `rol` = :rol, `estado` = :es, `tip_ide` = :tp, `num_ide` = :ide, `nombre` = :nom, `email` = :em, `telefono` = :tel, `direccion` = :dir, `ciudad` = :ciu, `profesion` =:prof WHERE `usuarios`.`cod` = :cod";}
				// Llamado de Conexion
				self::getConection();
				// Statement
				$stmt = self::$cnx_BD->prepare($sql_query);
				
				// Paso de valores
				$stmt->bindParam(":cod", $data['cod']);
				$stmt->bindParam(":us", $data['email']);
				if($data["password"]!=""){
				$ps_crypt = crypt($data['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$stmt->bindParam(":ps", $ps_crypt);}

				$stmt->bindParam(":rol", $data['rol']);
				$stmt->bindParam(":es", $data['estado']);
				$stmt->bindParam(":tp", $data['tident']);
				$stmt->bindParam(":ide", $data['identificacion']);
				$stmt->bindParam(":nom", $data['nombre']);
				$stmt->bindParam(":em", $data['email']);
				$stmt->bindParam(":tel", $data['telefono']);
				$stmt->bindParam(":dir", $data['direccion']);
				$stmt->bindParam(":ciu", $data['ciudad']);
				$stmt->bindParam(":prof", $data['profesion']);
				// Ejecutar y validar
				if($stmt->execute()){
					// Usuario Creado
					$r = 1;
				}else{
					// Error
					$r = 0;
				}
				
			
			// Cierre de conexion
			self::closeConection();
			// retorno
			return $r;
		
	}

 	#►Metodo-2:LISTADO DE USUARIOS------------------------->
	public function list_users_mdl($data, $table){
		// Permiso
		if($data[0] == 1){
			// QUERY
			$sql_query = "SELECT `usuarios`.*,rol.nombre as nomrol,departamento.codigo as nomdep from usuarios,rol,departamento,ciudad WHERE usuarios.rol=rol.cod and usuarios.ciudad=ciudad.codigo and ciudad.departamento= departamento.codigo and usuarios.rol<>1 ORDER BY usuarios.nombre ASC";
			// Llamado de conexion
			self::getConection();
			// Statement
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Ejecutar
			if($stmt->execute()){
				// Contar datos
				if($stmt->rowCount() > 0){

					$r = [1, $stmt->fetchAll(PDO::FETCH_ASSOC)];															
				}else{
					$r = [2, "no-data"];
				}
			}else{
				$r = [0, "error"];
			}
			// Cierre de conexion
			self::closeConection();
			// Retorno de respuesta
			return $r;
		}
	}
	#►Metodo-Privado-1: VALIDAR NUEVO USARIO---------------------->
	private function user_exist($user, $table){
		// Query
		$sql_query = "SELECT COUNT($table.cod) AS count FROM $table WHERE email = :us";
		// Llamado de conexion
		self::getConection();
		// Objeto Statement
		$stmt = self::$cnx_BD->prepare($sql_query);
		// Paso de valores
		$stmt->bindParam(":us", $user);
		// Ejecutar Consulta
		$stmt->execute();
		// Paso de respuesta
		$count = $stmt->fetch(PDO::FETCH_ASSOC);
		// Cierre de conexion
		self::closeConection();
		// Retorno
		return $count['count'];
	}
	
	
	#►OPERACIONES NODO DERECHO DE PETICION--------------------------------:
 	
 	#►Metodo-1:AGREGAR DERECHO DE PETICION------------>
	public function add_der_p_mdl($data, $table){

		// PARSET DE FECHA RECIBIDO ->
	/**	$fec1 = explode("/", $data['recibido']);
		$fec_rec_time = mktime(intval($fec1[3]), intval($fec1[4]), 0, intval($fec1[1]), intval($fec1[0]), intval($fec1[2]));
		$fec_rec_date = date("Y-m-d h:i:sa", $fec_rec_time);**/
		
		// Query ->
		$sql_query = "INSERT INTO $table(id, fec_rec, fec_lim, res, med_res, id_emp, SIGP, fase) VALUES(0, :recibido, :entregar, :observacion, :medio, :empresa, :sigp, :fase)";
		// Llamado de conexion
		self::getConection();
		// Objeto Statement
		$stmt = self::$cnx_BD->prepare($sql_query);
		// Paso de valores
		$stmt->bindParam(":sigp", $data['sigp']);
		$stmt->bindParam(":fase", $data['fase']);
		$stmt->bindParam(":recibido", $data['recibido']);
		$stmt->bindParam(":empresa", $data['empresa']);
		$stmt->bindParam(":entregar", date($data['entregar']));
		$stmt->bindParam(":medio", $data['medio']);
		$stmt->bindParam(":observacion", $data['observacion']);
		// Ejecutar y validar
		if($stmt->execute()){
			// Usuario Creado
			$r = 1;
			// retorno
			return $r;
		}else{
			// Error
			$r = 0;
			// retorno
			return $r;
		}
		// Cierre de conexion
		self::closeConection();		
	}

	#►Metodo-2:LISTADO DE DERECHOS PETICION------------------------->
	public function list_derp_p_mdl($data, $table){
		// Permiso
		if($data[0] == 1){
			// QUERY
			$sql_query = "SELECT `derechos_peticion`.`id`,DATE_FORMAT(derechos_peticion.fec_rec, '%M %d de %Y %r')as fec_rec,DATE_FORMAT(derechos_peticion.fec_lim, '%M %d de %Y') as fec_lim,derechos_peticion.res,derechos_peticion.med_res,derechos_peticion.id_emp,CONCAT(propuestas.num_rad,'-',propuestas.nom) as SIGP,derechos_peticion.fase,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) AS nom_empresa FROM `derechos_peticion`,propuestas,empresas where derechos_peticion.id_emp=empresas.id and propuestas.id_empresa=empresas.id order by derechos_peticion.fec_rec desc";
			// Llamado de conexion
			self::getConection();
			// Statement
			$stmt = self::$cnx_BD->prepare($sql_query);
			// Ejecutar
			if($stmt->execute()){
				// Contar datos
				if($stmt->rowCount() > 0){

					$r = [1, $stmt->fetchAll(PDO::FETCH_ASSOC)];															
				}else{
					$r = [2, "no-data"];
				}
			}else{
				$r = [0, "error"];
			}
			// Cierre de conexion
			self::closeConection();
			// Retorno de respuesta
			return $r;
		}
	}
	
	#►Metodo-3:EDITAR DERECHOS PETICION------------------------->
	public function editar_der_pet_mdl($data, $table){
		// PARSET DE FECHA RECIBIDO ->
		$fec1 = explode("/", $data['recibido']);
		$fec_rec_time = mktime(intval($fec1[3]), intval($fec1[4]), 0, intval($fec1[1]), intval($fec1[0]), intval($fec1[2]));
		$fec_rec_date = date("Y-m-d h:i:sa", $fec_rec_time);

		// Consulta
		$sql_query = "UPDATE $table SET `SIGP` = :sigp, `med_res` = :medio, `res` = :observacion, `fec_rec` = :recibido, `fec_lim` = :entregar , `id_emp` = :empresa ,fase=:fase where id=:id";
			
		// Llamado de conexion
		self::getConection();
		// Statement->
		$stmt = self::$cnx_BD->prepare($sql_query);
		// Paso de Valores
		$stmt->bindParam(":id", $data['id']);
		$stmt->bindParam(":sigp", $data['sigp']);
		$stmt->bindParam(":fase", $data['fase']);
		$stmt->bindParam(":recibido", $data['recibido']);
		$stmt->bindParam(":empresa", $data['empresa']);
		$stmt->bindParam(":entregar", date($data['entregar']));
		$stmt->bindParam(":medio", $data['medio']);
		$stmt->bindParam(":observacion", $data['observacion']);
		// Ejecutar y Validar
		if($stmt->execute()){

			$r = 1;
		
		}else{
		
			$r = 0;
		
		}
		// Cierre de conexion
		self::closeConection();
		// Retorno
		return $r;
	}
	
	#►Metodo-4:LISTADO CRITERIOS DERECHOS------------------------->
	public function list_criterios_mdl($data){
		// Validar tipo de criterio
		if($data['fase'] == "Viabilidad"){

			$table1 = 'tipos_cri_via';
			$table2 = 'tipos_cri_adi';
			// QUERY
			$sql_query = "SELECT cod, nombre FROM $table1 UNION ALL SELECT cod, nombre FROM $table2 ORDER BY cod DESC";

		}else if($data['fase'] == "Elegibilidad"){
		
			$table = 'tipos_cri_ele';
			// QUERY
			$sql_query = "SELECT * FROM $table";
		}
		// Llamado de conexion
		self::getConection();
		// Statement
		$stmt = self::$cnx_BD->prepare($sql_query);
		// Ejecutar
		if($stmt->execute()){
			// Contar datos
			if($stmt->rowCount() > 0){

				$r = [1, $stmt->fetchAll(PDO::FETCH_ASSOC)];															
			}else{
				$r = [2, "no-data"];
			}
		}else{
			$r = [0, "error"];
		}
		// Cierre de conexion
		self::closeConection();
		// Retorno de respuesta
		return $r; 
	}
	#►Metodo-4:AGREGA DETALLE A DERECHO DE PETCION------------------------->
	public function add_detail_derecho_mdl($data, $table){
		// PARSET DE FECHA RECIBIDO ->
		// Explotar
		$fec_lleg_1 = explode("-", $data['fec_lleg']);
		// Make Time -> Horas, Minutos, Segundos, Mes, dia, año
		$fec_lleg_time = mktime(intval($fec_lleg_1[3]), intval($fec_lleg_1[4]), 0, intval($fec_lleg_1[1]), intval($fec_lleg_1[2]), intval($fec_lleg_1[0]));
		
		$fec_lleg_date = date("Y-m-d h:i:sa", $fec_lleg_time);

		// PARSET DE FECHA ENVIO ->
		// Explotar
		$fec_env_1 = explode("-", $data['fec_resp']);
		// Make Time -> Horas, Minutos, Segundos, Mes, dia, año
		$fec_env_time = mktime(intval($fec_env_1[3]), intval($fec_env_1[4]), 0, intval($fec_env_1[1]), intval($fec_env_1[2]), intval($fec_env_1[0]));
		
		$fec_env_date = date("Y-m-d h:i:sa", $fec_env_time);
		
		// return $fec_lleg_date;

		// Query ->
		$sql_query = "INSERT INTO $table(id, id_der_pet, criterio, envia, llega, fecha, asunto, correo_res, correo_rec_res, fecha_res, asunto_res) VALUES(0, :id_der, :criterio, :cor_env, :cor_lleg, :fec_lleg, :asunto, :cor_resp, :cor_rec_resp, :fec_resp, :asunto_resp)";
		// Llamado de conexion
		self::getConection();
		// Objeto Statement
		$stmt = self::$cnx_BD->prepare($sql_query);
		// Paso de valores
		$stmt->bindParam(":id_der", $data['id_der']);
		$stmt->bindParam(":criterio", $data['criterio']);
		$stmt->bindParam(":cor_env", $data['cor_env']);
		$stmt->bindParam(":cor_lleg", $data['cor_lleg']);
		$stmt->bindParam(":fec_lleg", $fec_lleg_date);
		$stmt->bindParam(":asunto", $data['asunto']);
		$stmt->bindParam(":cor_resp", $data['cor_resp']);
		$stmt->bindParam(":cor_rec_resp", $data['cor_rec_resp']);
		$stmt->bindParam(":fec_resp", $fec_env_date);
		$stmt->bindParam(":asunto_resp", $data['asunto_resp']);
		// Ejecutar y validar
		if($stmt->execute()){
			// Usuario Creado
			$r = 1;
			// retorno
			return $r;

		}else{
			// Error
			$r = 0;
			// retorno
			return $r;
		}
		// Cierre de conexion
		self::closeConection();	
	}
	
	#►Metodo-5:LISTADO DETALLES DERECHOS DE PETICION------------------------->
	public function list_details_der_mdl($data, $table){	
		
		// Query derecho_pet
		$sql_query = "SELECT * FROM $table WHERE id_der_pet=:id_pet";
		
		// Llamado de conexion
		self::getConection();
		
		// Statement
		$stmt = self::$cnx_BD->prepare($sql_query);

		// Parametros
		$stmt->bindParam(":id_pet", $data['derecho_pet']);

		// Ejecutar
		if($stmt->execute()){
			// Contar datos
			if($stmt->rowCount() > 0){

				$r = [1, $stmt->fetchAll(PDO::FETCH_ASSOC)];															
			}else{
				
				$r = [2, "no-data"];
			}
		}else{
			$r = [0, "error"];
		}
		// Cierre de conexion
		self::closeConection();
		// Retorno de respuesta
		return $r; 

	}
	
}

/*Fin---------------------------------------------------------*/
?>
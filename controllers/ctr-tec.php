<?php 
/*------------------------------------------------------------*/
#Titulo:CONTROLADOR GESTOR TECNICO
/*------------------------------------------------------------*/
#►CLASE CONTROLLER:
class TecnicCtr{
	#►OPERACIONES NODO CONVOCATORIAS--------------------------:
 	#►Metodo-1:INSERTAR NUEVA CONVOCATORIA------------------>
	public function add_announcement_ctr($data){
		// Validar Permisos
		if($data["per"] == 1){ 
			// Objeto Model
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->add_announcement_mdl($data, 'convocatoria');
			// Validar Respuestas del Modelo
			if($rm == 1){
				// Convocatoria Creada
				echo json_encode("success");
			
			}else if($rm == 0){
				// Error Consulta
				echo json_encode("error");

			}else{
				// Otros Errores
				echo json_encode("error");

			}
		}
	}
	public function upd_announcement_ctr($data){
		// Validar Permisos
			// Objeto Model
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->upd_announcement_mdl($data, 'convocatoria');
			// Validar Respuestas del Modelo
			if($rm == 1){
				// Convocatoria Creada
				echo json_encode("success");
			
			}else if($rm == 0){
				// Error Consulta
				echo json_encode("error");

			}else{
				// Otros Errores
				echo json_encode("error");

			}
	}
	#►Metodo-1:LISTR USUARIOS------------------------->
	public function list_announcement_ctr($data){
		// Permiso
		if($data == 1){
			// Objeto Modelo
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->list_users_ctr($data, 'convocatoria');
			// Validar respuestas
			if($rm[0] == 0){
				// Retorno error
				echo json_encode("error");
			
			}else if($rm[0] == 1){
			
				// Retorno de datos
				echo json_encode($rm[1]);
			
			}else if($rm[0] == 2){
				// Retorno no datos
				echo json_encode("no-data");

			}else{

				echo json_encode("error");
			
			}
		}
	}

	#►OPERACIONES NODO PERSONAL-------------------------------:
 	#►Metodo-1:INSERTAR NUEVO USARIO------------------------->
	public function add_user_ctr($data){
		// Permiso
		if($data["per"] == 1){
			// Objeto Model
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->add_user_mdl($data, 'usuarios');
			// Validar Respuesas
			if($rm == 0){
			
				echo  json_encode("error");
			
			}else if($rm == 1){

				echo  json_encode("success");

			}else if($rm == 2){
			
				echo  json_encode("exist");
			
			}else{

				echo  json_encode("error");
			
			}
		}
	}
	public function upd_user_ctr($data){
		// Permiso
		
			// Objeto Model
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->upd_user_mdl($data, 'usuarios');
			// Validar Respuesas
			if($rm == 0){
			
				echo  json_encode("error");
			
			}else if($rm == 1){

				echo  json_encode("success");

			}else if($rm == 2){
			
				echo  json_encode("exist");
			
			}else{

				echo  json_encode("error");
			
			}
		
	}
	public function del_convo($data){
		// Permiso
		
			// Objeto Model
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			 $obj_mdl->del_convo($data, 'convocatoria');
			// Validar Respuesas
		
	}
		public function del_per($data){
		// Permiso
		
			// Objeto Model
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			 $obj_mdl->del_per($data, 'convocatoria');
			// Validar Respuesas
		
	}
	public function updst_per($data){
		// Permiso
		
			// Objeto Model
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			 $obj_mdl->updst_per($data, 'convocatoria');
			// Validar Respuesas
		
	}
 	#►Metodo-1:LISTR USUARIOS------------------------->
	public function list_users_ctr($data){
		// Permiso
		if($data == 1){
			// Objeto Modelo
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->list_users_mdl($data, 'usuarios');
			// Validar respuestas
			if($rm[0] == 0){
				// Retorno error
				echo json_encode("error");
			
			}else if($rm[0] == 1){
			
				// Retorno de datos
				echo json_encode($rm[1]);
			
			}else if($rm[0] == 2){
				// Retorno no datos
				echo json_encode("no-data");

			}else{

				echo json_encode("error");
			
			}
		}
	}
	
	#►OPERACIONES NODO DERECHO DE PETICION--------------------------------:
 	
 	#►Metodo-1:AGREGAR DERECHO DE PETICION------------>
	public function add_der_p_ctr($data){
		// Permiso
		if($data['p-der-p'] == 1){
			// Objeto Modelo
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->add_der_p_mdl($data, 'derechos_peticion');
			// Validar Respuesas
			if($rm == 1){
				$r = true;
				echo  json_encode($r);
			
			}else if($rm == 0){

				$r = false;
				echo  json_encode($r);

			}else{

				$r = false;
				echo  json_encode($r);
			
			}

		}

	}
	#►Metodo-2:LISTAR DERECHOS PETICION------------------------->
	public function list_derp_p_ctr($data){
		// Permiso
		if($data == 1){
			// Objeto Modelo
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->list_derp_p_mdl($data, 'derechos_peticion');
			// Validar respuestas
			if($rm[0] == 0){
				// Retorno error
				echo json_encode("error");
			
			}else if($rm[0] == 1){
			
				// Retorno de datos
				echo json_encode($rm[1]);
			
			}else if($rm[0] == 2){
				// Retorno no datos
				echo json_encode("no-data");

			}else{

				echo json_encode("error");
			
			}
		}
	}	
	#►Metodo-3:EDITAR DERECHO PETICION------------------------->	
	public function editar_der_pet_ctr($data){
		
	
			// Objeto Modelo
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->editar_der_pet_mdl($data, 'derechos_peticion');
			
			echo json_encode($rm);

			// Validar Respuesas
			if($rm == 1){
				$r = true;
				echo  json_encode($r);
			
			}else if($rm == 0){

				$r = false;
				echo  json_encode($r);

			}else{

				$r = false;
				echo  json_encode($r);
			
			}

		
	}

	#►Metodo-4:LISTAR CRITERIOS DERECHOS PETICION------------------------->	
	public function list_criterios_ctr($data){
		
		if($data['permiso'] == 1){

			// Objeto Modelo
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->list_criterios_mdl($data);
			// Validar respuestas
			if($rm[0] == 0){
				// Retorno error
				echo json_encode("error");
			
			}else if($rm[0] == 1){
			
				// Retorno de datos
				echo json_encode($rm[1]);
			
			}else if($rm[0] == 2){
				// Retorno no datos
				echo json_encode("no-data");

			}else{

				echo json_encode("error");
			
			}

		}
	}
	#►Metodo-5:AGREGA DETALLE SEGUN DERECHO PETICION------------------------->	
	public function add_detail_derecho_ctr($data){
		// Permiso
		if($data['permiso'] == 1){
			// Objeto Modelo
			$obj_mdl = new TecnicMdl();
			// Ejecutar metodo
			$rm = $obj_mdl->add_detail_derecho_mdl($data, "detalle_derecho_peticion");
			// Validar respuestas			
			if($rm  == 1){
			
				$r = true;
				echo json_encode($r);
			
			}else if($rm == 0){
			
				$r = false;
				echo json_encode($r);
			
			}else{

				$r = false;
				echo json_encode($r);
			
			}
		}
	}

	#►Metodo-6:LISTAR DETALLES SEGUN DERECHOS PETICION------------------------->	
	public function list_details_der_ctr($data){


		if($data['permiso'] == 1){

			// Objeto Modelo
			$obj_mdl = new TecnicMdl();
			// Metodo del modelo
			$rm = $obj_mdl->list_details_der_mdl($data, 'detalle_derecho_peticion');
			// Validar respuestas
			if($rm[0] == 0){
				// Retorno error
				echo json_encode("error");
			
			}else if($rm[0] == 1){
			
				// Retorno de datos
				echo json_encode($rm[1]);
			
			}else if($rm[0] == 2){
				// Retorno no datos
				echo json_encode("no-data");

			}else{

				echo json_encode("error");
			
			}

		}
	}
	
	
	
	

}//END CLASS
/*Fin---------------------------------------------------------*/
?>
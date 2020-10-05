<?php 
/*----------------------------------------------------------------------*/
#Titulo:CONTROLADOR UTILIDADES
/*----------------------------------------------------------------------*/
#►CLASE CONTROLADOR:
class UtilitiesCtr{
 	#►Metodo-1: Listado de Departamentos-------------------------------------->
	public function get_departaments_list_ctr($data){
		// Permiso
		if($data == 1){
			// Objeto Model
			$obj_mdl = new UtilitiesMdl();
			// Paso de valores y respuesta
			$rm = $obj_mdl->get_departaments_list_mdl($data, "departamento");
			// Validar respuesta Modelo
			if($rm == 0){
				// Imprimir Error
				echo json_encode("error");
			
			}else{
				// Imprimir Lista Departamentos
				echo json_encode($rm);
			}
		}
	}	
 	#►Metodo-2: Listado de Ciudad / Departamento------------------------>
	public function get_cities_list_ctr($data){
		// Permiso
		if($data[0] == 1){
			// Objeto Model
			$obj_mdl = new UtilitiesMdl();
			// Paso de valores y respuesta
			$rm = $obj_mdl->get_cities_list_mdl($data, "ciudad");
			// Validar Respuesta Modelo
			if($rm == 0){

				echo json_encode("error");
				
			}else{
				echo json_encode($rm);
			}
		}
	}	
	#►Metodo-3: Listado de Convocatorias-------------------------------------->
	public function get_convos_list_ctr($data){
		// Permiso
		if($data == 1){
			// Objeto Model
			$obj_mdl = new UtilitiesMdl();
			// Paso de valores y respuesta
			$rm = $obj_mdl->get_convos_list_mdl($data, "convocatoria");
			// Validar respuesta Modelo
			if($rm == 0){
				// Imprimir Error
				echo json_encode("error");
			
			}else{
				// Imprimir Lista Departamentos
				echo json_encode($rm);
			}
		}
	}
	#►Metodo-4: Listado de Empresas-------------------------------------->
	public function get_enterprises_ctr($data){
		// Validar Permiso
		if($data == 1){
			// Objeto modelo
			$obj_mdl = new UtilitiesMdl();
			// Paso de valores
			$rm = $obj_mdl->get_enterprises_mdl($data, "empresas");
			// Validar respuesta modelo
			if($rm[0] == 0){
			
				// Error
				echo json_encode("error");

			}else if($rm[0] == 1){
			
				// Imprimir Lista
				echo json_encode($rm[1]);
			
			}else{
				
				echo json_encode("error");
			}
		}
	}
	

} // End Class
#►INSERTAR NUEVO USARIO:

/*Fin-------------------------------------------------------------------*/
?>
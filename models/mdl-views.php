<?php  //session_start();
/*----------------------------------------------------------------------------*/
#Titulo: MODELO DE VISTAS
/*----------------------------------------------------------------------------*/
#►Descripcion: Modelo de las vistas a peticion del controlador
#►Clase:
class ViewsMDL{
	#►Variables:
	#►Metodo-1: Validador de vistas ---------------------------#
	public function validate_views($view){
	   
		// Validar por lista blanca
		if($view == "start" ||  $view == "restore"){
			
			$module = "templates/modules/".$view.".php";

		}
		
		else if(($view == "user-tec" || $view == "user-eval-ele" || $view == "user-eval-via"  || $view == "user-cp" || $view == "user-aux" || $view == "user-master" || $view == "user-aj-abo" || $view == "user-sena") && ( isset($_COOKIE['dash']) && isset($_COOKIE['user_rol']))){
		    
		    $module = "templates/modules/".$view.".php";
		}
		else{
			
			$module = "templates/modules/start.php";

		}
		// Retorno del modulo
		return $module;
	}
}
/*Fin-------------------------------------------------------------------------*/
?>
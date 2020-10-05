<?php //session_start();
/*---------------------------------------------------------------------------*/
#Titulo: CONTROLADOR DE VISTAS
/*---------------------------------------------------------------------------*/
#►Descripcion: Controla las vistas 
#►Clase: Controlador de vistas
class ViewsCTR{
	#►Metodo-1: Llama la vista incial ---------------------------#
	public function get_init_view(){
		include("templates/views.php");
	}
	
	#►Metodo-2: Controlas las vistas GET ---------------------------#
	public function navigation_views(){
		// Validar si esta iniciada la peticion GET por url
		if(isset($_GET['action'])){
			$dt_ctr = $_GET['action'];
		}
		else{ 
		//verificamos si esta iniciada la sesion y redireccionamos al rol de la sesion
		    
		    if(isset($_COOKIE['dash']) && isset($_COOKIE['user_rol']))
		    {
		        if($_COOKIE['user_rol']=="1")
		         {
		             $dt_ctr = "user-master";
		         }
		         else if($_COOKIE['user_rol']=="2")
		         {
		             $dt_ctr = "user-aux";
		         }
		         else if($_COOKIE['user_rol']=="3")
		         {
		             $dt_ctr = "user-eval-ele";
		         }
		         else if($_COOKIE['user_rol']=="4")
		         {
		             $dt_ctr = "user-eval-via";
		         }
		         else if($_COOKIE['user_rol']=="5")
		         {
		             $dt_ctr = "user-tec";
		         }
		         else if($_COOKIE['user_rol']=="6")
		         {
		             $dt_ctr = "user-aj-abo";
		         }
		         else if($_COOKIE['user_rol']=="7")
		         {
		             $dt_ctr = "user-cp";
		         }
		          else if($_COOKIE['user_rol']=="8")
		         {
		              $dt_ctr = "user-sena";
		         }
		    }
		    else
		    {// No- pasar vista por defecto
					$dt_ctr = "start";
		        
		    }
		}
		// Modelo de vistas
		$obj_model_views = new ViewsMDL();
		// Validar vista pedida e incluir vista arrojada
		include $obj_model_views->validate_views($dt_ctr);
	}
}
#►Variables:
/*Fin------------------------------------------------------------------------*/
?>
<?php
/*---------------------------------------------------------------------------------------------*/
#Titulo: AJAX DE EVENTOS
/*---------------------------------------------------------------------------------------------*/
#¶►(Llamado):Controladores◄#
require_once "../../controllers/LoginController.php";
#¶►(Llamado):Modelos◄#
require_once "../../models/LoginModel.php";
#►Descripcion: Se encarga de enviar los datos del filtro al controlador
#►Clase:
class AjaxEventos{
	#►Propiedades:-------------------------------------------------------------
	// Varaible para datos
	public $dataAjax;
	#►Metodo-1: Envia y recibe datos del cotroler 
	public function ajaxLoginUser(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion login para inicio de sesion
		   return LoginControllerCTR::LoginUserCTR($dataController);
	}
	public function ajaxRestore(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion login para inicio de sesion
		   return LoginControllerCTR::RestoreCTR($dataController);
	}
	 
	
}
/*Fin------------------------------------------------------------------------------------------*/
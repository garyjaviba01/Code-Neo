<?php 
/*---------------------------------------------------------------------------------------------*/
#Titulo: CONTROLADOR EVENTOS
/*---------------------------------------------------------------------------------------------*/
#►Descripcion: controla las peticiones del ajax y las respuestas del model
#►Clase: Eventos Controller
class LoginControllerCTR{
	#►Propiedades:
	#►Metodo-1:Envia datos de login al modelo para iniciar sesion
	public static function LoginUserCTR($data)
	         {
			//Pasar datos de envio
			$dataModel = [$data[0], $data[1]];
			//Enviaro datos al modelo y recibir respuesta
		     return LoginMDL::LoginUserMDL($dataModel,"usuarios");
		
	        } 
	public static function RestoreCTR($data)
	         {
			//Pasar datos de envio
			$dataModel = [$data[0]];
			//Enviaro datos al modelo y recibir respuesta
		     return LoginMDL::RestoreMDL($dataModel,"usuarios");
		
	        }          
}
/*Fin------------------------------------------------------------------------------------------*/
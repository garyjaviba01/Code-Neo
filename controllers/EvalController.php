<?php 
/*---------------------------------------------------------------------------------------------*/
#Titulo: CONTROLADOR EVENTOS
/*---------------------------------------------------------------------------------------------*/
#►Descripcion: controla las peticiones del ajax y las respuestas del model
#►Clase: Eventos Controller
class EvalControllerCTR{
	#►Propiedades:
	#►Metodo-1:Envia datos de listar convocatorias
	public static function EvalUserCTR($data)
	         {
			//Pasar datos de envio
			$dataModel = [$data[0]];
			//Enviaro datos al modelo y recibir respuesta
		     return EvalMDL::ListConvocatoriasMDL($dataModel,"convocatoria");
		
	        } 
		public static function EvalUserCTR2($data)
	         {
			//Pasar datos de envio
			$dataModel = [$data[0]];
			//Enviaro datos al modelo y recibir respuesta
		     return EvalMDL::ListConvocatoriasMDL2($dataModel,"convocatoria");
		
	        }         
	public static function DetailConvoCTR($data)
	         {
			//Pasar datos de envio
			$dataModel = [$data[0]];
			//Enviaro datos al modelo y recibir respuesta
		     return EvalMDL::DetailConvoMDL($dataModel,"convocatoria");
		
	        } 
	 	public static function DetailConvoCTR2($data)
	         {
			//Pasar datos de envio
			$dataModel = [$data[0]];
			//Enviaro datos al modelo y recibir respuesta
		     return EvalMDL::DetailConvoMDL2($dataModel,"convocatoria");
		
	        }        
	 public static function listpropCTR($data)
	         {
			//Pasar datos de envio
			$dataModel ;
			//Enviaro datos al modelo y recibir respuesta
		     return EvalMDL::listpropMDL($dataModel,"convocatoria");
		
	        }
	        
	  public static function listpropCTR2($data)
	         {
			//Pasar datos de envio
			$dataModel ;
			//Enviaro datos al modelo y recibir respuesta
		     return EvalMDL::listpropMDL2($dataModel,"convocatoria");
		
	        }
      
	  public static function DataProEvaCTR($data)
	         {
			//Pasar datos de envio
			$dataModel ;
			//Enviaro datos al modelo y recibir respuesta
		     return EvalMDL::DataProEvaMDL($dataModel,"convocatoria");
		
	        } 
	         public static function DataProEvaCTR2($data)
	         {
			//Pasar datos de envio
			$dataModel ;
			//Enviaro datos al modelo y recibir respuesta
		     return EvalMDL::DataProEvaMDL2($dataModel,"convocatoria");
		
	        } 
	  public static function ListadoSubsanacionesCTR($data)
	         {
			//Pasar datos de envio
			$dataModel ;
			//Enviaro datos al modelo y recibir respuesta
		     return EvalMDL::ListadoSubsanacionesMDL($dataModel,"propuestas");
		
	        }            
}
/*Fin------------------------------------------------------------------------------------------*/
<?php
date_default_timezone_set('America/New_York');
// Clase de Conexion
require_once "conect.php";
/*---------------------------------------------------------------------------------------------*/
#Titulo:	MODELO DE EVENTOS
/*---------------------------------------------------------------------------------------------*/
#►Descripcion: Realica las consultas a la bbdd segun peticion del control
#►Clase: Eventos Model
class EvalMDL{
	#►Propiedades:-------------------------------------------------------
	// Propiedad par la conexion
	protected static $cnx_BDB;
	#►Metodo-1:Llamar una conexion con bd
	public static function getConection(){
		//llamado de una coexion
		self::$cnx_BDB = Conexion::ConectarBDB();
	}
	#►Metodo-2:Cerrar conexion con bd
	public static function cierraConexion(){
		//Vaciar la conexion
		self::$cnx_BDB = null;
	}
	
	#►Metodo-3:Convocatorias listado
		public function ListConvocatoriasMDL($objdata, $tabla){
		//Consulta SQL->

		$date=date('Y-m-d');
		$errormessage="No hay convocatorias";
		$title="Listado de convocatorias";
        if($objdata[0]=="1"){
		$sqlQuery = "SELECT * from $tabla";
            
        }
        else if($objdata[0]=="2"){
         $sqlQuery = "SELECT * from $tabla WHERE '$date' < fecha_fin";  
        $errormessage="No hay convocatorias vigentes";
        $title="Listado de convocatorias vigentes";
            
        }
        else {
        $sqlQuery = "SELECT * from $tabla WHERE '$date' > fecha_fin or '$date'=fecha_fin"; 
        
        $errormessage="No hay convocatorias finalizadas";
        $title="Listado de convocatorias finalizadas";
        }
		//Llamado de la conexion
		self::getConection();
		$num=1;
		$response="<table class='table'><thead><tr style='background:#F5F4F3;'><th scope='col'>Id</th><th scope='col'>Nombre</th><th scope='col'>Fecha inicio</th><th scope='col'>Fecha fin</th><th scope='col'>Entidad</th><th scope='col'>Ver</th></tr></thead><tbody>";
		//Preparacion de la consulta
		$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
		$stmt->execute();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $response.="<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['fecha_ini']."</td><td>".$fila['fecha_fin']."</td><td>".$fila['entidad']."</td><td><i class='fa fa-search' style='cursor:pointer;' onclick='DetailConvo(".$fila['id'].")'></i></td></tr>";
        $num++;     
    	    }
    	if($num==1){
       $response.="<tr><td colspan='7'>$errormessage</td></tr>";	    
    	}
        
		//Cierre de conexion
		return "<div style='text-align:center;font-size:20px;margin-bottom:10px;'><b>$title</b></div>".$response;
		self::cierraConexion();
	}
		public function ListConvocatoriasMDL2($objdata, $tabla){
		//Consulta SQL->

		$date=date('Y-m-d');
		$errormessage="No hay convocatorias";
		$title="Listado de convocatorias";
        if($objdata[0]=="1"){
		$sqlQuery = "SELECT * from $tabla";
            
        }
        else if($objdata[0]=="2"){
         $sqlQuery = "SELECT * from $tabla WHERE '$date' < fecha_fin";  
        $errormessage="No hay convocatorias vigentes";
        $title="Listado de convocatorias vigentes";
            
        }
        else {
        $sqlQuery = "SELECT * from $tabla WHERE '$date' > fecha_fin or '$date'=fecha_fin"; 
        
        $errormessage="No hay convocatorias finalizadas";
        $title="Listado de convocatorias finalizadas";
        }
		//Llamado de la conexion
		self::getConection();
		$num=1;
		$response="<table class='table'><thead><tr style='background:#F5F4F3;'><th scope='col'>Id</th><th scope='col'>Nombre</th><th scope='col'>Fecha inicio</th><th scope='col'>Fecha fin</th><th scope='col'>Entidad</th><th scope='col'>Ver</th></tr></thead><tbody>";
		//Preparacion de la consulta
		$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
		$stmt->execute();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $response.="<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['fecha_ini']."</td><td>".$fila['fecha_fin']."</td><td>".$fila['entidad']."</td><td><i class='fa fa-search' style='cursor:pointer;' onclick='DetailConvo2(".$fila['id'].")'></i></td></tr>";
        $num++;     
    	    }
    	if($num==1){
       $response.="<tr><td colspan='7'>$errormessage</td></tr>";	    
    	}
        
		//Cierre de conexion
		return "<div style='text-align:center;font-size:20px;margin-bottom:10px;'><b>$title</b></div>".$response;
		self::cierraConexion();
	}
	public function ListadoSubsanacionesMDL($objdata, $tabla){
		//Consulta SQL->

		
		//$sqlQuery = "SELECT * from $tabla";
        
		//Llamado de la conexion
		//self::getConection();
	
		$response="<table class='table' id='tblsub'><thead><tr><th colspan='8'><input class='form-control' placeholder='Buscar en subsanaciones'  onkeyup=\"TableFilter('#tblsub',this.value)\"></th></tr><tr style='background:#F5F4F3;'><th scope='col'>Id proyecto</th><th scope='col'>Criterio</th><th scope='col'>Fecha</th><th scope='col'>Obsevación</th><th scope='col'>Archivo</th><th scope='col'>folio</th><th scope='col'>Estado</th><th scope='col'>Ver</th></tr></thead><tbody>";
		//Preparacion de la consulta
		/**$stmt = self::$cnx_BDB->prepare($sqlQuery);
		
		$stmt->execute();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $response.="<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['fecha_ini']."</td><td>".$fila['fecha_fin']."</td><td>".$fila['entidad']."</td><td><i class='fa fa-search' style='cursor:pointer;' onclick='DetailConvo(".$fila['id'].")'></i></td></tr>";
        $num++;     
    	    }
    	if($num==1){
       $response.="<tr><td colspan='7'>$errormessage</td></tr>";	    
    	}**/
        $response.="<tr><td><a href='#'>12</a></td><td>camara de comercio</td><td>2020-03-28 17:08:00</td><td>el anexo 1 se encuentra mal scaneado</td><td scope='col'>Certificado camara de comercio</td><td scope='col'>45</td><td><span style='color:red;'>Sin subsanar</span></td><td><i class='fa fa-search' style='cursor:pointer;' onclick=\"window.open('fl-s/ans/test.pdf')\"></i></td></tr>";
        $response.="<tr><td><a href='#'>13</a></td><td>la empresa tiene 2 años </td><td>2020-03-28 18:10:00</td><td>el anexo 2 esta incompleto</td><td scope='col'>Certificación pago parafiscales</td><td scope='col'>48</td><td><span style='color:green;'>Subsanado</span></td><td><i class='fa fa-search' style='cursor:pointer;' onclick=\"window.open('fl-s/ans/test.pdf')\"></i></td></tr>";
        $response.="<tr><td><a href='#'>14</a></td><td>la empresa tiene 30 trabajadores </td><td>2020-03-26 8:00:00</td><td>el anexo 3 le falta una página</td><td scope='col'>Formato de Plan de Transferencia</td><td scope='col'>25</td><td><span style='color:green;'>Subsanado</span></td><td><i class='fa fa-search' style='cursor:pointer;' onclick=\"window.open('fl-s/ans/test.pdf')\"></i></td></tr>";
        $response.="<tr><td><a href='#'>15</a></td><td>el revisor fiscal tiene centrificado </td><td>2020-03-24 9:27:00</td><td>el anexo 5 esta incompleto</td><td scope='col'>Carta postulación</td><td scope='col'>15</td><td><span style='color:red;'>Sin subsanar</span></td><td><i class='fa fa-search' style='cursor:pointer;' onclick=\"window.open('fl-s/ans/test.pdf')\"></i></td></tr>";
		//Cierre de conexion
		return $response;
		self::cierraConexion();
	}
public function DetailConvoMDL($objdata, $tabla){
		//Consulta SQL->

        $sqlQuery = "SELECT * from $tabla WHERE id = '$objdata[0]'"; 

		//Llamado de la conexion
		self::getConection();
		$response="";
		//Preparacion de la consulta
		$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
		$stmt->execute();
		if ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
     
        $response.="<div class='row'><div class='col-sm-12' style='background-color:#FFF;text-align:center;padding:10px 0px;' ><b>Detalles convocatoria ".$fila['nombre']."</b></div><div class='col-sm-6' style='background-color:#F5F4F3;padding:10px 0px;'><b>Id :</b> ".$fila['id']." </div><div class='col-sm-6' style='background-color:#F5F4F3;padding:10px 0px;' ><b>Nombre : </b>".$fila['nombre']."</div><div class='col-sm-6' style='background-color:#FFF;padding:10px 0px;' ><b>Fecha inicio : </b>".$fila['fecha_ini']." </div><div class='col-sm-6' style='background-color:#FFF;padding:10px 0px;padding:10px 0px;' ><b>Fecha finalización  : </b>".$fila['fecha_fin']."</div><div class='col-sm-6' style='background-color:#F5F4F3;padding:10px 0px;' ><b>Descripción : </b>".$fila['descripcion']." </div><div class='col-sm-6' style='background-color:#F5F4F3;padding:10px 0px;' ><b>Entidad : </b>".$fila['entidad']." </div><div class='col-sm-6' style='background-color:#FFF;padding:10px 0px;'><b>Url : </b><a href='".$fila['url']."'>".$fila['url']."</a></div></div>";
        
    	    }
		//Cierre de conexion
		return $response;
		self::cierraConexion();
	}
public function DetailConvoMDL2($objdata, $tabla){
		//Consulta SQL->

        $sqlQuery = "SELECT * from $tabla WHERE id = '$objdata[0]'"; 

		//Llamado de la conexion
		self::getConection();
		$response="";
		//Preparacion de la consulta
		$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
		$stmt->execute();
		if ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
     
        $response.="<div class='row'><div class='col-sm-12' style='background-color:#FFF;text-align:center;height:45px;' ><b>Detalles convocatoria ".$fila['nombre']."</b></div><div class='col-sm-6' style='background-color:#F5F4F3;padding:10px 0px;'><b>Id :</b> ".$fila['id']." </div><div class='col-sm-6' style='background-color:#F5F4F3;padding:10px 0px;' ><b>Nombre : </b>".$fila['nombre']."</div><div class='col-sm-6' style='background-color:#FFF;padding:10px 0px;' ><b>Fecha inicio : </b>".$fila['fecha_ini']." </div><div class='col-sm-6' style='background-color:#FFF;padding:10px 0px;' ><b>Fecha finalización  : </b>".$fila['fecha_fin']."</div><div class='col-sm-6' style='background-color:#F5F4F3;padding:10px 0px;' ><b>Descripción : </b>".$fila['descripcion']." </div><div class='col-sm-6' style='background-color:#F5F4F3;padding:10px 0px;' ><b>Entidad : </b>".$fila['entidad']." </div><div class='col-sm-6' style='background-color:#FFF;padding:10px 0px;'><b>Url : </b><a href='".$fila['url']."'>".$fila['url']."</a></div></div>";
        
    	    }
		//Cierre de conexion
		return $response;
		self::cierraConexion();
	}	
public function comboConvoMDL($objdata){
		//Consulta SQL->

        $sqlQuery = "SELECT * from convocatoria"; 

		//Llamado de la conexion
		self::getConection();
		$response="<option value='0'>Seleccione una convocatoria</option>";
		//Preparacion de la consulta
		$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
		$stmt->execute();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($fila['id']==$objdata){
        $response.="<option value='".$fila['id']."' selected>".$fila['nombre']."</option>";}
        else
        $response.="<option value='".$fila['id']."' >".$fila['nombre']."</option>";
        
    	    }
		//Cierre de conexion
		return $response;
		self::cierraConexion();
	}	
	
	
public function comboporyMDL($objdata){
		
/**
        $sqlQuery = "SELECT * from convocatoria"; 

		//Llamado de la conexion
		self::getConection();**/
		$selected="";
		if($objdata=="0")
		$response="<option value='0'>Seleccione un proyecto</option>";
		//Preparacion de la consulta
		//$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
		/**$stmt->execute();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($fila['id']==$objdata){
        $response.="<option value='".$fila['id']."' selected>".$fila['nombre']."</option>";
    }
        else
        $response.="<option value='".$fila['id']."' >".$fila['nombre']."</option>";
        
    	    }**/
    	     $response.="<option value='1' >Id : 34 - Fecha entrega : 2020-03-23 - Empresa : Empaques Plasticos SAS</option>";
    	     $response.="<option value='2' >Id : 38 - Fecha entrega : 2020-03-24 - Empresa : Todo Frenos</option>";
    	     $response.="<option value='3' selected>Id : 40 - Fecha entrega : 2020-03-23 - Empresa : Chocolateria Florida</option>";
		//Cierre de conexion
		return $response;
		//self::cierraConexion();
	}	
	
public function listpropMDL($objdata, $tabla){
		//Consulta SQL->

		$date=date('Y-m-d');
		
		$title="Asignados";
    
        //$sqlQuery = "SELECT * from $tabla WHERE '$date' > fecha_fin or '$date'=fecha_fin"; 
        
		//Llamado de la conexion
		self::getConection();
		$num=1;
		$response="<table class='table'><thead><tr style='background:#F5F4F3;'><th scope='col'>Fecha recibido</th><th scope='col'>Días para evaluar</th><th scope='col'>Id proyecto</th><th scope='col'>Nit</th><th scope='col'>Empresa</th><th scope='col'>Estado</th><th scope='col'>Evaluar</th></tr></thead><tbody>";
		//Preparacion de la consulta
	//	$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
	//	$stmt->execute();
	//	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

        //$response.="<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['fecha_ini']."</td><td>".$fila['fecha_fin']."</td><td>".$fila['entidad']."</td><td><i class='fa fa-search' style='cursor:pointer;' onclick='DetailConvo(".$fila['id'].")'></i></td></tr>";
        $response.="<tr><td>2020-03-23</td><td>7</td><td><a href='javascript:EvaluarProp()'>34</a></td><td>8909876545-1</td><td>Empaques Plasticos SAS</td><td>Asignado</td><td><i class='fa fa-check-square' style='cursor:pointer;color:green;' onclick=\"tabs_eval_ele('ndeva',$('#btn13'),3)\"></i></td></tr>";
        $response.="<tr><td>2020-03-24</td><td>6</td><td><a href='javascript:EvaluarProp()'>38</a></td><td>8880376545-1</td><td>Todo Frenos</td><td>En evaluación/por subsanar</td><td><i class='fa fa-check-square' style='cursor:pointer;color:green;' onclick=\"tabs_eval_ele('ndeva',$('#btn13'),3)\"></i></td></tr>";
        $response.="<tr><td>2020-03-20</td><td>0</td><td><a href='javascript:EvaluarProp()'>40</a></td><td>8000079745-1</td><td>Chocolateria Florida</td><td>Evaluado</td><td><i class='fa fa-check-square' disabled style='cursor:pointer;color:gray;' onclick=\"alert('Venció el plazo de evaluación')\"></i></td></tr>";
        $num++;     
    /**	    }
    	if($num==1){
       $response.="<tr><td colspan='7'>$errormessage</td></tr>";	    
    	}**/
        
		//Cierre de conexion
		return $response;
		self::cierraConexion();
	}
	
public function listpropMDL2($objdata, $tabla){
		//Consulta SQL->

		$date=date('Y-m-d');
		
		$title="Asignados";
    
        //$sqlQuery = "SELECT * from $tabla WHERE '$date' > fecha_fin or '$date'=fecha_fin"; 
        
		//Llamado de la conexion
		self::getConection();
		$num=1;
		$response="<table class='table'><thead><tr style='background:#F5F4F3;'><th scope='col'>Fecha recibido</th><th scope='col'>Días para evaluar</th><th scope='col'>Id proyecto</th><th scope='col'>Nit</th><th scope='col'>Empresa</th><th scope='col'>Estado</th><th scope='col'>Evaluar</th></tr></thead><tbody>";
		//Preparacion de la consulta
	//	$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
	//	$stmt->execute();
	//	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

        //$response.="<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['fecha_ini']."</td><td>".$fila['fecha_fin']."</td><td>".$fila['entidad']."</td><td><i class='fa fa-search' style='cursor:pointer;' onclick='DetailConvo(".$fila['id'].")'></i></td></tr>";
        $response.="<tr><td>2020-03-23</td><td>7</td><td><a href='javascript:EvaluarProp()'>34</a></td><td>8909876545-1</td><td>Empaques Plasticos SAS</td><td>Asignado</td><td><i class='fa fa-check-square' style='cursor:pointer;color:green;' onclick=\"tabs_eval_via('ndeva',$('#btn113'),3)\"></i></td></tr>";
        $response.="<tr><td>2020-03-24</td><td>6</td><td><a href='javascript:EvaluarProp()'>38</a></td><td>8880376545-1</td><td>Todo Frenos</td><td>En evaluación/por subsanar</td><td><i class='fa fa-check-square' style='cursor:pointer;color:green;' onclick=\"tabs_eval_via('ndeva',$('#btn113'),3)\"></i></td></tr>";
        $response.="<tr><td>2020-03-20</td><td>0</td><td><a href='javascript:EvaluarProp()'>40</a></td><td>8000079745-1</td><td>Chocolateria Florida</td><td>Evaluado</td><td><i class='fa fa-check-square' disabled style='cursor:pointer;color:gray;' onclick=\"alert('Venció el plazo de evaluación')\"></i></td></tr>";
        $num++;     
    /**	    }
    	if($num==1){
       $response.="<tr><td colspan='7'>$errormessage</td></tr>";	    
    	}**/
        
		//Cierre de conexion
		return $response;
		self::cierraConexion();
	}	
public function DataProEvaMDL($objdata, $tabla){
		//Consulta SQL->

		$date=date('Y-m-d');
		
		$title="Asignados";
    
        //$sqlQuery = "SELECT * from $tabla WHERE '$date' > fecha_fin or '$date'=fecha_fin"; 
        
		//Llamado de la conexion
		self::getConection();
		$num=1;
		$response="";
		//Preparacion de la consulta
	//	$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
	//	$stmt->execute();
	//	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

        //$response.="<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['fecha_ini']."</td><td>".$fila['fecha_fin']."</td><td>".$fila['entidad']."</td><td><i class='fa fa-search' style='cursor:pointer;' onclick='DetailConvo(".$fila['id'].")'></i></td></tr>";
        $response.="<div class='row'><div class='col-sm-8' style='background-color:#FFF;height:900px;overflow:auto;' ><table class='table'><thead><tr style='background:#F5F4F3;'><th scope='col'>Descripción requisito</th><th scope='col'>Cumple</th><th scope='col'>Observaciones</th><th scope='col'>Subsanaciones</th></tr></thead><tbody><tr><td>la empresa tiene más de dos años</td><td align='center'><div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' id='switch1'>
          <label class='custom-control-label' for='switch1'></label></div></td><td><textarea class='form-control'>observaciones de criterio</textarea></td><td ><button class='btn-functions btn-functions-active' onclick=\"$('#myModal').modal()\" style='font-size:16px!important;width:130px!important;'> No hay</button></div></td></tr><tr><td>la empresa tiene camara de comercio</td><td align='center'><div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' id='switch3'>
          <label class='custom-control-label' for='switch3'></label></div></td><td><textarea class='form-control'>observaciones de criterio</textarea></td><td><button class='btn-functions' onclick=\"$('#myModal').modal()\" style='font-size:16px!important;background-color:red!important;width:130px!important;color:#FFF!important;'> Sin subsanar : 2</button></td></tr>
          <tr><td>la empresa tiene revisor fiscal</td><td align='center'><div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' id='switch3'>
          <label class='custom-control-label' for='switch3'></label></div></td><td><textarea class='form-control'>observaciones de criterio</textarea></td><td><button class='btn-functions' onclick=\"$('#myModal').modal()\" style='font-size:16px!important;background-color:green!important;width:130px!important;color:#FFF!important;'> Subsanado : 1</button></td></tr>
          <tr style='height:20px;border:1px solid #FFF;'><td colspan='4' style='height:20px;border:1px solid #FFF;'></td></tr><tr style='background-color:#EFF1F2;border-radius:5px;'><td colspan='2'><b>Concepto  : <br></b><textarea style='width:100%;' class='form-control'>Concepto final elegibilidad
</textarea> </td><td colspan='2' ><b>Resultado : </b><br><span style='color:red;'>No Cumple</span></td></tr><tr style='border:1px solid #FFF;'><td colspan='4' style='height:20px;border:1px solid #FFF;' align='center'>
        <button class='btn-functions' onclick='' style='font-size:16px!important;'> Guardar</button><button class='btn-functions' onclick='' style='font-size:16px!important;'> Finalizar</button></td></tr></tbody></table></div><div id='infoProy' class='col-sm-4' style='background-color:#EFF1F2;border-radius:3px;height:900px;overflow:auto;'></div></div>";
       
        $num++;     
    /**	    }
    	if($num==1){
       $response.="<tr><td colspan='7'>$errormessage</td></tr>";	    
    	}**/
        
		//Cierre de conexion
		return $response;
		self::cierraConexion();
	}
	public function DataProEvaMDL2($objdata, $tabla){
		//Consulta SQL->

		$date=date('Y-m-d');
		
		$title="Asignados";
    
        //$sqlQuery = "SELECT * from $tabla WHERE '$date' > fecha_fin or '$date'=fecha_fin"; 
        
		//Llamado de la conexion
		self::getConection();
		$num=1;
		$response="";
		//Preparacion de la consulta
	//	$stmt = self::$cnx_BDB->prepare($sqlQuery);
		//Retorno de de la fila encontrada 
	//	$stmt->execute();
	//	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

        //$response.="<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['fecha_ini']."</td><td>".$fila['fecha_fin']."</td><td>".$fila['entidad']."</td><td><i class='fa fa-search' style='cursor:pointer;' onclick='DetailConvo(".$fila['id'].")'></i></td></tr>";
        $response.="<div class='row'><div class='col-sm-8' style='background-color:#FFF;height:900px;overflow:auto;' ><table class='table'><thead><tr style='background:#F5F4F3;'><th scope='col'>Categoria</th><th scope='col'>Criterio</th><th scope='col'>Puntaje</th><th scope='col'>Concepto</th></tr></thead><tbody><tr><td>Pertinencia</td><td >1</td><td><input type='number' value='0' class='form-control'></td><td ><textarea style='width:100%;' class='form-control'>Concepto de criterio</textarea></td></tr>
        <tr><td>Pertinencia</td><td >N</td><td><input type='number' value='0' class='form-control'></td><td ><textarea style='width:100%;' class='form-control'>Concepto de criterio</textarea></td></tr>
        <tr><td>Resualtados esperados</td><td >1 an</td><td><input type='number' value='0' class='form-control'></td><td ><textarea style='width:100%;' class='form-control'>Concepto de criterio</textarea></td></tr>
        <tr style='height:20px;border:1px solid #FFF;'><td colspan='4' style='height:20px;border:1px solid #FFF;'></td></tr>
        <tr style='background-color:#EFF1F2;'><td colspan='2'><b>Puntaje final : </b></td><td colspan='2'>80 </td></tr>
        <tr style='height:20px;border:1px solid #FFF;'><td colspan='4' style='height:20px;border:1px solid #FFF;'></td></tr>
        <tr style='background-color:#EFF1F2;'><td  colspan='2' ><b>Concepto final :</b></td><td colspan='2'><textarea style='width:100%;' class='form-control'>Concepto final de evaluación</textarea></td></tr>
        <tr style='border:1px solid #FFF;'><td colspan='4' style='height:20px;border:1px solid #FFF;' align='center'>
        <button class='btn-functions' onclick='' style='font-size:16px!important;'> Guardar</button><button class='btn-functions' onclick='' style='font-size:16px!important;'> Finalizar</button></td></tr>
        </tbody></table></div><div id='infoProy' class='col-sm-4' style='background-color:#EFF1F2;border-radius:3px;height:900px;overflow:auto;'></div></div>";
       
        $num++;     
    /**	    }
    	if($num==1){
       $response.="<tr><td colspan='7'>$errormessage</td></tr>";	    
    	}**/
        
		//Cierre de conexion
		return $response;
		self::cierraConexion();
	}
}
/*Fin------------------------------------------------------------------------------------------*/
<?php if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5)){
    //preguntamos dsi existe la sesion para ejecutar el codigo
      
       //configuramos conexion a base de datos      
      function FormatDate2($fecha)
    {
       if($fecha!=NULL ||  $fecha!=""){
        $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $dias = ["", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
        return date("j", strtotime($fecha)) . " de " . $meses[date("n", strtotime($fecha))] . ", " . date("Y", strtotime($fecha));}
        else
        return "";
    }
    $conex=new mysqli("localhost","cpcorien_us_neo","neo2020_","cpcorien_neo_bd",3306);
    $conex->query("SET NAMES 'UTF8'");
    if (mysqli_connect_errno()) {//si hay error en la conexioón
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}
	//consulta SQL
    $consulta="SELECT `conflicto_int`.*,propuestas.nom as propu,CONCAT(empresas.nit,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod  ORDER by propuestas.nom ASC";
    $resultado = $conex->query($consulta);
	// si hay resultados en la consulta
	if($resultado->num_rows > 0 ){

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once 'lib/PHPExcel/PHPExcel.php';

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("CPCOriente.org") //Autor
							 ->setLastModifiedBy("
operador.idt@cpcoriente.org") //Ultimo usuario que lo modificó
							 ->setTitle("Reporte Excel Conflictos")
							 ->setSubject("Reporte Excel")
							 ->setDescription("Reporte de Conflictos")
							 ->setKeywords("reporte Conflictos")
							 ->setCategory("Reporte excel");
        // se configuran las columnas de la tabla
		$tituloReporte = "Relacion de Conflictos de intereses registrados";
		$titulosColumnas = array('#', 'ID PROYECTO','TITULO PROYECTO','EMPRESA','USUARIO','ROL DEL USUARIO','FASE','¿PRESENTA CONFLICTO?','FECHA REGISTRA CONFLICTO','FECHA EN QUE FUE ASIGNADO AL PROYECTO','FECHA EN QUE FUE RETIRADO DEL PROYECTO');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:K1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',strtoupper($tituloReporte))
        		    ->setCellValue('A2',  $titulosColumnas[0])
		            ->setCellValue('B2',  $titulosColumnas[1])
        		    ->setCellValue('C2',  $titulosColumnas[2])
					->setCellValue('D2',  $titulosColumnas[3])
					->setCellValue('E2',  $titulosColumnas[4])
					->setCellValue('F2',  $titulosColumnas[5])
					->setCellValue('G2',  $titulosColumnas[6])
					->setCellValue('H2',  $titulosColumnas[7])
					->setCellValue('I2',  $titulosColumnas[8])
					->setCellValue('J2',  $titulosColumnas[9])
					->setCellValue('K2',  $titulosColumnas[10]);
		
		//Se agregan las filas con los datos
		$i = 3;
		$ROW=1;
		$rol="";
		$fase="";
		$conflicto="";
		
		//'#', 'ID PROYECTO','TITULO PROYECTO','EMPRESA','USUARIO','ROL DEL USUARIO','FASE','¿PRESENTA CONFLICTO?','FECHA REGISTRA CONFLICTO','FECHA EN QUE FUE ASIGNADO AL PROYECTO','FECHA EN QUE FUE RETIRADO DEL PROYECTO'
		while ($fila = $resultado->fetch_array()) {
			if($fila[4]=="ele")$fase="ELEGILIBIDAD"; else if($fila[4]=="via") $fase="VIALIBIDAD";
		    if($fila[3]==1)$conflicto="SI"; else if($fila[3]==0)$conflicto="NO";
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $ROW)
		            ->setCellValue('B'.$i,  $fila[2])
        		    ->setCellValue('C'.$i,  $fila[9])
					->setCellValue('D'.$i,  $fila[10])
					->setCellValue('E'.$i,  $fila[11])
					->setCellValue('F'.$i,  $fila[12])
					->setCellValue('G'.$i,  $fase)
					->setCellValue('H'.$i,  $conflicto)
					->setCellValue('I'.$i,  $fila[6])
					->setCellValue('J'.$i,  $fila[5])
					->setCellValue('K'.$i,  $fila[7]);
					$i++;
					$ROW++;
		}
		
$estiloTituloReporte = array('font' => array('name' => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF'), 'size' => 10), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => '112CF2'), 'endcolor' => array('argb' => 'FF431a5d')), 'borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE));
$estiloTituloColumnas = array('font' => array('name' => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF'), 'size' => 10), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => '112CF2'), 'endcolor' => array('argb' => 'FF431a5d')), 'borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE));
$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray(array('font' => array('name' => 'Arial', 'color' => array('rgb' => '000000')), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E7EAFF')), 'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));
		 
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A2:K2')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:K".($i-1));
				
	for($i = 'A'; $i <= 'K'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setWidth(28);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('CONFLICTOS');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
        
        $aleatorio=rand(9999,999999);
		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="ReporteConflictos'.$aleatorio.'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}
                        
            }
    else{
        
        print_r('Acceso denegado inicie sesión ');
    }
    
?>
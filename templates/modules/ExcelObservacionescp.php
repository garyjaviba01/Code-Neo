<?php if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==7 || $_COOKIE['user_rol']==8)){
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
    $conex=new mysqli("localhost","root","","cpcorien_neo_bd",3306);
    // $conex=new mysqli("localhost","cpcorien_us_neo","neo2020_","cpcorien_neo_bd",3306);
    $conex->query("SET NAMES 'UTF8'");
    if (mysqli_connect_errno()) {//si hay error en la conexioón
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}
	//consulta SQL
    $consulta="SELECT observaciones.*,usuarios.nombre,rol.nombre as nrol,CONCAT(propuestas.id,'-',propuestas.nom) as npropu,CONCAT(empresas.nit,'-',empresas.num_ver,',',empresas.razon_social) as nem FROM `observaciones`,usuarios,rol,propuestas,empresas WHERE observaciones.usu = usuarios.cod and usuarios.rol=rol.cod and observaciones.pro=propuestas.id and propuestas.id_empresa=empresas.id and (propuestas.apro_ele=1 || propuestas.apro_via=1) order by observaciones.fecha DESC";
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
							 ->setTitle("Reporte Excel Observaciones")
							 ->setSubject("Reporte Excel")
							 ->setDescription("Reporte de observaciones")
							 ->setKeywords("reporte Observaciones")
							 ->setCategory("Reporte excel");
        // se configuran las columnas de la tabla
		$tituloReporte = "Relación de Observaciones de evalaciones registradas";
		$titulosColumnas = array('#', 'PROYECTO','EMPRESA','USUARIO','ROL','FECHA','FASE','OBSERVACION');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:H1');
						
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
					->setCellValue('H2',  $titulosColumnas[7]);
		
		//Se agregan las filas con los datos
		$i = 3;
		$ROW=1;
		$rol="";
	$fase="";
		
		//'#', 'PROYECTO','EMPRESA','USUARIO','ROL','FECHA','FASE','OBSERVACION'
		while ($fila = $resultado->fetch_array()) {
			if($fila[4]=="ele")$fase="ELEGIBILIDAD"; else $fase="VIABILIDAD" ;
		   
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $ROW)
		            ->setCellValue('B'.$i,  $fila[8])
        		    ->setCellValue('C'.$i,  $fila[9])
					->setCellValue('D'.$i,  $fila[6])
					->setCellValue('E'.$i,  $fila[7])
					->setCellValue('F'.$i,  $fila[3])
					->setCellValue('G'.$i,  $fase)
					->setCellValue('H'.$i,  $fila[5]);
					$i++;
					$ROW++;
		}
		
$estiloTituloReporte = array('font' => array('name' => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF'), 'size' => 10), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => '112CF2'), 'endcolor' => array('argb' => 'FF431a5d')), 'borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE));
$estiloTituloColumnas = array('font' => array('name' => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF'), 'size' => 10), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => '112CF2'), 'endcolor' => array('argb' => 'FF431a5d')), 'borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE));
$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray(array('font' => array('name' => 'Arial', 'color' => array('rgb' => '000000')), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E7EAFF')), 'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A2:H2')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:H".($i-1));
				
	for($i = 'A'; $i <= 'H'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setWidth(28);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('OBSERVACIONES');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
        
        $aleatorio=rand(9999,999999);
		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="ReporteObservaciones'.$aleatorio.'.xlsx"');
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
        
        print_r('Acceso denegado');
    }
    
?>
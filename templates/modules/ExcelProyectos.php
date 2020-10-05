<?php if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5 || $_COOKIE['user_rol']==7 || $_COOKIE['user_rol']==8)){
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
    $consulta="SELECT `propuestas`.*,empresas.razon_social,CONCAT(empresas.nit,'-',empresas.num_ver) as nit FROM propuestas,empresas,convocatoria WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id  ORDER by propuestas.estado ASC";
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
							 ->setTitle("Reporte Excel Proyectos")
							 ->setSubject("Reporte Excel")
							 ->setDescription("Reporte de Proyectos")
							 ->setKeywords("reporte Proyectos")
							 ->setCategory("Reporte excel");
        // se configuran las columnas de la tabla
		$tituloReporte = "Relacion de Proyectos registradas";
		$titulosColumnas = array('ID PROYECTO','TITULO PROYECTO','EMPRESA','N. RADICACION SIGP','FECHA RADICACION SIGP','FECHA RECEPCION','FECHA REGISTRO NEO','ESTADO DEL PROYECTO','VALOR TOTAL PROYECTO','VALOR A FINANCIAR','VALOR CONTRAPARTIDA','VALOR CONTRAPARTIDA DINERO','VALOR CONTRAPARTIDA ESPECIE','RESULTADO ELEGIBILIDAD','RESULTADO VIABILIDAD','FECHA EVALUACION ELEGIBILIDAD','FECHA EVALUACION VIABILIDAD');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:Q1');
						
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
					->setCellValue('K2',  $titulosColumnas[10])
					->setCellValue('L2',  $titulosColumnas[11])
					->setCellValue('M2',  $titulosColumnas[12])
					->setCellValue('N2',  $titulosColumnas[13])
					->setCellValue('O2',  $titulosColumnas[14])
					->setCellValue('P2',  $titulosColumnas[15])
					->setCellValue('Q2',  $titulosColumnas[16]);
					
		
		//Se agregan las filas con los datos
		$i = 3;
		$ROW=1;
		$rol="";
		$fase="";
		$conflicto="";
		$estadoProy="";
		//'ID PROYECTO','TITULO PROYECTO','EMPRESA','N. RADICACION SIGP','FECHA RADICACION SIGP','FECHA RECEPCION','FECHA REGISTRO NEO','VALOR TOTAL PROYECTO','VALOR A FINANCIAR','VALOR CONTRAPARTIDA','VALOR CONTRAPARTIDA DINERO','VALOR CONTRAPARTIDA ESPECIE','DIAGNOSTICO ELEGIBILIDAD','DIAGNOSTICO VIABILIDAD','FECHA EVALUACION ELEGIBILIDAD','FECHA EVALUACION VIABILIDAD'
		while ($fila = $resultado->fetch_array()) {
		if($fila[32]==1){$estadoProy="POR ASIGNAR ELEGIBILIDAD";} else if($fila[32]==2){$estadoProy="EN PROCESO ELEGIBILIDAD";}else if($fila[32]==3){$estadoProy="EVALUADO ELEGIBILIDAD";}elseif($fila[32]==4){$estadoProy="EVALUADO ELEGIBILIDAD - POR ASIGNAR VIABILIDAD";}else if($fila[32]==5){$estadoProy="EVALUADO ELEGIBILIDAD - EN PROCESO VIABILIDAD";}else{$estadoProy="EVALUADO ELEGIBILIDAD - EVALUADO VIABILIDAD";}
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['id'])
		            ->setCellValue('B'.$i,  $fila['nom'])
        		    ->setCellValue('C'.$i,  $fila['nit'].", ".$fila['razon_social'])
					->setCellValue('D'.$i,  $fila['num_rad'])
					->setCellValue('E'.$i,  $fila['fec_rad'])
					->setCellValue('F'.$i,  $fila['fec_rec'])
					->setCellValue('G'.$i,  $fila['fec_reg'])
					->setCellValue('H'.$i,  $estadoProy)
					->setCellValue('I'.$i,  $fila['val_pro'])
					->setCellValue('J'.$i,  $fila['val_fin'])
					->setCellValue('K'.$i,  $fila['val_tot_con'])
					->setCellValue('L'.$i,  $fila['val_con_din'])
					->setCellValue('M'.$i,  $fila['val_con_esp'])
					->setCellValue('N'.$i,  $fila['dia_ele'])
					->setCellValue('O'.$i,  $fila['dia_via'])
					->setCellValue('P'.$i,  $fila['fecha_eva_ele'])
					->setCellValue('Q'.$i,  $fila['fecha_eva_via']);
					$i++;
					$ROW++;
		}
		
		$estiloTituloReporte = array('font' => array('name' => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF'), 'size' => 10), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => '112CF2'), 'endcolor' => array('argb' => 'FF431a5d')), 'borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE));
$estiloTituloColumnas = array('font' => array('name' => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF'), 'size' => 10), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => '112CF2'), 'endcolor' => array('argb' => 'FF431a5d')), 'borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE));
$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray(array('font' => array('name' => 'Arial', 'color' => array('rgb' => '000000')), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E7EAFF')), 'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));
		 
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A2:Q2')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:Q".($i-1));
				
	for($i = 'A'; $i <= 'Q'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setWidth(28);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('PROYECTOS');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
        
        $aleatorio=rand(9999,999999);
		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="ReporteProyectos'.$aleatorio.'.xlsx"');
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
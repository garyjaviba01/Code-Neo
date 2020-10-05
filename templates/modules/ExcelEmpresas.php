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
    $consulta="SELECT empresas.*,departamento.codigo,region.nombre as rnom, departamento.nombre as dnom,ciudad.nombre as cnom FROM empresas,region,departamento,ciudad WHERE empresas.ciudad=ciudad.codigo and ciudad.departamento=departamento.codigo and departamento.region= region.codigo order by empresas.razon_social ASC";
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
							 ->setTitle("Reporte Excel Empresas")
							 ->setSubject("Reporte Excel")
							 ->setDescription("Reporte de Empresas")
							 ->setKeywords("reporte empresas")
							 ->setCategory("Reporte excel");
        // se configuran las columnas de la tabla
		$tituloReporte = "Relacion de empresas registradas";
		$titulosColumnas = array('NIT','NUMERO DE VERIFICACION','RAZON SOCIAL','TIPO DE PROPONENTE','ACTIVIDAD ECONOMICA','TAMAÑO','FECHA CONSTITUCION','REGION','DEPARTAMENTO','CIUDAD','DIRECCION','TELEFONO','NOMBRE CONTACTO','CARGO CONTACTO','EMAIL CONTACTO','TELEFONO CONTACTO','DOCUMENTO REP. LEGAL','NUMERO DOC','NOMBRE','GENERO');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:T1');
						
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
					->setCellValue('Q2',  $titulosColumnas[16])
					->setCellValue('R2',  $titulosColumnas[17])
						->setCellValue('S2',  $titulosColumnas[18])
							->setCellValue('T2',  $titulosColumnas[19]);
					
		
		//Se agregan las filas con los datos
		$i = 3;
		$ROW=1;
		$rol="";
		$fase="";
		$conflicto="";
		
		//'EMAIL CONTACTO','TELEFONO CONTACTO','DOCUEMENTO REP. LEGAL','NUMERO DOC','NOMBRE','GENERO'
		while ($fila = $resultado->fetch_array()) {
	
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['nit'])
		            ->setCellValue('B'.$i,  $fila['num_ver'])
        		    ->setCellValue('C'.$i,  $fila['razon_social'])
					->setCellValue('D'.$i,  $fila['ent_al'])
					->setCellValue('E'.$i,  $fila['act_eco'])
					->setCellValue('F'.$i,  $fila['tam'])
					->setCellValue('G'.$i,  $fila['fec_cons'])
					->setCellValue('H'.$i,  $fila['rnom'])
					->setCellValue('I'.$i,  $fila['dnom'])
					->setCellValue('J'.$i,  $fila['cnom'])
					->setCellValue('K'.$i,  $fila['direccion'])
					->setCellValue('L'.$i,  $fila['tel'])
					->setCellValue('M'.$i,  $fila['cod_postal'])
					->setCellValue('N'.$i,  $fila['car_con'])
					->setCellValue('O'.$i,  $fila['email'])
					->setCellValue('P'.$i,  $fila['tel_con'])
					->setCellValue('Q'.$i,  $fila['tip_ide_rl'])
					->setCellValue('R'.$i,  $fila['num_doc_rl'])
					->setCellValue('S'.$i,  $fila['rep_legal'])
					->setCellValue('T'.$i,  $fila['gen_rl']);
					$i++;
					$ROW++;
		}
		
$estiloTituloReporte = array('font' => array('name' => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF'), 'size' => 10), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => '112CF2'), 'endcolor' => array('argb' => 'FF431a5d')), 'borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE));
$estiloTituloColumnas = array('font' => array('name' => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF'), 'size' => 10), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => '112CF2'), 'endcolor' => array('argb' => 'FF431a5d')), 'borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '143860')), 'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE));
$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray(array('font' => array('name' => 'Arial', 'color' => array('rgb' => '000000')), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E7EAFF')), 'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));
		 
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:T1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A2:T2')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:T".($i-1));
				
	for($i = 'A'; $i <= 'T'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setWidth(28);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('EMPRESAS');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
        
        $aleatorio=rand(9999,999999);
		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="ReporteEmpresas'.$aleatorio.'.xlsx"');
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
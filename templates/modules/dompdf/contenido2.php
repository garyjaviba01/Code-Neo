<?php 
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol'])){
include("../../../phpMVC/Model/class.php");
$obj=new transacciones;
$datos=$obj->DatosProyecto($_COOKIE['id_pro']);
$datos2=$obj->CargarTemAscRp($_COOKIE['id_pro']);
$datos4=$obj->CargarEBRp($_COOKIE['id_pro']);
$datos3=$obj->CargarTipRp($_COOKIE['id_pro']);
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Ficha Individual viabilidad</title>
<link rel="icon" href="templates/assets/Logo_Neo_Corto.png">
<style>
	body{
		font-size: 13px;
		font-family: Arial, Helvetica, sans-serif;
		color:#343432;
	}
	table{
		border-collapse:collapse; border: none;
	}
	td{
		border:1px solid #CCC;
		padding: 7px 0px  6px 5px;
		box-sizing: border-box;
		background: #D8F8CF;
		 border-spacing: 0;
	}
	th{
		height: 25px;
	}
	.espacio{

		height: 10px;
		background: #FFF!important;
		border-top: 1px solid #FFF;
		border-right: 1px solid #FFF;
		border-left: 1px solid #FFF;
		border-bottom: 1px solid #CCC;
	}
	
		.espacio2{

		height: 30px;
		background: #FFF!important;
		border-top: 1px solid #FFF;
		border-right: 1px solid #FFF;
		border-left: 1px solid #FFF;
	    border-bottom: 1px solid #CCC;
	}
	
		.espacio3{

		height: 30px;
		background: #FFF!important;
		border-top: 1px solid #FFF;
		border-right: 1px solid #FFF;
		border-left: 1px solid #FFF;
	    border-bottom: 1px solid #FFF;
	}
	.balnco{

	background: #F7F7F3!important;	
	}
	</style>
</head>
<body>
<table width="100%"  >
<tr ><td rowspan="2" align="center"><img src="Logo_Neo_Corto.png" width="100"></img></td><td rowspan="2" align="center"><h3>Ficha individual de evaluación elegibilidad</h3></td><td >Convocatoria</td><td colspan="2" >616 de 2020</td></tr>
<tr ><td colspan="3">SENA INNOVA - PRODUCTIVIDAD PARA LAS EMPRESAS</td></tr>
<tr><td colspan="5" class="espacio3">
</td>
</td></tr>
<tr><td colspan="5" class="espacio2">
</td>
</td></tr>
<tr><td colspan="2"><b>No. RADICADO - SIGP  </b>
</td><td colspan="3" class="balnco"><?php echo $datos[0];?>
</td></tr><tr><td colspan="2"><b>TÍTULO DEL PROYECTO</b>
</td><td colspan="3" class="balnco"><?php echo $datos[1];?>
</td></tr><tr><td colspan="2"><b>PROPONENTE</b>
</td><td colspan="3" class="balnco"><?php echo $datos[2];?>
</td></tr><tr><td colspan="2"><b>TIPO PROPONENTE </b>
</td><td colspan="3" class="balnco"><?php echo $datos[26];?>
</td></tr><tr><td colspan="2"><b>NIT</b>
</td><td colspan="3" class="balnco"><?php echo $datos[3]."-".$datos[27];?>
</td></tr><tr><td colspan="2" height="110" ><b>ENTIDADES BENEFICIARIAS</b>
</td><td colspan="3" height="110" class="balnco"><?php echo $datos4; ?></td></tr>
</td></tr>
<tr><td colspan="2"><b>REGIÓN DE EJECUCIÓN</b>
</td><td colspan="3" class="balnco"><?php echo strtoupper($datos[25]);?>
</td></tr>
<tr><td colspan="2"><b>DEPARTAMENTO/CIUDAD DE EJECUCIÓN</b>
</td><td colspan="3" class="balnco"><?php echo $datos[7].", ".$datos[8];?>
</td></tr><tr><td colspan="2"><b>TAMAÑO ENTIDAD EJECUTORA (Segun anexo 8)</b>
</td><td colspan="3" class="balnco"><?php echo strtoupper($datos[10]);?>
</td></tr>

<tr><td colspan="2"><b>TIPO DE PROYECTO</b>
</td><td colspan="3" class="balnco"><?php echo $datos[14];?>
</td></tr>
<tr><td colspan="2" height="110" ><b>TEMÁTICAS ASOCIADAS</b>
</td><td colspan="3" height="110" class="balnco"><?php echo $datos2; ?></td></tr>

<tr><td colspan="2"  ><b>DURACIÓN DEL PROYECTO</b>
</td><td colspan="3"  class="balnco"><?php echo $datos[19]." MESES";?></td></tr>
<tr><td colspan="5" class="espacio3">
</td>
</td></tr>
<tr><td colspan="5" class="espacio3">
</td>
</td></tr>
<tr><td colspan="5" class="espacio3">
</td>
</td></tr>
<tr><td colspan="5" class="espacio3">
</td>
</td></tr>
<tr><td colspan="5" class="espacio3">
</td>
</td></tr>
<tr><td colspan="5" class="espacio3">
</td>
</td></tr>
<tr><td colspan="5" class="espacio3">
</td>
</td></tr><tr><td colspan="5" class="espacio3">
</td>
</td></tr>
<tr><td colspan="5" class="espacio2">
</td>
</td></tr>
<tr><td colspan="5" align="center"><h3>RESULTADOS DE EVALUACIÓN</h3>
</td>
</td></tr>
<tr><td colspan="5" class="espacio2">
</td>
</td></tr>
</table>

<?php 
if(isset($_COOKIE['usuario'])){

$obj->CargarDivevaviaRp_ind($_COOKIE['conv'],$_COOKIE['id_pro'],$_COOKIE['usuario']);     
}
else{
$obj->CargarDivevaviaRp($_COOKIE['conv'],$_COOKIE['id_pro']);    
   
}
$mensaje=$obj->mensaje;
				?>
<table width="100%"  >
<tr><td colspan="5" class="espacio2">
</td>
</td></tr>
<tr ><td colspan="3"><b>RESULTADO DEL ANÁLISIS DE
VIABILIDAD : </b></td>

<td class="balnco" colspan="1">PROYECTO <?php echo $mensaje; ?></td>
</tr>	
<tr ><td colspan="4"><?php echo $obj->FormatDate($datos[24]);?></td>
</tr>
<?php  if(isset($_COOKIE['usuario'])){$obj->CargarEvaluadoresViaRp2_ind($_COOKIE['id_pro'],$_COOKIE['usuario']);}else {$obj->CargarEvaluadoresViaRp2($_COOKIE['id_pro']);} ?>

</table>

</body>
</html> 
<?php }
else{?>
<h1>Iniciar sesión, para ver contenido</h1>

<?php    
}
?>
<?php 
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol'])){
include("../../../phpMVC/Model/class.php");
$obj=new transacciones;
$datos=$obj->DatosConflictoEle($_COOKIE['proyecto'],$_COOKIE['usuario_con'],$_COOKIE['conv']);

	?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Informe conflicto de intereses</title>
<link rel="icon" href="templates/assets/Logo_Neo_Corto.png">
</head>
<body>

<img src="logo_con.jpg" width="700"></img><br><br><br>
<div style="text-align:center;"><h3>DECLARACIÓN CONFLICTO DE INTERESES Y ACUERDO DE CONFIDENCIALIDAD</h3></div>
<br><br><p align="justify">Yo, <?php echo strtoupper($datos[0]); ?> certifico que <?php echo $datos[1]; ?>  tengo conflicto de interés con la empresa con NIT y Razón social : <b><?php echo $datos[2]; ?></b>  para realizar el proceso de evaluación de elegibilidad del proyecto : <b><?php echo $datos[3]; ?></b>, postulado para la Convocatoria 
SENAINNOVA PRODUCTIVIDAD PARA LAS EMPRESAS.<br><br> Esta constancia se emite el día <?php echo $obj->FormatDate2($datos[4]); ?></p><br><br><br>
<div style="text-align:center;"><br><?php echo $datos[5]."<br>".$datos[6]; ?></div>
</body>
</html> 
<?php }
else{?>
<h1>Iniciar sesión, para ver contenido</h1>

<?php    
}
?>
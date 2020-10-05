<?php 
// Guardamos el contenido de contenido.php en la variable html
//session_start();
$codigo_usu=$_REQUEST['id'];
$_COOKIE['usuario_con']=$codigo_usu;
$proyecto=$_REQUEST['pro'];
$_COOKIE['proyecto']=$proyecto;
$conv=$_REQUEST['conv'];
$_COOKIE['conv']=$conv;
ob_start();
require "conflictovia_content.php";
$html = ob_get_clean();
// Jalamos las librerias de dompdf
require_once 'autoload.inc.php';
use Dompdf\Dompdf;
// Inicializamos dompdf
$dompdf = new Dompdf();
// Le pasamos el html a dompdf
$dompdf->loadHtml($html);
// Colocamos als propiedades de la hoja
//$dompdf->setPaper("A4", "landscape");

// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream("ConflictoInteres".$codigo_usu.".pdf", array("Attachment" => false));

exit(0);
?>


<script src="../../js/jquery-3.0.0.min.js"></script>
<?php 
// Guardamos el contenido de contenido.php en la variable html
//session_start();
$codigo=$_REQUEST['id'];
$_COOKIE['id_pro']=$codigo;
$conv=$_REQUEST['conv'];
$_COOKIE['conv']=$conv;
ob_start();
if(!isset($_REQUEST['print'])){
echo "<div style='width:100%;text-align:center;'><img src='print.png' width='60' title='IMPRIMIR' style='cursor:pointer;' onclick=\"window.open('index.php?id=".$_REQUEST['id']."&conv=".$_REQUEST['conv']."&print=1')\"></div>";}
require "contenido.php";
/**$html = ob_get_clean();
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
$dompdf->stream("FichaElegibilidad".$codigo.".pdf", array("Attachment" => false));

exit(0);**/
?>
<script>
$(document).ready(function(){
<?php if(isset($_REQUEST['print'])){ echo "window.print();";} ?>

 
}); 
</script>

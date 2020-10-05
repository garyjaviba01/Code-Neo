<?php
/*---------------------------------------------------------------------------------------------*/
#Titulo:                                Filtros
/*---------------------------------------------------------------------------------------------*/
#¶►(Llamados):Clase Ajax ◄#
require_once "../../ajax/ajaxEval.php";
// verificar llegada del datos para ejecutar funcion de listado de convocatorias------------------------------------
if(isset($_GET['LC'])==1){
        $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = [$_POST['tp']];
        echo $objAjax->ajaxEvalUser();
}
else if(isset($_GET['LC2'])==1){
        $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = [$_POST['tp']];
        echo $objAjax->ajaxEvalUser2();
}
else if(isset($_GET['DC'])){
       $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = [$_POST['id']];
        echo $objAjax->ajaxDetailConvo();
}
else if(isset($_GET['DC2'])){
       $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = [$_POST['id']];
        echo $objAjax->ajaxDetailConvo2();
}
else if(isset($_GET['LPR'])){
       $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = array(3);
        echo $objAjax->ajaxlistprop();
}
else if(isset($_GET['LPR2'])){
       $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = array(3);
        echo $objAjax->ajaxlistprop2();
}
else if(isset($_GET['DPR'])){
       $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = [$_POST['id']];
        echo $objAjax->ajaxDataProEva();
}
else if(isset($_GET['DPR2'])){
       $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = [$_POST['id']];
        echo $objAjax->ajaxDataProEva2();
}

else if(isset($_GET['Lsub'])){
       $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = array(3);
        echo $objAjax->ajaxListadoSubsanaciones();
}

?>


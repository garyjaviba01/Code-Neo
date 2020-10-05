<?php
/*---------------------------------------------------------------------------------------------*/
#Titulo:                                Filtros
/*---------------------------------------------------------------------------------------------*/
#¶►(Llamados):Clase Ajax ◄#
require_once "../../ajax/ajaxLogin.php";
// verificar llegada del datos para ejecutar funcion de inicio de sesion------------------------------------
if(isset($_GET['LogIn'])){
        $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = [$_POST['user'], $_POST['pass']];
        echo json_encode($objAjax->ajaxLoginUser());
}
else if(isset($_GET['LogIIn'])){
        $objAjax = new AjaxEventos();
        // Paso de datos al ajax
        $objAjax->dataAjax = [$_POST['user']];
        echo $objAjax->ajaxRestore();
}
else if(isset($_GET['CloseSesion'])){
        //destruir sesiones
        session_start();
        unset($_SESSION['dash']);
        unset($_SESSION['user_code']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_rol']);
        session_destroy();
}


?>


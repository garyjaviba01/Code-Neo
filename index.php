<?php 
/*----------------------------------------------------------------------------*/
#Titulo: INDEX
/*----------------------------------------------------------------------------*/
#►Descripcion: Salidas
#►Controlador de Vistas:
require_once "controllers/ctr-views.php";
#►Modelo de Vistas:
require_once "models/mdl-views.php";
#►Objeto:
$obj_views = new ViewsCTR();
// Llamado de vista incial
$obj_views->get_init_view();
/*Fin-------------------------------------------------------------------------*/
?>
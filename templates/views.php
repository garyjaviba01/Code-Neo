<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NEO</title>
	<!-- BOOTSTRAP 4-------------------------------------------------- -->
	<link rel="stylesheet" href="templates/external/bootstrap/css/bootstrap.min.css">
	<!-- FONT AWESOME-------------------------------------------------- -->
	<link rel="stylesheet" href="templates/external/fontawesome5/css/all.css">
	<!-- GOOGLE FONTS-------------------------------------------------- -->	
	<!-- <link href="https://fonts.googleapis.com/css?family=Quicksand|Ubuntu&display=swap" rel="stylesheet"> -->
	<!-- HOJA DE ESTILOS-------------------------------------------------- -->
	<link rel="stylesheet" href="templates/css/style-dk.css">
	<link rel="stylesheet" href="templates/css/style-tec.css">
	<link rel="icon" href="templates/assets/Logo_Neo_Corto.png">
  <link rel="stylesheet" href="templates/css/styles-panel.css">
	<!-- JQUERY-------------------------------------------------- -->
	<script src="templates/js/jquery-3.0.0.min.js"></script>
  <!-- UTILIDADES-------------------------------------------------- -->
  <script src="templates/js/maker.js"></script>
  <script src="templates/js/utilities.js"></script>
  <!-- BOOTSTRAP MIN JS-------------------------------------------------- -->
  <script src="templates/js/bootstrap.min.js"></script>

	<!-- LOGICAS-------------------------------------------------- -->
  <!-- CONTROLADOR DE NAVEGACION -->
  <script src="templates/js/navs-control.js"></script>
  <!-- SCRIPT DE FUNCIONES -->
  <script src="templates/js/javascript.js"></script>
  
</head>
<style>
</style>
<body>
<?php
	#►Controlador de Vistas:
	$views_ctr = new ViewsCTR();
	#►Metodo de navegacion:
	$views_ctr->navigation_views();
?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="mtitle" >
          CRITERIO : la empresa tiene más de dos años 
        </div>
        <div class="modal-body" id="mbody">
       
        </div>
        
        <div class="modal-footer" id="mfooter">
          <button type="button" class="btn btn-default" style="background: #0054A6;color:#FFF;" data-dismiss="modal">X</button>
        </div>
      </div>
      
    </div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="mtitle2" style="background:#FFF;">
          CRITERIO : la empresa tiene más de dos años 
        </div>
        <div class="modal-body" id="mbody2" style="overflow-x:auto;">
       
        </div>
        
        <div class="modal-footer" id="mfooter2">
          <button type="button" class="btn btn-default" style="background: #0054A6;color:#FFF;" data-dismiss="modal">X</button>
        </div>
      </div>
      
    </div>
</div>
<!-- ===================================================
MODAL DERECHOS DE PETICION
==================================================== -->
<div class="modal fade" id="myModalDer" role="dialog">
    <div class="modal-dialog modal-xl">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="mod-title-der" style="background: #0075b0;color: #fff;">
          DERECHOS DE PETICIÓN 
        </div>
        <div class="modal-body" id="mod-body-der">
          dasdas 
        </div>
        
        <div class="modal-footer" id="mod-footer-der">
          <button type="button" class="btn btn-default" style="background: #0054A6;color:#FFF;" data-dismiss="modal" onclick="CloseModalDer()" >X</button>
        </div>
      </div>
      
    </div>
</div>
</body>
<script src="templates/js/plugins/progressbar.min.js"></script>
</html>
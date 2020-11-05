<style>  
	th{
	    vertical-align:text-top;
	}
</style>
<!-- ===============================================================
*BARRA DE NAVEGACION SUPERIOR
================================================================ -->
<?php include "navs/nav-view.php"; ?>

<div class="panel" id="pan">
	<!-- ==========================================================
	*BARRA DE FUNCIONES DE NODO
	=========================================================== -->
  <?php include "navs/sidenav-view.php"; ?>
	<!-- ==========================================================
  *CONTENEDOR DE TABS 
  =========================================================== -->
	<div class="tabs-content" id="tabs-content"></div>
</div>
<!-- Scripts de las particulas -->
<script src="templates/js/plugins/particles.js"></script>
<script src="templates/js/app.js"></script>
<!-- Controla los botones laterales  -->
<script src="templates/js/tec-control.js"></script>
<!-- Script tempora boton convocaotorias -->
<script src="templates/js/user-tec.js"></script>
<script> 

$(document).ready(function() {
	// DESPLEGAR BARRA DE BOTONES DE NODO
    $("#btn-dash-menu").click();

  // ACTIVAR NODO DEL DASH
  $("#fun-init").click(); // Clik para aranque del dash inicial
	// graficasEmpresas2("$('#tab-dash')")
	BuscarNotificaciones();
	SecurityRobot();
});
</script>
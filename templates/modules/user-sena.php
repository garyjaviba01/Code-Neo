<style>  
	/*PARTICULAS*/
	#particles-js{ 
		height: 111px;
		width: 220px;
		position: fixed;
		z-index: -1;
	} 
	th{
	    vertical-align:text-top;
	}
</style>
<!-- ELIMINAR  -->
<div class="sidenav" id="nav">

	<div class="head-nav text-center">
		<img src="templates/assets/Logo_Neo_Corto.png" width="110">
	</div>	
	
	<div class="btns-nav" >
		<i class="fa fa-thumbtack icon icon_sesion2 thumbtack" id="thumbtack" onclick="barralateral()"></i>
		<button class="btn-nav btn-tab" id="tab-dash" onclick="graficasEmpresas2(this)"><i class="fa fa-tachometer-alt"></i>&nbsp;Panel</button>

		<button class="btn-nav btn-tab" onclick="tabs_tec('ndc2', this)"><i class="fas fa-flag"></i>&nbsp;Convocatorias</button>
		
		<button class="btn-nav btn-tab" onclick="botonempresacp(this)"><i class="fas fa-book-open"></i>&nbsp;Empresas</button>

		<button class="btn-nav btn-tab" onclick="botonproyectocp(this)"><i class="fas fa-book-open"></i>&nbsp;Proyectos</button>
	
		<button class="btn-nav btn-tab" onclick="botonevaluacioncp(this)"><i class="fas fa-check"></i>&nbsp;Evaluación</button>
		 <button class="btn-nav btn-tab"  onclick="botoneConflictoCp(this)"><i class="fa fa-user-times"></i>&nbsp;Conflictos</button>
        <button class="btn-nav btn-tab"  onclick="botoneSubsanacionesCp(this)"><i class="fa fa-medkit"></i>&nbsp;Subsanaciones</button>
		
	</div>
</div>
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
	<div class="tabs-content" id="tabs-content">
	</div>
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
<style>  
	th{
	    vertical-align:text-top;
	}
</style>
<!-- ===============================================================
*BARRA DE NAVEGACION SUPERIOR
================================================================ -->
<?php include "navs/nav-view.php"; ?>
<div class="sidenav" id="nav">
	
	<div class="head-nav text-center">
		<img src="templates/assets/Logo_Neo_Corto.png" width="110">
	</div>	
	
	<div class="btns-nav" >
		
		<i class="fa fa-thumbtack icon icon_sesion2 thumbtack" id="thumbtack" onclick="barralateral()"></i>
		
		<button class="btn-nav btn-tab" id='btnpro1' onclick="botonproyectoaux(this)"><i class="fas fa-book-open"></i>&nbsp;Proyectos</button>
		
		<button class="btn-nav btn-tab" id='btnpro1' onclick="botonempresa_aux(this)"><i class="fas fa-book-open"></i>&nbsp;Empresas</button>


		<!-- <button class="btn-nav btn-tab"  onclick="botonevaluacionaux(this)"><i class="fas fa-check"></i>&nbsp;Evaluación</button>

		<button class="btn-nav btn-tab"  onclick="botoneConflicto(this)"><i class="fa fa-user-times"></i>&nbsp;Conflictos</button>

		<button class="btn-nav btn-tab"  onclick="botoneSubsanaciones(this)" id="btn_sub"><i class="fa fa-medkit"></i>&nbsp;Subsanaciones</button> -->

	</div>
</div>

<div class="panel" id="pan">
	<!-- ==========================================================
  *BARRA DE FUNCIONES DE NODO
  =========================================================== -->
  <?php include "navs/sidenav-view.php"; ?>
	<nav class="navbar navbar-expand-sm bg-light nav-users-data">
		<!-- Brand/logo -->
	 	<div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active mr-4">
	        <h6 style="margin:0 0;color:#00aef1"><?php echo $_COOKIE['user_name']; ?></h6>
	        <p style="margin:0 0;color:#0075B0;"><b>Digitador</b></p>
	      </li>
	    </ul>
		</div>
	</nav>
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
  $("#btnpro1").click(); // Clik para aranque del dash inicial
	//graficasEmpresas("$('#tab-dash')")
	botonproyectoaux($("#btnpro1"))
	//BuscarNotificaciones();
	SecurityRobot();
});
</script>
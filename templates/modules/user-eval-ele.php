<style> 	
	.infemptb td{
	    width:50%;
	    padding:5px;
	}
	.blancas{
	   background:#FFF; 
	    
	}
	.encabezado{
	    background:#00aef1;
	    color:#FFF;
	}
	th{
	    vertical-align:text-top;
	}
</style>

	
<div class="sidenav"  id="nav">
	<div class="head-nav text-center" style='border'>
		<img src="templates/assets/Logo_Neo_Corto.png" width="110">
	</div>	
	<div class="btns-nav" >
		<i class="fa fa-thumbtack icon icon_sesion2 thumbtack" id="thumbtack" onclick="barralateral()"></i>
		 
	 	<button class="btn-nav btn-tab btn-nav-active" id="btn11" onclick="botonusuario1(this)"><i class="fa fa-user"></i>&nbsp;Usuario</button>
	    
    <button class="btn-nav btn-tab btn-nav-active" id="btn12" onclick="tabs_eval_ele('ndc', this,0)"><i class="fas fa-flag"></i>&nbsp;Convocatorias</button>
		
		<button class="btn-nav btn-tab" id="btn14" onclick="botonevaluacionusu1(this)"><i class="fas fa-check"></i>&nbsp;Evaluación</button>
	 	
	 	<button class="btn-nav btn-tab"  onclick="botoneConflictoUsuEle(this)"><i class="fa fa-user-times"></i>&nbsp;Conflictos</button>
	</div>
</div>
<!-- ===============================================================
*BARRA DE NAVEGACION SUPERIOR
================================================================ -->
<?php include "navs/nav-view.php"; ?>
<div class="panel" id="pan">
	
	<nav class="navbar navbar-expand-sm bg-light nav-users-data" style="display: none;">
	 <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active mr-4">
          <h6 style="margin:0 0;color:#00aef1"><?php echo $_COOKIE['user_name']; ?></h6>
	        <p style="margin:0 0;color:#0075B0;"><b>Evaluador elegibilidad</b></p>
	      </li>
	    </ul>
	    <span class="navbar-text">
	    	<span id="sona"></span>
	    	<i class="fas fa-bell icon_sesion2"  onclick="vernotifis()" title="Notificaciones" ></i><span id='notific'>2</span>
	     	<!--<i class="fas fa-user-cog icon_sesion"  onclick="tabs_eval_ele('config', this)" ></i>-->
	     	<i class="fas fa-question-circle icon_sesion2"  onclick="verhelp('use_eval_ele')" title="Ayuda" ></i>
			 	<i class="fas fa-power-off icon_sesion2" onclick="tabs_eval_ele('exit', this)" title="Cerrar Sesión"></i>
	    </span>
	  </div>
	</nav>
	
	<!-- ==========================================================
  *BARRA DE FUNCIONES DE NODO
  =========================================================== -->
  <?php include "navs/sidenav-view.php"; ?>

  <!-- ==========================================================
  *CONTENEDOR DE TABS 
  =========================================================== -->
	<div class="tabs-content" id="tabs-content">
		<br>
		<br>
		<br>
		<div class="intro-tabs text-center">
			
		</div>
	</div>
</div>
<script src="templates/js/plugins/particles.js"></script>
<script src="templates/js/app.js"></script>
<script src="templates/js/user-eval.js"></script>
<script>
$( document ).ready(function() {
	// DESPLEGAR BARRA DE BOTONES DE NODO
  $("#btn-dash-menu").click();

  // ACTIVAR NODO DEL DASH
  // Clik para aranque del dash inicial
  $("#btn-ele-eva").click(); 
  
	// botonevaluacionusu1($("#btn14"));
	BuscarNotificaciones();
	SecurityRobot();
});
</script>
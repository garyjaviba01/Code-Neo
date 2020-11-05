<!-- vista de evaluador viabilidad-->
<style>
    /*PARTICULAS*/
    #particles-js {
        height: 111px;
        width: 220px;
        position: fixed;
        z-index: -1;
    }
    .infemptb td {
        width: 50%;
        padding: 5px;
    }
    .blancas {
        background: #fff;
    }
    .encabezado {
        background: #00aef1;
        color: #fff;
    }
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
        <img src="templates/assets/Logo_Neo_Corto.png" width="110" />
    </div>

    <div class="btns-nav">
        <i class="fa fa-thumbtack icon icon_sesion2 thumbtack" id="thumbtack" onclick="barralateral()"></i>
        <button class="btn-nav btn-tab btn-nav-active" id="btn11" onclick="botonusuario2(this)"><i class="fa fa-user"></i>&nbsp;Usuario</button>
        <button class="btn-nav btn-tab btn-nav-active" id="btn12" onclick="tabs_eval_ele('ndc', this,0)"><i class="fas fa-flag"></i>&nbsp;Convocatorias</button>

        <button class="btn-nav btn-tab" id="btn14" onclick="botonevaluacionusu2(this)"><i class="fas fa-check"></i>&nbsp;Evaluación</button>

         <button class="btn-nav btn-tab"  onclick="botoneConflictoUsuVia(this)"><i class="fa fa-user-times"></i>&nbsp;Conflictos</button>
    </div>
</div>

<div class="panel" id="pan">
  <!-- ==========================================================
  *BARRA DE FUNCIONES DE NODO
  =========================================================== -->
  <?php include "navs/sidenav-view.php"; ?>    

  <!-- ==========================================================
  *CONTENEDOR DE TABS 
  =========================================================== -->
  <div class="tabs-content" id="tabs-content">
    <div class="intro-tabs text-center"></div>
  </div>
</div>

<script src="templates/js/plugins/particles.js"></script>
<script src="templates/js/app.js"></script>
<script src="templates/js/user-eval.js"></script>
<script>
$(document).ready(function () {
  // DESPLEGAR BARRA DE BOTONES DE NODO
  $("#btn-dash-menu").click();

  // ACTIVAR NODO DEL DASH
  $("#btn14").click(); // Clik para aranque del dash inicial
  // botonevaluacionusu2($("#btn14"));
  BuscarNotificaciones();
  SecurityRobot();
});
</script>

<!-- NAVEGACION DE NODOS ============================================ -->
<nav class="navbar navbar-expand-sm fixed-top nav-users" id="navigation-user" dtr="<?php echo $_COOKIE['user_rol'] ?>">
  <!-- Brand/logo -->
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item cust-nav">
        <div class="cont-img-nav text-center">
          <img src="templates/assets/Logo_Neo_Corto.png" width="70px" />
        </div>
      </li>

      <!-- NODOS USUARIO: DIGITADOR DE DATOS ===================== -->
      <?php if ($_COOKIE['user_rol'] == "2"): ?>
        <li class="nav-item active nav-btn-funs pl-2 cust-nav" id="list-btns-fun">
          <button id='btnpro1' onclick="botonproyectoaux(this)" class="btn-fun-user btn-tab fade-in"><span class="icon-btn-funs"><i class="fas fa-book-open"></i></span>&nbsp;<span class="txt-btn-nodo">Proyectos</span></button>
            
          <button id='btnpro1' onclick="botonempresa_aux(this)" class="btn-fun-user btn-tab fade-in"><span class="icon-btn-funs"><i class="fas fa-book-open"></i></span>&nbsp;<span class="txt-btn-nodo">Empresas</span></button>
        
         <button id="btn-dash-menu" class="btn-menu-functions" onclick="menu_controller_on()"><i id="ico-dash" class="fas fa-chevron-circle-down"></i></button>
        </li>
      <?php endif ?>
      <!-- NODOS USUARIO: EVALUADOR ELEGIBILIDAD ================= -->
      <?php if ($_COOKIE['user_rol'] == "3"): ?>
        <li class="nav-item active nav-btn-funs pl-2 cust-nav" id="list-btns-fun">
          <div class="text-center"> 
            
            <button id="btn-ele-eva" class="btn-fun-user btn-tab fade-in" onclick="botonevaluacionusu1(this)"><span class="icon-btn-funs"><i class="fas fa-check"></i></span>&nbsp;<span class="txt-btn-nodo">Evaluación</span></button>

            
            <button id="btn12" class="btn-fun-user btn-tab fade-in" onclick="tabs_eval_ele('ndc', this,0)"><span class="icon-btn-funs"><i class="fas fa-flag"></i></span>&nbsp;<span class="txt-btn-nodo">Convocatorias</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botoneConflictoUsuEle(this)"><span class="icon-btn-funs"><i class="fa fa-user-times"></i></span>&nbsp;<span class="txt-btn-nodo">Conflictos</span></button>
            
            <button id="btn11" class="btn-fun-user btn-tab fade-in" onclick="botonusuario1(this)"><span class="icon-btn-funs"><i class="fa fa-user"></i></span>&nbsp;<span class="txt-btn-nodo">Usuario</span></i></button>

            <button id="btn-dash-menu" class="btn-menu-functions" onclick="menu_controller_on()"><i id="ico-dash" class="fas fa-chevron-circle-down"></i></button>
          </div>
        </li>
      <?php endif ?>
      <!-- NODOS USUARIO: EVALUADOR VIABILIDAD =================== -->
      <?php if ($_COOKIE['user_rol'] == "4"): ?>
        <li class="nav-item active nav-btn-funs pl-2 cust-nav" id="list-btns-fun">
          <div class="text-center"> 
            
            <button id="btn14" class="btn-fun-user btn-tab fade-in" onclick="botonevaluacionusu2(this)"><span class="icon-btn-funs"><i class="fas fa-check"></i></span>&nbsp;<span class="txt-btn-nodo">Evaluación</span></button>

            
            <button id="btn12" class="btn-fun-user btn-tab fade-in" onclick="tabs_eval_ele('ndc', this,0)"><span class="icon-btn-funs"><i class="fas fa-flag"></i></span>&nbsp;<span class="txt-btn-nodo">Convocatorias</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botoneConflictoUsuVia(this)"><span class="icon-btn-funs"><i class="fa fa-user-times"></i></span>&nbsp;<span class="txt-btn-nodo">Conflictos</span></button>
            
            <button id="btn11" class="btn-fun-user btn-tab fade-in" onclick="botonusuario2(this)"><span class="icon-btn-funs"><i class="fa fa-user"></i></span>&nbsp;<span class="txt-btn-nodo">Usuario</span></i></button>

            <button id="btn-dash-menu" class="btn-menu-functions" onclick="menu_controller_on()"><i id="ico-dash" class="fas fa-chevron-circle-down"></i></button>
          </div>
        </li>
      <?php endif ?>
      <!-- NODOS USUARIO: TECNICO =============================== -->
      <?php if ($_COOKIE['user_rol'] == "5"): ?>
        <li class="nav-item active nav-btn-funs pl-2 cust-nav" id="list-btns-fun">
          <div class="text-center"> 
            
            <button id="fun-init" class="btn-fun-user btn-tab fade-in" onclick="graficasEmpresas(this)"><span class="icon-btn-funs"><i class="fa fa-tachometer-alt"></i></span>&nbsp;<span class="txt-btn-nodo">Panel</span></i></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="tabs_tec('ndc', this)"><span class="icon-btn-funs"><i class="fas fa-flag"></i></span>&nbsp;<span class="txt-btn-nodo">Convocatorias</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="tabs_tec('ndpe', this)"><span class="icon-btn-funs"><i class="fas fa-users"></i></span>&nbsp;<span class="txt-btn-nodo">Personal</span></button>
            
            <button id="btn-proy-nodo" class="btn-fun-user btn-tab fade-in" onclick="botonproyecto(this)"><span class="icon-btn-funs"><i class="fas fa-book-open"></i></span>&nbsp;<span class="txt-btn-nodo">Proyectos</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botonempresa(this)"><span class="icon-btn-funs"><i class="fas fa-book-open"></i></span>&nbsp;<span class="txt-btn-nodo">Empresas</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botonevaluacion(this)"><span class="icon-btn-funs"><i class="fas fa-check"></i></span>&nbsp;<span class="txt-btn-nodo">Evaluación</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botoneConflicto(this)"><span class="icon-btn-funs"><i class="fa fa-user-times"></i></span>&nbsp;<span class="txt-btn-nodo">Conflictos</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botoneSubsanaciones(this)"><span class="icon-btn-funs"><i class="fa fa-medkit"></i></span>&nbsp;<span class="txt-btn-nodo">Subsanaciones</span></button>
            
            <button id="btn-dash-menu" class="btn-menu-functions" onclick="menu_controller_on()"><i id="ico-dash" class="fas fa-chevron-circle-down"></i></button>
          </div>
        </li>
      <?php endif ?>  
      <!-- NODOS USUARIO: ASESOR JURIDOCO / ABOGADO ============== -->
      <?php if ($_COOKIE['user_rol'] == "6"): ?>
        <li class="nav-item active nav-btn-funs pl-2 cust-nav" id="list-btns-fun">
          <div class="text-center"> 
            
            <button id="btn-ele-eva" class="btn-fun-user btn-tab fade-in" onclick="botonevaluacionusuJur(this)"><span class="icon-btn-funs"><i class="fas fa-check"></i></span>&nbsp;<span class="txt-btn-nodo">Evaluación</span></button>

            
            <button id="btn12" class="btn-fun-user btn-tab fade-in" onclick="tabs_eval_ele('ndc', this,0)"><span class="icon-btn-funs"><i class="fas fa-flag"></i></span>&nbsp;<span class="txt-btn-nodo">Convocatorias</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botoneConflictoUsuEleJur(this)"><span class="icon-btn-funs"><i class="fa fa-user-times"></i></span>&nbsp;<span class="txt-btn-nodo">Conflictos</span></button>
            
            <button id="btn11" class="btn-fun-user btn-tab fade-in" onclick="botonusuario3(this)"><span class="icon-btn-funs"><i class="fa fa-user"></i></span>&nbsp;<span class="txt-btn-nodo">Usuario</span></i></button>

            <button id="btn-dash-menu" class="btn-menu-functions" onclick="menu_controller_on()"><i id="ico-dash" class="fas fa-chevron-circle-down"></i></button>
          </div>
        </li>
      <?php endif ?>
      <!-- NODOS USUARIO: COLOMBIA PRODUCTIVA ================== -->
      <?php if ($_COOKIE['user_rol'] == "7"): ?>
        <li class="nav-item active nav-btn-funs pl-2 cust-nav" id="list-btns-fun">
          <div class="text-center"> 

            <button id="fun-init" class="btn-fun-user btn-tab fade-in" onclick="graficasEmpresas2(this)"><span class="icon-btn-funs"><i class="fa fa-tachometer-alt"></i></span>&nbsp;<span class="txt-btn-nodo">Panel</span></i></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="tabs_tec('ndc2', this)"><span class="icon-btn-funs"><i class="fas fa-flag"></i></span>&nbsp;<span class="txt-btn-nodo">Convocatorias</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botonempresacp(this)"><span class="icon-btn-funs"><i class="fas fa-book-open"></i></span>&nbsp;<span class="txt-btn-nodo">Empresas</span></button>

            <button id="btn-proy-nodo" class="btn-fun-user btn-tab fade-in" onclick="botonproyectocp(this)"><span class="icon-btn-funs"><i class="fas fa-book-open"></i></span>&nbsp;<span class="txt-btn-nodo">Proyectos</span></button>
            
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botonevaluacioncp(this)"><span class="icon-btn-funs"><i class="fas fa-check"></i></span>&nbsp;<span class="txt-btn-nodo">Evaluación</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botoneConflictoCp(this)"><span class="icon-btn-funs"><i class="fa fa-user-times"></i></span>&nbsp;<span class="txt-btn-nodo">Conflictos</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botoneSubsanacionesCp(this)"><span class="icon-btn-funs"><i class="fa fa-medkit"></i></span>&nbsp;<span class="txt-btn-nodo">Subsanaciones</span></button>
            
            <button id="btn-dash-menu" class="btn-menu-functions" onclick="menu_controller_on()"><i id="ico-dash" class="fas fa-chevron-circle-down"></i></button>
          </div>
        </li>
      <?php endif ?>
      <!-- NODOS USUARIO: SENA ================================= -->
      <?php if ($_COOKIE['user_rol'] == "8"): ?>
        <li class="nav-item active nav-btn-funs pl-2 cust-nav" id="list-btns-fun">
          <div class="text-center"> 

            <button id="fun-init" class="btn-fun-user btn-tab fade-in" onclick="graficasEmpresas2(this)"><span class="icon-btn-funs"><i class="fa fa-tachometer-alt"></i></span>&nbsp;<span class="txt-btn-nodo">Panel</span></i></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="tabs_tec('ndc2', this)"><span class="icon-btn-funs"><i class="fas fa-flag"></i></span>&nbsp;<span class="txt-btn-nodo">Convocatorias</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botonempresacp(this)"><span class="icon-btn-funs"><i class="fas fa-book-open"></i></span>&nbsp;<span class="txt-btn-nodo">Empresas</span></button>

            <button id="btn-proy-nodo" class="btn-fun-user btn-tab fade-in" onclick="botonproyectocp(this)"><span class="icon-btn-funs"><i class="fas fa-book-open"></i></span>&nbsp;<span class="txt-btn-nodo">Proyectos</span></button>
            
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botonevaluacioncp(this)"><span class="icon-btn-funs"><i class="fas fa-check"></i></span>&nbsp;<span class="txt-btn-nodo">Evaluación</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botoneConflictoCp(this)"><span class="icon-btn-funs"><i class="fa fa-user-times"></i></span>&nbsp;<span class="txt-btn-nodo">Conflictos</span></button>
            
            <button class="btn-fun-user btn-tab fade-in" onclick="botoneSubsanacionesCp(this)"><span class="icon-btn-funs"><i class="fa fa-medkit"></i></span>&nbsp;<span class="txt-btn-nodo">Subsanaciones</span></button>
            
            <button id="btn-dash-menu" class="btn-menu-functions" onclick="menu_controller_on()"><i id="ico-dash" class="fas fa-chevron-circle-down"></i></button>
          </div>
        </li>
      <?php endif ?>

      <!-- LISTA INFORMACION DE USUARIO ======================== -->
      <li class="nav-item" id="nav-info">
        <div class="d-inline-flex info-view">
          
          <div class="text-center">
            <span class="nom-user"><?php echo $_COOKIE['user_name']; ?></span>
            <br>

            <?php if ($_COOKIE['user_rol'] == "2"): ?>
              <span class="small rol-user">Digitador Auxiliar</span>
            <?php elseif ($_COOKIE['user_rol'] == "3"): ?> 
              <span class="small rol-user">Evaluador Elegibilidad</span>
            <?php elseif ($_COOKIE['user_rol'] == "4"): ?> 
              <span class="small rol-user">Evaluador Viabilidad</span>
            <?php elseif ($_COOKIE['user_rol'] == "5"): ?>
              <span class="small rol-user">Gestor Tecnico</span>
            <?php elseif ($_COOKIE['user_rol'] == "6"): ?>
              <span class="small rol-user">Asesor Juridico</span>
            <?php elseif ($_COOKIE['user_rol'] == "7"): ?>
              <span class="small rol-user">Colombia Productiva</span>
            <?php elseif ($_COOKIE['user_rol'] == "8"): ?> 
              <span class="small rol-user">SENA</span>
            <?php endif ?>
          </div>
        </div>
      </li>

    </ul>
    <!-- NODOS USUARIO: EVALUADOR ELEGIBILIDAD ================== -->
    <?php if ($_COOKIE['user_rol'] == "2"): ?>
      <span class="navbar-text cont-btns-user text-center">
        <i class="fas fa-bell icon-bnt-users"  onclick="vernotifis()" title="Notificaciones"></i>
        <span id="sona"></span>
        <span id="notific">2</span>
        <i class="fas fa-question-circle icon-bnt-users" onclick="verhelp('use_aux')" title="Ayuda"></i>
        <!--<i class="fas fa-user-cog icon_sesion"  onclick="tabs_tec('config', this)" ></i>-->
        <i class="fas fa-power-off icon-bnt-users" onclick="tabs_tec('exit', this)" title="Cerrar sesión"></i>
      </span>
    <?php endif ?>
    <!-- NODOS USUARIO: EVALUADOR ELEGIBILIDAD ================== -->
    <?php if ($_COOKIE['user_rol'] == "3"): ?>
      <span class="navbar-text cont-btns-user text-center">
        <i class="fas fa-bell icon-bnt-users"  onclick="vernotifis()" title="Notificaciones"></i>
        <span id="sona"></span>
        <span id="notific">2</span>
        <i class="fas fa-question-circle icon-bnt-users" onclick="verhelp('use_eval_ele')" title="Ayuda"></i>
        <!--<i class="fas fa-user-cog icon_sesion"  onclick="tabs_tec('config', this)" ></i>-->
        <i class="fas fa-power-off icon-bnt-users" onclick="tabs_eval_ele('exit', this)" title="Cerrar sesión"></i>
      </span>
    <?php endif ?>
    <!-- NODOS USUARIO: EVALUADOR VIABILIDAD =================== -->
    <?php if ($_COOKIE['user_rol'] == "4"): ?>
      <span class="navbar-text cont-btns-user text-center">
        <i class="fas fa-bell icon-bnt-users"  onclick="vernotifis()" title="Notificaciones"></i>
        <i class="fa fa-window-restore icon-bnt-users"  onclick="window.open('https://neo.cpcoriente.org')" title="Abrir otra ventana NEO"></i>
        <span id="sona"></span>
        <span id="notific">2</span>
        <i class="fas fa-question-circle icon-bnt-users" onclick="verhelp('use_eval_via')" title="Ayuda"></i>
        <!--<i class="fas fa-user-cog icon_sesion"  onclick="tabs_tec('config', this)" ></i>-->
        <i class="fas fa-power-off icon-bnt-users" onclick="tabs_eval_via('exit', this)" title="Cerrar sesión"></i>
      </span>   
    <?php endif ?>
    <!-- NODOS USUARIO: TECNICO ================================ --> 
    <?php if ($_COOKIE['user_rol'] == "5"): ?>
      <span class="navbar-text cont-btns-user text-center">
        <i class="fas fa-bell icon-bnt-users"  onclick="vernotifis()" title="Notificaciones"></i>
        <i class="fa fa-window-restore icon-bnt-users"  onclick="window.open('https://neo.cpcoriente.org')" title="Abrir otra ventana NEO"></i>
        <span id="sona"></span>
        <span id="notific">2</span>
        <i class="fas fa-question-circle icon-bnt-users" onclick="verhelp('use_tec')" title="Ayuda"></i>
        <!--<i class="fas fa-user-cog icon_sesion"  onclick="tabs_tec('config', this)" ></i>-->
        <i class="fas fa-power-off icon-bnt-users" onclick="tabs_tec('exit', this)" title="Cerrar sesión"></i>
      </span>
    <?php endif ?>
    <!-- NODOS USUARIO: ASESOR JURIDOCO / ABOGADO ============== -->
    <?php if ($_COOKIE['user_rol'] == "6"): ?>
      <span class="navbar-text cont-btns-user text-center">
        <i class="fas fa-bell icon-bnt-users"  onclick="vernotifis()" title="Notificaciones"></i>
        <span id="sona"></span>
        <span id="notific">2</span>
        <i class="fas fa-question-circle icon-bnt-users" onclick="verhelp('use_eval_ele')" title="Ayuda"></i>
        <!--<i class="fas fa-user-cog icon_sesion"  onclick="tabs_tec('config', this)" ></i>-->
        <i class="fas fa-power-off icon-bnt-users" onclick="tabs_eval_ele('exit', this)" title="Cerrar sesión"></i>
      </span>
    <?php endif ?>
    <!-- NODOS USUARIO: COLOMBIA PRODUCTIVA ==================== -->
    <?php if ($_COOKIE['user_rol'] == "7"): ?>
      <span class="navbar-text cont-btns-user text-center">
        <i class="fas fa-bell icon-bnt-users"  onclick="vernotifis()" title="Notificaciones"></i>
        <i class="fa fa-window-restore icon-bnt-users"  onclick="window.open('https://neo.cpcoriente.org')" title="Abrir otra ventana NEO"></i>
        <span id="sona"></span>
        <span id="notific">2</span>
        <i class="fas fa-question-circle icon-bnt-users" onclick="verhelp('use_tec')" title="Ayuda"></i>
        <!--<i class="fas fa-user-cog icon_sesion"  onclick="tabs_tec('config', this)" ></i>-->
        <i class="fas fa-power-off icon-bnt-users" onclick="tabs_tec('exit', this)" title="Cerrar sesión"></i>
      </span>
    <?php endif ?>
    <!-- NODOS USUARIO: SENA =================================== -->
    <?php if ($_COOKIE['user_rol'] == "8"): ?>
      <span class="navbar-text cont-btns-user text-center">
        <i class="fas fa-bell icon-bnt-users"  onclick="vernotifis()" title="Notificaciones"></i>
        <i class="fa fa-window-restore icon-bnt-users"  onclick="window.open('https://neo.cpcoriente.org')" title="Abrir otra ventana NEO"></i>
        <span id="sona"></span>
        <span id="notific">2</span>
        <i class="fas fa-question-circle icon-bnt-users" onclick="verhelp('use_sn')" title="Ayuda"></i>
        <!--<i class="fas fa-user-cog icon_sesion"  onclick="tabs_tec('config', this)" ></i>-->
        <i class="fas fa-power-off icon-bnt-users" onclick="tabs_tec('exit', this)" title="Cerrar sesión"></i>
      </span>
    <?php endif ?>
  </div>

</nav>
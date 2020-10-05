function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode;
    return key == 45 || key == 46 || (key >= 48 && key <= 57);
}
function soloNumeros2(e) {
    var key = window.Event ? e.which : e.keyCode;
    return key >= 48 && key <= 57;
}
// funciones de botones de usuarios
function botontablero(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $("#tab-dash").addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-tachometer-alt'></i>&nbsp;Tablero</h5><button class='btn-functions btn-functions-active' onclick=\"ChartEmpresas($('#chartemp'))\" id='chartemp'><i class='fas fa-warehouse'></i>&nbsp; &nbsp;Empresas</button><button class=\"btn-functions\" id=\"btnpro\" onclick=\"Chartproyectos($('#btnpro'))\"><i class='fa fa-book-open'></i>&nbsp; &nbsp;Proyectos</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    graficasEmpresas($("#chartemp"));
}

function botonusuario1(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html("<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-user'></i>&nbsp;Usuario</h5></div><div class='cont-convo-fun text-center' id='cont-convo-fun'>fsdfs</div>");
    Cargar("usuariosEdit.php", "cont-convo-fun");
}

function botonusuario2(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html("<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-user'></i>&nbsp;Usuario</h5></div><div class='cont-convo-fun text-center' id='cont-convo-fun'>fsdfs</div>");
    Cargar("usuariosEdit2.php", "cont-convo-fun");
}
function botonusuario3(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html("<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-user'></i>&nbsp;Usuario</h5></div><div class='cont-convo-fun text-center' id='cont-convo-fun'>fsdfs</div>");
    Cargar("usuariosEdit3.php", "cont-convo-fun");
}
function graficasEmpresas(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $("#tab-dash").addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-tachometer-alt'style='margin-left:-45px;'></i>&nbsp;Panel de control</h5></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    Cargar("panel.php", "cont-convo-fun");
}
function graficasEmpresas2(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $("#tab-dash").addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-tachometer-alt'style='margin-left:-45px;'></i>&nbsp;Panel de control</h5></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    Cargar("panel2.php", "cont-convo-fun");
}
// cargar iframe de graficas
function ChartEmpresas(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    var convo = $("#conv").val();

    $("#Graficas").html(
        "<div class='row'><div class='col-md-6' ><br><b>Ubicación nacional empresas</b><br><iframe style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasEmpresas.php?conv=" +
            convo +
            "'></iframe></div><div class='col-md-6' ><br><b>Ubicación regional empresas</b> &nbsp; <select id='RegionGraficaEmp' onchange='CambiarRegionEmp()'><option value='1'>Amazonas</option><option value='2'>Antioquia y Eje Cafetero<option value='3'>Caribe</option><option value='4'>Central</option><option value='5'>Orinoquía</option><option value='6'>Pacífico</option><option value='7'>Santanderes</option></select><br><iframe id='iframe' style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasEmpresasRegional.php?region=1&conv=" +
            convo +
            "'></iframe></div></div></div>"
    );
}
// cambiar region empresa
function CambiarRegionEmp() {
    var convo = $("#conv").val();
    var region = $("#RegionGraficaEmp").val();
    $("#iframe").attr("src", "templates/modules/graficasEmpresasRegional.php?region=" + region + "&conv=" + convo);
}
// graficas de proyectos
function ChartProyectos1() {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Ubicación nacional propuestas</b><br><iframe style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasProyectos.php'></iframe></div><div class='col-md-6' ><br><b>Ubicación regional propuestas</b> &nbsp; <select id='RegionGraficaEmp' onchange='CambiarRegionPro()'><option value='1'>Amazonas</option><option value='2'>Antioquia y Eje Cafetero<option value='3'>Caribe</option><option value='4'>Central</option><option value='5'>Orinoquía</option><option value='6'>Pacífico</option><option value='7'>Santanderes</option></select><br><iframe id='iframe' style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasProyectosRegional.php?region=1'></iframe></div></div></div>"
    );
}
function ChartProyectos2() {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas2($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Ubicación nacional propuestas</b><br><iframe style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasProyectos.php'></iframe></div><div class='col-md-6' ><br><b>Ubicación regional propuestas</b> &nbsp; <select id='RegionGraficaEmp' onchange='CambiarRegionPro()'><option value='1'>Amazonas</option><option value='2'>Antioquia y Eje Cafetero<option value='3'>Caribe</option><option value='4'>Central</option><option value='5'>Orinoquía</option><option value='6'>Pacífico</option><option value='7'>Santanderes</option></select><br><iframe id='iframe' style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasProyectosRegional.php?region=1'></iframe></div></div></div>"
    );
}
function ChartEmpresas1() {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Ubicación nacional empresas</b><br><iframe style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasEmpresas.php'></iframe></div><div class='col-md-6' ><br><b>Ubicación regional empresas</b> &nbsp; <select id='RegionGraficaEmp' onchange='CambiarRegionEmp()'><option value='1'>Amazonas</option><option value='2'>Antioquia y Eje Cafetero<option value='3'>Caribe</option><option value='4'>Central</option><option value='5'>Orinoquía</option><option value='6'>Pacífico</option><option value='7'>Santanderes</option></select><br><iframe id='iframe' style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasEmpresasRegional.php?region=1'></iframe></div></div></div>"
    );
}
function ChartEmpresas2() {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas2($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Ubicación nacional empresas</b><br><iframe style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasEmpresas.php'></iframe></div><div class='col-md-6' ><br><b>Ubicación regional empresas</b> &nbsp; <select id='RegionGraficaEmp' onchange='CambiarRegionEmp()'><option value='1'>Amazonas</option><option value='2'>Antioquia y Eje Cafetero<option value='3'>Caribe</option><option value='4'>Central</option><option value='5'>Orinoquía</option><option value='6'>Pacífico</option><option value='7'>Santanderes</option></select><br><iframe id='iframe' style='width: 100%;height:750px;border:0;text-align:center;' src='templates/modules/graficasEmpresasRegional.php?region=1'></iframe></div></div></div>"
    );
}

function ChartAnalisisEle1() {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Resultado de elegibilidad</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/graficasAnalisisEle.php'></iframe></div><div class='col-md-6' ><br><b>Resultado elegibilidad por regiones</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/graficasAnalisisEleReg.php'></iframe></div></div>"
    );
}
function ChartAnalisisEle2() {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas2($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Resultado de elegibilidad</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/graficasAnalisisEle.php'></iframe></div><div class='col-md-6' ><br><b>Resultado elegibilidad por regiones</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/graficasAnalisisEleReg.php'></iframe></div></div>"
    );
}
function ChartAnalisisVia1() {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Resultado de viabilidad</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/graficasAnalisisVia.php'></iframe></div><div class='col-md-6' ><br><b>Resultado viabilidad por regiones</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/graficasAnalisisViaReg.php'></iframe></div></div>"
    );
}
function ChartAnalisisVia2() {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas2($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Resultado de viabilidad</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/graficasAnalisisVia.php'></iframe></div><div class='col-md-6' ><br><b>Resultado viabilidad por regiones</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/graficasAnalisisViaReg.php'></iframe></div></div>"
    );
}

function ChartTamanho1() {
  
  $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Tamaño de empresas</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/tamanhoEmpresasRp.php'></iframe></div><div class='col-md-6' ><br><b>Tamaño de empresas por regiones</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/tamanhoEmpresasRpReg.php'></iframe></div></div>"
    );
}

function ChartTamanho2() {
  
    $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas2($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-6' ><br><b>Tamaño de empresas</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/tamanhoEmpresasRp.php'></iframe></div><div class='col-md-6' ><br><b>Tamaño de empresas por regiones</b><br><iframe style='width: 100%;height:650px;border:0;text-align:center;' src='templates/modules/tamanhoEmpresasRpReg.php'></iframe></div></div>"
    );
}


function Act_econoRp(tot) {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-12' ><br><b>Actividades económicas registradas</b><br></div><div class='col-md-12' id='div_act_' style='margin-top:30px;'></div></div>"
    );
     Cargar("ActividadesEconoRp.php?tot="+tot, "div_act_");
}
function Act_econoRp2(tot) {
  

        $("#cont-convo-fun").html("<br><div style='text-align:left;'><i class='fa fa-arrow-left icon_sesion2' title='volver' onclick=\"graficasEmpresas2($('#tab-dash'))\"></i></div> <div class='row'><div class='col-md-12' ><br><b>Actividades económicas registradas</b><br></div><div class='col-md-12' id='div_act_' style='margin-top:30px;'></div></div>"
    );
     Cargar("ActividadesEconoRp.php?tot="+tot, "div_act_");
}
function CambiarRegionPro() {
    var convo = $("#conv").val();
    var region = $("#RegionGraficaEmp").val();
    $("#iframe").attr("src", "templates/modules/graficasProyectosRegional.php?region=" + region + "&conv=" + convo);
}

function botoncriterio(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-check-square'></i>&nbsp;Criterios de evaluación</h5><button class='btn-functions btn-functions-active' onclick=\"cri_ele($('#cri_ele'))\" id='cri_ele'><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button><button class='btn-functions' id='cri_via' onclick=\"cri_via($('#cri_via'))\"><i class='fa fa-thumbs-up'></i>&nbsp; &nbsp; Viabilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    cri_ele($("#cri_ele"));
}

function botoncriteriocp(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-check-square'></i>&nbsp;Criterios de evaluación</h5><button class='btn-functions btn-functions-active' onclick=\"LCrecp($('#cri_ele'))\" id='cri_ele'><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button><button class='btn-functions' id='cri_via' onclick=\"LCrvcp($('#cri_via'))\"><i class='fa fa-thumbs-up'></i>&nbsp; &nbsp; Viabilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LCrecp($("#cri_ele"));
}

function botonproyecto(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-book-open'></i>&nbsp;Proyectos</h5><button class='btn-functions' id='btnpro2' onclick=\"LPro($('#btnpro2'))\"><i class='fas fa-list-ol'></i>&nbsp; &nbsp;Listado proyectos</button><button class='btn-functions btn-functions' onclick=\"proyectos($('#btnpro'))\" id='btnpro'><i class='fas fa-plus-circle'></i>&nbsp;Agregar proyecto</button><button class='btn-functions btn-functions' onclick=\"LProReg($('#btnproreg'))\" id='btnproreg'><i class='fas fa-history'></i>&nbsp;Historial registro</button><button class='btn-functions btn-functions' onclick=\"window.open('templates/modules/ExcelEB.php')\" ><i class='fas fa-file-excel'></i>&nbsp;Entidades beneficiarias</button><i class=\"fa fa-file-excel\" title=\"Descargar excel\" onclick=\"window.open('templates/modules/ExcelProyectos.php')\" style=\"cursor:pointer;color:green;margin-left: 30px;font-size:25px;\"></i><i class=\"fas fa-sync-alt\" title=\"Actualizar listado\" onclick=\"LPro($('#btnpro2'))\" style=\"cursor:pointer;color:#0075b0;margin-left: 30px;font-size:25px;\"></i></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LPro($("#btnpro2"));
}
function botoneConflicto(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-user-times'></i>&nbsp;Conflicto de intereses</h5><button class='btn-functions' id='btnpro2' onclick=\"LConflicEle($('#btnpro2'))\"><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button><button class='btn-functions btn-functions' onclick=\"LConflicVia($('#btnpro'))\" id='btnpro'><i class='fas fa-thumbs-up'></i>&nbsp;Viabilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LConflicEle($("#btnpro2"));
}
function botoneConflictoCp(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-user-times'></i>&nbsp;Conflicto de intereses</h5><button class='btn-functions' id='btnpro2' onclick=\"LConflicEleCp($('#btnpro2'))\"><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button><button class='btn-functions btn-functions' onclick=\"LConflicViaCp($('#btnpro'))\" id='btnpro'><i class='fas fa-thumbs-up'></i>&nbsp;Viabilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LConflicEleCp($("#btnpro2"));
}
function  LConflicEle(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.ConflicEle.php", "cont-convo-fun");
}
function  LConflicEleCp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.ConflicEleCp.php", "cont-convo-fun");
}
function botoneConflictoUsuEle(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-user-times'></i>&nbsp;Conflicto de intereses</h5><button class='btn-functions' id='btnpro2' onclick=\"LConflicEleUsu($('#btnpro2'))\"><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LConflicEleUsu($("#btnpro2"));
}
function  LConflicEleUsu(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.ConflicEleUsu.php", "cont-convo-fun");
}
function botoneConflictoUsuEleJur(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-user-times'></i>&nbsp;Conflicto de intereses</h5><button class='btn-functions' id='btnpro2' onclick=\"LConflicEleUsuJur($('#btnpro2'))\"><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LConflicEleUsuJur($("#btnpro2"));
}
function  LConflicEleUsuJur(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.ConflicEleUsuJur.php", "cont-convo-fun");
}
function botoneConflictoUsuVia(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-user-times'></i>&nbsp;Conflicto de intereses</h5><button class='btn-functions btn-functions' onclick=\"LConflicViaUsu($('#btnpro'))\" id='btnpro'><i class='fas fa-thumbs-up'></i>&nbsp;Viabilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LConflicViaUsu($("#btnpro"));
}
function  LConflicViaUsu(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.ConflicViaUsu.php", "cont-convo-fun");
}

function  LConflicVia(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.ConflicVia.php", "cont-convo-fun");
}

function  LConflicViaCp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.ConflicViaCp.php", "cont-convo-fun");
}
function botoneSubsanaciones(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-medkit'></i>&nbsp;Subsanaciones</h5></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LSubsanaciones($("#btnpro2"));
}
function  LSubsanaciones(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.Subsanaciones.php", "cont-convo-fun");
}

function botoneSubsanacionesCp(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-medkit'></i>&nbsp;Subsanaciones</h5></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LSubsanacionesCp($("#btnpro2"));
}
function  LSubsanacionesCp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.SubsanacionesCp.php", "cont-convo-fun");
}

function botonproyectoaux(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fa fa-book-open'></i>&nbsp;Proyectos</h5><button class='btn-functions' id='btnpro2' onclick=\"LPro($('#btnpro2'))\"><i class='fas fa-list-ol'></i>&nbsp; &nbsp;Listado proyectos</button><button class='btn-functions btn-functions' onclick=\"proyectos($('#btnpro'))\" id='btnpro' style='display:none;'><i class='fas fa-plus-circle'></i>&nbsp;Agregar proyecto</button><i class=\"fas fa-sync-alt\" title=\"Actualizar listado\" onclick=\"LPro($('#btnpro2'))\" style=\"cursor:pointer;color:#0075b0;margin-left: 30px;font-size:25px;\"></i></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LPro($("#btnpro2"));
}

function botonempresa(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-warehouse'></i>&nbsp;Empresas</h5><button class='btn-functions btn-functions-active' onclick=\"LEmp($('#btnemp2'))\" id='btnemp2'><i class='fas fa-list-ol'></i>&nbsp; &nbsp;Listado empresas</button><button class='btn-functions btn-functions' onclick=\"empresas($('#btnemp'))\" id='btnemp'><i class='fas fa-plus-circle'></i>&nbsp;Agregar empresa</button><button class='btn-functions btn-functions' onclick=\"empresasReg($('#btnempreg'))\" id='btnempreg'><i class='fas fa-history'></i>&nbsp;Historial registro</button><i class=\"fa fa-file-excel\" title=\"Descargar excel\" onclick=\"window.open('templates/modules/ExcelEmpresas.php')\" style=\"cursor:pointer;color:green;margin-left: 30px;font-size:25px;\"></i><i class=\"fas fa-sync-alt\" title=\"Actualizar listado\" onclick=\"LEmp($('#btnemp2'))\" style=\"cursor:pointer;color:#0075b0;margin-left: 30px;font-size:25px;\"></i></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LEmp($("#btnemp2"));
}

function botonempresa_aux(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-warehouse'></i>&nbsp;Empresas</h5><button class='btn-functions btn-functions-active' onclick=\"LEmp2($('#btnemp2'))\" id='btnemp2'><i class='fas fa-list-ol'></i>&nbsp; &nbsp;Listado empresas</button><button class='btn-functions btn-functions' onclick=\"empresas($('#btnemp'))\" id='btnemp' style='display:none;><i class='fas fa-plus-circle' ></i>&nbsp;Agregar empresa</button><i class=\"fas fa-sync-alt\" title=\"Actualizar listado\" onclick=\"LEmp2($('#btnemp2'))\" style=\"cursor:pointer;color:#0075b0;margin-left: 30px;font-size:25px;\"></i></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LEmp2($("#btnemp2"));
}

function botonproyectocp(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-book-open'></i>&nbsp;Proyectos</h5><button class='btn-functions' id='btnpro' onclick=\"LProcp($('#btnpro'))\"><i class='fas fa-list-ol'></i>&nbsp; &nbsp;Listado proyectos</button><i class=\"fas fa-sync-alt\" title=\"Actualizar listado\" onclick=\"LProcp($('#btnpro'))\" style=\"cursor:pointer;color:#0075b0;margin-left: 30px;font-size:25px;\"></i></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    LProcp($("#btnpro"));
}

function botonempresacp(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-warehouse'></i>&nbsp;Empresas</h5><button class='btn-functions btn-functions-active' onclick=\"LEmpcp($('#btnemp'))\" id='btnemp'><i class='fas fa-list-ol'></i>&nbsp; &nbsp;Listado empresas</button><i class=\"fas fa-sync-alt\" title=\"Actualizar listado\" onclick=\"LEmpcp($('#btnemp'))\" style=\"cursor:pointer;color:#0075b0;margin-left: 30px;font-size:25px;\"></i></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    //cri_ele($("#cri_ele"));
    LEmpcp($("#btnemp"));
}

function botonevaluacion(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-check'></i>&nbsp;Evaluaciones</h5><button class='btn-functions btn-functions-active' onclick=\"eval_pro_ele($('#eval_pro_ele'))\" id='eval_pro_ele'><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button><button class='btn-functions' id='eval_pro_via' onclick=\"eval_pro_via($('#eval_pro_via'))\"><i class='fa fa-thumbs-up'></i>&nbsp; &nbsp; Viabilidad</button><button class='btn-functions' onclick=\"asignarpro($('#asiper'))\" id='asiper'><i class='fas fa-check-circle'></i>&nbsp; &nbsp;Asignar Evaluadores</button><button class='btn-functions' onclick=\"asignarprojud($('#asijur'))\" id='asijur'><i class='fas fa-check-circle'></i>&nbsp; &nbsp;Asignar Jurídico</button><button class='btn-functions' id='tiempos' onclick=\"tiempos($('#tiempos'))\"><i class='fa fa-clock'></i>&nbsp; &nbsp; Tiempos</button><button class='btn-functions' id='observ' onclick=\"Observaciones($('#observ'))\"><i class='fas fa-comment-dots'></i>&nbsp; &nbsp; Observaciones</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    eval_pro_ele($("#eval_pro_ele"));
}

function botonevaluacioncp(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-check'></i>&nbsp;Evaluaciones</h5><button class='btn-functions btn-functions-active' onclick=\"eval_pro_elecp($('#eval_pro_ele'))\" id='eval_pro_ele'><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button><button class='btn-functions' id='eval_pro_via' onclick=\"eval_pro_viacp($('#eval_pro_via'))\"><i class='fa fa-thumbs-up'></i>&nbsp; &nbsp; Viabilidad</button><button class='btn-functions' id='observ' onclick=\"Observacionescp($('#observ'))\"><i class='fas fa-comment-dots'></i>&nbsp; &nbsp; Observaciones</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    eval_pro_elecp($("#eval_pro_ele"));
}

function botonevaluacionaux(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-check'></i>&nbsp;Evaluaciones</h5><button class='btn-functions btn-functions-active' onclick=\"eval_pro_eleaux($('#eval_pro_ele'))\" id='eval_pro_ele'><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button><button class='btn-functions' id='eval_pro_via' onclick=\"eval_pro_viaaux($('#eval_pro_via'))\"><i class='fa fa-thumbs-up'></i>&nbsp; &nbsp; Viabilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    eval_pro_eleaux($("#eval_pro_ele"));
}

function botonevaluacionusu1(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-check'></i>&nbsp;Evaluación</h5><button class='btn-functions btn-functions-active' onclick=\"eval_pro_ele2($('#eval_pro_ele'))\" id='eval_pro_ele'><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    eval_pro_ele2($("#eval_pro_ele"));
}

function botonevaluacionusuJur(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-check'></i>&nbsp;Evaluación</h5><button class='btn-functions btn-functions-active' onclick=\"eval_pro_ele2Jur($('#eval_pro_ele'))\" id='eval_pro_ele'><i class='fas fa-check-square'></i>&nbsp; &nbsp;Elegibilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    eval_pro_ele2Jur($("#eval_pro_ele"));
}
function botonevaluacionusu2(btn) {
    $(".btn-tab").removeClass("btn-nav-active");
    $(btn).addClass("btn-nav-active");
    $("#tabs-content").html(
        "<div class='nav-functions'><h5 class='tit-nodo'><i class='fas fa-check'></i>&nbsp;Evaluación</h5><button class='btn-functions' id='eval_pro_via' onclick=\"eval_pro_via2($('#eval_pro_via'))\"><i class='fa fa-thumbs-up'></i>&nbsp; &nbsp; Viabilidad</button></div><div class='cont-convo-fun text-center' id='cont-convo-fun'></div>"
    );
    eval_pro_via2($("#eval_pro_via"));
}

function eval_pro_ele(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.pro.evaele.php", "cont-convo-fun");
}
function eval_pro_elecp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.pro.evaelecp.php", "cont-convo-fun");
}
function eval_pro_viacp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.pro.evaviacp.php", "cont-convo-fun");
}

function eval_pro_eleaux(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.pro.evaeleaux.php", "cont-convo-fun");
}

function eval_pro_viaaux(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.pro.evaviaaux.php", "cont-convo-fun");
}

function eval_pro_ele2(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.pro.evaeleusu.php", "cont-convo-fun");
}

function eval_pro_ele2Jur(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.pro.evaeleusuJur.php", "cont-convo-fun");
}
function eval_pro_via(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.pro.evavia.php", "cont-convo-fun");

    
}
function eval_pro_via2(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.pro.evaviausu.php", "cont-convo-fun");
}

function LCrecp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.cri.elecp.php", "cont-convo-fun");
}
function LCaucp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("listcausacp.php", "cont-convo-fun");
}

function tiempos(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("tiempos.php", "cont-convo-fun");
}


function Observaciones(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    
    Cargar("Observaciones.php", "cont-convo-fun");
}

function Observacionescp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    
    Cargar("Observacionescp.php", "cont-convo-fun");
}

function empresas(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("empresa.php", "cont-convo-fun");
}

function empresasReg(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("lis.emp.reg.php", "cont-convo-fun");
}


function proyectos(btn) {

    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("proyecto.php", "cont-convo-fun");
}



function cri_ele(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("cri.ele.php", "cont-convo-fun");
}

function causales(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("causales.php", "cont-convo-fun");
}
function cri_via(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("cri_via.php", "cont-convo-fun");
}

/// fin de funciones de los botones de las vistas
//funcion generica para cargar archivos en un div
function Cargar(pag, div) {
    $("#" + div).html("<div class='spinner-border text-dark'></div>");
    var depar = "";
    var sendform = new FormData();
    $.ajax({
        type: "POST",
        url: "templates/modules/" + pag,
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           
            $("#" + div).html(e);
        },
    });
}
// guardar causales de rechazo
function GuardarCausa() {
    // validacion
    if ($("#cau").val() == "") {
        message = "Digite la causa de rechazo";
        alerts_tec(message);
    } else {
        // preparacion de peticion
        var sendform = new FormData();
        sendform.append("cau", $("#causa").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("ayu", $("#ayu").val());
        sendform.append("f", "gcau");
        $.ajax({// peticion con ajax a controlador
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                // respuesta
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("guardada") != -1) {
                    causales($("#causa_rec"));
                }
            },
        });
    }
}
function updateCausa() {
    if ($("#cau").val() == "") {
        message = "Digite la causa de rechazo";
        alerts_tec(message);
    } else if ($("#cod").val() == "") {
        message = "Seleccione una causa de tabla";
        alerts_tec(message);
        LCau();
    } else {
        var sendform = new FormData();
        sendform.append("cau", $("#causa").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("ayu", $("#ayu").val());
        sendform.append("f", "ucau");
        sendform.append("cod", $("#cod").val());

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("actualizada") != -1) {
                    LCau();
                }
            },
        });
    }
}
// funciones de criterios de evaluacion
function GuardarCriEle() {
    if ($("#req").val() == "") {
        message = "Digite el requerimiento";
        alerts_tec(message);
    } else {
        var sendform = new FormData();
        sendform.append("req", $("#req").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("tipo", $("#tipo").val());
        sendform.append("ayu", $("#ayu").val());
        sendform.append("f", "gcele");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e;
                alerts_tec(message);
                if (String(e).indexOf("guardado") != -1) {
                    cri_ele($("#cri_ele"));
                }
            },
        });
    }
}
function updateCriEle() {
    if ($("#req").val() == "") {
        message = "Digite el requerimiento";
        alerts_tec(message);
    } else if ($("#cod").val() == "") {
        message = "seleccione un criterio de tabla";
        alerts_tec(message);
        LCre();
    } else {
        var sendform = new FormData();
        sendform.append("req", $("#req").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("tipo", $("#tipo").val());
        sendform.append("cod", $("#cod").val());
        sendform.append("ayu", $("#ayu").val());
        sendform.append("f", "acele");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("actualizado") != -1) {
                    LCre();
                }
            },
        });
    }
}

function ListCriElecp() {
    $("#listcreele").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();
    sendform.append("f", "lcrielecp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listcreele").html(e);
        },
    });
}

function LCrvcp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.cri.viacp.php", "cont-convo-fun");
}

function ListCriViacp() {
    var sendform = new FormData();
    sendform.append("f", "lcriviacp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listcrevia").html(e);
        },
    });
}

function LCre() {
    Cargar("list.cri.ele.php", "cont-convo-fun");
}
function LCau() {
    Cargar("listcausa.php", "cont-convo-fun");
}

function ListCriEle() {
    $("#listcreele").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();
    sendform.append("f", "lcriele");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listcreele").html(e);
        },
    });
}
// listado de causales
function ListCausales() {
    $("#listcausa").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();
    sendform.append("f", "lcausa");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listcausa").html(e);
        },
    });
}

function ListCausalesCp() {
    $("#listcausa").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();
    sendform.append("f", "lcausacp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listcausa").html(e);
        },
    });
}
// consulta de tiempo configurado para evaluaciones
function ConsultaTiempo() {
    var sendform = new FormData();
    sendform.append("f", "ConsultaTiempo");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);
            $("#conteoe").val(respuesta[0]);
            $("#conteov").val(respuesta[1]);
            $("#diase").val(respuesta[2]);
            $("#diasv").val(respuesta[3]);
        },
    });
}
function cambiarpro() {
    var sendform = new FormData();
    sendform.append("f", "cambiarpro");
    sendform.append("cod", $("#conv").val());
    sendform.append("tipo", $("#fase").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
        
            $("#pro").html(e);
            CargarAsigele();
        },
    });
}
function cambiarproJur() {
    var sendform = new FormData();
    sendform.append("f", "cambiarproJur");
    sendform.append("cod", $("#conv").val());

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#pro").html(e);
            CargarAsigeleJur();
        },
    });
}
function CargarAsigele() {
    $("#list_asig").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();
    sendform.append("f", "CargarAsigele");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#list_asig").html(e);
            $("#btnasigvia").removeClass("btn-functions-active");
            $("#btnasigele").addClass("btn-functions-active");
            ProSinAsigEle();
        },
    });
}
function CargarAsigeleJur() {
    $("#list_asig").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();
    sendform.append("f", "CargarAsigeleJur");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#list_asig").html(e);
        },
    });
}

function VerAsigele(conv, id_propuesta) {
    $("#mtitle").html("<b>Cargando...</b>");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#myModal").modal();
    var sendform = new FormData();
    sendform.append("f", "VerAsigele");
    sendform.append("cod", conv);
    sendform.append("id", id_propuesta);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);
            $("#mtitle").html("<b>" + respuesta[1] + "</b>");
            $("#mbody").html(respuesta[0]);
            barralateral2();
        },
    });
}

function VerAsigvia(conv, id_propuesta) {
    $("#mtitle").html("<b>Cargando...</b>");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#myModal").modal();
    var sendform = new FormData();
    sendform.append("f", "VerAsigvia");
    sendform.append("cod", conv);
    sendform.append("id", id_propuesta);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);
            $("#mtitle").html("<b>" + respuesta[1] + "</b>");
            $("#mbody").html(respuesta[0]);
            barralateral2();
        },
    });
}

function Listarsinasigele() {
    var proyectos = parseInt($("#a_s_ele").html());
    if (proyectos > 0) {
        $("#mtitle").html("<b>PROYECTOS SIN ASIGNAR - ELEGIBILIDAD</b>");
        $("#mbody").html("<div class='spinner-border text-dark'></div>");
        $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
        $("#myModal").modal();
        var sendform = new FormData();
        sendform.append("f", "Listarsinasigele");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller2.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#mbody").html(e);
                barralateral2();
            },
        });
    }
}

function Listarsinasigvia() {
    var proyectos = parseInt($("#a_s_via").html());
    if (proyectos > 0) {
        $("#mtitle").html("<b>PROYECTOS SIN ASIGNAR - VIABILIDAD</b>");
        $("#mbody").html("<div class='spinner-border text-dark'></div>");
        $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
        $("#myModal").modal();
        var sendform = new FormData();
        sendform.append("f", "Listarsinasigvia");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller2.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
               // alert(e)
                $("#mbody").html(e);
                barralateral2();
            },
        });
    }
}

function Listarsinasigele2() {
    $("#mtitle").html("<b>PROYECTOS SIN ASIGNAR - ELEGIBILIDAD</b>");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");

    var sendform = new FormData();
    sendform.append("f", "Listarsinasigele");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller2.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#mbody").html(e);
            barralateral2();
        },
    });
}
function AsignarRadomele(id) {
    var sendform = new FormData();
    sendform.append("f", "AsignarRadom");
    sendform.append("fase", "ele");
    sendform.append("pro", id);
    sendform.append("proname", $("#pro option:selected").text());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            alert(e);
            if (String(e).indexOf("exitosa") != -1) {
                asignarpro($("#asiper"));
                Listarsinasigele2();
            }
        },
    });
}
function ListarsinasigeleJur() {
    var proyectos = parseInt($("#a_s_elejur").html());
    if (proyectos > 0) {
        $("#mtitle").html("<b>PROYECTOS SIN ASIGNAR A ASESOR JURÍDICO / ABOGADO</b>");
        $("#mbody").html("<div class='spinner-border text-dark'></div>");
        $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
        $("#myModal").modal();
        var sendform = new FormData();
        sendform.append("f", "ListarsinasigeleJur");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller2.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#mbody").html(e);
                barralateral2();
            },
        });
    }
}

function Listarsinasigele2Jur() {
    $("#mtitle").html("<b>PROYECTOS SIN ASIGNAR A ASESOR JURÍDICO / ABOGADO</b>");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");

    var sendform = new FormData();
    sendform.append("f", "ListarsinasigeleJur");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller2.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#mbody").html(e);
            barralateral2();
        },
    });
}
function AsignarRadomeleJur(id) {
    var sendform = new FormData();
    sendform.append("f", "AsignarRadomJur");
    sendform.append("fase", "ele");
    sendform.append("pro", id);
    sendform.append("proname", $("#pro option:selected").text());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            alert(e);
            if (String(e).indexOf("exitosa") != -1) {
                asignarprojud($("#asijur"));
                Listarsinasigele2Jur();
            }
        },
    });
}

function AsignarRadomvia(id) {
    var sendform = new FormData();
    sendform.append("f", "AsignarRadom");
    sendform.append("fase", "via");
    sendform.append("pro", id);
    sendform.append("proname", $("#pro option:selected").text());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            alert(e);
            if (String(e).indexOf("exitosa") != -1) {
                asignarpro($("#asiper"));
                Listarsinasigvia2();
            }
        },
    });
}

/**function Listarsinasigvia() {
    var proyectos = parseInt($("#a_s_via").html());
    if (proyectos > 0) {
        $("#mtitle").html("<b>PROYECTOS SIN ASIGNAR - VIABILIDAD</b>");
        $("#mbody").html("<div class='spinner-border text-dark'></div>");
        $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
        var sendform = new FormData();
        sendform.append("f", "Listarsinasigvia");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller2.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#mbody").html(e);
                barralateral2();
            },
        });
    }
}
**/
function Listarsinasigvia2() {
    $("#mtitle").html("<b>PROYECTOS SIN ASIGNAR - VIABILIDAD</b>");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");

    var sendform = new FormData();
    sendform.append("f", "Listarsinasigvia");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller2.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#mbody").html(e);
            barralateral2();
        },
    });
}

function CargarAsigvia() {
    $("#list_asig").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();
    sendform.append("f", "CargarAsigvia");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#list_asig").html(e);
            $("#btnasigele").removeClass("btn-functions-active");
            $("#btnasigvia").addClass("btn-functions-active");
              ProSinAsigVia();
        },
    });
}
function cambiarpro2() {
    var sendform = new FormData();
    sendform.append("f", "cambiarpro");
    sendform.append("cod", $("#conv").val());
    sendform.append("tipo", $("#fase").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",  
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
             $("#pro").html(e);
            if ($("#fase").val() == "ele") cambiarEvaluadorele($("#fase").val());
            else cambiarEvaluadorvia($("#fase").val());
        },
    });
}
function cambiarEvaluadorele(fase) {
    var sendform = new FormData();
    sendform.append("f", "cambiarEvaluadorele");

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#usu").html(e);
          cambiarCriteriosele();
        },
    });
}
function cambiarEvaluadorvia(fase) {
    var sendform = new FormData();
    sendform.append("f", "cambiarEvaluadorvia");

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#usu").html(e);
            cambiarCriteriosvia();
        },
    });
}
function cambiarCriteriosele() {
    var sendform = new FormData();
    sendform.append("f", "cambiarCriteriosele");

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#Criterios").html(e);
             $("#Criterios2").html(e);
            CargarAsigele();
        },
    });
}
function cambiarCriteriosvia() {
    var sendform = new FormData();
    sendform.append("f", "cambiarCriteriosvia");

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#Criterios").html(e);
             $("#Criterios2").html(e);
            CargarAsigvia();
        },
    });
}
function DelCriEle(cod) {
    if (confirm("¿Está seguro de eliminar el criterio?")) {
        var sendform = new FormData();
        sendform.append("f", "DelCriEle");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    ListCriEle();
                }
            },
        });
    }
}

function DelCausa(cod) {
    if (confirm("¿Está seguro de eliminar la causa de rechazo?")) {
        var sendform = new FormData();
        sendform.append("f", "DelCausa");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminada") != -1) {
                    ListCausales();
                }
            },
        });
    }
}


function DelConEle(cod,usu,pro) {
    if (confirm("¿Está seguro de eliminar el conflicto de intereses?")) {
        var sendform = new FormData();
        sendform.append("f", "DelConEle");
        sendform.append("cod", cod);
        sendform.append("usu", usu);
        sendform.append("pro", pro);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                //alert(e)
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                   LConflicEle($('#btnpro2'))
                }
            },
        });
    }
}


function DelConVia(cod,usu,pro) {
    if (confirm("¿Está seguro de eliminar el conflicto de intereses?")) {
        var sendform = new FormData();
        sendform.append("f", "DelConVia");
        sendform.append("cod", cod);
        sendform.append("usu", usu);
        sendform.append("pro", pro);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
               // alert(e)
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                   LConflicVia($('#btnpro'))
                }
            },
        });
    }
}



function DelEmp(cod) {
    if (confirm("¿Está seguro de eliminar la empresa?")) {
        var sendform = new FormData();
        sendform.append("f", "DelEmp");
        sendform.append("cod", cod);
       

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminada") != -1) {
                    LEmp($("#btnemp"));
                }
            },
        });
    }
}
function DelCF(cod) {
    if (confirm("¿Está seguro de eliminar el centro?")) {
        var sendform = new FormData();
        sendform.append("f", "DelCF");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    CargarCF();
                }
            },
        });
    }
}
function DelTem(cod) {
    if (confirm("¿Está seguro de retirar la temática?")) {
        var sendform = new FormData();
        sendform.append("f", "DelTem");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminada") != -1) {
                   Cargartem_Asc();
                }
            },
        });
    }
}

function DelEB(cod) {
    if (confirm("¿Está seguro de eliminar la entidad?")) {
        var sendform = new FormData();
        sendform.append("f", "DelEB");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminada") != -1) {
                   CargarEB();
                }
            },
        });
    }
}

function editarCriele(id) {
    $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/cri.eleupd.php?cod=" + id,
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#cont-convo-fun").html(e);
        },
    });
}

function editarCausa(id) {
    $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/causalesupd.php?cod=" + id,
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#cont-convo-fun").html(e);
        },
    });
}

function editarrpro(id) {
    Cargar("proyectoupd.php?id=" + id, "cont-convo-fun");
}

function barralateral() {
    if ($("#thumbtack").hasClass("thumbtack2")) {
        $("#thumbtack").removeClass("thumbtack2");
        $("#nav").removeClass("sidenav2");
        $("#pan").removeClass("panel2");
    } else {
        $("#thumbtack").addClass("thumbtack2");
        $("#nav").addClass("sidenav2");
        $("#pan").addClass("panel2");
    }
}
function barralateral2() {
    if (!$("#thumbtack").hasClass("thumbtack2")) {
        $("#thumbtack").addClass("thumbtack2");
        $("#nav").addClass("sidenav2");
        $("#pan").addClass("panel2");
    }
}

function editarpt(id, nom, val1, val2) {
    $("#cod_pt").val(id);
    $("#nom_pt").val(nom);
    $("#val_con_pt").val(val1);
    $("#val_fin_pt").val(val2);

    $("#divtraP").removeClass("display_none");
    $("#listadoPT").addClass("display_none");
    $("#link2").addClass("lactive");
    $("#link1").removeClass("lactive");
    moneda("val_con_pt");
    moneda("val_fin_pt");
    moneda("nom_pt");
    CalcularVTPT();
    CargarCF();
}
function editarpt2(id, nom, val1, val2) {
    $("#cod_pt").val(id);
    $("#nom_pt").val(nom);
    $("#val_con_pt").val(val1);
    $("#val_fin_pt").val(val2);
    moneda("val_con_pt");
    moneda("val_fin_pt");
    moneda("nom_pt");
    $("#divtraP").removeClass("display_none");
    $("#listadoPT").addClass("display_none");
    $("#link1").removeClass("lactive");
    CalcularVTPT();
    CargarCF2();
}

function GuardarCriVia() {
    if ($("#req").val() == "" || $("#pun").val() == "") {
        message = "Digite los datos obligatorios";
        alerts_tec(message);
    } else {
        var sendform = new FormData();
        sendform.append("req", $("#req").val());
        sendform.append("pun", $("#pun").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("tipo", $("#tipo").val());
        sendform.append("ayu", $("#ayu").val());
        sendform.append("f", "gcvia");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("guardado") != -1) {
                    cri_via($("#cri_via"));
                }
            },
        });
    }
}

function updateCriVia() {
    if ($("#req").val() == "" || $("#pun").val() == "") {
        message = "Digite los datos obligatorios";
        alerts_tec(message);
    } else if ($("#req").val() == "") {
        message = "<h4><br>Seleccione un criterio</h4>";
        alerts_tec(message);
        LCrv();
    } else {
        var sendform = new FormData();
        sendform.append("req", $("#req").val());
        sendform.append("pun", $("#pun").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("tipo", $("#tipo").val());
        sendform.append("ayu", $("#ayu").val());
        sendform.append("cod", $("#cod").val());

        sendform.append("f", "acvia");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("actualizado") != -1) {
                    LCrv();
                }
            },
        });
    }
}

function updateCriViapunadc() {
    if ($("#reqadc").val() == "" || $("#punadc").val() == "") {
        message = "Digite los datos obligatorios";
        alert(message);
    } else {
        var sendform = new FormData();
        sendform.append("req", $("#reqadc").val());
        sendform.append("pun", $("#punadc").val());
        sendform.append("conv", $("#convadc").val());
        sendform.append("tipo", $("#tipoadc").val());
        sendform.append("ayu", $("#ayuadc").val());
        sendform.append("cod", $("#codadc").val());
        sendform.append("f", "acviaadc");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                alert(e);
                if (String(e).indexOf("actualizado") != -1) {
                    LCrv();
                    CloseModal();
                }
            },
        });
    }
}

function GuardarCriViapunadc() {
    if ($("#reqadc").val() == "" || $("#punadc").val() == "") {
        message = "Digite los datos obligatorios";
        alert(message);
    } else {
        var sendform = new FormData();
        sendform.append("req", $("#reqadc").val());
        sendform.append("pun", $("#punadc").val());
        sendform.append("conv", $("#convadc").val());
        sendform.append("tipo", $("#tipoadc").val());
        sendform.append("ayu", $("#ayuadc").val());
        sendform.append("f", "gcviaadi");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                alert(e);
                if (String(e).indexOf("guardado") != -1) {
                    CargarModalpunadc();
                }
            },
        });
    }
}

function updateCriViapunadi() {
    if ($("#req").val() == "" || $("#pun").val() == "") {
        message = "Digite los datos obligatorios";
        alerts_tec(message);
    } else if ($("#req").val() == "") {
        message = "Seleccione un criterio";
        alerts_tec(message);
        LCrv();
    } else {
        var sendform = new FormData();
        sendform.append("req", $("#req").val());
        sendform.append("pun", $("#pun").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("tipo", $("#tipo").val());
        sendform.append("cod", $("#cod").val());
        sendform.append("f", "acvia");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("actualizado") != -1) {
                    LCrv();
                }
            },
        });
    }
}

function LCrv() {
    Cargar("list.cri.via.php", "cont-convo-fun");
}

function ListCriVia() {
    var sendform = new FormData();
    sendform.append("f", "lcrivia");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listcrevia").html(e);
        },
    });
}

function LEmpcp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.empcp.php", "cont-convo-fun");
}

function ListEmpcp() {
    var sendform = new FormData();
    sendform.append("f", "lempcp");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listemp").html(e);
        },
    });
}
function LProcp(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("list.procp.php", "cont-convo-fun");
}

function ListProcp() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lprocp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}


function ListConflicEle() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lconele");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}
function ListSbsanaciones() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "ListSbsanaciones");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}

function ListSbsanacionesCp() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "ListSbsanacionesCp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}
function ListConflicEleCp() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lconeleCp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}
function ListConflicEleUsu() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lconeleusu");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}

function ListConflicViaUsu() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lconviausu");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}

function ListConflicEleUsuJur() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lconeleusuJur");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}
function ListConflicVia() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lconvia");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}

function ListConflicViaCp() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lconviaCp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}

function LEmp(bn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(bn).addClass("btn-functions-active");
    Cargar("list.emp.php", "cont-convo-fun");
}
function LEmp2(bn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(bn).addClass("btn-functions-active");
    Cargar("list.emp2.php", "cont-convo-fun");
}


function ListEmp() {
    var sendform = new FormData();
    sendform.append("f", "lemp");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listemp").html(e);
        },
    });
}

function ListEmpReg() {
    var sendform = new FormData();
    sendform.append("f", "lempReg");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listemp").html(e);
        },
    });
}
function ListEmp2() {
    var sendform = new FormData();
    sendform.append("f", "lemp2");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listemp").html(e);
        },
    });
}



function LPro(bn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(bn).addClass("btn-functions-active");
    Cargar("list.pro.php", "cont-convo-fun");
}

function LProReg(bn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(bn).addClass("btn-functions-active");
    Cargar("list.proreg.php", "cont-convo-fun");
}

function ListPro() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
   

    var sendform = new FormData();
    sendform.append("f", "lpro");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}

function ListProReg() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
   

    var sendform = new FormData();
    sendform.append("f", "lproReg");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}

function ListProevaele() {
    clearTimeout(Temporizador)
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
   
    var sendform = new FormData();
    sendform.append("f", "lproevaele");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            
            $("#listpro").html(e);
            DispararTimer(1)
        },
    });
}

function ListProevaeleTimer() {

    var sendform = new FormData();
    sendform.append("f", "lproevaele");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            if($("#tlproevaele").length){
            $("#listpro").html(e);
            DispararTimer(1)
                
            }
        },
    });
}

var Temporizador
function DispararTimer(f){
    switch (f)
    {
        case 1:
      Temporizador= setTimeout("ListProevaeleTimer()",30000)
        break
         case 2:
      Temporizador= setTimeout("ListProevaviaTimer()",30000)
        break
    
      case 3:
      Temporizador= setTimeout("ListProevaelecpTimer()",30000)
        break
    
     case 4:
      Temporizador= setTimeout("ListProevaviacpTimer()",30000)
        break
     case 5:
      Temporizador= setTimeout("ListProevaeleusuTimer()",30000)
        break  
        
    case 6:
      Temporizador= setTimeout("ListProevaeleusuJurTimer()",30000)
        break      
    }
    
}

function ListProevavia() {
    clearTimeout(Temporizador)
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
   

    var sendform = new FormData();
    sendform.append("f", "lproevavia");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
            DispararTimer(2)
        },
    });
}

function ListProevaviaTimer() {
    
    var sendform = new FormData();
    sendform.append("f", "lproevavia");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           if($("#tlproevavia").length){
            $("#listpro").html(e);
            DispararTimer(2)
                
            }
        },
    });
}

function ListProevaelecp() {
     clearTimeout(Temporizador)
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lproevaelecp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
             DispararTimer(3)
        },
    });
}

function ListProevaelecpTimer() {
    var sendform = new FormData();
    sendform.append("f", "lproevaelecp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
             if($("#tlproevaeleusu").length){
             $("#listpro").html(e);
             DispararTimer(3)
             }
        },
    });
}
function ListProevaviacp() {
    clearTimeout(Temporizador)
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lproevaviacp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
             DispararTimer(4)
        },
    });
}
function ListProevaviacpTimer() {

    var sendform = new FormData();
    sendform.append("f", "lproevaviacp");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
              if($("#tlproevaviacp").length){
              $("#listpro").html(e);
              DispararTimer(4)
                  
              }
        },
    });
}
function ListProevaeleaux() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lproevaeleaux");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}
function ListProevaviaaux() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lproevaviaaux");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}

function ListProevaeleusu() {
     clearTimeout(Temporizador)
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();
    sendform.append("f", "lproevaeleusu");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
            DispararTimer(5)
        },
    });
}
function ListProevaeleusuTimer() {
    var sendform = new FormData();
    sendform.append("f", "lproevaeleusu");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            if($("#tlproevaeleusu").length){
            $("#listpro").html(e);
            DispararTimer(5)    
            }
        },
    });
}

function ListProevaeleusuJur() {
    clearTimeout(Temporizador)
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lproevaeleusuJur");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
             DispararTimer(6) 
        },
    });
}
function ListProevaeleusuJurTimer() {
    var sendform = new FormData();
    sendform.append("f", "lproevaeleusuJur");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            if($("#tlproevaeleusu").length){
            $("#listpro").html(e);
            DispararTimer(6)    
            }
        },
    });
}

function ListProevaviausu() {
    $("#listpro").html("<div class='spinner-border text-dark'></div>");
    var sendform = new FormData();

    var sendform = new FormData();
    sendform.append("f", "lproevaviausu");
    sendform.append("cod", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listpro").html(e);
        },
    });
}
function Delpro(cod) {
    if (confirm("¿Está seguro de eliminar el proyecto?")) {
        var sendform = new FormData();
        sendform.append("f", "Delpro");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    ListPro();
                }
            },
        });
    }
}
function DelCriVia(cod) {
    if (confirm("¿Está seguro de eliminar el criterio?")) {
        var sendform = new FormData();
        sendform.append("f", "DelCriVia");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    ListCriVia();
                }
            },
        });
    }
}
function editarCrivia(id) {
    $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/cri.viaupd.php?cod=" + id,
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#cont-convo-fun").html(e);
        },
    });
}

function editarCriviapunadc(id) {
    $("#mtitle").html("<b>Editar Puntaje Adicional</b>");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#myModal").modal();
    $.ajax({
        type: "POST",
        url: "templates/modules/cri_via_pun_adcupd.php?cod=" + id,
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#mtitle").html("<b>Editar Puntaje Adicional</b>");
            $("#mbody").html(e);
            $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
            $("#myModal").modal();
            barralateral2();
        },
    });
}
function editarEmp(id) {
    Cargar("empresaupd.php?id=" + id, "cont-convo-fun");
}

function CargarCiudades() {
    var sendform = new FormData();
    sendform.append("f", "CambioDep2");
    sendform.append("dep", $("#dep").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#ciu").html(e);
        },
    });
}

function CargarCiudades3() {
    var sendform = new FormData();
    sendform.append("f", "CambioDep2");
    sendform.append("dep", $("#sel-depa").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#sel-ciud").html(e);
        },
    });
}

function GuardarEmp() {
    if ($("#nit").val() == "" ) { message = "Digite NIT";
        alerts_tec(message);
        $("#nit").focus()
    }
    else if ($("#num_ver").val() == "" ) { message = "Digite Número verificación";
        alerts_tec(message);
        $("#num_ver").focus()
    }    
    else if($("#raz").val() == "" ){ message = "Digite la razón social";
        alerts_tec(message);
         $("#raz").focus()
    } 
     else if($("#tam").val() == 0 ){ message = "Seleccione tamaño empresa";
        alerts_tec(message);
         $("#tam").focus() 
     } 
     else if($("#aluc").val() == 0 ){ message = "Seleccione tipo proponente";
        alerts_tec(message);
         $("#aluc").focus() 
     } 
      else if ($("#ciu").val() == 0) {
        message = "Seleccione la ciudad</h4>";
        alerts_tec(message);
        $("#ciu").focus()
    }
     else if($("#tam").val() == "" ){ message = "Seleccione tamaño empresa";
        alerts_tec(message);
         $("#tam").focus() 
     } 
         else if($("#dir").val() == "" ){ message = "Digite dirección empresa";
        alerts_tec(message);
             $("#dir").focus()
         } 
         else if($("#cp").val() == "" ){ message = "Digite Nombre contacto";
        alerts_tec(message);
             $("#cp").focus()
         }
         else if($("#act").val() == 0){ message = "Seleccione actividad económica";
        alerts_tec(message);
            $("#act").focus() 
         }
         
         else if($("#dep").val() == 0){ message = "Seleccione el departamento";
        alerts_tec(message);
            $("#dep").focus() 
         }
         else if($("#ciu").val() == 0){ message = "Seleccione la ciudad";
        alerts_tec(message);
            $("#ciu").focus() 
         }
         else if($("#dcrl").val() == 0){ message = "Seleccione tipo documento";
        alerts_tec(message);
            $("#dcrl").focus() 
         }
         else if($("#grl").val() == 0){ message = "Seleccione genero";
        alerts_tec(message);
            $("#grl").focus() 
         }
         else if($("#tel").val() == ""  ){ message = "Digite teléfono empresa";
        alerts_tec(message);
             $("#tel").focus()
         }
         else if($("#ema").val() == "" ){ message = "Digite email contacto";
        alerts_tec(message);
             $("#ema").focus()
         }
         else if($("#ndoc").val() == ""  ){ message = "Digite N. documento representante";
        alerts_tec(message);
         $("#ndoc").focus()    
         }
        else if($("#rep").val() == ""  ){ message = "Digite Nombre del representante";
        alerts_tec(message);
          $("#rep").focus()     
        }
        else if($("#fec_cons").val() == ""  ){ message = "Digite fecha constitución";
        alerts_tec(message);
         $("#fec_cons").focus()  
    } else {
        var sendform = new FormData();
        sendform.append("nit", $("#nit").val());
        sendform.append("raz", $("#raz").val());
        sendform.append("act", $("#act").val());
        sendform.append("tam", $("#tam").val());
        sendform.append("ciu", $("#ciu").val());
        sendform.append("dir", $("#dir").val());
        sendform.append("cp", $("#cp").val());
        sendform.append("tel", $("#tel").val());
        sendform.append("ema", $("#ema").val());
        sendform.append("ndoc", $("#ndoc").val());
        sendform.append("num_ver", $("#num_ver").val());
        sendform.append("fec_cons", $("#fec_cons").val());
        sendform.append("dcrl", $("#dcrl").val());
        sendform.append("grl", $("#grl").val());
        sendform.append("aluc", $("#aluc").val());
        sendform.append("rep", $("#rep").val());
        sendform.append("car_con", $("#car_con").val());
        sendform.append("tel_con", $("#tel_con").val());
        sendform.append("f", "gemp");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                //alert(e)
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("guardada") != -1) {
                    empresas($("#btnemp"));
                }
            },
        });
    }
}

function updateEmp() {
    if ($("#nit").val() == "" ) { message = "Digite NIT";
        alerts_tec(message);
        $("#nit").focus()
    }
    else if ($("#num_ver").val() == "" ) { message = "Digite Número verificación";
        alerts_tec(message);
        $("#num_ver").focus()
    } 
     else if ($("#ciu").val() == 0) {
        message = "Seleccione la ciudad";
        alerts_tec(message);
        $("#ciu").focus()
    }
    else if($("#raz").val() == "" ){ message = "Digite la razón social";
        alerts_tec(message);
         $("#raz").focus()
    } 
     else if($("#tam").val() == 0 ){ message = "Seleccione tamaño empresa";
        alerts_tec(message);
         $("#tam").focus() 
     } 
     else if($("#aluc").val() == 0 || $("#aluc").val()==null ||  $("#aluc").val()==""){ message = "<h4><br>Seleccione tipo proponente";
        alerts_tec(message);
         $("#aluc").focus() 
     } 
     else if($("#tam").val() == "" ){ message = "Seleccione tamaño empresa";
        alerts_tec(message);
         $("#tam").focus() 
     } 
         else if($("#dir").val() == "" ){ message = "Digite dirección empresa";
        alerts_tec(message);
             $("#dir").focus()
         } 
         else if($("#cp").val() == "" ){ message = "Digite Nombre contacto";
        alerts_tec(message);
             $("#cp").focus()
         }
         else if($("#act").val() == 0){ message = "Seleccione actividad económica";
        alerts_tec(message);
            $("#act").focus() 
         }
       
         else if($("#dep").val() == 0){ message = "Seleccione el departamento";
        alerts_tec(message);
            $("#dep").focus() 
         }
           else if($("#ciu").val() == 0){ message = "Seleccione la ciudad";
        alerts_tec(message);
            $("#ciu").focus() 
         }
         else if($("#dcrl").val() == 0){ message = "Seleccione tipo documento";
        alerts_tec(message);
            $("#dcrl").focus() 
         }
         else if($("#grl").val() == 0){ message = "Seleccione genero";
        alerts_tec(message);
            $("#grl").focus() 
         }
         else if($("#tel").val() == ""  ){ message = "Digite teléfono empresa";
        alerts_tec(message);
             $("#tel").focus()
         }
         else if($("#ema").val() == "" ){ message = "Digite email contacto";
        alerts_tec(message);
             $("#ema").focus()
         }
         else if($("#ndoc").val() == ""  ){ message = "Digite N. documento representante";
        alerts_tec(message);
         $("#ndoc").focus()    
         }
        else if($("#rep").val() == ""  ){ message = "Digite Nombre del representante";
        alerts_tec(message);
          $("#rep").focus()     
        }
        else if($("#fec_cons").val() == ""  ){ message = "Digite fecha constitución";
        alerts_tec(message);
         $("#fec_cons").focus()  
    } else if ($("#id").val() == "") {
        message = "Seleccione una empresa";
        alerts_tec(message);
        LEmp($("#btnemp"));
    } else {
        var sendform = new FormData();
        sendform.append("id", $("#id").val());
        sendform.append("nit", $("#nit").val());
        sendform.append("raz", $("#raz").val());
        sendform.append("act", $("#act").val());
        sendform.append("tam", $("#tam").val());
        sendform.append("ciu", $("#ciu").val());
        sendform.append("dir", $("#dir").val());
        sendform.append("cp", $("#cp").val());
        sendform.append("tel", $("#tel").val());
        sendform.append("num_ver", $("#num_ver").val());
        sendform.append("fec_cons", $("#fec_cons").val());
        sendform.append("ema", $("#ema").val());
        sendform.append("ndoc", $("#ndoc").val());
        sendform.append("dcrl", $("#dcrl").val());
        sendform.append("grl", $("#grl").val());
        sendform.append("aluc", $("#aluc").val());
        sendform.append("rep", $("#rep").val());
        sendform.append("car_con", $("#car_con").val());
        sendform.append("tel_con", $("#tel_con").val());
        sendform.append("f", "aemp");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
             
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("actualizada") != -1) {
                  // LEmp($("#btnemp"));
                }
            },
        });
    }
}

function CargarObjetivos() {
    var sendform = new FormData();
    sendform.append("f", "CargarObjetivos");
    sendform.append("pro", $("#id").val());
    $("#obj_esp").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);
            $("#obj_gen").html(respuesta[0]);
            $("#obj_esp").html(respuesta[1]);
            conteoprogresoAdi5 = 0;

            if ($("#obj_gen").val() != "" && $("#obj_esp").html().indexOf("No hay objetivos") == -1) {
                conteoprogresoAdi5 += 4;
            }

          
            sumar_barra();
        },
    });
}

function CargarObjetivoseva() {
    var sendform = new FormData();
    sendform.append("f", "CargarObjetivoseva");
    sendform.append("pro", $("#idProoo").val());
    $("#obj_esp").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);
            $("#obj_gen").html(respuesta[0]);
            $("#obj_esp").html(respuesta[1]);
        },
    });
}

function CargarProdu() {
    var sendform = new FormData();
    sendform.append("f", "Cargarprodu");
    sendform.append("pro", $("#id").val());
    $("#produc").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#produc").html(e);
            conteoprogresoAdi3 = 0;
            if ($("#produc").html().indexOf("No hay productos") == -1) {
                conteoprogresoAdi3 += 4;
            }

            sumar_barra();
        },
    });
}

function CargarProdueva() {
    var sendform = new FormData();
    sendform.append("f", "Cargarprodueva");
    sendform.append("pro", $("#idProoo").val());
    $("#produc").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#produc").html(e);
        },
    });
}

function CargarRes() {
    var sendform = new FormData();
    sendform.append("f", "CargarRes");
    sendform.append("pro", $("#id").val());
    $("#resul").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#resul").html(e);
            conteoprogresoAdi4 = 0;
            if ($("#resul").html().indexOf("No hay resultados") == -1) {
                conteoprogresoAdi4 += 4;
            }

            sumar_barra();
        },
    });
}

function CargarReseva() {
    var sendform = new FormData();
    sendform.append("f", "CargarReseva");
    sendform.append("pro", $("#idProoo").val());
    $("#resul").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#resul").html(e);
        },
    });
}

function CargarTip() {
    var sendform = new FormData();
    sendform.append("f", "CargarTip");
    sendform.append("pro", $("#id").val());

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#switch0").attr("checked", respuesta[0]);
            $("#switch1").attr("checked", respuesta[1]);
            $("#switch2").attr("checked", respuesta[2]);
        },
    });
}

function CargarTipeva() {
    var sendform = new FormData();
    sendform.append("f", "CargarTip");
    sendform.append("pro", $("#idProoo").val());

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#switch0").attr("checked", respuesta[0]);
            $("#switch1").attr("checked", respuesta[1]);
            $("#switch2").attr("checked", respuesta[2]);
        },
    });
}

function limpiarFormPT() {
    $("#cod_pt").val("");
    $("#nom_pt").val("0");
    $("#val_con_pt").val("0");
    $("#val_fin_pt").val("0");
    $("#val_tot_pt").val("0");
    $("#num_folio").val("");
    $("#formato").val("");
}

function CargarPt() {
    var sendform = new FormData();
    sendform.append("f", "CargarPt");
    sendform.append("pro", $("#id").val());
    $("#list_pt").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#list_pt").html(e);
            conteoprogresoPt = 0;
            var celda = document.getElementById("tblpt").rows[1].cells[0].innerHTML;

            var nFilas = $("#tblpt > tbody > tr").length;
            if (nFilas > 0 && celda.indexOf("No hay") == -1) {
                conteoprogresoPt += 20;
                $("#chekP2").css("color", "green");
            } else {
                $("#chekP2").css("color", "#CCC");
            }
            sumar_barra();
        },
    });
}

function CargarCF() {
    var sendform = new FormData();
    sendform.append("f", "CargarCF");
    sendform.append("pt", $("#cod_pt").val());
    $("#listCF").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listCF").html(e);
        },
    });
}

function Cargartem_Asc() {
    var sendform = new FormData();
    sendform.append("f", "Cargartem_Asc");
     sendform.append("pro", $("#id").val());
    $("#listTA").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listTA").html(e);
             conteoprogresoAdi1=0;
             var celda = document.getElementById("tbltem").rows[1].cells[0].innerHTML;
            
            var nFilas = $("#tbltem > tbody > tr").length;
            if (nFilas > 0 && celda.indexOf("No hay") == -1) {
                conteoprogresoAdi1 += 4;
            } 
            sumar_barra();
        },
    });
}
function CargarEB() {
    var sendform = new FormData();
    sendform.append("f", "CargarEB");
     sendform.append("pro", $("#id").val());
    $("#listEB").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listEB").html(e);
            conteoprogresoAdi2=0;
             var celda = document.getElementById("tblEB").rows[1].cells[0].innerHTML;

            var nFilas = $("#tblEB > tbody > tr").length;
            if (nFilas > 0 && celda.indexOf("No hay") == -1) {
                conteoprogresoAdi2 += 4;
            } 
            sumar_barra();
        },
    });
}
function CargarEB_eva() {
    var sendform = new FormData();
    sendform.append("f", "CargarEB_eva");
     sendform.append("pro", $("#idProoo").val());
    $("#listEB").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listEB").html(e);
        },
    });
}

function Cargartem_Asc_evaluadores() {
    var sendform = new FormData();
    sendform.append("f", "Cargartem_Asc_evaluadores");
     sendform.append("pro", $("#id").val());
    $("#listTA").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listTA").html(e);
        },
    });
}


function CargarCF2() {
    var sendform = new FormData();
    sendform.append("f", "CargarCF2");
    sendform.append("pt", $("#cod_pt").val());
    $("#listCF").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#listCF").html(e);
        },
    });
}

function CargarPteva() {
    var sendform = new FormData();
    sendform.append("f", "CargarPteva");
    sendform.append("pro", $("#idProoo").val());
    $("#list_pt").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#list_pt").html(e);
        },
    });
}

function CargarAnex() {
    var sendform = new FormData();
    sendform.append("f", "CargarAnex");
    sendform.append("pro", $("#id").val());
    $("#list_anex").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#list_anex").html(e);
            conteoprogresoAnx = 0;
            var celda = document.getElementById("tblanex").rows[1].cells[0].innerHTML;
            var nFilas2 = $("#tblanex > tbody > tr").length;

            if (nFilas2 > 0 && celda.indexOf("No hay") == -1) {
                conteoprogresoAnx += 20;
                $("#chekP5").css("color", "green");
            } else {
                $("#chekP5").css("color", "#CCC");
            }
            sumar_barra();
        },
    });
}

function CargarAnexeva() {
    var sendform = new FormData();
    sendform.append("f", "CargarAnexeva");
    sendform.append("pro", $("#idProoo").val());
    $("#list_anex").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#list_anex").html(e);
        },
    });
}

function AddTip(ele, tipo) {
    var f;
    if ($("#" + ele).is(":checked")) {
        f = "AddTip";
    } else {
        f = "DelTip";
    }

    var sendform = new FormData();
    sendform.append("f", f);
    sendform.append("pro", $("#id").val());
    sendform.append("tipo", tipo);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {},
    });
}
function AddRes() {
    if ($("#des_res").val() == "") {
        message = 'Digite el resultado';
        alerts_tec(message);
    } else {
        var sendform = new FormData();
        sendform.append("f", "AddRes");
        sendform.append("pro", $("#id").val());
        sendform.append("res", $("#des_res").val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("no") == -1) {
                    $("#des_res").val("");
                    CargarRes();
                }
            },
        });
    }
}
//AddEB()

function AddEB(){
    if ($("#nit_emp_ben").val() == "") {
        message = 'Digite el nit de la entidad';
        alerts_tec(message);
    }
    
     else if ($("#num_ver").val() == "") {
        message = 'Digite número de verificación';
        alerts_tec(message);
    }
    
    else if ($("#fec_con")=="") {
        message = 'Digite la fecha de constitución';
        alerts_tec(message);
    }
    
    else {
        var sendform = new FormData();
        sendform.append("f", "AddEB");
        sendform.append("pro", $("#id").val());
        sendform.append("nit", $("#nit_emp_ben").val());
        sendform.append("raz", $("#raz_soc").val());
        sendform.append("fec_con", $("#fec_con").val());
        sendform.append("num_ver", $("#num_ver").val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("no") == -1) {
                $("#nit_emp_ben").val("");
                $("#raz_soc").val("");
                $("#fec_con").val("");
                $("#num_ver").val("");
                CargarEB();
                }
            },
        });
    }
}

function AddTemp() {
    if ($("#diase").val() == "" || $("#diasv").val() == "") {
        message = 'Digite los valores';
        alerts_tec(message);
    } else {
        var sendform = new FormData();
        sendform.append("f", "AddTiempo");
        sendform.append("cod", $("#conv").val());
        sendform.append("de", $("#diase").val());
        sendform.append("dv", $("#diasv").val());
        sendform.append("ce", $("#conteoe").val());
        sendform.append("cv", $("#conteov").val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("no") != -1) {
                    ConsultaTiempo();
                }
            },
        });
    }
}
function AddPt() {
    if ($("#cod_pt").val() == "") {
        if ($("#val_con_pt").val() == "" || $("#val_fin_pt").val() == "" || $("#nom_pt").val() == "") {
            message = 'Digite los datos obligatorios';
            alerts_tec(message);
        } else {
            $("#loadpt").html(" &nbsp; <div class='spinner-border text-dark' style='color:#0075B!important;'></div>");
            $("#btn-add-pt").attr("disabled", true);
            var sendform = new FormData();
            sendform.append("f", "AddPt");
            sendform.append("id_pro", $("#id").val());
            sendform.append("nom", $("#nom_pt").val().replace(/\,/g, ""));
            sendform.append("val_con", $("#val_con_pt").val().replace(/\,/g, ""));
            sendform.append("val_fin", $("#val_fin_pt").val().replace(/\,/g, ""));

            $.ajax({
                type: "POST",
                url: "phpMVC/Controller/controller.php",
                data: sendform,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {},
                success: function (e) {
                    $("#loadpt").html("");
                    $("#btn-add-pt").attr("disabled", false);
                    var respuesta = JSON.parse(e);
                    if (String(e).indexOf("trasferencia agregado") != -1) {
                        message = '<i class="fas fa-thumbs-up"></i> ' + respuesta[0];
                        alerts_tec(message);
                        $("#cod_pt").val(respuesta[1]);
                        CargarPt();
                        CargarCF();
                    } else {
                        message = '<i class="fas fa-thumbs-up"></i> ' + respuesta[0] ;
                        alerts_tec(message);
                    }
                },
            });
        }
    } else {
        edtPT();
    }
}

function edtPT() {
    if ($("#val_con_pt").val() == "" || $("#val_fin_pt").val() == "" || $("#nom_pt").val() == "") {
        message = 'Digite los datos obligatorios';
        alerts_tec(message);
    } else {
        $("#loadpt").html(" &nbsp; <div class='spinner-border text-dark' style='color:#0075B!important;'></div>");
        $("#btn-add-pt").attr("disabled", true);
        var sendform = new FormData();
        sendform.append("f", "edtPT");
        sendform.append("cod", $("#cod_pt").val());
        sendform.append("nom", $("#nom_pt").val().replace(/\,/g, ""));
        sendform.append("val_con", $("#val_con_pt").val().replace(/\,/g, ""));
        sendform.append("val_fin", $("#val_fin_pt").val().replace(/\,/g, ""));

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#loadpt").html("");
                $("#btn-add-pt").attr("disabled", false);

                if (String(e).indexOf("trasferencia modificado") != -1) {
                    message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                    alerts_tec(message);
                    CargarPt();
                    CargarCF();
                } else {
                    message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                    alerts_tec(message);
                }
            },
        });
    }
}
//Addtem_Asc()
function Addtem_Asc() {
    
        $("#loadtemasc").html(" &nbsp; <div class='spinner-border text-dark' style='color:#0075B!important;'></div>");
        $("#btn-add-addtem").attr("disabled", true);
        var sendform = new FormData();
        sendform.append("f", "Addtem_Asc");
         sendform.append("pro", $("#id").val());
        sendform.append("tem", $("#tema_").val());
       
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#loadtemasc").html("");
                $("#btn-add-addtem").attr("disabled", false);
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("no") == -1) {

                    Cargartem_Asc();
                }
            },
        });
    }

function Addcf() {
    if ($("#cod_pt").val() == "") {
        message = 'Seleccione un plan de el listado';
        alerts_tec(message);
    } else if ($("#num_folio").val() == "") {
        message = 'Digite el número folio';
        alerts_tec(message);
    } else {
        if ($("#formato").val() != "" && $("#formato").val() != null) {
            var archivo = document.getElementById("formato").files[0];
            if (archivo.size > 40000000) {
                message = '<i class="fa fa-exclamation-circle"></i> El archivo puede pesar max. 40MB';
                alerts_tec(message);
                return 0;
            }
        }

        $("#loadcf").html(" &nbsp; <div class='spinner-border text-dark' style='color:#0075B!important;'></div>");
        $("#btn-add-cf").attr("disabled", true);
        var sendform = new FormData();
        sendform.append("f", "Addcf");
        sendform.append("cod", $("#cod_pt").val());
        sendform.append("cf", $("#cen_for").val());
        sendform.append("folio", $("#num_folio").val());
        sendform.append("formato", archivo);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#loadcf").html("");
                $("#btn-add-cf").attr("disabled", false);
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("no") == -1) {
                    $("#num_folio").val("");
                    $("#formato").val("");
                    CargarCF();
                    CargarPt();
                }
            },
        });
    }
}

function Addasig() {
    if ($("#pro").val() == null || $("#usu").val() == null || $("#Criterios").val() == "") {
        message = 'Seleccione los datos obligatorios';
        alerts_tec(message);
    } else {
        $("#btn-add-pers").html("<div class='spinner-border text-dark' style='color:#0075B!important;'></div>");
        $("#btn-add-pers").attr("disabled", true);
        var sendform = new FormData();
        sendform.append("f", "Addasig");
        sendform.append("pro", $("#pro").val());
        sendform.append("usu", $("#usu").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("fase", $("#fase").val());
        sendform.append("proname", $("#pro option:selected").text());
        sendform.append("Criterios", $("#Criterios").val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
               // alert(e)
                $("#btn-add-pers").html("<i class='fas fa-save'></i>&nbsp;Asignar");
                $("#btn-add-pers").attr("disabled", false);
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("ya") == -1 && String(e).indexOf("Error") == -1) {
                   cambiarpro2();
                   
                    
                }
            },
        });
    }
}
function AddasigJur() {
     
    if ($("#pro").val() == null || $("#usu").val() == null || $("#Criterios").val() == "") {
        message = 'Seleccione los datos obligatorios';
        alerts_tec(message);
    } else {
        $("#btn-add-pers").html("<div class='spinner-border text-dark' style='color:#0075B!important;'></div>");
        $("#btn-add-pers").attr("disabled", true);
        var sendform = new FormData();
        sendform.append("f", "AddasigJur");
        sendform.append("pro", $("#pro").val());
        sendform.append("usu", $("#usu").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("fase", $("#fase").val());
        sendform.append("proname", $("#pro option:selected").text());
        sendform.append("Criterios", $("#Criterios").val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
               // alert(e)
                $("#btn-add-pers").html("<i class='fas fa-save'></i>&nbsp;Asignar");
                $("#btn-add-pers").attr("disabled", false);
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("ya") == -1 && String(e).indexOf("Error") == -1) {
                    asignarprojud($("#asijur"));
                }
            },
        });
    }
}

function AddAnex() {
    if ($("#num_folio2").val() == "") {
        message = 'Digite los datos obligatorios';
        alerts_tec(message);
    } else {
        if ($("#doc_ane").val() != "" && $("#doc_ane").val() != null) {
            var archivo = document.getElementById("doc_ane").files[0];
            if (archivo.size > 40000000) {
                message = 'El archivo puede pesar max. 40MB';
                alerts_tec(message);
                return 0;
            }
        }

        $("#loadanex").html(" &nbsp; <div class='spinner-border text-dark' style='color:#0075B!important;'></div>");
        $("#btn-add-anex").attr("disabled", true);
        var sendform = new FormData();
        sendform.append("f", "AddAnex");
        sendform.append("id_pro", $("#id").val());
        sendform.append("docu", $("#docu_ane").val());
        sendform.append("folio", $("#num_folio2").val());
        sendform.append("fec", $("#fec_exp").val());

        sendform.append("formato", archivo);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#loadanex").html("");
                $("#btn-add-anex").attr("disabled", false);
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("no") == -1) {
                    $("#num_folio2").val("");
                    $("#fec_exp").val("");
                    $("#doc_ane").val("");
                    CargarAnex();
                }
            },
        });
    }
}

function asignarpro(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("asig_usu.php", "cont-convo-fun");
}

function asignarprojud(btn) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("asig_jur.php", "cont-convo-fun");
}

function asignarpro2(btn, fase) {
    $(".btn-functions").removeClass("btn-functions-active");
    $(btn).addClass("btn-functions-active");
    Cargar("asig_usu.php?fase=" + fase, "cont-convo-fun");
}
function AddObjGen() {
    if ($("#obj_gen").val() == "") {
        message = 'Digite el objetivo';
        alerts_tec(message);
    } else {
        var sendform = new FormData();
        sendform.append("f", "AddObjGen");
        sendform.append("pro", $("#id").val());
        sendform.append("obj", $("#obj_gen").val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                conteoprogresoAdi5 = 0;

                if ($("#obj_gen").val() != "" && $("#obj_esp").html().indexOf("No hay objetivos") == -1) {
                    conteoprogresoAdi5 += 4;
                }

                sumar_barra();
            },
        });
    }
}
function AddObjEsp() {
    if ($("#obj_esp1").val() == "") {
        message = 'Digite el objetivo';
        alerts_tec(message);
    } else {
        var sendform = new FormData();
        sendform.append("f", "AddObjEsp");
        sendform.append("pro", $("#id").val());
        sendform.append("obj", $("#obj_esp1").val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("no") == -1) {
                    $("#obj_esp1").val("");
                    CargarObjetivos();
                }
            },
        });
    }
}
function AddProdu() {
    if ($("#des_pro").val() == "") {
        message = 'Digite el producto';
        alerts_tec(message);
    } else {
        var sendform = new FormData();
        sendform.append("f", "Addprodu");
        sendform.append("pro", $("#id").val());
        sendform.append("produ", $("#des_pro").val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("no") == -1) {
                    $("#des_pro").val("");
                    CargarProdu();
                }
            },
        });
    }
}
function DelObjEsp(cod) {
    if (confirm("¿Está seguro de eliminar el objetivo?")) {
        var sendform = new FormData();
        sendform.append("f", "DelObjEsp");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    CargarObjetivos();
                }
            },
        });
    }
}
function DelAsigele(cod, cri, pro, usu) {
    if (confirm("¿Está seguro de eliminar la asignación?")) {
        var sendform = new FormData();
        sendform.append("f", "DelAsigele");
        sendform.append("cod", cod);
        sendform.append("cri", cri);
        sendform.append("usu", usu);
        sendform.append("pro", pro);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message =  e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminada") != -1) {
                   cambiarpro2();
                   
                    
                }
            },
        });
    }
}

function ProSinAsigEle(){
  
        var sendform = new FormData();
        sendform.append("f", "ProSinAsigEle");
        
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                
                $("#btnsinasigele").html("Proyectos sin asignar elegibilidad "+e)
                    
                }
         
        });
    
}

function ProSinAsigVia(){
  
        var sendform = new FormData();
        sendform.append("f", "ProSinAsigVia");
        
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                
                $("#btnsinasigvia").html("Proyectos sin asignar viabilidad "+e)
                    
                }
         
        });
    
}



function DelAsigeleJur(cod, cri, pro, usu) {
    if (confirm("¿Está seguro de eliminar la asignación?")) {
        var sendform = new FormData();
        sendform.append("f", "DelAsigeleJur");
        sendform.append("cod", cod);
        sendform.append("cri", cri);
        sendform.append("usu", usu);
        sendform.append("pro", pro);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
               message =  e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminada") != -1) {
                    asignarprojud($("#asijur"));

                    //VerAsigele($("#conv").val(),pro)
                }
            },
        });
    }
}

function DelAsigvia(cod, pro,usu) {
    if (confirm("¿Está seguro de eliminar la asignación?")) {
        var sendform = new FormData();
        sendform.append("f", "DelAsigvia");
        sendform.append("cod", cod);
        sendform.append("pro", pro);
        sendform.append("usu",usu);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
               
                alert(e);
                if (String(e).indexOf("eliminada") != -1) {
                    cambiarpro2();
                   VerAsigvia($("#conv").val(), pro);
                }
            },
        });
    }
}
function DelPt(cod) {
    if (confirm("¿Está seguro de eliminar el plan de trasferencia?")) {
        var sendform = new FormData();
        sendform.append("f", "DelPt");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    CargarPt();
                }
            },
        });
    }
}
function DelAnex(cod) {
    if (confirm("¿Está seguro de eliminar el Anexo?")) {
        var sendform = new FormData();
        sendform.append("f", "DelAnex");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    CargarAnex();
                }
            },
        });
    }
}
function Delprodu(cod) {
    if (confirm("¿Está seguro de eliminar el producto?")) {
        var sendform = new FormData();
        sendform.append("f", "Delprodu");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    CargarProdu();
                }
            },
        });
    }
}
function DelRes(cod) {
    if (confirm("¿Está seguro de eliminar el resultado?")) {
        var sendform = new FormData();
        sendform.append("f", "DelRes");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    CargarRes();
                }
            },
        });
    }
}
function MostrarDivPeva(div) {
    if ($("#idProoo").val() == "") {
        alert("cargar proyecto !");
    } else {
        $("#" + div).fadeIn();
        if (div == "divobj") {
            CargarObjetivoseva();
        } else if (div == "divprod") {
            CargarProdueva();
        } else if (div == "divres") {
            CargarReseva();
        } else if (div == "divtip") {
            CargarTipeva();
        } else if (div == "divtra") {
            CargarPteva();
        } else if(div=="divtem_asoc")
        {
            Cargartem_Asc_evaluadores();
        }
          else if(div=="divent_ben")
        {
            CargarEB_eva();
        }
        else {
            CargarAnexeva();
        }
    }
}

function MostrarDivP(div) {
    if ($("#id").val() == "") {
        alert("Debe guardar un proyecto o cargar uno de la lista !");
    } else {
        $("#" + div).fadeIn();
        if (div == "divobj") {
            CargarObjetivos();
        } else if (div == "divprod") {
            CargarProdu();
        } else if (div == "divres") {
            CargarRes();
        } else if (div == "divtip") {
            CargarTip();
        } else if (div == "divtra") {
            CargarPt();
        } else if (div == "divtem_asoc") {
            Cargartem_Asc();
        } 
         else if (div="divent_ben")
        {  
            CargarEB();    
        }
        else {
            CargarAnex();
        }
    }
}

function MostrarDivEvaEle(div) {
    if (div == "diveva") {
        CargarDivevaele();
    } else if (div == "divsub") {
        CargarDivsub();
    } else if (div == "divsub2") {
        CargarDivsub2();
    }
     else if (div == "divsub3") {
        CargarDivsub3();
    }
}

function MostrarDivEvaEle_(div) {
    if (div == "diveva") {
        CargarDivevaele_();
    } else if (div == "divsub") {
        CargarDivsub();
    } else if (div == "divsub2") {
        CargarDivsub2();
    }
}

function MostrarDivEvaEleJur(div) {
    if (div == "diveva") {
        CargarDivevaele_Jur();
    } else if (div == "divsub") {
        CargarDivsub();
    } else if (div == "divsub2") {
        CargarDivsub2();
    }
}

function CargarDivsub() {
    var sendform = new FormData();
    sendform.append("f", "CargarDivsub");
    sendform.append("pro", $("#id_pro").val());
    $("#divsub").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#divsub").html(e);
        },
    });
}
function CargarDivsub2() {
    var sendform = new FormData();
    sendform.append("f", "CargarDivsub2");
    sendform.append("pro", $("#id_pro").val());
    $("#divsub").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#divsub2").html(e);
        },
    });
}
function CargarDivsub3() {
    var sendform = new FormData();
    sendform.append("f", "CargarDivsub3");
    sendform.append("pro", $("#id_pro").val());
    $("#divsub").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#divsub3").html(e);
        },
    });
}
function FinalizarSubsana(id)
{
   var sendform = new FormData();
    sendform.append("f", "FinalizarSubsana");
    sendform.append("id", id);
  
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         //alert(e)  
         RefreshSubsana()
        },
    });  
    
}
function FinalizarSubsanaJur(id)
{
   var sendform = new FormData();
    sendform.append("f", "FinalizarSubsana");
    sendform.append("id", id);
  
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         //alert(e)  
         RefreshSubsanaJur()
        },
    });  
    
}

function CambiarestadoSubsana1(id,dit)
{  
    if(dit==1){
         if($("#ckeck_fec_env_col").is(":checked")==false)
        {
           $("#fec_env_col").val("") 
           return; 
        }
    }
    
   var sendform = new FormData();
    sendform.append("f", "CambiarestadoSubsana1");
    sendform.append("id", id);
   
    sendform.append("dit", dit);
     sendform.append("fec", $("#fec_env_col").val());
   // alert($("#fech_env_col_pro").val())
   if($("#ckeck_fec_env_col").is(":checked")==false)
   {
       
    $("#check_res_cl").prop("checked", false) 
    
   }
  
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            
         if(String(e).indexOf("no")==-1){
         botoneSubsanaciones($("#btn_sub"))
         cargarinfoSubsana(id)
         }
        },
    });  
    
}


function CambiarestadoSubsana2(id )
{   var dat=0
    if($("#check_res_cl").is(":checked"))
{
    dat=1
}
else{
    dat=0
}
   var sendform = new FormData();
    sendform.append("f", "CambiarestadoSubsana2");
    sendform.append("id", id);
    sendform.append("dat", dat);
    sendform.append("fec", $("#fech_res_col").val());
  
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
          
        if(String(e).indexOf("no")==-1){
        botoneSubsanaciones($("#btn_sub"))
        cargarinfoSubsana(id)
         }
         else{
        
          $("#check_res_cl").prop("checked", false)  
          $("#fech_res_col").val("")
         }
         
        
        },
    });  
    
}
function cargarinfoSubsana(id){
    var sendform = new FormData();
    sendform.append("f", "cargarinfoSubsana");
    sendform.append("id", id);
  
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            //alert(e)
         var respuesta = JSON.parse(e)
        //$array=[$datos[id],$this->FormatDate2($datos['fecha']),$this->FormatDate2($datos['fecha_col_pro']),$this->FormatDate2($datos['fecha2']),$fila,$datos['n_folio'],$checked,$checked2,$disabled]; 
       $("#fecha2").html("<input type='date' id='fec_env_col' value='"+respuesta[2]+"'>")
       $("#fecha3").html("<input type='date' id='fech_res_col' value='"+respuesta[3]+"'>")
       
        
        },
    });   
 //;   
}
function SubsanarPro(id, fecha,fila) {
  var observacion=document.getElementById("tblsubsana").rows[fila].cells[4].innerHTML
  var requisito=document.getElementById("tblsubsana").rows[fila].cells[0].innerHTML
  var folio=document.getElementById("tblsubsana").rows[fila].cells[5].innerHTML
    $("#divsub").html(
        "<div  class='row'><input type='hidden' id='id_sub' value='" +
            id +
            "'><div  class='col-md-12'  ><button class='btn-functions' id='btn_add_sub' onclick=\"MostrarDivEvaEle('divsub')\"><i class='fas fa-arrow-left'></i>&nbsp;Volver</button></div><div  class='col-md-4' style='margin-top:8px;' ><b>Fecha Solicitud</b> <br>" +
            fecha +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Observación evaluador</b><br>" +
            observacion +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Requisito</b><br>" +
            requisito +
            "</div><div  class='col-md-4' style='margin-top:8px;display:none;' ><b>Observación evaluado </b><textarea id='obs_eva'class='form-control inps-forms'></textarea></div><div  class='col-md-4' style='margin-top:8px;' ><b>N. de folio</b><input type='text'  id='num_folio' value='" +
            folio +
            "' class='form-control inps-forms' onkeypress='return soloNumeros(event)'></div><div  class='col-md-4' style='margin-top:8px;' ><b>Archivo</b><input type='file'  id='formato'  ></div><div  class='col-md-12' style='margin-top:8px;text-align:center;'><button class='btn-functions' id='btn_add_sub' onclick='SubsanacionPro()'><i class='fas fa-plus-save'></i>&nbsp;Enviar &nbsp; <span id='loadbtnsub'></span></button></div></div>"
    );
}

function SubsanarPro_L(id, fecha,fecha2,fecha3,fila,folio,checked,checked2,disabled,nom,rol) {
    var role=""
    if(rol==3)
    {
        role="EVALUADOR DE ELEGIBILIDAD"
    }
    else
    {
        role="ASESOR JURÍDICO/ABOGADO"
    }
  var id_proy=document.getElementById("tlproevaele_sub").rows[fila].cells[0].innerHTML
  var empresa=document.getElementById("tlproevaele_sub").rows[fila].cells[2].innerHTML
  var observacion=document.getElementById("tlproevaele_sub").rows[fila].cells[5].innerHTML
  var pro=document.getElementById("tlproevaele_sub").rows[fila].cells[1].innerHTML
  var requisito=document.getElementById("tlproevaele_sub").rows[fila].cells[10].innerHTML
    var fec_env_col=document.getElementById("tlproevaele_sub").rows[fila].cells[11].innerHTML
      var fec_rec_col=document.getElementById("tlproevaele_sub").rows[fila].cells[12].innerHTML
  barralateral2()
   $("#mtitle").html("<b>SUBSANACIÓN EVALUADOR :</b>  "+nom.toUpperCase()+" - "+role);
            $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
            $("#myModal").modal();
            
    $("#mbody").html(
        "<div  class='row'><input type='hidden' id='id_sub' value='" +
            id +
            "'><div  class='col-md-2' style='margin-bottom:10px;' ><b>id proyecto :</b></div> <div class='col-md-1' style='margin-bottom:10px;' >"+id_proy+"</div><div  class='col-md-2' style='margin-bottom:10px;' ><b>Empresa :</b></div> <div class='col-md-7' style='margin-bottom:10px;' >"+empresa+"</div><div  class='col-md-1'  ><b>Título  :</b></div><div class='col-md-11'  >"+pro+"</div><div  class='col-md-3' style='margin-top:10px;' ><b>Enviada a colombia productiva </b><br> <input type='checkbox' "+checked+" id='ckeck_fec_env_col' onclick=\"CambiarestadoSubsana1("+id+",0)\" "+disabled+"></div><div  class='col-md-3'  style='margin-top:10px;'><b>Fecha de envio a Colombia productiva </b> <span id='fecha2'> <input type='date' value='"+fec_env_col+"' id='fec_env_col' "+disabled+"> </span><i class='fas fa-sync-alt' title='Actualizar'  style='cursor:pointer;color:#0075b0;margin-left: 10px;font-size:20px;' onclick=\"CambiarestadoSubsana1("+id+",1)\" "+disabled+"></i></div><div  class='col-md-3' style='margin-top:10px;' ><b>Colombia productiva respondió ?</b> <input type='checkbox' "+checked2+" id='check_res_cl' onclick=\"CambiarestadoSubsana2("+id+")\" "+disabled+"></div><div  class='col-md-3' style='margin-top:10px;' ><b>Fecha de respuesta de Colombia productiva</b><span id='fecha3'><input type='date' id='fec_rec_col' value='"+fec_rec_col+"' "+disabled+"></span><i class='fas fa-sync-alt' title='Actualizar' onclick=\"CambiarestadoSubsana2("+id+")\" style='cursor:pointer;color:#0075b0;margin-left: 10px;font-size:20px;' "+disabled+"></i></div><div  class='col-md-12' style='margin-top:8px;' ><hr style='width:100%;border:1px solid #e0e0e0;'></div><div  class='col-md-4' style='margin-top:8px;' ><b>Fecha Solicitud : </b> "+fecha +"<br>" +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Observación evaluador</b><br>" +
            observacion +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Requisito</b><br>" +
            requisito +
            "</div><div  class='col-md-4' style='margin-top:8px;display:none;' ><b>Observación evaluado </b><textarea id='obs_eva'class='form-control inps-forms'></textarea></div><div  class='col-md-4' style='margin-top:8px;' ><b>N. de folio</b><input type='text'  id='num_folio' value='" +
            folio +
            "' class='form-control inps-forms' onkeypress='return soloNumeros(event)'></div><div  class='col-md-4' style='margin-top:8px;' ><b>Archivo</b> <input type='file'  id='formato'  "+disabled+"></div><div  class='col-md-12' style='margin-top:8px;text-align:center;'><button class='btn-functions' id='btn_add_sub' onclick='SubsanacionPro()' "+disabled+"><i class='fas fa-plus-save'></i>&nbsp;Enviar &nbsp; <span id='loadbtnsub'></span></button></div></div>"
    );
    
}

function SubsanarPro2(id, fecha, requisito, observacion, respuesta, folio, estado, archivo) {
    var checked = "";
    if (estado == 1) checked = "checked";
    $("#inf4").html(
        "<br><button class='btn-functions' id='btnsub1' onclick='SubsanarPro3()'><i class='fas fa-plus-circle'></i>&nbsp;Agregar</button><button id='btnsub2' class='btn-functions' onclick='listadoSubseleusu()'><i class='fas fa-list-ol'></i>&nbsp;Listado</button><br><div  class='row'><input type='hidden' id='id_sub' value='" +
            id +
            "'><div  class='col-md-4' style='margin-top:8px;' ><b>Fecha Solicitud</b> <br>" +
            fecha +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Observación evaluador</b><textarea id='obs_eva'class='form-control inps-forms'>" +
            observacion +
            "</textarea></div><div  class='col-md-4' style='margin-top:8px;' ><b>Requisitos</b><br>" +
            requisito +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Observación evaluado </b><br>" +
            respuesta +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>N. de folio</b><br>" +
            folio +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Archivo</b><br><a href=\"https://neo.cpcoriente.org/templates/modules/visor.php?fl='" +
            archivo +
            "'\" target='_blank'>Ver</a></div><div  class='col-md-4' style='margin-top:8px;' ><b>Aprobar</b><div class='custom-control custom-switch'><input type='checkbox' " +
            checked +
            "  class='custom-control-input' id='switch117' ><label class='custom-control-label' for='switch117'></label></div></div><div  class='col-md-12' style='margin-top:8px;text-align:center;'><button class='btn-functions' onclick='SubsanacionPro2()'><i class='fas fa-save'></i>&nbsp;Guardar</button></div></div>"
    );
}

function CorregirPro2(id, fecha, requisito, observacion, respuesta, folio, estado, archivo) {
    var checked = "";
    if (estado == 1) checked = "checked";
    $("#inf4").html(
        "<br><button class='btn-functions' id='btnsub1' onclick='CorregirPro3()'><i class='fas fa-plus-circle'></i>&nbsp;Agregar</button><button id='btnsub2' class='btn-functions' onclick='listadoCorseleusu()'><i class='fas fa-list-ol'></i>&nbsp;Listado</button><br><div  class='row'><input type='hidden' id='id_cor' value='" +
            id +
            "'><div  class='col-md-4' style='margin-top:8px;' ><b>Fecha Solicitud</b> <br>" +
            fecha +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Observación evaluador</b><textarea id='obs_eva'class='form-control inps-forms'>" +
            observacion +
            "</textarea></div><div  class='col-md-4' style='margin-top:8px;' ><b>Requisitos</b><br>" +
            requisito +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Observación evaluado </b><br>" +
            respuesta +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>N. de folio</b><br>" +
            folio +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Archivo</b><br><a href=\"javascript:window.open('" +
            archivo +
            "')\">Ver</a></div><div  class='col-md-4' style='margin-top:8px;' ><b>Aprobar</b><div class='custom-control custom-switch'><input type='checkbox' " +
            checked +
            "  class='custom-control-input' id='switch117' ><label class='custom-control-label' for='switch117'></label></div></div><div  class='col-md-12' style='margin-top:8px;text-align:center;'><button class='btn-functions' onclick='CorreccionPro2()'><i class='fas fa-save'></i>&nbsp;Guardar</button></div></div>"
    );
}

function SubsanarPro3() {
    $("#inf4").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/AgregarSubsanacionusuele.php?conv=" + $("#conv").val() + "&pro=" + $("#id_pro").val(),
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf4").html(e);
        },
    });
}

function CorregirPro3() {
    $("#inf4").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/AgregarCorreccionusuvia.php?conv=" + $("#conv").val() + "&pro=" + $("#id_pro").val(),
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf4").html(e);
        },
    });
}

function EliminarSubsanar(cod) {
    if (confirm("¿ Está seguro que desea eliminar la subsanación ?")) {
        var sendform = new FormData();
        sendform.append("f", "EliminarSubsanar");
        sendform.append("id", cod);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
            	alert(e)
                if (String(e).indexOf("eliminada") != -1) pesEva = 0;
                infoChangeele($("#if1"), 1);
                
            },
        });
    }
}

function EliminarSubsanarJur(cod) {
    if (confirm("¿ Está seguro que desea eliminar la subsanación ?")) {
        var sendform = new FormData();
        sendform.append("f", "EliminarSubsanar");
        sendform.append("id", cod);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                //	alert(e)
                if (String(e).indexOf("eliminada") != -1) pesEva = 0;
                infoChangeeleJur($("#if1"), 1);
            },
        });
    }
}

function EliminarCorregir(cod) {
    if (confirm("¿ Está seguro que desea eliminar la corrección ?")) {
        var sendform = new FormData();
        sendform.append("f", "EliminarCorregir");
        sendform.append("id", cod);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                alert(e);
                if (String(e).indexOf("eliminada") != -1) listadoCorseleusu();
            },
        });
    }
}

function NuevaSubsanacion(fila, req, tipo) {
    var cumple = "";

    if (confirm("¿Está seguro de generar una nueva subsanación para este requisito?")) {
        if ($("#Observacion" + fila).val() == "") {
            alert("Digite la observación");
            $("#Observacion" + fila).focus();
        } else if ($("#check_si_" + fila).is(":checked")) {
            
            alert("El requisito Debe estar evaluado en no cumple");
        } else {
            cumple = "No cumple";
            $("#loadsubsave" + fila).html("<div class='spinner-border text-dark'></div>");
            var sendform = new FormData();
            sendform.append("f", "NuevaSubsanacion");
            sendform.append("obs_eva", $("#Observacion" + fila).val());
            sendform.append("req", req);
            sendform.append("tipo", tipo);
            sendform.append("pro", $("#id_pro").val());
            sendform.append("npro", $("#NOmpro").html());
            sendform.append("cumple", cumple);
            $.ajax({
                type: "POST",
                url: "phpMVC/Controller/controller.php",
                data: sendform,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {},
                success: function (e) {
                   //	alert(e)
                    $("#loadsubsave" + fila).html("");
                    if (String(e).indexOf("creada") != -1) {
                        alert("Subsanación solicitada");
                        pesEva = 0;
                        infoChangeele($("#if1"), 1);
                    } else {
                        alert("Error al solicitar la subsanación");
                    }
                },
            });
        }
    }
}

function NuevaSubsanacionJur(fila, req, tipo) {
    var cumple = "";

    if (confirm("¿Está seguro de generar una nueva subsanación para este requisito?")) {
        if ($("#Observacion" + fila).val() == "") {
            alert("Digite la observación");
            $("#Observacion" + fila).focus();
        } else if ($("#check_si_" + fila).is(":checked")) {
            alert("El requisito Debe estar evaluado en no cumple");
        } else {
            cumple = "No cumple";
            $("#loadsubsave" + fila).html("<div class='spinner-border text-dark'></div>");
            var sendform = new FormData();
            sendform.append("f", "NuevaSubsanacion");
            sendform.append("obs_eva", $("#Observacion" + fila).val());
            sendform.append("req", req);
            sendform.append("tipo", tipo);
            sendform.append("pro", $("#id_pro").val());
            sendform.append("npro", $("#NOmpro").html());
            sendform.append("cumple", cumple);
            $.ajax({
                type: "POST",
                url: "phpMVC/Controller/controller.php",
                data: sendform,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {},
                success: function (e) {
                    //	alert(e)
                    $("#loadsubsave" + fila).html("");
                    if (String(e).indexOf("creada") != -1) {
                        alert("Subsanación solicitada");
                        pesEva = 0;
                        infoChangeeleJur($("#if1"), 1);
                    } else {
                        alert("Error al solicitar la subsanación");
                    }
                },
            });
        }
    }
}

function NuevaCorreccion() {
    $("#loadsavesub").html("<div class='spinner-border text-dark'></div>");

    if ($("#obs_eva").val() == "") {
        alert("Digite Observación");
    } else {
        var sendform = new FormData();
        sendform.append("f", "NuevaCorreccion");
        sendform.append("obs_eva", $("#obs_eva").val());
        sendform.append("req", $("#requi").val());
        sendform.append("pro", $("#id_pro").val());
        sendform.append("npro", $("#NOmpro").html());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                alert(e);
                $("#loadsavesub").html("");
                if (String(e).indexOf("creada") != -1) listadoCorseleusu();
            },
        });
    }
}

function SubsanacionPro2() {
    var apro = 0;
    if ($("#switch117").is(":checked")) apro = 1;
    if ($("#obs_eva").val() == "") {
        alert("Digite Observación");
    } else {
        var sendform = new FormData();
        sendform.append("f", "SubsanacionPro2");
        sendform.append("id", $("#id_sub").val());
        sendform.append("obs_eva", $("#obs_eva").val());
        sendform.append("apro", apro);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                alert(e);
                if (String(e).indexOf("actualizada") != -1) listadoSubseleusu();
            },
        });
    }
}

function CorreccionPro2() {
    var apro = 0;
    if ($("#switch117").is(":checked")) apro = 1;
    if ($("#obs_eva").val() == "") {
        alert("Digite Observación");
    } else {
        var sendform = new FormData();
        sendform.append("f", "CorreccionPro2");
        sendform.append("id", $("#id_cor").val());
        sendform.append("obs_eva", $("#obs_eva").val());
        sendform.append("apro", apro);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                alert(e);
                if (String(e).indexOf("actualizada") != -1) listadoCorseleusu();
            },
        });
    }
}

function SubsanacionPro() {
    var archivo = document.getElementById("formato").files[0];
    if (archivo.size > 20000000) {
        message = "El archivo puede pesar max. 20MB";
        alert(message);
    } else {
        $("#loadbtnsub").html(" &nbsp; <div class='spinner-border text-dark'></div><br>");
        $("#btn-add-sub").attr("disabled", true);
        var sendform = new FormData();
        sendform.append("f", "SubsanacionPro");
        sendform.append("id_sub", $("#id_sub").val());
        sendform.append("obs_eva", $("#obs_eva").val());
        sendform.append("num_folio", $("#num_folio").val());
        sendform.append("formato", document.getElementById("formato").files[0]);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                alert(e);
                $("#loadbtnsub").html("");
                $("#btn-add-sub").attr("disabled", false);
                if (String(e).indexOf("no") == -1) {
                    MostrarDivEvaEle("divsub");
                    CloseModal()
                }
            },
        });
    }
}

function CorregirPro(id, fecha, requisito, observacion, respuesta, folio) {
    $("#divcor").html(
        "<div  class='row'><input type='hidden' id='id_cor' value='" +
            id +
            "'><div  class='col-md-4' style='margin-top:8px;' ><b>Fecha Solicitud</b> <br>" +
            fecha +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Observación evaluador</b><br>" +
            observacion +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Requisitos</b><br>" +
            requisito +
            "</div><div  class='col-md-4' style='margin-top:8px;' ><b>Observación evaluado </b><textarea id='obs_eva'class='form-control inps-forms'>" +
            respuesta +
            "</textarea></div><div  class='col-md-4' style='margin-top:8px;' ><b>N. de folio</b><input type='text'  id='num_folio' value='" +
            folio +
            "' class='form-control inps-forms' onkeypress='return soloNumeros(event)'></div><div  class='col-md-4' style='margin-top:8px;' ><b>Archivo</b><input type='file'  id='formato'  ></div><div  class='col-md-12' style='margin-top:8px;text-align:center;'><button class='btn-functions' onclick='CorreccionPro()'><i class='fas fa-plus-circle'></i>&nbsp;Corregir</button></div></div>"
    );
}

function CorreccionPro() {
    if ($("#obs_eva").val() == "") {
        alert("Digite Observación");
    } else if ($("#formato").val() == "") {
        alert("Seleccione el archivo");
    } else {
        var sendform = new FormData();
        sendform.append("f", "CorreccionPro");
        sendform.append("id_cor", $("#id_cor").val());
        sendform.append("obs_eva", $("#obs_eva").val());
        sendform.append("num_folio", $("#num_folio").val());
        sendform.append("formato", document.getElementById("formato").files[0]);
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                alert(e);
                if (String(e).indexOf("no") == -1) {
                    MostrarDivEvaVia("divcor");
                }
            },
        });
    }
}

function CargarDivcor() {
    var sendform = new FormData();
    sendform.append("f", "CargarDivcor");
    sendform.append("pro", $("#id_pro").val());
    $("#divcor").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#divcor").html(e);
        },
    });
}

function CargarDivcor2() {
    var sendform = new FormData();
    sendform.append("f", "CargarDivcor2");
    sendform.append("pro", $("#id_pro").val());
    $("#divcor").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#divcor2").html(e);
        },
    });
}
function MostrarDivEvaVia(div) {
    if (div == "diveva") {
        CargarDivevavia();
    } else if (div == "divcor") {
        CargarDivcor();
    } else if (div == "divcor2") {
        CargarDivcor2();
    }
}

function CargarDivevaele() {
    $("#diveva").html("<div class='spinner-border text-dark'></div><br>");
    var sendform = new FormData();
    sendform.append("f", "CargarDivevaele");
    sendform.append("cod", $("#conv").val());
    sendform.append("pro", $("#id_pro").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#diveva").html(e);
        },
    });
}

function CargarDivevaele_() {
    $("#diveva").html("<div class='spinner-border text-dark'></div><br>");
    var sendform = new FormData();
    sendform.append("f", "CargarDivevaele_");
    sendform.append("cod", $("#conv").val());
    sendform.append("pro", $("#id_pro").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#diveva").html(e);
        },
    });
}

function CargarDivevaele_Jur() {
    $("#diveva").html("<div class='spinner-border text-dark'></div><br>");
    var sendform = new FormData();
    sendform.append("f", "CargarDivevaele_Jur");
    sendform.append("cod", $("#conv").val());
    sendform.append("pro", $("#id_pro").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#diveva").html(e);
        },
    });
}

function CargarDivevavia() {
    $("#diveva").html("<div class='spinner-border text-dark'></div><br>");
    var sendform = new FormData();
    sendform.append("f", "CargarDivevavia");
    sendform.append("cod", $("#conv").val());
    sendform.append("pro", $("#id_pro").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#diveva").html(e);
        },
    });
}
function CargarDivevavia_ind(cod_usu,nom_usu,fec,ult_fec) {
    $("#diveva").html("<div class='spinner-border text-dark'></div><br>");
    var sendform = new FormData();
    sendform.append("f", "CargarDivevavia_ind");
    sendform.append("usu", cod_usu);
    sendform.append("nom", nom_usu);
    sendform.append("fec", fec);
    sendform.append("ult_fec", ult_fec);
     sendform.append("cod", $("#conv").val());
     
    sendform.append("pro", $("#id_pro").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#diveva").html("<div class='col-md-12' ><button class='btn btn-primary' onclick=\"MostrarDivEvaVia('diveva')\"> <i class='fa fa-arrow-left'></i> &nbsp; Volver a evaluadores</button></div>"+e);
        },
    });
}
function moneda(id) {
    var caja = $("#" + id).val();

    $("#" + id).val(format2(caja));
 
}

function formatNumber(n) {
    n = String(n).replace(/\D/g, "");
    return n === "" ? n : Number(n).toLocaleString();
}

function format2(n) {
var newn=  n.replace(/\,/g, "")
cadenasseparadas=newn.split('.')
//newn=parseFloat(newn).toFixed(2)
    //alert(newn)
    var decimales=""
    if(typeof cadenasseparadas[1] === 'undefined' )
    {
        decimales=""
    }
    else{
        decimales="."+cadenasseparadas[1]
    }
return String(cadenasseparadas[0]).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + decimales

}

function number_format(number, decimals, dec_point, thousands_point) {
     var number=  number.replace(/\,/g, "")
    if (number == null || !isFinite(number)) {
        throw new TypeError("number is not valid");
    }

    if (!decimals) {
        var len = number.toString().split('.').length;
        decimals = len > 1 ? len : 0;
    }

    if (!dec_point) {
        dec_point = '.';
    }

    if (!thousands_point) {
        thousands_point = ',';
    }

    number = parseFloat(number).toFixed(decimals);

    number = number.replace(".", dec_point);

    var splitNum = number.split(dec_point);
    splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
    number = splitNum.join(dec_point);

    return number;
}



////proyectos
function GuardarPro() {
    var val_con = $("#val_tot_con").val();
    var val_fin = $("#val_fin").val();
   
    var val_pro = $("#val_pro").val();
    var val_con_din = $("#val_con_din").val();
    var val_con_esp = $("#val_con_esp").val();
    val_con = val_con.replace(/\,/g, "");
    val_fin = val_fin.replace(/\,/g, "");
    val_pro = val_pro.replace(/\,/g, "");
    val_con_din = val_con_din.replace(/\,/g, "");
    val_con_esp = val_con_esp.replace(/\,/g, "");
//alert(parseFloat(val_con) +" - "+parseFloat(val_fin))
//alert(val_pro)
    if ($("#nom").val() == "") {
        message = "Digite Título proyecto</h4>";
        alerts_tec(message);
        $("#nom").focus()
    }
     else if ($("#ciu").val() == 0) {
        message = "Seleccione la ciudad";
        alerts_tec(message);
        $("#ciu").focus()
    }
    else if ($("#fec_rec").val() == "") {
        message = "Digite fecha recepción";
        alerts_tec(message);
        $("#fec_rec").focus()
    }
    else if ($("#duracion").val() == "") {
        message = "Digite duración";
        alerts_tec(message);
        $("#duracion").focus()
    }
    else if ($("#emp").val() == 0) {
        message = "Seleccione empresa";
        alerts_tec(message);
        $("#emp").focus()
    }
    else if ($("#fec_rad").val() == "") {
        message = "Digite fecha radicación";
        alerts_tec(message);
        $("#fec_rad").focus()
    }
        else if ($("#num_rad").val() == "") {
        message = "Digite número radicación";
        alerts_tec(message);
        $("#num_rad").focus()
    }
        else if ($("#tip_pro").val() == 0) {
        message = "Seleccione tipo proyecto";
        alerts_tec(message);
        $("#tip_pro").focus()
    }
        else if ($("#dep").val() == 0) {
        message = "Seleccione departamento";
        alerts_tec(message);
        $("#dep").focus()
    }
    else if ($("#ciu").val() == 0) {
        message = "Seleccione ciudad";
        alerts_tec(message);
        $("#ciu").focus()
    }
    else if (parseInt($("#duracion").val()) < 0 || parseInt($("#duracion").val()) > 12) {
        message = "Duración del proyecto incorrecta";
        alerts_tec(message);
         $("#duracion").focus()
    }  
    else if (val_pro != parseFloat(val_con) + parseFloat(val_fin)) {
        message = "Revise el valor del proyecto";
        alerts_tec(message);
        $("#val_pro").focus();
    } else if (val_con != parseFloat(val_con_esp) + parseFloat(val_con_din)) {
        message = "Revise el valor de contrapartida";
        alerts_tec(message);
        $("#val_con").focus();
    }
    else {
        var sendform = new FormData();
        sendform.append("conv", $("#conv").val());
        sendform.append("emp", $("#emp").val());
        sendform.append("nom", $("#nom").val());
        sendform.append("fec_rec", $("#fec_rec").val());
        sendform.append("num_rad", $("#num_rad").val());
        sendform.append("fec_rad", $("#fec_rad").val());

        sendform.append("duracion", $("#duracion").val());
         sendform.append("tip_pro", $("#tip_pro").val());
        sendform.append("val_pro", $("#val_pro").val().replace(/\,/g, ""));
        sendform.append("val_fin", $("#val_fin").val().replace(/\,/g, ""));
        sendform.append("val_tot_con", $("#val_tot_con").val().replace(/\,/g, ""));
        sendform.append("val_con_din", $("#val_con_din").val().replace(/\,/g, ""));
        sendform.append("val_con_esp", $("#val_con_esp").val().replace(/\,/g, ""));
        sendform.append("uti_net", $("#uti_net").val().replace(/\,/g, ""));
        sendform.append("act_corr", $("#act_corr").val().replace(/\,/g, ""));
        sendform.append("pas_corr", $("#pas_corr").val().replace(/\,/g, ""));
        sendform.append("pas_tot", $("#pas_tot").val().replace(/\,/g, ""));
        sendform.append("act_tot", $("#act_tot").val().replace(/\,/g, ""));
        sendform.append("pas_lar_pla", $("#pas_lar_pla").val().replace(/\,/g, ""));
        sendform.append("pas_cor_pla", $("#pas_cor_pla").val().replace(/\,/g, ""));
        sendform.append("EBITDA", $("#EBITDA").val().replace(/\,/g, ""));
        sendform.append("ciu", $("#ciu").val());
        sendform.append("f", "gpro");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
               // alert(e)
                if (String(e).indexOf("guardado") != -1) {
                    var respuesta = JSON.parse(e);
                    message = '<i class="fas fa-thumbs-up"></i> ' + respuesta[0] ;
                    alerts_tec(message);

                    $("#id").val(respuesta[1]);
                    $("#progeso_div").html("<b>ID PROYECTO : </b>"+respuesta[1]+"<br><b>TÍTULO : </b>" + $("#nom").val());
                    $("#divupd").css("display", "block");
                    $("#divadd").css("display", "none");
                     conteoprogresoPt = 0;
                     conteoprogresoAnx = 0;
                     conteoprogresoAdi1 = 0;
                     conteoprogresoAdi2 = 0;
                     conteoprogresoAdi3 = 0;
                     conteoprogresoAdi4 = 0;
                     conteoprogresoAdi5 = 0;
                    
                    CalcularProgreso();
                } else {
                    var respuesta = JSON.parse(e);
                    message = '<i class="fas fa-times-circle"></i> ' + respuesta[0] ;
                    alerts_tec(message);
                }
            },
        });
    }
}

function EditarPro() {
    var val_con = $("#val_tot_con").val();
    var val_fin = $("#val_fin").val();
    var val_pro = $("#val_pro").val();
    var val_con_din = $("#val_con_din").val();
    var val_con_esp = $("#val_con_esp").val();
    val_con = val_con.replace(/\,/g, "");
    val_fin = val_fin.replace(/\,/g, "");
    val_pro = val_pro.replace(/\,/g, "");
    val_con_din = val_con_din.replace(/\,/g, "");
    val_con_esp = val_con_esp.replace(/\,/g, "");
//alert(parseFloat(val_con) +" - "+parseFloat(val_fin))
//alert(val_pro)
     if ($("#nom").val() == "") {
        message = "Digite Título proyecto</h4>";
        alerts_tec(message);
        $("#nom").focus()
    }
     else if ($("#ciu").val() == 0) {
        message = "Seleccione la ciudad";
        alerts_tec(message);
        $("#ciu").focus()
    }
    else if ($("#fec_rec").val() == "") {
        message = "Digite fecha recepción";
        alerts_tec(message);
        $("#fec_rec").focus()
    }
    else if ($("#duracion").val() == "") {
        message = "Digite duración";
        alerts_tec(message);
        $("#duracion").focus()
    }
    else if ($("#emp").val() == 0) {
        message = "Seleccione empresa";
        alerts_tec(message);
        $("#emp").focus()
    }
    else if ($("#fec_rad").val() == "") {
        message = "Digite fecha radicación";
        alerts_tec(message);
        $("#fec_rad").focus()
    }
        else if ($("#num_rad").val() == "") {
        message = "Digite número radicación";
        alerts_tec(message);
        $("#num_rad").focus()
    }
        else if ($("#tip_pro").val() == 0) {
        message = "Seleccione tipo proyecto";
        alerts_tec(message);
        $("#tip_pro").focus()
    }
        else if ($("#dep").val() == 0) {
        message = "Seleccione departamento";
        alerts_tec(message);
        $("#dep").focus()
    }
    else if ($("#ciu").val() == 0) {
        message = "Seleccione ciudad";
        alerts_tec(message);
        $("#ciu").focus()
    }
    else if (parseInt($("#duracion").val()) < 0 || parseInt($("#duracion").val()) > 12) {
        message = "Duración del proyecto incorrecta";
        alerts_tec(message);
         $("#duracion").focus()
    }  
    else if (val_pro != parseFloat(val_con) + parseFloat(val_fin)) {
        message = "Revise el valor del proyecto";
        alerts_tec(message);
        $("#val_pro").focus();
    } else if (val_con != parseFloat(val_con_esp) + parseFloat(val_con_din)) {
        message = "Revise el valor de contrapartida";
        alerts_tec(message);
        $("#val_con").focus();
    }else {
        var sendform = new FormData();
        sendform.append("id", $("#id").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("emp", $("#emp").val());
        sendform.append("nom", $("#nom").val());
        sendform.append("fec_rec", $("#fec_rec").val());
        sendform.append("num_rad", $("#num_rad").val());
        sendform.append("fec_rad", $("#fec_rad").val());

        sendform.append("duracion", $("#duracion").val());
         sendform.append("tip_pro", $("#tip_pro").val());
        sendform.append("val_pro", $("#val_pro").val().replace(/\,/g, ""));
        sendform.append("val_fin", $("#val_fin").val().replace(/\,/g, ""));
        sendform.append("val_tot_con", $("#val_tot_con").val().replace(/\,/g, ""));
        sendform.append("val_con_din", $("#val_con_din").val().replace(/\,/g, ""));
        sendform.append("val_con_esp", $("#val_con_esp").val().replace(/\,/g, ""));
        sendform.append("uti_net", $("#uti_net").val().replace(/\,/g, ""));
        sendform.append("act_corr", $("#act_corr").val().replace(/\,/g, ""));
        sendform.append("pas_corr", $("#pas_corr").val().replace(/\,/g, ""));
        sendform.append("pas_tot", $("#pas_tot").val().replace(/\,/g, ""));
        sendform.append("act_tot", $("#act_tot").val().replace(/\,/g, ""));
        sendform.append("pas_lar_pla", $("#pas_lar_pla").val().replace(/\,/g, ""));
        sendform.append("pas_cor_pla", $("#pas_cor_pla").val().replace(/\,/g, ""));
        sendform.append("EBITDA", $("#EBITDA").val().replace(/\,/g, ""));
        sendform.append("ciu", $("#ciu").val());
        sendform.append("f", "epro");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                //alert(e)
                if (String(e).indexOf("modificado") != -1) {
                    message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                    alerts_tec(message);
                    CalcularProgreso();
                   
                } else {
                    message = '<i class="fas fa-times-circle"></i> ' + e ;
                    alerts_tec(message);
                }
            },
        });
    }
}

function EditarPro2() {
    var val_con = $("#val_tot_con").val();
    var val_fin = $("#val_fin").val();
    var val_pro = $("#val_pro").val();
    var val_con_din = $("#val_con_din").val();
    var val_con_esp = $("#val_con_esp").val();
    val_con = val_con.replace(/\,/g, "");
    val_fin = val_fin.replace(/\,/g, "");
    val_pro = val_pro.replace(/\,/g, "");
    val_con_din = val_con_din.replace(/\,/g, "");
    val_con_esp = val_con_esp.replace(/\,/g, "");
    
   if ($("#val_fin").val() == "") {
        message = "Digite Valor a financiar";
        alerts_tec(message);
        $("#val_fin").focus()
    }
   
    else if ($("#val_con_din").val() == "") {
        message = "Digite Contrapartida dinero ";
        alerts_tec(message);
        $("#val_con_din").focus()
    }
     else if ($("#val_con_esp").val() == "") {
        message = "Digite Contrapartida especie";
        alerts_tec(message);
        $("#val_con_esp").focus()
    }
     else if (val_pro != parseFloat(val_con) + parseFloat(val_fin)) {
        message = "Revise el valor del proyecto";
        alerts_tec(message);
        $("#val_pro").focus();
    } else if (val_con != parseFloat(val_con_esp) + parseFloat(val_con_din)) {
        message = "Revise el valor de contrapartida";
        alerts_tec(message);
        $("#val_con").focus();
    } else {
        var sendform = new FormData();
        sendform.append("id", $("#id").val());
        sendform.append("conv", $("#conv").val());
        sendform.append("emp", $("#emp").val());
        sendform.append("nom", $("#nom").val());
        sendform.append("fec_rec", $("#fec_rec").val());
        sendform.append("num_rad", $("#num_rad").val());
        sendform.append("fec_rad", $("#fec_rad").val());
        sendform.append("area_estra", $("#area_estra").val());
        sendform.append("duracion", $("#duracion").val());
        sendform.append("tip_pro", $("#tip_pro").val());
        sendform.append("val_pro", $("#val_pro").val().replace(/\,/g, ""));
        sendform.append("val_fin", $("#val_fin").val().replace(/\,/g, ""));
        sendform.append("val_tot_con", $("#val_tot_con").val().replace(/\,/g, ""));
        sendform.append("val_con_din", $("#val_con_din").val().replace(/\,/g, ""));
        sendform.append("val_con_esp", $("#val_con_esp").val().replace(/\,/g, ""));
        sendform.append("uti_net", $("#uti_net").val().replace(/\,/g, ""));
        sendform.append("act_corr", $("#act_corr").val().replace(/\,/g, ""));
        sendform.append("pas_corr", $("#pas_corr").val().replace(/\,/g, ""));
        sendform.append("pas_tot", $("#pas_tot").val().replace(/\,/g, ""));
        sendform.append("act_tot", $("#act_tot").val().replace(/\,/g, ""));
        sendform.append("pas_lar_pla", $("#pas_lar_pla").val().replace(/\,/g, ""));
        sendform.append("pas_cor_pla", $("#pas_cor_pla").val().replace(/\,/g, ""));
        sendform.append("EBITDA", $("#EBITDA").val().replace(/\,/g, ""));
        sendform.append("ciu", $("#ciu").val());
        sendform.append("f", "epro");
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                if (String(e).indexOf("modificado") != -1) {
                    message = '<i class="fas fa-thumbs-up"></i> ' + e ;
                    alerts_tec(message);
                    CalcularProgreso();
                   
                } else {
                    message = '<i class="fas fa-times-circle"></i> ' + e ;
                    alerts_tec(message);
                }
            },
        });
    }
}

/////////////
function Detailproevaele(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Cumple, Apro) {
    var Nompro = document.getElementById("tlproevaele").rows[nom].cells[11].innerText;
    var Nomempp = document.getElementById("tlproevaele").rows[nom].cells[3].innerText;

    $("#myModal").modal();
    barralateral2();
    var icon = Cumple;

    var evalua = "";
    var checkelegible = "";

    if (Cumple == "1") {
        icon = "Si";
    } else if (Cumple == "0") {
        icon = "No";
    }
    if (Apro == "1" && estado == "EVALUADO") {
        checkelegible =
            "<div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Aprobado para visualizar</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='check' ><div class='custom-control custom-switch'><input type='checkbox' checked class='custom-control-input' id='switch0' onclick=\"UpdStatproele(" +
            id +
            ",0)\"><label class='custom-control-label' for='switch0'></label></div></div>";
    } else if (Apro == "0" && estado == "EVALUADO") {
        checkelegible =
            "<div class='col-md-3' style='padding:10px;box-sizing:border-box;'  ><b>Aprobado para visualizar</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='check'><div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0' onclick=\"UpdStatproele(" +
            id +
            ",1)\"><label class='custom-control-label' for='switch0'></label></div></div>";
    } else {
        if (estado == "EVALUADO") {
            checkelegible =
                "<div class='col-md-3' style='padding:10px;box-sizing:border-box;'  ><b>Aprobado para visualizar</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='check'><div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0' onclick=\"UpdStatproele(" +
                id +
                ",1)\"><label class='custom-control-label' for='switch0'></label></div></div>";
        }
    }

    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'>EVALUACIÓN ELEGIBILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    if (estado != "POR ASIGNAR")
        evalua =
            "<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('diveva')\"><h6>Evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('divsub')\"><h6>Subsanaciones <span id='infpro'></span> </h6></div></div><div  class='row' id='divsub' ></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' id='nomprooo'>" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomempp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Elegible : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconelegible' >" +
            icon +
            "</div>" +
            checkelegible +
            "</div>" +
            evalua
    );
    MostrarDivEvaEle("diveva");
    MostrarDivEvaEle("divsub");
}
function Detailproevavia(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Viable, Apro) {
    var Nompro = document.getElementById("tlproevavia").rows[nom].cells[12].innerText;
    var Nomempp = document.getElementById("tlproevavia").rows[nom].cells[3].innerText;
    $("#myModal").modal();
    barralateral2();
    var icon = Viable;
    var evalua = "";
    var checkviable = "";
    if (Viable == "1") {
        icon = "Si";
    } else if (Viable == "0") {
        icon = "No";
    } else {
        icon = "";
    }

    if (Apro == "SI" && estado == "EVALUADO") {
        checkviable =
            "<div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Aprobado para visualizar</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='check' ><div class='custom-control custom-switch'><input type='checkbox' checked class='custom-control-input' id='switch0' onclick=\"UpdStatprovia(" +
            id +
            ",0)\"><label class='custom-control-label' for='switch0'></label></div></div>";
    } else if (Apro == "NO" && estado == "EVALUADO") {
        checkviable =
            "<div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Aprobado para visualizar</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='check'><div class='custom-control custom-switch'><input type='checkbox'class='custom-control-input' id='switch0' onclick=\"UpdStatprovia(" +
            id +
            ",1)\"><label class='custom-control-label' for='switch0'></label></div></div>";
    } else {
        if (estado == "EVALUADO") {
            checkviable =
                "<div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Aprobado para visualizar</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='check'><div class='custom-control custom-switch'><input type='checkbox'class='custom-control-input' id='switch0' onclick=\"UpdStatprovia(" +
                id +
                ",0)\"><label class='custom-control-label' for='switch0'></label></div></div>";
        }
    }

    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACIÓN VIABILIDAD </h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    if (estado != "POR ASIGNAR") evalua = "<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaVia('diveva')\"><h6>Evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' id='nomprooo'>" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomempp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Viable : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconviable' >" +
            icon +
            "</div>" +
            checkviable +
            "</div>" +
            evalua
    );
   MostrarDivEvaVia("diveva");
}

function Detailproevaeleaux(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Cumple) {
    var Nompro = document.getElementById("tlproevaeleaux").rows[nom].cells[11].innerText;
    var Nommpp = document.getElementById("tlproevaeleaux").rows[nom].cells[3].innerText;
    $("#myModal").modal();
    barralateral2();
    var icon = Cumple;
    var evalua = "";
    var checkelegible = "";

    if (Cumple == "1") {
        icon = "Si";
    } else if (Cumple == "0") {
        icon = "No";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
            checkelegible = " ";
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACIÓN ELEGIBILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    if (estado != "POR ASIGNAR")
        evalua =
            "<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('diveva')\"><h6>Evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('divsub')\"><h6>Subsanaciones <span id='infpro'></span> </h6></div></div><div  class='row' id='divsub' ></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' >" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nommpp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Elegible : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconelegible' >" +
            icon +
            "</div>" +
            checkelegible +
            "</div>" +
            evalua
    );
    MostrarDivEvaEle("diveva");
    MostrarDivEvaEle("divsub");
}
function Detailproevaviaaux(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Viable) {
    var Nompro = document.getElementById("tlproevaviaaux").rows[nom].cells[12].innerText;
    var Nomemp = document.getElementById("tlproevaviaaux").rows[nom].cells[3].innerText;
    $("#myModal").modal();
    barralateral2();
    var icon = Viable;
    var evalua = "";
    var checkviable = "";
    if (Viable == "1") {
        icon = "Si";
    } else if (Viable == "0") {
        icon = "No";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
            //checkviable="<div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Concepto final</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='check'><div class='custom-control custom-switch'><input type='checkbox'class='custom-control-input' id='switch0' onclick=\"UpdStatprovia("+id+",'VIABLE')\"><label class='custom-control-label' for='switch0'></label></div></div>"
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACIÓN VIABILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    if (estado != "POR ASIGNAR") evalua = "<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaVia('diveva')\"><h6>Evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' >" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomemp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Viable : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconviable' >" +
            icon +
            "</div>" +
            checkviable +
            "</div>" +
            evalua
    );
    MostrarDivEvaVia("diveva");
}

///colombia productiva ,evaluador finalizado
function Detailproevaeleusu(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Cumple) {
    var Nompro = document.getElementById("tlproevaeleusu").rows[nom].cells[10].innerText;
    var Nomempp = document.getElementById("tlproevaeleusu").rows[nom].cells[3].innerText;
    $("#myModal").modal();
    barralateral2();
    var icon = Cumple;
    var evalua = "";
    var checkelegible = "";

    if (Cumple == "1") {
        icon = "Si";
    } else if (Cumple == "0") {
        icon = "No";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACION ELEGIBILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    evalua =
        "<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('diveva')\"><h6>Evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('divsub2')\"><h6>Subsanaciones <span id='infpro'></span> </h6></div></div><div  class='row' id='divsub2' ></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' id='NOmpro'>" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomempp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Elegible : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconelegible' >" +
            icon +
            "</div>" +
            checkelegible +
            "</div>" +
            evalua
    );
    MostrarDivEvaEle("diveva");
    MostrarDivEvaEle("divsub2");
}
function DetailproevaeleusuCP(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Cumple) {
    var Nompro = document.getElementById("tlproevaeleusu").rows[nom].cells[10].innerText;
    var Nomempp = document.getElementById("tlproevaeleusu").rows[nom].cells[3].innerText;
    $("#myModal").modal();
    barralateral2();
    var icon = Cumple;
    var evalua = "";
    var checkelegible = "";

    if (Cumple == "1") {
        icon = "Si";
    } else if (Cumple == "0") {
        icon = "No";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACION ELEGIBILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    evalua =
        "<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('diveva')\"><h6>Evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('divsub2')\"><h6>Subsanaciones <span id='infpro'></span> </h6></div></div><div  class='row' id='divsub3' ></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' id='NOmpro'>" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomempp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Elegible : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconelegible' >" +
            icon +
            "</div>" +
            checkelegible +
            "</div>" +
            evalua
    );
    MostrarDivEvaEle("diveva");
    MostrarDivEvaEle("divsub3");
}

function Detailproevaeleusu_(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Cumple) {
    var Nompro = document.getElementById("tlproevaeleusu").rows[nom].cells[10].innerText;
    var Nomempp = document.getElementById("tlproevaeleusu").rows[nom].cells[3].innerText;
    $("#myModal").modal();
    barralateral2();
    var icon = Cumple;
    var evalua = "";
    var checkelegible = "";

    if (Cumple == "1") {
        icon = "Si";
    } else if (Cumple == "0") {
        icon = "No";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACION ELEGIBILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    evalua =
        "<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle_('diveva')\"><h6>Evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle_('divsub2')\"><h6>Subsanaciones <span id='infpro'></span> </h6></div></div><div  class='row' id='divsub2' ></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' id='NOmpro'>" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomempp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Elegible : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconelegible' >" +
            icon +
            "</div>" +
            checkelegible +
            "</div>" +
            evalua
    );
    MostrarDivEvaEle_("diveva");
    MostrarDivEvaEle_("divsub2");
}

function DetailproevaeleusuJur(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Cumple) {
    var Nompro = document.getElementById("tlproevaeleusu").rows[nom].cells[10].innerText;
    var Nomempp = document.getElementById("tlproevaeleusu").rows[nom].cells[3].innerText;
    $("#myModal").modal();
    barralateral2();
    var icon = Cumple;
    var evalua = "";
    var checkelegible = "";

    if (Cumple == "1") {
        icon = "Si";
    } else if (Cumple == "0") {
        icon = "No";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACION ELEGIBILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    evalua =
        "<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaEleJur('diveva')\"><h6>Evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div><div  class='encabezadoseva' onclick=\"MostrarDivEvaEleJur('divsub2')\"><h6>Subsanaciones <span id='infpro'></span> </h6></div></div><div  class='row' id='divsub2' ></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' id='NOmpro'>" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomempp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Elegible : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconelegible' >" +
            icon +
            "</div>" +
            checkelegible +
            "</div>" +
            evalua
    );
    MostrarDivEvaEleJur("diveva");
    MostrarDivEvaEleJur("divsub2");
}

function Detailproevaviausu(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Viable) {
    var Nompro = document.getElementById("tlproevaviacp").rows[nom].cells[11].innerText;
    var Nomemp = document.getElementById("tlproevaviacp").rows[nom].cells[3].innerText;
    $("#myModal").modal();
    barralateral2();
    var icon = Viable;
    var evalua = "";
    var checkviable = "";
    if (Viable == "1") {
        icon = "Si";
    } else if (Viable == "0") {
        icon = "No";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'>EVALUACIÓN VIABILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    if (estado != "POR ASIGNAR") evalua = "<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaVia('diveva')\"><h6>Evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' >" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomemp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Viable : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconviable' >" +
            icon +
            "</div>" +
            checkviable +
            "</div>" +
            evalua
    );
    MostrarDivEvaVia("diveva");
}
function CloseModal() {
    $("#myModal").modal("toggle");
    barralateral();
}

function CloseModal2() {
    $("#myModal2").modal("toggle");
}

function CloseModal3() {
    $("#myModal2").modal("toggle");
}
function CargarEvaluacionele(cod) {
    var sendform = new FormData();
    sendform.append("f", "DelCriVia");
    sendform.append("cod", cod);

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            message = '<i class="fas fa-check"></i> ' + e ;
            alerts_tec(message);
            if (String(e).indexOf("eliminado") != -1) {
                ListCriVia();
            }
        },
    });
}

function DelCriViapunadc(cod) {
    if (confirm("¿Está seguro de eliminar el criterio?")) {
        var sendform = new FormData();
        sendform.append("f", "DelCriViapunadc");
        sendform.append("cod", cod);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                message = '<i class="fas fa-check"></i> ' + e ;
                alerts_tec(message);
                if (String(e).indexOf("eliminado") != -1) {
                    ListCriVia();
                }
            },
        });
    }
}

function UpdStatproele(id, ele) {
    var sendform = new FormData();
    sendform.append("f", "UpdStatproele");
    sendform.append("cod", id);
    sendform.append("ele", ele);
    sendform.append("nom", $("#nomprooo").html());

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            alert(e);

            if (String(e).indexOf("Aprobado para") != -1) {
                $("#check").html(
                    "<div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0'  checked onclick=\"UpdStatproele(" +
                        id +
                        ",0)\"><label class='custom-control-label' for='switch0'></label></div>"
                );
                eval_pro_ele($("#eval_pro_ele"));
            } else if (String(e).indexOf("No aprobado") != -1) {
                $("#check").html(
                    "<div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0' onclick=\"UpdStatproele(" + id + ",1)\"><label class='custom-control-label' for='switch0'></label></div>"
                );

                eval_pro_ele($("#eval_pro_ele"));
            } else {
                if (ele == 1) {
                    $("#check").html(
                        "<div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0' onclick=\"UpdStatproele(" + id + ",1)\"><label class='custom-control-label' for='switch0'></label></div>"
                    );
                } else {
                    $("#check").html(
                        "<div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0'  checked onclick=\"UpdStatproele(" +
                            id +
                            ",0)\"><label class='custom-control-label' for='switch0'></label></div>"
                    );
                }
            }
        },
    });
}

function UpdStatprovia(id, ele) {
    var sendform = new FormData();
    sendform.append("f", "UpdStatprovia");
    sendform.append("cod", id);
    sendform.append("via", ele);
    sendform.append("nom", $("#nomprooo").html());

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            alert(e);

            if (String(e).indexOf("Aprobado para") != -1) {
                $("#check").html(
                    "<div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0'  checked onclick=\"UpdStatprovia(" +
                        id +
                        ",0)\"><label class='custom-control-label' for='switch0'></label></div>"
                );
                eval_pro_via($("#eval_pro_via"));
            } else if (String(e).indexOf("No aprobado") != -1) {
                $("#check").html(
                    "<div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0' onclick=\"UpdStatprovia(" + id + ",1)\"><label class='custom-control-label' for='switch0'></label></div>"
                );
                eval_pro_via($("#eval_pro_via"));
            } else {
                if (ele == 1) {
                    $("#check").html(
                        "<div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0' onclick=\"UpdStatprovia(" + id + ",1)\"><label class='custom-control-label' for='switch0'></label></div>"
                    );
                } else {
                    $("#check").html(
                        "<div class='custom-control custom-switch'><input type='checkbox'  class='custom-control-input' id='switch0'  checked onclick=\"UpdStatprovia(" +
                            id +
                            ",0)\"><label class='custom-control-label' for='switch0'></label></div>"
                    );
                }
            }
        },
    });
}

function upd_userrr() {
    if (confirm("¿ Está seguro que desea actualizar la información de usuario?")) {
        // Contador de inputs
        var inps_cont = 0;
        // Contador de inputs Expresiones
        var inps_exp = 0;
        // Identificar Inputs
        var inps_form = document.querySelectorAll(".inps-forms");
        // Recorrer inputs
        for (i = 0; i < inps_form.length; i++) {
            // Si esta vacio o es none
            if ((inps_form[i].value == "" || inps_form[i].value == "none") && i != 10) {
                message = 'Completa todos los campos del formulario';
                alerts_tec(message);
                inps_form[i].style.borderColor = "red";
                return false;
            } else {
                inps_cont++;
                inps_form[i].style.borderColor = "#00aef1";
                console.log("inps_form", inps_form[i].value);
            }
        }
        // Validar Correo -----------------
        // Expresion regular email
        exp_email = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/);
        // Validar Contraseña -----------------
        if (!exp_email.test(inps_form[9].value)) {
            message = "Debe incluir un email con un formato correcto" + "<br/>Ej: mieamil@ejemplo.ejemplo";
            alerts_tec(message);
            inps_form[9].focus();
            inps_form[9].style.borderColor = "red";

            return false;
        } else {
            inps_form[9].style.borderColor = "#00aef1";
            inps_exp++;
        }
        // Validar Contraseña -----------------------
        // Expresion regular Contraseña
        exp_pass = new RegExp(" ");
        if (exp_pass.test(inps_form[10].value)) {
            inps_form[10].value == "";
            message = "La contraseña no debe llevar espacios" + "<br/>Ej: miCon_trSe236";
            alerts_tec(message);
            inps_form[10].focus();
            inps_form[10].style.borderColor = "red";

            return false;
        } else {
            inps_form[10].style.borderColor = "#00aef1";
            inps_exp++;
        }
        // Validar Telefono y Numero de Identificacion ------------------
        // Expresion regular Números
        exp_num = new RegExp("[0-9]");
        // Identificacion
        if (!exp_num.test(inps_form[3].value)) {
            inps_form[3].value == "";
            message = "<p class='mt-2'>Solo incluya números en el Número de Indetificación" + "<br/>Ej: 10000363000</p>";
            alerts_tec(message);
            inps_form[3].focus();
            inps_form[3].style.borderColor = "red";
            return false;
        } else {
            inps_form[3].style.borderColor = "#00aef1";
            inps_exp++;
        }
        // Teléfono
        if (!exp_num.test(inps_form[4].value)) {
            inps_form[4].value == "";
            message = "Solo incluya números en el teléfono" + "<br/>Ej: 3055555555";
            alerts_tec(message);
            inps_form[4].focus();
            inps_form[4].style.borderColor = "red";
            return false;
        } else {
            inps_form[4].style.borderColor = "#00aef1";
            inps_exp++;
        }

        // Objeto Request
        request = new Request();
        // Url
        request.s_url = "fil-tec";
        // Configuracion
        request.s_config = ["POST", false, false, false, "json"];
        // Permiso
        request.s_permision = ["tec-upd-per", 1];
        // Datos de Envio
        request.s_dataSend = [
            { name: "cod", values: inps_form[0].value },
            { name: "nombre", values: inps_form[1].value },
            { name: "t-identi", values: inps_form[2].value },
            { name: "identificacion", values: inps_form[3].value },
            { name: "telefono", values: inps_form[4].value },
            { name: "ciudad", values: inps_form[6].value },
            { name: "direccion", values: inps_form[7].value },
            { name: "profesion", values: inps_form[8].value },
            { name: "email", values: inps_form[9].value },
            { name: "password", values: inps_form[10].value },
            { name: "rol", values: inps_form[11].value },
            { name: "estado", values: inps_form[12].value },
        ];
        // Acciones
        request.s_actions = function (r) {
            // Validar Respuesta
            if (String(r).indexOf("success") != -1) {
                // Usuario Creado
                // Mensaje
                alert("Usuario modificado");
                // Llamar nuevamente el formulario
                tabs_eval_ele("exit", this);
            } else if (String(r).indexOf("error") != -1) {
                // Error de Peticion
                alert("Lo sentimos ha ocurrido un error");
                //location.reload();
            } else {
                // Error de Peticion
                alert("Lo sentimos ha ocurrido un error");
                //location.reload();
            }
        };
        // Operacion

        request.request_operation();
    }
}

function upd_userrrr() {
    if (confirm("¿ Está seguro que desea actualizar la información de usuario?")) {
        // Contador de inputs
        var inps_cont = 0;
        // Contador de inputs Expresiones
        var inps_exp = 0;
        // Identificar Inputs
        var inps_form = document.querySelectorAll(".inps-forms");
        // Recorrer inputs
        for (i = 0; i < inps_form.length; i++) {
            // Si esta vacio o es none
            if ((inps_form[i].value == "" || inps_form[i].value == "none") && i != 10) {
                message = 'Completa todos los campos del formulario';
                alerts_tec(message);
                inps_form[i].style.borderColor = "red";
                return false;
            } else {
                inps_cont++;
                inps_form[i].style.borderColor = "#00aef1";
                console.log("inps_form", inps_form[i].value);
            }
        }
        // Validar Correo -----------------
        // Expresion regular email
        exp_email = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/);
        // Validar Contraseña -----------------
        if (!exp_email.test(inps_form[9].value)) {
            message = "Debe incluir un email con un formato correcto" + "<br/>Ej: mieamil@ejemplo.ejemplo";
            alerts_tec(message);
            inps_form[9].focus();
            inps_form[9].style.borderColor = "red";

            return false;
        } else {
            inps_form[9].style.borderColor = "#00aef1";
            inps_exp++;
        }
        // Validar Contraseña -----------------------
        // Expresion regular Contraseña
        exp_pass = new RegExp(" ");
        if (exp_pass.test(inps_form[10].value)) {
            inps_form[10].value == "";
            message = "La contraseña no debe llevar espacios" + "<br/>Ej: miCon_trSe236";
            alerts_tec(message);
            inps_form[10].focus();
            inps_form[10].style.borderColor = "red";

            return false;
        } else {
            inps_form[10].style.borderColor = "#00aef1";
            inps_exp++;
        }
        // Validar Telefono y Numero de Identificacion ------------------
        // Expresion regular Números
        exp_num = new RegExp("[0-9]");
        // Identificacion
        if (!exp_num.test(inps_form[3].value)) {
            inps_form[3].value == "";
            message = "Solo incluya números en el Número de Indetificación" + "<br/>Ej: 10000363000";
            alerts_tec(message);
            inps_form[3].focus();
            inps_form[3].style.borderColor = "red";
            return false;
        } else {
            inps_form[3].style.borderColor = "#00aef1";
            inps_exp++;
        }
        // Teléfono
        if (!exp_num.test(inps_form[4].value)) {
            inps_form[4].value == "";
            message = "Solo incluya números en el teléfono" + "<br/>Ej: 3055555555";
            alerts_tec(message);
            inps_form[4].focus();
            inps_form[4].style.borderColor = "red";
            return false;
        } else {
            inps_form[4].style.borderColor = "#00aef1";
            inps_exp++;
        }

        // Objeto Request
        request = new Request();
        // Url
        request.s_url = "fil-tec";
        // Configuracion
        request.s_config = ["POST", false, false, false, "json"];
        // Permiso
        request.s_permision = ["tec-upd-per", 1];
        // Datos de Envio
        request.s_dataSend = [
            { name: "cod", values: inps_form[0].value },
            { name: "nombre", values: inps_form[1].value },
            { name: "t-identi", values: inps_form[2].value },
            { name: "identificacion", values: inps_form[3].value },
            { name: "telefono", values: inps_form[4].value },
            { name: "ciudad", values: inps_form[6].value },
            { name: "direccion", values: inps_form[7].value },
            { name: "profesion", values: inps_form[8].value },
            { name: "email", values: inps_form[9].value },
            { name: "password", values: inps_form[10].value },
            { name: "rol", values: inps_form[11].value },
            { name: "estado", values: inps_form[12].value },
        ];
        // Acciones
        request.s_actions = function (r) {
            // Validar Respuesta

            if (String(r).indexOf("success") != -1) {
                // Usuario Creado
                // Mensaje
                alert("Usuario modificado");
                // Llamar nuevamente el formulario
                tabs_eval_ele("exit", this);
            } else if (String(r).indexOf("error") != -1) {
                // Error de Peticion
                alert("Lo sentimos ha ocurrido un error");
                //location.reload();
            } else {
                // Error de Peticion
                alert("Lo sentimos ha ocurrido un error");
                //location.reload();
            }
        };
        // Operacion

        request.request_operation();
    }
}

function ConsultaUsuario() {
    var sendform = new FormData();
    sendform.append("f", "ConsultaUsuario");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#nom").val(respuesta[0]);
            $("#ti").val(respuesta[1]);
            $("#ni").val(respuesta[2]);
            $("#tel").val(respuesta[3]);
            $("#dir").val(respuesta[4]);
            $("#pro").val(respuesta[5]);
            $("#ema").val(respuesta[6]);
            $("#sel-ciud").val(respuesta[7]);
            $("#sel-depa").val(respuesta[8]);
        },
    });
}
//////////////////////////////
function Detailproevaeleusu2(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Cumple) {
   
   var sendform = new FormData();
     sendform.append("f", "Conflicto_int_ele");
     sendform.append("pro", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         conflicto=String(e)
          if(conflicto.indexOf("sin")!=-1 )
          {
      var respuesta=JSON.parse(e)
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CONFLICTO DE INTERESES</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div style='font-size:18px;'>Yo, "+getCookie("user_name")+" certifico que SI (<input id='input_con1' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">)  &nbsp; NO (<input id='input_con2' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">) tengo conflicto de interés con NIT y razón social : <b>"+document.getElementById("tlproevaeleusu").rows[nom].cells[3].innerText+"</b>  para realizar el proceso de evaluación de elegibilidad del proyecto : <b>"+document.getElementById("tlproevaeleusu").rows[nom].cells[10].innerText+"</b>, postulado para la Convocatoria SENAINNOVA PRODUCTIVIDAD PARA LAS EMPRESAS. Esta constancia se emite el día "+respuesta[1]+"<br><div style='width:100%;text-align:left;margin-top:10px;'><input type='checkbox' id='check_con3' onclick=\"$('#advertenciaCon').html('')\">&nbsp; <a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=fl-s/ans/Formato_F08.pdf' target='_blank'>He leído el formato F08 – NO EXISTENCIA DE CONFLICTO Y CONFIDENCIALIDAD </a></div><div style='width:100%;text-align:center;color:red;margin-top:10px;' id='advertenciaCon'></div><br><div style='width:100%;text-align:center;'><button class=\"btn btn-primary\" onclick=\"RegistrarConflictoEle("+id+",1,"+nom+")\">Aceptar</button></div></div>")  
    $("#myModal").modal(); 
      barralateral2();
     }
          else if(conflicto.indexOf("acu")!=-1 )
          {
     var Nompro = document.getElementById("tlproevaeleusu").rows[nom].cells[10].innerText;
    var Nomemp = document.getElementById("tlproevaeleusu").rows[nom].cells[3].innerText;
    pesPro = 0;
    pesEva = 0;
    pesEmp = 0;
    pesSub = 0;
    pesCor = 0;
    $("#myModal").modal();
    barralateral2();
    var icon = Cumple;
    var evalua = "";
    var checkelegible = "";

    if (Cumple == "1") {
        icon = "<i class='fas fa-check' style='color:green;'></i>";
    } else if (Cumple == "0") {
        icon = "<i class='fa fa-times' style='color:red;'></i>";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACIÓN ELEGIBILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    if (estado != "POR ASIGNAR")
        //evalua="<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('diveva')\"><h6>Ver evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('divsub')\"><h6>Ver subsanaciones <span id='infpro'></span> </h6></div></div><div  class='row' id='divsub' ></div>"
        evalua =
            "<br><span class='pestanha pestanha_active' id='if1'  onclick=\"infoChangeele($('#if1'),1)\" style='margin-left:-10px!important;'>Evaluar</span><span class='pestanha' id='if3' onclick=\"infoChangeele($('#if3'),3)\">Empresa</span><span class='pestanha' id='if2' onclick=\"infoChangeele($('#if2'),2)\">Proyecto</span><div  id='inf1' class='row' style='display:block;overflow-x:auto;padding:0 10px;'></div><div  id='inf2' class='row' style='display:none;overflow-x:auto;padding:0 10px;'></div><div  id='inf3' class='row' style='display:none;overflow-x:auto;padding:0 10px;'></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' id='NOmpro'>" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomemp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Elegible : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconelegible' >" +
            icon +
            "</div>" +
            checkelegible +
            "</div>" +
            evalua
    );
    infoChangeele($("#if1"), 1);  
              
          }
          
        },
    });   
    
    
   
    
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
        
      return c.substring(name.length, c.length).replace("+"," ");
    }
  }
  return "";
}
function Detailproevaeleusu2Jur(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Cumple) {
  var sendform = new FormData();
     sendform.append("f", "Conflicto_int_ele");
     sendform.append("pro", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         conflicto=String(e)
          if(conflicto.indexOf("sin")!=-1 || conflicto.indexOf("sin")!=-1 )
          {
             
      var respuesta=JSON.parse(e)
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CONFLICTO DE INTERESES</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div style='font-size:18px;'>Yo, "+getCookie("user_name")+" certifico que SI (<input id='input_con1' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">) &nbsp;  NO (<input id='input_con2' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">) tengo conflicto de interés con la empresa con NIT y razón social : <b>"+document.getElementById("tlproevaeleusu").rows[nom].cells[3].innerText+"</b>  para realizar el proceso de evaluación de elegibilidad del proyecto : <b>"+document.getElementById("tlproevaeleusu").rows[nom].cells[10].innerText+"</b>, postulado para la Convocatoria SENAINNOVA PRODUCTIVIDAD PARA LAS EMPRESAS. Esta constancia se emite el día "+respuesta[1]+"<br><div style='width:100%;text-align:left;margin-top:10px;'><input type='checkbox' id='check_con3' onclick=\"$('#advertenciaCon').html('')\">&nbsp; <a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=fl-s/ans/Formato_F08.pdf' target='_blank'>He leído el formato F08 – NO EXISTENCIA DE CONFLICTO Y CONFIDENCIALIDAD </a></div><div style='width:100%;text-align:center;color:red;margin-top:10px;' id='advertenciaCon'></div><br><div style='width:100%;text-align:center;'><button class=\"btn btn-primary\" onclick=\"RegistrarConflictoEle("+id+",2,"+nom+")\">Aceptar</button></div></div>")  
    $("#myModal").modal(); 
      barralateral2();
    }else if(conflicto.indexOf("acu")!=-1 ){
    var Nompro = document.getElementById("tlproevaeleusu").rows[nom].cells[10].innerText;
    var Nomemp = document.getElementById("tlproevaeleusu").rows[nom].cells[3].innerText;
    pesPro = 0;
    pesEva = 0;
    pesEmp = 0;
    pesSub = 0;
    pesCor = 0;
    $("#myModal").modal();
    barralateral2();
    var icon = Cumple;
    var evalua = "";
    var checkelegible = "";

    if (Cumple == "1") {
        icon = "<i class='fas fa-check' style='color:green;'></i>";
    } else if (Cumple == "0") {
        icon = "<i class='fa fa-times' style='color:red;'></i>";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACIÓN ELEGIBILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    if (estado != "POR ASIGNAR")
        //evalua="<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('diveva')\"><h6>Ver evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div><div  class='encabezadoseva' onclick=\"MostrarDivEvaEle('divsub')\"><h6>Ver subsanaciones <span id='infpro'></span> </h6></div></div><div  class='row' id='divsub' ></div>"
        evalua =
            "<br><span class='pestanha pestanha_active' id='if1'  onclick=\"infoChangeeleJur($('#if1'),1)\" style='margin-left:-10px!important;'>Evaluar</span><span class='pestanha' id='if3' onclick=\"infoChangeeleJur($('#if3'),3)\">Empresa</span><span class='pestanha' id='if2' onclick=\"infoChangeeleJur($('#if2'),2)\">Proyecto</span><div  id='inf1' class='row' style='display:block;overflow-x:auto;padding:0 10px;'></div><div  id='inf2' class='row' style='display:none;overflow-x:auto;padding:0 10px;'></div><div  id='inf3' class='row' style='display:none;overflow-x:auto;padding:0 10px;'></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' id='NOmpro'>" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomemp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Elegible : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconelegible' >" +
            icon +
            "</div>" +
            checkelegible +
            "</div>" +
            evalua
    );
    infoChangeeleJur($("#if1"), 1);
    }
    
    
}
    });
   
}


function RegistrarConflictoEle(pro,usu,fila) {
  
     var sino="";
     var con_text=""
   
     if($("#input_con1").is(":checked")==false &&  $("#input_con2").is(":checked")==false)
     {
           
        $("#advertenciaCon").html("Seleccione la opción SI o NO")
     }
     else if($("#check_con3").is(":checked")==false)
     {
          $("#advertenciaCon").html("Debe leer el Formato F08 - NO EXISTENCIA DE CONFLICTO Y CONFIDENCIALIDAD")
     }
     else{
     if($("#input_con1").is(":checked")) {
         sino=1
         con_text="SI"
     }
     else
     {
         sino=0
         con_text="NO"
     }
     if(confirm("¿Está seguro de que "+con_text+" presenta conflicto de intereses ?")){
      $("#advertenciaCon").html("<div class='spinner-border text-dark'></div>")
     var sendform = new FormData();
     sendform.append("f", "RegistrarConflictoEle");
     sendform.append("pro", pro);
     sendform.append("sino", sino);
     sendform.append("npro", document.getElementById("tlproevaeleusu").rows[fila].cells[10].innerText);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         conflicto=String(e)
         if(conflicto.indexOf("Error al registrar")!=-1)
         {
           $("#advertenciaCon").html("Error al registar el conflicto de intereses")   
         }
         else{
            $("#advertenciaCon").html("El conflicto de intereses fue registrado")  
            if(usu=1)
            {
            eval_pro_ele2($('#eval_pro_ele'))  
            }
            else
            {
            eval_pro_ele2Jur($('#eval_pro_ele'))    
            }
            CloseModal()
         }
          
        },
    });
     
     }
     }
     }


function Conflicto_int_ele(pro) {
     conflicto="";
     var sendform = new FormData();
     sendform.append("f", "Conflicto_int_ele");
     sendform.append("pro", pro);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         conflicto=String(e)
          return conflicto
        },
    });
   
}


function RegistrarConflictoVia(pro,fila) {
     var sino="";
     var con_text="";
     if($("#input_con1").is(":checked")==false &&  $("#input_con2").is(":checked")==false)
     {
           
        $("#advertenciaCon").html("Seleccione la opción SI o NO")
     }
     else if($("#check_con3").is(":checked")==false)
     {
          $("#advertenciaCon").html("Debe leer el Formato F08 - NO EXISTENCIA DE CONFLICTO Y CONFIDENCIALIDAD")
     }
     else{
     if($("#input_con1").is(":checked")) {
         sino=1
         con_text="SI"
     }
     else
     {
         sino=0
         con_text="NO"
     }
      if(confirm("¿Está seguro de que "+con_text+" presenta conflicto de intereses?")){
      $("#advertenciaCon").html("<div class='spinner-border text-dark'></div>")
     var sendform = new FormData();
     sendform.append("f", "RegistrarConflictoVia");
     sendform.append("pro", pro);
     sendform.append("sino", sino);
     sendform.append("npro", document.getElementById("tlproevaviacp").rows[fila].cells[11].innerText);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            //alert(e)
         conflicto=String(e)
         if(conflicto.indexOf("Error al registrar")!=-1)
         {
           $("#advertenciaCon").html("Error al registar el conflicto de intereses")   
         }
         else{
            $("#advertenciaCon").html("El conflicto de intereses fue registrado")  
            eval_pro_via2($('#eval_pro_via'))
            CloseModal()
         }
          
        },
    });
     
     }
     }
     }


function Conflicto_int_via(pro) {
     conflicto="";
     var sendform = new FormData();
     sendform.append("f", "Conflicto_int_via");
     sendform.append("pro", pro);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         conflicto=String(e)
          return conflicto
        },
    });
   
}

function listadoSubseleusu() {
    pesSub = 0;
    infoChangeele($("#if4"), 4);
}

function listadoCorseleusu() {
    pesCor = 0;
    infoChangevia($("#if4"), 4);
}

function Detailproevaviausu2(id, num_rad, fec_rad, nom, razon_social, fec_rec, fecha_limite, dias, $tiempos, estado, Viable) {
     var sendform = new FormData();
     sendform.append("f", "Conflicto_int_via");
     sendform.append("pro", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         conflicto=String(e)
          if(conflicto.indexOf("sin")!=-1 || conflicto.indexOf("sin")!=-1 )
          {
             
      var respuesta=JSON.parse(e)
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CONFLICTO DE INTERESES</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div style='font-size:18px;'>Yo, "+getCookie("user_name")+" certifico que SI (<input id='input_con1' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">) &nbsp;  NO (<input id='input_con2' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">) tengo conflicto de interés con la empresa con NIT y razón social : <b>"+document.getElementById("tlproevaviacp").rows[nom].cells[3].innerText+"</b>  para realizar el proceso de evaluación de viabilidad del proyecto : <b>"+document.getElementById("tlproevaviacp").rows[nom].cells[11].innerText+"</b>, postulado para la Convocatoria SENAINNOVA PRODUCTIVIDAD PARA LAS EMPRESAS. Esta constancia se emite el día "+respuesta[1]+"<br><div style='width:100%;text-align:left;margin-top:10px;'><input type='checkbox' id='check_con3' onclick=\"$('#advertenciaCon').html('')\">&nbsp; <a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=fl-s/ans/Formato_F08.pdf' target='_blank'>He leído el formato F08 – NO EXISTENCIA DE CONFLICTO Y CONFIDENCIALIDAD </a></div><div style='width:100%;text-align:center;color:red;margin-top:10px;' id='advertenciaCon'></div><br><div style='width:100%;text-align:center;'><button class=\"btn btn-primary\" onclick=\"RegistrarConflictoVia("+id+","+nom+")\">Aceptar</button></div></div>")  
    $("#myModal").modal(); 
      barralateral2();
    }else if(conflicto.indexOf("acu")!=-1 ){
    
    var Nompro = document.getElementById("tlproevaviacp").rows[nom].cells[11].innerText;
    var Nomemp = document.getElementById("tlproevaviacp").rows[nom].cells[3].innerText;
    pesPro = 0;
    pesEva = 0;
    pesEmp = 0;
    pesSub = 0;
    pesCor = 0;

    $("#myModal").modal();
    barralateral2();
    var icon = Viable;
    var evalua = "";
    var checkviable = "";
    if (Viable == "1") {
        icon = "<i class='fas fa-check' style='color:green;'></i>";
    } else if (Viable == "0") {
        icon = "<i class='fa fa-times' style='color:red;'></i>";
    } else {
        if (estado == "EVALUADO") {
            icon = "";
        }
    }
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> EVALUACIÓN VIABILIDAD</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    if (estado != "POR ASIGNAR")
        //	evalua="<br><div  class='encabezadoseva' onclick=\"MostrarDivEvaVia('diveva')\"><h6>Ver evaluación <span id='infpro'></span> </h6></div></div><div  class='row' id='diveva' ></div><div  class='encabezadoseva' onclick=\"MostrarDivEvaVia('divcor')\"><h6>Ver corecciones<span id='infpro'></span> </h6></div></div><div  class='row' id='divcor' ></div>"
        evalua =
            "<br><span class='pestanha pestanha_active' id='if1'  onclick=\"infoChangevia($('#if1'),1)\" style='margin-left:-10px!important;'>Evaluar</span><span class='pestanha' id='if3' onclick=\"infoChangevia($('#if3'),3)\">Empresa</span><span class='pestanha' id='if2' onclick=\"infoChangevia($('#if2'),2)\">Proyecto</span><div  id='inf1' class='row' style='display:block;overflow-x:auto;padding:0 10px;'></div><div  id='inf2' class='row'  style='display:none;overflow-x:auto;padding:0 10px;'></div><div  id='inf3' class='row' style='display:none;overflow-x:auto;padding:0 10px;'></div><div  id='inf4' class='row' style='display:none;overflow-x:auto;padding:0 10px;'></div>";
    $("#mbody").html(
        "<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' id='NOmpro'>" +
            Nompro +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            id +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>N. Radicado :</b> </div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            num_rad +
            "</div>  <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha radicado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rad +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            Nomemp +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha recibido : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fec_rec +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Fecha límite : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            fecha_limite +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Días restantes  : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            dias +
            "</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Estado : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >" +
            estado +
            "</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Viable : </b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' id='iconviable' >" +
            icon +
            "</div>" +
            checkviable +
            "</div>" +
            evalua
    );
    infoChangevia($("#if1"), 1); }
    
    
}
    });
   
}
var pesPro = 0;
var pesEva = 0;
var pesEmp = 0;
var pesSub = 0;
var pesCor = 0;

function infoChangeele(btn, num) {
    $(".pestanha").removeClass("pestanha_active");
    $(btn).addClass("pestanha_active");

    for (var i = 1; i <= 4; i++) {
        $("#inf" + i).css("display", "none");
    }
    $("#inf" + num).css("display", "block");

    if (num == 1 && pesEva == 0) {
        MostrarEvaEle();
        pesEva++;
    } else if (num == 2 && pesPro == 0) {
        MostrarPro_evaele();
        pesPro++;
    } else if (num == 3 && pesEmp == 0) {
        MostrarEmp_evaele();
        pesEmp++;
    } else if (num == 4 && pesSub == 0) {
        pesSub++;
    }
}

function infoChangeeleJur(btn, num) {
    $(".pestanha").removeClass("pestanha_active");
    $(btn).addClass("pestanha_active");

    for (var i = 1; i <= 4; i++) {
        $("#inf" + i).css("display", "none");
    }
    $("#inf" + num).css("display", "block");

    if (num == 1 && pesEva == 0) {
        MostrarEvaEleJur();
        pesEva++;
    } else if (num == 2 && pesPro == 0) {
        MostrarPro_evaele();
        pesPro++;
    } else if (num == 3 && pesEmp == 0) {
        MostrarEmp_evaele();
        pesEmp++;
    } else if (num == 4 && pesSub == 0) {
        pesSub++;
    }
}

function infoChangePro(btn, num) {
    if (num == 1) {
        $(".pestanha").removeClass("pestanha_active");
        $(btn).addClass("pestanha_active");

        $("#infogenpro").css("display", "block");
        $("#infoplanestras").css("display", "none");
        $("#infoadicio").css("display", "none");
        $("#infofinanciera").css("display", "none");
        $("#infoAnexos").css("display", "none");
    } else if (num == 2) {
        if ($("#id").val() == "") {
            alert("Debe guardar un proyecto o cargar uno de la lista");
        } else {
            $(".pestanha").removeClass("pestanha_active");
            $(btn).addClass("pestanha_active");

            $("#infogenpro").css("display", "none");
            $("#infoplanestras").css("display", "block");
            $("#infoadicio").css("display", "none");
            $("#infofinanciera").css("display", "none");
            $("#infoAnexos").css("display", "none");
            MostrarDivP("divtra");
        }
    } else if (num == 3) {
        if ($("#id").val() == "") {
            alert("Debe guardar un proyecto o cargar uno de la lista!");
        } else {
            $(".pestanha").removeClass("pestanha_active");
            $(btn).addClass("pestanha_active");

            $("#infogenpro").css("display", "none");
            $("#infoplanestras").css("display", "none");
            $("#infoadicio").css("display", "block");
            $("#infofinanciera").css("display", "none");
            $("#infoAnexos").css("display", "none");
        }
    } else if (num == 4) {
        if ($("#id").val() == "") {
            alert("Debe guardar un proyecto o cargar uno de la lista!");
        } else {
            $(".pestanha").removeClass("pestanha_active");
            $(btn).addClass("pestanha_active");

            $("#infogenpro").css("display", "none");
            $("#infoplanestras").css("display", "none");
            $("#infoadicio").css("display", "none");
            $("#infofinanciera").css("display", "block");
            $("#infoAnexos").css("display", "none");
        }
    } else if (num == 5) {
        if ($("#id").val() == "") {
            alert("Debe guardar un proyecto o cargar uno de la lista!");
        } else {
            $(".pestanha").removeClass("pestanha_active");
            $(btn).addClass("pestanha_active");

            $("#infogenpro").css("display", "none");
            $("#infoplanestras").css("display", "none");
            $("#infoadicio").css("display", "none");
            $("#infofinanciera").css("display", "none");
            $("#infoAnexos").css("display", "block");
            MostrarDivP("divanx");
        }
    }
}

function MostrarEmp_evaele() {
    $("#inf3").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/empresaevausuele.php",
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf3").html(e);
            CargarDatosEmpusu($("#id_pro").val());
        },
    });
}






function CargarDatosEmpusu(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosEmpusu");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#id").val(respuesta[0]);
            $("#nit").val(respuesta[1]);
            $("#raz").val(respuesta[2]);
            $("#act").val(respuesta[3]);
            $("#tam").val(respuesta[4]);
            $("#dep").val(respuesta[5]);
            $("#ciu").val(respuesta[6]);
            $("#dir").val(respuesta[7]);
            $("#cp").val(respuesta[8]);
            $("#tel").val(respuesta[9]);
            $("#ema").val(respuesta[10]);
            $("#ndoc").val(respuesta[11]);
            $("#dcrl").val(respuesta[12]);
            $("#grl").val(respuesta[13]);
            $("#aluc").val(respuesta[14]);
            $("#rep").val(respuesta[15]);
            $("#tel_con").val(respuesta[16]);
            $("#car_con").val(respuesta[17]);
            $("#num_ver").val(respuesta[18]);
            $("#fec_cons").val(respuesta[19]);
        },
    });
}

function MostrarEmp_evavia() {
    $("#inf3").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/empresaevausuvia.php",
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf3").html(e);
            CargarDatosEmpusu($("#id_pro").val());
        },
    });
}

function CargarDivsubusu() {
    var sendform = new FormData();
    sendform.append("f", "CargarDivsubusu");
    sendform.append("pro", $("#id_pro").val());
    $("#inf4").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf4").html(e);
        },
    });
}

//////////////////////////////////////////////////////////
function MostrarPro_evaele() {
    $("#inf2").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/proyectoupdevausuele.php?id=" + $("#id_pro").val(),
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf2").html(e);
        },
    });
}

function CargarDatosProusu(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosPro");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#idProoo").val(respuesta[0]);
            $("#conv").val(respuesta[1]);
            $("#emp").val(respuesta[2]);
            $("#nom").val(respuesta[3]);
            $("#fec_rec").val(respuesta[4]);
            $("#num_rad").val(respuesta[5]);
            $("#fec_rad").val(respuesta[6]);
         
            $("#duracion").val(respuesta[8]);
             $("#tip_pro").val(respuesta[7]); 
            $("#val_pro").val(respuesta[18]);
            $("#val_fin").val(respuesta[19]);
            $("#val_tot_con").val(respuesta[20]);
            $("#val_con_din").val(respuesta[21]);
            $("#val_con_esp").val(respuesta[22]);
            $("#uti_net").val(respuesta[23]);
            $("#act_corr").val(respuesta[24]);
            $("#pas_corr").val(respuesta[25]);
            $("#pas_tot").val(respuesta[26]);
            $("#act_tot").val(respuesta[27]);
            $("#pas_lar_pla").val(respuesta[28]);
            $("#pas_cor_pla").val(respuesta[29]);
            $("#EBITDA").val(respuesta[30]);
            $("#dep").val(respuesta[31]);
            $("#ciu").val(respuesta[32]);
            moneda("val_pro");
            moneda("val_fin");
            moneda("val_tot_con");
            moneda("val_con_din");
            moneda("val_con_esp");
            moneda("uti_net");
            moneda("act_corr");
            moneda("pas_tot");
            moneda("pas_corr");
            moneda("act_tot");
            moneda("pas_lar_pla");
            moneda("pas_cor_pla");
            moneda("EBITDA");
            $("#divupd").css("display", "block");
            $("#divadd").css("display", "none");
            MostrarDivPeva("divanx");
            MostrarDivPeva("divtra");
        },
    });
}

function CargarDatosPro(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosPro");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);
            $("#id").val(respuesta[0]);
            $("#progeso_div").html("<b>ID PROYECTO : </b>"+respuesta[0]+"<br><b>TÍTULO : </b>" + respuesta[3]);
            $("#conv").val(respuesta[1]);
            $("#emp").val(respuesta[2]);
            $("#nom").val(respuesta[3]);
            $("#fec_rec").val(respuesta[4]);
            $("#num_rad").val(respuesta[5]);
            $("#fec_rad").val(respuesta[6]);
           
            $("#duracion").val(respuesta[8]);
           $("#tip_pro").val(respuesta[7]);
                        $("#val_pro").val(respuesta[18]);
            $("#val_fin").val(respuesta[19]);
            $("#val_tot_con").val(respuesta[20]);
            $("#val_con_din").val(respuesta[21]);
            $("#val_con_esp").val(respuesta[22]);
            $("#uti_net").val(respuesta[23]);
            $("#act_corr").val(respuesta[24]);
            $("#pas_corr").val(respuesta[25]);
            $("#pas_tot").val(respuesta[26]);
            $("#act_tot").val(respuesta[27]);
            $("#pas_lar_pla").val(respuesta[28]);
            $("#pas_cor_pla").val(respuesta[29]);
            $("#EBITDA").val(respuesta[30]);
            $("#dep").val(respuesta[31]);
            $("#ciu").val(respuesta[32]);
            moneda("val_pro");
            moneda("val_fin");
            moneda("val_tot_con");
            moneda("val_con_din");
            moneda("val_con_esp");
            moneda("uti_net");
            moneda("act_corr");
            moneda("pas_corr");
            moneda("pas_tot");
            moneda("act_tot");
            moneda("pas_lar_pla");
            moneda("pas_cor_pla");
            moneda("EBITDA");
            $("#divupd").css("display", "block");
            $("#divadd").css("display", "none");
            CalcularProgreso();
            CargarPt();
            CargarAnex();
            Cargartem_Asc();
            CargarEB();
            CargarObjetivos();
            CargarProdu();
            CargarRes();
        },
    });
}

function MostrarPro_evavia() {
    $("#inf2").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/proyectoupdevausuvia.php",
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf2").html(e);
            CargarDatosProusu($("#id_pro").val());
        },
    });
}

//////////////////////////////////////////////////////////
function CargarDivcorusu() {
    var sendform = new FormData();
    sendform.append("f", "CargarDivcorusu");
    sendform.append("pro", $("#id_pro").val());
    $("#inf4").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf4").html(e);
        },
    });
}

function infoChangevia(btn, num) {
    $(".pestanha").removeClass("pestanha_active");
    $(btn).addClass("pestanha_active");

    for (var i = 1; i <= 4; i++) {
        $("#inf" + i).css("display", "none");
    }
    $("#inf" + num).css("display", "block");
    if (num == 1 && pesEva == 0) {
        MostrarEvaVia();
        pesEva++;
    } else if (num == 2 && pesPro == 0) {
        MostrarPro_evavia();
        pesPro++;
    } else if (num == 3 && pesEmp == 0) {
        MostrarEmp_evavia();
        pesEmp++;
    } else if (num == 4 && pesCor == 0) {
        CargarDivcorusu();
        pesCor++;
    }
}

function MostrarEvaEle() {
    //$("#inf1").html("<div class='spinner-border text-dark'></div><br>")
    var sendform = new FormData();
    sendform.append("f", "CargarDivevaeleusu");
    sendform.append("cod", $("#conv").val());
    sendform.append("pro", $("#id_pro").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf1").html(e);
            //setTimeout("FcalificarElegibilidadUser2("+$("#id_pro").val()+",'"+$("#concepto_final").html()+"')",3000)
        },
    });
}

function MostrarEvaEleJur() {
    //$("#inf1").html("<div class='spinner-border text-dark'></div><br>")
    var sendform = new FormData();
    sendform.append("f", "CargarDivevaeleusuJur");
    sendform.append("cod", $("#conv").val());
    sendform.append("pro", $("#id_pro").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf1").html(e);
            //setTimeout("FcalificarElegibilidadUserJur2("+$("#id_pro").val()+",'"+$("#concepto_final").html()+"')",3000)
        },
    });
}

function MostrarEvaVia() {
    //$("#inf1").html("<div class='spinner-border text-dark'></div><br>")
    var sendform = new FormData();
    sendform.append("f", "CargarDivevaviausu");
    sendform.append("cod", $("#conv").val());
    sendform.append("pro", $("#id_pro").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#inf1").html(e);
        },
    });
}

function calificarElegibilidadUser(pro, cri, fila, tipo, cumple) {
    if ($("#Observacion" + fila).val() == "" && cumple == "No cumple") {
        clearTimeout(timeout);
        alert("Digite la observación");
         //$("#check_no_" + fila).prop("checked", false);
        //$("#check_no_"+fila).removeAttr("checked");
        $("#Observacion" + fila).focus();
    } else {
        $("#loading" + fila).html("<div class='spinner-border text-dark'></div><br>");
        var sendform = new FormData();
        sendform.append("f", "calificarElegibilidadUser");
        sendform.append("pro", pro);
        sendform.append("cri", cri);
        sendform.append("cumple", cumple);
        sendform.append("tipo", tipo);
        sendform.append("det", $("#Detalle" + fila).val());
        sendform.append("obs", $("#Observacion" + fila).val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
               
                $("#loading" + fila).html("");

                pesEva = 0;
                infoChangeele($("#if1"), 1);
            },
        });
    }
}
function RefreshSubsana(){
    pesEva = 0;
                infoChangeele($("#if1"), 1);
}

function RefreshSubsanaJur(){
    pesEva = 0;
                infoChangeeleJur($('#if1'),1)
}
function calificarElegibilidadUserJur(pro, cri, fila, tipo, cumple) {
    if ($("#Observacion" + fila).val() == "" && cumple == "No cumple") {
        clearTimeout(timeout);
        alert("Digite la observación");
        //$("#check_no_" + fila).prop("checked", false);
        //$("#check_no_"+fila).removeAttr("checked");
        $("#Observacion" + fila).focus();
    } else {
        $("#loading" + fila).html("<div class='spinner-border text-dark'></div><br>");
        var sendform = new FormData();
        sendform.append("f", "calificarElegibilidadUserJur");
        sendform.append("pro", pro);
        sendform.append("cri", cri);
        sendform.append("cumple", cumple);
        sendform.append("tipo", tipo);
        sendform.append("det", $("#Detalle" + fila).val());
        sendform.append("obs", $("#Observacion" + fila).val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
               //alert(e)
                $("#loading" + fila).html("");
               if (String(e).indexOf("finalizada") != -1) {
                botonevaluacionusuJur($("#btn14"));
                CloseModal();
            }
          else{
                pesEva = 0;
                infoChangeeleJur($("#if1"), 1);
              
          }
            },
        });
    }
}

function FcalificarElegibilidadUser2(pro, tot) {
    //if(confirm("¿Esta seguro de finalizar la evaluación?"))
    //{
    $("#load").html("<div class='spinner-border text-dark'></div><br>");

    var sendform = new FormData();
    sendform.append("f", "FcalificarElegibilidadUser");
    sendform.append("pro", pro);
    sendform.append("conv", $("#conv").val());
    sendform.append("npro", $("#NOmpro").html());
    sendform.append("tot", tot);

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#load").html("");
            //

            if (String(e).indexOf("finalizada") != -1) {
                botonevaluacionusu1($("#btn14"));
                CloseModal();
            }
        },
    });
    //}
}

function FcalificarElegibilidadUserJur(pro, tot) {
    //	if(confirm("¿Esta seguro de finalizar la evaluación?"))
    //	{
    $("#load").html("<div class='spinner-border text-dark'></div><br>");

    var sendform = new FormData();
    sendform.append("f", "FcalificarElegibilidadUser_Jur");
    sendform.append("pro", pro);
    sendform.append("conv", $("#conv").val());
    sendform.append("npro", $("#NOmpro").html());
    sendform.append("tot", tot);

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           alert(e)
            $("#load").html("");

            if (String(e).indexOf("finalizada") != -1) {
                botonevaluacionusuJur($("#btn14"));
                CloseModal();
            }
        },
    });
    //}
}

function FcalificarElegibilidadUser(pro, tot) {
    if (confirm("¿Esta seguro de finalizar la evaluación?")) {
        $("#load").html("<div class='spinner-border text-dark'></div><br>");

        var sendform = new FormData();
        sendform.append("f", "FcalificarElegibilidadUser_");
        sendform.append("pro", pro);
        sendform.append("conv", $("#conv").val());
        sendform.append("npro", $("#NOmpro").html());
        sendform.append("tot", tot);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#load").html("");

                alert(e);
                if (String(e).indexOf("finalizada") != -1) {
                    botonevaluacionusu1($("#btn14"));
                    CloseModal();
                }
            },
        });
    }
}

function FcalificarElegibilidadUserJur(pro, tot) {
    if (confirm("¿Esta seguro de finalizar la evaluación?")) {
        $("#load").html("<div class='spinner-border text-dark'></div><br>");

        var sendform = new FormData();
        sendform.append("f", "FcalificarElegibilidadUser_Jur");
        sendform.append("pro", pro);
        sendform.append("conv", $("#conv").val());
        sendform.append("npro", $("#NOmpro").html());
        sendform.append("tot", tot);

        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#load").html("");

                alert(e);
                if (String(e).indexOf("finalizada") != -1) {
                    botonevaluacionusuJur($("#btn14"));
                    CloseModal();
                }
            },
        });
    }
}

function calificarViabilidadUser(pro, cri, fila, tipo) {
    if ($("#Observacion" + fila).val() == "") {
        alert("Digite el concepto");
        $("#Observacion" + fila).focus()
        $("#Selcal" + fila).val('A')
        $("#califiText" + fila).val('-')
    }
    
    
    else {
        if( $("#Selcal" + fila).val()=="A")
    {
       $("#Selcal" + fila).val('0')
       $("#califiText" + fila).val('0')
    }
        
        $("#loading" + fila).html("<div class='spinner-border text-dark'></div><br>");
        var cumple = "";

        var sendform = new FormData();
        sendform.append("f", "calificarViabilidadUser");
        sendform.append("pro", pro);
        sendform.append("cri", cri);
        sendform.append("cal", $("#califiText" + fila).val());
        sendform.append("tipo", tipo);
        sendform.append("num", $("#Selcal" + fila).val());
        sendform.append("obs", $("#Observacion" + fila).val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
                $("#loading" + fila).html("");
              
                pesEva = 0;
                infoChangevia($("#if1"), 1);
            },
        });
    }
}

function calificarViabilidadUseradc(pro, cri, fila, tipo) {
     if ($("#Observacionadc" + fila).val() == "") {
        alert("Digite el concepto");
        $("#Observacionadc" + fila).focus()
         $("#Selcaladc" + fila).val('A')
          $("#califiTextadc" + fila).val('-')
    }
    else{
     if( $("#Selcaladc" + fila).val()=="A")
    {
       $("#Selcaladc" + fila).val('0')
       $("#califiText" + fila).val('0')
    }    
    $("#loadingadc" + fila).html("<div class='spinner-border text-dark'></div><br>");
    var cumple = "";

    var sendform = new FormData();
    sendform.append("f", "calificarViabilidadUseradc");
    sendform.append("pro", pro);
    sendform.append("cri", cri);
    sendform.append("cal", $("#califiTextadc" + fila).val());
    sendform.append("tipo", tipo);
    sendform.append("num", $("#Selcaladc" + fila).val());
    sendform.append("obs", $("#Observacionadc" + fila).val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#loadingadc" + fila).html("");

            pesEva = 0;
            infoChangevia($("#if1"), 1);
        },
    });
}
}
function FcalificarViabilidadUser(pro, tot) {
    if (confirm("¿Esta seguro de finalizar la evaluación?")) {
        if ($("#FinalConcept").val() == "") {
            alert("Digite el concepto final");
            $("#FinalConcept").focus();
        } else {
            $("#load").html("<div class='spinner-border text-dark'></div><br>");

            var sendform = new FormData();
            sendform.append("f", "FcalificarViabilidadUser");
            sendform.append("pro", pro);
            sendform.append("conv", $("#conv").val());
            sendform.append("npro", $("#NOmpro").html());
            sendform.append("tot", tot);
            sendform.append("conf", $("#FinalConcept").val());

            $.ajax({
                type: "POST",
                url: "phpMVC/Controller/controller.php",
                data: sendform,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {},
                success: function (e) {
                    $("#load").html("");
                    alert(e);

                    if (String(e).indexOf("finalizada") != -1) {
                        botonevaluacionusu2($("#btn14"));
                        CloseModal();
                    }
                },
            });
        }
    }
}

function CalcularPuntaje(fila, pun) {
    var calif=$("#Selcal" + fila).val()
    if(calif!="A"){
    var puntaje = parseFloat(pun);
    var cali = parseInt($("#Selcal" + fila).val());
    var tot = (puntaje / 10) * cali;
    $("#califiText" + fila).val(tot.toFixed(1));}
      else{
        $("#califiText" + fila).val("-")
    }
}

var barra_progreso = 20;
var conteoprogresoPt = 0;
var conteoprogresoAnx = 0;
var conteoprogresoAdi1 = 0;
var conteoprogresoAdi2 = 0;
var conteoprogresoAdi3 = 0;
var conteoprogresoAdi4 = 0;
var conteoprogresoAdi5 = 0;
function CalcularProgreso() {
    barra_progreso = 20;
    $("#chekP1").css("color", "green");
    if ($("#val_pro").val() != 0 && $("#val_pro").val() != "" && $("#val_tot_con").val() != 0 && $("#val_tot_con").val() != "") {
        
        barra_progreso += 20;
        $("#chekP4").css("color", "green");
    }

        

    sumar_barra();
}

function sumar_barra() {
    if (conteoprogresoAdi1 + conteoprogresoAdi2 + conteoprogresoAdi3 + conteoprogresoAdi4 + conteoprogresoAdi5 == 20) {
            $("#chekP3").css("color", "green");
        } else {
            $("#chekP3").css("color", "#CCC");
        }
    
    var tbp = barra_progreso + conteoprogresoAdi1 + conteoprogresoAdi2 + conteoprogresoAdi3 + conteoprogresoAdi4 +conteoprogresoAdi5 + conteoprogresoPt + conteoprogresoAnx;
    $("#progresb").val(tbp);
    $("#progresl").html("" + String(tbp) + "%");
    if(tbp>50)
    {
        $("#progresl").css("color","#E8E6E6")
    }
    else{
        $("#progresl").css("color","#000")
    }
}

function CalcularVTC() {
    var VT = parseFloat($("#val_con_esp").val().replace(/\,/g, "")) + parseFloat($("#val_con_din").val().replace(/\,/g, ""));
    $("#val_tot_con").val(VT);
    moneda("val_tot_con");
    CalcularVTP();
}

function CalcularVTPT() {
    var VT = parseFloat($("#nom_pt").val().replace(/\,/g, "")) + parseFloat($("#val_con_pt").val().replace(/\,/g, "")) + parseFloat($("#val_fin_pt").val().replace(/\,/g, ""));
    $("#val_tot_pt").val(VT);
    moneda("val_tot_pt");
}

function CalcularVTP() {
    var VT = parseFloat($("#val_fin").val().replace(/\,/g, "")) + parseFloat($("#val_tot_con").val().replace(/\,/g, ""));
    $("#val_pro").val(VT);
    moneda("val_pro");
}

function CalcularPuntajeadc(fila, pun) {
     var calif=$("#Selcaladc" + fila).val()
    if(calif!="A"){
    var puntaje = parseFloat(pun);
    var cali = parseInt($("#Selcaladc" + fila).val());
    var tot = (puntaje / 10) * cali;
    $("#califiTextadc" + fila).val(tot.toFixed(1));
    }
    else{
        $("#califiTextadc" + fila).val("-")
    }
}

function MostrarPro_usu(id) {
    $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/proyectoupdevausuele.php",
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#cont-convo-fun").html(e);
            CargarDatosProusu(id);
        },
    });
}

function CargarDatosProcp(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosProusu");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#idProoo").val(respuesta[0]);
            $("#conv").val(respuesta[1]);
            $("#emp").val(respuesta[2]);
            $("#nom").val(respuesta[3]);

            $("#fec_rec").val(respuesta[4]);
            $("#num_rad").val(respuesta[5]);
            $("#fec_rad").val(respuesta[6]);
           
            $("#duracion").val(respuesta[8]);
            $("#tip_pro").val(respuesta[7]);
            $("#val_pro").val(respuesta[18]);
            $("#val_fin").val(respuesta[19]);
            $("#val_tot_con").val(respuesta[20]);
            $("#val_con_din").val(respuesta[21]);
            $("#val_con_esp").val(respuesta[22]);
            $("#uti_net").val(respuesta[23]);
            $("#act_corr").val(respuesta[24]);
            $("#pas_corr").val(respuesta[25]);
            $("#pas_tot").val(respuesta[26]);
            $("#act_tot").val(respuesta[27]);
            $("#pas_lar_pla").val(respuesta[28]);
            $("#pas_cor_pla").val(respuesta[29]);
            $("#EBITDA").val(respuesta[30]);
            $("#infpro").html($("#idProoo").val() + " - " + $("#nom").val());
            $("#infpro2").html("proyecto " + $("#idProoo").val() + " - " + $("#nom").val());
            $("#infpro3").html("proyecto " + $("#idProoo").val() + " - " + $("#nom").val());
            $("#infpro4").html("proyecto " + $("#idProoo").val() + " - " + $("#nom").val());
            $("#infpro5").html("proyecto " + $("#idProoo").val() + " - " + $("#nom").val());
            $("#infpro6").html("proyecto " + $("#idProoo").val() + " - " + $("#nom").val());
            $("#infpro7").html("proyecto " + $("#idProoo").val() + " - " + $("#nom").val());

            moneda("val_pro");
            moneda("val_fin");
            moneda("val_tot_con");
            moneda("val_con_din");
            moneda("val_con_esp");
            moneda("uti_net");
            moneda("act_corr");
            moneda("pas_tot");
            moneda("act_tot");
            moneda("pas_lar_pla");
            moneda("pas_cor_pla");
            moneda("EBITDA");
        },
    });
}

function MostrarEmp_evacp(id) {
    $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
    $.ajax({
        type: "POST",
        url: "templates/modules/empresaevausuele.php",
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#cont-convo-fun").html(e);
            CargarDatosEmpcp(id);
        },
    });
}

function CargarDatosEmpcp(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosEmpusu2");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
     
            var respuesta = JSON.parse(e);

            $("#id").val(respuesta[0]);
            $("#nit").val(respuesta[1]);
            $("#raz").val(respuesta[2]);
            $("#act").val(respuesta[3]);
            $("#tam").val(respuesta[4]);
            $("#dep").val(respuesta[5]);
            $("#ciu").val(respuesta[6]);
            $("#dir").val(respuesta[7]);
            $("#cp").val(respuesta[8]);
            $("#tel").val(respuesta[9]);
            $("#ema").val(respuesta[10]);
            $("#ndoc").val(respuesta[11]);
            $("#dcrl").val(respuesta[12]);
            $("#grl").val(respuesta[13]);
            $("#aluc").val(respuesta[14]);
            $("#rep").val(respuesta[15]);
            $("#num_ver").val(respuesta[16]);
            $("#fec_cons").val(respuesta[17]);
            $("#car_con").val(respuesta[18]);
            $("#tel_con").val(respuesta[19]);
        },
    });
}

var notificaciones;
function vernotifis() {
    //barralateral2()
    $("#notific").css("display", "none");
    $("#mtitle").html("<i class='fas fa-bell'></i> Notificaciones");
    $("#mbody").html(notificaciones);
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#myModal").modal();
    barralateral2();
    ResetVisto();
}

function BuscarNotificaciones() {
    var sendform = new FormData();
    sendform.append("f", "BuscarNotificaciones");

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            notificaciones = respuesta[0];
            if (respuesta[1] > 0) {
                $("#notific").html(respuesta[1]);
                $("#notific").css("display", "block");
            }

            if (parseInt(respuesta[2]) > 0) {
                $("#sona").html("<audio controls autoplay style='display:none;'><source src='templates/assets/Alerta.mp3' type='audio/mpeg'></audio>");
                setTimeout("ResetSonidos()",5000);
            }
        },
    });

    setTimeout("BuscarNotificaciones()", 40000);
}

function ResetSonidos() {
    var sendform = new FormData();
    sendform.append("f", "ResetSonidos");

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#sona").html("");
        },
    });
}
function ResetVisto() {
    var sendform = new FormData();
    sendform.append("f", "ResetVisto");

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {},
    });
}

function CargarModalpunadc() {
    $.ajax({
        type: "POST",
        url: "templates/modules/cri_via_pun_adc.php",
        data: {},
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            $("#mtitle").html("<b>Puntaje Adicional</b>");
            $("#mbody").html(e);
            $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
            $("#myModal").modal();
            barralateral2();
        },
    });
}
// cargar proyectos para asignar
function CargarProasig() {
    var sendform = new FormData();
    sendform.append("f", "CargarProasig");
    sendform.append("conv", $("#conv").val());
    sendform.append("tipo", $("#fase").val());
    convovca = $("#conv").val();
    fase = $("#fase").val();
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            ProCargarasig = e;
            $("#mtitle2").html("Buscar Proyecto");
            $("#mbody2").html(ProCargarasig);
            $("#mfooter2").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal3()'>X</button>");
            $("#myModal2").modal();
        },
    });
}
// cargar proyectos para asignar
function CargarProasigJur() {
    var sendform = new FormData();
    sendform.append("f", "CargarProasigJur");
    sendform.append("conv", $("#conv").val());
    sendform.append("tipo", $("#fase").val());
    convovca = $("#conv").val();
    fase = $("#fase").val();
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            ProCargarasig = e;
            $("#mtitle2").html("Buscar Proyecto");
            $("#mbody2").html(ProCargarasig);
            $("#mfooter2").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal3()'>X</button>");
            $("#myModal2").modal();
        },
    });
}
// seleccionar proyecto
function SeleProAsig(id) {
    $("#pro").val(id);
    CloseModal3();
}

var convovca2;
var EmpPro = "";
// cargar empresas 
function CargarEmpPro() {
    var sendform = new FormData();
    sendform.append("f", "CargarEmpPro");
    sendform.append("conv", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
          
            $("#mtitle2").html("Buscar Empresa");
            $("#mbody2").html(e);
            $("#mfooter2").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal3()'>X</button>");
            $("#myModal2").modal();
        },
    });
}
function CargarEmpProDP() {
    var sendform = new FormData();
    $("#mbody2").html("");
    sendform.append("f", "CargarEmpProDP");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
          
            $("#mtitle2").html("Buscar Empresa");
            $("#mbody2").html(e);
            $("#mfooter2").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal3()'>X</button>");
            $("#myModal2").modal();
        },
    });
}
function CargarProSIGP() {
    var sendform = new FormData();
    sendform.append("f", "CargarProSIGP");
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller2.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
          
            $("#mtitle").html("Buscar proyecto");
            $("#mbody").html(e);
            $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
            $("#myModal").modal();
            barralateral2()
        },
    });
}

function CargarCenFor_fil() {
    var sendform = new FormData();
    sendform.append("f", "CargarCenFor_fil");
    sendform.append("conv", $("#conv").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
          
            $("#mtitle2").html("Buscar Centro de formación");
            $("#mbody2").html(e);
            $("#mfooter2").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal3()'>X</button>");
            $("#myModal2").modal();
        },
    });
}
// actibvidades economicas
function CargarActEco() {
    var sendform = new FormData();
    sendform.append("f", "CargarAct_eco");
    sendform.append("conv", $("#conv").val());

    convovca2 = $("#conv").val();

    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            EmpPro = e;
            $("#mtitle2").html("Buscar Actividad económica");
            $("#mbody2").html(EmpPro);
            $("#mfooter2").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal3()'>X</button>");
            $("#myModal2").modal();
        },
    });
}
// seleccionar actividad economica
function SeleActEmp(id) {
    $("#act").val(id);
    CloseModal3();
}
// mayuscula
function Maius() {
    var ma = $("#nom").val();
    $("#nom").val("" + ma.toUpperCase());
}
// mayuscula
function Maius2() {
    var ma = $("#raz").val();
    $("#raz").val("" + ma.toUpperCase());
}
// seleccionar empresa
function SeleEmpPro(id) {
    $("#emp").val(id);
    CloseModal3();
}
function SeleEmpProDP(id) {
   
    $("#sel-emp-der").val(id);
    
    CloseModal3();
   
}

function SeleProsigp(id) {
    $("#sigp-code").val(id);
    CloseModal();
     BuscarempresaSIGP();
}
function SeleCenFor(id) {
    $("#cen_for").val(id);
    CloseModal3();
}
// mayusculas
function Maius() {
    var ma = $("#nom").val();
    $("#nom").val("" + ma.toUpperCase());
}
// datos de empresa
function CargarDatosEmpresaupd(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosEmpresaupd");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#id").val(respuesta[0]);
            $("#nit").val(respuesta[1]);
            $("#raz").val(respuesta[2]);
            $("#act").val(respuesta[3]);
            $("#tam").val(respuesta[4]);
            $("#dep").val(respuesta[5]);
            $("#ciu").val(respuesta[6]);
            $("#dir").val(respuesta[7]);
            $("#cp").val(respuesta[8]);
            $("#tel").val(respuesta[9]);
            $("#ema").val(respuesta[10]);
            $("#ndoc").val(respuesta[11]);
            $("#dcrl").val(respuesta[12]);
            $("#grl").val(respuesta[13]);
            $("#aluc").val(respuesta[14]);
            $("#rep").val(respuesta[15]);
            $("#tel_con").val(respuesta[16]);
            $("#car_con").val(respuesta[17]);
            $("#num_ver").val(respuesta[18]);
            $("#fec_cons").val(respuesta[19]);
        },
    });
}
// datos de criterios elegibilidad
function CargarDatosCrieleupd(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosCrieleupd");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#cod").val(respuesta[0]);
            $("#conv").val(respuesta[1]);
            $("#tipo").val(respuesta[2]);
            $("#req").val(respuesta[3]);
            $("#ayu").val(respuesta[4]);
        },
    });
}
// datos de causales
function CargarDatosCausaupd(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosCausaupd");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#cod").val(respuesta[0]);
            $("#conv").val(respuesta[1]);
            $("#causa").val(respuesta[2]);
            $("#ayu").val(respuesta[3]);
        },
    });
}
// datos de criterios adicionales
function CargarDatosCriviaupd(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosCriviaupd");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#cod").val(respuesta[0]);
            $("#conv").val(respuesta[1]);
            $("#tipo").val(respuesta[2]);
            $("#req").val(respuesta[3]);
            $("#pun").val(respuesta[4]);
            $("#ayu").val(respuesta[5]);
        },
    });
}
// cargar datos criterios adicional
function CargarDatosCriviaAdiupd(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosCriviaAdiupd");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            var respuesta = JSON.parse(e);

            $("#codadc").val(respuesta[0]);
            $("#convadc").val(respuesta[1]);
            $("#tipoadc").val(respuesta[2]);
            $("#reqadc").val(respuesta[3]);
            $("#punadc").val(respuesta[4]);
            $("#ayuadc").val(respuesta[5]);
        },
    });
}
//  boton de ayuda vistas
function verhelp(user) {
    var datamodal =
        "<div class='row'><div class='col-md-6 heigthdivs' ><b>Correo soporte : </b></div><div class='col-md-6 heigthdivs'>soporte@neo.cpcoriente.org</div><div class='col-md-6 heigthdivs'><b>Celular - whatsapp : </b></div><div class='col-md-6 heigthdivs'>3222245162</div>";
    if (user == "use_tec") {
        datamodal += "<div class='col-md-6 heigthdivs'><b>Manual de usuario : </b></div><div class='col-md-6 heigthdivs'><a href=\"fl-s/ans/Manual_Gestor_Tecnico_NeoSoft.pdf\" target='_blank'>Ver</a></div></div>";
    } else if (user == "use_eval_via") {
        datamodal += "<div class='col-md-6 heigthdivs'><b>Manual de usuario : </b></div><div class='col-md-6 heigthdivs'><a href=\"fl-s/ans/Manual_Evaluador_Via_NeoSoft.pdf\" target='_blank'>Ver</a></div></div>";
    } else if (user == "use_eval_ele") {
        datamodal += "<div class='col-md-6 heigthdivs'><b>Manual de usuario : </b></div><div class='col-md-6 heigthdivs'><a href=\"fl-s/ans/Manual_Evaluador_Ele_NeoSoft.pdf\" target='_blank'>Ver</a></div></div>";
    } else if (user == "use_cp") {
        datamodal += "<div class='col-md-6 heigthdivs'><b>Manual de usuario : </b></div><div class='col-md-6 heigthdivs'><a href=\"fl-s/ans/Manual_ColombiaPro_NeoSoft.pdf\" target='_blank'>Ver</a></div></div>";
    } 
    else if (user == "use_sn") {
        datamodal += "<div class='col-md-6 heigthdivs'><b>Manual de usuario : </b></div><div class='col-md-6 heigthdivs'><a href=\"fl-s/ans/Manual_SENA_NeoSoft.pdf\" target='_blank'>Ver</a></div></div>";
    } 
    
    else {
        datamodal += "<div class='col-md-6 heigthdivs'><b>Manual de usuario : </b></div><div class='col-md-6 heigthdivs'><a href=\"fl-s/ans/Manual_AuxTec_NeoSoft.pdf\" target='_blank'>Ver</a></div></div>";
    }
    $("#mtitle2").html("Ayuda");
    $("#mbody2").html(datamodal);
    $("#mfooter2").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal3()'>X</button>");
    $("#myModal2").modal();
}
let timeout;
let timeout2;
function GuardarAldejardEscJur(pro, id, fila, criterio) {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        if ($("#check_si_" + fila).is(":checked")) {
            calificarElegibilidadUserJur(pro, id, fila, criterio, "Cumple");
        } else  if ($("#check_noa_" + fila).is(":checked")) {
            calificarElegibilidadUserJur(pro, id, fila, criterio, "No aplica");
        }
        else{
             calificarElegibilidadUserJur(pro, id, fila, criterio, "No cumple"); 
        }

        clearTimeout(timeout);
    }, 1500);
}
function GuardarAldejardEsc(pro, id, fila, criterio) {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        if ($("#check_si_" + fila).is(":checked")) {
            calificarElegibilidadUser(pro, id, fila, criterio, "Cumple");
        } else  if ($("#check_noa_" + fila).is(":checked")) {
            calificarElegibilidadUser(pro, id, fila, criterio, "No aplica");
        }
        else{
             calificarElegibilidadUser(pro, id, fila, criterio, "No cumple"); 
        }

        clearTimeout(timeout);
    }, 1500);
}

function GuardarAldejardEsc2(pro, id, fila, criterio) {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
            calificarViabilidadUser(pro, id, fila, criterio);

        clearTimeout(timeout);
    }, 1000);
}
function GuardarAldejardEsc22(pro, id, fila, criterio) {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
            calificarViabilidadUseradc(pro, id, fila, criterio);

        clearTimeout(timeout);
    }, 1000);
}

TableFilter = function(id, value){

		

        var rows = document.querySelectorAll(id + ' tbody tr');

    

        for(var i = 0; i < rows.length; i++){

            var showRow = false;

            

            var row = rows[i];

            row.style.display = 'none';

            

            for(var x = 0; x < row.childElementCount; x++){

                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){

                    showRow = true;

                    break;

                }

            }

          

            if(showRow){

                row.style.display = null;

            }

        }

    }

function SecurityRobot(){
    //alert("SecurityRobot()")
var cookie=document.cookie.match(/^(.*;)?\s*user_code\s*=\s*[^;]+(.*)?$/);
if(cookie==null){
location.reload();
}
setTimeout("SecurityRobot()", 60000);
}    



function UndoProyectVia(cod,fila){
      var Nompro = document.getElementById("tlproevavia").rows[fila].cells[12].innerText;
  if(confirm("¿Esta seguro que desea restablecer el proyecto "+Nompro+" a estado : en proceso de evaluación?")){
  var sendform = new FormData();
    sendform.append("f", "UndoProyectVia");
    sendform.append("cod", cod);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           alert(e)
          if (String(e).indexOf("exitosa") != -1) {
               eval_pro_via($('#eval_pro_via'))     
                    }
        },
    });  
  }
}

function UndoProyectEle(cod,fila){
      var Nompro = document.getElementById("tlproevaele").rows[fila].cells[11].innerText;
 if(confirm("¿Esta seguro que desea restablecer el proyecto "+Nompro+" a estado : en proceso de evaluación?")){
     var sendform = new FormData();
    sendform.append("f", "UndoProyectEle");
    sendform.append("cod", cod);
    
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            alert(e)
          if (String(e).indexOf("exitosa") != -1) {
                   eval_pro_ele($('#eval_pro_ele')) 
                    }
        },
    });
 }  
}

function AdicionarDiasProyectEle(cod,fila){
     var Nompro = document.getElementById("tlproevaele").rows[fila].cells[11].innerText;
   $("#mtitle2").html("<b>"+Nompro+"</b>");
    $("#mbody2").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter2").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal2()'>X</button>");
    $("#myModal2").modal();
  var sendform = new FormData();
    sendform.append("f", "AdicionarDiasProyectEle");
    sendform.append("cod", cod);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
    $("#mbody2").html(e+"<br><br><b>Días adicionales que desea agregar al proyecto </b><input type='number' id='agregarinput"+fila+"' class='form-control'><br><button class='btn btn-primary' onclick=\"AgregarDiasEle("+cod+","+fila+")\">Agregar</button>");
        },
    });  
  
}

function AdicionarDiasProyectVia(cod,fila){
      var Nompro = document.getElementById("tlproevavia").rows[fila].cells[12].innerText;
    $("#mtitle2").html("<b>"+Nompro+"</b> ");
    $("#mbody2").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter2").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal2()'>X</button>");
    $("#myModal2").modal();
     var sendform = new FormData();
    sendform.append("f", "AdicionarDiasProyectVia");
    sendform.append("cod", cod);
    
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
   $("#mbody2").html(e+"<br><br><b>Días adicionales que desea agregar al proyecto </b><input type='number' id='agregarinput"+fila+"' class='form-control'><br><button class='btn btn-primary' onclick=\"AgregarDiasVia("+cod+","+fila+")\">Agregar</button>");
        },
    });
  
}



function AgregarDiasVia(cod,fila){
     if($("#agregarinput"+fila).val()=="")
      {
         alert("Digite el número de días a adicionar") 
      }
      else{ 
  var sendform = new FormData();
    sendform.append("f", "AgregarDiasVia");
    sendform.append("cod", cod);
    sendform.append("dias", $("#agregarinput"+fila).val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           alert(e)
          if (String(e).indexOf("realizada") != -1) {
               eval_pro_via($('#eval_pro_via'))     
                    }
       CloseModal2()           
        },
    });  
      } 
}

function AgregarDiasEle(cod,fila){
      if($("#agregarinput"+fila).val()=="")
      {
         alert("Digite el número de días a adicionar") 
      }
      else{
     var sendform = new FormData();
    sendform.append("f", "AgregarDiasEle");
    sendform.append("cod", cod);
    sendform.append("dias", $("#agregarinput"+fila).val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            alert(e)
          if (String(e).indexOf("realizada") != -1) {
                   eval_pro_ele($('#eval_pro_ele')) 
                    }
             CloseModal2()
        },
    });
      }
}

function ObservacionesEvaluacion(id,fila){
  var pro = document.getElementById("tlproevaele").rows[fila].cells[11].innerText;
   var id_proy=document.getElementById("tlproevaele").rows[fila].cells[0].innerHTML
  var empresa=document.getElementById("tlproevaele").rows[fila].cells[3].innerHTML
 
   $("#mtitle").html("<b>OBSERVACIONES DE EVALUACIÓN DE ELEGIBILIDAD</b> ");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#myModal").modal();
    barralateral2()
  var sendform = new FormData();
    sendform.append("f", "ObservacionesEvaluacion");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           
    $("#mbody").html("<div  class='col-md-2' style='margin-bottom:10px;' ><b>id proyecto :</b></div> <div class='col-md-1' style='margin-bottom:10px;' >"+id_proy+"</div><div  class='col-md-2' style='margin-bottom:10px;' ><b>Empresa :</b></div> <div class='col-md-7' style='margin-bottom:10px;' >"+empresa+"</div><div  class='col-md-1'  ><b>Título  :</b></div><div class='col-md-11'  >"+pro+"</div><div class='col-md-12' style='padding:10px;box-sizing:border-box;'><b>Observación </b><input type='hidden' id='id_observacion' value=''></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;'><textarea  id='agregarObsPro' class='form-control' onfocus=\"$('#response_obs').html('')\"></textarea></div><div id='response_obs' style='color:red;'></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;text-align:center;'><button id='btnObsPro1' class='btn btn-primary' onclick=\"AgregarObservacionPro("+id+",'ele')\">Agregar</button><button id='btnObsPro2' class='btn btn-primary' onclick=\"EditarObservacionPro("+id+")\">Editar</button></div>"+e);
       
        $("#btnObsPro2").css("display","none")
        },
    });  
     
    
}

function ObservacionesEvaluacion2(id){
  
    $("#bd-list-obs").html("<tr><td colspan='5'><div class='spinner-border text-dark'></div></td></tr>");
  var sendform = new FormData();
    sendform.append("f", "ObservacionesEvaluacion2");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           
    $("#bd-list-obs").html(e);
       
       
        },
    });  
     
    
}
function ObservacionesEvaluacionV2(id){
  
    $("#bd-list-obs").html("<tr><td colspan='5'><div class='spinner-border text-dark'></div></td></tr>");
  var sendform = new FormData();
    sendform.append("f", "ObservacionesEvaluacionV2");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           
    $("#bd-list-obs").html(e);
       
       
        },
    });  
     
    
}
function ObservacionesEvaluacionV(id,fila){
  var Nompro = document.getElementById("tlproevavia").rows[fila].cells[12].innerText;
   var id_proy=document.getElementById("tlproevavia").rows[fila].cells[0].innerHTML
  var empresa=document.getElementById("tlproevavia").rows[fila].cells[3].innerHTML
  
   $("#mtitle").html("<b>OBSERVACIONES DE EVALUACION DE VIABILIDAD</b>");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#myModal").modal();
    barralateral2()
  var sendform = new FormData();
    sendform.append("f", "ObservacionesEvaluacionV");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
    
     $("#mbody").html("<div  class='col-md-2' style='margin-bottom:10px;' ><b>id proyecto :</b></div> <div class='col-md-1' style='margin-bottom:10px;' >"+id_proy+"</div><div  class='col-md-2' style='margin-bottom:10px;' ><b>Empresa :</b></div> <div class='col-md-7' style='margin-bottom:10px;' >"+empresa+"</div><div  class='col-md-1'  ><b>Título  :</b></div><div class='col-md-11'  >"+Nompro+"</div><div class='col-md-12' style='padding:10px;box-sizing:border-box;'><b>Observación </b><input type='hidden' id='id_observacion' value=''></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;'><textarea  id='agregarObsPro' class='form-control' onfocus=\"$('#response_obs').html('')\" ></textarea><div id='response_obs' style='color:red;'></div></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;text-align:center;'><button id='btnObsPro1' class='btn btn-primary' onclick=\"AgregarObservacionPro("+id+",'via')\">Agregar</button><button id='btnObsPro2' class='btn btn-primary' onclick=\"EditarObservacionPro("+id+")\">Editar</button></div>"+e);
      
       $("#btnObsPro2").css("display","none")
       },
    });  
     
    
}


function ObservacionesEvaluacionCP(id,fila){
  var pro = document.getElementById("tlproevaeleusu").rows[fila].cells[10].innerText;
   var id_proy=document.getElementById("tlproevaeleusu").rows[fila].cells[0].innerHTML
  var empresa=document.getElementById("tlproevaeleusu").rows[fila].cells[3].innerHTML
 
   $("#mtitle").html("<b>OBSERVACIONES DE EVALUACION DE ELEGIBILIDAD</b> ");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#myModal").modal();
    barralateral2()
  var sendform = new FormData();
    sendform.append("f", "ObservacionesEvaluacion");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
   
    $("#mbody").html("<div  class='col-md-2' style='margin-bottom:10px;' ><b>id proyecto :</b></div> <div class='col-md-1' style='margin-bottom:10px;' >"+id_proy+"</div><div  class='col-md-2' style='margin-bottom:10px;' ><b>Empresa :</b></div> <div class='col-md-7' style='margin-bottom:10px;' >"+empresa+"</div><div  class='col-md-1'  ><b>Título  :</b></div><div class='col-md-11'  >"+pro+"</div><div class='col-md-12' style='padding:10px;box-sizing:border-box;'><b>Observación </b><input type='hidden' id='id_observacion' value=''></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;'><textarea  id='agregarObsPro' class='form-control' onfocus=\"$('#response_obs').html('')\"></textarea><div id='response_obs' style='color:red;'></div></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;text-align:center;'><button id='btnObsPro1' class='btn btn-primary' onclick=\"AgregarObservacionPro("+id+",'ele')\">Agregar</button><button id='btnObsPro2' class='btn btn-primary' onclick=\"EditarObservacionPro("+id+")\">Editar</button></div>"+e);
        $("#btnObsPro2").css("display","none")
        },
    });  
     
    
}
function ObservacionesEvaluacionCPV(id,fila){
  var Nompro = document.getElementById("tlproevaviacp").rows[fila].cells[11].innerText;
  var id_proy=document.getElementById("tlproevaviacp").rows[fila].cells[0].innerHTML
  var empresa=document.getElementById("tlproevaviacp").rows[fila].cells[3].innerHTML
   $("#mtitle").html("<b>OBSERVACIONES DE EVALUACION DE VIABILIDAD</b>");
    $("#mbody").html("<div class='spinner-border text-dark'></div>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#myModal").modal();
    barralateral2()
  var sendform = new FormData();
    sendform.append("f", "ObservacionesEvaluacionV");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         
     $("#mbody").html("<div  class='col-md-2' style='margin-bottom:10px;' ><b>id proyecto :</b></div> <div class='col-md-1' style='margin-bottom:10px;' >"+id_proy+"</div><div  class='col-md-2' style='margin-bottom:10px;' ><b>Empresa :</b></div> <div class='col-md-7' style='margin-bottom:10px;' >"+empresa+"</div><div  class='col-md-1'  ><b>Título  :</b></div><div class='col-md-11'  >"+Nompro+"</div><div class='col-md-12' style='padding:10px;box-sizing:border-box;'><b>Observación </b><input type='hidden' id='id_observacion' value=''></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;'><textarea  id='agregarObsPro' class='form-control' onfocus=\"$('#response_obs').html('')\"></textarea><div id='response_obs' style='color:red;'></div></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;text-align:center;'><button id='btnObsPro1' class='btn btn-primary' onclick=\"AgregarObservacionPro("+id+",'via')\">Agregar</button><button id='btnObsPro2' class='btn btn-primary' onclick=\"EditarObservacionPro("+id+")\">Editar</button></div>"+e);
       $("#btnObsPro2").css("display","none")   
        },
    });  
     
    
}

function AgregarObservacionPro(id,fase){
  
  if($("#agregarObsPro").val()=="")
  {
      $("#response_obs").html("Digite la observación")
  }
  else{
      $("#response_obs").html("<div class='spinner-border text-dark'></div>")
  var sendform = new FormData();
    sendform.append("f", "AgregarObservacionPro");
    sendform.append("id", id);
     sendform.append("fase", fase);
    sendform.append("obs", $("#agregarObsPro").val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           
          $("#response_obs").html(e)
           if (String(e).indexOf("agregada") != -1) {
               if(fase=="ele"){
               ObservacionesEvaluacion2(id)    }
               else{
               ObservacionesEvaluacionV2(id)    
               }
                $("#response_obs").html("")
               $("#agregarObsPro").val("")
                    }
     
        },
    });    
  }
}

function editarObservacion(id,fila,fase,pro){
 //alert(fase)
      $("#loadingobs"+fila).html("<div class='spinner-border text-dark'></div>")
  var sendform = new FormData();
    sendform.append("f", "editarObservacion");
    sendform.append("id", id);
    sendform.append("obs", $("#agregarObsPro"+fila).val());
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         alert(e)
           if (String(e).indexOf("actualizada") != -1) {
               if(fase=="ele"){
               ObservacionesEvaluacion2(pro)    }
               else{
               ObservacionesEvaluacionV2(pro)    
               }
              
                    }
     
        },
    });    
   
    
    
}
function DelObservacion(id,fila,fase,pro){
   
    if(confirm("¿ Está seguro que desea eliminar la observación?")){
    $("#loadingobs"+fila).html("<div class='spinner-border text-dark'></div>")
  var sendform = new FormData();
    sendform.append("f", "DelObservacion");
    sendform.append("id", id);
 
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         alert(e)
           if (String(e).indexOf("eliminada") != -1) {
               if(fase=="ele"){
               ObservacionesEvaluacion2(pro)    }
               else{
               ObservacionesEvaluacionV2(pro)    
               }
              
                    }
     
        },
    });    
    }
    
}

function EvaluarCausales(id,fila)
{
    var sendform = new FormData();
     sendform.append("f", "Conflicto_int_ele");
     sendform.append("pro", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         conflicto=String(e)
          if(conflicto.indexOf("sin")!=-1 )
          {
      var respuesta=JSON.parse(e)
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CONFLICTO DE INTERESES</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div style='font-size:18px;'>Yo, "+getCookie("user_name")+" certifico que SI (<input id='input_con1' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">)  &nbsp; NO (<input id='input_con2' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">) tengo conflicto de interés con NIT y razón social : <b>"+document.getElementById("tlproevaeleusu").rows[fila].cells[3].innerText+"</b>  para realizar el proceso de evaluación de elegibilidad del proyecto : <b>"+document.getElementById("tlproevaeleusu").rows[fila].cells[10].innerText+"</b>, postulado para la Convocatoria SENAINNOVA PRODUCTIVIDAD PARA LAS EMPRESAS. Esta constancia se emite el día "+respuesta[1]+"<br><div style='width:100%;text-align:left;margin-top:10px;'><input type='checkbox' id='check_con3' onclick=\"$('#advertenciaCon').html('')\">&nbsp; <a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=fl-s/ans/Formato_F08.pdf' target='_blank'>He leído el formato F08 – NO EXISTENCIA DE CONFLICTO Y CONFIDENCIALIDAD </a></div><div style='width:100%;text-align:center;color:red;margin-top:10px;' id='advertenciaCon'></div><br><div style='width:100%;text-align:center;'><button class=\"btn btn-primary\" onclick=\"RegistrarConflictoEle("+id+",1,"+fila+")\">Aceptar</button></div></div>")  
    $("#myModal").modal(); 
      barralateral2();
     }
          else if(conflicto.indexOf("acu")!=-1 )
          {
   
    var Nompro = document.getElementById("tlproevaeleusu").rows[fila].cells[10].innerText;
    var Nomemp = document.getElementById("tlproevaeleusu").rows[fila].cells[3].innerText;
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CAUSALES DE RECHAZO</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' >"+Nompro +"</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' > "+id+"</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >"+Nomemp+"</div><div class='col-md-12 encabezadoseva' style='margin-top:20px;'><h6>Lista chequeo  </h6></div></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;' id='lccausa' ></div>")  
    $("#myModal").modal(); 
      barralateral2();
   listevaluarcausales(id)
   
    
}

}})
}

function VerCausalesEle(id,fila)
{
    var Nompro = document.getElementById("tlproevaele").rows[fila].cells[11].innerText;
    var Nomemp = document.getElementById("tlproevaele").rows[fila].cells[3].innerText;
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CAUSALES DE RECHAZO</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' >"+Nompro +"</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' > "+id+"</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >"+Nomemp+"</div><div class='col-md-12 encabezadoseva' style='margin-top:20px;'><h6>Lista chequeo  </h6></div></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;' id='lccausa' ></div>")  
    $("#myModal").modal(); 
      barralateral2();
   listevaluarcausales2(id)
   
    
}
function VerCausalesEleCP(id,fila)
{
     var Nompro = document.getElementById("tlproevaeleusu").rows[fila].cells[10].innerText;
    var Nomemp = document.getElementById("tlproevaeleusu").rows[fila].cells[3].innerText;
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CAUSALES DE RECHAZO</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' >"+Nompro +"</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' > "+id+"</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >"+Nomemp+"</div><div class='col-md-12 encabezadoseva' style='margin-top:20px;'><h6>Lista chequeo  </h6></div></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;' id='lccausa' ></div>")  
    $("#myModal").modal(); 
      barralateral2();
   listevaluarcausales2(id)
   
    
}

function VerCausalesVia(id,fila)
{
     var Nompro = document.getElementById("tlproevavia").rows[fila].cells[12].innerText;
    var Nomemp = document.getElementById("tlproevavia").rows[fila].cells[3].innerText;
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CAUSALES DE RECHAZO</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' >"+Nompro +"</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' > "+id+"</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >"+Nomemp+"</div><div class='col-md-12 encabezadoseva' style='margin-top:20px;'><h6>Lista chequeo  </h6></div></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;' id='lccausa' ></div>")  
    $("#myModal").modal(); 
      barralateral2();
   listevaluarcausales2(id)
   
    
}

function VerCausalesViaCP(id,fila)
{
    var Nompro = document.getElementById("tlproevaviacp").rows[fila].cells[11].innerText;
    var Nomemp = document.getElementById("tlproevaviacp").rows[fila].cells[3].innerText;
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CAUSALES DE RECHAZO</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' >"+Nompro +"</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' > "+id+"</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >"+Nomemp+"</div><div class='col-md-12 encabezadoseva' style='margin-top:20px;'><h6>Lista chequeo  </h6></div></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;' id='lccausa' ></div>")  
    $("#myModal").modal(); 
      barralateral2();
   listevaluarcausales2(id)
   
    
}

function EvaluarCausalesVia(id,fila)
{
     var sendform = new FormData();
     sendform.append("f", "Conflicto_int_via");
     sendform.append("pro", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
         conflicto=String(e)
          if(conflicto.indexOf("sin")!=-1 || conflicto.indexOf("sin")!=-1 )
          {
             
      var respuesta=JSON.parse(e)
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CONFLICTO DE INTERESES</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div style='font-size:18px;'>Yo, "+getCookie("user_name")+" certifico que SI (<input id='input_con1' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">) &nbsp;  NO (<input id='input_con2' type='radio' name='radiocon' onclick=\"$('#advertenciaCon').html('')\">) tengo conflicto de interés con la empresa con NIT y razón social : <b>"+document.getElementById("tlproevaviacp").rows[fila].cells[3].innerText+"</b>  para realizar el proceso de evaluación de viabilidad del proyecto : <b>"+document.getElementById("tlproevaviacp").rows[fila].cells[11].innerText+"</b>, postulado para la Convocatoria SENAINNOVA PRODUCTIVIDAD PARA LAS EMPRESAS. Esta constancia se emite el día "+respuesta[1]+"<br><div style='width:100%;text-align:left;margin-top:10px;'><input type='checkbox' id='check_con3' onclick=\"$('#advertenciaCon').html('')\">&nbsp; <a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=fl-s/ans/Formato_F08.pdf' target='_blank'>He leído el formato F08 – NO EXISTENCIA DE CONFLICTO Y CONFIDENCIALIDAD </a></div><div style='width:100%;text-align:center;color:red;margin-top:10px;' id='advertenciaCon'></div><br><div style='width:100%;text-align:center;'><button class=\"btn btn-primary\" onclick=\"RegistrarConflictoVia("+id+","+fila+")\">Aceptar</button></div></div>")  
    $("#myModal").modal(); 
      barralateral2();
    }else if(conflicto.indexOf("acu")!=-1 ){
    
    var Nompro = document.getElementById("tlproevaviacp").rows[fila].cells[11].innerText;
    var Nomemp = document.getElementById("tlproevaviacp").rows[fila].cells[3].innerText;
    $("#mtitle").html("<input type='hidden' id='id_pro' value='" + id + "'><h4 style='text-align:center;color:#FFF;'> CAUSALES DE RECHAZO</h4>");
    $("#mfooter").html("<button type='button' class='btn btn-default' style='background: #0054A6;color:#FFF;' onclick='CloseModal()'>X</button>");
    $("#mbody").html("<div class='row'><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Título proyecto : </b></div><div class='col-md-9' style='padding:10px;box-sizing:border-box;' >"+Nompro +"</div> <div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Identificador :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' > "+id+"</div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' ><b>Empresa :</b></div><div class='col-md-3' style='padding:10px;box-sizing:border-box;' >"+Nomemp+"</div><div class='col-md-12 encabezadoseva' style='margin-top:20px;' ><h6>Lista chequeo  </h6></div></div><div class='col-md-12' style='padding:10px;box-sizing:border-box;' id='lccausa' ></div>")  
    $("#myModal").modal(); 
      barralateral2();
    
 
   listevaluarcausales(id)
    }
}
})
}


function listevaluarcausales(id){
    
     var sendform = new FormData();
    sendform.append("f", "EvaluarCausales");
    sendform.append("id", id);
 
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
       
         $("#lccausa").html(e)
          
     
        },
    });  
    
}
function listevaluarcausales2(id){
     $("#lccausa").html("<div class='spinner-border text-dark'></div>")
     var sendform = new FormData();
    sendform.append("f", "EvaluarCausalesView");
    sendform.append("id", id);
 
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
       
         $("#lccausa").html(e)
          
     
        },
    });  
    
}


function calificarCausalUser(pro, cau, fila, cumple) {
    if ($("#Observacion" + fila).val() == "") {
        clearTimeout(timeout2);
        alert("Digite la observación");
        $("#Observacion" + fila).focus();
    } else {
        var sendform = new FormData();
        sendform.append("f", "calificarCausalUser");
        sendform.append("pro", pro);
        sendform.append("cau", cau);
        sendform.append("cumple", cumple);
        sendform.append("obs", $("#Observacion" + fila).val());
        $.ajax({
            type: "POST",
            url: "phpMVC/Controller/controller.php",
            data: sendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (e) {
             listevaluarcausales(pro) 
            },
        });
    }
}
function GuardarAldejardEscCausal(pro, causa, fila ) {
    clearTimeout(timeout2);
    timeout2 = setTimeout(() => {
        if ($("#check_si_" + fila).is(":checked")) {
            calificarCausalUser(pro, causa, fila, "Cumple");
        } else  if ($("#check_no_" + fila).is(":checked")) {
            calificarCausalUser(pro, causa, fila,  "No cumple");
        }
        else{
             calificarCausalUser(pro, causa, fila,  "No aplica"); 
        }

        clearTimeout(timeout2);
    }, 1500);
}

function nuevoDerecho2(){
 
    if($("#sigp-code").val()==null || $("#sigp-code").val()=="none")
    {
     	alerts_tec("Selecione un proyecto");   
    }
    else if($("#sel-fase").val()==null || $("#sel-fase").val()=="none")
    {
     	alerts_tec("Selecione una fase");   
    }
     else if($("#fec-recibido").val()=="")
    {
     	alerts_tec("Digite la fecha de recibido");   
    }
     else if($("#hora-recibido").val()=="")
    {
     	alerts_tec("Digite la hora de recibido");   
    }
     else 
    {
     	var form_derechos = new FormData();
    
  	    form_derechos.append("p-der-p", 1);
		form_derechos.append("sigp", $("#sigp-code").val())
		form_derechos.append("fase", $("#sel-fase").val())
		form_derechos.append("recibido", $("#fec-recibido").val() + ' ' + $("#hora-recibido").val());
		form_derechos.append("empresa", $("#sel-emp-der").val())
		// form_derechos.append("hora", val_inputs[4])
		form_derechos.append("entregar", $("#fec-limite").val())
		form_derechos.append("medio", $("#med_resp").val())
		form_derechos.append("observacion", $("#resumen-obs").val())
      
        $.ajax({
            type: "POST",
            url: "templates/filters/fil-tec.php",
            data: form_derechos,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (r) {
               
              if(r){
					// Convocatoria Creada
					// Mensaje
					message = "<h6 style='color:#23FFC9' class='mt-4'><i class='fas fa-thumbs-up'></i><br/>El Derecho de Peticion ha sido Creado!!!</h6>";
					alerts_tec(message);
					// ACTIVAR EL TAB
					document.getElementById('def-derp').click();
					return false;
				}else{
					// Error de Peticion
					alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
					//location.reload();
				}
            },
        });   
    
}
    
    
}

function editarDerecho2(){
 
    if($("#sigp-code").val()==null || $("#sigp-code").val()=="none")
    {
     	alerts_tec("Selecione un proyecto");   
    }
    else if($("#sel-fase").val()==null || $("#sel-fase").val()=="none")
    {
     	alerts_tec("Selecione una fase");   
    }
     else if($("#fec-recibido").val()=="")
    {
     	alerts_tec("Digite la fecha de recibido");   
    }
     else if($("#hora-recibido").val()=="")
    {
     	alerts_tec("Digite la hora de recibido");   
    }
     else 
    {
     	var form_derechos = new FormData();
    
  	    form_derechos.append("p-der-pe", 1);
        form_derechos.append("id", $("#id_der").val())
		form_derechos.append("sigp", $("#sigp-code").val())
		form_derechos.append("fase", $("#sel-fase").val())
		form_derechos.append("recibido", $("#fec-recibido").val() + ' ' + $("#hora-recibido").val());
		form_derechos.append("empresa", $("#sel-emp-der").val())
		// form_derechos.append("hora", val_inputs[4])
		form_derechos.append("entregar", $("#fec-limite").val())
		form_derechos.append("medio", $("#med_resp").val())
		form_derechos.append("observacion", $("#resumen-obs").val())
      
        $.ajax({
            type: "POST",
            url: "templates/filters/fil-tec.php",
            data: form_derechos,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {},
            success: function (r) {
             //alert(r)
              if(r){
					// Convocatoria Creada
					// Mensaje
					message = "<h6 style='color:#23FFC9' class='mt-4'><i class='fas fa-thumbs-up'></i><br/>El Derecho de Peticion ha sido Actualizado!!!</h6>";
					alerts_tec(message);
					// ACTIVAR EL TAB
					 document.getElementById('derp-list-derp').click();
					//list_derechos_pet()
					return false;
				}else{
					// Error de Peticion
					alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
					//location.reload();
				}
            },
        });   
    
}
    
    
}

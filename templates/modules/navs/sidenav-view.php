<!-- BARRA DE FUNCIONES DE NODOS -->
<div class="sidenav-view">

	<!-- FUNCIONES: DIGITADOR DE DATOS AUXILIAR -->
	<?php if ($_COOKIE['user_rol'] == "2"): ?>
		<div class="side-btns-cont text-center">
			<!-- USUARIO AUXILIAR:: PROYECTOS -->
			<div class="tabs-side" id="aux-tab-proy" style="display: none">
				<div class="btn-set">
					<button id='btnpro2' onclick="LPro($('#btnpro2'))" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class='fas fa-list-ol'></i></button>
					<div class="toltip-btn">Listado de Proyectos</div>
				</div>
				<div class="btn-set">
					<button id='btnpro' onclick="proyectos($('#btnpro'))" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class='fas fa-plus-circle'></i></button>
					<div class="toltip-btn">Agregar Proyecto</div>
				</div>
			
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LPro($('#btnpro2'))"><i class='fas fa-sync-alt'></i></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- USUARIO AUXILIAR:: EMPRESAS -->
			<div class="tabs-side" id="aux-tab-emp" style="display: none">
				<div class="btn-set">
					<button id='btnemp2' onclick="LEmp2($('#btnemp2'))" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class='fas fa-list-ol'></i></button>
					<div class="toltip-btn">Listado de Empresas</div>
				</div>
				<div class="btn-set">
					<button id='btnemp' onclick="empresas($('#btnemp'))" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class='fas fa-plus-circle'></i></button>
					<div class="toltip-btn">Agregar Empresa</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LEmp2($('#btnemp2'))"><i class="fas fa-sync-alt"></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- BOTON UP ACOPLE DE BARRA -->
			<button class="btn-side-view" id="btn-side-on"><i class="fas fa-chevron-circle-down"></i></button>
		</div>
	<?php endif ?>
	<!-- FUNCIONES: EVALUADOR ELEGIBILIDAD -->
	<?php if ($_COOKIE['user_rol'] == "3"): ?>
		<div class="side-btns-cont text-center">
			<!-- USUARIO EVALUADOR:: EVALUACION -->
			<div class="tabs-side" id="ele-tab-eva" style="display: none">
				<div class="btn-set">
					<button id='eval_pro_ele' onclick="eval_pro_ele2($('#eval_pro_ele'))" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: CONVOCATORIAS -->
			<div class="tabs-side" id="viab-tab-convo" style="display: none">
				<div class="btn-set">
					<button id="btn1" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="ListadoConvocatorias(1)"><i class="fas fa-list-ol"></i></button>
					<div class="toltip-btn">Listado</div>
				</div>
				<div class="btn-set">
					<button id="btn2" onclick="ListadoConvocatorias(2)" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-hand-point-up"></i></button>
					<div class="toltip-btn">Vigentes</div>
				</div>
				<div class="btn-set">
					<button id="btn3" onclick="ListadoConvocatorias(3)" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="cri_via($('#cri_via'))"><i class="fa fa-thumbs-up"></i></button>
					<div class="toltip-btn">Finalizadas</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: CONFLICTOS -->
			<div class="tabs-side" id="ele-tab-conf" style="display: none">
				<div class="btn-set">
					<button id='btnpro2' onclick="LConflicEleUsu($('#btnpro2'))" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: USUARIO -->
			<div class="tabs-side" id="ele-tab-user" style="display: none">
				<div class="btn-set">
					<button id="btn_config" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="user_eva_edit_2($('#btn_config'))" ><i class="fas fa-user-cog"></i></button>
					<div class="toltip-btn">Actulizar Listado</div>
				</div>
			</div>
			<!-- BOTON UP ACOPLE DE BARRA -->
			<button class="btn-side-view" id="btn-side-on"><i class="fas fa-chevron-circle-down"></i></button>
		</div>
	<?php endif ?>
	<!-- FUNCIONES: EVALUADOR VIABILIDAD -->
	<?php if ($_COOKIE['user_rol'] == "4"): ?>
		<div class="side-btns-cont text-center">
			<!-- USUARIO EVALUADOR:: EVALUACION -->
			<div class="tabs-side" id="viab-tab-eva" style="display: none">
				<div class="btn-set">
					<button id='eval_pro_via' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="eval_pro_via2($('#eval_pro_via'))"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Viabilidad</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: CONVOCATORIAS -->
			<div class="tabs-side" id="viab-tab-convo" style="display: none">
				<div class="btn-set">
					<button id="btn1" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="ListadoConvocatorias(1)"><i class="fas fa-list-ol"></i></button>
					<div class="toltip-btn">Listado</div>
				</div>
				<div class="btn-set">
					<button id="btn2" onclick="ListadoConvocatorias(2)" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-hand-point-up"></i></button>
					<div class="toltip-btn">Vigentes</div>
				</div>
				<div class="btn-set">
					<button id="btn3" onclick="ListadoConvocatorias(3)" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="cri_via($('#cri_via'))"><i class="fa fa-thumbs-up"></i></button>
					<div class="toltip-btn">Finalizadas</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: CONFLICTOS -->
			<div class="tabs-side" id="viab-tab-conf" style="display: none">
				<div class="btn-set">
					<button id='btnpro' onclick="LConflicViaUsu($('#btnpro'))" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class='fas fas fa-thumbs-up'></i></button>
					<div class="toltip-btn">Viabilidad</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: USUARIO -->
			<div class="tabs-side" id="viab-tab-user" style="display: none">
				<div class="btn-set">
					<button id="btn_config" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="user_eva_edit($('#btn_sub'))" ><i class="fas fa-user-cog"></i></button>
					<div class="toltip-btn">Actulizar Listado</div>
				</div>
			</div>
			<!-- BOTON UP ACOPLE DE BARRA -->
			<button class="btn-side-view" id="btn-side-on"><i class="fas fa-chevron-circle-down"></i></button>
		</div>
	<?php endif ?>
	<!-- FUNCIONES: USUARIO TECNICO -->
	<?php if ($_COOKIE['user_rol'] == "5"): ?>
		<div class="side-btns-cont text-center">
			<!-- USUARIO TECNICO:: PANEL -->
			<div class="tabs-side" id="tec-tab-panel" style="display: none;">
				<div class="btn-set">
					<button class="btn-side-view" id="tec-btnf-panel" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-chart-line"></i></button>
					<div class="toltip-btn">Analítica</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-file-csv"></i></button>
					<div class="toltip-btn" id="tec-btnf-gcon">Generador de Consultas</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-sms"></i></button>
					<div class="toltip-btn" id="tec-btnf-chat">Chat</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: CONVOCATORIAS -->
			<div class="tabs-side" id="tec-tab-convo" style="display: none">
				<div class="btn-set">
					<button id="deft-conv" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="convo_fun(1, this)"><i class="fas fa-plus"></i></button>
					<div class="toltip-btn">Crear</div>
				</div>
				<div class="btn-set">
					<button id="btnlist" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="convo_fun(3, this)"><i class="fas fa-list-ol"></i></button>
					<div class="toltip-btn">Listado</div>
				</div>
				<div class="btn-set">
					<button id="cri_ele" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="cri_ele($('#cri_ele'))"><i class="fas fa-check-square"></i></button>
					<div class="toltip-btn">Requisitos Elegibilidad</div>
				</div>
				<div class="btn-set">
					<button id="cri_via" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="cri_via($('#cri_via'))"><i class="fa fa-thumbs-up"></i></button>
					<div class="toltip-btn">Requsitos Viabilidad</div>
				</div>
				<div class="btn-set">
					<button id="causa_rec" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="causales($('#causa_rec'))"><i class="fas fa-thumbs-down"></i></button>
					<div class="toltip-btn">Causales de Rechazo</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: PERSONAL -->
			<div class="tabs-side" id="tec-tab-per" style="display: none">
				<div class="btn-set">
					<button id="deft-person" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="personal_fun(1, this)"><i class="fas fa-plus"></i></button>
					<div class="toltip-btn">Crear</div>
				</div>
				<div class="btn-set">
					<button id="lstper" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="personal_fun(2, this)"><i class="fas fa-list-ol"></i></button>
					<div class="toltip-btn">Listado</div>
				</div>	
			</div>
			<!-- USUARIO TECNICO:: PROYECTOS -->
			<div class="tabs-side" id="tec-tab-proy" style="display: none">
				<div class="btn-set">
					<button id='btnpro2' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LPro($('#btnpro2'))"><i class='fas fa-list-ol'></i></button>
					<div class="toltip-btn">Listado de Proyectos</div>
				</div>
				<div class="btn-set">
					<button id='btnpro' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="proyectos($('#btnpro'))"><i class='fas fa-plus-circle'></i></button>
					<div class="toltip-btn">Agregar Proyecto</div>
				</div>
				<div class="btn-set">
					<button id='btnproreg' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LProReg($('#btnproreg'))"><i class='fas fa-history'></i></button>
					<div class="toltip-btn">Historial Registro</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="window.open('templates/modules/ExcelEB.php')" ><i class='fas fa-file-excel'></i></button>
					<div class="toltip-btn">Entidades Beneficiarias</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="window.open('templates/modules/ExcelProyectos.php')" ><i class='fas fa-file-csv'></i></i></button>
					<div class="toltip-btn">Descargar Excel</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LPro($('#btnpro2'))"><i class='fas fa-sync-alt'></i></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: EMPRESAS -->
			<div class="tabs-side" id="tec-tab-emp" style="display: none">
				<div class="btn-set">
					<button id='btnemp2' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LEmp($('#btnemp2'))"><i class='fas fa-list-ol'></i></button>
					<div class="toltip-btn">Listado de Empresas</div>
				</div>
				<div class="btn-set">
					<button id='btnemp' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="empresas($('#btnemp'))"><i class='fas fa-plus-circle'></i></button>
					<div class="toltip-btn">Agregar Empresa</div>
				</div>
				<div class="btn-set">
					<button id='btnempreg' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="empresasReg($('#btnempreg'))"><i class='fas fa-history'></i></button>
					<div class="toltip-btn">Historial de Registros</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="window.open('templates/modules/ExcelEmpresas.php')"><i class="fa fa-file-excel"></i></button>
					<div class="toltip-btn">Descargar Excel</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LEmp($('#btnemp2'))"><i class="fas fa-sync-alt"></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: EVALUACION -->
			<div class="tabs-side" id="tec-tab-eva" style="display: none">
				<div class="btn-set">
					<button id='eval_pro_ele' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="eval_pro_ele($('#eval_pro_ele'))"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" id='eval_pro_via' onclick="eval_pro_via($('#eval_pro_via'))"><i class='fa fa-thumbs-up'></i></button>
					<div class="toltip-btn">Viabilidad</div>
				</div>
				<div class="btn-set">
					<button id='asiper' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="asignarpro($('#asiper'))"><i class="fas fa-user-tie"></i></button>
					<div class="toltip-btn">Asignar Evaluadores</div>
				</div>
				<div class="btn-set">
					<button id='asijur' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="asignarprojud($('#asijur'))"><i class="fas fa-balance-scale"></i></button>
					<div class="toltip-btn">Asignar Juridico</div>
				</div>
				<div class="btn-set">
					<button id='tiempos' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="tiempos($('#tiempos'))"><i class="fas fa-business-time"></i></button>
					<div class="toltip-btn">Tiempos</div>
				</div>
				<div class="btn-set">
					<button id='observ' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="Observaciones($('#observ'))"><i class='fas fa-comment-dots'></i></button>
					<div class="toltip-btn">Observaciones</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: CONFLICTOS -->
			<div class="tabs-side" id="tec-tab-conf" style="display: none">
				<div class="btn-set">
					<button id='btnConf' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LConflicEle($('#btnConf'))"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
				<div class="btn-set">
					<button id='btnConf2' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LConflicVia($('#btnConf2'))"><i class='fas fa-thumbs-up'></i></button>
					<div class="toltip-btn">Viabilidad</div>
				</div>
			</div>
			<!-- USUARIO TECNICO:: SUBSANACIONES -->
			<div class="tabs-side" id="tec-tab-sub" style="display: none">
				<div class="btn-set">
					<button id="btn_sub" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="botoneSubsanaciones($('#btn_sub'))" ><i class="fas fa-sync-alt"></i></button>
					<div class="toltip-btn">Actulizar Listado</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="window.open('templates/modules/ExcelSubsanaciones.php')"><i class="fa fa-file-excel"></i></button>
					<div class="toltip-btn">Descarga de Excel</div>
				</div>
			</div>
			<!-- BOTON UP ACOPLE DE BARRA -->
			<button class="btn-side-view" id="btn-side-on"><i class="fas fa-chevron-circle-down"></i></button>
		</div>
	<?php endif ?>
	<!-- FUNCIONES: USUARIO JURIDICO -->
	<?php if ($_COOKIE['user_rol'] == "6"): ?>
		<div class="side-btns-cont text-center">
			<!-- USUARIO JURIDICO:: EVALUACION -->
			<div class="tabs-side" id="jur-tab-eva" style="display: none">
				<div class="btn-set">
					<button id='eval_pro_ele' onclick="eval_pro_ele2Jur($('#eval_pro_ele'))" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
			</div>
			<!-- USUARIO JURIDICO:: CONVOCATORIAS -->
			<div class="tabs-side" id="viab-tab-convo" style="display: none">
				<div class="btn-set">
					<button id="btn1" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="ListadoConvocatorias(1)"><i class="fas fa-list-ol"></i></button>
					<div class="toltip-btn">Listado</div>
				</div>
				<div class="btn-set">
					<button id="btn2" onclick="ListadoConvocatorias(2)" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-hand-point-up"></i></button>
					<div class="toltip-btn">Vigentes</div>
				</div>
				<div class="btn-set">
					<button id="btn3" onclick="ListadoConvocatorias(3)" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="cri_via($('#cri_via'))"><i class="fa fa-thumbs-up"></i></button>
					<div class="toltip-btn">Finalizadas</div>
				</div>
			</div>
			<!-- USUARIO JURIDICO:: CONFLICTOS -->
			<div class="tabs-side" id="jur-tab-conf" style="display: none">
				<div class="btn-set">
					<button id='btnpro2' onclick="LConflicEleUsuJur($('#btnpro2'))" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
			</div>
			<!-- USUARIO JURIDICO:: USUARIO -->
			<div class="tabs-side" id="jur-tab-user" style="display: none">
				<div class="btn-set">
					<button id="btn_config" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="user_jur_edit($('#btn_config'))" ><i class="fas fa-user-cog"></i></button>
					<div class="toltip-btn">Configuración de Usuario</div>
				</div>
			</div>
			<!-- BOTON UP ACOPLE DE BARRA -->
			<button class="btn-side-view" id="btn-side-on"><i class="fas fa-chevron-circle-down"></i></button>
		</div>
	<?php endif ?>
	<!-- FUNCIONES: USUARIO COLOMBIA PRODUCTIVA -->
	<?php if ($_COOKIE['user_rol'] == "7"): ?>
		<div class="side-btns-cont text-center">
			<!-- USUARIO COL PRODUCTIVA:: PANEL -->
			<div class="tabs-side" id="cp-tab-panel" style="display: none;">
				<div class="btn-set">
					<button class="btn-side-view" id="cp-btnf-panel" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-chart-line"></i></button>
					<div class="toltip-btn">Analítica</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-file-csv"></i></button>
					<div class="toltip-btn" id="tec-btnf-gcon">Generador de Consultas</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-sms"></i></button>
					<div class="toltip-btn" id="tec-btnf-chat">Chat</div>
				</div>
			</div>
			<!-- USUARIO COL PRODUCTIVA:: CONVOCATORIAS -->
			<div class="tabs-side" id="cp-tab-convo" style="display: none">
				
				<div class="btn-set">
					<button id="btn1" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="ListadoConvocatorias(1)"><i class="fas fa-list-ol"></i></button>
					<div class="toltip-btn">Listado</div>
				</div>

				<div class="btn-set">
					<button id="cri_ele" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LCrecp($('#cri_ele'))"><i class="fas fa-check-square"></i></button>
					<div class="toltip-btn">Requisitos Elegibilidad</div>
				</div>
				<div class="btn-set">
					<button id="cri_via" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LCrvcp($('#cri_via'))"><i class="fa fa-thumbs-up"></i></button>
					<div class="toltip-btn">Requsitos Viabilidad</div>
				</div>
				<div class="btn-set">
					<button id="causa_rec" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LCaucp($('#causa_rec'))"><i class="fas fa-thumbs-down"></i></button>
					<div class="toltip-btn">Causales de Rechazo</div>
				</div>
			</div>
			<!-- USUARIO COL PRODUCTIVA:: EMPRESAS -->
			<div class="tabs-side" id="cp-tab-emp" style="display: none">
				<div class="btn-set">
					<button id='btnemp' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LEmpcp($('#btnemp'))"><i class='fas fa-list-ol'></i></button>
					<div class="toltip-btn">Listado de Empresas</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LEmpcp($('#btnemp'))"><i class="fas fa-sync-alt"></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- USUARIO COL PRODUCTIVA:: PROYECTOS -->
			<div class="tabs-side" id="cp-tab-proy" style="display: none">
				<div class="btn-set">
					<button id="btnpro" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LProcp($('#btnpro'))"><i class='fas fa-list-ol'></i></button>
					<div class="toltip-btn">Listado de Proyectos</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LProcp($('#btnpro'))"><i class='fas fa-sync-alt'></i></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- USUARIO COL PRODUCTIVA:: EVALUACION -->
			<div class="tabs-side" id="cp-tab-eva" style="display: none">
				<div class="btn-set">
					<button id='eval_pro_ele' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="eval_pro_elecp($('#eval_pro_ele'))"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" id='eval_pro_via' onclick="eval_pro_viacp($('#eval_pro_via'))"><i class='fa fa-thumbs-up'></i></button>
					<div class="toltip-btn">Viabilidad</div>
				</div>
				<div class="btn-set">
					<button id='observ' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="Observacionescp($('#observ'))"><i class='fas fa-comment-dots'></i></button>
					<div class="toltip-btn">Observaciones</div>
				</div>
			</div>
			<!-- USUARIO COL PRODUCTIVA:: CONFLICTOS -->
			<div class="tabs-side" id="cp-tab-conf" style="display: none">
				<div class="btn-set">
					<button id='btnConf' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LConflicEleCp($('#btnConf'))"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
				<div class="btn-set">
					<button id='btnConf2' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LConflicViaCp($('#btnConf2'))"><i class='fas fa-thumbs-up'></i></button>
					<div class="toltip-btn">Viabilidad</div>
				</div>
			</div>
			<!-- USUARIO COL PRODUCTIVA:: SUBSANACIONES -->
			<div class="tabs-side" id="cp-tab-sub" style="display: none">
				<div class="btn-set">
					<button id="btn_sub" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LSubsanacionesCp($('#btn_sub'))" ><i class="fas fa-list-ol"></i></button>
					<div class="toltip-btn">Listado</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LSubsanacionesCp($('#btn_sub'))"><i class="fas fa-sync-alt"></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- BOTON UP ACOPLE DE BARRA -->
			<button class="btn-side-view" id="btn-side-on"><i class="fas fa-chevron-circle-down"></i></button>
		</div>
	<?php endif ?>
	<!-- FUNCIONES: USUARIO SERVICIO NACIONAL SENA -->
	<?php if ($_COOKIE['user_rol'] == "8"): ?>
		<div class="side-btns-cont text-center">
			<!-- USUARIO SN SENA:: PANEL -->
			<div class="tabs-side" id="cp-tab-panel" style="display: none;">
				<div class="btn-set">
					<button class="btn-side-view" id="cp-btnf-panel" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-chart-line"></i></button>
					<div class="toltip-btn">Analítica</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-file-csv"></i></button>
					<div class="toltip-btn" id="tec-btnf-gcon">Generador de Consultas</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)"><i class="fas fa-sms"></i></button>
					<div class="toltip-btn" id="tec-btnf-chat">Chat</div>
				</div>
			</div>
			<!-- USUARIO SN SENA:: CONVOCATORIAS -->
			<div class="tabs-side" id="cp-tab-convo" style="display: none">
				
				<div class="btn-set">
					<button id="btn1" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="ListadoConvocatorias(1)"><i class="fas fa-list-ol"></i></button>
					<div class="toltip-btn">Listado</div>
				</div>

				<div class="btn-set">
					<button id="cri_ele" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LCrecp($('#cri_ele'))"><i class="fas fa-check-square"></i></button>
					<div class="toltip-btn">Requisitos Elegibilidad</div>
				</div>
				<div class="btn-set">
					<button id="cri_via" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LCrvcp($('#cri_via'))"><i class="fa fa-thumbs-up"></i></button>
					<div class="toltip-btn">Requsitos Viabilidad</div>
				</div>
				<div class="btn-set">
					<button id="causa_rec" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LCaucp($('#causa_rec'))"><i class="fas fa-thumbs-down"></i></button>
					<div class="toltip-btn">Causales de Rechazo</div>
				</div>
			</div>
			<!-- USUARIO SN SENA:: EMPRESAS -->
			<div class="tabs-side" id="cp-tab-emp" style="display: none">
				<div class="btn-set">
					<button id='btnemp' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LEmpcp($('#btnemp'))"><i class='fas fa-list-ol'></i></button>
					<div class="toltip-btn">Listado de Empresas</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LEmpcp($('#btnemp'))"><i class="fas fa-sync-alt"></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- USUARIO SN SENA:: PROYECTOS -->
			<div class="tabs-side" id="cp-tab-proy" style="display: none">
				<div class="btn-set">
					<button id="btnpro" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LProcp($('#btnpro'))"><i class='fas fa-list-ol'></i></button>
					<div class="toltip-btn">Listado de Proyectos</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LProcp($('#btnpro'))"><i class='fas fa-sync-alt'></i></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- USUARIO SN SENA:: EVALUACION -->
			<div class="tabs-side" id="cp-tab-eva" style="display: none">
				<div class="btn-set">
					<button id='eval_pro_ele' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="eval_pro_elecp($('#eval_pro_ele'))"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" id='eval_pro_via' onclick="eval_pro_viacp($('#eval_pro_via'))"><i class='fa fa-thumbs-up'></i></button>
					<div class="toltip-btn">Viabilidad</div>
				</div>
				<div class="btn-set">
					<button id='observ' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="Observacionescp($('#observ'))"><i class='fas fa-comment-dots'></i></button>
					<div class="toltip-btn">Observaciones</div>
				</div>
			</div>
			<!-- USUARIO SN SENA:: CONFLICTOS -->
			<div class="tabs-side" id="cp-tab-conf" style="display: none">
				<div class="btn-set">
					<button id='btnConf' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LConflicEleCp($('#btnConf'))"><i class='fas fa-check-square'></i></button>
					<div class="toltip-btn">Elegibilidad</div>
				</div>
				<div class="btn-set">
					<button id='btnConf2' class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LConflicViaCp($('#btnConf2'))"><i class='fas fa-thumbs-up'></i></button>
					<div class="toltip-btn">Viabilidad</div>
				</div>
			</div>
			<!-- USUARIO SN SENA:: SUBSANACIONES -->
			<div class="tabs-side" id="cp-tab-sub" style="display: none">
				<div class="btn-set">
					<button id="btn_sub" class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LSubsanacionesCp($('#btn_sub'))" ><i class="fas fa-list-ol"></i></button>
					<div class="toltip-btn">Listado</div>
				</div>
				<div class="btn-set">
					<button class="btn-side-view" onmouseover="active_toltip_btn(this)" onmouseout="desactive_toltip_btn(this)" onclick="LSubsanacionesCp($('#btn_sub'))"><i class="fas fa-sync-alt"></i></button>
					<div class="toltip-btn">Actualizar Listado</div>
				</div>
			</div>
			<!-- BOTON UP ACOPLE DE BARRA -->
			<button class="btn-side-view" id="btn-side-on"><i class="fas fa-chevron-circle-down"></i></button>
		</div>
	<?php endif ?>
</div>
/*======================================================================
* CONTROLADORES DE LAS BARRA DE NAVEGACION
======================================================================*/

/*========================================================
* CONTROLADORES DE LA BARRA DE NAVEGACION SUPERIOR
========================================================*/
// FUNCION-1: CONTROLA EL DESPLIEGUE INCIAL
function menu_controller_on(){
	// IDENTIFICAR ELEMENTOS -----------------
	// Boton 
	var btn_dash = $('#btn-dash-menu');
	// Contenedor Botones
	var cont_btns = $('#list-btns-fun');
	// Incono Boton Dash
	var icon_btn_dash = $('#ico-dash');
	// Rol de usuario
	var user_rol = $("#navigation-user").attr("dtr");
	// Contenedor Info Usuario
	var nav_info = $("#nav-info");
	// Botones Vistas
	var btns_views = document.getElementsByClassName('btn-fun-user');
	console.log("btns_views", btns_views.length);
	// btns_views.fadeIn();
	
	// INICIAR ANIMACIONES -----------------
	// Apagar Contenedor Info
	nav_info.hide();
	
	// Ancho de la barra segun Usuario ==========================
	switch (user_rol) {
		
		
		case "2": //Digitador Auxiliar
			// statements_1
			cont_btns.css({width:'400px'});
			break;

		case "3": //Evaluador Elegibilidad
			// statements_1
			cont_btns.css({width:'700px'});
			break;

		case "4": //Evaluador Viabilidad
			// statements_1
			cont_btns.css({width:'700px'});
			break;
		
		case "5": //Gestor Tecnico
			// statements_1
			cont_btns.css({width:'1300px'});
			break;
		
		case "6": //Usuario Juridico
			// statements_1
			cont_btns.css({width:'700px'});
			break;

		case "7": //Colombia Productiva
			// statements_1
			cont_btns.css({width:'1150px'});
			break;
		
		case "8": //usuario Sena
			// statements_1
			cont_btns.css({width:'1150px'});
			break;
		
		default: //Opcion por defecto
			cont_btns.css({width:'1300px'});
			break;
	}
	// Icono de despliegue
	icon_btn_dash.css({transform:'rotate(180deg)'});
	// $('.btn-fun-user').show();
	btn_dash.attr('onclick', 'menu_controller_off()');
	setTimeout(function(){btns_views[7].style.display = 'inline';}, 150)
	setTimeout(function(){btns_views[6].style.display = 'inline';}, 200)
	setTimeout(function(){btns_views[5].style.display = 'inline';}, 260)
	setTimeout(function(){btns_views[4].style.display = 'inline';}, 320)
	setTimeout(function(){btns_views[3].style.display = 'inline';}, 390)
	setTimeout(function(){btns_views[2].style.display = 'inline';}, 500)
	setTimeout(function(){btns_views[1].style.display = 'inline';}, 650)
	setTimeout(function(){btns_views[0].style.display = 'inline';}, 800)	
}
// FUNCION-2: APAGA EL TEXTO DE LOS NODOS
function menu_controller_off_txt(){
	// IDENTIFICAR ELEMENTOS -----------------
	// Boton 
	var btn_dash = $('#btn-dash-menu');
	// Contenedor Botones
	var cont_btns = $('#list-btns-fun');
	// Incono Boton Dash
	var icon_btn_dash = $('#ico-dash');
	// Span texto Botones Vistas
	var btns_txt = document.getElementsByClassName('txt-btn-nodo');
	// Btones 
	var btns_tabs = $('.btn-fun-user');
	// INICIAR ANIMACIONES -----------------
	btns_tabs.css({width: 'auto'});
	cont_btns.css({width:'auto'});
	icon_btn_dash.css({transform:'rotate(0deg)'}, 'slow')
	// $('.btn-fun-user').show();
	btn_dash.attr('onclick', 'menu_controller_on_txt()')
	// Seteo de Tiempo
	setTimeout(function(){btns_txt[0].style.display = 'none';}, 50)
	setTimeout(function(){btns_txt[1].style.display = 'none';}, 80)
	setTimeout(function(){btns_txt[2].style.display = 'none';}, 120)
	setTimeout(function(){btns_txt[3].style.display = 'none';}, 200)
	setTimeout(function(){btns_txt[4].style.display = 'none';}, 280)
	setTimeout(function(){btns_txt[5].style.display = 'none';}, 340)
	setTimeout(function(){btns_txt[6].style.display = 'none';}, 400)
	setTimeout(function(){btns_txt[7].style.display = 'none';}, 500)
}
// FUNCION-3: CONTROLA EL DESPLIEGUE INCIAL
function menu_controller_on_txt(){
	// IDENTIFICAR ELEMENTOS -----------------
	// Boton 
	var btn_dash = $('#btn-dash-menu');
	// Contenedor Botones
	var cont_btns = $('#list-btns-fun');
	// Incono Boton Dash
	var icon_btn_dash = $('#ico-dash');
	// Botones Vistas
	var btns_tabs = $('.btn-fun-user');
	// Span texto Botones Vistas
	var btns_txt = document.getElementsByClassName('txt-btn-nodo');
	// btns_views.fadeIn();
	// INICIAR ANIMACIONES -----------------
	cont_btns.css({width:'1300px'});
	btns_tabs.css({width:'140px'});
	icon_btn_dash.css({transform:'rotate(180deg)'});
	// $('.btn-fun-user').show();
	btn_dash.attr('onclick', 'menu_controller_off_txt()');
	setTimeout(function(){btns_txt[7].style.display = 'inline';}, 150)
	setTimeout(function(){btns_txt[6].style.display = 'inline';}, 200)
	setTimeout(function(){btns_txt[5].style.display = 'inline';}, 260)
	setTimeout(function(){btns_txt[4].style.display = 'inline';}, 320)
	setTimeout(function(){btns_txt[3].style.display = 'inline';}, 390)
	setTimeout(function(){btns_txt[2].style.display = 'inline';}, 500)
	setTimeout(function(){btns_txt[1].style.display = 'inline';}, 650)
	setTimeout(function(){btns_txt[0].style.display = 'inline';}, 800)	
}

function menu_controller_off(){
	// IDENTIFICAR ELEMENTOS -----------------
	// Boton 
	var btn_dash = $('#btn-dash-menu');
	// Contenedor Botones
	var cont_btns = $('#list-btns-fun');
	// Incono Boton Dash
	var icon_btn_dash = $('#ico-dash');
	// Botones Vistas
	var btns_views = document.getElementsByClassName('btn-fun-user');
	// Rol de usuario
	var user_rol = $("#navigation-user").attr("dtr");
	// Contenedor Info Usuario
	var nav_info = $("#nav-info");

	console.log("btns_views", btns_views.length);
	
	// INICIAR ANIMACIONES -----------------
	// Encender Info usuario
	nav_info.show();
	cont_btns.css({width:'80px'}, 6000);
	icon_btn_dash.css({transform:'rotate(0deg)'}, 'slow')
	// $('.btn-fun-user').show();
	btn_dash.attr('onclick', 'menu_controller_on()')
	// Seteo de Tiempo
	setTimeout(function(){btns_views[0].style.display = 'none';}, 50)
	setTimeout(function(){btns_views[1].style.display = 'none';}, 80)
	setTimeout(function(){btns_views[2].style.display = 'none';}, 120)
	setTimeout(function(){btns_views[3].style.display = 'none';}, 200)
	setTimeout(function(){btns_views[4].style.display = 'none';}, 280)
	setTimeout(function(){btns_views[5].style.display = 'none';}, 340)
	setTimeout(function(){btns_views[6].style.display = 'none';}, 400)
	setTimeout(function(){btns_views[7].style.display = 'none';}, 500)
}


/*========================================================
* CONTROLADOR GRUPO DE BOTONES - NODO
========================================================*/
function active_function(btn_groups, btn){
	
	// APAGAR TABS LATERALES
	$('.tabs-side').hide();

	// REMOVER CLASE DE BOTON ACTIVO
	$('.btn-side-view').removeClass("btn-side-active");
	
	// ENCENDER FUNCIONES DE NODO
	$(btn_groups).show();

  // ACTIVAR BOTON FUNCION DEFAULT DE NODO
  $(btn).click();
  $(btn).addClass("btn-side-active");

}

/*========================================================
* CONTROLADORES ONHOVER SOBRE BOTONES SIDENAV
========================================================*/
function active_toltip_btn(btn){
	$(btn).next().addClass("toltip-btn-active");
}
function desactive_toltip_btn(btn){
	$(btn).next().removeClass("toltip-btn-active");
}

/*========================================================
* CONTROLADORES ONHOVER SOBRE BOTONES SIDENAV
========================================================*/
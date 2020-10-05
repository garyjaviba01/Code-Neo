/*Funcion-1: Controla la botonera del Nodo convocatorias*/
function convo_fun(fun){
	// Objeto maker
	maker = new Maker("#cont-convo-fun", "", 5);
	// Limpiar contenedor de funciones
	maker.maker_html();
	switch(fun){
		case 1:
			// Contenido
			html_fun = ''+
			'<div class="form-convo">'+
				'<div class="form-group">'+
				  '<label for="usr">Nombre/Titulo</label>'+
				  '<input type="text" class="form-control inp-convo" id="usr">'+
				'</div>'+
				'<div class="form-group">'+
				  '<label>Descripción/Contenido:</label>'+
				  '<textarea class="form-control inp-convo" rows="4"></textarea>'+
				'</div>'+
				'<div class="row">'+
					'<div class="col-6">'+
						'<div class="form-group">'+
						  '<label for="usr">Fecha de Inicio</label>'+
						  '<input type="date" class="form-control inp-convo" id="usr">'+
						'</div>'+
					'</div>'+
					'<div class="col-6">'+
						'<div class="form-group">'+
						  '<label for="usr">Fecha de Cierre</label>'+
						  '<input type="date" class="form-control inp-convo" id="usr">'+
						'</div>'+
					'</div>'+
				'</div>'+
				'<div>'+
					'<button class="btn-convo">Crear Nueva</button>'
				'</div>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_fun;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
		case 2:
			// Contenido
			html_fun = '';
			// Pasar Contenido
			maker.s_html = html_fun;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
		case 3:
			// Contenido
			html_fun = '';
			// Pasar Contenido
			maker.s_html = html_fun;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
		default:
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();		
		break;
	}	
}
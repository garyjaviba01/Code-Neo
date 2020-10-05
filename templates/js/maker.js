/*---------------------------------------------------------------------------------------------*/
//►Titulo: Modulo MAKER 2.0 by Joker_scorp 
/*---------------------------------------------------------------------------------------------*/
/*►Descripcion: Herramienta para construir Html junto con Jquery*/
/*Parametros
t-> Id Destino donde sera insertado el html
c->Contenido html
o->Opcion a relizar por el objeto, insertar, limpiar, eliminar
m->Mensaje para la construccion de modales
*/
class Maker{
	// constructor---------------------------------------
	constructor(t="", c="", o="", m=""){
		this._targ = t;
		this._html = c;
		this._opt = o;
		this._msg = m;
	}
	// SETTERS---------------------------------------
	// Target id
	set s_targ(d){
		this._targ = d;
	}
	// Contenido html
	set s_html(d){
		this._html = d;
	}
	// Opcion de operaciones
	set s_opt(d){
		this._opt = d;
	}
	// Mensage
	set s_msg(d){
		this._msg = d;
	}
	// METODOS---------------------------------------
	// Construye y elemina elementos html
	maker_html(){
		switch(this._opt){
			//Append - Inserta contenido al final de los elementos seleccionados.
			case 1: 
				$(this._targ).append(this._html);
			break;
			//Prepend - Inserta contenido al principio de los elementos seleccionados.
			case 2: 
				$(this._targ).prepend(this._html);
			break;
			//After - Inserta contenido después de los elementos seleccionados.
			case 3:
				$(this._targ).after(this._html);
			break;
			//Before - Inserta contenido antes de los elementos seleccionados.
			case 4:
				$(this._targ).before(this._html);
			break;
			//Empty - Elimina los elementos secundarios del elemento seleccionado.
			case 5:
				$(this._targ).empty();
			break;
			//Remove - Elimina el elemento seleccionado (y sus elementos secundarios)
			case 6:
				$(this._targ).remove();
			break;
		}
	}
	static mk_how(){
		console.log("Maker 2.0 by ►►♥♠♣♦Joker_scorp is Free!!!♠♣♦♥◄◄");
	}
	static mk_date(){
		var date = new Date();
		var months = ["Enero", "Febrero","Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
		var days = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
		var date_formated = days[date.getDay()]+" "+date.getDate()+" de "+months[date.getMonth()]+" del "+date.getFullYear();
		return date_formated;
	}
	static mk_time(){
		// Fecha
		var date = new Date();
		// Hora
		var hour = date.getHours();
		// Minutos
		var minuts = date.getMinutes();
		if(hour > 12){
			// Hora
			var hour_formated = hour+":"+minuts+":pm";

		}else{
			
			var hour_formated = hour+":"+minuts+":am";
		}
		// Retorno
		return hour_formated;
	}
}
Maker.mk_how();
/*---------------------------------------------------------------------------------------------*/
//►Titulo: Modulo MAKER 1.1 by Joker_scorp 
/*---------------------------------------------------------------------------------------------*/
/*►Descripcion: Herramienta para realizar peticiones ajax con Jquery*/
// Clase Para peticiones ajax
/*
Parametros--------------------->
u-> url
t-> Tipo 
tr->Target
dt->Datos
l->Html De Carga
cf->Configuracion Ajax(cache, processData, contentType, dataType)
*/
class Request{
	// constructor---------------------------------------
	constructor(u="", t="", tr="", dt="", l="", cf="", p="", a=""){
		// Externas-----------------
		this._url = u; // Urls
		this._type = t; // Tipo(POST, )
		this._dataSend = dt; // Datos Envio
		this._target = tr; // Destino Carga
		this._load = l; // Carga html 
		this._config = cf; // Configuracion Ajax 
		this._permision = p; // Permisos
		this._actions = a; // Funciones 
		// Internas-----------------
		this._form_data = ""; //FormData
	}
	// SETTERS---------------------------------------
	// Url------------------
	set s_url(d){
		this._url = d;
	}
	// Tipo-----------------
	set s_type(d){
		this._type = d;
	}
	// Datos Envio----------
	set s_dataSend(d){
		this._dataSend = d;
	}
	// Target Content-------
	set s_target(d){
		this._target = d;
	}
	// Cargas---------------
	set s_load(d){
		this._load = d;
	}
	// Configuraciones------
	set s_config(d){
		this._config = d;
	}
	// Permiso--------------
	set s_permision(d){
		this._permision = d;
	}
	// Configuracion Maker Heredado
	set s_actions(d){
		this._actions = d;
	}
	// METODOS---------------------------------------
	// Request de Operaciones
	request_operation(){
		// Paso de Funcion temporal
		var function_temporal = this._actions;
		// Formulario
		this._form_data = new FormData();
		this._form_data.append(this._permision[0], this._permision[1]);
		// Datos De envio
		var data = this._dataSend
		for(i=0; i<data.length; i++){
			this._form_data.append(data[i].name, data[i].values);
		}
		// Objeto Ajax
		$.ajax({
			type: this._config[0],
			url:'templates/filters/'+this._url+'.php',
			data:this._form_data,
			cache:this._config[1],
			processData:this._config[2],
			contentType:this._config[3],
			dataType:this._config[4],
			success:function(response){
		 		function_temporal(response);
			}
		});
	}
	request_list(){
		// Paso de Funcion temporal
		var function_temporal = this._actions;
		// Datos de envio->
		this._form_data = new FormData();
		this._form_data.append(this._permision[0], this._permision[1]);
		// Objeto Ajax
		$.ajax({
			type: this._config[0],
			url:'templates/filters/'+this._url+'.php',
			data:this._form_data,
			cache:this._config[1],
			processData:this._config[2],
			contentType:this._config[3],
			dataType:this._config[4],
			success:function(response){
		 		function_temporal(response);
			}
		});
	}
	// Consola de datos
	console_data(){
		console.log("this._url", this._url);
		console.log("this._type", this._type);
		console.log("this._dataSend", this._dataSend);
		console.log("this._target", this._target);
		console.log("this._load", this._load);
		console.log("this._config", this._config);
		console.log("this._permision", this._permision);
	}
}
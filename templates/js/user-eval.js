// ---------------------------------------------------------------------------------------------
//鈻篢itulo: CONTROLADOR DEL LOS MANDOS DE USUARIO
// ---------------------------------------------------------------------------------------------
/*鈻篋escripcion: Controla los eventos del dash de usuario evaluador*/
/*Funcion-1: Controla la botonera lateral del Usuario EVALUADOR*/
function tabs_eval_ele(tab, btn,data){
	// Objeto Majer
	maker = new Maker("#tabs-content", "", 5);
	// Limpiar contenedor de tabs
	maker.maker_html();
	switch(tab){
		case 'exit':
			CloseSesion();
		break;
		case 'config':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5>Configuraciones de Usuario</h5>'+
				'<hr/>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
		case 'ndc':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5 class="tit-nodo"><i class="fas fa-flag"></i>&nbsp;Convocatorias</h5>'+
				'<hr/>'+
				'<div class="nav-convo">'+
    					'<button class="btn-functions" onclick="ListadoConvocatorias(1)"  id="btn1"> Listado</button>'+
					'<button class="btn-functions" onclick="ListadoConvocatorias(2)"  id="btn2">Vigentes</button>'+
					'<button class="btn-functions" onclick="ListadoConvocatorias(3)"  id="btn3"> Finalizadas</button>'+
				'</div>'+
				'<div class="cont-convo-fun" id="cont-convo-fun">'+
					'<p><span class="badge badge-info">1</span><strong> Listado : </strong>Ver la información de todas las convocatorias registradas en la base de datos</p>'+
					'<p><span class="badge badge-info">2</span><strong> Vigentes : </strong> Convocatorias cuya fecha de finalización aún no ha expirado</p>'+
					'<p><span class="badge badge-info">3</span><strong> Finalizadas : </strong> Convocatorias cuya fecha de finalización ya expiró </p>'+
				'</div>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
		case 'ndeva':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5 class="tit-nodo"><i class="fas fa-check"></i> Evaluación de elegibilidad</h5>'+
				'<hr/>'+
			'</div>'+
			'<div class="nav-convo" id="nav-convo"></div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			PropuestasEva(data);
		break;
		case 'ndpr':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5 class="tit-nodo"><i class="fas fa-book-open"></i>&nbsp; Proyectos</h5>'+
				'<hr/>'+
			'</div>'+
			'<div class="nav-convo" id="nav-convo"></div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		
			Propuestas(data);
		break;
		case 'ndsb':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5 class="tit-nodo"><i class="fas fa-calendar-check"></i> &nbsp; Subsanaciones</h5>'+
				'<hr/>'+
			'</div>'+
			'<div class="nav-convo" id="nav-convo"></div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			ListadoSubsanaciones();
		break;
		default:
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();
		break;	
	}
	// Identificar botones
	$(".btn-tab").removeClass("btn-nav-active");
	// Agregar clase a boton por defecto
	$(btn).addClass("btn-nav-active");
}
function tabs_eval_via(tab, btn,data){
	// Objeto Majer
	maker = new Maker("#tabs-content", "", 5);
	// Limpiar contenedor de tabs
	maker.maker_html();
	switch(tab){
		case 'exit':
			CloseSesion();
		break;
		case 'config':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5>Configuraciones de Usuario</h5>'+
				'<hr/>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
		case 'ndc':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5 class="tit-nodo"><i class="fas fa-flag"></i>&nbsp;Convocatorias</h5>'+
				'<hr/>'+
				'<div class="nav-convo">'+
    					'<button class="btn-functions" onclick="ListadoConvocatoriasvia(1)"  id="btn1"> Listado</button>'+
					'<button class="btn-functions" onclick="ListadoConvocatoriasvia(2)"  id="btn2">Vigentes</button>'+
					'<button class="btn-functions" onclick="ListadoConvocatoriasvia(3)"  id="btn3"> Finalizadas</button>'+
				'</div>'+
				'<div class="cont-convo-fun" id="cont-convo-fun">'+
					'<p><span class="badge badge-info">1</span><strong> Listado : </strong>Ver la información de todas las convocatorias registradas en la base de datos</p>'+
					'<p><span class="badge badge-info">2</span><strong> Vigentes : </strong> Convocatorias cuya fecha de finalización aún no ha expirado</p>'+
					'<p><span class="badge badge-info">3</span><strong> Finalizadas : </strong> Convocatorias cuya fecha de finalización ya expiró </p>'+
				'</div>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
		case 'ndeva':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5 class="tit-nodo"><i class="fas fa-check"></i> Evaluación</h5>'+
				'<hr/>'+
			'</div>'+
			'<div class="nav-convo" id="nav-convo"></div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			PropuestasEva2(data);
		break;
			case 'ndpr':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5 class="tit-nodo"><i class="fas fa-book-open"></i>&nbsp; Proyectos</h5>'+
				'<hr/>'+
			'</div>'+
			'<div class="nav-convo" id="nav-convo"></div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		
			Propuestas2(data);
		
		break;
		case 'ndsb':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5 class="tit-nodo"><i class="fas fa-calendar-check"></i> &nbsp; Subsanaciones</h5>'+
				'<hr/>'+
			'</div>'+
			'<div class="nav-convo" id="nav-convo"></div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			ListadoSubsanaciones();
		break;
		default:
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();
		break;	
	}
	// Identificar botones
	$(".btn-tab").removeClass("btn-nav-active");
	// Agregar clase a boton por defecto
	$(btn).addClass("btn-nav-active");
}
function CloseSesion(){
  //borrado de cookies    
  document.cookie.split(";").forEach(function(c) {
       document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
  });
  //borrado de variables de sesion
  $.ajax({
		type:'POST',
		url:'templates/filters/filterLogin.php?CloseSesion=1',
		data:{},
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // refrescar pagina posterior a eliminacion de sesion
	    location.reload()
		}
	});
}
function ListadoConvocatorias(listado){
    
  //enviar solicitud de listado de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  sendform.append("tp", listado);
  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?LC=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#cont-convo-fun").html(e);
		}
	});
	$(".btn-functions").removeClass("btn-functions-active");
	$("#btn"+listado).addClass("btn-functions-active");
}
function ListadoConvocatoriasvia(listado){
    
  //enviar solicitud de listado de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  sendform.append("tp", listado);
  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?LC2=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#cont-convo-fun").html(e);
		}
	});
	$(".btn-functions").removeClass("btn-functions-active");
	$("#btn"+listado).addClass("btn-functions-active");
}
function DetailConvo(id){
    
  //enviar solicitud de detalle de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  sendform.append("id",id);
  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?DC=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#cont-convo-fun").html(e);
		}
	});
	$(".btn-functions").removeClass("btn-functions-active");
}
function DetailConvo2(id){
    
  //enviar solicitud de detalle de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  sendform.append("id",id);
  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?DC2=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#cont-convo-fun").html(e);
		}
	});
	$(".btn-functions").removeClass("btn-functions-active");
}
function Propuestas(id){
    
  //enviar solicitud de archivo propuestas
  $("#nav-convo").html("<div class='spinner-border text-dark'></div>");
  $.ajax({
		type:'POST',
		url:'templates/modules/user-eval-ele-pro.php?conv='+id,
		data:{},
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#nav-convo").html(e);
		}
	});

}
function Propuestas2(id){
    
  //enviar solicitud de archivo propuestas
  $("#nav-convo").html("<div class='spinner-border text-dark'></div>");
  $.ajax({
		type:'POST',
		url:'templates/modules/user-eval-via-pro.php?conv='+id,
		data:{},
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#nav-convo").html(e);
		}
	});

}
function PropuestasEva(id){
    
  //enviar solicitud de archivo propuestas
  $("#nav-convo").html("<div class='spinner-border text-dark'></div>");
  $.ajax({
		type:'POST',
		url:'templates/modules/user-eval-ele-proeva.php?pro='+id,
		data:{},
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#nav-convo").html(e);
		}
	});

}
function PropuestasEva2(id){
    
  //enviar solicitud de archivo propuestas
  $("#nav-convo").html("<div class='spinner-border text-dark'></div>");
  $.ajax({
		type:'POST',
		url:'templates/modules/user-eval-via-proeva.php?pro='+id,
		data:{},
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#nav-convo").html(e);
		}
	});

}
function DatainitialPro(id){
  
  
  
  /**$("#cont-convo-fun").html("<div style='text-align:center;'><img src='templates/assets/loading.gif' width='60'></div>");
  $.ajax({
		type:'POST',
		url:'templates/modules/user-eval-ele-pro.php?conv='+id,
		data:{},
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		
		},
	  success:function(e){
	    
	    $("#nav-convo").html(e);
		}
	});**/
	if($("#convoca").val()!="0")
	$("#cont-convo-fun").html("<div style='text-align:center;font-size:20px;margin-bottom:10px;'><b> "+$("#convoca option:selected").html()+"</b></div><div class='col-sm-12' style='height:50px;background-color:#F5F4F3;'><b>Proyectos asignados : </b>8</div><div class='col-sm-12' style='height:50px;background-color:#FFF;'><b>Proyectos que vencen hoy :</b> 3</div><div class='col-sm-12' style='height:50px;background-color:#F5F4F3;'><b>Proyectos subsanados :</b> 1</div><div style='col-sm-12' style='height:50px;background-color:#FFF;text-align:center;'><button class='btn-functions' onclick='listprop()' style='font-size:16px!important;'>Ver proyectos</button></div>")
    else{
    	$("#cont-convo-fun").html("")    
        
    }
}
function DatainitialPro2(id){
  
  
  
  /**$("#cont-convo-fun").html("<div style='text-align:center;'><img src='templates/assets/loading.gif' width='60'></div>");
  $.ajax({
		type:'POST',
		url:'templates/modules/user-eval-ele-pro.php?conv='+id,
		data:{},
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		
		},
	  success:function(e){
	    
	    $("#nav-convo").html(e);
		}
	});**/
	if($("#convoca").val()!="0")
	$("#cont-convo-fun").html("<div style='text-align:center;font-size:20px;margin-bottom:10px;'><b> "+$("#convoca option:selected").html()+"</b></div><div class='col-sm-12' style='height:50px;background-color:#F5F4F3;'><b>Proyectos asignados : </b>8</div><div class='col-sm-12' style='height:50px;background-color:#FFF;'><b>Proyectos que vencen hoy :</b> 3</div><div class='col-sm-12' style='height:50px;background-color:#F5F4F3;'><b>Proyectos subsanados :</b> 1</div><div style='col-sm-12' style='height:50px;background-color:#FFF;text-align:center;'><button class='btn-functions' onclick='listprop2()' style='font-size:16px!important;'>Ver proyectos</button></div>")
    else{
    	$("#cont-convo-fun").html("")    
        
    }
}
 function listprop(){
         
  //enviar solicitud de detalle de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  
  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?LPR=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#cont-convo-fun").html("<div style='text-align:center;font-size:20px;margin-bottom:10px;'><b>Proyectos asignados de la convocatoria "+$("#convoca option:selected").html()+"</b></div>"+e);
		}
	});

 }
function listprop2(){
         
  //enviar solicitud de detalle de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  
  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?LPR2=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#cont-convo-fun").html("<div style='text-align:center;font-size:20px;margin-bottom:10px;'><b>Proyectos asignados de la convocatoria "+$("#convoca option:selected").html()+"</b></div>"+e);
		}
	});

 } 
function DataProEva(id){
         if($("#pro").val()!="0"){
             
  //enviar solicitud de detalle de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();

  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?DPR=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
        var datapro=$("#pro option:selected").html();
        var dp=datapro.split("-");
	    $("#cont-convo-fun").html("<div style='text-align:left;font-size:16px;margin-bottom:10px;'><b>Evaluación proyecto <br>"+dp[0]+"<br> "+dp[4]+" - <span style='color:red;'> Días restantes : 3</span></b></div>"+e);
		CargarInfoPro(id)
	      
	  }
	});
}
else {
    alert("Seleccione un proyecto !")
     $("#cont-convo-fun").html("");
}
 }
 function DataProEva2(id){
         if($("#pro").val()!="0"){
             
  //enviar solicitud de detalle de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();

  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?DPR2=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
        var datapro=$("#pro option:selected").html();
        var dp=datapro.split("-");
	    $("#cont-convo-fun").html("<div style='text-align:left;font-size:16px;margin-bottom:10px;'><b>Evaluación proyecto <br>"+dp[0]+"<br> "+dp[4]+" - <span style='color:red;'> Días restantes : 3</span></b></div>"+e);
		CargarInfoPro2(id)
	      
	  }
	});
}
else {
    alert("Seleccione un proyecto !")
     $("#cont-convo-fun").html("");
}
 }
 
function CargarInfoPro(id){
         
  //enviar solicitud de detalle de convocatorias
   $("#infoProy").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  
  $.ajax({
		type:'POST',
		url:'templates/modules/user-eval-ele-infoproeva.php?pro='+id,
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#infoProy").html(e);
		}
	});

 }
 function CargarInfoPro2(id){
         
  //enviar solicitud de detalle de convocatorias
   $("#infoProy").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  
  $.ajax({
		type:'POST',
		url:'templates/modules/user-eval-via-infoproeva.php?pro='+id,
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#infoProy").html(e);
		}
	});

 }
 
function infoChange(btn,num) {


    $(".pestanha").removeClass("pestanha_active");
	$(btn).addClass("pestanha_active");
	     
	     for(var i=1;i<=3;i++)
   	{
   	    $("#inf"+i).css("display","none");
   	}
    $("#inf"+num).css("display","block");
}
function ChangeSub(btn,num) {


    $(".pestanha").removeClass("pestanha_active");
	$(btn).addClass("pestanha_active");
	     
	     for(var i=11;i<=12;i++)
   	{
   	    $("#inf"+i).css("display","none");
   	}
    $("#inf"+num).css("display","block");
}

function ListadoSubsanaciones(){
    
  //enviar solicitud de listado de convocatorias
   $("#nav-convo").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
 
  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?Lsub=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#nav-convo").html(e);
		}
	});
}
// Fin------------------------------------------------------------------------------------------
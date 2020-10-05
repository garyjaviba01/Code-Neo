<?php //criterios de viabilidad puntaje adicional para actualizar
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==5){ 

?>
<script> 

$( document ).ready(function() {
<?php if(isset($_REQUEST['cod']))
{
echo "CargarDatosCriviaAdiupd($_GET[cod])" ;	
}
?>
});
</script>
	<div class="row">
	    	<div class="col-md-12" style="color:red;text-align:left;margin-bottom:20px;">Campos obligatorios *</div><br>
		<div class="col-md-6" style="display:none;">
			<div class="form-group">
			<label>Convocatoria<i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help11').css('display','block')" onmouseout="$('#help11').css('display','none')"></i>
			<span class="tooltiptext" id="help11" style="display: none;z-index:10000;">Convocatoria a la cual se agregan los criterios </span></label><input type="hidden" id="codadc">
			<select id="convadc" class="custom-select inps-forms mb-3">
				<?php include("../../phpMVC/Model/class.php");
             $obj=new transacciones;
             echo $obj->ComboConvo();
				?>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Criterio<i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help22').css('display','block')" onmouseout="$('#help22').css('display','none')"></i>
			<span class="tooltiptext" id="help22" style="display: none;z-index:10000;">Criterios de evaluación del sistema</span></label>
			<select id="tipoadc" class="custom-select inps-forms mb-3">
<option value="1">Valores Agregados</option>
	 			</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Requisito<span style="color:red;">*</span> <i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help33').css('display','block')" onmouseout="$('#help33').css('display','none')"></i>
			<span class="tooltiptext" id="help33" style="display: none;z-index:10000;">Requisito que se agrega al criterio</span></label>
			<textarea  id="reqadc" class="form-control inps-forms" placeholder="Requisito del criterio"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Fuente de verificación <i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help6').css('display','block')" onmouseout="$('#help6').css('display','none')"></i>
			<span class="tooltiptext" id="help6" style="display: none;">Archivo para evaluar el requisito</span></label>
			<textarea  id="ayuadc" class="form-control inps-forms" placeholder="Fuente de verificación"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Puntaje<span style="color:red;">*</span> <i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help55').css('display','block')" onmouseout="$('#help55').css('display','none')"></i>
			<span class="tooltiptext" id="help55" style="display: none;z-index:10000;">Puntaje que tiene el requisito</span></label>
			<input type="text"  id="punadc" class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="Puntaje del requisito">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<br>
			<button class="btn-functions" id="btn-upd-cri" onclick="updateCriViapunadc()" ><i class="fas fa-check"></i>&nbsp;Editar</button>
				</div>
		</div>
<?php }
else{?>
<script>

    
 location.href='index.php'   
    

</script>
<?php    
}
?>
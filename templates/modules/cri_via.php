<?php //criterios de viabilidad
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==5){?>	<div class="row">
		<div class="col-md-12" style="color:red;text-align:left;">Campos obligatorios *</div><br>
		<div class="col-md-6" style="display:none;">
			<div class="form-group">
			<label>Convocatoria <i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help1').css('display','block')" onmouseout="$('#help1').css('display','none')"></i>
			<span class="tooltiptext" id="help1" style="display: none;">Convocatoria a la cual se agregan los criterios </span></label>
			<select id="conv" class="custom-select inps-forms mb-3">
				<?php include("../../phpMVC/Model/class.php");
             $obj=new transacciones;
             echo $obj->ComboConvo();
				?>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Criterio <i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help2').css('display','block')" onmouseout="$('#help2').css('display','none')"></i>
			<span class="tooltiptext" id="help2" style="display: none;">Criterios de evaluación del sistema</span></label>
			<select id="tipo" class="custom-select inps-forms mb-3">
	<?php 
             echo $obj->ComboCrivia();
				?>
	 			</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Requisito<span style="color:red;">*</span> <i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help3').css('display','block')" onmouseout="$('#help3').css('display','none')"></i>
			<span class="tooltiptext" id="help3" style="display: none;">Requisito que se agrega al criterio</span></label>
			<textarea  id="req" class="form-control inps-forms" placeholder="Requisito del criterio"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Fuente de verificación <i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help4').css('display','block')" onmouseout="$('#help4').css('display','none')"></i>
			<span class="tooltiptext" id="help4" style="display: none;">Archivo para evaluar  el requisito</span></label>
			<textarea  id="ayu" class="form-control inps-forms" placeholder="Fuente de verificación"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Puntaje<span style="color:red;">*</span> <i class="fa fa-question-circle" style="cursor:help;margin-left:20px;" onmouseover="$('#help5').css('display','block')" onmouseout="$('#help5').css('display','none')"></i>
			<span class="tooltiptext" id="help5" style="display: none;">Puntaje que tiene el requisito</span></label>
			<input type="text"  id="pun" class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="Puntaje del requisito">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<br>
				<button class="btn-functions" id="btn-add-pers" onclick="GuardarCriVia()"><i class="fas fa-check"></i>&nbsp;Guardar</button><button class="btn-functions" id="btn-add-pers" onclick="LCrv()"><i class="fas fa-list"></i>&nbsp;Listado</button><button class="btn-functions"  onclick="CargarModalpunadc()"><i class="fas fa-plus-circle"></i>&nbsp;Puntaje Adicional</button>
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
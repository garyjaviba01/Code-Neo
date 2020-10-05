<?php //session_start();
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==5){?><div  class="row" id="divpro" >
			<div class="col-md-12" style="display:none;">
			<div class="form-group">
			<label>Convocatoria</label>
		<select id="conv" class="custom-select inps-forms mb-3" onchange="ConsultaTiempo()">
<?php include("../../phpMVC/Model/class.php");
$obj=new transacciones;
echo $obj->ComboConvo();
				?>
</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group"> 
			<label>Conteo días elegibilidad</label>
		<select id="conteoe" class="custom-select inps-forms mb-3" >
<option value="H"> Hábiles</option>
<option value="C"> Calendario </option>
</select> 
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label># Días Elegibilidad</label>
		<input type="text"  id="diase" class="form-control inps-forms" onkeypress="return soloNumeros2(event)">
			</div>
		</div>
	<div class="col-md-6">
			<div class="form-group">
			<label>Conteo días viabilidad</label>
		<select id="conteov" class="custom-select inps-forms mb-3" >
<option value="H"> Hábiles</option>
<option value="C"> Calendario</option>
</select>
			</div>
		</div>		
		<div class="col-md-6">
			<div class="form-group">
			<label># Días Viabilidad</label>
		<input type="text"  id="diasv" class="form-control inps-forms" onkeypress="return soloNumeros2(event)">
			</div>
		</div>
			<div class="col-md-12">
			<div class="form-group">
			<button class="btn-functions" id="btn-add-pers" onclick="AddTemp()"><i class="fas fa-plus-circle"></i>&nbsp;Guardar</button>
					</div>
		</div>	
		</div>
		<script> 

$(document).ready(function() {
ConsultaTiempo();
});
</script>
<?php }
else{?>
<script>

    
 location.href='index.php'   
    

</script>
<?php    
}
?>
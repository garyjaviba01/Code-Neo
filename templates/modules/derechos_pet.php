<?php 

	if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5)){?>
	<script>
    $( document ).ready(function() {
    <?php if(isset($_GET['id']))
    {
    echo "CargarDatosDerPet($_GET[id])" ;
    }
    ?>
    });
</script>
			 <div class="der-con-tabs">  
		
				   <div class="row">  
				    <div class="col-12"><div class="col-md-12" style="color:red;text-align:left;">Campos obligatorios *</div> </div>  
				   
				     <div class="col-12">  
				     
				         <label for="sigp-code">SIGP - PROYECTO <span style="color:red;">*</span> <span class="busqueda"><i class="fa fa-search" onclick="CargarProSIGP()"></i>  </span></label>  
				         <input type="hidden" id="id_der" value="<?php echo $_GET['id']?>"><select id="sigp-code" type="text" class="custom-select inps-forms" onchange="BuscarempresaSIGP()" >
	       <?php include("../../phpMVC/Model/class2.php");
           $obj=new transacciones;
           echo $obj->list_pro_sigp(); ?> 
				            
				        </select></div>  
				
				   <div class="col-12" style="margin-top:10px;">  
				         <label for="sel-emp-der" >Empresa  <span style="color:red;">*</span></label>  
				         <select name="empresa" id="sel-emp-der" class="custom-select inps-forms" disabled>  
	<?php
	 echo $obj->list_emp_sigp();
	?>
				           
				         </select>  
				       </div>  
				      
				     <div class="col-6" style="margin-top:10px;">  
				      
				         <label for="sel-fase" >Fase <span style="color:red;">*</span></label>  
				         <select name="fase" id="sel-fase" class="custom-select inps-forms">  
				           <option selected disabled value="none">Seleccione...</option>  
				           <option value="Elegibilidad">Elegibilidad</option>  
				           <option value="Viabilidad">Viabilidad</option>  
				         </select>  
				       </div>  
				       <div class="col-6" style="margin-top:10px;">  
				         <label for="fec-recibido">Fecha Recibido <span style="color:red;">*</span></label>  
				         <input onchange="calculaHabiles()" type="date" id="fec-recibido" class="form-control inps-forms">  
				       </div>  
				    
				     <div class="col-6" style="margin-top:10px;">   
				      
				         <label for="hora-recibido">Hora Recibido <span style="color:red;">*</span></label>  
				         <input type="time" id="hora-recibido" class="form-control inps-forms">  
				     
				     </div>  
				
				     <div class="col-6" style="margin-top:10px;display:none;">  
				  	
				         <label for="fec-limite">Fecha Limite <small>(Autocalculada   5 dias habiles)</small></label>  
				         <input type="text" id="fec-limite" class="form-control inps-forms" disabled>  
				      
				     </div>  
				 
				     <div class="col-6" style="margin-top:10px;">  
				     
				         <label for="medio-resp">Medio de Respuesta </label>  
				         <input type="text" class="form-control inps-forms" id="med_resp">  
				     
				     </div>  
				     <div class="col-12" style="margin-top:10px;">  
				     
				         <label for="resumen-obs">Resumen / Observación</label>  
				         <textarea type="text" class="form-control inps-forms" id="resumen-obs"></textarea>  
				     
				     </div>  
				   <div class="col-12" style="margin-top:10px;">  
				     <button  class="btn-functions"  onclick="editarDerecho2()"><i class="fas fa-check"></i>&nbsp;Editar</button>  
				   </div>  
			  
			 </div> 
<?php }

else{ ?>

	<script>
	    location.href = "index.php";
	</script>

<?php    
}
?>

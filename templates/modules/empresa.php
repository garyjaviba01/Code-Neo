<?php //formaulario de empresa
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5 || $_COOKIE['user_rol']==2)){?>
<div class="row">
   
    <div class="col-md-12" style="color: red; text-align: left;">Campos obligatorios *</div>
    <br />
    <div class="col-md-12" style="color: #0075b0; font-size: 18px;"><b>Datos básicos</b></div>
    <br />
    <br />

    <div class="col-md-12">
        <div class="form-group">
            <label>
                Razón social <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help1').css('display','block')" onmouseout="$('#help1').css('display','none')"></i>
                <span class="tooltiptext" id="help1" style="display: none;">Nombre o razón social de la empresa</span>
            </label>
            <input type="text" id="raz" class="form-control inps-forms" onkeyup="Maius2()" onblur="Maius2()" placeholder="Razón social empresa" />
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>Actividad económica<span style="color: red;">*</span></label><span class="busqueda"><i class="fa fa-search" onclick="CargarActEco()"></i></span>
            <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help2').css('display','block')" onmouseout="$('#help2').css('display','none')"></i>
            <span class="tooltiptext" id="help2" style="display: none;">Actividad económica de la empresa</span>
            <select id="act" class="custom-select inps-forms mb-3">
                <option value="0">Seleccione...</option>
                <?php include("activi_eco.php");
          listaractivi_eco();
				?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Nit <span style="color: red;">*</span>
                <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help3').css('display','block')" onmouseout="$('#help3').css('display','none')"></i>
                <span class="tooltiptext" id="help3" style="display: none;">Nit </span>
            </label>
            <input type="text" id="nit" maxlength='14' class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="Nit empresa" />
        </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
            <label>
                Número de verificación <span style="color: red;">*</span>
                <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help333').css('display','block')" onmouseout="$('#help333').css('display','none')"></i>
                <span class="tooltiptext" id="help333" style="display: none;">Número de verificación del NIT</span>
            </label>
            <input type="text" id="num_ver"  maxlength='1' class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="Número de verificación" />
           
        </div>
    </div>
      <div class="col-md-3">
        <div class="form-group">
            <label>
                Fecha de constitución <span style="color: red;">*</span>
                <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help333_1').css('display','block')" onmouseout="$('#help333_1').css('display','none')"></i>
                <span class="tooltiptext" id="help333_1" style="display: none;">Fecha de constitución de la empresa</span>
            </label>
            <input type="date" id="fec_cons"   class="form-control inps-forms"  />
           
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Tamaño <span style="color: red;">*</span> <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help3300_1').css('display','block')" onmouseout="$('#help3300_1').css('display','none')"></i>
                <span class="tooltiptext" id="help3300_1" style="display: none;">Según anexo 8</span>
            </label>
            <select id="tam" class="custom-select inps-forms mb-3">
                <option value="0">Seleccione...</option>
                <option value="Microempresa">Microempresa</option>
                <option value="Pequeña empresa">Pequeña empresa</option>
                <option value="Mediana Empresa">Mediana empresa</option>
                <option value="Gran Empresa">Gran empresa</option>
            </select>
        </div>
    </div>
    <div class="col-md-3" >
        <div class="form-group">
            <label>Tipo de Proponente <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help3300_11').css('display','block')" onmouseout="$('#help3300_11').css('display','none')"></i>
                <span class="tooltiptext" id="help3300_11" style="display: none;">Según anexo 1</span></label>
            <select id="aluc" class="custom-select inps-forms mb-3">
                <option value="0">Seleccione...</option>
                <option value="EMPRESA">Empresa</option>
                <option value="ORGANIZACION DEL SECTOR PRODUCTIVO">Organización del sector productivo</option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Dirección <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help5').css('display','block')" onmouseout="$('#help5').css('display','none')"></i>
                <span class="tooltiptext" id="help5" style="display: none;">Dirección física de la empresa</span>
            </label>
            <input type="dir" id="dir" class="form-control inps-forms" placeholder="Dirección empresa" />
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>
                Teléfono <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help6').css('display','block')" onmouseout="$('#help6').css('display','none')"></i>
                <span class="tooltiptext" id="help6" style="display: none;">Teléfono de la empresa</span>
            </label>
            <input type="text" id="tel" class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="Teléfono empresa" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Departamento <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help7').css('display','block')" onmouseout="$('#help7').css('display','none')"></i>
                <span class="tooltiptext" id="help7" style="display: none;">Departamento de ubicación de la empresa</span>
            </label>
            <select id="dep" class="custom-select inps-forms mb-3" onchange="CargarCiudades()">
                <option value="0">Seleccione...</option>
                <?php include("ciudad.php");
          listarDep();
				?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Ciudad <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help8').css('display','block')" onmouseout="$('#help8').css('display','none')"></i>
                <span class="tooltiptext" id="help8" style="display: none;">Ciudad de ubicación de la empresa</span>
            </label>
            <select id="ciu" class="custom-select inps-forms mb-3">
                <option value="0">Seleccione...</option>
                <?php 
             listarCiu();
				?>
            </select>
        </div>
    </div>
    <br />
    <br />
    <div class="col-md-12" style="color: #0075b0; font-size: 18px;"><b>Contacto</b></div>
    <br />
    <br />
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Cargo<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help9').css('display','block')" onmouseout="$('#help9').css('display','none')"></i>
                <span class="tooltiptext" id="help9" style="display: none;">Cargo de la persona de contacto con la empresa</span>
            </label>
            <input type="text" id="car_con" class="form-control inps-forms" placeholder="Cargo contacto" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Nombres y apellidos <span style="color: red;">*</span>
                <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help10').css('display','block')" onmouseout="$('#help10').css('display','none')"></i>
                <span class="tooltiptext" id="help10" style="display: none;">Nombre de persona de contacto con la empresa</span>
            </label>
            <input type="text" id="cp" class="form-control inps-forms" placeholder="Nmbres y apellidos contacto" />
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>
                Email <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help11').css('display','block')" onmouseout="$('#help11').css('display','none')"></i>
                <span class="tooltiptext" id="help11" style="display: none;">Email de persona de contacto con la empresa</span>
            </label>
            <input type="text" id="ema" class="form-control inps-forms" placeholder="Email contacto" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Teléfono<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help12').css('display','block')" onmouseout="$('#help12').css('display','none')"></i>
                <span class="tooltiptext" id="help12" style="display: none;">Teléfono de persona de contacto con la empresa</span>
            </label>
            <input type="text" id="tel_con" class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="Teléfono contacto" />
        </div>
    </div>
    <br />
    <br />
    <div class="col-md-12" style="color: #0075b0; margin: 22px 0; font-size: 18px;"><b>Representante legal</b></div>
    <br />
    <br />

    <div class="col-md-4">
        <div class="form-group">
            <label>Tipo documento <span style="color: red;">*</span></label>
            <select id="dcrl" class="custom-select inps-forms mb-3">
                <option value="0">Seleccione...</option>
                <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                <option value="Cédula de extranjería">Cédula de extranjería</option>
                <option value="Pasaporte">Pasaporte</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Número documento <span style="color: red;">*</span></label>
            <input type="text" id="ndoc" class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="N. documento representante" />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Nombre y apellidos <span style="color: red;">*</span></label>
            <input type="text" id="rep" class="form-control inps-forms" placeholder="Nombre representante" />
        </div>
    </div>
    <div class="col-md-3" style="display:none;">
        <div class="form-group">
            <label>Género <span style="color: red;">*</span></label>
            <select id="grl" class="custom-select inps-forms mb-3">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <br />
            <button class="btn-functions" id="btn-add-pers" onclick="GuardarEmp()"><i class="fas fa-check"></i>&nbsp;Guardar</button>
        </div>
    </div>
</div>
<?php }
else{?>
<script>
    location.href = "index.php";
</script>
<?php    
}
?>

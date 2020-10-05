<?php //formulario de empresa vista evaluadores elegibilidad,col productiva y asesor juridico
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==3 || $_COOKIE['user_rol']==7 || $_COOKIE['user_rol']==8  || $_COOKIE['user_rol']==6)){
?>
<br />
<div class="row">
    <div class="col-md-12" style="color: #0075b0; font-size: 18px; text-align: center;"><b>Datos básicos</b></div>
    <br />
    <br />

    <div class="col-md-12">
        <div class="form-group">
            <label>
                Razón social<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help11ASD').css('display','block')" onmouseout="$('#help11ASD').css('display','none')"></i>
                <span class="tooltiptext" id="help11ASD" style="display: none;">Nombre o razón social de la empresa</span>
            </label>
            <textarea id="raz" class="form-control inps-forms" disabled=""></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>
                Actividad económica<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help2ASD').css('display','block')" onmouseout="$('#help2ASD').css('display','none')"></i>
                <span class="tooltiptext" id="help2ASD" style="display: none;">Actividad económica de la empresa</span>
            </label>
            <select id="act" class="custom-select inps-forms mb-3" disabled>
                <?php include("activi_eco.php");
          listaractivi_eco();
				?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Nit<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help3ASD').css('display','block')" onmouseout="$('#help3ASD').css('display','none')"></i>
                <span class="tooltiptext" id="help3ASD" style="display: none;">Nit - incluir dígito de verificación</span>
            </label>
            <input type="hidden" id="id" />
            <input type="text" id="nit" maxlength='14' class="form-control inps-forms" onkeypress="return soloNumeros(event)" disabled="" />
        </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
            <label>
                Número de verificación 
                <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help333').css('display','block')" onmouseout="$('#help333').css('display','none')"></i>
                <span class="tooltiptext" id="help333" style="display: none;">Número de verificación del NIT</span>
            </label>
            <input type="text" id="num_ver" disabled  maxlength='1' class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="Número de verificación" />
           
        </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
            <label>
                Fecha de constitución  
                <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help333_1').css('display','block')" onmouseout="$('#help333_1').css('display','none')"></i>
                <span class="tooltiptext" id="help333_1" style="display: none;">Fecha de constitución de la empresa</span>
            </label>
            <input type="date" id="fec_cons"  class="form-control inps-forms" disabled />
           
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Tamaño<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help4ASD').css('display','block')" onmouseout="$('#help4ASD').css('display','none')"></i>
                <span class="tooltiptext" id="help4ASD" style="display: none;">Según anexo 8</span>
            </label>
            <select id="tam" class="custom-select inps-forms mb-3" disabled>
                <option value="Microempresa">Microempresa</option>
                <option value="Pequeña empresa">Pequeña empresa</option>
                <option value="Mediana Empresa">Mediana empresa</option>
                <option value="Gran Empresa">Gran empresa</option>
            </select>
        </div>
    </div>
     <div class="col-md-6" >
        <div class="form-group">
            <label>Tipo de Proponente <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help3300_11').css('display','block')" onmouseout="$('#help3300_11').css('display','none')"></i>
                <span class="tooltiptext" id="help3300_11" style="display: none;">Según anexo 1</span></label>
            <select id="aluc" class="custom-select inps-forms mb-3" disabled>
                <option value="EMPRESA">Empresa</option>
                <option value="ORGANIZACION DEL SECTOR PRODUCTIVO">Organización del sector productivo</option>
            </select>
        </div>
    </div>
    <div class="col-md-3" style="display: none;">
        <div class="form-group">
            <label>Entidad con ánimo de lucro</label>
            <select id="aluc" class="custom-select inps-forms mb-3" disabled="">
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Dirección<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help5ASD').css('display','block')" onmouseout="$('#help5ASD').css('display','none')"></i>
                <span class="tooltiptext" id="help5ASD" style="display: none;">Dirección física de la empresa</span>
            </label>
            <input type="dir" id="dir" class="form-control inps-forms" disabled="" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Teléfono<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help6ASD').css('display','block')" onmouseout="$('#help6ASD').css('display','none')"></i>
                <span class="tooltiptext" id="help6ASD" style="display: none;">Teléfono de la empresa</span>
            </label>
            <input type="text" id="tel" class="form-control inps-forms" disabled="" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>
                Departamento<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help7ASD').css('display','block')" onmouseout="$('#help7ASD').css('display','none')"></i>
                <span class="tooltiptext" id="help7ASD" style="display: none;">Departamento de ubicación de la empresa</span>
            </label>
            <select id="dep" disabled="" class="custom-select inps-forms mb-3" onchange="CargarCiudades()">
                <?php include("ciudad.php");
          listarDep();
				?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>
                Ciudad<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help8ASD').css('display','block')" onmouseout="$('#help8ASD').css('display','none')"></i>
                <span class="tooltiptext" id="help8ASD" style="display: none;">Ciudad de ubicación de la empresa</span>
            </label>
            <select id="ciu" class="custom-select inps-forms mb-3" disabled="">
                <?php 
             listarCiu();
				?>
            </select>
        </div>
    </div>
    <br />
    <br />
    <div class="col-md-12" style="color: #0075b0; font-size: 18px; text-align: center;"><b>Contacto</b></div>
    <br />
    <br />
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Cargo<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help9AS').css('display','block')" onmouseout="$('#help9AS').css('display','none')"></i>
                <span class="tooltiptext" id="help9AS" style="display: none;">Cargo de la persona de contacto con la empresa</span>
            </label>
            <input type="text" id="car_con" class="form-control inps-forms" disabled="" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Nombres y apellidos<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help10AS').css('display','block')" onmouseout="$('#help10AS').css('display','none')"></i>
                <span class="tooltiptext" id="help10AS" style="display: none;">Nombre de persona de contacto con la empresa</span>
            </label>
            <input type="text" id="cp" class="form-control inps-forms" disabled="" />
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>
                Email<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help11AS').css('display','block')" onmouseout="$('#help11AS').css('display','none')"></i>
                <span class="tooltiptext" id="help11AS" style="display: none;">Email de persona de contacto con la empresa</span>
            </label>
            <input type="text" id="ema" class="form-control inps-forms" disabled="" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>
                Telefono<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help12AS').css('display','block')" onmouseout="$('#help12AS').css('display','none')"></i>
                <span class="tooltiptext" id="help12AS" style="display: none;">Teléfono de persona de contacto con la empresa</span>
            </label>
            <input type="text" id="tel_con" class="form-control inps-forms" disabled="" />
        </div>
    </div>

    <br />
    <br />
    <div class="col-md-12" style="color: #0075b0; margin: 22px 0; font-size: 18px; text-align: center;"><b>Representante legal</b></div>
    <br />
    <br />

    <div class="col-md-4">
        <div class="form-group">
            <label>Tipo documento</label>
            <select id="dcrl" disabled="" class="custom-select inps-forms mb-3">
                <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                <option value="Cédula de extranjería">Cédula de extranjería</option>
                <option value="Pasaporte">Pasaporte</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Número documento</label>
            <input disabled="" type="text" id="ndoc" class="form-control inps-forms" onkeypress="return soloNumeros(event)" />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Nombre y apellidos</label>
            <input type="text" id="rep" disabled="" class="form-control inps-forms" />
        </div>
    </div>
    <div class="col-md-3" style="display:none;">
        <div class="form-group">
            <label>Género </label>
            <select disabled="" id="grl" class="custom-select inps-forms mb-3">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
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

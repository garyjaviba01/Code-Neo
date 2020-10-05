<?php //asignar asesor juridico a proyecto
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5)){?>
<br />

<div class="row" id="divpro" style="text-align: left;">
    <div class="col-md-12" style="text-align: center; margin-bottom: 25px;"><h5 style="color: #196b95;">Asignación de Asesor Jurídico - Abogado</h5></div>
    <div class="col-md-12">
        <div class="form-group">
            <button class="btn-functions" id="btnsinasigele" style="width: 100% !important;" onclick="ListarsinasigeleJur()">
                Proyectos sin asignar elegibilidad
                <?php 
include("../../phpMVC/Model/class.php");$obj=new transacciones;
echo $obj->ProSinAsigEleJur(); ?>
            </button>
        </div>
    </div>

    <div class="col-md-6" style="display:none;">
        <div class="form-group">
            <label>
                Convocatoria <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help1').css('display','block')" onmouseout="$('#help1').css('display','none')"></i>
                <span class="tooltiptext" id="help1">Seleccione la convocatoria para que se carguen los proyectos asociados</span>
            </label>
            <select id="conv" class="custom-select inps-forms mb-3" onchange="cambiarproJur()">
                <?php 

echo $obj->ComboConvo(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Proyectos por asignar</label><span class="busqueda"><i class="fa fa-search" onclick="CargarProasigJur()"></i></span>
            <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help2').css('display','block')" onmouseout="$('#help2').css('display','none')"></i>
            <span class="tooltiptext" id="help2">Proyecto al que desea asignarle un evaluador</span>
            <select id="pro" class="custom-select inps-forms mb-3"> </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>
                Evaluador <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help3').css('display','block')" onmouseout="$('#help3').css('display','none')"></i>
                <span class="tooltiptext" id="help3">Evaluador que va asignar al proyecto</span>
            </label>
            <select id="usu" class="custom-select inps-forms mb-3">
                <?php 
echo $obj->ComboEvaluadoresEleJur(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>
                Fase <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help4').css('display','block')" onmouseout="$('#help4').css('display','none')"></i>
                <span class="tooltiptext" id="help4">Fase que tiene en cuenta el sistema, para carga de proyectos</span>
            </label>
            <select id="fase" class="custom-select inps-forms mb-3">
                <option value="ele" selected disabled>Elegibilidad</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>
                Bloque de criterios<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help5').css('display','block')" onmouseout="$('#help5').css('display','none')"></i>
                <span class="tooltiptext" id="help5">Criterios que asigna al evaluador</span>
            </label>
            <select id="Criterios" class="custom-select inps-forms mb-3" multiple style="display:none;" >
                <?php 
echo $obj->ComboCrieleJur(); ?>
            </select>
             <select id="Criterios2" class="custom-select inps-forms mb-3" multiple style="height: 170px !important;" disabled>
                <?php 
echo $obj->ComboCrieleJur_(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-12" style="text-align: center;">
        <div class="form-group">
            <button class="btn-functions" id="btn-add-pers" onclick="AddasigJur()" style="width: 100%;"><i class="fas fa-save"></i>&nbsp;Asignar</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <button class="btn-functions btn-functions-active" id="btnasigele" disabled style="width: 100% !important;">
                Lista de asignados <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help6').css('display','block')" onmouseout="$('#help6').css('display','none')"></i>
                <span class="tooltiptext" id="help6">Proyectos asignados a asesores en evaluación de elegibiidad</span>
            </button>
        </div>
    </div>

    <div class="col-md-12" id="list_asig"></div>
</div>

<script>
    $(document).ready(function () {
        cambiarproJur();
    });
</script>
<?php }
else{?>
<script>
    location.href = "index.php";
</script>
<?php    
}
?>

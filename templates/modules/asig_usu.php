<?php //asignar usuario evaluador elegibilidad
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5)){?>
<br />

<div class="row" id="divpro" style="text-align: left;">
    <div class="col-md-12" style="text-align: center; margin-bottom: 25px;"><h5 style="color: #196b95;">Asignación de evaluadores a los proyectos</h5></div>
    <div class="col-md-6">
        <div class="form-group">
            <button class="btn-functions" id="btnsinasigele" style="width: 100% !important;" onclick="Listarsinasigele()">
                Proyectos sin asignar elegibilidad
                <?php 
include("../../phpMVC/Model/class.php");$obj=new transacciones;
echo $obj->ProSinAsigEle(); ?>
            </button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group"><!--onclick="Listarsinasigvia()"-->
            <button class="btn-functions" id="btnsinasigvia" style="width: 100% !important;" onclick="Listarsinasigvia()" >
                Proyectos sin asignar viabilidad
                <?php 
echo $obj->ProSinAsigVia(); ?>
            </button>
        </div>
    </div>
    <div class="col-md-6" style="display:none;">
        <div class="form-group">
            <label>
                Convocatoria <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help1').css('display','block')" onmouseout="$('#help1').css('display','none')"></i>
                <span class="tooltiptext" id="help1">Seleccione la convocatoria para que se carguen los proyectos asociados</span>
            </label>
            <select id="conv" class="custom-select inps-forms mb-3" onchange="cambiarpro()">
                <?php 

echo $obj->ComboConvo(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Proyectos por asignar</label><span class="busqueda"><i class="fa fa-search" onclick="CargarProasig()"></i></span>
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
echo $obj->ComboEvaluadoresEle(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>
                Fase <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help4').css('display','block')" onmouseout="$('#help4').css('display','none')"></i>
                <span class="tooltiptext" id="help4">Al seleccionar la fase, se cargan los proyectos y evaluadores asociados</span>
            </label>
            <select id="fase" class="custom-select inps-forms mb-3" onchange="cambiarpro2()">
                <option value="ele">Elegibilidad</option>
                <option value="via">Viabilidad</option>
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
echo $obj->ComboCriele_(); ?>
            </select>
            <select id="Criterios2" class="custom-select inps-forms mb-3" multiple style="height: 170px !important;" disabled>
                <?php 
echo $obj->ComboCriele_M(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-12" style="text-align: center;">
        <div class="form-group">
            <button class="btn-functions" id="btn-add-pers" onclick="Addasig()" style="width: 100%;"><i class="fas fa-save"></i>&nbsp;Asignar</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <button class="btn-functions btn-functions-active" id="btnasigele" disabled style="width: 100% !important;">
                Lista asignados elegibilidad <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help6').css('display','block')" onmouseout="$('#help6').css('display','none')"></i>
                <span class="tooltiptext" id="help6">Proyectos asignados en evaluación de elegibiidad</span>
            </button>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <button class="btn-functions" id="btnasigvia" style="width: 100% !important;" disabled>
                Lista asignados viabilidad <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help7').css('display','block')" onmouseout="$('#help7').css('display','none')"></i>
                <span class="tooltiptext" id="help7">Proyectos asignados en evaluación de viabiidad</span>
            </button>
        </div>
    </div>

    <div class="col-md-12" id="list_asig"></div>
</div>

<script>

    $(document).ready(function() {
    <?php if(isset($_REQUEST['fase'])){
    if($_REQUEST['fase']==1)
    echo "$('#fase').val('ele')";
    else
    echo "$('#fase').val('via')";
    }
    ?>
    cambiarpro();
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

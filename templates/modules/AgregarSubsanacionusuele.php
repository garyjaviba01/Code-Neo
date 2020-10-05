<?php
//agregar subsanaciones 
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==3)
{?>
<br />
<button class="btn-functions btn-functions-active" id="btnsub1" onclick="SubsanarPro3()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar</button>
<button id="btnsub2" class="btn-functions" onclick="listadoSubseleusu()"><i class="fas fa-list-ol"></i>&nbsp;Listado</button><br />
<div class="row">
    <div class="col-md-6" style="margin-top: 8px;">
        <b>Requisitos</b>
        <select class="form-control inps-forms" id="requi">
            <?php include("../../phpMVC/Model/class.php");
$obj=new transacciones;
echo $obj->ComboCrielee($_REQUEST['conv'],$_REQUEST['pro']); ?>
        </select>
    </div>
    <div class="col-md-6" style="margin-top: 8px;"><b>Observación evaluador</b> <textarea id="obs_eva" class="form-control inps-forms"></textarea></div>

    <div class="col-md-12" style="margin-top: 8px; text-align: center;">
        <button class="btn-functions" onclick="NuevaSubsanacion()"><i class="fas fa-plus"></i>&nbsp;Guardar &nbsp;<span id="loadsavesub"></span></button><br />
    </div>
</div>
<br />
<?php }
else{?>
<script>
    $(document).ready(function () {
        location.reload();
    });
</script>
<?php    
}
?>

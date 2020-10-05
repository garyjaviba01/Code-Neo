<?php // causales de rechazo
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==5){?>
<div class="row">
    <div class="col-md-12" style="color: red; text-align: left;">Campos obligatorios *</div>
    <br />
    <div class="col-md-6" style="display:none;">
        <div class="form-group">
            <label>
                Convocatoria <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help1').css('display','block')" onmouseout="$('#help1').css('display','none')"></i>
                <span class="tooltiptext" id="help1" style="display: none;">Convocatoria a la cual se agregan los criterios </span>
            </label>
            <select id="conv" class="custom-select inps-forms mb-3">
                <?php include("../../phpMVC/Model/class.php");
             $obj=new transacciones;
             echo $obj->ComboConvo(); ?>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>
                Causa de rechazo <span style="color: red;">*</span>
                <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help3').css('display','block')" onmouseout="$('#help3').css('display','none')"></i>
                <span class="tooltiptext" id="help3" style="display: none;">Causa a tener en cuenta para rechazar el proyecto</span>
            </label>
            <textarea id="causa" class="form-control inps-forms" placeholder="Causa de rechazo"></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>
                Información de ayuda <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help4').css('display','block')" onmouseout="$('#help4').css('display','none')"></i>
                <span class="tooltiptext" id="help4" style="display: none;">Texto de ayuda que visualiza el evaluador en el requisito</span>
            </label>
            <textarea id="ayu" class="form-control inps-forms" placeholder="Ayuda del requisito"></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <br />
            <button class="btn-functions" id="btn-add-pers" onclick="GuardarCausa()"><i class="fas fa-check"></i>&nbsp;Guardar</button>
            <button class="btn-functions" id="btn-add-pers" onclick="LCau()"><i class="fas fa-list"></i>&nbsp;Listado</button>
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

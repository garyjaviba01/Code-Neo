<?php //DIPARA LISTADO DE PROYECTO EN ELEGIBILIDAD VISTA ASESOR JURIDICO
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==6){?>
<select id="conv" class="form-control" onchange="ListProevaeleusu()">
    <?php include("../../phpMVC/Model/class.php");
$obj=new transacciones;
echo $obj->ComboConvo(); ?>
</select>
<div id="listpro" style="width: 100%; padding-top: 10px;"></div>
<script>
    $(document).ready(function () {
        ListProevaeleusuJur();
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

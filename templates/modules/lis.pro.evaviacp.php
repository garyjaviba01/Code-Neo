<?php //DIPARA LISTADO DE PROYECTO EN VIABILIDAD VISTA COLOMBIA PRODUCTIVA
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==7 || $_COOKIE['user_rol']==8)){?>
<select id="conv" class="form-control" onchange="ListProevaviacp()">
    <?php include("../../phpMVC/Model/class.php");
$obj=new transacciones;
echo $obj->ComboConvo(); ?>
</select>
<div id="listpro" style="width: 100%; padding-top: 10px;"></div>
<script>
    $(document).ready(function () {
        ListProevaviacp();
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

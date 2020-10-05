<?php //CARGAR CONVOCATORIAS Y DISPARAR FUNCION DE IFRAME GRAFICA POR PROYECTOS
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5 || $_COOKIE['user_rol']==7 || $_COOKIE['user_rol']==8)){?>
<select id="conv" class="form-control" onchange="ChartProyectos()">
    <?php include("../../phpMVC/Model/class.php");
$obj=new transacciones;
echo $obj->ComboConvo(); ?>
</select>
<div id="Graficas" style="width: 100%; background: #f9fbfc; padding-top: 10px;"></div>
<script>
    $(document).ready(function () {
        ChartProyectos($("#btnpro"));
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

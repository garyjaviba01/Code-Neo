<?php //session_start();
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==7 || $_COOKIE['user_rol']==8)){?><select id="conv" class="form-control" onchange="ListCausalesCp()">
<?php include("../../phpMVC/Model/class.php");
$obj=new transacciones;
echo $obj->ComboConvo();
				?>
</select>
<div id='listcausa' style='width: 100%;padding-top: 10px;'></div>
<script> 

$(document).ready(function() {
ListCausalesCp();
});
</script>
<?php }
else{?>
<script>

    
 location.href='index.php'   
    

</script>
<?php    
}
?>

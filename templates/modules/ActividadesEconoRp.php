<?php //criterios de viabilidad
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5 || $_COOKIE['user_rol']==7 || $_COOKIE['user_rol']==8)){?>	
			<?php include("../../phpMVC/Model/class.php");
             $obj=new transacciones;
             echo $obj->Act_econo_list($_REQUEST['tot']);
				?>
			
		
	
<?php }
else{?>
<script>

    
 location.href='index.php'   
    

</script>
<?php    
}
?>
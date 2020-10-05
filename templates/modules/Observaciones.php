<?php //session_start();
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==5 ){?>

<?php include("../../phpMVC/Model/class.php");
$obj=new transacciones;
				?>
<div id='lb11' style='width: 100%;padding-top: 10px;'>
 <?php
 $obj->lObserv();
 ?>   
    
    
</div>

<?php    
}
?>
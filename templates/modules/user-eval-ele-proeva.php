<?php
//session_start();
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==3)
{
include("../../models/EvalModel.php");
$obj= new  EvalMDL;
$conv="";
if(isset($_GET['pro']))
$conv=$_GET['pro'];
?>
<select id="pro" class="form-control" onchange="DataProEva('')" ><?php echo $obj->comboporyMDL($conv);?>
</select>  
<div class="cont-convo-fun" id="cont-convo-fun" >
     
</div>
<script>
$(document ).ready(function() {
    
   DataProEva(3)
    
    
});    
</script>
<?php }
else{?>
<script>
$(document ).ready(function() {
    
 location.reload()   
    
});    
</script>
<?php    
}
?>

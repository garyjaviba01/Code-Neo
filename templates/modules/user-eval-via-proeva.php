<?php 
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==4)
{
include("../../models/EvalModel.php");
$obj= new  EvalMDL;
$conv="";
if(isset($_GET['pro']))
$conv=$_GET['pro'];
?>
<select id="pro" class="form-control" onchange="DataProEva2('')" ><?php echo $obj->comboporyMDL($conv);?>
</select>  
<div class="cont-convo-fun" id="cont-convo-fun" >
     
</div>
<script>
$(document ).ready(function() {
   
   DataProEva2(3)
    
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

<?php
//session_start();
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==4)
{
include("../../models/EvalModel.php");
$obj= new  EvalMDL;
$conv="";
if(isset($_GET['conv']))
$conv=$_GET['conv'];
?>
<select id="convoca" class="form-control" onchange="DatainitialPro2('')" ><?php echo $obj->comboConvoMDL($conv);?>
</select>  
<div class="cont-convo-fun" id="cont-convo-fun" >
     
</div>
<script>
$(document ).ready(function() {
    
   <?php if($conv!="" && $conv!="0" ) echo "DatainitialPro2($conv);"?> 
    
    
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

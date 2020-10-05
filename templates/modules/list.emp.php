<?php //session_start();
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==2 || $_COOKIE['user_rol']==5) ){?>
<div id='listemp' style='width: 100%;padding-top: 10px;'></div>
<script> 

$(document).ready(function() {
ListEmp();
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
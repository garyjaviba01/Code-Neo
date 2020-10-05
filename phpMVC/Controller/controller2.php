<?php include "../Model/class2.php";
$objeto = new transacciones();
// se pregunta por la variable f  para saber aque accion ejecutar
switch ($_POST['f']) {
    case "Listarsinasigele":
        $objeto->Listarsinasigele();
        break;
    case "Listarsinasigvia":
        $objeto->Listarsinasigvia();
        break;
    case "ListarsinasigeleJur":
        $objeto->ListarsinasigeleJur();
        break;
    case "list_pro_sigp":
        echo $objeto->list_pro_sigp();
        break;   
     case "CargarProSIGP":
        
        $objeto->CargarProSIGP();
       
        break; 
         case "CargarDatosDerPet":
        
        echo $objeto->CargarDatosDerPet($_POST['id']);
       
        break;     
        
     case "BuscarempresaSIGP":
        
        $objeto->BuscarempresaSIGP($_POST['sigp']);
       
        break;  
         case "Del_DP":
        
        if($objeto->Del_DP($_POST['id']))
        {
            echo "Derecho de petición eliminado";
        }
        else{
            
            echo "No fue posible eliminar el derecho de petición<br>Verifique los detalles";
        }
       
        break;  
}

?>

<?php include "../Model/class.php";
$objeto = new transacciones();
// se pregunta por la variable f  para saber aque accion ejecutar
switch ($_POST['f']) {
    case "gcele":
        if ($objeto->guardarCriEle($_POST['conv'], $_POST['tipo'], $_POST['req'], $_POST['ayu'])) {
            echo "Criterio guardado";
        } else {
            echo "Error al guardar los datos";
        }
        break;
    case "gcau":
        if ($objeto->guardarCausal($_POST['conv'], $_POST['cau'], $_POST['ayu'])) {
            echo "Causa de rechazo guardada";
        } else {
            echo "Error al guardar los datos";
        }
        break;
 case "editarObservacion":
       echo $objeto->editarObservacion($_POST['id'],$_POST['obs']) ; 
       break;
 case "DelObservacion":
       echo $objeto->DelObservacion($_POST['id']) ; 
       break; 
       
  case "DelConEle":
       echo $objeto->DelConEle($_POST['cod'],$_POST['usu'],$_POST['pro']) ; 
       break; 
          
  case "DelConVia":
       echo $objeto->DelConVia($_POST['cod'],$_POST['usu'],$_POST['pro']) ; 
       break; 
       
 case "UndoProyectEle":
       echo $objeto->UndoProyectEle($_POST['cod']) ; 
       break;
case "UndoProyectVia":
       echo $objeto->UndoProyectVia($_POST['cod']) ; 
       break;  
      case "Conflicto_int_ele":
       echo $objeto->Conflicto_int_ele($_POST['pro']) ; 
       break;
case "Conflicto_int_via":
       echo $objeto->Conflicto_int_via($_POST['pro']) ; 
       break;   
       
  case "RegistrarConflictoEle" :
       echo $objeto->RegistrarConflictoEle($_POST['pro'],$_POST['sino'],$_POST['npro']) ; 
       break;
   case "RegistrarConflictoVia" :
       echo $objeto->RegistrarConflictoVia($_POST['pro'],$_POST['sino'],$_POST['npro']) ; 
       break;
           
    case "ucau":
        if ($objeto->actualizarCausal($_POST['cod'], $_POST['conv'], $_POST['cau'], $_POST['ayu'])) {
            echo "Causa de rechazo actualizada";
        } else {
            echo "Error al guardar los datos";
        }
        break;
    case "acele":
        if ($objeto->actualizarCriEle($_POST['conv'], $_POST['tipo'], $_POST['req'], $_POST['ayu'], $_POST['cod'])) {
            echo "Criterio actualizado";
        } else {
            echo "Error al guardar los datos";
        }
        break;

    case "lcriele":
        $objeto->lcriele($_POST['cod']);
        break;
        
    case "ProSinAsigEle":
        echo $objeto->ProSinAsigEle();
        break;  
     case "ProSinAsigVia":
        echo $objeto->ProSinAsigVia();
        break;      
    case "lcausa":
        $objeto->lcausa($_POST['cod']);
        break;
    case "lcausacp":
        $objeto->lcausacp($_POST['cod']);
        break;

    case "BuscarNotificaciones":
        $objeto->BuscarNotificaciones();
        break;
    case "CargarProasig":
        $objeto->CargarProasig($_POST['conv'], $_POST['tipo']);
        break;
    case "CargarProasigJur":
        $objeto->CargarProasigJur($_POST['conv'], $_POST['tipo']);
        break;
    case "CargarEmpPro":
        if($_COOKIE['user_rol']==5)
        $objeto->CargarEmpPro($_POST['conv']);
        else
        $objeto->CargarEmpProaux($_POST['conv']);
        break;
     case "CargarEmpProDP":
        
        $objeto->CargarEmpProDP();
          
         break;   
        
     case "CargarCenFor_fil":
        $objeto->CargarCenFor_fil($_POST['conv']);
        break;

    case "VerAsigele":
        if ($_COOKIE['user_rol'] == 5) {
            $objeto->VerAsigele($_POST['cod'], $_POST['id']);
        } else {
            $objeto->VerAsigele2($_POST['cod'], $_POST['id']);
        }
        break;
    case "VerAsigvia":
        $objeto->VerAsigvia($_POST['cod'], $_POST['id']);
        break;
    case "CargarAct_eco":
        $objeto->CargarAct_eco($_POST['conv']);
        break;

    case "ResetSonidos":
        $objeto->ResetSonidos();
        break;

    case "ResetVisto":
        $objeto->ResetVisto();
        break;

    case "lcrielecp":
        $objeto->lcrielecp($_POST['cod']);
        break;

    case "CargarDatosEmpusu":
        $objeto->CargarDatosEmpusu($_POST['id']);
        break;
    case "CargarDatosEmpresaupd":
        $objeto->CargarDatosEmpresaupd($_POST['id']);
        break;
    case "CargarDatosCrieleupd":
        $objeto->CargarDatosCrieleupd($_POST['id']);
        break;
    case "CargarDatosCausaupd":
        $objeto->CargarDatosCausaupd($_POST['id']);
        break;

    case "CargarDatosCriviaupd":
        $objeto->CargarDatosCriviaupd($_POST['id']);
        break;
    case "CargarDatosCriviaAdiupd":
        $objeto->CargarDatosCriviaAdiupd($_POST['id']);
        break;

    case "CargarDatosEmpusu2":
        $objeto->CargarDatosEmpusu2($_POST['id']);
        break;
    case "CargarDatosPro":
        $objeto->CargarDatosPro($_POST['id']);
        break;

    case "CargarPt":
        $objeto->CargarPt($_POST['pro']);
        break;
    case "CargarCF":
        $objeto->CargarCF($_POST['pt']);
        break;
    case "CargarCF2":
        $objeto->CargarCF2($_POST['pt']);
        break;

    case "CargarPteva":
        $objeto->CargarPteva($_POST['pro']);
        break;
    case "CargarDivsub":
        $objeto->CargarDivsub($_POST['pro']);
        break;
    case "CargarDivsubusu":
        if($_COOKIE['user_rol']==3)
        $objeto->CargarDivsubusu($_POST['pro']);
        else
        $objeto->CargarDivsubusuJur($_POST['pro']);
        break;
    case "CargarDivcorusu":
        $objeto->CargarDivcorusu($_POST['pro']);
        break;
    case "CargarDivsub2":
        $objeto->CargarDivsub2($_POST['pro']);
        break;
     case "CargarDivsub3":
        $objeto->CargarDivsub22($_POST['pro']);
        break;    
    case "CargarDivcor":
        $objeto->CargarDivcor($_POST['pro']);
        break;
    case "CargarDivcor2":
        $objeto->CargarDivcor2($_POST['pro']);
        break;
    case "CargarAnex":
        $objeto->CargarAnex($_POST['pro']);
        break;

    case "CargarAnexeva":
        $objeto->CargarAnexeva($_POST['pro']);
        break;

    case "ConsultaTiempo":
        echo $objeto->ConsultaTiempo($_POST['cod']);
        break;
    case "ConsultaUsuario":
        echo $objeto->ConsultaUsuario();
        break;
    case "EvaluarCausales":
        echo $objeto->EvaluarCausales($_POST['id']);
        break;    
     case "EvaluarCausalesView":
        echo $objeto->EvaluarCausalesView($_POST['id']);
        break;        
        
    case "DelCriEle":
        if ($objeto->DelCriEle($_POST['cod'])) {
            echo "Criterio eliminado";
        } else {
            echo "Error al eliminar el criterio";
        }
        break;
    case "DelCausa":
        if ($objeto->DelCausa($_POST['cod'])) {
            echo "Causa de rechazo eliminada";
        } else {
            echo "Error al eliminar la causa";
        }
        break;

    case "DelCriViapunadc":
        if ($objeto->DelCriViapunadc($_POST['cod'])) {
            echo "Criterio eliminado";
        } else {
            echo "Error al eliminar el criterio";
        }
        break;
    case "DelObjEsp":
        if ($objeto->DelObjEsp($_POST['cod'])) {
            echo "Objetivo eliminado";
        } else {
            echo "Error al eliminar el Objetivo";
        }
        break;
    case "Delprodu":
        if ($objeto->Delprodu($_POST['cod'])) {
            echo "Producto eliminado";
        } else {
            echo "Error al eliminar el producto";
        }
        break;
    case "gcvia":
        if ($objeto->guardarCriVia($_POST['conv'], $_POST['tipo'], $_POST['req'], $_POST['pun'], $_POST['ayu'])) {
            echo "Criterio guardado";
        } else {
            echo "Error al guardar los datos";
        }
        break;
    case "gcviaadi":
        if ($objeto->guardarCriViapunadi($_POST['conv'], $_POST['tipo'], $_POST['req'], $_POST['pun'], $_POST['ayu'])) {
            echo "Criterio guardado";
        } else {
            echo "Error al guardar los datos";
        }
        break;

    case "acvia":
        if ($objeto->actualizarCriVia($_POST['conv'], $_POST['tipo'], $_POST['req'], $_POST['pun'], $_POST['ayu'], $_POST['cod'])) {
            echo "Criterio actualizado";
        } else {
            echo "Error al actualizar los datos";
        }
        break;

    case "acviaadc":
        if ($objeto->actualizarCriViaadc($_POST['conv'], $_POST['tipo'], $_POST['req'], $_POST['pun'], $_POST['ayu'], $_POST['cod'])) {
            echo "Criterio actualizado";
        } else {
            echo "Error al actualizar los datos";
        }
        break;

    case "lcrivia":
        $objeto->lcrivia($_POST['cod']);
        break;

    case "lcriviacp":
        $objeto->lcriviacp($_POST['cod']);
        break;
    case "lemp":
        $objeto->lemp();
        break;
     case "lempReg":
        $objeto->lempReg();
        break;    
    case "lemp2":
        $objeto->lempaux();
        break;    
    case "lempcp":
        $objeto->lempcp();
        break;
    case "UpdStatproele":
        $objeto->UpdStatproele($_POST['cod'], $_POST['ele'], $_POST['nom']);
        break;
    case "CargarDivevaele":
        //session_start();
        if ($_COOKIE['user_rol'] == 5 || $_COOKIE['user_rol'] == 2) {
            $objeto->CargarDivevaele($_POST['cod'], $_POST['pro']);
        } else {
            $objeto->CargarDivevaele2($_POST['cod'], $_POST['pro']);
        }
        break;

    case "CargarDivevaele_":
        //session_start();
        if ($_COOKIE['user_rol'] == 3) {
            $objeto->CargarDivevaele_($_POST['cod'], $_POST['pro']);
        }
        break;
    case "CargarDivevaele_Jur":
        //session_start();
        if ($_COOKIE['user_rol'] == 6) {
            $objeto->CargarDivevaele_Jur($_POST['cod'], $_POST['pro']);
        }
        break;

    case "CargarDivevavia":
        //session_start();
        if ($_COOKIE['user_rol'] == 5 || $_COOKIE['user_rol'] == 2 || $_COOKIE['user_rol'] == 7) {
            //$objeto->CargarDivevavia($_POST['cod'], $_POST['pro'],false,0);
            $objeto->CargarEvaluadoresViaPro($_POST['pro'],$_POST['cod']);
        } else {
            $objeto->CargarDivevavia2($_POST['cod'], $_POST['pro']);
        }
        break;
         case "CargarDivevavia_ind":
        
            $objeto->CargarDivevavia_ind($_POST['cod'], $_POST['pro'],$_POST['usu'],$_POST['nom'],$_POST['fec'],$_POST['ult_fec']);
       
        break;
    case "UpdStatprovia":
        $objeto->UpdStatprovia($_POST['cod'], $_POST['via'], $_POST['nom']);
        break;
    case "lpro":
        if($_COOKIE['user_rol']==5)
        {$objeto->lpro($_POST['cod']);}
        else{
          $objeto->lproaux($_POST['cod']);  
        }
        break;
    case "lproReg":
        
          $objeto->lproReg($_POST['cod']);  
        
        break;    

    case "lprocp":
        $objeto->lprocp($_POST['cod']);
        break;

    case "lproevaele":
        $objeto->lproevaele($_POST['cod']);
        break;
    case "lproevavia":
        $objeto->lproevavia($_POST['cod']);
        break;

     case "lconele":
        $objeto->lconele($_POST['cod']);
        break;
    case "lconeleCp":
        $objeto->lconeleCp($_POST['cod']);
        break;    
    case "lconeleusu":
        $objeto->lconeleusu($_POST['cod']);
        break;
    case "lconviausu":
        $objeto->lconviausu($_POST['cod']);
        break;    
    case "lconeleusuJur":
        $objeto->lconeleusuJur($_POST['cod']);
        break;    
    case "lconvia":
        $objeto->lconvia($_POST['cod']);
        break;
    case "lconviaCp":
        $objeto->lconviaCp($_POST['cod']);
        break;    
    case "lproevaelecp":
        $objeto->lproevaelecp($_POST['cod']);
        break;
     case "ListSbsanaciones":
        $objeto->ListSbsanaciones($_POST['cod']);
        break;
    case "ListSbsanacionesCp":
        $objeto->ListSbsanacionesCp($_POST['cod']);
        break;    
    case "lproevaviacp":
        $objeto->lproevaviacp($_POST['cod']);
        break;
    case "lproevaeleaux":
        $objeto->lproevaeleaux($_POST['cod']);
        break;
    case "lproevaviaaux":
        $objeto->lproevaviaaux($_POST['cod']);
        break;

    case "lproevaeleusu":
        $objeto->lproevaeleusu($_POST['cod']);
        break;
    case "lproevaeleusuJur":
        $objeto->lproevaeleusuJur($_POST['cod']);
        break;
    case "lproevaviausu":
        $objeto->lproevaviausu($_POST['cod']);
        break;
    case "Delpro":
        if ($objeto->Delpro($_POST['cod'])) {
            echo "proyecto eliminado";
        } else {
            echo "Error al eliminar el proyecto";
        }
        break;
    case "DelRes":
        if ($objeto->DelRes($_POST['cod'])) {
            echo "Resultado eliminado";
        } else {
            echo "Error al eliminar el resultado";
        }
        break;
    case "DelCriVia":
        if ($objeto->DelCriVia($_POST['cod'])) {
            echo "Criterio eliminado";
        } else {
            echo "Error al eliminar el criterio";
        }
        break;
    case "DelEmp":
        if ($objeto->Delemp($_POST['cod'])) {
            echo "Empresa eliminada";
        } else {
            echo "Error al eliminar la empresa";
        }
        break;
    case "DelCF":
        if ($objeto->DelCF($_POST['cod'])) {
            echo "Centro eliminado";
        } else {
            echo "Error al eliminar el centro";
        }
        break;
    case "DelTem":
        if ($objeto->DelTem($_POST['cod'])) {
            echo "Temática eliminada";
        } else {
            echo "Error al eliminar la temática";
        }
        break;
    case "DelEB":
        if ($objeto->DelEB($_POST['cod'])) {
            echo "Entidad eliminada";
        } else {
            echo "Error al eliminar la Entidad";
        }
        break;    
    case "CambioDep1":
        include "ciudad.php";
        $ciudaddes = "";
        foreach ($ciudad as $valor) {
            if ($valor['departamento'] == $_POST['dep']) {
                if ($valor['codigo'] == $_POST['ciu']) {
                    $ciudaddes .= "<option value='" . $valor['codigo'] . "' selected>" . $valor['nombre'] . "</option>";
                } else {
                    $ciudaddes .= "<option value='" . $valor['codigo'] . "' >" . $valor['nombre'] . "</option>";
                }
            }
        }
        echo $ciudaddes;
        break;
    case "CambioDep2":
        include "ciudad.php";
        global $ciudad;
        $ciudaddes = "<option value='0' >Seleccione...</option>";
        foreach ($ciudad as $valor) {
            if ($valor['departamento'] == $_POST['dep']) {
                $ciudaddes .= "<option value='" . $valor['codigo'] . "' >" . $valor['nombre'] . "</option>";
            }
        }
        echo $ciudaddes;
        break;

    case "gemp":
        if (
            $objeto->guardarEmp(
                $_POST['nit'],
                $_POST['raz'],
                $_POST['act'],
                $_POST['tam'],
                $_POST['ciu'],
                $_POST['dir'],
                $_POST['cp'],
                $_POST['tel'],
                $_POST['ema'],
                $_POST['ndoc'],
                $_POST['dcrl'],
                $_POST['grl'],
                $_POST['aluc'],
                $_POST['rep'],
                $_POST['car_con'],
                $_POST['tel_con'],
                $_POST['num_ver'],
                $_POST['fec_cons']
            )
        ) {
            echo "Empresa guardada";
        } else {
            echo "Error al guardar,verifique NIT";
        }
        break;

    case "aemp":
        if (
            $objeto->editarEmp(
                $_POST['id'],
                $_POST['nit'],
                $_POST['raz'],
                $_POST['act'],
                $_POST['tam'],
                $_POST['ciu'],
                $_POST['dir'],
                $_POST['cp'],
                $_POST['tel'],
                $_POST['ema'],
                $_POST['ndoc'],
                $_POST['dcrl'],
                $_POST['grl'],
                $_POST['aluc'],
                $_POST['rep'],
                $_POST['car_con'],
                $_POST['tel_con'],
                $_POST['num_ver'],
                $_POST['fec_cons']
            )
        ) {
            echo "Empresa actualizada";
        } else {
            echo "Error al modificar";
        }
        break;
    case "gpro":
        $fecha_actual = strtotime(date("Y-m-d"));
        $fecha_rec = strtotime($_POST['fec_rec']);
        if ($_POST['fec_rad'] != null && $_POST['fec_rad'] != "") {
            $fecha_rad = strtotime($_POST['fec_rad']);

            if ($fecha_rec < $fecha_rad) {
                $response = ["Fecha recepción menor a fecha radicación", null];
                echo json_encode($response);
                break;
            } elseif ($fecha_rad > $fecha_actual) {
                $response = ["Fecha radicación mayor a fecha actual", null];
                echo json_encode($response);
                break;
            } elseif ($fecha_rec > $fecha_actual) {
                $response = ["Fecha recepción mayor a fecha actual", null];
                echo json_encode($response);
                break;
            }
             elseif ($fecha_rad < strtotime('21-07-2020')) {
                $response = ["Fecha de radicación menor a permitida
                ", null];
                echo json_encode($response);
                break;
            }
        }
        if ($fecha_rec > $fecha_actual) {
            $response = ["Fecha recepción mayor a fecha actual", null];
            echo json_encode($response);
            break;
        }

        $objeto->guardarPro(
            $_POST['conv'],
            $_POST['emp'],
            $_POST['nom'],
            $_POST['fec_rec'],
            $_POST['num_rad'],
            $_POST['fec_rad'],
            $_POST['duracion'],
            $_POST['val_pro'],
            $_POST['val_fin'],
            $_POST['val_tot_con'],
            $_POST['val_con_din'],
            $_POST['val_con_esp'],
            $_POST['uti_net'],
            $_POST['act_corr'],
            $_POST['pas_corr'],
            $_POST['pas_tot'],
            $_POST['act_tot'],
            $_POST['pas_lar_pla'],
            $_POST['pas_cor_pla'],
            $_POST['EBITDA'],
            $_POST['ciu'],
            $_POST['tip_pro']
        );
        break;
    case "gdapro":
        $objeto->guardardaPro($_POST['id']);
        break;
    case "CargarObjetivos":
        $objeto->CargarObjetivos($_POST['pro']);
        break;
    case "CargarObjetivoseva":
        $objeto->CargarObjetivoseva($_POST['pro']);
        break;
     case "ObservacionesEvaluacion":
        $objeto->ObservacionesEvaluacion($_POST['id']);
        break;
     case "ObservacionesEvaluacion2":
        $objeto->ObservacionesEvaluacion2($_POST['id']);
        break;    
     case "AgregarObservacionPro":
        $objeto->AgregarObservacionPro($_POST['id'],$_POST['obs'],$_POST['fase']);
        break;    
        
    case "ObservacionesEvaluacionV":
        $objeto->ObservacionesEvaluacionV($_POST['id']);
        break; 
    case "ObservacionesEvaluacionV2":
        $objeto->ObservacionesEvaluacionV2($_POST['id']);
        break;        
    case "AddObjGen":
        $objeto->AddObjGen($_POST['pro'], $_POST['obj']);
        break;
    case "calificarElegibilidadUser":
        
        $objeto->calificarElegibilidadUser($_POST['pro'], $_POST['cri'], $_POST['cumple'], $_POST['det'], $_POST['obs'], $_POST['tipo']);
        break;
     
     case "calificarCausalUser":
        
        $objeto->calificarCausalUserM($_POST['pro'], $_POST['cau'], $_POST['cumple'], $_POST['obs']);
        break;
        
    case "calificarElegibilidadUserJur":
        $objeto->calificarElegibilidadUserJur($_POST['pro'], $_POST['cri'], $_POST['cumple'], $_POST['det'], $_POST['obs'], $_POST['tipo']);
        break;

    case "calificarViabilidadUser":
        $objeto->calificarViabilidadUser($_POST['pro'], $_POST['cri'], $_POST['cal'], $_POST['num'], $_POST['obs'], $_POST['tipo']);
        break;

    case "calificarViabilidadUseradc":
        $objeto->calificarViabilidadUseradc($_POST['pro'], $_POST['cri'], $_POST['cal'], $_POST['num'], $_POST['obs'], $_POST['tipo']);
        break;
    case "FcalificarElegibilidadUser_":
        $objeto->FcalificarElegibilidadUser_($_POST['pro'], $_POST['conv'], $_POST['npro'], $_POST['tot']);
        break;
     case "FcalificarElegibilidadUser_Jur":
        $objeto->FcalificarElegibilidadUser_Jur($_POST['pro'], $_POST['conv'], $_POST['npro'], $_POST['tot']);
        break;    
    case "FcalificarViabilidadUser":
        $objeto->FcalificarViabilidadUser($_POST['pro'], $_POST['conv'], $_POST['npro'], $_POST['tot'], $_POST['conf']);
        break;
    case "AddTiempo":
        echo $objeto->AddTiempo($_POST['cod'], $_POST['ce'], $_POST['cv'], $_POST['de'], $_POST['dv']);
        break;
    case "SubsanacionPro2":
        $objeto->SubsanacionPro2($_POST['id'], $_POST['obs_eva'], $_POST['apro']);
        break;

    case "CorreccionPro2":
        $objeto->CorreccionPro2($_POST['id'], $_POST['obs_eva'], $_POST['apro']);
        break;
    case "NuevaSubsanacion":
        $objeto->NuevaSubsanacion($_POST['obs_eva'], $_POST['req'], $_POST['pro'], $_POST['npro'], $_POST['tipo'], $_POST['cumple']);
        break;

    case "NuevaCorreccion":
        $objeto->NuevaCorreccion($_POST['obs_eva'], $_POST['req'], $_POST['pro'], $_POST['npro']);
        break;

    case "EliminarSubsanar":
        $objeto->EliminarSubsanar($_POST['id']);
        break;

    case "EliminarCorregir":
        $objeto->EliminarCorregir($_POST['id']);
        break;
    case "AddPt":
        $objeto->AddPt($_POST['id_pro'], $_POST['nom'], $_POST['val_con'], $_POST['val_fin']);
        break;
    case "edtPT":
        $objeto->edtPT($_POST['cod'], $_POST['nom'], $_POST['val_con'], $_POST['val_fin']);
        break;
    case "SubsanacionPro":
        $archivo = null;
        if (isset($_FILES["formato"])) {
            if ($_FILES["formato"]["size"] < 20000000) {
                if (
                    $_FILES["formato"]["type"] != "text/plain" ||
                    $_FILES["formato"]["type"] != "text/x-php" ||
                    $_FILES["formato"]["type"] != "application/x-php" ||
                    $_FILES["formato"]["type"] != "application/x-httpd-php" ||
                    $_FILES["formato"]["type"] != "application/x-httpd-php-source"
                ) {
                    $rand = rand(99999, 999999);
                    $file = $_FILES["formato"]["name"];
                    $extension = explode(".", $file);
                    $extt = end($extension);
                    $ban = true;
                    if ($extt == "php") {
                        $ban = false;
                    }
                    $nombreNuevo = "arch_" . date('Y') . "_" . $rand . "." . $extt;
                    if ($ban) {
                        if (move_uploaded_file($_FILES["formato"]["tmp_name"], "../../fl-s/ans/" . $nombreNuevo)) {
                            $archivo = "fl-s/ans/" . $nombreNuevo;
                        }
                    }

                    $objeto->SubsanacionPro($_POST['id_sub'], $_POST['obs_eva'], $_POST['num_folio'], $archivo);
                } else {
                    echo "Archivo prohibido!";
                }
            } else {
                echo "El archivo pesa mas de 10MB";
            }
        } else {
            $objeto->SubsanacionPro($_POST['id_sub'], $_POST['obs_eva'], $_POST['num_folio'], $archivo);
        }
        break;
    case "CorreccionPro":
        $archivo = null;
        if ($_FILES["formato"]["size"] < 10000000) {
            if (
                $_FILES["formato"]["type"] != "text/plain" ||
                $_FILES["formato"]["type"] != "text/x-php" ||
                $_FILES["formato"]["type"] != "application/x-php" ||
                $_FILES["formato"]["type"] != "application/x-httpd-php" ||
                $_FILES["formato"]["type"] != "application/x-httpd-php-source"
            ) {
                $rand = rand(99999, 999999);
                $file = $_FILES["formato"]["name"];
                $extension = explode(".", $file);
                $extt = end($extension);
                if ($extt == "php") {
                    echo "Archivo prohibido!";
                    exit();
                }
                $nombreNuevo = "arch_" . date('Y') . "_" . $rand . "." . $extt;
                if (move_uploaded_file($_FILES["formato"]["tmp_name"], "../../fl-s/ans/" . $nombreNuevo)) {
                    $archivo = "fl-s/ans/" . $nombreNuevo;
                }

                $objeto->CorreccionPro($_POST['id_cor'], $_POST['obs_eva'], $_POST['num_folio'], $archivo);
            } else {
                echo "Archivo prohibido!";
            }
        } else {
            echo "El archivo pesa mas de 10MB";
        }

        break;
    case "AddAnex":
        $archivo = null;
        if (isset($_FILES["formato"])) {
            if ($_FILES["formato"]["size"] < 40000000) {
                if (
                    $_FILES["formato"]["type"] != "text/plain" ||
                    $_FILES["formato"]["type"] != "text/x-php" ||
                    $_FILES["formato"]["type"] != "application/x-php" ||
                    $_FILES["formato"]["type"] != "application/x-httpd-php" ||
                    $_FILES["formato"]["type"] != "application/x-httpd-php-source"
                ) {
                    $rand = rand(99999, 999999);
                    $file = $_FILES["formato"]["name"];
                    $extension = explode(".", $file);
                    $extt = end($extension);
                    $ban = true;
                    if ($extt == "php") {
                        $ban = false;
                    }
                    $nombreNuevo = "arch_" . date('Y') . "_" . $rand . "." . $extt;
                    if ($ban) {
                        if (move_uploaded_file($_FILES["formato"]["tmp_name"], "../../fl-s/ans/" . $nombreNuevo)) {
                            $archivo = "fl-s/ans/" . $nombreNuevo;
                        }
                    }
                    $objeto->AddAnex($_POST['id_pro'], $_POST['docu'], $_POST['folio'], $_POST['fec'], $archivo);
                } else {
                    echo "Archivo prohibido!";
                }
            } else {
                echo "El archivo pesa mas de 40MB";
            }
        } else {
            $objeto->AddAnex($_POST['id_pro'], $_POST['docu'], $_POST['folio'], $_POST['fec'], $archivo);
        }

        break;

    case "Addcf":
        $archivo = null;
        if (isset($_FILES["formato"])) {
            if ($_FILES["formato"]["size"] < 40000000) {
                if (
                    $_FILES["formato"]["type"] != "text/plain" ||
                    $_FILES["formato"]["type"] != "text/x-php" ||
                    $_FILES["formato"]["type"] != "application/x-php" ||
                    $_FILES["formato"]["type"] != "application/x-httpd-php" ||
                    $_FILES["formato"]["type"] != "application/x-httpd-php-source"
                ) {
                    $rand = rand(99999, 999999);
                    $file = $_FILES["formato"]["name"];
                    $extension = explode(".", $file);
                    $extt = end($extension);
                    $ban = true;
                    if ($extt == "php") {
                        $ban = false;
                    }
                    $nombreNuevo = "arch_" . date('Y') . "_" . $rand . "." . $extt;
                    if ($ban) {
                        if (move_uploaded_file($_FILES["formato"]["tmp_name"], "../../fl-s/ans/" . $nombreNuevo)) {
                            $archivo = "fl-s/ans/" . $nombreNuevo;
                        }
                    }

                    $objeto->Addcf($_POST['cod'], $_POST['cf'], $_POST['folio'], $archivo);
                } else {
                    echo "Archivo prohibido!";
                }
            } else {
                echo "El archivo pesa mas de 40MB";
            }
        } else {
            $objeto->Addcf($_POST['cod'], $_POST['cf'], $_POST['folio'], $archivo);
        }

        break;

    case "Cargarprodu":
        $objeto->Cargarprodu($_POST['pro']);
        break;
    case "Cargarprodueva":
        $objeto->Cargarprodueva($_POST['pro']);
        break;

    case "cambiarEvaluadorele":
        echo $objeto->ComboEvaluadoresEle();
        break; 
    case "cambiarCriteriosvia":
        echo $objeto->ComboCrivia_();
        break;
    case "cambiarCriteriosele":
        echo $objeto->ComboCriele_M();
        break;
    case "cambiarEvaluadorvia":
        echo $objeto->ComboEvaluadoresVia();
        break;
    case "cambiarpro":
        $objeto->cambiarpro($_POST['cod'], $_POST['tipo']);
        break;
    case "cambiarproJur":
        $objeto->cambiarproJur($_POST['cod']);
        break;
    case "Addprodu":
        $objeto->Addprodu($_POST['pro'], $_POST['produ']);
        break;
    case "AddEB":
        $objeto->AddEB($_POST['pro'], $_POST['nit'],$_POST['num_ver'], $_POST['raz'], $_POST['fec_con']);
        break;
    case "Addtem_Asc":
        $objeto->Addtem($_POST['pro'], $_POST['tem']);
        break;    
    case "CargarTip":
        $objeto->CargarTip($_POST['pro']);
        break;
    case "Cargartem_Asc":
        $objeto->CargarTematicas($_POST['pro']);
        break;
    case "CargarEB":
        $objeto->CargarEB($_POST['pro']);
        break; 
    case "CargarEB_eva":
        $objeto->CargarEB_eva($_POST['pro']);
        break;     
    case "Cargartem_Asc_evaluadores":
        $objeto->CargarTematicas2($_POST['pro']);
        break;    
    case "CargarAsigele":
        $objeto->CargarAsigele($_POST['cod']);
        break;
    case "CargarAsigeleJur":
        $objeto->CargarAsigeleJur($_POST['cod']);
        break;
    case "CargarAsigvia":
        $objeto->CargarAsigvia($_POST['cod']);
        break;
    case "AddTip":
        $objeto->AddTip($_POST['pro'], $_POST['tipo']);
        break;
    case "Addasig":
        if($objeto->VerificarConflictosInt($_POST['pro'], $_POST['usu'],$_POST['fase'])){
        $message = "Criterios ya asignados";
        $ban = false;

        $crite = explode(",", $_POST['Criterios']);
        for ($i = 0; $i < count($crite); $i++) {
            if ($_POST['fase'] == "ele") {
                if($objeto->verificarConflictoInt($_POST['pro'], $_POST['usu'],"ele"))
                {
                 $message="El evaluador presenta un conflicto de intereses";   
                }
                else{
                if ($objeto->verificarele($_POST['pro'], $_POST['usu'], $crite[$i])) {
                    $message = $objeto->asignarele($_POST['pro'], $_POST['usu'], $crite[$i]);
                    $ban = true;
                }
                }
            } 
        }
        if($_POST['fase']=="via")
        {
             if($objeto->verificarConflictoInt($_POST['pro'], $_POST['usu'],"via"))
                {
                 $message="El evaluador presenta un conflicto de intereses";   
                }
                else{
                    if ($objeto->verificarvia($_POST['pro'], $_POST['usu'])) {
                    $message = $objeto->asignarvia($_POST['pro'], $_POST['usu']);
                    $ban = true;
                
            }
                }
        }
        if ($ban) {
            if ($_POST['fase'] == "ele") {
                $objeto->Cambiaestasopro($_POST['pro'], 2);
                $objeto->verificareleMail($_POST['pro'], $_POST['usu'], $_POST['proname']);
            } else {
                $objeto->Cambiaestasoproo($_POST['pro'], 5);
                $objeto->verificarviaMail($_POST['pro'], $_POST['usu'], $_POST['proname']);
            }
        }
        echo $message;
        
        }
        else
        {
            echo "Evaluador con conflicto de intereses";
        }
        
        break;
        
    case "AddasigJur":
          if($objeto->VerificarConflictosInt($_POST['pro'], $_POST['usu'],'ele')){
        $message = "Criterios ya asignados";
        $ban = false;

        $crite = explode(",", $_POST['Criterios']);
        for ($i = 0; $i < count($crite); $i++) {
            if ($objeto->verificarele($_POST['pro'], $_POST['usu'], $crite[$i])) {
                $message = $objeto->asignarele($_POST['pro'], $_POST['usu'], $crite[$i]);
                $ban = true;
            }
        }
        if ($ban) {
            $objeto->Cambiaestasopro($_POST['pro'], 2);
            $objeto->verificareleMailJur($_POST['pro'], $_POST['usu'], $_POST['proname']);
        }
        echo $message;
          }
          else
        {
             echo "Evaluador con conflicto de intereses";
        }
        break;

    case "AsignarRadom":
        $message = "Criterios ya asignados";
        $ban = false;
        if ($_POST['fase'] == "ele") {
            $crite = $objeto->ObtenerCriteriosEle();
            $usu = $objeto->ObtenerUsuarioRandomEle();
        } else {
            $crite = $objeto->ObtenerCriteriosVia();
            $usu = $objeto->ObtenerUsuarioRandomVia();
        }

        for ($i = 0; $i < count($crite); $i++) {
            if ($_POST['fase'] == "ele") {
                if ($objeto->verificarele($_POST['pro'], $usu, $crite[$i])) {
                    $message = $objeto->asignarele($_POST['pro'], $usu, $crite[$i]);
                    $ban = true;
                }
            } else {
                if ($objeto->verificarvia($_POST['pro'], $usu, $crite[$i])) {
                    $message = $objeto->asignarvia($_POST['pro'], $usu, $crite[$i]);
                    $ban = true;
                }
            }
        }
        if ($ban) {
            if ($_POST['fase'] == "ele") {
                $objeto->Cambiaestasopro($_POST['pro'], 2);
                $objeto->verificareleMail($_POST['pro'], $_POST['usu'], $_POST['proname']);
            } else {
                $objeto->Cambiaestasoproo($_POST['pro'], 5);
                $objeto->verificarviaMail($_POST['pro'], $_POST['usu'], $_POST['proname']);
            }
        }
        echo $message;
        break;

    case "AsignarRadomJur":
        $message = "Criterios ya asignados";
        $ban = false;

        $crite = $objeto->ObtenerCriteriosEleJur();
        $usu = $objeto->ObtenerUsuarioRandomEleJur();

        for ($i = 0; $i < count($crite); $i++) {
            if ($objeto->verificarele($_POST['pro'], $usu, $crite[$i])) {
                $message = $objeto->asignarele($_POST['pro'], $usu, $crite[$i]);
                $ban = true;
            }
        }
        if ($ban) {
            $objeto->Cambiaestasopro($_POST['pro'], 2);
            $objeto->verificareleMailJur($_POST['pro'], $_POST['usu'], $_POST['proname']);
        }
        echo $message;
        break;
    case "DelTip":
        $objeto->DelTip($_POST['pro'], $_POST['tipo']);
        break;
    case "DelAsigele":
        $objeto->DelAsigele($_POST['cod'], $_POST['cri'], $_POST['pro'], $_POST['usu']);
         $objeto->VerificaeStateProyectoEle($_POST['pro']);
        break;
    case "DelAsigeleJur":
        $objeto->DelAsigeleJur($_POST['cod'], $_POST['cri'], $_POST['pro'], $_POST['usu']);
         $objeto->VerificaeStateProyectoEle($_POST['pro']);
        break;
    case "DelAsigvia":
        $objeto->DelAsigvia($_POST['cod'], $_POST['pro'], $_POST['usu']);
        $objeto->VerificaeStateProyectoVia($_POST['pro']);
        break;
    case "DelPt":
        if ($objeto->DelPt($_POST['cod'])) {
            echo "Plan de trasferencia eliminado";
        } else {
            echo "Error al eliminar el plan";
        }
        break;
    case "DelAnex":
        if ($objeto->DelAnex($_POST['cod'])) {
            echo "Anexo eliminado";
        } else {
            echo "Error al eliminar el anexo";
        }
        break;
    case "CargarRes":
        $objeto->CargarRes($_POST['pro']);
        break;

    case "CargarReseva":
        $objeto->CargarReseva($_POST['pro']);
        break;

    case "AddRes":
        $objeto->AddRes($_POST['pro'], $_POST['res']);
        break;
    case "AddObjEsp":
        $objeto->AddObjEsp($_POST['pro'], $_POST['obj']);
        break;

    case "epro":
        $fecha_actual = strtotime(date("Y-m-d"));
        $fecha_rec = strtotime($_POST['fec_rec']);
        if ($_POST['fec_rad'] != null && $_POST['fec_rad'] != "") {
            $fecha_rad = strtotime($_POST['fec_rad']);

            if ($fecha_rec < $fecha_rad) {
                $response = "Fecha recepción menor a fecha radicación";
                echo $response;
                break;
            } elseif ($fecha_rad > $fecha_actual) {
                $response = "Fecha radicación mayor a fecha actual";
                echo $response;
                break;
            } elseif ($fecha_rec > $fecha_actual) {
                $response = "Fecha recepción mayor a fecha actual";
                echo $response;
                break;
            }
        }
        if ($fecha_rec > $fecha_actual) {
            $response = "Fecha recepción mayor a fecha actual";
            echo $response;
            break;
        }
        $objeto->editarPro(
            $_POST['id'],
            $_POST['conv'],
            $_POST['emp'],
            $_POST['nom'],
            $_POST['fec_rec'],
            $_POST['num_rad'],
            $_POST['fec_rad'],
            $_POST['duracion'],
            $_POST['val_pro'],
            $_POST['val_fin'],
            $_POST['val_tot_con'],
            $_POST['val_con_din'],
            $_POST['val_con_esp'],
            $_POST['uti_net'],
            $_POST['act_corr'],
            $_POST['pas_corr'],
            $_POST['pas_tot'],
            $_POST['act_tot'],
            $_POST['pas_lar_pla'],
            $_POST['pas_cor_pla'],
            $_POST['EBITDA'],
            $_POST['ciu'],
            $_POST['tip_pro']
        );
        break;

    case "CargarDivevaeleusu":
        $objeto->CargarDivevaeleusu($_POST['cod'], $_POST['pro']);
        break;
    case "cargarinfoSubsana":
        $objeto->cargarinfoSubsana($_POST['id']);
        break;    
   case "AdicionarDiasProyectEle":
        $objeto->AdicionarDiasProyectEle($_POST['cod']);
        break;
    case "AdicionarDiasProyectVia":
        $objeto->AdicionarDiasProyectVia($_POST[cod]);
        break; 
    case "AgregarDiasVia":
        $objeto->AgregarDiasVia($_POST['cod'],$_POST['dias']);
        break;
    case "AgregarDiasEle":
        $objeto->AgregarDiasEle($_POST['cod'],$_POST['dias']);
        break;     
  case "FinalizarSubsana":
        $objeto->FinalizarSubsana($_POST['id']);
      break;
case "CambiarestadoSubsana1":
        $objeto->CambiarestadoSubsana1($_POST['id'],$_POST['fec'],$_POST['dit']);
      break;      
case "CambiarestadoSubsana2":
        $objeto->CambiarestadoSubsana2($_POST['id'],$_POST['dat'],$_POST['fec']);
      break;            
      
    case "CargarDivevaeleusuJur":
        $objeto->CargarDivevaeleusuJur($_POST['cod'], $_POST['pro']);
        break;

    case "CargarDivevaviausu":
        $objeto->CargarDivevaviausu($_POST['cod'], $_POST['pro']);
        break;
}
?>

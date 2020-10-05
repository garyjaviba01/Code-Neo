<?php date_default_timezone_set('America/Bogota');
class transacciones
{
    private $conexion;
    private $password;
    public $mensaje;
    public $cantidad = 0;
    function __construct()
    {
        //incluir el archivo conexion
        $conex = mysqli_connect("localhost", "cpcorien_us_neo", "neo2020_", "cpcorien_neo_bd");
        // *conexion local*	$conex= mysqli_connect("localhost","root","","convecfc_neo");
        mysqli_query($conex, "set names 'utf8'");
        //asignar a la variable $conexion el retorno del metodo conectar()
        $this->conexion = $conex;
    }
    //combo convocatorias
    public function ComboConvo()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from convocatoria");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['id'] . "'>" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    public function verificarConflictoInt($pro, $usu,$fase)
    {
        $opt = false;
        $consulta = mysqli_query($this->conexion, "select * from conflicto_int where usu=$usu and pro=$pro and fase='$fase'");
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos['conflicto']==1)
            $opt =true;
        }
        return $opt;
        
    }

    public function BuscarNotificaciones()
    {
        $opt = [];
        $opt[0] = "";

        $opt[1] = 0;
        $opt[2] = 0;
        //session_start();
        if ($_COOKIE['user_rol'] == 5 || $_COOKIE['user_rol'] == 2) {
            $consulta = mysqli_query($this->conexion, "select * from notificaciones WHERE tipo='SOLICITUD SUBSANACION'  or tipo='CONFLICTO DE INTERESES EVALUADOR'  or tipo='EVALUACION FINALIZADA' or tipo='OBSERVACION GT' order by id desc ");
        }
        if ($_COOKIE['user_rol'] == 3) {
            $consulta = mysqli_query($this->conexion, "select * from notificaciones WHERE  usu=$_COOKIE[user_code] and (tipo='EVALUACION ELEGIBILIDAD' OR tipo='RESPUESTA SUBSANACION')  order by id desc");
        }
        if ($_COOKIE['user_rol'] == 4) {
            $consulta = mysqli_query($this->conexion, "select * from notificaciones WHERE usu=$_COOKIE[user_code] and tipo='EVALUACION VIABILIDAD'  order by id desc");
        }
        if ($_COOKIE['user_rol'] == 6) {
            $consulta = mysqli_query($this->conexion, "select * from notificaciones WHERE usu=$_COOKIE[user_code] and (  tipo='ASESOR JURÍDICO/ABOGADO'  OR tipo='RESPUESTA SUBSANACION')   order by id desc");
        }
        if ($_COOKIE['user_rol'] == 7 ) {
            $consulta = mysqli_query($this->conexion, "select * from notificaciones WHERE  tipo='EVALUACION FINALIZADA CP' or tipo='OBSERVACION CP'  order by id desc");
        }
        if (  $_COOKIE['user_rol']==8) {
            $consulta = mysqli_query($this->conexion, "select * from notificaciones WHERE tipo='EVALUACION FINALIZADA S' or tipo='OBSERVACION S' order by id desc");
        }
        $optt = "";
        $opt[0] = "";
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['visto'] == 0) {
                $opt[1] += 1;
                $color = "#E9FBFA";
                $optt .= "<div class='notificacionesdiv' style='background:$color;'>$datos[notificacion]<br></div>";
            } else {
                $color = "#FFF";
                $opt[0] .= "<div class='notificacionesdiv' style='background:$color;'>$datos[notificacion]<br></div>";
            }
            if ($datos['sonido'] == 0) {
                $opt[2] += 1;
            }
        }
        $opt[0] = "<div style='height:400px;overflow-y:auto;'>" . $optt . $opt[0];
        $opt[0] .= "</div>";
        echo json_encode($opt);
    }
    // resetear sonido de notificaciones
    public function ResetSonidos()
    {
        //session_start();
        if ($_COOKIE['user_rol'] == 5 || $_COOKIE['user_rol'] == 2) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set sonido=1 WHERE tipo='SOLICITUD SUBSANACION' or tipo='EVALUACION FINALIZADA' or tipo='CONFLICTO DE INTERESES EVALUADOR' or tipo='OBSERVACION GT'");
        }
        if ($_COOKIE['user_rol'] == 3) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set sonido=1 WHERE usu=$_COOKIE[user_code] and  (tipo='EVALUACION ELEGIBILIDAD' OR tipo='RESPUESTA SUBSANACION') ");
        }
        if ($_COOKIE['user_rol'] == 4) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set sonido=1 WHERE  usu=$_COOKIE[user_code] and tipo='EVALUACION VIABILIDAD'");
        }
        if ($_COOKIE['user_rol'] == 6) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set sonido=1 WHERE usu=$_COOKIE[user_code] and (tipo='ASESOR JURÍDICO/ABOGADO'  OR tipo='RESPUESTA SUBSANACION') ");
        }
        if ($_COOKIE['user_rol'] == 7 ) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set sonido=1 WHERE tipo='EVALUACION FINALIZADA CP' or tipo='OBSERVACION CP'");
        }
        if (  $_COOKIE['user_rol']==8) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set sonido=1 WHERE tipo='EVALUACION FINALIZADA S' or tipo='OBSERVACION S'");
        }
    }
    // resetear visualizacion de notificaciones
    public function ResetVisto()
    {
        //session_start();
        if ($_COOKIE['user_rol'] == 5 || $_COOKIE['user_rol'] == 2) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set visto=1 WHERE tipo='SOLICITUD SUBSANACION' or tipo='EVALUACION FINALIZADA' or tipo='CONFLICTO DE INTERESES EVALUADOR' or tipo='OBSERVACION GT'");
        }
        if ($_COOKIE['user_rol'] == 3) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set visto=1 WHERE usu=$_COOKIE[user_code] and (tipo='EVALUACION ELEGIBILIDAD'  OR tipo='RESPUESTA SUBSANACION')");
        }
        if ($_COOKIE['user_rol'] == 4) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set visto=1 WHERE usu=$_COOKIE[user_code] and tipo='EVALUACION VIABILIDAD'");
        }
        if ($_COOKIE['user_rol'] == 6) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set visto=1 WHERE usu=$_COOKIE[user_code] and (tipo='ASESOR JURÍDICO/ABOGADO'  OR tipo='RESPUESTA SUBSANACION')");
        }
        if ($_COOKIE['user_rol'] == 7 ) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set visto=1 WHERE tipo='EVALUACION FINALIZADA CP' or tipo='OBSERVACION CP' ");
        }
        if (  $_COOKIE['user_rol']==8) {
            $consulta = mysqli_query($this->conexion, "update notificaciones set visto=1 WHERE tipo='EVALUACION FINALIZADA S' or tipo='OBSERVACION S'");
        }
    }
    public function ComboEmpresas()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from empresas");
        while ($datos = mysqli_fetch_array($consulta)) {
             
            $opt .= "<option value='" . $datos['id'] . "'>" . $datos['razon_social']."</option>";
        }
        return $opt;
    }
    public function ComboDocumentos()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from documento order by id asc");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['id'] . "'>" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
     public function ComboTematicas()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from tematicas order by des asc");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['id'] . "'>" . $datos['des'] . "</option>";
        }
        return $opt;
    }
    // evaluadores elegibilidad
    public function ComboEvaluadoresEle()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from usuarios where rol=3 and estado=1");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "'>" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    // asesor juridico
    public function ComboEvaluadoresEleJur()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from usuarios where rol=6 and estado=1");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "'>" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    
    public function ComboEvaluadoresVia()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from usuarios where rol=4 and estado=1");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "'>" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    // cargar proyectos para  elegibilidad 
    public function cambiarpro($conv, $tipo)
    {
        $tip = "dia_via";
        $sql = "";
        if ($tipo == "ele") {
            $sql = "select propuestas.id,propuestas.nom from propuestas where propuestas.dia_ele='' and propuestas.id not in(select id_propuesta from usuariosxpropuesta_ele where criterio>1 ) order by propuestas.nom asc";
        } else {
            
            $sql = "select propuestas.id,propuestas.nom from propuestas where id_convocatoria=$conv and estado=4 and dia_ele='ELEGIBLE' and dia_via=''  order by nom ASC";
        }

        $opt = "";
        $consulta = mysqli_query($this->conexion, $sql);
        $array = [];
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos[0] . "'>" . $datos[1] . "</option>";
        }
        echo $opt;
    }
    // cargar proyectos para  elegibilidad asesor juridico
    public function cambiarproJur($conv)
    {
        $sql = "select propuestas.id,propuestas.nom from propuestas where propuestas.dia_ele='' and propuestas.id not in(select id_propuesta from usuariosxpropuesta_ele where criterio=1 ) order by propuestas.nom asc";

        $opt = "";
        $consulta = mysqli_query($this->conexion, $sql);
        $array = [];
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos[0] . "'>" . $datos[1] . "</option>";
        }
        echo $opt;
    }
    // combo criterios elegibilidad 
    public function ComboCriele()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_ele  order by  nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "'>" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
     public function ComboCriele_()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_ele where cod>1  order by  nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "' selected >" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    
    // combo criterios elegibilidad asesor juridico
    public function ComboCrieleJur()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_ele where cod=1 order by nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "' selected >" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    
     public function ComboCriele_M()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_ele where cod>1  order by  nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "' selected >" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    
    // combo criterios elegibilidad asesor juridico
    public function ComboCrieleJur_()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_ele where cod=1 order by nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "' >" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    // combo criterios de elegibilidad
    public function ComboCrielee($conv, $pro)
    {
        
        $opt = "";
        $consulta = mysqli_query(
            $this->conexion,
            "select criterios_ele.* from criterios_ele,tipos_cri_ele,usuariosxpropuesta_ele where criterios_ele.tipo=tipos_cri_ele.cod and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and usuariosxpropuesta_ele.id_usuario=$_COOKIE[user_code] and usuariosxpropuesta_ele.id_propuesta=$pro and criterios_ele.id_convocatoria=$conv order by requisito ASC"
        );
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['id'] . "'>" . $datos['requisito'] . "</option>";
        }
        return $opt;
    }
    // combo criterisos de viabilidad
    public function ComboCriviaa($conv, $pro)
    {
        
        $opt = "";
        $consulta = mysqli_query(
            $this->conexion,
            "select criterios_via.* from criterios_via,tipos_cri_via,usuariosxpropuesta_via where criterios_via.tipo=tipos_cri_via.cod and usuariosxpropuesta_via.criterio=tipos_cri_via.cod and usuariosxpropuesta_via.id_usuario=$_COOKIE[user_code] and usuariosxpropuesta_via.id_propuesta=$pro and criterios_via.id_convocatoria=$conv order by requisito ASC"
        );
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['id'] . "'>" . $datos['requisito'] . "</option>";
        }
        return $opt;
    }
    // combo criterios de viabilidad
    public function ComboCrivia()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_via order by  nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "' selected >" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    
    public function ComboCrivia_()
    {
        $opt = "";
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_via order by  nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['cod'] . "' selected >" . $datos['nombre'] . "</option>";
        }
        return $opt;
    }
    // dar formato a la fecha
    function FormatDate($fecha)
    {
        $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $dias = ["", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
        echo $dias[date("w", strtotime($fecha))] . ", " . date("j", strtotime($fecha)) . " de " . $meses[date("n", strtotime($fecha))] . " de " . date("Y", strtotime($fecha));
    }
    // dar formato a la fecha
    function FormatDate2($fecha)
    {
       if($fecha!=NULL &&  $fecha!="" && $fecha!="0000-00-00" && $fecha!="N/A"){
        $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $dias = ["", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
        return date("j", strtotime($fecha)) . " de " . $meses[date("n", strtotime($fecha))] . ", " . date("Y", strtotime($fecha));}
        else
        return "";
    }
    // listar criterios de elegibilidad
    public function lcriele($cod)
    {
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
            }
        }
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele" width="100%"><thead style="background:#f8f9fa;"><tr><th>Criterio</th><th>Requisito</th><th>Fuente de verificación</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador10++;
        $contadorsub = 1;
    }
   //<i class='fas fa-pencil-alt icon_sesion' onclick=\"editarCriele($datos[id])\"> </i>
    echo "<td> $datos[requisito] </td><td> $datos[documento] $ayuda</td><td></td></tr>";
    //<i class='fas fa-trash-alt icon_sesion'  onclick='DelCriEle($datos[id])'></i>
    $fila++;
}
if ($fila == 1) {
    echo "<tr><td colspan='4' align='center'> No hay criterios</td></tr>";
}?>
</tbody></table>
<?php
    }
    // listar criterios de viabilidad
    public function lcrivia($cod)
    {
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );

        $consulta3 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta4 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        $pun1 = 0;
        $pun2 = 0;
        $pun3 = 0;
        $pun4 = 0;
        $pun5 = 0;
        $pun6 = 0;
        $pun7 = 0;
        $pun8 = 0;
        $pun9 = 0;
        $pun10 = 0;
        $puntajeG = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
                $pun1 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
                $pun2 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
                $pun3 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
                $pun4 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
                $pun5 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
                $pun6 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
                $pun7 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
                $pun8 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
                $pun9 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
                $pun10 += $datos['puntaje'];
            }
            $puntajeG += $datos['puntaje'];
        }
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Criterio</th><th>Puntaje</th><th>Requisito</th><th>Fuente de verificación</th><th>Puntaje</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count1' style='vertical-align: middle;'><b>$pun1</b></td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count2' style='vertical-align: middle;'><b>$pun2</b></td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count3' style='vertical-align: middle;'><b>$pun3</b></td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count4' style='vertical-align: middle;'><b>$pun4</b></td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count5' style='vertical-align: middle;'><b>$pun5</b></td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td><td rowspan='$count6' style='vertical-align: middle;'><b>$pun6</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count7' style='vertical-align: middle;'><b>$pun7</b></td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count8' style='vertical-align: middle;'><b>$pun8</b></td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count9' style='vertical-align: middle;'><b>$pun9</b></td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count10' style='vertical-align: middle;'><b>$pun10</b></td>";
        $contador10++;
        $contadorsub = 1;
    }
   //<i class='fas fa-pencil-alt icon_sesion' onclick=\"editarCrivia($datos[id])\"> </i>
    echo "<td> $datos[requisito]</td><td> $datos[observacion] $ayuda</td><td> $datos[puntaje]</td> <td></td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr><td colspan='6' align='center'> No hay criterios</td></tr>";
} else {
    if ($puntajeG != 100) {
        $icon = "<i class='fa fa-times'></i>";
        $color = "#FBA592";
        echo "<tr style='background-color:$color;'><td colspan='4'><b>Puntaje total criterios</b> </td><td colspan='2'><b>$puntajeG</b></td></tr><tr style='background-color:$color;'></tr>";
    } else {
        $icon = "<i class='fa fa-check'></i>";
        $color = "#A0FB92";
        echo "<tr style='background-color:$color;'><td colspan='4'>  <b>Puntaje total criterios</b> </td><td colspan='2'><b>$puntajeG</b></td></tr><tr style='background-color:$color;'></tr>";
    }
}

$countadc1 = 0;
$punadc1 = 0;
$puntajeGadc = 0;
while ($datos = mysqli_fetch_array($consulta3)) {
    if ($datos['tipo'] == 1) {
        $countadc1 += 1;
        $punadc1 += $datos['puntaje'];
    }
    $puntajeGadc += $datos['puntaje'];
}
$contadoradc = 0;
$contadorsubadc = 1;
$contador1adc = 0;
$filaadc = 1;
while ($datos = mysqli_fetch_array($consulta4)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1adc == 0) {
        $contadoradc++;
        echo "<td rowspan='$countadc1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$countadc1' style='vertical-align: middle;'><b>$punadc1</b></td>";
        $contador1adc++;
        $contadorsubadc = 1;
    }

    
    echo "<td> $datos[requisito]</td><td> $datos[observacion] $ayuda</td><td> $datos[puntaje]</td> <td><i class='fas fa-pencil-alt icon_sesion' onclick=\"editarCriviapunadc($datos[id])\"> </i></td></tr>";
    $filaadc++;
}
if ($filaadc == 1) {
    echo "<tr><td colspan='6' align='center'> No hay criterios de puntaje adicional</td></tr>";
} else {
    $color = "#C2E4F4";
    echo "<tr style='background-color:$color;'><td colspan='4'><b>Puntaje adicional total</b> </td><td><b>$puntajeGadc</b></td><td align='center' style='color:red;'></td></tr><tr style='background-color:$color;'></tr>";
}?>
</tbody></table>
<?php
    }
    // listar causales de rechazo
    public function lcausa($cod)
    {
        $consulta = mysqli_query($this->conexion, "SELECT causales.*,convocatoria.nombre FROM `causales`,convocatoria WHERE causales.id_convocatoria=$cod and causales.id_convocatoria=convocatoria.id order by id asc"); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>	  
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele" width="100%"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Causa de rechazo</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
while ($datos = mysqli_fetch_array($consulta)) {
    $ayuda = "";
    if ($datos['observacion'] != "" || $datos['observacion'] != null) {
        $ayuda = "<i class=\"fa fa-question-circle\" style=\"cursor:help;\" onmouseover=\"$('#help$fila').css('display','block')\" onmouseout=\"$('#help$fila').css('display','none')\"></i>
  <span class='tooltiptext2' id='help$fila'>$datos[observacion]</span>";
    } else {
        $ayuda = "";
    }
    //<i class='fas fa-pencil-alt icon_sesion' onclick=\"editarCausa($datos[id])\"> </i><i class='fas fa-trash-alt icon_sesion'  onclick='DelCausa($datos[id])'></i>
    echo "<td> $fila</td><td> $datos[causa] $ayuda</td><td></td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr><td colspan='3' align='center'> No hay causas de rechazo</td></tr>";
}?>
</tbody></table>
<?php
    }
    // listar causales de rechazo colombia productiva
    public function lcausacp($cod)
    {
        $consulta = mysqli_query($this->conexion, "SELECT causales.*,convocatoria.nombre FROM `causales`,convocatoria WHERE causales.id_convocatoria=$cod and causales.id_convocatoria=convocatoria.id order by id asc"); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>	  
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele" width="100%"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Causa de rechazo</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
while ($datos = mysqli_fetch_array($consulta)) {
    $ayuda = "";
    if ($datos['observacion'] != "" || $datos['observacion'] != null) {
        $ayuda = "<i class=\"fa fa-question-circle\" style=\"cursor:help;\" onmouseover=\"$('#help$fila').css('display','block')\" onmouseout=\"$('#help$fila').css('display','none')\"></i>
  <span class='tooltiptext2' id='help$fila'>$datos[observacion]</span>";
    } else {
        $ayuda = "";
    }
    echo "<td> $fila</td><td> $datos[causa] $ayuda</td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr><td colspan='2' align='center'> No hay causas de rechazo</td></tr>";
}?>
</tbody></table>
<?php
    }
    // listar criterios de elegibilidad vista colombia productiva
    public function lcrielecp($cod)
    {
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
            }
            if ($datos['tipo'] == 6) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 7) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 8) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 9) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 10) {
                $count5 += 1;
            }
        }
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Criterio</th><th>Requisito</th><th>Fuente de verificación</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador10++;
        $contadorsub = 1;
    }
   
    echo "<td> $datos[requisito]</td><td> $datos[documento]</td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr><td colspan='4' align='center'> No hay criterios</td></tr>";
}?>
</tbody></table>
<?php
    }
    // listar criterios de viabilidad y adicionale
    public function lcriviacp($cod)
    {
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );

        $consulta3 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta4 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        $pun1 = 0;
        $pun2 = 0;
        $pun3 = 0;
        $pun4 = 0;
        $pun5 = 0;
        $pun6 = 0;
        $pun7 = 0;
        $pun8 = 0;
        $pun9 = 0;
        $pun10 = 0;
        $puntajeG = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
                $pun1 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
                $pun2 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
                $pun3 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
                $pun4 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
                $pun5 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
                $pun6 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
                $pun7 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
                $pun8 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
                $pun9 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
                $pun10 += $datos['puntaje'];
            }
            $puntajeG += $datos['puntaje'];
        }
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Criterio</th><th>Puntaje</th><th>Requisito</th><th>Fuente de verificación</th><th>Puntaje</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count1' style='vertical-align: middle;'><b>$pun1</b></td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count2' style='vertical-align: middle;'><b>$pun2</b></td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count3' style='vertical-align: middle;'><b>$pun3</b></td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count4' style='vertical-align: middle;'><b>$pun4</b></td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count5' style='vertical-align: middle;'><b>$pun5</b></td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td><td rowspan='$count6' style='vertical-align: middle;'><b>$pun6</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count7' style='vertical-align: middle;'><b>$pun7</b></td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count8' style='vertical-align: middle;'><b>$pun8</b></td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count9' style='vertical-align: middle;'><b>$pun9</b></td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count10' style='vertical-align: middle;'><b>$pun10</b></td>";
        $contador10++;
        $contadorsub = 1;
    }
   
    echo "<td> $datos[requisito] </td><td> $datos[observacion]</td><td> $datos[puntaje]</td> </tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr><td colspan='5' align='center'> No hay criterios</td></tr>";
} else {
    if ($puntajeG != 100) {
        $icon = "<i class='fa fa-times'></i>";
        $color = "#FBA592";
        echo "<tr style='background-color:$color;'><td colspan='4'><b>Puntaje total criterios</b> </td><td ><b>$puntajeG</b></td></tr><tr style='background-color:$color;'></tr>";
    } else {
        $icon = "<i class='fa fa-check'></i>";
        $color = "#A0FB92";
        echo "<tr style='background-color:$color;'><td colspan='4'>  <b>Puntaje total criterios</b> </td><td ><b>$puntajeG</b></td></tr><tr style='background-color:$color;'></tr>";
    }
}

$countadc1 = 0;
$punadc1 = 0;
$puntajeGadc = 0;
while ($datos = mysqli_fetch_array($consulta3)) {
    if ($datos['tipo'] == 1) {
        $countadc1 += 1;
        $punadc1 += $datos['puntaje'];
    }
    $puntajeGadc += $datos['puntaje'];
}
$contadoradc = 0;
$contadorsubadc = 1;
$contador1adc = 0;
$filaadc = 1;
while ($datos = mysqli_fetch_array($consulta4)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1adc == 0) {
        $contadoradc++;
        echo "<td rowspan='$countadc1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$countadc1' style='vertical-align: middle;'><b>$punadc1</b></td>";
        $contador1adc++;
        $contadorsubadc = 1;
    }
    
    echo "<td> $datos[requisito] </td><td> $datos[observacion] </td><td> $datos[puntaje]</td> </tr>";
    $filaadc++;
}
if ($filaadc == 1) {
    echo "<tr><td colspan='5' align='center'> No hay criterios de puntaje adicional</td></tr>";
} else {
    $color = "#C2E4F4";
    echo "<tr style='background-color:$color;'><td colspan='4'><b>Puntaje adicional total</b> </td><td><b>$puntajeGadc</b></td></tr><tr style='background-color:$color;'></tr>";
}?>
</tbody></table>
<?php
    }

    public function CargarDatosCliente($cod)
    {
        $array = [];
        $consulta = mysqli_query($this->conexion, "select usuarios.*,ciudad.departamento from usuarios,ciudad where usuarios.ciudad=ciudad.codigo and cod='$cod'");
        if ($datos = mysqli_fetch_array($consulta)) {
            $array = [$datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9], $datos[10], $datos[11], $datos[12], $datos[13], $datos[14]];
        }
        return json_encode($array);
    }
    public function ConsultaTiempo($cod)
    {
        $array = ["H", "H", "0", "0"];
        $consulta = mysqli_query($this->conexion, "SELECT * FROM `tiempos` WHERE conv=$cod");
        if ($datos = mysqli_fetch_array($consulta)) {
            $array = [$datos['tipoele'], $datos['tipovia'], $datos['diasele'], $datos['diasvia']];
        }
        return json_encode($array);
    }
    public function ConsultaUsuario()
    {
        //session_start();
        $array = [9];
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT `usuarios`.*,departamento.codigo as dep FROM `usuarios`,ciudad,departamento WHERE usuarios.ciudad=ciudad.codigo and ciudad.departamento=departamento.codigo and usuarios.cod=" . $_COOKIE['user_code'] . ""
        );
        if ($datos = mysqli_fetch_array($consulta)) {
            $array = [$datos['nombre'], $datos['tip_ide'], $datos['num_ide'], $datos['telefono'], $datos['direccion'], $datos['profesion'], $datos['email'], $datos['ciudad'], $datos['dep']];
        }
        return json_encode($array);
    }
    public function ConsultaTiempo3($cod)
    {
        $array = ["H", "H", "0", "0"];
        $consulta = mysqli_query($this->conexion, "SELECT * FROM `tiempos` WHERE conv=$cod");
        if ($datos = mysqli_fetch_array($consulta)) {
            $array = [$datos['tipoele'], $datos['tipovia'], $datos['diasele'], $datos['diasvia']];
        }
        return $array;
    }
    public function ObtenerCriteriosEle()
    {
        $array = [];
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_ele where cod>1  order by  nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            array_push($array, $datos['cod']);
        }
        return $array;
    }
    public function ObtenerCriteriosEleJur()
    {
        $array = [];
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_ele where cod=1  order by  nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            array_push($array, $datos['cod']);
        }
        return $array;
    }
    public function ObtenerCriteriosVia()
    {
        $array = [];
        $consulta = mysqli_query($this->conexion, "select * from tipos_cri_via order by nombre ASC");
        while ($datos = mysqli_fetch_array($consulta)) {
            array_push($array, $datos['cod']);
        }
        return $array;
    }
    public function ConsultaTiempo2($cod)
    {
        $ban = false;
        $consulta = mysqli_query($this->conexion, "SELECT * FROM `tiempos` WHERE conv=$cod");
        if ($datos = mysqli_fetch_array($consulta)) {
            $ban = true;
        }
        return $ban;
    }
    
    public function AddTiempo($con, $ce, $cv, $de, $dv)
    {
        $response = "Tiempos no registrados";
        if ($this->ConsultaTiempo2($con)) {
            mysqli_query($this->conexion, "UPDATE `tiempos` SET `tipoele` = '$ce', `tipovia` = '$cv', `diasele` = '$de', `diasvia` = '$dv' WHERE `tiempos`.`conv` = $con");
            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Tiempos registrados";
            }
        } else {
            mysqli_query($this->conexion, "INSERT INTO `tiempos` (`conv`, `tipoele`, `tipovia`, `diasele`, `diasvia`) VALUES ( '$con', '$ce', '$cv', '$de', '$dv');");
            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Tiempos registrados";
            }
        }

        return $response;
    }
    // verificar si usuario esta asignado
    public function verificarele($pro, $usu, $criterio)
    {
        $ban = true;
        $consulta = mysqli_query($this->conexion, "select * from usuariosxpropuesta_ele where id_propuesta='$pro'  and criterio='$criterio'");
        if ($datos = mysqli_fetch_array($consulta)) {
            $ban = false;
        }
        return $ban;
    }
    // obtener usuario aleatorio
    public function ObtenerUsuarioRandomEle()
    {
        $count = 0;
        $users = [];

        $consulta = mysqli_query($this->conexion, "select cod from usuarios where rol=3 and estado=1");
        while ($datos = mysqli_fetch_array($consulta)) {
            array_push($users, $datos['cod']);
            $count += 1;
        }
        $aleatorio = rand(0, $count - 1);
        return $users[$aleatorio];
    }
    // obtener usuario aleatorio
    public function ObtenerUsuarioRandomEleJur()
    {
        $count = 0;
        $users = [];

        $consulta = mysqli_query($this->conexion, "select cod from usuarios where rol=6 and estado=1");
        while ($datos = mysqli_fetch_array($consulta)) {
            array_push($users, $datos['cod']);
            $count += 1;
        }
        $aleatorio = rand(0, $count - 1);
        return $users[$aleatorio];
    }
    //obtener usuario aleatorio
    public function ObtenerUsuarioRandomVia()
    {
        $count = 0;
        $users = [];

        $consulta = mysqli_query($this->conexion, "select cod from usuarios where rol=4 and estado=1");
        while ($datos = mysqli_fetch_array($consulta)) {
            array_push($users, $datos['cod']);
            $count += 1;
        }
        $aleatorio = rand(0, $count - 1);
        return $users[$aleatorio];
    }
    //asignar a usuario a elegibilidad
    public function asignarele($pro, $usu, $criterio)
    {
        $ban = "Error al asignar criterio";
        mysqli_query($this->conexion, "INSERT INTO `usuariosxpropuesta_ele` ( `id_propuesta`, `id_usuario`, `fecha_asig`, `criterio`) VALUES ( '$pro', '$usu', '" . date('Y-m-d') . "', '$criterio');");
        //echo "INSERT INTO `usuariosxpropuesta_ele` ( `id_propuesta`, `id_usuario`, `fecha_asig`, `criterio`) VALUES ( '$pro', '$usu', '".date('Y-m-d')."', '$criterio');";
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = "asignación exitosa";
        }
        return $ban;
    }

    public function notificacionele($pro, $usu, $nom)
    {
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '$usu', 'EVALUACION ELEGIBILIDAD', 'HA SIDO ASIGNADO PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom COMO EVALUADOR DE ELEGIBILIDAD', '0', '0'),( '$pro', '0', 'INICIO PROCESO EVALUACION', 'EL PROCESO EVALUACION DEL PROYECTO $nom HA INICIADO', '0', '0')"
        );
    }
    public function notificacioneleJur($pro, $usu, $nom)
    {
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '$usu', 'ASESOR JURÍDICO/ABOGADO', 'HA SIDO ASIGNADO PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom COMO ASESOR JURÍDICO/ABOGADO', '0', '0'),( '$pro', '0', 'INICIO PROCESO EVALUACION', 'EL PROCESO EVALUACION DEL PROYECTO $nom HA INICIADO', '0', '0')"
        );
    }
    public function notificacionvia($pro, $usu, $nom)
    {
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '$usu', 'EVALUACION VIABILIDAD', 'HA SIDO ASIGNADO AL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom COMO EVALUADOR DE VIABILIDAD', '0', '0')"
        );
    }
    
    //verficar si usuario esta asignado
    public function verificarvia($pro, $usu)
    {
        $ban = true;
        $consulta = mysqli_query($this->conexion, "select * from usuariosxpropuesta_via where id_propuesta='$pro' and id_usuario='$usu'");
        if ($datos = mysqli_fetch_array($consulta)) {
            $ban = false;
        }
        return $ban;
    }
    
    //actualizar estado del proyecto
    public function Cambiaestasopro($pro, $num)
    {
        mysqli_query($this->conexion, "update propuestas set estado='$num' where id=$pro and estado=1");
    }
    
    //actualizar estado del proyecto
    public function Cambiaestasoproo($pro, $num)
    {
         $consulta = mysqli_query($this->conexion, "select count(*) from usuariosxpropuesta_via where id_propuesta='$pro'");
        if ($datos = mysqli_fetch_array($consulta)) {
           if($datos[0]==2)
           {
             mysqli_query($this->conexion, "update propuestas set estado='$num' where id=$pro and estado=4");       
           }
        }
            
        
        
    }
    
    
    //actualizar estado del proyecto
    public function Cambiaestasopro2($pro, $num)
    {
        mysqli_query($this->conexion, "update propuestas set estado='$num' where id=$pro and estado=3");
    }
    
    //actualizar estado del proyecto
    public function Cambiaestasopro3($pro, $num)
    {
        mysqli_query($this->conexion, "update propuestas set estado='$num' where id=$pro and estado=4");
    }
    // enviar correo
    public function verificarviaMail($pro, $usu, $nom)
    {
        $ban = 1;
        $consulta = mysqli_query($this->conexion, "select count(*) from notificaciones  where pro='$pro' and usu='$usu' and tipo='EVALUACION VIABILIDAD'");
        if ($datos = mysqli_fetch_array($consulta)) {
            $ban = $datos[0];
        }

        if ($ban == 0) {
            $this->notificacionvia($pro, $usu, $nom);
            $email = $this->Mail($usu);
            require "class.phpmailer.php";
            require "class.smtp.php";

            // Datos de la cuenta de correo utilizada para enviar vía SMTP
            $smtpHost = "mail.cpcoriente.org"; // Dominio alternativo brindado en el email de alta
            $smtpUsuario = "gary.incode@cpcoriente.org"; // Mi cuenta de correo
            $smtpClave = "incode2020$$"; // Mi contraseña

            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->CharSet = "utf-8";

            // VALORES A MODIFICAR //
            $mail->Host = $smtpHost;
            $mail->Username = $smtpUsuario;
            $mail->Password = $smtpClave;

            $mail->From = "evaluacion@neo.cpcoriente.org"; // Email desde donde envío el correo.
            $mail->FromName = "NEO SYSTEM";
            $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

            $mail->Subject = "ASIGNACION A PROYECTO"; // Este es el titulo del email.
            $mensajeHtml = nl2br($pro);
            $mail->Body = "<html><body > <h3>HA SIDO ASIGNADO COMO EVALUADOR DE VIABILIDAD</h3><p><b>ID DEL PROYECTO  : </b> {$pro}</p><p><b>NOMBRE DEL PROYECTO  : </b> $nom</p><p>-- <br><br><i>Este mensaje es generado automáticamente.</i></p></body> </html><br />"; // Texto del email en formato HTML
            $mail->AltBody = "{$pro} \n\n "; // Texto sin formato HTML
            // FIN - VALORES A MODIFICAR //

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];

            $mail->Send();
        }
    }
    // buscar correo de usuario
    public function Mail($usu)
    {
        $ban = "";
        $consulta = mysqli_query($this->conexion, "select email from usuarios where cod='$usu' ");
        if ($datos = mysqli_fetch_array($consulta)) {
            $ban = $datos[0];
        }
        return $ban;
    }
    // enviar email
    public function verificareleMail($pro, $usu, $nom)
    {
        $ban = 1;
        $consulta = mysqli_query($this->conexion, "select count(*) from notificaciones  where pro='$pro' and usu='$usu' and tipo='EVALUACION ELEGIBILIDAD'");
        if ($datos = mysqli_fetch_array($consulta)) {
            $ban = $datos[0];
        }

        if ($ban == 0) {
            $this->notificacionele($pro, $usu, $nom);
            $email = $this->Mail($usu);
            require "class.phpmailer.php";
            require "class.smtp.php";

            // Datos de la cuenta de correo utilizada para enviar vía SMTP
            $smtpHost = "mail.cpcoriente.org"; // Dominio alternativo brindado en el email de alta
            $smtpUsuario = "gary.incode@cpcoriente.org"; // Mi cuenta de correo
            $smtpClave = "incode2020$$"; // Mi contraseña

            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->CharSet = "utf-8";

            // VALORES A MODIFICAR //
            $mail->Host = $smtpHost;
            $mail->Username = $smtpUsuario;
            $mail->Password = $smtpClave;

            $mail->From = "evaluacion@neo.cpcoriente.org"; // Email desde donde envío el correo.
            $mail->FromName = "NEO SYSTEM";
            $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

            $mail->Subject = "ASIGNACION A PROYECTO"; // Este es el titulo del email.
            $mensajeHtml = nl2br($pro);
            $mail->Body = "<html><body > <h3>HA SIDO ASIGNADO COMO EVALUADOR DE ELEGIBILIDAD</h3><p><b>ID DEL PROYECTO  : </b> {$pro}</p><p><b>NOMBRE DEL PROYECTO  : </b> $nom</p><p>-- <br><br><i>Este mensaje es generado automáticamente.</i></p></body> </html><br />"; // Texto del email en formato HTML
            $mail->AltBody = "{$pro} \n\n "; // Texto sin formato HTML
            // FIN - VALORES A MODIFICAR //

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];

            $mail->Send();
        }
    }
    // enviar email
    public function verificareleMailJur($pro, $usu, $nom)
    {
        $ban = 1;
        $consulta = mysqli_query($this->conexion, "select count(*) from notificaciones  where pro='$pro' and usu='$usu' and tipo='ASESOR JURÍDICO/ABOGADO'");
        if ($datos = mysqli_fetch_array($consulta)) {
            $ban = $datos[0];
        }

        if ($ban == 0) {
            $this->notificacioneleJur($pro, $usu, $nom);
            $email = $this->Mail($usu);
            require "class.phpmailer.php";
            require "class.smtp.php";

            // Datos de la cuenta de correo utilizada para enviar vía SMTP
            $smtpHost = "mail.cpcoriente.org"; // Dominio alternativo brindado en el email de alta
            $smtpUsuario = "gary.incode@cpcoriente.org"; // Mi cuenta de correo
            $smtpClave = "incode2020$$"; // Mi contraseña

            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->CharSet = "utf-8";

            // VALORES A MODIFICAR //
            $mail->Host = $smtpHost;
            $mail->Username = $smtpUsuario;
            $mail->Password = $smtpClave;

            $mail->From = "evaluacion@neo.cpcoriente.org"; // Email desde donde envío el correo.
            $mail->FromName = "NEO SYSTEM";
            $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

            $mail->Subject = "ASIGNACION A PROYECTO"; // Este es el titulo del email.
            $mensajeHtml = nl2br($pro);
            $mail->Body = "<html><body > <h3>HA SIDO ASIGNADO COMO ASESOR JURÍDICO/ABOGADO</h3><p><b>ID DEL PROYECTO  : </b> {$pro}</p><p><b>NOMBRE DEL PROYECTO  : </b> $nom</p><p>-- <br><br><i>Este mensaje es generado automáticamente.</i></p></body> </html><br />"; // Texto del email en formato HTML
            $mail->AltBody = "{$pro} \n\n "; // Texto sin formato HTML
            // FIN - VALORES A MODIFICAR //

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];

            $mail->Send();
        }
    }
    // asignar usuario a viabilidad
    public function asignarvia($pro, $usu)
    {   
        $ban="";
        $consulta2 = mysqli_query($this->conexion, "SELECT * from usuariosxpropuesta_via  propuestas where id_propuesta=$pro and id_usuario=$usu");
        if ($datos = mysqli_fetch_array($consulta2)) {
        $ban = "Error al asignar al usuario";
        }
        else{
        mysqli_query($this->conexion, "INSERT INTO `usuariosxpropuesta_via` ( `id_propuesta`, `id_usuario`, `fecha_asig`) VALUES ( '$pro', '$usu', '" . date('Y-m-d') . "');");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = "asignación exitosa";
        }
        }
        return $ban;
    }
    public function EliminarUsuario($id)
    {
        mysqli_query($this->conexion, "delete from `usuarios` where cod=$id");

        if (mysqli_affected_rows($this->conexion) > 0) {
            echo "Usuario eliminado";
        } else {
            echo "No fue posible eliminar el usuario";
        }
    }
    
    function editarObservacion($id,$obs)
    {
       mysqli_query($this->conexion, "update observaciones set observacion ='$obs' where id=$id");

        if (mysqli_affected_rows($this->conexion) > 0) {
            echo "Observación actualizada";
        } else {
            echo "No fue posible actualizar la observación";
        } 
        
    }
    function DelObservacion($id)
    {
       mysqli_query($this->conexion, "delete from observaciones  where id=$id");

        if (mysqli_affected_rows($this->conexion) > 0) {
            echo "Observación eliminada";
            
        } else {
            echo "No fue posible eliminar la observación";
        } 
        
    }
    public function DelCriEle($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `criterios_ele` where id=$id");
        //echo "delete from `criterios_ele` where id=$id";
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar causales de rechazo
    public function DelCausa($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `causales` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar objeticos especiales del proyecto
    public function DelObjEsp($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `especificos` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar productos del proyecto
    public function Delprodu($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `productos` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    
     public function DelConEle($id,$usu,$pro)
    {
         $consulta2 = mysqli_query($this->conexion, "SELECT *  from usuariosxpropuesta_ele where id_propuesta=$pro and id_usuario=$usu");
        //echo "SELECT *  from usuariosxpropuesta_ele where id_propuesta=$pro and id_usuario=$usu";
        if ($datos = mysqli_fetch_array($consulta2)) {
            
            echo "El evaluador se encuentra asignado";
        }
        else{
            
        mysqli_query($this->conexion, "delete from `conflicto_int` where id=$id");
        //echo "delete from `conflicto_int` where id=$id";
        if (mysqli_affected_rows($this->conexion) > 0) {
          echo "Conflicto de interes eliminado";
        }
        else{
        echo "No fue posible eliminar el conflicto";    
            
        }
            
        }
     
      
    }
    
     public function DelConVia($id,$usu,$pro)
    {
         $consulta2 = mysqli_query($this->conexion, "SELECT *  from usuariosxpropuesta_via where id_propuesta=$pro and id_usuario=$usu");
       //echo "SELECT *  from usuariosxpropuesta_via where id_propuesta=$pro and id_usuario=$usu";
        if ($datos = mysqli_fetch_array($consulta2)) {
            
            echo "El evaluador se encuentra asignado";
        }
        else{
            
        mysqli_query($this->conexion, "delete from `conflicto_int` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
          echo "Conflicto de interes eliminado";
        }
        else{
        echo "No fue posible eliminar el conflicto";    
            
        }
            
        }
    }
    
    // eliminar resultado del proyecto
    public function DelRes($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `resultados` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar tipologia del poryecto
    public function DelTip($id, $tipo)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `tipologia` where id_pro=$id and tipologia='$tipo'");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // desasignar evaluador elegibilidad
    public function DelAsigele($id, $criterio, $pro, $usu)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT estado from propuestas where id=$pro");
        if ($datos = mysqli_fetch_array($consulta2)) {
            if ($datos['estado'] < 3) {
                mysqli_query($this->conexion, "delete from `usuariosxpropuesta_ele` where id_propuesta=$pro and id_usuario=$usu ");
                
                if (mysqli_affected_rows($this->conexion) > 0) {
                    echo "Asignación eliminada";
                    mysqli_query($this->conexion, "delete FROM `calificacion_elegibilidad` where id_propuesta=$pro and usuario=$usu");
                    mysqli_query($this->conexion, "delete FROM `notificaciones` where pro=$pro and tipo='EVALUACION ELEGIBILIDAD'");
                    mysqli_query($this->conexion, "delete FROM `subsanaciones` where id_pro=$pro ");
                   
                } else {
                    echo "Error al eliminar";
                }
            } else {
                echo "La evaluación ya finalizó";
            }
        } else {
            echo "No se encontró el proyecto";
        }
    }
    // desasignar asesor juridico
    public function DelAsigeleJur($id, $criterio, $pro, $usu)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT estado from propuestas where id=$pro");
        if ($datos = mysqli_fetch_array($consulta2)) {
            if ($datos['estado'] < 3) {
                mysqli_query($this->conexion, "delete from `usuariosxpropuesta_ele` where id_propuesta=$pro and id_usuario=$usu ");
                //echo "delete from `criterios_ele` where id=$id";
                if (mysqli_affected_rows($this->conexion) > 0) {
                    echo "Asignación eliminada";
                    mysqli_query($this->conexion, "delete FROM `calificacion_elegibilidad` where id_propuesta=$pro and usuario=$usu");
                    mysqli_query($this->conexion, "delete FROM `notificaciones` where pro=$pro and tipo='ASESOR JURÍDICO/ABOGADO'");
                     mysqli_query($this->conexion, "delete FROM `subsanaciones` where id_pro=$pro ");
                   
                } else {
                    echo "Error al eliminar";
                }
            } else {
                echo "La evaluación ya finalizó";
            }
        } else {
            echo "No se encontró el proyecto";
        }
    }
    
    public function VerificaeStateProyectoVia($pro)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT count(*) FROM `usuariosxpropuesta_via` where id_propuesta=$pro");
        if ($datos = mysqli_fetch_array($consulta2)) {
            if ($datos[0] < 2) {
                mysqli_query($this->conexion, "update propuestas set estado=4 where id=$pro");
        
               
            } 
    }
        
    }
     public function VerificaeStateProyectoEle($pro)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT count(*) FROM `usuariosxpropuesta_ele` where id_propuesta=$pro");
        if ($datos = mysqli_fetch_array($consulta2)) {
            if ($datos[0] < 2) {
                mysqli_query($this->conexion, "update propuestas set estado=1 where id=$pro");
        
               
            } 
    }
        
    }
    
     public function VerificarConflictosInt($pro,$usu,$fase)
    {   
       $ban=true;
        $consulta2 = mysqli_query($this->conexion, "select * from conflicto_int where pro=$pro and usu=$usu and fase='$fase' and conflicto=1");
       //echo "select * from conflicto_int where pro=$pro and usu=$usu and fase='$fase' and conflicto=1";
        if ($datos = mysqli_fetch_array($consulta2)) {
        $ban=false;
        }
        return $ban;
    }
    
    
    // desasignar evaluador viabilidad
    public function DelAsigvia($id, $pro,$usu)
    {   
       
        $consulta2 = mysqli_query($this->conexion, "SELECT estado from propuestas where id=$pro");
        if ($datos = mysqli_fetch_array($consulta2)) {
            if ($datos['estado'] < 6) {
                mysqli_query($this->conexion, "delete from `usuariosxpropuesta_via` where id_propuesta=$pro and id_usuario=$usu ");
               // echo "delete from `usuariosxpropuesta_via` where id_propuesta=$pro and id_usuario=$usu ";
                
                if (mysqli_affected_rows($this->conexion) > 0) {
                    echo "Asignación eliminada";
                    mysqli_query($this->conexion, "delete FROM `calificacion_viabilidad` where id_propuesta=$pro and usuario=$usu");
                    mysqli_query($this->conexion, "delete FROM `notificaciones` where pro=$pro and tipo='EVALUACION VIABILIDAD'");
                    
                } else {
                    echo "Error al eliminar";
                }
            } else {
                echo "La evaluación ya finalizó";
            }
        } else {
            echo "No se encontró el proyecto";
        }
    }
    // eliminar proyecto
    public function Delpro($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `propuestas` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar plan de transferencia
    public function DelPt($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `plan_tras` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar anexo
    public function DelAnex($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `documentosxpropuesta` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar criterios de viabilidad
    public function DelCriVia($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `criterios_via` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar critrios adicionales
    public function DelCriViapunadc($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `criterios_adi` where id=$id");
        //echo "delete from `criterios_ele` where id=$id";
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar empresa
    public function Delemp($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `empresas` where id=$id");
        //echo "delete from `criterios_ele` where id=$id";
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // eliminar centro de formacion de plan de trasn
    public function DelCF($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `centrosxpt` where cod=$id");

        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
     public function DelTem($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `tematicasxproyecto` where id=$id");

        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    public function DelEB($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `ent_benxpro` where id=$id");

        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    
    // guardar criterios de evaluacion
    public function guardarCriEle($conv, $tipo, $req, $ayu)
    {
        $ban = false;
        mysqli_query($this->conexion, "INSERT INTO `criterios_ele` ( `id_convocatoria`, `tipo`, `requisito`, `documento`, `observacion`) VALUES ( '$conv', '$tipo', '$req', '$ayu', '');");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // guardar causale de rechazo
    public function guardarCausal($conv, $req, $ayu)
    {
        $ban = false;
        mysqli_query($this->conexion, "INSERT INTO `causales` ( `id_convocatoria`, `causa`, `observacion`) VALUES ( '$conv', '$req', '$ayu');");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    //  actualizar causales de rechazo 
    public function actualizarCausal($cod, $conv, $req, $ayu)
    {
        $ban = false;
        mysqli_query($this->conexion, "update `causales` set  `id_convocatoria`='$conv', `causa`='$req', `observacion`='$ayu' where id='$cod'");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // guardar empresa
    private function validarNIT($nit,$num_ver){
      $ban = true;
      $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT * from empresas where nit='$nit' and num_ver='$num_ver'" 
        );
      if ($datos = mysqli_fetch_array($consulta2)) {
        
        $ban=false;
      }     
        
    return $ban;
    }
    public function guardarEmp($nit, $raz, $act, $tam, $ciu, $dir, $cp, $tel, $ema, $ndoc, $dcrl, $grl, $aluc, $rep, $car_con, $tel_con,$num_ver,$fec_cons)
    {
                
        $ban = false;
        if($this->validarNIT($nit,$num_ver)){
        mysqli_query(
            $this->conexion,
            "INSERT INTO `empresas` (`razon_social`, `nit`, `email`, `direccion`, `tel`, `cod_postal`, `ciudad`, `act_eco`, `tam`, `rep_legal`, `tip_ide_rl`, `num_doc_rl`, `gen_rl`, `ent_al`,tel_con,car_con,num_ver,fec_cons) VALUES ('$raz', '$nit', '$ema', '$dir','$tel', '$cp', '$ciu', '$act', '$tam', '$rep', '$dcrl', '$ndoc', '$grl', '$aluc','$tel_con','$car_con','$num_ver','$fec_cons')"
            
        );
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
             $lastid = mysqli_insert_id($this->conexion);
        
              mysqli_query(
            $this->conexion,
            "INSERT INTO `historial_reg_emp` ( `emp`, `usu`, `fecha`,fec_ult) VALUES ( '$lastid', '$_COOKIE[user_code]', '".date('Y-m-d')."', '".date('Y-m-d')."')");   
            
        }
        }
        
        return $ban;
    }
    // actualizar empresa
    public function editarEmp($id, $nit, $raz, $act, $tam, $ciu, $dir, $cp, $tel, $ema, $ndoc, $dcrl, $grl, $aluc, $rep, $car_con, $tel_con,$num_ver,$fec_cons)
    {
        $ban = false;
        mysqli_query(
            $this->conexion,
            "UPDATE  `empresas` set `razon_social`='$raz', `nit`='$nit', `email`='$ema', `direccion`='$dir', `tel`='$tel', `cod_postal`='$cp', `ciudad`='$ciu', `act_eco`='$act', `tam`='$tam', `rep_legal`='$rep', `tip_ide_rl`='$dcrl', `num_doc_rl`='$ndoc', `gen_rl`='$grl', `ent_al`='$aluc',tel_con='$tel_con',car_con='$car_con',num_ver='$num_ver',fec_cons='$fec_cons' where id=$id"
        );
        //echo "UPDATE  `empresas` set `razon_social`='$raz', `nit`='$nit', `email`='$ema', `direccion`='$dir', `tel`='$tel', `cod_postal`='$cp', `ciudad`='$ciu', `act_eco`='$act', `tam`='$tam', `rep_legal`='$rep', `tip_ide_rl`='$dcrl', `num_doc_rl`='$ndoc', `gen_rl`='$grl', `ent_al`='$aluc',tel_con='$tel_con',car_con='$car_con',num_ver='$num_ver',fec_cons='$fec_cons' where id=$id";
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
            mysqli_query(
            $this->conexion,
            "update `historial_reg_emp` set fec_ult= '".date('Y-m-d')."' where emp=$id"); 
        }
        return $ban;
    }
    //  actualizar criterios elegibilidad
    public function actualizarCriEle($conv, $tipo, $req, $ayu, $cod)
    {
        $ban = false;
        mysqli_query($this->conexion, "update `criterios_ele` set  `id_convocatoria`=$conv, `tipo`=$tipo, `requisito`='$req', documento='$ayu' where id=$cod");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // cargar guardar criterios viabilidad
    public function guardarCriVia($conv, $tipo, $req, $pun, $ayu)
    {
        $ban = false;
        mysqli_query($this->conexion, "INSERT INTO `criterios_via` (`id_convocatoria`, `tipo`, `requisito`, `puntaje`, `observacion`) VALUES ( '$conv', '$tipo', '$req', '$pun', '$ayu')");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // cargar actualizar criterios adicionales
    public function guardarCriViapunadi($conv, $tipo, $req, $pun, $ayu)
    {
        $ban = false;
        mysqli_query($this->conexion, "INSERT INTO `criterios_adi` (`id_convocatoria`, `tipo`, `requisito`, `puntaje`, `observacion`) VALUES ( '$conv', '$tipo', '$req', '$pun', '$ayu')");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    //  actualizar criterios viabilidad
    public function actualizarCriVia($conv, $tipo, $req, $pun, $ayu, $cod)
    {
        $ban = false;
        mysqli_query($this->conexion, "update `criterios_via` set  `id_convocatoria`=$conv, `tipo`=$tipo, `requisito`='$req',puntaje='$pun',observacion='$ayu' where id=$cod");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    //  actualizar criterios adicionales
    public function actualizarCriViaadc($conv, $tipo, $req, $pun, $ayu, $cod)
    {
        $ban = false;
        mysqli_query($this->conexion, "update `criterios_adi` set  `id_convocatoria`=$conv, `tipo`=$tipo, `requisito`='$req',puntaje='$pun',observacion='$ayu' where id=$cod");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    // cargar datos de la empresa
    public function CargarDatosEmpusu($pro)
    {
        $response = [];
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT empresas.*,departamento.codigo,departamento.nombre as dnom,ciudad.nombre as cnom FROM empresas,departamento,ciudad,propuestas WHERE empresas.id=propuestas.id_empresa and empresas.ciudad=ciudad.codigo and ciudad.departamento=departamento.codigo AND propuestas.id=$pro"
        );

        if ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep
                 $num_ver="0";
                if($datos['num_ver']!=0 && $datos['num_ver']!=null)
                {
                    $num_ver=$datos['num_ver'];
                }
            $response = [
                $datos['id'],
                $datos['nit'],
                $datos['razon_social'],
                $datos['act_eco'],
                $datos['tam'],
                $datos['codigo'],
                $datos['ciudad'],
                $datos['direccion'],
                $datos['cod_postal'],
                $datos['tel'],
                $datos['email'],
                $datos['num_doc_rl'],
                $datos['tip_ide_rl'],
                $datos['gen_rl'],
                $datos['ent_al'],
                $datos['rep_legal'],
                $datos['tel_con'],
                $datos['car_con'],
                $num_ver,
                $datos['fec_cons']
                
            ];
        }

        echo json_encode($response);
    }
    // cargar datos de la empresas
    public function CargarDatosEmpresaupd($id)
    {
        $response = [];
        $consulta2 = mysqli_query($this->conexion, "SELECT empresas.*,departamento.codigo FROM empresas,ciudad,departamento WHERE empresas.ciudad=ciudad.codigo and ciudad.departamento=departamento.codigo and empresas.id=$id");

        if ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep
             $num_ver="0";
                if($datos['num_ver']!=0 && $datos['num_ver']!=null)
                {
                    $num_ver=$datos['num_ver'];
                }
            $response = [
                $datos['id'],
                $datos['nit'],
                $datos['razon_social'],
                $datos['act_eco'],
                $datos['tam'],
                $datos['codigo'],
                $datos['ciudad'],
                $datos['direccion'],
                $datos['cod_postal'],
                $datos['tel'],
                $datos['email'],
                $datos['num_doc_rl'],
                $datos['tip_ide_rl'],
                $datos['gen_rl'],
                $datos['ent_al'],
                $datos['rep_legal'],
                $datos['tel_con'],
                $datos['car_con'],
                $num_ver,
                $datos['fec_cons']
            ];
        }

        echo json_encode($response);
    }
    // cargar criterios de elegibilidad
    public function CargarDatosCrieleupd($id)
    {
        $response = [];
        $consulta2 = mysqli_query($this->conexion, "select *from criterios_ele where id=$id");

        if ($datos = mysqli_fetch_array($consulta2)) {
           
            $response = [$datos['id'], $datos['id_convocatoria'], $datos['tipo'], $datos['requisito'], $datos['documento']];
        }

        echo json_encode($response);
    }
    // cargar causales de rechazo
    public function CargarDatosCausaupd($id)
    {
        $response = [];
        $consulta2 = mysqli_query($this->conexion, "select * from causales where id=$id");

        if ($datos = mysqli_fetch_array($consulta2)) {
            
            $response = [$datos['id'], $datos['id_convocatoria'], $datos['causa'], $datos['observacion']];
        }

        echo json_encode($response);
    }
    // cargar criterios de viabilidad
    public function CargarDatosCriviaupd($id)
    {
        $response = [];
        $consulta2 = mysqli_query($this->conexion, "SELECT * FROM `criterios_via` where id=$id");

        if ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep
            $response = [$datos['id'], $datos['id_convocatoria'], $datos['tipo'], $datos['requisito'], $datos['puntaje'], $datos['observacion']];
        }

        echo json_encode($response);
    }
    // cargar criterios adicionales
    public function CargarDatosCriviaAdiupd($id)
    {
        $response = [];
        $consulta2 = mysqli_query($this->conexion, "SELECT * FROM `criterios_adi` where id=$id");

        if ($datos = mysqli_fetch_array($consulta2)) {
            
            $response = [$datos['id'], $datos['id_convocatoria'], $datos['tipo'], $datos['requisito'], $datos['puntaje'], $datos['observacion']];
        }

        echo json_encode($response);
    }
    // cargar datos de la empresa
    public function CargarDatosEmpusu2($pro)
    {
        $response = [];
        $consulta2 = mysqli_query($this->conexion, "SELECT empresas.*,departamento.codigo,departamento.nombre as dnom,ciudad.nombre as cnom FROM empresas,departamento,ciudad where empresas.id=$pro group by empresas.id");

        if ($datos = mysqli_fetch_array($consulta2)) {
             $num_ver="0";
            if($datos['num_ver']!=0 && $datos['num_ver']!=null)
            {
                 $num_ver=$datos['num_ver'];
            }
            $response = [
                $datos['id'],
                $datos['nit'],
                $datos['razon_social'],
                $datos['act_eco'],
                $datos['tam'],
                $datos['codigo'],
                $datos['ciudad'],
                $datos['direccion'],
                $datos['cod_postal'],
                $datos['tel'],
                $datos['email'],
                $datos['num_doc_rl'],
                $datos['tip_ide_rl'],
                $datos['gen_rl'],
                $datos['ent_al'],
                $datos['rep_legal'],
                $num_ver,
                $datos['fec_cons'],
                $datos['car_con'],
                $datos['tel_con']
            ];
        }

        echo json_encode($response);
    }
    // cargar listado empresas
    public function lemp()
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT empresas.*,departamento.codigo,departamento.nombre as dnom,ciudad.nombre as cnom FROM empresas,departamento,ciudad WHERE empresas.ciudad=ciudad.codigo and ciudad.departamento=departamento.codigo order by empresas.razon_social ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Nit</th><th>Razón social</th><th>Fecha constitución</th><th>Representante legal</th><th>Departamento</th><th>Ciudad</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$icon = "";
while ($datos = mysqli_fetch_array($consulta2)) {
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
    if ($_COOKIE['user_rol'] == 5) {
        $icon = "<i class='fas fa-trash-alt icon_sesion'  onclick='DelEmp($datos[id])'></i>";
    } else {
        $icon = "";
    }
    echo "<tr ><td>$fila</td><td>$datos[nit]$num_ver</td><td >$datos[razon_social]</td><td >".$this->FormatDate2($datos['fec_cons'])."</td><td >$datos[rep_legal]</td><td >$datos[dnom]</td><td >$datos[cnom]</td><td><i class='fas fa-pencil-alt icon_sesion' onclick=\"editarEmp($datos[id])\"> </i>$icon</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='8'>No hay registro de empresas</td></tr>";
}?>
</tbody></table>
<?php
    }

 public function lempReg()
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT empresas.*,historial_reg_emp.*,usuarios.nombre,usuarios.rol FROM empresas,`historial_reg_emp`,usuarios WHERE empresas.id=historial_reg_emp.emp and usuarios.cod=historial_reg_emp.usu order by empresas.id ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Nit</th><th>Razón social</th><th>Usuario que registró</th><th>Fecha registro</th><th>Última feha modificación</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$icon = "";
$rol="";
while ($datos = mysqli_fetch_array($consulta2)) {
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
    if($datos['rol']==5)$rol="GESTOR TÉCNICO";
    else $rol="DIGITADOR";
    echo "<tr ><td>$fila</td><td>$datos[nit]$num_ver</td><td >$datos[razon_social]</td><td >$datos[nombre] - $rol</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($datos['fec_ult'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='6'>No hay registro de empresas</td></tr>";
}?>
</tbody></table>
<?php
    }



    public function lempaux()
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT empresas.*,departamento.codigo,departamento.nombre as dnom,ciudad.nombre as cnom FROM empresas,departamento,ciudad,historial_reg_emp WHERE empresas.id=historial_reg_emp.emp and empresas.ciudad=ciudad.codigo and ciudad.departamento=departamento.codigo and historial_reg_emp.usu=$_COOKIE[user_code] order by empresas.razon_social ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Nit</th><th>Razón social</th><th>Fecha constitución</th><th>Representante legal</th><th>Departamento</th><th>Ciudad</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$icon = "";
while ($datos = mysqli_fetch_array($consulta2)) {
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
    if ($_COOKIE['user_rol'] == 5) {
        $icon = "<i class='fas fa-trash-alt icon_sesion'  onclick='DelEmp($datos[id])'></i>";
    } else {
        $icon = "";
    }
    echo "<tr ><td>$fila</td><td>$datos[nit]$num_ver</td><td >$datos[razon_social]</td><td >".$this->FormatDate2($datos['fec_cons'])."</td><td >$datos[rep_legal]</td><td >$datos[dnom]</td><td >$datos[cnom]</td><td><i class='fas fa-pencil-alt icon_sesion' onclick=\"editarEmp($datos[id])\"> </i>$icon</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='8'>No hay registro de empresas</td></tr>";
}?>
</tbody></table>
<?php
    }    
    
    
    // listado de empresas colombia productiva
    public function lempcp()
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT empresas.*,departamento.codigo,departamento.nombre as dnom,ciudad.nombre as cnom FROM empresas,departamento,ciudad WHERE empresas.ciudad=ciudad.codigo and ciudad.departamento=departamento.codigo order by empresas.razon_social ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Nit</th><th>Razón social</th><th>Fecha constitución</th><th>Representante legal</th><th>Departamento</th><th>Ciudad</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
while ($datos = mysqli_fetch_array($consulta2)) {
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
    echo "<tr ><td>$fila</td><td>$datos[nit]$num_ver</td><td >$datos[razon_social]</td><td >$datos[fec_cons]</td><td >$datos[rep_legal]</td><td >$datos[dnom]</td><td >$datos[cnom]</td><td><i class='fas fa-search icon_sesion' onclick=\"MostrarEmp_evacp($datos[id])\"></i></td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='8'>No hay registro de empresas</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar planes de transfeencia vista evaluadores
    public function CargarPteva($pro)
    {
        $rowcount = 1;
        $contador = 0;
        $centros_for = ["No hay centros agregados"];
        $consulta = mysqli_query($this->conexion, "SELECT `centrosxpt`.* FROM `centrosxpt`,plan_tras,propuestas where centrosxpt.pt=plan_tras.id and plan_tras.id_pro=propuestas.id and propuestas.id=$pro");
        while ($datos2 = mysqli_fetch_array($consulta)) {
            $rowcount += 1;
            $centros_for[$contador] = $datos2['centro'];
            $contador++;
        }

        $consulta2 = mysqli_query($this->conexion, "SELECT plan_tras.* FROM plan_tras where plan_tras.id_pro=$pro");
        ?>

<table class="table table-bordered" id="tblpt"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Centros de formación SENA</th><th>Valor Cofinanciación SENA</th><th>Valor contrapartida ejecutor efectivo</th><th>Valor contrapartida ejecutor especie</th><th>Valor de plan de transferencia</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
if ($datos = mysqli_fetch_array($consulta2)) {
    $total = $datos['nombre'] + $datos['val_con'] + $datos['val_fin'];
    echo "<tr ><td>$fila</td><td>$centros_for[0]</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;' >$ " .
        number_format($datos['nombre'], 2, '.', ',') .
        "</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;'>$ " .
        number_format($datos['val_con'], 2, '.', ',') .
        "</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;'>$ " .
        number_format($datos['val_fin'], 2, '.', ',') .
        "</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;'>$ " .
        number_format($total, 2, '.', ',') .
        "</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;'><i class='fas fa-search icon_sesion' onclick=\"editarpt2($datos[id],'$datos[nombre]',$datos[val_con],$datos[val_fin])\"> </i></td></tr>";
    $fila++;
    for ($x = 1; $x < count($centros_for); $x++) {
        echo "<tr ><td>$fila</td><td>$centros_for[$x]</td></tr>";
        $fila++;
    }
} else {
    echo "<tr ><td colspan='7'>No hay planes de trasferencia</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar planes de transferenia
    public function CargarPt($pro)
    {
        $rowcount = 1;
        $contador = 0;
        $centros_for = ["No hay centros agregados"];
        $consulta = mysqli_query($this->conexion, "SELECT `centrosxpt`.* FROM `centrosxpt`,plan_tras,propuestas where centrosxpt.pt=plan_tras.id and plan_tras.id_pro=propuestas.id and propuestas.id=$pro");
        while ($datos2 = mysqli_fetch_array($consulta)) {
            $rowcount += 1;
            $centros_for[$contador] = $datos2['centro'];
            $contador++;
        }

        $consulta2 = mysqli_query($this->conexion, "SELECT plan_tras.* FROM plan_tras where plan_tras.id_pro=$pro");
        ?>

<table class="table table-bordered" id="tblpt"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Centros de formación SENA</th><th>Valor Cofinanciación SENA</th><th>Valor contrapartida ejecutor efectivo</th><th>Valor contrapartida ejecutor especie</th><th>Valor de plan de transferencia</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
if ($datos = mysqli_fetch_array($consulta2)) {
    $total = $datos['nombre'] + $datos['val_con'] + $datos['val_fin'];
    echo "<tr ><td>$fila</td><td>$centros_for[0]</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;' >$ " .
        number_format($datos['nombre'], 2, '.', ',') .
        "</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;'>$ " .
        number_format($datos['val_con'], 2, '.', ',') .
        "</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;'>$ " .
        number_format($datos['val_fin'], 2, '.', ',') .
        "</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;'>$ " .
        number_format($total, 2, '.', ',') .
        "</td><td rowspan='$rowcount' style='vertical-align: middle;text-align:center;'><i class='fas fa-pencil-alt icon_sesion' onclick=\"editarpt($datos[id],'$datos[nombre]',$datos[val_con],$datos[val_fin])\"> </i><i class='fas fa-trash-alt icon_sesion'  onclick='DelPt($datos[id])'></i></td></tr>";
    $fila++;
    for ($x = 1; $x < count($centros_for); $x++) {
        echo "<tr ><td>$fila</td><td>$centros_for[$x]</td></tr>";
        $fila++;
    }
} else {
    echo "<tr ><td colspan='7'>No hay planes de trasferencia</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar centros de formacion vista gestor
    public function CargarCF($pt)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT centrosxpt.*,plan_tras.nombre FROM `centrosxpt`,plan_tras where centrosxpt.pt=plan_tras.id and centrosxpt.pt=$pt"); ?>

<table class="table table-bordered" id="tblpt2"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Centro de formación</th><th>Folio</th><th>Formato</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

while ($datos = mysqli_fetch_array($consulta2)) {
    

    if ($datos['formato'] == null) {
        echo "<tr ><td>$fila</td><td>$datos[centro]</td><td >$datos[folio]</td><td ><i class='fas fa-times icon_sesion3'  onclick=\"alert('No hay formato')\"></i></td><td><i class='fas fa-trash-alt icon_sesion'  onclick='DelCF($datos[cod])'></i></td></tr>";
    } else {
        echo "<tr ><td>$fila</td><td>$datos[centro]</td><td >$datos[folio]</td><td ><a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=$datos[formato]' target='_blank'><i class='fas fa-file icon_sesion'  ></i></a></td><td><i class='fas fa-trash-alt icon_sesion'  onclick='DelCF($datos[cod])'></i></td></tr>";
    }
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='6'>No hay centros de formación</td></tr>";
}?>
</tbody></table>
<?php
    }
    
        public function CargarTematicas($pro)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT  tematicasxproyecto.id,tematicas.des as tem_des FROM tematicas,`tematicasxproyecto`,propuestas WHERE tematicas.id = tematicasxproyecto.tem AND propuestas.id= tematicasxproyecto.pro and tematicasxproyecto.pro=$pro"); ?>

<table class="table table-bordered" id="tbltem"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Temática asociada a proyecto</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

while ($datos = mysqli_fetch_array($consulta2)) {
    
    echo "<tr><td>$fila</td><td>$datos[tem_des]</td><td><i class='fas fa-trash-alt icon_sesion'  onclick='DelTem($datos[id])'></i></td></tr>";

    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='3'>No hay tematicas asociadas</td></tr>";
}?>
</tbody></table>
<?php
    }
    
    
    private function NovedadesEntBen($entidades,$nit,$n_v,$pro){
        $novedad=0;
      for($i=0;$i<count($entidades);$i++)
      {
          if($entidades[$i][1]==$nit && $entidades[$i][2]==$n_v && $entidades[$i][5]!=$pro)
          {
              $novedad++;
          }
      }
     return $novedad;    
    }
    
       
        public function CargarEB($pro)
    {
        
        $entidades=$this->arrayEntBen();
        
        $consulta2 = mysqli_query($this->conexion, "SELECT * from ent_benxpro where pro=$pro"); ?>

<table class="table table-bordered" id="tblEB"><thead style="background:#f8f9fa;"><tr><th>#</th><th>NIT</th><th>Razón social</th><th>Fecha de constitución</th><th>Novedades</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

while ($datos = mysqli_fetch_array($consulta2)) {
    $num_ver="-0";
    $text_nov="";
    if($datos['num_ver']!=null && $datos['num_ver']!="" && $datos['num_ver']!="0" )
    {
    $num_ver="-".$datos['num_ver'];    
    }
    $novedades=$this->NovedadesEntBen($entidades,$datos['nit'],$datos['num_ver'],$pro);
    if($novedades==0){
    $text_nov="No hay novedades";
    }
    else{
        if($novedades==1){
    $text_nov="la entidad se encuentra asociada a $novedades proyecto <i class='fa fa-exclamation-circle' style='color:red;'></i> ";    }
    else{
        $text_nov="la entidad se encuentra asociada a $novedades proyectos <i class='fa fa-exclamation-circle' style='color:red;'></i> ";
    }
    }
    echo "<tr><td>$fila</td><td>$datos[nit]$num_ver</td><td>$datos[raz]</td><td>".$this->FormatDate2($datos['fecha_cons'])."</td><td>$text_nov</td><td><i class='fas fa-trash-alt icon_sesion'  onclick='DelEB($datos[id])'></i></td></tr>";

    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='6'>No hay entidades beneficiarias asociadas</td></tr>";
}?>
</tbody></table>
<?php
    }
    
    
     public function CargarEB_eva($pro)
    {   
        
        $entidades=$this->arrayEntBen();
        $consulta2 = mysqli_query($this->conexion, "SELECT * from ent_benxpro where pro=$pro"); ?>

<table class="table table-bordered" id="tblEB"><thead style="background:#f8f9fa;"><tr><th>#</th><th>NIT</th><th>Razón social</th><th>Fecha de constitución</th><th>Novedades</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

while ($datos = mysqli_fetch_array($consulta2)) {
    $num_ver="-0";
     $text_nov="";
    if($datos['num_ver']!=null && $datos['num_ver']!="" )
    {
    $num_ver="-".$datos['num_ver'];    
    }
     $novedades=$this->NovedadesEntBen($entidades,$datos['nit'],$datos['num_ver'],$pro);
    if($novedades==0){
    $text_nov="No hay novedades";
    }
    else{
     if($novedades==1){
    $text_nov="la entidad se encuentra asociada a $novedades proyecto <i class='fa fa-exclamation-circle' style='color:red;'></i>";    }
    else{
        $text_nov="la entidad se encuentra asociada a $novedades proyectos <i class='fa fa-exclamation-circle' style='color:red;'></i>";
    } 
    }
    echo "<tr><td>$fila</td><td>$datos[nit]$num_ver</td><td>$datos[raz]</td><td>".$this->FormatDate2($datos['fecha_cons'])."</td><td>$text_nov</td></tr>";

    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='6'>No entidades beneficiarias asociadas</td></tr>";
}?>
</tbody></table>
<?php
    }
    
 private function arrayEntBen(){
     $ent=[];
     $consulta2 = mysqli_query($this->conexion, "SELECT * from ent_benxpro"); 
     while ($datos = mysqli_fetch_array($consulta2)) {
     $ent[]=$datos;
    }  
     return $ent;
 }
 
 
        public function CargarTematicas2($pro)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT  tematicasxproyecto.id,tematicas.des as tem_des FROM tematicas,`tematicasxproyecto`,propuestas WHERE tematicas.id = tematicasxproyecto.tem AND propuestas.id= tematicasxproyecto.pro and tematicasxproyecto.pro=$pro"); ?>

<table class="table table-bordered" id="tbltem"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Temática asociada a proyecto</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

while ($datos = mysqli_fetch_array($consulta2)) {
    
    echo "<tr><td>$fila</td><td>$datos[tem_des]</td></tr>";

    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='2'>No hay tematicas asociadas</td></tr>";
}?>
</tbody></table>
<?php
    }    
    // cargar centros de formacion vistas diferentes a gestor
    public function CargarCF2($pt)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT centrosxpt.*,plan_tras.nombre FROM `centrosxpt`,plan_tras where centrosxpt.pt=plan_tras.id and centrosxpt.pt=$pt"); ?>

<table class="table table-bordered" id="tblpt2"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Centro de formación</th><th>Folio</th><th>Formato</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
while ($datos = mysqli_fetch_array($consulta2)) {
    

    if ($datos['formato'] == null) {
        echo "<tr ><td>$fila</td><td>$datos[centro]</td><td >$datos[folio]</td><td ><i class='fas fa-times icon_sesion3' onclick=\"alert('No hay formato')\"></i></td></tr>";
    } else {
        echo "<tr ><td>$fila</td><td>$datos[centro]</td><td >$datos[folio]</td><td ><a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=$datos[formato]' target='_blank'><i class='fas fa-file icon_sesion'  ></i></a></td></tr>";
    }
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='6'>No hay centros de formación</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar subsanaciones vista  gestor
    public function CargarDivsub($pro)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT subsanaciones.*,criterios_ele.requisito,propuestas.estado as estadop FROM `subsanaciones`,criterios_ele,propuestas WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id_criterio=criterios_ele.id and subsanaciones.id_pro=$pro"
        ); ?>
<button class="btn-functions" id="btn_add_sub" onclick="MostrarDivEvaEle('divsub')"><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
<table class="table table-bordered" id="tblsubsana"><thead style="background:#f8f9fa;"><tr><th>Requisito</th><th>Fecha solicitud</th><th>Respuesta a evaluador</th><th>Estado</th><th>Observación</th><th>N. Folio</th> <th>Archivo</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$llave = "";
$estado = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    
 if($datos['n_folio']==0 )$folio=''; else $folio=$datos['n_folio'];
   if($datos['estado']==0 )$estado='Solicitada';
    else if($datos['estado']==1 )$estado='En proceso';
    else $estado='Finalizada';
    if (($datos['estado'] == 0 || $datos['estado'] == 1) && $datos['estadop'] == 2) {
        $llave = "<i class='fas fa-wrench icon_sesion'  onclick=\"SubsanarPro($datos[id],'".$this->FormatDate2($datos['fecha'])."',$fila)\"></i>";
    } else {
        $llave = "<i class='fas fa-wrench icon_sesion'  onclick=\"alert('Operación denegada')\"></i>";
    }

    $fecha_res = "";
    if ($datos['archivo'] == null) {
        
        echo "<tr ><td>$datos[requisito]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($datos['fec_sub'])."</td><td >$estado</td><td >$datos[observacion]</td><td >$folio</td><td ><i class='fas fa-times icon_sesion3'  onclick=\"alert('No hay archivo')\"></i></td><td>$llave</td></tr>";
    } else {
        echo "<tr ><td>$datos[requisito]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($datos['fec_sub'])."</td><td >$estado</td><td >$datos[observacion]</td><td >$folio</td><td ><a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=$datos[archivo]' target='_blank'><i class='fas fa-file icon_sesion'  ></i></a></td><td>$llave</td></tr>";
    }
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay subsanaciones</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar subsanaciones vistas diferentes a gestor
    public function CargarDivsubusu($pro)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT subsanaciones.*,criterios_ele.requisito,propuestas.estado as estadop FROM `subsanaciones`,criterios_ele,propuestas,usuariosxpropuesta_ele,tipos_cri_ele WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id_criterio=criterios_ele.id and usuariosxpropuesta_ele.id_propuesta=subsanaciones.id_pro and criterios_ele.tipo=tipos_cri_ele.cod and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and usuariosxpropuesta_ele.id_propuesta=$pro and usuariosxpropuesta_ele.id_usuario=$_COOKIE[user_code]"
        ); ?>
<h5 style="text-align: center;color:#196B95;"><b>Subsanaciones</b></h5> <br>
<button class="btn-functions" id="btn_add_sub" onclick="RefreshSubsana()"><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Requisito</th><th>Estado</th><th>Fecha solicitud</th><th>Fecha respuesta</th><th>N. Folio</th> <th>Archivo</th><th>Finalizar</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$llave = "";
$estado = "";
$finalizar="";
while ($datos = mysqli_fetch_array($consulta2)) {
    //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

  if($datos['estado']==0 ){$estado='Solicitada'; $checked="";}
    else if($datos['estado']==1 ){$estado='En proceso'; $checked=""; }
    else {$estado='Finalizada'; $checked="checked";}
  
  if($datos['estadop']>=3){
     $finalizar="<input type='checkbox' id='check_final$fila' $checked disabled>"; 
  }
  else{
      $finalizar="<input type='checkbox' id='check_final$fila' $checked onclick='FinalizarSubsana($datos[id])' >"; 
  }
    
    $fecha_res = "";
    if($datos['n_folio']==0 )$folio="";else $folio=$datos['n_folio'];
    
    if ($datos['archivo'] == null) {
        if ($datos['fecha2'] == null || $datos['fecha2'] == "") {
            $fecha_res = "Sin subsanar";
        } else {
            $fecha_res = $datos['fecha2'];
        }
        echo "<tr ><td>$datos[requisito]</td><td >$estado</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($datos['fec_sub'])."</td><td >$folio</td><td ><i class='fas fa-times icon_sesion3'  onclick=\"alert('No hay archivo')\"></i></td><td >$finalizar</td></tr>";
    } else {
        echo "<tr ><td>$datos[requisito]</td><td >$estado</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($datos['fec_sub'])."</td><td >$folio</td><td ><a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=$datos[archivo]' target='_blank'><i class='fas fa-file icon_sesion'  ></i></a></td><td >$finalizar</td></tr>";
    }
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay subsanaciones</td></tr>";
}?>
</tbody></table>
<?php
    }
public function CargarDivsubusuJur($pro)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT subsanaciones.*,criterios_ele.requisito,propuestas.estado as estadop FROM `subsanaciones`,criterios_ele,propuestas,usuariosxpropuesta_ele,tipos_cri_ele WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id_criterio=criterios_ele.id and usuariosxpropuesta_ele.id_propuesta=subsanaciones.id_pro and criterios_ele.tipo=tipos_cri_ele.cod and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and usuariosxpropuesta_ele.id_propuesta=$pro and usuariosxpropuesta_ele.id_usuario=$_COOKIE[user_code]"
        ); ?>
<h5 style="text-align: center;color:#196B95;"><b>Subsanaciones</b></h5> <br>
<button class="btn-functions" id="btn_add_sub" onclick="RefreshSubsanaJur()"><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Requisito</th><th>Estado</th><th>Fecha solicitud</th><th>Fecha respuesta</th><th>N. Folio</th> <th>Archivo</th><th>Finalizar</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$llave = "";
$estado = "";
$finalizar="";
while ($datos = mysqli_fetch_array($consulta2)) {
    //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

  if($datos['estado']==0 ){$estado='Solicitada'; $checked="";}
    else if($datos['estado']==1 ){$estado='En proceso'; $checked=""; }
    else {$estado='Finalizada'; $checked="checked";}
  
  if($datos['estadop']>=3){
     $finalizar="<input type='checkbox' id='check_final$fila' $checked disabled>"; 
  }
  else{
      $finalizar="<input type='checkbox' id='check_final$fila' $checked onclick='FinalizarSubsanaJur($datos[id])' >"; 
  }
    
    $fecha_res = "";
    if($datos['n_folio']==0 )$folio="";else $folio=$datos['n_folio'];
    
    if ($datos['archivo'] == null) {
        if ($datos['fecha2'] == null || $datos['fecha2'] == "") {
            $fecha_res = "Sin subsanar";
        } else {
            $fecha_res = $datos['fecha2'];
        }
        echo "<tr ><td>$datos[requisito]</td><td >$estado</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($datos['fec_sub'])."</td><td >$folio</td><td ><i class='fas fa-times icon_sesion3'  onclick=\"alert('No hay archivo')\"></i></td><td >$finalizar</td></tr>";
    } else {
        echo "<tr ><td>$datos[requisito]</td><td >$estado</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($datos['fec_sub'])."</td><td >$folio</td><td ><a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=$datos[archivo]' target='_blank'><i class='fas fa-file icon_sesion'  ></i></a></td><td >$finalizar</td></tr>";
    }
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay subsanaciones</td></tr>";
}?>
</tbody></table>
<?php
    }    
    // cargar subsanaciones vistas diferentes a gestor
    public function CargarDivsub2($pro)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT subsanaciones.*,criterios_ele.requisito,propuestas.estado as estadop FROM `subsanaciones`,criterios_ele,propuestas,usuariosxpropuesta_ele,tipos_cri_ele WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id_criterio=criterios_ele.id and usuariosxpropuesta_ele.id_propuesta=subsanaciones.id_pro and criterios_ele.tipo=tipos_cri_ele.cod and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and usuariosxpropuesta_ele.id_propuesta=$pro and usuariosxpropuesta_ele.id_usuario=$_COOKIE[user_code]"
        ); ?>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Requisito</th><th>Fecha solicitud</th><th>Fecha subsanado</th><th>Observación Evaluador</th><th>N. Folio</th> <th>Archivo</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$llave = "";
$estado = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    

    if ($datos['estado'] == 0) {
        $estado = "Sin aprobar";
    } else {
        $estado = "Aprobado";
    }

    if ($datos['estado'] == 0 && $datos['estadop'] == 2) {
        $llave = "<i class='fas fa-wrench icon_sesion'  onclick=\"SubsanarPro($datos[id],'$datos[fecha]','$datos[requisito]','$datos[observacion]','$datos[respuesta]','$datos[n_folio]')\"></i>";
    } else {
        $llave = "<i class='fas fa-wrench icon_sesion'  onclick=\"alert('Operación denegada')\"></i>";
    }

    $fecha_res = "";
    if ($datos['archivo'] == null) {
        if ($datos['fecha2'] == null || $datos['fecha2'] == "") {
            $fecha_res = "Sin subsanar";
        } else {
            $fecha_res = $datos['fecha2'];
        }
        echo "<tr ><td>$datos[requisito]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($fecha_res)."</td><td >$datos[observacion]</td><td >$datos[n_folio]</td><td ><i class='fas fa-times icon_sesion3' onclick=\"alert('No hay archivo')\"></i></td></tr>";
    } else {
        echo "<tr ><td>$datos[requisito]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($datos['fecha2'])."</td><td >$datos[observacion]</td><td >$datos[n_folio]</td><td ><a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=$datos[archivo]' target='_blank'><i class='fas fa-file icon_sesion'  ></i></a></td></tr>";
    }
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay subsanaciones</td></tr>";
}?>
</tbody></table>
<?php
    }
public function CargarDivsub22($pro)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT subsanaciones.*,criterios_ele.requisito,propuestas.estado as estadop FROM `subsanaciones`,criterios_ele,propuestas,usuariosxpropuesta_ele,tipos_cri_ele WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id_criterio=criterios_ele.id and usuariosxpropuesta_ele.id_propuesta=subsanaciones.id_pro and criterios_ele.tipo=tipos_cri_ele.cod and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and usuariosxpropuesta_ele.id_propuesta=$pro "
        ); ?>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Requisito</th><th>Fecha solicitud</th><th>Fecha subsanado</th><th>Observación Evaluador</th><th>N. Folio</th> <th>Archivo</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$llave = "";
$estado = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    

    if ($datos['estado'] == 0) {
        $estado = "Sin aprobar";
    } else {
        $estado = "Aprobado";
    }

    if ($datos['estado'] == 0 && $datos['estadop'] == 2) {
        $llave = "<i class='fas fa-wrench icon_sesion'  onclick=\"SubsanarPro($datos[id],'$datos[fecha]','$datos[requisito]','$datos[observacion]','$datos[respuesta]','$datos[n_folio]')\"></i>";
    } else {
        $llave = "<i class='fas fa-wrench icon_sesion'  onclick=\"alert('Operación denegada')\"></i>";
    }

    $fecha_res = "";
    if ($datos['archivo'] == null) {
        if ($datos['fecha2'] == null || $datos['fecha2'] == "") {
            $fecha_res = "Sin subsanar";
        } else {
            $fecha_res = $datos['fecha2'];
        }
        echo "<tr ><td>$datos[requisito]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($fecha_res)."</td><td >$datos[observacion]</td><td >$datos[n_folio]</td><td ><i class='fas fa-times icon_sesion3' onclick=\"alert('No hay archivo')\"></i></td></tr>";
    } else {
        echo "<tr ><td>$datos[requisito]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td >".$this->FormatDate2($datos['fecha2'])."</td><td >$datos[observacion]</td><td >$datos[n_folio]</td><td ><a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=$datos[archivo]' target='_blank'><i class='fas fa-file icon_sesion'  ></i></a></td></tr>";
    }
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay subsanaciones</td></tr>";
}?>
</tbody></table>
<?php
    }
    
    // ver usuarios asignados requisitos viabilidad  evaluador 
    public function CargarAsigvia($conv)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `usuariosxpropuesta_via`.*,propuestas.nom,usuarios.nombre as usunom,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as nempresa FROM `usuariosxpropuesta_via`,propuestas,usuarios,convocatoria,empresas WHERE usuariosxpropuesta_via.id_propuesta=propuestas.id and usuariosxpropuesta_via.id_usuario=usuarios.cod and propuestas.id_convocatoria=convocatoria.id and propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=$conv GROUP BY `usuariosxpropuesta_via`.id_propuesta order by usuarios.nombre ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>Proyecto</th><th>Empresa</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
while ($datos = mysqli_fetch_array($consulta2)) {
   

    echo "<tr ><td>$datos[id_propuesta]</td><td >".strtoupper($datos['nom'])."</td><td >$datos[nempresa]</td><td><i title='Ver evaluadores  asignados' class='fas fa-users icon_sesion'  onclick='VerAsigvia($conv,$datos[id_propuesta])'></i></td></tr>";

    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='3'>No hay proyectos asignados a viabilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    // ver usuarios asignados requisitos elegibilidad evaluador  
    public function CargarAsigele($conv)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `usuariosxpropuesta_ele`.*,propuestas.nom,usuarios.nombre as usunom,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as nempresa FROM `usuariosxpropuesta_ele`,propuestas,usuarios,tipos_cri_ele,convocatoria,rol,empresas WHERE usuariosxpropuesta_ele.id_propuesta=propuestas.id and usuariosxpropuesta_ele.id_usuario=usuarios.cod and usuarios.rol=rol.cod and usuarios.rol=3 and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and propuestas.id_convocatoria=convocatoria.id and propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=$conv GROUP BY `usuariosxpropuesta_ele`.`id_propuesta` order by usuarios.nombre ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>Título proyecto</th><th>Empresa</th><th>Evaluador asignado</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr ><td>$datos[id_propuesta]</td><td >".strtoupper($datos['nom'])."</td><td >$datos[nempresa]</td><td >$datos[usunom]</td><td><i title='Retirar evaluador' class='fas fa-trash-alt icon_sesion'  onclick='DelAsigele($datos[id],$datos[criterio],$datos[id_propuesta],$datos[id_usuario])'></i></td></tr>";

    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='4'>No hay proyectos asignados a elegibilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    // ver usuarios asignados requisitos elegibilidad asesor juridico  
    public function CargarAsigeleJur($conv)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `usuariosxpropuesta_ele`.*,propuestas.nom,usuarios.nombre as usunom,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as nempresa FROM `usuariosxpropuesta_ele`,propuestas,usuarios,tipos_cri_ele,convocatoria,rol,empresas WHERE usuariosxpropuesta_ele.id_propuesta=propuestas.id and usuariosxpropuesta_ele.id_usuario=usuarios.cod and usuarios.rol=rol.cod and usuarios.rol=6 and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and propuestas.id_convocatoria=convocatoria.id and propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=$conv GROUP BY `usuariosxpropuesta_ele`.`id_propuesta` order by usuarios.nombre ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>Título proyecto</th><th>Empresa</th><th>Asesor jurídico/abogado asignado</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr ><td>$datos[id_propuesta]</td><td >".strtoupper($datos['nom'])."</td><td >$datos[nempresa]</td><td >$datos[usunom]</td><td><i title='Retirar asesor jurídico / abogado' class='fas fa-trash-alt icon_sesion'  onclick='DelAsigeleJur($datos[id],$datos[criterio],$datos[id_propuesta],$datos[id_usuario])'></i></td></tr>";

    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='4'>No hay proyectos asignados a asesores jurídicos/abogados</td></tr>";
}?>
</tbody></table>
<?php
    }
    // ver usuarios asignados requisitos elegibilidad  
    public function VerAsigele($conv, $pro)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `usuariosxpropuesta_ele`.*,propuestas.nom,usuarios.nombre as usunom,tipos_cri_ele.nombre tipnom,propuestas.estado FROM `usuariosxpropuesta_ele`,propuestas,usuarios,tipos_cri_ele,convocatoria WHERE usuariosxpropuesta_ele.id_propuesta=propuestas.id and usuariosxpropuesta_ele.id_usuario=usuarios.cod and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria=$conv and `usuariosxpropuesta_ele`.`id_propuesta`=$pro  order by usuarios.nombre ASC"
        );
        $data = [];
        $data[0] =
            "<input type='text'  placeholder='Filtrar datos' class='form-control' onkeyup=\"TableFilter('#tblcriele2',this.value)\"><table class='table table-bordered' id='tblcriele2'><thead style='background:#f8f9fa;'><tr><th>Evaluador</th><th>Criterios asignados</th><th>Acciones</th></tr></thead><tbody id='bd-list-convos'>";

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta2)) {
            

            if ($datos['estado'] >= 3) {
                $data[0] .= "<tr ><td>$datos[usunom]</td><td >$datos[tipnom]</td><td><i class='fas fa-trash-alt icon_sesion'  onclick=\"alert('El proyecto ya se encuentra evaluado')\"></i></td></tr>";
            } else {
                $data[0] .= "<tr ><td>$datos[usunom]</td><td >$datos[tipnom]</td><td><i class='fas fa-trash-alt icon_sesion'  onclick='DelAsigele($datos[id],$datos[criterio],$pro)'></i></td></tr>";
            }
            $data[1] = strtoupper($datos['nom']);
            $fila++;
        }

        if ($fila == 1) {
            $data[0] .= "<tr ><td colspan='3'>No hay evaluadores asignados</td></tr>";
            $data[1] = "Datos no disponibles";
        }

        $data[0] .= "</tbody></table>";
        echo json_encode($data);
    }
    // ver usuarios asignados requisitos viablidad
    public function VerAsigvia($conv, $pro)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `usuariosxpropuesta_via`.*,propuestas.nom,usuarios.nombre as usunom,propuestas.estado FROM `usuariosxpropuesta_via`,propuestas,usuarios,convocatoria WHERE usuariosxpropuesta_via.id_propuesta=propuestas.id and usuariosxpropuesta_via.id_usuario=usuarios.cod and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria=$conv and `usuariosxpropuesta_via`.`id_propuesta`=$pro   order by usuarios.nombre ASC"
        );

        $data = [];
        $data[0] =
            "<input type='text'  placeholder='Filtrar datos' class='form-control' onkeyup=\"TableFilter('#tblcriele2',this.value)\"><table class='table table-bordered' id='tblcriele2'><thead style='background:#f8f9fa;'><tr><th>Evaluadores asignado</th><th>Rol</th><th>Acciones</th></tr></thead><tbody id='bd-list-convos'>";

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

            if ($datos['estado'] == 6) {
                $data[0] .= "<tr ><td >$datos[usunom]</td><td >Evaluador $fila</td><td><i class='fas fa-trash-alt icon_sesion'  onclick=\"alert('El proyecto ya se encuentra evaluado')\"></i></td></tr>";
            } else {
                $data[0] .= "<tr ><td >$datos[usunom]</td><td >Evaluador $fila</td><td><i class='fas fa-trash-alt icon_sesion'  onclick='DelAsigvia($datos[id],$pro,$datos[id_usuario])'></i></td></tr>";
            }

            $data[1] = strtoupper($datos['nom']);
            $fila++;
        }

        if ($fila == 1) {
            echo "<tr ><td colspan='3'>No hay evaluadores asignados</td></tr>";
            $data[1] = "Datos no disponibles";
        }

        $data[0] .= "</tbody></table>";
        echo json_encode($data);
    }
    // ver usuarios asignados requisitos eegibilidad  
    public function VerAsigele2($conv, $pro)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `usuariosxpropuesta_ele`.*,propuestas.nom,usuarios.nombre as usunom,tipos_cri_ele.nombre tipnom,propuestas.estado FROM `usuariosxpropuesta_ele`,propuestas,usuarios,tipos_cri_ele,convocatoria WHERE usuariosxpropuesta_ele.id_propuesta=propuestas.id and usuariosxpropuesta_ele.id_usuario=usuarios.cod and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria=$conv and `usuariosxpropuesta_ele`.`id_propuesta`=$pro  order by usuarios.nombre ASC"
        );
        $data = [];
        $data[0] =
            "<input type='text'  placeholder='Filtrar datos' class='form-control' onkeyup=\"TableFilter('#tblcriele2',this.value)\"><table class='table table-bordered' id='tblcriele2'><thead style='background:#f8f9fa;'><tr><th>Evaluador</th><th>Criterios asignados</th></tr></thead><tbody id='bd-list-convos'>";

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

            if ($datos['estado'] >= 3) {
                $data[0] .= "<tr ><td>$datos[usunom]</td><td >$datos[tipnom]</td></tr>";
            } else {
                $data[0] .= "<tr ><td>$datos[usunom]</td><td >$datos[tipnom]</td></tr>";
            }
            $data[1] = strtoupper($datos['nom']);
            $fila++;
        }

        if ($fila == 1) {
            $data[0] .= "<tr ><td colspan='2'>No hay evaluadores asignados</td></tr>";
            $data[1] = "Datos no disponibles";
        }

        $data[0] .= "</tbody></table>";
        echo json_encode($data);
    }
    // ver usuarios asignados requisitos adicionales 
    public function VerAsigvia2($conv, $pro)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `usuariosxpropuesta_via`.*,propuestas.nom,usuarios.nombre as usunom,tipos_cri_via.nombre tipnom,propuestas.estado FROM `usuariosxpropuesta_via`,propuestas,usuarios,tipos_cri_via,convocatoria WHERE usuariosxpropuesta_via.id_propuesta=propuestas.id and usuariosxpropuesta_via.id_usuario=usuarios.cod and usuariosxpropuesta_via.criterio=tipos_cri_via.cod and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria=$conv and `usuariosxpropuesta_via`.`id_propuesta`=$pro   order by usuarios.nombre ASC"
        );

        $data = [];
        $data[0] =
            "<input type='text'  placeholder='Filtrar datos' class='form-control' onkeyup=\"TableFilter('#tblcriele2',this.value)\"><table class='table table-bordered' id='tblcriele2'><thead style='background:#f8f9fa;'><tr><th>Evaluador</th><th>Criterios asignados</th></tr></thead><tbody id='bd-list-convos'>";

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

            if ($datos['estado'] == 6) {
                $data[0] .= "<tr ><td >$datos[usunom]</td><td >$datos[tipnom]</td></tr>";
            } else {
                $data[0] .= "<tr ><td >$datos[usunom]</td><td >$datos[tipnom]</td></tr>";
            }

            $data[1] = strtoupper($datos['nom']);
            $fila++;
        }

        if ($fila == 1) {
            echo "<tr ><td colspan='2'>No hay evaluadores asignados</td></tr>";
            $data[1] = "Datos no disponibles";
        }

        $data[0] .= "</tbody></table>";
        echo json_encode($data);
    }
    // ver anexos de un proyecto vista gestor
    public function CargarAnex($pro)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT documentosxpropuesta.*,documento.nombre FROM `documentosxpropuesta`,documento WHERE documentosxpropuesta.doc=documento.id and id_propuesta='$pro' ORDER by documento.nombre"); ?>

<table class="table table-bordered" id="tblanex"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Anexo</th><th>Fecha expedición</th><th>Folio</th><th>Ver documento</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$fecha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep
    if ($datos['fecexp'] == "0000-00-00" || $datos['fecexp']==null ) {
        $fecha = "N/A";
    } else {
        $fecha = $datos['fecexp'];
    }
    if ($datos['ruta'] == null) {
        echo "<tr ><td>$fila</td><td>$datos[nombre]</td><td >".$this->FormatDate2($fecha)."</td><td >$datos[n_folio]</td><td ><i class='fas fa-times icon_sesion3'  onclick=\"alert('No hay documento')\"></i></td><td><i class='fas fa-trash-alt icon_sesion'  onclick='DelAnex($datos[id])'></i></td></tr>";
    } else {
        echo "<tr ><td>$fila</td><td>$datos[nombre]</td><td >".$this->FormatDate2($fecha)."</td><td >$datos[n_folio]</td><td ><a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=$datos[ruta]' target='_blank'><i class='fas fa-file icon_sesion'  ></i></a></td><td><i class='fas fa-trash-alt icon_sesion'  onclick='DelAnex($datos[id])'></i></td></tr>";
    }
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='7'>No hay anexos</td></tr>";
}?>
</tbody></table>
<?php
    }
    // ver anexos de un proyecto vista evaluadores
    public function CargarAnexeva($pro)
    {
        $consulta2 = mysqli_query($this->conexion, "SELECT documentosxpropuesta.*,documento.nombre FROM `documentosxpropuesta`,documento WHERE documentosxpropuesta.doc=documento.id and id_propuesta='$pro' ORDER by documento.nombre "); ?>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>#</th><th>Anexo</th><th>Fecha expedición</th><th>Folio</th><th>Ver documento</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$fecha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    
    if ($datos['fecexp'] == "0000-00-00") {
        $fecha = "N/A";
    } else {
        $fecha = $datos['fecexp'];
    }
    if ($datos['ruta'] == null) {
        echo "<tr ><td>$fila</td><td>$datos[nombre]</td><td >".$this->FormatDate2($fecha)."</td><td >$datos[n_folio]</td><td ><i class='fas fa-times icon_sesion3'   onclick=\"alert('No hay documento')\"></i></td></tr>";
    } else {
        echo "<tr ><td>$fila</td><td>$datos[nombre]</td><td >".$this->FormatDate2($fecha)."</td><td >$datos[n_folio]</td><td ><a href='https://neo.cpcoriente.org/templates/modules/visor.php?fl=$datos[ruta]' target='_blank'><i class='fas fa-file icon_sesion'  ></i></a></td></tr>";
    }
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='7'>No hay anexos</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar lista proyectos
    public function lpro($conv)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,empresas.nit,empresas.num_ver FROM propuestas,empresas,convocatoria WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv' ORDER by propuestas.id ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>Título</th><th>Número radicación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111J').css('display','block')" onmouseout="$('#help1111J').css('display','none')"></i>
			<span class="tooltiptext" id="help1111J" style="display: none;">Número de radicación en SIGP </span></th><th>Fecha radicación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1222E').css('display','block')" onmouseout="$('#help1222E').css('display','none')"></i>
			<span class="tooltiptext" id="help1222E" style="display: none;">Fecha de radicación en SIGP </span></th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help133').css('display','block')" onmouseout="$('#help133').css('display','none')"></i>
			<span class="tooltiptext" id="help133" style="display: none;">Fecha de recepción por contratista </span></th><th>Empresa</th><th>Valor proyecto</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

$icon = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    
    if ($_COOKIE['user_rol'] == 5) {
        $icon = "<i class='fas fa-trash-alt icon_sesion'  onclick='Delpro($datos[id])'></i>";
    } else {
        $icon = "";
    }
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
    echo "<tr ><td>$datos[id]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...<i class='fa fa-search-plus icon_sesion2' 
onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"  onclick=\"editarrpro($datos[id])\" ></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[num_rad]</td><td >" .
        $this->FormatDate2($datos['fec_rad']) .
        "</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >$datos[nit]$num_ver, $datos[razon_social]</td><td >$" .
        number_format($datos['val_pro'], 2, '.', ',') .
        "</td><td><i class='fas fa-pencil-alt icon_sesion' onclick=\"editarrpro($datos[id])\"> </i>$icon</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='8'>No hay registro de proyectos</td></tr>";
}?>
</tbody></table>
<?php
    }
 
 
    public function lproReg($conv)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.`id` as idpropu,propuestas.nom,empresas.razon_social,empresas.nit,empresas.num_ver,historial_reg_pro.*,usuarios.nombre,usuarios.rol FROM propuestas,empresas,convocatoria,historial_reg_pro,usuarios WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv' and propuestas.id=historial_reg_pro.pro and usuarios.cod=historial_reg_pro.usu  ORDER by propuestas.id ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr>
<th>Id</th><th>Título</th><th>Empresa</th><th>Usuario que registró</th><th>Fecha registro</th><th>Última fecha modificación</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

$icon = "";
$rol="";
while ($datos = mysqli_fetch_array($consulta2)) {
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
     if($datos['rol']==5)
     {
         $rol="GESTOR TÉCNICO";
     }
     else{
         
         $rol="DIGITADOR";
     }
    echo "<tr ><td>$datos[idpropu]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...<i class='fa fa-search-plus icon_sesion2' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"    ></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit]$num_ver, $datos[razon_social]</td><td>$datos[nombre] - $rol</td><td>".$this->FormatDate2($datos['fecha'])."</td><td>".$this->FormatDate2($datos['fec_ult'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='7'>No hay registro de proyectos</td></tr>";
}?>
</tbody></table>
<?php
    }
    
 
    
    
    public function lproaux($conv)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,empresas.nit,empresas.num_ver FROM propuestas,empresas,convocatoria,historial_reg_pro WHERE propuestas.id=historial_reg_pro.pro and propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv' and historial_reg_pro.usu=$_COOKIE[user_code] ORDER by propuestas.id ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>Título</th><th>Número radicación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111J').css('display','block')" onmouseout="$('#help1111J').css('display','none')"></i>
			<span class="tooltiptext" id="help1111J" style="display: none;">Número de radicación en SIGP </span></th><th>Fecha radicación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1222E').css('display','block')" onmouseout="$('#help1222E').css('display','none')"></i>
			<span class="tooltiptext" id="help1222E" style="display: none;">Fecha de radicación en SIGP </span></th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help133').css('display','block')" onmouseout="$('#help133').css('display','none')"></i>
			<span class="tooltiptext" id="help133" style="display: none;">Fecha de recepción por contratista </span></th><th>Empresa</th><th>Valor proyecto</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

$icon = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
    echo "<tr ><td>$datos[id]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...<i class='fa fa-search-plus icon_sesion2' 
onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"  onclick=\"editarrpro($datos[id])\" ></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[num_rad]</td><td >" .
        $this->FormatDate2($datos['fec_rad']) .
        "</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >$datos[nit]$num_ver, $datos[razon_social]</td><td >$" .
        number_format($datos['val_pro'], 2, '.', ',') .
        "</td><td><i class='fas fa-pencil-alt icon_sesion' onclick=\"editarrpro($datos[id])\"> </i>$icon</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='8'>No hay registro de proyectos</td></tr>";
}?>
</tbody></table>
<?php
    }    
    
    
    
    // cargar datos proyectos vista colombia productiva
    public function lprocp($conv)
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,empresas.nit,empresas.num_ver FROM propuestas,empresas,convocatoria WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv' ORDER by propuestas.id ASC"
        ); ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcriele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>Título</th><th>Número radicación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111A').css('display','block')" onmouseout="$('#help1111A').css('display','none')"></i>
			<span class="tooltiptext" id="help1111A" style="display: none;">Número de radicación en SIGP </span></th><th>Fecha radicación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1222F').css('display','block')" onmouseout="$('#help1222F').css('display','none')"></i>
			<span class="tooltiptext" id="help1222F" style="display: none;">Fecha de radicación en SIGP </span></th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help133X').css('display','block')" onmouseout="$('#help133X').css('display','none')"></i>
			<span class="tooltiptext" id="help133X" style="display: none;">Fecha de recepción por contratista </span></th><th>Empresa</th><th>Valor proyecto</th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;

while ($datos = mysqli_fetch_array($consulta2)) {
    //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep
  $num_ver="-0";
  if($datos['num_ver']!=0 && $datos['num_ver']!=null)
                {
                    $num_ver="-".$datos['num_ver'];
                }
    echo "<tr ><td>$datos[id]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...<i class='fa fa-search-plus icon_sesion2' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"   onclick=\"MostrarPro_usu($datos[id])\" ></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[num_rad]</td><td >" .
        $this->FormatDate2($datos['fec_rad']) .
        "</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >$datos[nit]$num_ver, $datos[razon_social]</td><td >$" .
        number_format($datos['val_pro'], 2, '.', ',') .
        "</td><td><i class='fas fa-search icon_sesion' onclick=\"MostrarPro_usu($datos[id])\"></i></td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='8'>No hay registro de proyectos</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar datos proyectos  vista evavaluador
    public function CargarDatosProusu($pro)
    {
        $response = [];
        $consulta2 = mysqli_query($this->conexion, "SELECT `propuestas`.*,empresas.razon_social FROM propuestas,empresas WHERE propuestas.id_empresa=empresas.id and propuestas.id=$pro");

        if ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

            $response = [
                $datos['id'],
                $datos['id_convocatoria'],
                $datos['id_empresa'],
                strtoupper($datos['nom']),
                $datos['fec_rec'],
                $datos['num_rad'],
                $datos['fec_rad'],
                $datos['area_estra'],
                $datos['duracion'],
                $datos['brecha1'],
                $datos['brecha2'],
                $datos['brecha3'],
                $datos['ent_alia'],
                $datos['beneficiarios'],
                $datos['resemp1'],
                $datos['resemp2'],
                $datos['resemp3'],
                $datos['resemp4'],
                $datos['val_pro'],
                $datos['val_fin'],
                $datos['val_tot_con'],
                $datos['val_con_din'],
                $datos['val_con_esp'],
                $datos['uti_net'],
                $datos['act_corr'],
                $datos['pas_corr'],
                $datos['pas_tot'],
                $datos['act_tot'],
                $datos['pas_lar_pla'],
                $datos['pas_cor_pla'],
                $datos['EBITDA'],
            ];
        }
        echo json_encode($response);
    }
    // cargar datos del proyectos 
    public function CargarDatosPro($pro)
    {
        $response = [];
        $consulta2 = mysqli_query($this->conexion, "SELECT `propuestas`.*,departamento.codigo FROM propuestas,ciudad,departamento WHERE propuestas.ciiudad=ciudad.codigo and ciudad.departamento=departamento.codigo and propuestas.id=$pro");

        if ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

            $response = [
                $datos['id'],
                $datos['id_convocatoria'],
                $datos['id_empresa'],
                strtoupper($datos['nom']),
                $datos['fec_rec'],
                $datos['num_rad'],
                $datos['fec_rad'],
                $datos['area_estra'],
                $datos['duracion'],
                $datos['brecha1'],
                $datos['brecha2'],
                $datos['brecha3'],
                $datos['ent_alia'],
                $datos['beneficiarios'],
                $datos['resemp1'],
                $datos['resemp2'],
                $datos['resemp3'],
                $datos['resemp4'],
                $datos['val_pro'],
                $datos['val_fin'],
                $datos['val_tot_con'],
                $datos['val_con_din'],
                $datos['val_con_esp'],
                $datos['uti_net'],
                $datos['act_corr'],
                $datos['pas_corr'],
                $datos['pas_tot'],
                $datos['act_tot'],
                $datos['pas_lar_pla'],
                $datos['pas_cor_pla'],
                $datos['EBITDA'],
                $datos['codigo'],
                $datos['ciiudad'],
            ];
        }
        echo json_encode($response);
    }
    // cargar proyectos para evaluacion de elegibilidad vista gestor tcnico
    public function lproevaele($conv)
    {
        $tiempos = $this->ConsultaTiempo3($conv);
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,empresas.nit,empresas.num_ver FROM propuestas,empresas,convocatoria WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv'  ORDER by propuestas.estado ASC"
        );
        $tipodias = "";
        if ($tiempos[0] == "H") {
            $tipodias = "Hábiles";
        } else {
            $tipodias = "Calendario";
        }
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-3"><i class="fa fa-file-excel" title="Descargar excel" onclick="window.open('templates/modules/ExcelProyectos.php')" style="cursor:pointer;color:green;margin-right: 30px;font-size:25px;"></i>
<i class="fas fa-sync-alt" title="Actualizar" onclick="eval_pro_ele($('#eval_pro_ele'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Sin Asignar</div><div class="col-md-3"><i class="fa fa-circle" style="color:#FEFEA3;margin-right: 30px;"></i>En proceso de evaluación</div><div class="col-md-3"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Evaluados</div><div class="col-md-3"><i class="fa fa-circle" style="color:#70CDF9;margin-right: 30px;"></i>Aprobado para vizualizar</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaele',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tlproevaele"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>No. Radicación-SIGP<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111B').css('display','block')" onmouseout="$('#help1111B').css('display','none')"></i>
			<span class="tooltiptext" id="help1111B" style="display: none;">Número de radicación en SIGP </span></th><th>Título proyecto</th><th>Empresa</th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de recepción en CPC Oriente </span></th><th>Fecha límite <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha limite para que el evaluador realice la evaluación en elegibilidad</span></th><th>Días calendario restantes <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">Días calendario restantes al evaluador para evaluar el proyecto en elegibilidad</span></th><th>Elegible</th><th>Aprobado para visualizar</th><th>Fecha Aprobado<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_5').css('display','block')" onmouseout="$('#help111_5').css('display','none')"></i>
			<span class="tooltiptext" id="help111_5" style="display: none;">Fecha de aprobación para ser visualizado</span></th>
<th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "";
$labelstate = "";
$icon_dia = "";
$icon_dia2 = "";
$icon_dia3 = "";
$icon_dia4 = "";
$ficha = "";
$warCau="";
$observaciones="";
while ($datos = mysqli_fetch_array($consulta2)) {
    $num_ver="-0";
    $diasadi="<i class='fas fa-calendar-plus icon_evalua22'  onclick=\"AdicionarDiasProyectEle($datos[id],$fila)\" title='Días adicionales a proyecto'></i>";
    
  if($datos['num_ver']!=0 && $datos['num_ver']!=null)
                {
                    $num_ver="-".$datos['num_ver'];
                }

    if ($datos['estado'] == 1) {
        $color = "#F7CEC5";
        $labelstate = "POR ASIGNAR";
        $ficha = "";
       
    } elseif ($datos['estado'] == 2) {
        $color = "#FEFEA3";
        $labelstate = "EN PROCESO";
        $ficha = "";
       
    } else {
        $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $ficha = "<i class='fas fa-file-alt icon_evalua22'  onclick=\"window.open('templates/modules/dompdf/index.php?id=$datos[id]&conv=$conv')\" title='Ficha evaluación elegibilidad'></i><i class='fas fa-undo icon_evalua22'  onclick=\"UndoProyectEle($datos[id],$fila)\" title='Cambiar estado a en proceso'></i>";
       
    }
    if ($datos['dia_ele'] == "ELEGIBLE") {
        $icon_dia = "SI";
        $icon_dia4 = 1;
    } elseif ($datos['dia_ele'] == "NO ELEGIBLE") {
        $icon_dia = "NO";
        $icon_dia4 = 0;
    } else {
        $icon_dia = "";
        $icon_dia4 = "";
    }
    if ($datos['apro_ele'] == "1") {
        $color = "#70CDF9";
        $icon_dia3 = "SI";
        $icon_dia2 = "1";
       $observaciones = "<i class='fas fa-comment-dots icon_evalua22'  onclick=\"ObservacionesEvaluacion($datos[0],$fila)\" title='Observaciones a evaluación'></i>";
    } elseif ($datos['apro_ele'] == "0") {
        $icon_dia3 = "NO";
        $icon_dia2 = "0";
         $observaciones="";
    } else {
        $icon_dia2 = "";
        $icon_dia3 = "";
        $observaciones="";
    }
    if($datos['causales_rechazo']=="Cumple")
    {
        $warCau="";
    }
    else if($datos['causales_rechazo']=="No cumple"){
        $warCau="<i class='fas fa-exclamation-circle' title='Incurre en causales de rechazo'  style='font-size:22px;color:red;cursor:pointer;' onclick=\"VerCausalesEle($datos[0],$fila)\"></i>";
    }
    else{
      $warCau="";   
    }
    
    $plazo = "";

    if ($datos['plazo_adi'] > 0) {
        $plazo = "(con plazo adicional de $datos[plazo_adi] dias $tipodias)";
    }
    $dias = $tiempos[2] + $datos['plazo_adi'];
    $vencimiento = $this->Calculardias($tiempos[0], $dias, $datos['fec_rec']);
    echo "<tr style='background:$color;' ><td>$datos[id]</td><td>$datos[num_rad]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "... $warCau <i class='fa fa-search-plus icon_sesion2' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"  onclick=\"Detailproevaele($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia4','$icon_dia2')\" ></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit]$num_ver,&nbsp; $datos[razon_social]</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >" .
        $this->FormatDate2($vencimiento[1]) .
        "</td><td >" .
        $vencimiento[0] .
        " $plazo</td><td >$icon_dia</td><td >$icon_dia3</td><td>".$this->FormatDate2($datos['fec_apro_ele'])."</td><td><i class='fas fa-eye icon_evalua22' title='Detalles'   onclick=\"Detailproevaele($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia4','$icon_dia2')\"></i><i class='fa fa-user-slash icon_evalua22' title='Causales de rechazo' onclick=\"VerCausalesEle($datos[0],$fila)\"></i>$ficha $diasadi $observaciones</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='10'>No hay proyectos en fase de elegibilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    
    
    public function lconele($conv)
    {
     $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `conflicto_int`.*,propuestas.nom as propu,propuestas.id as idpropu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='ele' and propuestas.id_convocatoria='$conv'  ORDER by propuestas.nom ASC"
        );
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-4"><i class="fa fa-file-excel" title="Descargar excel" onclick="window.open('templates/modules/ExcelConflictos.php')" style="cursor:pointer;color:green;margin-right: 30px;font-size:25px;"></i>
<i class="fas fa-sync-alt" title="Actualizar" onclick="LConflicEle($('#btnpro2'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-4"><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Con conflicto de intereses</div><div class="col-md-4"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Sin conflicto de intereses</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevacon_ele',this.value)" style="padding-left:40px;"  >
<table class="table table-bordered" id="tlproevacon_ele"><thead style="background:#f8f9fa;"><tr><th>Id proyecto</th>
<th>Usuario<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111B').css('display','block')" onmouseout="$('#help1111B').css('display','none')"></i>
			<span class="tooltiptext" id="help1111B" style="display: none;">Usuario que registro el conflicto de intereses </span></th>
			<th>Rol</th>
			<th>Título proyecto</th>
			<th>Empresa</th>
				<th>Fecha asignación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha en que fue asignado al proyecto </span></th>
			<th>Fecha registro <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de registro del conflicto de intereses </span></th>
		
			<th>Presenta conflicto <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">El usuario presenta un conflicto de intereses</span></th>
            <th>Informe</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "" ;
$presenta="";
$ficha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['conflicto'] == 1) {
        $color = "#F7CEC5";
        $presenta="SI";
    } else{
        $color = "#B6F9AD";
        $presenta="NO";
    }
    
    
    echo "<tr style='background:$color;'><td>$datos[idpropu]</td><td>$datos[usu2]</td><td>$datos[nombre]</td><td>$datos[propu]</td><td>$datos[emp]</td><td>".$this->FormatDate2($datos['fec_asig'])."</td><td>".$this->FormatDate2($datos['fec_registro'])."</td><td>$presenta</td><td><i class='fas fa-file-alt' style='margin-left:5px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/conflictoele.php?id=$datos[usu]&pro=$datos[pro]&conv=$conv')\" title='informe conflicto de interes'></i><i class='fas fa-trash-alt' style='margin-left:10px;cursor:pointer;' onclick='DelConEle($datos[id],$datos[usu],$datos[pro])' title='Eliminar Conflicto'></i></td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay conflictos de interes registrados</td></tr>";
}?>
</tbody></table>
<?php
    } 
  public function ListSbsanaciones($conv)
    {
     $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `subsanaciones`.*,propuestas.id as idpropu,propuestas.nom as propu,propuestas.estado as espropu, CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as empr,tipos_cri_ele.nombre tpcri,criterios_ele.requisito as requisitocri,usuarios.nombre,usuarios.rol FROM `subsanaciones`,propuestas,empresas,tipos_cri_ele,criterios_ele,usuarios,usuariosxpropuesta_ele where subsanaciones.id_pro=propuestas.id AND propuestas.id_empresa=empresas.id and subsanaciones.id_criterio=criterios_ele.id and criterios_ele.tipo=tipos_cri_ele.cod and subsanaciones.id_pro=usuariosxpropuesta_ele.id_propuesta and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and usuariosxpropuesta_ele.id_usuario=usuarios.cod order by propuestas.nom asc"
        );
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-3"><i class="fa fa-file-excel" title="Descargar excel" onclick="window.open('templates/modules/ExcelSubsanaciones.php')" style="cursor:pointer;color:green;margin-right: 30px;font-size:25px;"></i><i class="fas fa-sync-alt" title="Actualizar" onclick="botoneSubsanaciones($('#btn_sub'))" style="cursor:pointer;color:#0075b0;;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-3"><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Solicitada</div><div class="col-md-3"><i class="fa fa-circle" style="color:#FEFEA3;margin-right: 30px;"></i>En proceso</div><div class="col-md-3"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Finalizada</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaele_sub',this.value)" style="padding-left:40px;"  >
<table class="table table-bordered" id="tlproevaele_sub"><thead style="background:#f8f9fa;"><tr><th>Id<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help11199B').css('display','block')" onmouseout="$('#help11199B').css('display','none')"></i>
			<span class="tooltiptext" id="help11199B" style="display: none;">Identificador del proyecto </span></th>
			<th>Título proyecto</th>
			<th>Empresa</th>
				<th>Criterio <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Criterios de evaluación </span></th>
			<th>Requisito <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Requisito del criterio de evaluación </span></th>
		
			<th>Observación<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">Observacion del evaluador</span></th>
            <th>Fecha solicitud <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help11_4').css('display','block')" onmouseout="$('#help11_4').css('display','none')"></i>
			<span class="tooltiptext" id="help11_4" style="display: none;">Fecha de solicitud del evaluador</span></th>
			<th>Fecha envio  <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help11__4').css('display','block')" onmouseout="$('#help11__4').css('display','none')"></i>
			<span class="tooltiptext" id="help11__4" style="display: none;">Fecha de envio a colombia productiva</span></th>
				<th>Fecha respuesta  <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help10_4').css('display','block')" onmouseout="$('#help10_4').css('display','none')"></i>
			<span class="tooltiptext" id="help10_4" style="display: none;">Fecha de respuesta de colombia productiva</span></th>
			<?php if($_COOKIE['user_rol']==5)
    {?>
				<th>Acciones</th>
			<?php }?>	
				</tr>
            </thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "" ;
$presenta="";
$ficha = "";
$editar="";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['estado'] == 0) {
        $color = "#F7CEC5";
      $disabled="";  
    } else if ($datos['estado'] == 1){
        $color = "#FEFEA3";
       $disabled="";  
    }
    else{
         $color = "#B6F9AD";
         $disabled="disabled";
    }
    if($datos['espropu']>=3)
    {
        $disabled="disabled";
    }
    if($datos['fecha_col_pro']!=null){
        $checked="checked";
    }
    else{
        $checked="";
    }
    if($datos['fecha2']!=null){
        $checked2="checked";
    }
    else{
        $checked2="";
    }
    if($_COOKIE['user_rol']==5)
    {
        $editar="<td><i class='fas fa-pencil-alt' style='margin-left:25px;cursor:pointer;' onclick=\"SubsanarPro_L($datos[id],'".$this->FormatDate2($datos['fecha'])."','".$this->FormatDate2($datos['fecha_col_pro'])."','".$this->FormatDate2($datos['fecha2'])."',$fila,'$datos[n_folio]','$checked','$checked2','$disabled','$datos[nombre]',$datos[rol])\" title='editar'></i></td>";
    }
    else{
        $editar="";
        
    }
    echo "<tr style='background:$color;'><td>$datos[idpropu]</td><td>$datos[propu]</td><td>$datos[empr]</td><td>$datos[tpcri]</td><td>".substr($datos['requisitocri'],0,60)."...<i class='fa fa-search-plus' style='cursor:help;' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[requisitocri]</span></td><td>$datos[observacion]</td><td>".$this->FormatDate2($datos['fecha'])."</td><td>".$this->FormatDate2($datos['fecha_col_pro'])."</td><td>".$this->FormatDate2($datos['fecha2'])."</td>$editar<td style='display:none;'>$datos[requisitocri]</td><td style='display:none;'>$datos[fecha_col_pro]</td><td style='display:none;'>$datos[fecha2]</td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay subsanaciones registradas</td></tr>";
}?>
</tbody></table>
<?php
    }  
    
 public function ListSbsanacionesCp($conv)
    {
     $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `subsanaciones`.*,propuestas.id as idpropu,propuestas.nom as propu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as empr,tipos_cri_ele.nombre tpcri,criterios_ele.requisito as requisitocri FROM `subsanaciones`,propuestas,empresas,tipos_cri_ele,criterios_ele where subsanaciones.id_pro=propuestas.id AND propuestas.id_empresa=empresas.id and propuestas.apro_ele=1 and subsanaciones.id_criterio=criterios_ele.id and criterios_ele.tipo=tipos_cri_ele.cod order by propuestas.nom asc"
        );
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-3"><i class="fas fa-sync-alt" title="Actualizar" onclick="botoneSubsanacionesCp(this)" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-3"><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Solicitada</div><div class="col-md-3"><i class="fa fa-circle" style="color:#FEFEA3;margin-right: 30px;"></i>En proceso</div><div class="col-md-3"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Finalizada</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaele_sub',this.value)" style="padding-left:40px;"  >
<table class="table table-bordered" id="tlproevaele_sub"><thead style="background:#f8f9fa;"><tr><th>Id<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help11199B').css('display','block')" onmouseout="$('#help11199B').css('display','none')"></i>
			<span class="tooltiptext" id="help11199B" style="display: none;">Identificador del proyecto </span></th>
			<th>Título proyecto</th>
			<th>Empresa</th>
				<th>Criterio <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Criterios de evaluación </span></th>
			<th>Requisito <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Requisito del criterio de evaluación </span></th>
		
			<th>Observación<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">Observacion del evaluador</span></th>
            <th>Fecha solicitud <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help11_4').css('display','block')" onmouseout="$('#help11_4').css('display','none')"></i>
			<span class="tooltiptext" id="help11_4" style="display: none;">Fecha de solicitud del evaluador</span></th>
			<th>Fecha envio  <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help11__4').css('display','block')" onmouseout="$('#help11__4').css('display','none')"></i>
			<span class="tooltiptext" id="help11__4" style="display: none;">Fecha de envio a colombia productiva</span></th>
				<th>Fecha respuesta  <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help10_4').css('display','block')" onmouseout="$('#help10_4').css('display','none')"></i>
			<span class="tooltiptext" id="help10_4" style="display: none;">Fecha de respuesta de colombia productiva</span></th>
		
				<th>Acciones</th>
		
				</tr>
            </thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "" ;
$presenta="";
$ficha = "";
$editar="";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['estado'] == 0) {
        $color = "#F7CEC5";

    } else if ($datos['estado'] == 1){
        $color = "#FEFEA3";

    }
    else{
         $color = "#B6F9AD";
    }
    
    if($_COOKIE['user_rol']==5)
    {
        $editar="<td><i class='fas fa-pencil-alt' style='margin-left:25px;cursor:pointer;' onclick=\"\" title='editar'></i></td>";
    }
    else{
        $editar="<td>--</td>";
        
    }
    echo "<tr style='background:$color;'><td>$datos[idpropu]</td><td>$datos[propu]</td><td>$datos[empr]</td><td>$datos[tpcri]</td><td>".substr($datos['requisitocri'],0,60)."...<i class='fa fa-search-plus' style='cursor:help;' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[requisitocri]</span></td><td>$datos[observacion]</td><td>".$this->FormatDate2($datos['fecha'])."</td><td>".$this->FormatDate2($datos['fecha_col_pro'])."</td><td>".$this->FormatDate2($datos['fecha2'])."</td>$editar</tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='10'>No hay subsanaciones registradas</td></tr>";
}?>
</tbody></table>
<?php
    }        
    
    
 public function lconeleCp($conv)
    {
     $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `conflicto_int`.*,propuestas.nom as propu,propuestas.id as idpropu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='ele' and propuestas.id_convocatoria='$conv' and propuestas.apro_ele=1 ORDER by propuestas.nom ASC"
        );
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-4"><i class="fas fa-sync-alt" title="Actualizar" onclick="LConflicEleCp($('#btnpro2'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-4"><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Con conflicto de intereses</div><div class="col-md-4"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Sin conflicto de intereses</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevacon_ele',this.value)" style="padding-left:40px;"  >
<table class="table table-bordered" id="tlproevacon_ele"><thead style="background:#f8f9fa;"><tr><th>Id proyecto</th>
<th>Usuario<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111B').css('display','block')" onmouseout="$('#help1111B').css('display','none')"></i>
			<span class="tooltiptext" id="help1111B" style="display: none;">Usuario que registro el conflicto de intereses </span></th>
			<th>Rol</th>
			<th>Título proyecto</th>
			<th>Empresa</th>
				<th>Fecha asignación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha en que fue asignado al proyecto </span></th>
			<th>Fecha registro <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de registro del conflicto de intereses </span></th>
		
			<th>Presenta conflicto <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">El usuario presenta un conflicto de intereses</span></th>
            <th>Informe</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "" ;
$presenta="";
$ficha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['conflicto'] == 1) {
        $color = "#F7CEC5";
        $presenta="SI";
    } else{
        $color = "#B6F9AD";
        $presenta="NO";
    }
    
    
    echo "<tr style='background:$color;'><td>$datos[idpropu]</td><td>$datos[usu2]</td><td>$datos[nombre]</td><td>$datos[propu]</td><td>$datos[emp]</td><td>".$this->FormatDate2($datos['fec_asig'])."</td><td>".$this->FormatDate2($datos['fec_registro'])."</td><td>$presenta</td><td><i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/conflictoele.php?id=$datos[usu]&pro=$datos[pro]&conv=$conv')\" title='informe conflicto de interes'></i></td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay conflictos de interes registrados</td></tr>";
}?>
</tbody></table>
<?php
    }     
  public function lconeleusu($conv)
    {
     $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `conflicto_int`.*,propuestas.nom as propu,propuestas.id as idpropu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='ele' and usuarios.cod=".$_COOKIE['user_code']." and propuestas.id_convocatoria='$conv'  ORDER by propuestas.nom ASC"
        );
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevacon_ele',this.value)" style="padding-left:40px;"  >
<table class="table table-bordered" id="tlproevacon_ele"><thead style="background:#f8f9fa;"><tr><th>Id proyecto</th>

			<th>Título proyecto</th>
			<th>Empresa</th>
			<th>Fecha asignación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha en que fue asignado al proyecto </span></th>
			<th>Fecha registro <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de registro del conflicto de intereses </span></th>
			<th>Presenta conflicto <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">El usuario presenta un conflicto de intereses</span></th>
            <th>Informe</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "" ;
$presenta="";
$ficha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['conflicto'] == 1) {
        $color = "#F7CEC5";
        $presenta="SI";
    } else{
        $color = "#B6F9AD";
        $presenta="NO";
    }
    
    
    echo "<tr style='background:$color;'><td>$datos[idpropu]</td><td>$datos[propu]</td><td>$datos[emp]</td><td>".$this->FormatDate2($datos['fec_asig'])."</td><td>".$this->FormatDate2($datos['fec_registro'])."</td><td>$presenta</td><td><i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/conflictoele.php?id=$datos[usu]&pro=$datos[pro]&conv=$conv')\" title='informe conflicto de interes'></i></td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='7'>No hay conflictos de interes registrados</td></tr>";
}?>
</tbody></table>
<?php
    }    
    public function lconviausu($conv)
    {
     $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `conflicto_int`.*,propuestas.nom as propu,propuestas.id as idpropu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='via' and usuarios.cod=".$_COOKIE['user_code']." and propuestas.id_convocatoria='$conv'  ORDER by propuestas.nom ASC"
        );
       // echo "SELECT `conflicto_int`.*,propuestas.nom as propu,CONCAT(empresas.nit,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='via' and usuarios.cod=".$_COOKIE['user_code']." and propuestas.id_convocatoria='$conv'  ORDER by conflicto_int.fec_registro DESC";
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaconvia',this.value)" style="padding-left:40px;"  >
<table class="table table-bordered" id="tlproevaconvia"><thead style="background:#f8f9fa;"><tr><th>Id proyecto</th>

			<th>Título proyecto</th>
			<th>Empresa</th>
			<th>Fecha asignación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha en que fue asignado al proyecto </span></th>
			<th>Fecha registro <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de registro del conflicto de intereses </span></th>
			<th>Presenta conflicto <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">El usuario presenta un conflicto de intereses</span></th>
            <th>Informe</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "" ;
$presenta="";
$ficha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['conflicto'] == 1) {
        $color = "#F7CEC5";
        $presenta="SI";
    } else{
        $color = "#B6F9AD";
        $presenta="NO";
    }
    
    
    echo "<tr style='background:$color;'><td>$datos[idpropu]</td><td>$datos[propu]</td><td>$datos[emp]</td><td>".$this->FormatDate2($datos['fec_asig'])."</td><td>".$this->FormatDate2($datos['fec_registro'])."</td><td>$presenta</td><td><i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/conflictoele.php?id=$datos[usu]&pro=$datos[pro]&conv=$conv')\" title='informe conflicto de interes'></i></td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='7'>No hay conflictos de interes registrados</td></tr>";
}?>
</tbody></table>
<?php
    }    
      
 public function lconeleusuJur($conv)
    {
     $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `conflicto_int`.*,propuestas.nom as propu,propuestas.id as idpropu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='ele' and usuarios.cod=".$_COOKIE['user_code']." and propuestas.id_convocatoria='$conv'  ORDER by propuestas.nom ASC"
        );
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaele_con',this.value)" style="padding-left:40px;"  >
<table class="table table-bordered" id="tlproevaele_con"><thead style="background:#f8f9fa;"><tr><th>Id proyecto</th>

			<th>Título proyecto</th>
			<th>Empresa</th>
			<th>Fecha asignación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha en que fue asignado al proyecto </span></th>
			<th>Fecha registro <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de registro del conflicto de intereses </span></th>
			<th>Presenta conflicto <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">El usuario presenta un conflicto de intereses</span></th>
            <th>Informe</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "" ;
$presenta="";
$ficha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['conflicto'] == 1) {
        $color = "#F7CEC5";
        $presenta="SI";
    } else{
        $color = "#B6F9AD";
        $presenta="NO";
    }
    
    
    echo "<tr style='background:$color;'><td>$datos[idpropu]</td><td>$datos[propu]</td><td>$datos[emp]</td><td>".$this->FormatDate2($datos['fec_asig'])."</td><td>".$this->FormatDate2($datos['fec_registro'])."</td><td>$presenta</td><td><i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/conflictoele.php?id=$datos[usu]&pro=$datos[pro]&conv=$conv')\" title='informe conflicto de interes'></i></td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='7'>No hay conflictos de interes registrados</td></tr>";
}?>
</tbody></table>
<?php
    }        
    
 public function lconvia($conv)
    {
      $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `conflicto_int`.*,propuestas.nom as propu,propuestas.id as idpropu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='via' and propuestas.id_convocatoria='$conv'  ORDER by propuestas.nom ASC"
        );
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-4"><i class="fa fa-file-excel" title="Descargar excel" onclick="window.open('templates/modules/ExcelConflictos.php')" style="cursor:pointer;color:green;margin-right: 30px;font-size:25px;"></i>
<i class="fas fa-sync-alt" title="Actualizar" onclick="LConflicVia($('#btnpro'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-4"><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Con conflicto de intereses</div><div class="col-md-4"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Sin conflicto de intereses</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaconvia',this.value)" style="padding-left:40px;">
<table class="table table-bordered" id="tlproevaconvia"><thead style="background:#f8f9fa;"><tr><th>Id proyecto</th>
<th>Usuario<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111B').css('display','block')" onmouseout="$('#help1111B').css('display','none')"></i>
			<span class="tooltiptext" id="help1111B" style="display: none;">Usuario que registro el conflicto de intereses </span></th>
			<th>Rol</th>
			<th>Título proyecto</th>
			<th>Empresa</th>
				<th>Fecha asignación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha en que fue asignado al proyecto </span></th>
			<th>Fecha registro <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de registro del conflicto de intereses </span></th>
		
			<th>Presenta conflicto <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">El usuario presenta un conflicto de intereses</span></th>
            <th>Informe</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "" ;
$presenta="";
$ficha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['conflicto'] == 1) {
        $color = "#F7CEC5";
        $presenta="SI";
    } else{
        $color = "#B6F9AD";
        $presenta="NO";
    }
    
    
    echo "<tr style='background:$color;'><td>$datos[idpropu]</td><td>$datos[usu2]</td><td>$datos[nombre]</td><td>$datos[propu]</td><td>$datos[emp]</td><td>".$this->FormatDate2($datos['fec_asig'])."</td><td>".$this->FormatDate2($datos['fec_registro'])."</td><td>$presenta</td><td><i class='fas fa-file-alt' style='margin-left:5px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/conflictovia.php?id=$datos[usu]&pro=$datos[pro]&conv=$conv')\" title='informe conflicto de interes'></i><i class='fas fa-trash-alt' onclick='DelConVia($datos[id],$datos[usu],$datos[pro])' style='margin-left:10px;cursor:pointer;' title='Eliminar Conflicto'></i></td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay conflictos de interes registrados</td></tr>";
}?>
</tbody></table>
<?php
    }     
    
 public function lconviaCp($conv)
    {
      $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `conflicto_int`.*,propuestas.nom as propu,propuestas.id as idpropu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='via' and propuestas.id_convocatoria='$conv' and apro_via=1  ORDER by propuestas.nom ASC"
        );
        //echo "SELECT `conflicto_int`.*,propuestas.nom as propu,CONCAT(empresas.nit,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='via' and propuestas.id_convocatoria='$conv' and apro_via=1  ORDER by conflicto_int.fec_registro DESC";
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-4"><i class="fas fa-sync-alt" title="Actualizar" onclick="LConflicViaCp($('#btnpro'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-4"><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Con conflicto de intereses</div><div class="col-md-4"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Sin conflicto de intereses</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaconvia',this.value)" style="padding-left:40px;">
<table class="table table-bordered" id="tlproevaconvia"><thead style="background:#f8f9fa;"><tr><th>Id proyecto</th>
<th>Usuario<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111B').css('display','block')" onmouseout="$('#help1111B').css('display','none')"></i>
			<span class="tooltiptext" id="help1111B" style="display: none;">Usuario que registro el conflicto de intereses </span></th>
			<th>Rol</th>
			<th>Título proyecto</th>
			<th>Empresa</th>
				<th>Fecha asignación <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha en que fue asignado al proyecto </span></th>
			<th>Fecha registro <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de registro del conflicto de intereses </span></th>
		
			<th>Presenta conflicto <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">El usuario presenta un conflicto de intereses</span></th>
            <th>Informe</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "" ;
$presenta="";
$ficha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['conflicto'] == 1) {
        $color = "#F7CEC5";
        $presenta="SI";
    } else{
        $color = "#B6F9AD";
        $presenta="NO";
    }
    
    
    echo "<tr style='background:$color;'><td>$datos[idpropu]</td><td>$datos[usu2]</td><td>$datos[nombre]</td><td>$datos[propu]</td><td>$datos[emp]</td><td>".$this->FormatDate2($datos['fec_asig'])."</td><td>".$this->FormatDate2($datos['fec_registro'])."</td><td>$presenta</td><td><i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/conflictovia.php?id=$datos[usu]&pro=$datos[pro]&conv=$conv')\" title='informe conflicto de interes'></i></td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='9'>No hay conflictos de interes registrados</td></tr>";
}?>
</tbody></table>
<?php
    }     
        
    
    // cargar proyectos para evaluacion de elegibilidad vista evavaluador
    public function lproevaeleusu($conv)
    {
        //session_start();
        $tiempos = $this->ConsultaTiempo3($conv);
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,CONCAT(empresas.nit,'-',empresas.num_ver) as nit,usuariosxpropuesta_ele.* FROM propuestas,empresas,convocatoria,usuarios,usuariosxpropuesta_ele WHERE usuariosxpropuesta_ele.id_propuesta=propuestas.id and usuariosxpropuesta_ele.id_usuario=usuarios.cod and propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and usuarios.cod=$_COOKIE[user_code] and propuestas.id_convocatoria='$conv' GROUP BY propuestas.id ORDER by propuestas.estado ASC"
        );
        $tipodias = "";
        if ($tiempos[0] == "H") {
            $tipodias = "Hábiles";
        } else {
            $tipodias = "Calendario";
        }
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-4"><i class="fas fa-sync-alt" title="Actualizar" onclick="eval_pro_ele2($('#eval_pro_ele'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-4"><i class="fa fa-circle" style="color:#FEFEA3;margin-right: 30px;"></i>En proceso de evaluación</div><div class="col-md-4"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Evaluados</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaeleusu',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tlproevaeleusu"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>No. Radicación-SIGP<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111C').css('display','block')" onmouseout="$('#help1111C').css('display','none')"></i>
			<span class="tooltiptext" id="help1111C" style="display: none;">Número de radicación en SIGP </span></th><th>Título proyecto</th><th>Empresa</th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de recepción en CPC Oriente </span></th><th>Fecha límite <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha limite para que el evaluador realice la evaluación de elegibilidad </span></th><th>Días calendario restantes <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">Días calendario restantes al evaluador para evaluar el proyecto en elegibilidad</span></th><th>Elegible</th><th>Fecha Aprobado<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_5').css('display','block')" onmouseout="$('#help111_5').css('display','none')"></i>
			<span class="tooltiptext" id="help111_5" style="display: none;">Fecha de aprobación para ser visualizado</span></th>
<th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "";
$labelstate = "";
$icon_dia = "";
$icon_dia2 = "";
$ficha = "";
$iconevaluar = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    //6 dias habiles
    $plazo = "";
    if ($datos['plazo_adi'] > 0) {
        $plazo = "(con plazo adicional de $datos[plazo_adi] dias $tipodias)";
    }

    $dias = 6 + $datos['plazo_adi'];
    $vencimiento = $this->Calculardias($tiempos[0], $dias, $datos['fec_rec']);
    
    if ($datos['dia_ele'] == "ELEGIBLE") {
        $icon_dia = "SI";
         $icon_dia2 = "1";
    } else if ($datos['dia_ele'] == "NO ELEGIBLE"){
        $icon_dia = "NO";
          $icon_dia2 = "0";
    }
    else{
        $icon_dia = "";
          $icon_dia2 = "";
    }
    
     if($datos['dia_ele']=="ELEGIBLE" || $datos['dia_ele']=="NO ELEGIBLE")
    {
     $ficha = "<i class='fas fa-file-alt icon_evalua22'  onclick=\"window.open('templates/modules/dompdf/index.php?id=$datos[0]&conv=$conv')\" title='Ficha evaluación elegibilidad'></i>";    
    }
    else
    {
        $ficha = "";
    }
    if ($datos['elegible'] == "1") {
       
      
     
         $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $iconevaluar = "onclick=\"Detailproevaeleusu_($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
        
        
    } elseif ($datos['elegible'] == "0") {
     
       
    
        $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $iconevaluar = "onclick=\"Detailproevaeleusu_($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
   
    } 
    else {
      
        $color = "#FEFEA3";
        $labelstate = "EN PROCESO";
        if ($vencimiento[0] == 0) {
            $iconevaluar = "onclick=\"Detailproevaeleusu_($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
        } else {
            $iconevaluar = "onclick=\"Detailproevaeleusu2($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
        }
    }
    

    echo "<tr style='background:$color;' ><td>$datos[0]</td><td>$datos[num_rad]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...<i class='fa fa-search-plus icon_sesion2'  $iconevaluar onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\" ></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit],&nbsp; $datos[razon_social]</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >" .
        $this->FormatDate2($vencimiento[1]) .
        "</td><td >" .
        $vencimiento[0] .
        " $plazo</td><td >$icon_dia</td><td>".$this->FormatDate2($datos['fec_apro_ele'])."</td><td><i class='fas fa-check-square icon_evalua22'   $iconevaluar title='Evaluación elegibilidad'></i> <i class='fa fa-user-slash icon_evalua22' title='Causales de rechazo'  onclick=\"EvaluarCausales($datos[0],$fila)\"></i> $ficha</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='10'>No hay proyectos en fase de elegibilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar proyectos para evaluacion de elegibilidad vista asesor juridico
    public function lproevaeleusuJur($conv)
    {
        //session_start();
        $tiempos = $this->ConsultaTiempo3($conv);
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,CONCAT(empresas.nit,'-',empresas.num_ver) as nit,usuariosxpropuesta_ele.* FROM propuestas,empresas,convocatoria,usuarios,usuariosxpropuesta_ele WHERE usuariosxpropuesta_ele.id_propuesta=propuestas.id and usuariosxpropuesta_ele.id_usuario=usuarios.cod and propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and usuarios.cod=$_COOKIE[user_code] and propuestas.id_convocatoria='$conv' GROUP BY propuestas.id ORDER by propuestas.estado ASC"
        );
        $tipodias = "";
        if ($tiempos[0] == "H") {
            $tipodias = "Hábiles";
        } else {
            $tipodias = "Calendario";
        }
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-4"><i class="fas fa-sync-alt" title="Actualizar" onclick="eval_pro_ele2Jur($('#eval_pro_ele'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-4"><i class="fa fa-circle" style="color:#FEFEA3;margin-right: 30px;"></i>En proceso de evaluación</div><div class="col-md-4"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Evaluados</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaeleusu',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tlproevaeleusu"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>No. Radicación-SIGP<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111C').css('display','block')" onmouseout="$('#help1111C').css('display','none')"></i>
			<span class="tooltiptext" id="help1111C" style="display: none;">Número de radicación en SIGP </span></th><th>Título proyecto</th><th>Empresa</th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de recepción en CPC Oriente </span></th><th>Fecha límite <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha limite para que el evaluador realice la evaluación de elegibilidad </span></th><th>Días calendario restantes <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">Días calendario restantes al evaluador para evaluar el proyecto en elegibilidad</span></th><th>Elegible</th><th>Fecha Aprobado<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_5').css('display','block')" onmouseout="$('#help111_5').css('display','none')"></i>
			<span class="tooltiptext" id="help111_5" style="display: none;">Fecha de aprobación para ser visualizado</span></th>
<th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "";
$labelstate = "";
$icon_dia = "";
$icon_dia2 = "";
$ficha = "";
$iconevaluar = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    //6 dias habiles
    $plazo = "";
    if ($datos['plazo_adi'] > 0) {
        $plazo = "(con plazo adicional de $datos[plazo_adi] dias $tipodias)";
    }

    $dias = 6 + $datos['plazo_adi'];
    $vencimiento = $this->Calculardias($tiempos[0], $dias, $datos['fec_rec']);
     if ($datos['dia_ele'] == "ELEGIBLE") {
        $icon_dia = "SI";
         $icon_dia2 = "1";
    } else if ($datos['dia_ele'] == "NO ELEGIBLE"){
        $icon_dia = "NO";
        $icon_dia2 = "0";
    }
    else{
        $icon_dia = "";
         $icon_dia2 = "";
    }
    if($datos['dia_ele']=="ELEGIBLE" || $datos['dia_ele']=="NO ELEGIBLE")
    {
     $ficha = "<i class='fas fa-file-alt icon_evalua22'  onclick=\"window.open('templates/modules/dompdf/index.php?id=$datos[0]&conv=$conv')\" title='Ficha evaluación elegibilidad'></i>";    
    }
     else
    {
        $ficha = "";
    }
    
    if ($datos['elegible'] == "1") {
       
       
        $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $iconevaluar = "onclick=\"DetailproevaeleusuJur($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
        
        
    } elseif ($datos['elegible'] == "0") {
      
        
         $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $iconevaluar = "onclick=\"DetailproevaeleusuJur($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
        
        
    } else {
       
       
         $color = "#FEFEA3";
        $labelstate = "EN PROCESO";
         if ($vencimiento[0] == 0) {
            $iconevaluar = "onclick=\"DetailproevaeleusuJur($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
        } else {
            $iconevaluar = "onclick=\"Detailproevaeleusu2Jur($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
        }
        
    }

   

    echo "<tr style='background:$color;' ><td>$datos[0]</td><td>$datos[num_rad]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...<i class='fa fa-search-plus icon_sesion2'  $iconevaluar 
onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit],&nbsp; $datos[razon_social]</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >" .
        $this->FormatDate2($vencimiento[1]) .
        "</td><td >" .
        $vencimiento[0] .
        " $plazo</td><td >$icon_dia</td><td>".$this->FormatDate2($datos['fec_apro_ele'])."</td><td><i class='fas fa-check-square icon_evalua22'  $iconevaluar title='Evaluación elegibilidad'></i> <i class='fa fa-user-slash icon_evalua22' title='Causales de rechazo'  onclick=\"EvaluarCausales($datos[0],$fila)\"></i> $ficha</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='10'>No hay proyectos en fase de elegibilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar proyectos para evaluacion de viabilidad vista gestor tecnico
    public function lproevavia($conv)
    {
        $tiempos = $this->ConsultaTiempo3($conv);
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,CONCAT(empresas.nit,'-',empresas.num_ver) as nit FROM propuestas,empresas,convocatoria WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv' and propuestas.estado>3 and dia_ele='ELEGIBLE' ORDER by propuestas.estado ASC"
        );
        $tipodias = "";
        if ($tiempos[1] == "H") {
            $tipodias = "Hábiles";
        } else {
            $tipodias = "Calendario";
        }
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-3"><i class="fa fa-file-excel" title="Descargar excel" onclick="window.open('templates/modules/ExcelProyectos.php')" style="cursor:pointer;color:green;margin-right: 30px;font-size:25px;"></i>
<i class="fas fa-sync-alt" title="Actualizar" onclick="eval_pro_via($('#eval_pro_via'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Sin Asignar</div><div class="col-md-3"><i class="fa fa-circle" style="color:#FEFEA3;margin-right: 30px;"></i>En proceso de evaluación</div><div class="col-md-3"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Evaluados</div><div class="col-md-3"><i class="fa fa-circle" style="color:#70CDF9;margin-right: 30px;"></i>Aprobado para vizualizar</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevavia',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tlproevavia"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>No. Radicación-SIGP<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111D').css('display','block')" onmouseout="$('#help1111D').css('display','none')"></i>
			<span class="tooltiptext" id="help1111D" style="display: none;">Número de radicación en SIGP </span></th><th>Título proyecto</th><th>Empresa</th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help11111').css('display','block')" onmouseout="$('#help11111').css('display','none')"></i>
			<span class="tooltiptext" id="help11111" style="display: none;">Fecha de recepción en CPC Oriente </span></th><th>Fecha límite <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha limite para que el evaluador realice la evaluación de viabilidad </span></th><th>Días calendario restantes <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Días calendario restantes al evaluador para evaluar el proyecto en viabilidad</span></th><th>Viable</th><th>Aprobado para visualizar</th><th>Fecha Aprobado<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_5').css('display','block')" onmouseout="$('#help111_5').css('display','none')"></i>
			<span class="tooltiptext" id="help111_5" style="display: none;">Fecha de aprobación para ser visualizado</span></th><th>Puntaje obtenido<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_6').css('display','block')" onmouseout="$('#help111_6').css('display','none')"></i>
			<span class="tooltiptext" id="help111_6" style="display: none;">Puntaje promedio obtenido en viabilidad</span></th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">

<?php
$fila = 1;
$color = "";
$labelstate = "";
$icon_dia = "";
$icon_dia2 = "";
$icon_dia3 = "";
$ficha = "";
$observaciones = "";
$warCau="";
while ($datos = mysqli_fetch_array($consulta2)) {
    $diasadi="<i class='fas fa-calendar-plus icon_evalua22'  onclick=\"AdicionarDiasProyectVia($datos[id],$fila)\" title='Días adicionales a proyecto'></i>";
    if ($datos['estado'] == 4) {
        $color = "#F7CEC5";
        $labelstate = "POR ASIGNAR";
        $ficha="";
       
    } elseif ($datos['estado'] == 5) {
        $color = "#FEFEA3";
        $labelstate = "EN PROCESO";
        $ficha="";
    
    } else {
        $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $ficha="<i class='fas fa-undo icon_evalua22'  onclick=\"UndoProyectVia($datos[id],$fila)\" title='Cambiar estado a en proceso'></i>";
       
    }
    if ($datos['dia_via'] == "VIABLE") {
        $icon_dia = "SI";
        $icon_dia2 = "1";
       // $ficha = "<i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/index2.php?id=$datos[id]&conv=$conv')\" title='Ficha evaluación viabilidad'></i>";
    } elseif ($datos['dia_via'] == "NO VIABLE") {
        $icon_dia = "NO";
        $icon_dia2 = "0";
        //$ficha = "<i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/index2.php?id=$datos[id]&conv=$conv')\" title='Ficha evaluación viabilidad'></i>";
    } else {
        $icon_dia = "";
        $icon_dia2 = "";
       
    }
    if ($datos['apro_via'] == 0) {
        $icon_dia3 = "NO";
         $observaciones = "";
    } elseif ($datos['apro_via'] == 1) {
        $icon_dia3 = "SI";
        $color="#70CDF9";
         $observaciones = "<i class='fas fa-comment-dots icon_evalua22'  onclick=\"ObservacionesEvaluacionV($datos[0],$fila)\" title='Observaciones a evaluación'></i>";
        
    } else {
        $icon_dia3 = "";
         $observaciones = "";
    }
      if($datos['causales_rechazo']=="Cumple")
    {
        $warCau="";
    }
    else if($datos['causales_rechazo']=="No cumple"){
        $warCau="<i class='fas fa-exclamation-circle' title='Incurre en causales de rechazo'  style='font-size:22px;color:red;cursor:pointer;' onclick=\"VerCausalesVia($datos[0],$fila)\"></i>";
    }
    else{
      $warCau="";   
    }
    $plazo = "";
    if ($datos['plazo_adi2'] > 0) {
        $plazo = "(con plazo adicional de $datos[plazo_adi2] dias $tipodias)";
    }
    $dias = $tiempos[3] + $datos['plazo_adi2'];
    $vencimiento = $this->Calculardias($tiempos[1], $dias, $datos['fec_rec']);
    echo "<tr style='background:$color;' ><td>$datos[id]</td><td>$datos[num_rad]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...$warCau<i class='fa fa-search-plus icon_sesion2' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"  onclick=\"Detailproevavia($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2','$icon_dia3')\"  ></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit], $datos[razon_social]</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >" .
        $this->FormatDate2($vencimiento[1]) .
        "</td><td >" .
        $vencimiento[0] .
        " $plazo</td><td >$icon_dia</td><td >$icon_dia3</td><td>".$this->FormatDate2($datos['fec_apro_via'])."</td>
<td >$datos[pun_obt_via]</td><td><i class='fas fa-eye icon_evalua22' title='Detalles'  onclick=\"Detailproevavia($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','$vencimiento[1]','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2','$icon_dia3')\"></i><i class='fa fa-user-slash icon_evalua22' title='Causales de rechazo' onclick=\"VerCausalesVia($datos[0],$fila)\"></i> $ficha $diasadi $observaciones</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='12'>No hay proyectos en fase de viabilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar proyectos para evaluacion de elegibilidad vista col productiva
    public function lproevaelecp($conv)
    {
        $tiempos = $this->ConsultaTiempo3($conv);
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,CONCAT(empresas.nit,'-',empresas.num_ver) as nit FROM propuestas,empresas,convocatoria WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv' and propuestas.apro_ele=1  ORDER by propuestas.fec_rec desc"
        );
        $tipodias = "";
        if ($tiempos[0] == "H") {
            $tipodias = "Hábiles";
        } else {
            $tipodias = "Calendario";
        }
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:35px;"></i>
<div class="col-md-12" style="text-align:left;"><i class="fas fa-sync-alt" title="Actualizar" onclick="eval_pro_elecp($('#eval_pro_ele'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i>Actualizar información</div>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaeleusu',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tlproevaeleusu"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>No. Radicación-SIGP<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111E').css('display','block')" onmouseout="$('#help1111E').css('display','none')"></i>
			<span class="tooltiptext" id="help1111E" style="display: none;">Número de radicación en SIGP </span></th><th>Título proyecto</th><th>Empresa</th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de recepción en CPC Oriente </span></th><th>Fecha límite <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Fecha limite para que el evaluador realice la evaluación de elegibilidad </span></th><th>Días calendario restantes <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1114').css('display','block')" onmouseout="$('#help1114').css('display','none')"></i>
			<span class="tooltiptext" id="help1114" style="display: none;">Días calendario restantes al evaluador para evaluar el proyecto en elegibilidad</span></th><th>Elegible</th><th>Fecha Aprobado<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_5').css('display','block')" onmouseout="$('#help111_5').css('display','none')"></i>
			<span class="tooltiptext" id="help111_5" style="display: none;">Fecha de aprobación para ser visualizado</span></th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "";
$labelstate = "";
$icon_dia = "";
$icon_dia2 = "";
$ficha = "";
$observaciones="";
$warCau="";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['estado'] == 2) {
        $labelstate = "EN PROCESO";
        $observaciones="";
    } else {
        $labelstate = "EVALUADO";
        $observaciones = "<i class='fas fa-comment-dots icon_evalua22' onclick=\"ObservacionesEvaluacionCP($datos[0],$fila)\" title='Observaciones a evaluación'></i>";
    }
    if ($datos['dia_ele'] == "ELEGIBLE") {
        $icon_dia = "Si";
        $icon_dia2 = "1";
        $ficha = "<i class='fas fa-file-alt icon_evalua22'  onclick=\"window.open('templates/modules/dompdf/index.php?id=$datos[id]&conv=$conv')\"  title='Ficha evaluación elegibilidad'></i>";
    } elseif ($datos['dia_ele'] == "NO ELEGIBLE") {
        $icon_dia = "No";
        $icon_dia2 = "0";
        $ficha = "<i class='fas fa-file-alt icon_evalua22'  onclick=\"window.open('templates/modules/dompdf/index.php?id=$datos[id]&conv=$conv')\" title='Ficha evaluación elegibilidad'></i>";
    } else {
        $icon_dia = "";
        $icon_dia2 = "";
        $ficha = "";
    }
     if($datos['causales_rechazo']=="Cumple")
    {
        $warCau="";
    }
    else if($datos['causales_rechazo']=="No cumple"){
        $warCau="<i class='fas fa-exclamation-circle' title='Incurre en causales de rechazo'  style='font-size:22px;color:red;cursor:pointer;' onclick=\"VerCausalesEleCP($datos[0],$fila)\"></i>";
    }
    else{
      $warCau="";   
    }
    $plazo = "";
    if ($datos['plazo_adi'] > 0) {
        $plazo = "(con plazo adicional de $datos[plazo_adi] dias $tipodias)";
    }

    $dias = $tiempos[2] + $datos['plazo_adi'];
    $vencimiento = $this->Calculardias($tiempos[0], $dias, $datos['fec_rec']);
    echo "<tr  ><td>$datos[id]</td><td>$datos[num_rad]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...$warCau <i class='fa fa-search-plus icon_sesion2' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"  onclick=\"DetailproevaeleusuCP($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\" ></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit], $datos[razon_social]</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >" .
        $this->FormatDate2($vencimiento[1]) .
        "</td><td >" .
        $vencimiento[0] .
        " $plazo</td><td >$icon_dia</td><td >" .
        $this->FormatDate2($datos['fec_apro_ele'])."</td><td><i class='fas fa-eye icon_evalua22' title='Detalles'  onclick=\"DetailproevaeleusuCP($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"></i><i class='fa fa-user-slash icon_evalua22' title='Causales de rechazo' onclick=\"VerCausalesEleCP($datos[0],$fila)\"></i>$ficha $observaciones</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='10'>No hay proyectos en fase de elegibilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar proyectos para evaluacion de viabilidad vista colombia productiva
    public function lproevaviacp($conv)
    {
        $tiempos = $this->ConsultaTiempo3($conv);
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,CONCAT(empresas.nit,'-',empresas.num_ver) as nit FROM propuestas,empresas,convocatoria WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv' and propuestas.estado>3 and apro_via=1 ORDER by propuestas.fec_rec desc"
        );
        $tipodias = "";
        if ($tiempos[1] == "H") {
            $tipodias = "Hábiles";
        } else {
            $tipodias = "Calendario";
        }
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:35px;"></i>
<div class="col-md-12" style="text-align:left;"><i class="fas fa-sync-alt" title="Actualizar" onclick="eval_pro_viacp($('#eval_pro_via'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i>Actualizar información</div>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaviacp',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tlproevaviacp"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>No. Radicación-SIGP<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111F').css('display','block')" onmouseout="$('#help1111F').css('display','none')"></i>
			<span class="tooltiptext" id="help1111F" style="display: none;">Número de radicación en SIGP </span></th><th>Título proyecto</th><th>Empresa</th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de recepción en CPC Oriente </span></th><th>Fecha límite <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1122A').css('display','block')" onmouseout="$('#help1122A').css('display','none')"></i>
			<span class="tooltiptext" id="help1122A" style="display: none;">Fecha limite para que el evaluador realice la evaluación de viabilidad </span></th><th>Días calendario restantes <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1113').css('display','block')" onmouseout="$('#help1113').css('display','none')"></i>
			<span class="tooltiptext" id="help1113" style="display: none;">Días calendario restantes al evaluador para evaluar el proyecto en viabilidad</span></th><th>Viable</th><th>Fecha Aprobado<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_5').css('display','block')" onmouseout="$('#help111_5').css('display','none')"></i>
			<span class="tooltiptext" id="help111_5" style="display: none;">Fecha de aprobación para ser visualizado</span></th><th>Puntaje obtenido<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_6').css('display','block')" onmouseout="$('#help111_6').css('display','none')"></i>
			<span class="tooltiptext" id="help111_6" style="display: none;">Puntaje promedio obtenido en viabilidad</span></th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">

<?php
$fila = 1;
$color = "";
$labelstate = "";
$icon_dia = "";
$icon_dia2 = "";
$ficha = "";
$observaciones = "";
$warCau="";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['estado'] == 4) {
        $labelstate = "POR ASIGNAR";
        $observaciones = "";
    } elseif ($datos['estado'] == 5) {
        $labelstate = "EN PROCESO";
        $observaciones = "";
    } else {
        $labelstate = "EVALUADO";
        $observaciones = "<i class='fas fa-comment-dots icon_evalua22'  onclick=\"ObservacionesEvaluacionCPV($datos[0],$fila)\" title='Observaciones a evaluación'></i>";
   
    }
    if ($datos['dia_via'] == "VIABLE") {
        $icon_dia = "SI";
        $icon_dia2 = "1";
       // $ficha = "<i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/index2.php?id=$datos[id]&conv=$conv')\"  title='Ficha evaluación viabilidad'></i>";
    } elseif ($datos['dia_via'] == "NO VIABLE") {
        $icon_dia = "NO";
        $icon_dia2 = "0";
        //$ficha = "<i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/index2.php?id=$datos[id]&conv=$conv')\" title='Ficha evaluación viabilidad'></i>";
    } else {
        $icon_dia = "";
        $icon_dia2 = "";
        $ficha = "";
    }
     if($datos['causales_rechazo']=="Cumple")
    {
        $warCau="";
    }
    else if($datos['causales_rechazo']=="No cumple"){
        $warCau="<i class='fas fa-exclamation-circle' title='Incurre en causales de rechazo'  style='font-size:22px;color:red;cursor:pointer;' onclick=\"VerCausalesViaCP($datos[0],$fila)\"></i>";
    }
    else{
      $warCau="";   
    }
    $plazo = "";
    if ($datos['plazo_adi2'] > 0) {
        $plazo = "(con plazo adicional de $datos[plazo_adi2] dias $tipodias)";
    }

    $dias = $tiempos[3] + $datos['plazo_adi2'];
    $vencimiento = $this->Calculardias($tiempos[1], $tiempos[3], $datos['fec_rec']);
    echo "<tr style='background:$color;' ><td>$datos[id]</td><td>$datos[num_rad]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...$warCau <i class='fa fa-search-plus icon_sesion2' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"  onclick=\"Detailproevaviausu($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit], $datos[razon_social]</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >" .
        $this->FormatDate2($vencimiento[1]) .
        "</td><td >" .
        $vencimiento[0] .
        " $plazo</td><td >$icon_dia</td><td>" .
        $this->FormatDate2($datos['fec_apro_via'])."</td><td >$datos[pun_obt_via]</td><td><i class='fas fa-eye icon_evalua22' title='Detalles'  onclick=\"Detailproevaviausu($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"></i><i class='fa fa-user-slash icon_evalua22' title='Causales de rechazo' onclick=\"VerCausalesViaCP($datos[0],$fila)\"></i> $ficha $observaciones</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='11'>No hay proyectos en fase de viabilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar proyectos para evaluacion de elegibilidad para  vista auxiliar tecnico
    public function lproevaeleaux($conv)
    {
        $tiempos = $this->ConsultaTiempo3($conv);
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,CONCAT(empresas.nit,'-',empresas.num_ver) as nit FROM propuestas,empresas,convocatoria WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv'  ORDER by propuestas.estado ASC"
        );
        $tipodias = "";
        if ($tiempos[0] == "H") {
            $tipodias = "Hábiles";
        } else {
            $tipodias = "Calendario";
        }
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-3"><i class="fas fa-sync-alt" title="Actualizar" onclick="eval_pro_eleaux($('#eval_pro_ele'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-3"><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Sin Asignar</div><div class="col-md-3"><i class="fa fa-circle" style="color:#FEFEA3;margin-right: 30px;"></i>En proceso de evaluación</div><div class="col-md-3"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Evaluados</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaeleaux',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tlproevaeleaux"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>No. Radicación-SIGP<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111G').css('display','block')" onmouseout="$('#help1111G').css('display','none')"></i>
			<span class="tooltiptext" id="help1111G" style="display: none;">Número de radicación en SIGP </span></th><th>Título proyecto</th><th>Empresa</th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1112').css('display','block')" onmouseout="$('#help1112').css('display','none')"></i>
			<span class="tooltiptext" id="help1112" style="display: none;">Fecha de recepción en CPC Oriente </span></th><th>Fecha límite <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1222A').css('display','block')" onmouseout="$('#help1222A').css('display','none')"></i>
			<span class="tooltiptext" id="help1222A" style="display: none;">Fecha limite para que el evaluador realice la evaluación de elegibilidad </span></th><th>Días calendario restantes <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help133YY3A').css('display','block')" onmouseout="$('#help133YY3A').css('display','none')"></i>
			<span class="tooltiptext" id="help133YY3A" style="display: none;">Días calendario restantes al evaluador para evaluar el proyecto en elegibilidad</span></th><th>Elegible</th><th>Aprobado para visualizar</th><th>Fecha Aprobado<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_5').css('display','block')" onmouseout="$('#help111_5').css('display','none')"></i>
			<span class="tooltiptext" id="help111_5" style="display: none;">Fecha de aprobación para ser visualizado</span></th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">
<?php
$fila = 1;
$color = "";
$labelstate = "";
$icon_dia = "";
$icon_dia2 = "";
$icon_dia3 = "";
$icon_dia4 = "";
$ficha = "";

while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['estado'] == 1) {
        $color = "#F7CEC5";
        $labelstate = "POR ASIGNAR";
        $ficha = "";
       
    } elseif ($datos['estado'] == 2) {
        $color = "#FEFEA3";
        $labelstate = "EN PROCESO";
        $ficha = "";
      
    } else {
        $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $ficha = "<i class='fas fa-file-alt icon_evalua22'  onclick=\"window.open('templates/modules/dompdf/index.php?id=$datos[id]&conv=$conv')\" title='Ficha evaluación elegibilidad'></i>";
       
    }
    if ($datos['dia_ele'] == "ELEGIBLE") {
        $icon_dia = "SI";
        $icon_dia4 = 1;
    } elseif ($datos['dia_ele'] == "NO ELEGIBLE") {
        $icon_dia = "NO";
        $icon_dia4 = 0;
    } else {
        $icon_dia = "";
        $icon_dia4 = "";
    }
    if ($datos['apro_ele'] == "1") {
        $icon_dia3 = "SI";
        $icon_dia2 = "1";
    } elseif ($datos['apro_ele'] == "0") {
        $icon_dia3 = "NO";
        $icon_dia2 = "0";
    } else {
        $icon_dia2 = "";
        $icon_dia3 = "";
    }

    $plazo = "";
    if ($datos['plazo_adi'] > 0) {
        $plazo = "(con plazo adicional de $datos[plazo_adi] dias $tipodias)";
    }
    $dias = $tiempos[2] + $datos['plazo_adi'];
    $vencimiento = $this->Calculardias($tiempos[0], $tiempos[2], $datos['fec_rec']);
    echo "<tr style='background:$color;' ><td>$datos[id]</td><td>$datos[num_rad]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...<i class='fa fa-search-plus icon_sesion2' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"  onclick=\"Detailproevaeleaux($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia4')\"></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit], $datos[razon_social]</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >" .
        $this->FormatDate2($vencimiento[1]) .
        "</td><td >" .
        $vencimiento[0] .
        " $plazo</td><td >$icon_dia</td><td >$icon_dia3</td><td>".$this->FormatDate2($datos['fec_apro_ele'])."</td><td><i class='fas fa-eye icon_evalua22' title='Detalles'   onclick=\"Detailproevaeleaux($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia4')\"></i><i class='fa fa-user-slash icon_evalua22' title='Causales de rechazo' onclick=\"VerCausales($datos[0],$fila)\"></i>$ficha</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}
if ($fila == 1) {
    echo "<tr ><td colspan='11'>No hay proyectos en fase de elegibilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
     // cargar proyectos para evaluacion de viabilidad vista auxliar tecnico
    public function lproevaviaaux($conv)
    {
        $tiempos = $this->ConsultaTiempo3($conv);
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,CONCAT(empresas.nit,'-',empresas.num_ver) as nit FROM propuestas,empresas,convocatoria WHERE propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and propuestas.id_convocatoria='$conv' and propuestas.estado>3 and dia_ele='ELEGIBLE' ORDER by propuestas.estado ASC"
        );
        $tipodias = "";
        if ($tiempos[1] == "H") {
            $tipodias = "Hábiles";
        } else {
            $tipodias = "Calendario";
        }
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-3"><i class="fas fa-sync-alt" title="Actualizar" onclick="eval_pro_viaaux($('#eval_pro_via'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-3"><i class="fa fa-circle" style="color:#F7CEC5;margin-right: 30px;"></i>Sin Asignar</div><div class="col-md-3"><i class="fa fa-circle" style="color:#FEFEA3;margin-right: 30px;"></i>En proceso de evaluación</div><div class="col-md-3"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Evaluados</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaviaaux',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tlproevaviaaux"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>No. Radicación-SIGP<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111').css('display','block')" onmouseout="$('#help111').css('display','none')"></i>
			<span class="tooltiptext" id="help111" style="display: none;">Número de radicación en SIGP </span></th><th>Título proyecto</th><th>Empresa</th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1122B').css('display','block')" onmouseout="$('#help1122B').css('display','none')"></i>
			<span class="tooltiptext" id="help1122B" style="display: none;">Fecha de recepción en CPC Oriente </span></th><th>Fecha límite <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1222B').css('display','block')" onmouseout="$('#help1222B').css('display','none')"></i>
			<span class="tooltiptext" id="help1222B" style="display: none;">Fecha limite para que el evaluador realice la evaluación de viabilidad </span></th><th>Días calendario restantes <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1333B').css('display','block')" onmouseout="$('#help1333B').css('display','none')"></i>
			<span class="tooltiptext" id="help1333B" style="display: none;">Días calendario restantes al evaluador para evaluar el proyecto en viabilidad</span></th><th>Viable</th><th>Aprobado para visualizar</th><th>Puntaje obtenido<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_6').css('display','block')" onmouseout="$('#help111_6').css('display','none')"></i>
			<span class="tooltiptext" id="help111_6" style="display: none;">Puntaje promedio obtenido en viabilidad</span></th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">

<?php
$fila = 1;
$color = "";
$labelstate = "";
$icon_dia = "";
$icon_dia2 = "";
$icon_dia3 = "";
$ficha = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    if ($datos['estado'] == 4) {
        $color = "#F7CEC5";
        $labelstate = "POR ASIGNAR";
    } elseif ($datos['estado'] == 5) {
        $color = "#FEFEA3";
        $labelstate = "EN PROCESO";
    } else {
        $color = "#B6F9AD";
        $labelstate = "EVALUADO";
    }
    if ($datos['dia_via'] == "VIABLE") {
        $icon_dia = "SI";
        $icon_dia2 = "1";
       // $ficha = "<i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/index2.php?id=$datos[id]&conv=$conv')\" title='Ficha evaluación viabilidad'></i>";
    } elseif ($datos['dia_via'] == "NO VIABLE") {
        $icon_dia = "NO";
        $icon_dia2 = "0";
        //$ficha = "<i class='fas fa-file-alt' style='margin-left:25px;cursor:pointer;' onclick=\"window.open('templates/modules/dompdf/index2.php?id=$datos[id]&conv=$conv')\" title='Ficha evaluación viabilidad'></i>";
    } else {
        $icon_dia = "";
        $icon_dia2 = "";
        $ficha = "";
    }
    if ($datos['apro_via'] == 0) {
        $icon_dia3 = "NO";
    } elseif ($datos['apro_via'] == 1) {
        $icon_dia3 = "SI";
    } else {
        $icon_dia3 = "";
    }

    $plazo = "";
    if ($datos['plazo_adi2'] > 0) {
        $plazo = "(con plazo adicional de $datos[plazo_adi2] dias $tipodias)";
    }

    $dias = $tiempos[3] + $datos['plazo_adi2'];
    $vencimiento = $this->Calculardias($tiempos[1], $dias, $datos['fec_rec']);
    echo "<tr style='background:$color;' ><td>$datos[id]</td><td>$datos[num_rad]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...<br><i class='fa fa-search-plus icon_sesion2' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\" onclick=\"Detailproevaviaaux($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2','$icon_dia3')\"></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit], $datos[razon_social]</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >" .
        $this->FormatDate2($vencimiento1[1]) .
        "</td><td >" .
        $vencimiento[0] .
        " $plazo</td><td >$icon_dia</td><td >$icon_dia3</td><td>".$this->FormatDate2($datos['fec_apro_via'])."</td><td >$datos[pun_obt_via]</td><td><i class='fas fa-eye icon_evalua22' title='Detalles' onclick=\"Detailproevaviaaux($datos[id],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2','$icon_dia3')\"></i><i class='fa fa-user-slash icon_evalua22' title='Causales de rechazo' onclick=\"VerCausales1($datos[0],$fila)\"></i>$ficha</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='10'>No hay proyectos en fase de viabilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar proyectos para evaluacion de viabilidad
    public function lproevaviausu($conv)
    {
        //session_start();
        $tiempos = $this->ConsultaTiempo3($conv);
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT `propuestas`.*,empresas.razon_social,CONCAT(empresas.nit,'-',empresas.num_ver) as nit,usuariosxpropuesta_via.* FROM propuestas,empresas,convocatoria,usuarios,usuariosxpropuesta_via WHERE usuariosxpropuesta_via.id_propuesta=propuestas.id and usuariosxpropuesta_via.id_usuario=usuarios.cod and propuestas.id_empresa=empresas.id and propuestas.id_convocatoria=convocatoria.id and usuarios.cod=$_COOKIE[user_code] and propuestas.id_convocatoria='$conv' and propuestas.estado>3 GROUP BY propuestas.id ORDER by propuestas.nom ASC"
        );
        $tipodias = "";
        if ($tiempos[1] == "H") {
            $tipodias = "Hábiles";
        } else {
            $tipodias = "Calendario";
        }
        ?>
<div class="row" style="box-sizing: border-box;"><div class="col-md-4"><i class="fas fa-sync-alt" title="Actualizar" onclick="eval_pro_via2($('#eval_pro_via'))" style="cursor:pointer;color:#0075b0;margin-right: 30px;font-size:25px;"></i></div><div class="col-md-4"><i class="fa fa-circle" style="color:#FEFEA3;margin-right: 30px;"></i>En proceso de evaluación</div><div class="col-md-4"><i class="fa fa-circle" style="color:#B6F9AD;margin-right: 30px;"></i>Evaluados</div></div>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tlproevaviacp',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tlproevaviacp"><thead style="background:#f8f9fa;"><tr><th>Id</th><th>No. Radicación-SIGP<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1111H').css('display','block')" onmouseout="$('#help1111H').css('display','none')"></i>
			<span class="tooltiptext" id="help1111H" style="display: none;">Número de radicación en SIGP </span></th><th>Título proyecto</th><th>Empresa</th><th>Fecha recepción <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1122').css('display','block')" onmouseout="$('#help1122').css('display','none')"></i>
			<span class="tooltiptext" id="help1122" style="display: none;">Fecha de recepción en CPC Oriente </span></th><th>Fecha límite <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1222C').css('display','block')" onmouseout="$('#help1222C').css('display','none')"></i>
			<span class="tooltiptext" id="help1222C" style="display: none;">Fecha limite para que el evaluador realice la evaluación de viabilidad </span></th><th>Días calendario restantes <i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help1333C').css('display','block')" onmouseout="$('#help1333C').css('display','none')"></i>
			<span class="tooltiptext" id="help1333C" style="display: none;">Días calendario restantes al evaluador para evaluar el proyecto en viabilidad</span></th><th>Viable</th><th>Fecha Aprobado<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_5').css('display','block')" onmouseout="$('#help111_5').css('display','none')"></i>
			<span class="tooltiptext" id="help111_5" style="display: none;">Fecha de aprobación para ser visualizado</span></th><th>Puntaje obtenido<i class="fa fa-question-circle" style="cursor:help;" onmouseover="$('#help111_6').css('display','block')" onmouseout="$('#help111_6').css('display','none')"></i>
			<span class="tooltiptext" id="help111_6" style="display: none;">Puntaje  obtenido en viabilidad</span></th><th>Acciones</th></tr></thead><tbody id="bd-list-convos">

<?php
$fila = 1;
$color = "";
$labelstate = "";
$icon_dia = "";
$icon_dia2 = "";
$ficha = "";
$iconevaluar = "";
while ($datos = mysqli_fetch_array($consulta2)) {
    $plazo = "";
    if ($datos['plazo_adi2'] > 0) {
        $plazo = "(con plazo adicional de $datos[plazo_adi2] dias $tipodias)";
    }

    $dias = $tiempos[3] + $datos['plazo_adi2'];
    $vencimiento = $this->Calculardias($tiempos[1], $dias, $datos['fec_rec']);
 if ($datos['dia_via'] == "VIABLE") {
        $icon_dia = "SI";
        $icon_dia2 = "1";
    } else if ($datos['dia_via'] == "NO VIABLE"){
        $icon_dia = "NO";
        $icon_dia2 = "0";
    }
    else{
        $icon_dia = "";
        $icon_dia2 = "";
    }
    if ($datos['viable'] == "1") {
       
        
        $ficha = "<i class='fas fa-file-alt icon_evalua22'  onclick=\"window.open('templates/modules/dompdf/index2.php?id=$datos[0]&conv=$conv')\"  title='Ficha evaluación viabilidad'></i>";
        $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $iconevaluar = "onclick=\"Detailproevaviausu($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
    } elseif ($datos['viable'] == "0") {
       
        
        $ficha = "<i class='fas fa-file-alt icon_evalua22'  onclick=\"window.open('templates/modules/dompdf/index2.php?id=$datos[0]&conv=$conv')\"  title='Ficha evaluación viabilidad'></i>";
         $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $iconevaluar = "onclick=\"Detailproevaviausu($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
    } else {
        
        
        $ficha = "";
        $color = "#FEFEA3";
        $labelstate = "EN PROCESO";
     if ($vencimiento[0] == 0) {
        $iconevaluar = "onclick=\"Detailproevaviausu($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
    } else {
        $iconevaluar = "onclick=\"Detailproevaviausu2($datos[0],'$datos[num_rad]','".$this->FormatDate2($datos['fec_rad'])."',$fila,'','".$this->FormatDate2($datos['fec_rec'])."','".$this->FormatDate2($vencimiento[1])."','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
    }   
    }
     
    /**if ($datos['estado'] == 4) {
        $color = "#F7CEC5";
        $labelstate = "POR ASIGNAR";
    } elseif ($datos['estado'] == 5) {
        $color = "#FEFEA3";
        $labelstate = "EN PROCESO";
    } else {
        $color = "#B6F9AD";
        $labelstate = "EVALUADO";
        $iconevaluar = "onclick=\"Detailproevaviausu($datos[id],'$datos[num_rad]','$datos[fec_rad]',$fila,'','$datos[fec_rec]','$vencimiento[1]','$vencimiento[0]','$tiempos[0]','$labelstate','$icon_dia2')\"";
    }**/

   

    echo "<tr style='background:$color;' ><td>$datos[0]</td><td>$datos[num_rad]</td><td>" .
        substr(strtoupper($datos['nom']), 0, 72) .
        "...<i class='fa fa-search-plus icon_sesion2' onmouseover=\"$('#help1551__$fila').css('display','block')\" onmouseout=\"$('#help1551__$fila').css('display','none')\"  $iconevaluar ></i><span class='tooltiptext' id='help1551__$fila' style='display: none;'>$datos[nom]</span></td><td >$datos[nit], $datos[razon_social]</td><td >" .
        $this->FormatDate2($datos['fec_rec']) .
        "</td><td >" .
        $this->FormatDate2($vencimiento[1]) .
        "</td><td >" .
        $vencimiento[0] .
        " $plazo</td><td >$icon_dia </td><td>" .
        $this->FormatDate2($datos['fec_apro_via'])."</td><td >$datos[pun_obt]</td><td><i class='fas fa-check-square icon_evalua22' title='Evaluacion viabilidad'  $iconevaluar></i> <i class='fa fa-user-slash icon_evalua22' title='Causales de rechazo' onclick=\"EvaluarCausalesVia($datos[0],$fila)\"></i> $ficha</td><td style='display:none;'>".strtoupper($datos['nom'])."</td></tr>";
    $fila++;
}

if ($fila == 1) {
    echo "<tr ><td colspan='11'>No hay proyectos en fase de viabilidad</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar dia restantes para evaluar el proyecto devuelve fecha limite y cantidad de dias restantes para evaluar
    public function Calculardias($tc, $cant, $fr)
    {
        if ($cant != 0) {
            $dias = ["0", date("Y-m-d")];
            if ($tc == "C") {
                $fecha_resultado = date("Y-m-d", strtotime($fr . "+ " . $cant . " days"));
                $fecha_actual = date("Y-m-d");
                if ($fecha_resultado < $fecha_actual) {
                    $dias[0] = "0";
                    $dias[1] = $fecha_resultado;
                } else {
                    $date1 = new DateTime($fecha_resultado);
                    $date2 = new DateTime($fecha_actual);
                    $diff = $date1->diff($date2);
                    $dias[0] = $diff->days;
                    $dias[1] = $fecha_resultado;
                }
            } else {
                $arrayfestivos = [
                    "2020-01-01",
                    "2020-01-06",
                    "2020-03-23",
                    "2020-04-05",
                    "2020-04-09",
                    "2020-04-10",
                    "2020-04-12",
                    "2020-05-01",
                    "2020-05-25",
                    "2020-06-15",
                    "2020-06-22",
                    "2020-06-29",
                    "2020-07-20",
                    "2020-08-07",
                    "2020-08-17",
                    "2020-10-12",
                    "2020-11-02",
                    "2020-11-16",
                    "2020-12-08",
                    "2020-12-25",
                ];
                $contadorhabiles = 0;
                $fecha_f = date("Y-m-d");
                $ii = 0;
                for ($i = 1; $i <= 100; $i++) {
                    $fecha_resultado = date("Y-m-d", strtotime($fr . "+ " . $i . " days"));
                    $ban = true;
                    for ($j = 0; $j < count($arrayfestivos); $j++) {
                        if ($fecha_resultado == date("Y-m-d", strtotime($arrayfestivos[$j])) || date("l", strtotime($fecha_resultado)) == "Saturday" || date("l", strtotime($fecha_resultado)) == "Sunday") {
                            $ban = false;
                            break;
                        }
                    }
                    if ($ban) {
                        $contadorhabiles += 1;
                    }
                    $ii = $i;
                    if ($cant == $contadorhabiles) {
                        break;
                    }
                }
                $fecha_f = date("Y-m-d", strtotime($fr . "+ " . $ii . " days"));
                $fecha_actual = date("Y-m-d");
                if ($fecha_f < $fecha_actual) {
                    $dias[0] = "0";
                    $dias[1] = $fecha_f;
                } else {
                    $date1 = new DateTime($fecha_f);
                    $date2 = new DateTime($fecha_actual);
                    $diff = $date1->diff($date2);
                    $dias[0] = $diff->days;
                    $dias[1] = $fecha_f;
                }
            }
        } else {
            $dias = ["0", date("Y-m-d", strtotime($fr))];
        }

        return $dias;
    }
    // cargar objetivos del  proyecto 
    public function CargarObjetivos($pro)
    {
        $response = [2];
        $response[0] = "";
        $response[1] = "<br>";
        $consulta = mysqli_query($this->conexion, "SELECT obj_gen from `propuestas`where id=$pro");
        $consulta1 = mysqli_query($this->conexion, "SELECT * FROM `especificos` where id_pro=$pro");
        $fila = 1;
        if ($datos = mysqli_fetch_array($consulta)) {
            $response[0] .= $datos['obj_gen'];
        }
        while ($datos = mysqli_fetch_array($consulta1)) {
            if ($fila % 2 == 0) {
                $color = "#EDEBEB";
            } else {
                $color = "transparent";
            }
            $response[1] .= "<div  style='background:$color;text-align:left;padding-left:35px;border-radius:5px;'><b>$fila.</b>  $datos[objetivo]<i class='fas fa-trash-alt icon_sesion' style='position:absolute!important;right:7%!important;' onclick='DelObjEsp($datos[id])'></i></div>";
            $fila++;
        }
        if ($fila == 1) {
            $response[1] .= "<div class='col-md-12' >No hay objetivos específicos</div><br>";
        } else {
            $response[1] .= "<br>";
        }

        echo json_encode($response);
    }
    // cargar objetivos del  proyecto 
    public function CargarObjetivoseva($pro)
    {
        $response = [2];
        $response[0] = "";
        $response[1] = "<br>";
        $consulta = mysqli_query($this->conexion, "SELECT obj_gen from `propuestas`where id=$pro");
        $consulta1 = mysqli_query($this->conexion, "SELECT * FROM `especificos` where id_pro=$pro");
        $fila = 1;
        if ($datos = mysqli_fetch_array($consulta)) {
            $response[0] .= $datos['obj_gen'];
        }
        while ($datos = mysqli_fetch_array($consulta1)) {
            if ($fila % 2 == 0) {
                $color = "#EDEBEB";
            } else {
                $color = "transparent";
            }
            $response[1] .= "<div  style='background:$color;text-align:left;padding-left:35px;border-radius:5px;'><b>$fila.</b>  $datos[objetivo]</div>";
            $fila++;
        }
        if ($fila == 1) {
            $response[1] .= "<div class='col-md-12' >No hay objetivos específicos</div><br>";
        } else {
            $response[1] .= "<br>";
        }

        echo json_encode($response);
    }
    // cargar productos del proyecto  
    public function Cargarprodu($pro)
    {
        $response = "";

        $consulta = mysqli_query($this->conexion, "SELECT * from `productos`where id_pro=$pro");

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($fila % 2 == 0) {
                $color = "#EDEBEB";
            } else {
                $color = "transparent";
            }
            $response .= "<div  style='background:$color;text-align:left;padding-left:35px;border-radius:5px;'><b>$fila.</b>  $datos[producto]<i class='fas fa-trash-alt icon_sesion' style='position:absolute!important;right:2%!important;' onclick='Delprodu($datos[id])'></i></div>";
            $fila++;
        }
        if ($fila == 1) {
            $response .= "<div class='col-md-12' >No hay productos</div><br>";
        } else {
            $response .= "<br>";
        }

        echo $response;
    }
    // cargar datos del proyecto 
    public function DatosProyecto($pro)
    {
        $response = [];

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT propuestas.*,empresas.razon_social,empresas.nit,empresas.num_ver,empresas.tam,empresas.act_eco,departamento.nombre as ndep,ciudad.nombre as nciu,region.nombre as regio ,empresas.ent_al from `propuestas`,empresas,departamento,ciudad,region where propuestas.id_empresa=empresas.id and empresas.ciudad=ciudad.codigo and departamento.region= region.codigo and ciudad.departamento=departamento.codigo and propuestas.id=$pro"
        );

        $fila = 1;
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = [
                $datos['num_rad'],
                strtoupper($datos['nom']),
                $datos['razon_social'],
                $datos['nit'],
                $datos['razon_social'],
                $datos['ent_alia'],
                $datos['beneficiarios'],
                $datos['ndep'],
                $datos['nciu'],
                $datos['act_tot'],
                $datos['tam'],
                $datos['brecha1'],
                $datos['brecha2'],
                $datos['brecha3'],
                $datos['area_estra'],
                $datos['resemp1'],
                $datos['resemp2'],
                $datos['resemp3'],
                $datos['resemp4'],
                $datos['duracion'],
                $datos['act_eco'],
                $datos['dia_ele'],
                $datos['dia_via'],
                $datos['fecha_eva_ele'],
                $datos['fecha_eva_via'],
                $datos['regio'],
                $datos['ent_al'],
                $datos['num_ver']
            ];
        }

        return $response;
    }
    // cargar productos del proyecto
    public function Cargarprodueva($pro)
    {
        $response = "";

        $consulta = mysqli_query($this->conexion, "SELECT * from `productos`where id_pro=$pro");

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($fila % 2 == 0) {
                $color = "#EDEBEB";
            } else {
                $color = "transparent";
            }
            $response .= "<div  style='background:$color;text-align:left;padding-left:35px;border-radius:5px;'><b>$fila.</b>  $datos[producto]</div>";
            $fila++;
        }
        if ($fila == 1) {
            $response .= "<div class='col-md-12' >No hay productos</div><br>";
        } else {
            $response .= "<br>";
        }

        echo $response;
    }
    // cargar resultados del proyecto
    public function CargarRes($pro)
    {
        $response = "";

        $consulta = mysqli_query($this->conexion, "SELECT * from `resultados` where id_pro=$pro");

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($fila % 2 == 0) {
                $color = "#EDEBEB";
            } else {
                $color = "transparent";
            }
            $response .= "<div  style='background:$color;text-align:left;padding-left:35px;border-radius:5px;'><b>$fila.</b>  $datos[resultado]<i class='fas fa-trash-alt icon_sesion' style='position:absolute!important;right:7%!important;' onclick='DelRes($datos[id])'></i></div>";
            $fila++;
        }
        if ($fila == 1) {
            $response .= "<div class='col-md-12' >No hay resultados</div><br>";
        } else {
            $response .= "<br>";
        }

        echo $response;
    }
    // cargar resultados del proyecto para reporte
    public function CargarTemAscRp($pro)
    {
        $response = "";

        $consulta = mysqli_query($this->conexion, "SELECT  tematicasxproyecto.id,tematicas.des as tem_des FROM tematicas,`tematicasxproyecto`,propuestas WHERE tematicas.id = tematicasxproyecto.tem AND propuestas.id= tematicasxproyecto.pro and tematicasxproyecto.pro=$pro");

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            $response .= "<b>$fila.</b>  $datos[tem_des]<br>";
            $fila++;
        }
         if($fila==1)
        {
            $response = "NO APLICA"; 
        }
        return $response;
    }
     public function CargarEBRp($pro)
    {
        $response = "";

        $consulta = mysqli_query($this->conexion, "SELECT * from ent_benxpro where pro=$pro");

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            $num_ver="-0";
            if($datos['num_ver']!=null && $datos['num_ver']!="" && $datos['num_ver']!="0" )
            {
                    $num_ver="-".$datos['num_ver'];    
            }
            $response .= "<b>$fila.</b> $datos[nit]$num_ver, $datos[raz]<br>";
            $fila++;
        }
        if($fila==1)
        {
            $response = "NO APLICA"; 
        }

        return $response;
    }
    // cargar resultados del proyectos
    public function CargarReseva($pro)
    {
        $response = "";

        $consulta = mysqli_query($this->conexion, "SELECT * from `resultados` where id_pro=$pro");

        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($fila % 2 == 0) {
                $color = "#EDEBEB";
            } else {
                $color = "transparent";
            }
            $response .= "<div  style='background:$color;text-align:left;padding-left:35px;border-radius:5px;border-bottom:1px solid #CCC;'><b>$fila.</b>  $datos[resultado]</div>";
            $fila++;
        }
        if ($fila == 1) {
            $response .= "<div class='col-md-12' >No hay resultados</div><br>";
        } else {
            $response .= "<br>";
        }

        echo $response;
    }
    // cargar tipologia de proyecto
    public function CargarTip($pro)
    {
        $response = [3];
        $response[0] = false;
        $response[1] = false;
        $response[2] = false;
        $consulta = mysqli_query($this->conexion, "SELECT * from `tipologia` where id_pro=$pro");

        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos["tipologia"] == "Investigación Científica") {
                $response[0] = true;
            } elseif ($datos["tipologia"] == "Desarrollo Tecnológico") {
                $response[1] = true;
            } elseif ($datos["tipologia"] == "Innovación") {
                $response[2] = true;
            }
        }

        echo json_encode($response);
    }
    // cargar tipologia de proyecto para report
    public function CargarTipRp($pro)
    {
        $response = [3];
        $response[0] = false;
        $response[1] = false;
        $response[2] = false;
        $consulta = mysqli_query($this->conexion, "SELECT * from `tipologia` where id_pro=$pro");

        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos["tipologia"] == "Investigación Científica") {
                $response[0] = true;
            } elseif ($datos["tipologia"] == "Desarrollo Tecnológico") {
                $response[1] = true;
            } elseif ($datos["tipologia"] == "Innovación") {
                $response[2] = true;
            }
        }

        return $response;
    }
    // aactualizar objetivo general
    function AddObjGen($conv, $emp)
    {
        $response = "";
        mysqli_query($this->conexion, "update `propuestas` set `obj_gen`='$emp'where id=$conv");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Objetivo actualizado";
        } else {
            $response = "Objetivo no actualizado";
        }

        echo $response;
    }
    // aprobar proyecto de viabilidad para visualizar
    function UpdStatprovia($cod, $ele, $nom)
    {
        $response = "";
        if ($ele == 1) {
            mysqli_query($this->conexion, "update `propuestas` set `apro_via`='$ele',fec_apro_via='".date('Y-m-d')."' where id=$cod");

            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Aprobado para visualizar";
                $this->notificacionColombiaP2($cod, $nom);
            } else {
                $response = "Error al aprobar el proyecto";
            }
        } else {
            $response = "Solo se permite aprobar";
        }
        echo $response;
    }
    // aprobar proyecto de elegibilidad para visualizar
    function UpdStatproele($cod, $ele, $nom)
    {
        $response = "";
        if ($ele == 1) {
            mysqli_query($this->conexion, "update `propuestas` set `apro_ele`='$ele',fec_apro_ele='".date('Y-m-d')."' where id=$cod");

            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Aprobado para visualizar";
                $this->notificacionColombiaP1($cod, $nom);
            } else {
                $response = "Error al actualizar el concepto final";
            }
        } else {
            $response = "Solo se permite aprobar";
        }
        echo $response;
    }
    // agregar plan de transferencia
    function AddPt($id_pro, $nom, $val_con, $val_fin)
    {
        $response = [];
        $consulta = mysqli_query($this->conexion, "SELECT * FROM `plan_tras` WHERE id_pro=$id_pro");

        if ($datos = mysqli_fetch_array($consulta)) {
            $response = ["Ya existe un plan, no se guardó ", null];
        } else {
            mysqli_query($this->conexion, "INSERT INTO `plan_tras` (`id_pro`, `nombre`, `val_con`, `val_fin`) VALUES ('$id_pro', '$nom', '$val_con', '$val_fin');");
            if (mysqli_affected_rows($this->conexion) > 0) {
                $lastid = mysqli_insert_id($this->conexion);
                $response = ["Plan trasferencia agregado", $lastid];
            } else {
                $response = ["Plan no agregado", $lastid];
            }
        }
        echo json_encode($response);
    }
    
    public function DatosConflictoEle($pro,$usu,$conv){
        $response = [];
        $consulta = mysqli_query($this->conexion, "SELECT `conflicto_int`.*,propuestas.nom as propu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='ele' and propuestas.id_convocatoria='$conv' and  conflicto_int.pro=$pro and conflicto_int.usu=$usu");
        
        //echo "SELECT `conflicto_int`.*,propuestas.nom as propu,CONCAT(empresas.nit,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='ele' and propuestas.id_convocatoria='$conv' and  conflicto_int.pro=$pro and conflicto_int.usu=$usu"; 
        $conflicto="";
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos['conflicto']==1)$conflicto="SI";else $conflicto="NO"; 
            $response = [$datos['usu2'],$conflicto,$datos['emp'],$datos['propu'],$datos['fec_registro'],$datos['usu2'],$datos['nombre']];
         
        }
        return $response ;
        
    }
     public function DatosConflictoVia($pro,$usu,$conv){
        $response = [];
        $consulta = mysqli_query($this->conexion, "SELECT `conflicto_int`.*,propuestas.nom as propu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='via' and propuestas.id_convocatoria='$conv' and  conflicto_int.pro=$pro and conflicto_int.usu=$usu");
        
        //echo "SELECT `conflicto_int`.*,propuestas.nom as propu,CONCAT(empresas.nit,', ',empresas.razon_social) as emp, usuarios.nombre as usu2, rol.nombre FROM `conflicto_int`,propuestas,empresas,usuarios,rol where conflicto_int.pro=propuestas.id and propuestas.id_empresa=empresas.id and conflicto_int.usu=usuarios.cod and usuarios.rol=rol.cod and fase='ele' and propuestas.id_convocatoria='$conv' and  conflicto_int.pro=$pro and conflicto_int.usu=$usu"; 
        $conflicto="";
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos['conflicto']==1)$conflicto="SI";else $conflicto="NO"; 
            $response = [$datos['usu2'],$conflicto,$datos['emp'],$datos['propu'],$datos['fec_registro'],$datos['usu2'],$datos['nombre']];
         
        }
        return $response ;
    }
    //editar plan de transferencia
    function edtPT($cod, $nom, $val_con, $val_fin)
    {
        $response = [];
        mysqli_query($this->conexion, "UPDATE `plan_tras` SET `nombre`='$nom', `val_con`='$val_con', `val_fin`='$val_fin' where id=$cod");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Plan trasferencia modificado";
        } else {
            $response = "Plan no modificado";
        }

        echo $response;
    }
    
    // subsanar subsanacion
    function SubsanacionPro($id_sub, $obs_eva, $num_folio, $archivo)
    {   $response = "";
       $consulta=mysqli_query($this->conexion, "SELECT propuestas.estado FROM propuestas,`subsanaciones` WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id=$id_sub");
       
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos[0]==2){
             mysqli_query($this->conexion, "UPDATE `subsanaciones` SET `fec_sub` = '" . date('Y-m-d') . "', `respuesta` = '$obs_eva', `n_folio` = '$num_folio', `archivo` = '$archivo' WHERE `subsanaciones`.`id` = $id_sub and estado<2");

        if (mysqli_affected_rows($this->conexion) > 0) {
            
            $response = "Subsanación actualizada";
            $this->notificacionResSub($id_sub);
        } else {
            $response = "Subsanación no actualizada";
        }        
            }
            else{
                $response = "Operación denegada";
            }
        }
        
        

        echo $response;
    }
    
    function CambiarestadoSubsana1($id_sub,$fec,$dit)
    {   $response = "";
     if($fec==null || $fec==""  )
     $fecha=date('Y-m-d');
     else $fecha=$fec;
       $consulta=mysqli_query($this->conexion, "SELECT propuestas.estado FROM propuestas,`subsanaciones` WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id=$id_sub");
       
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos[0]==2){
                
            mysqli_query($this->conexion, "UPDATE `subsanaciones` SET fecha_col_pro='$fecha',`estado` =1  WHERE `subsanaciones`.`id` = $id_sub  and estado=0");       
          // echo "UPDATE `subsanaciones` SET fecha_col_pro='$fecha',`estado` =1  WHERE `subsanaciones`.`id` = $id_sub  and estado=0";
        if (mysqli_affected_rows($this->conexion) > 0) {
         $response = "Operación realizada"; 
        } else {
            if($dit==1)
            {
            mysqli_query($this->conexion, "UPDATE `subsanaciones` SET fecha_col_pro='$fec'  WHERE `subsanaciones`.`id` = $id_sub  and estado=1");  
            //echo "UPDATE `subsanaciones` SET fecha_col_pro='$fecha'  WHERE `subsanaciones`.`id` = $id_sub  and estado=1";
            }
            else
            {mysqli_query($this->conexion, "UPDATE `subsanaciones` SET fecha_col_pro=NULL,fecha2=NULL,`estado` =0  WHERE `subsanaciones`.`id` = $id_sub  and estado=1");} 
           //echo "UPDATE `subsanaciones` SET fecha_col_pro=NULL,fecha2=NULL,`estado` =0  WHERE `subsanaciones`.`id` = $id_sub  and estado=1";
            if(mysqli_affected_rows($this->conexion) > 0) {
               $response = "Operación realizada";
           }
           else{
               $response = "Operación no realizada";
           }
        }        
            }
            else{
                $response = "Operación denegada";
            }
        }
        
        

        echo $response;
    }
     function CambiarestadoSubsana2($id_sub,$ban,$fec)
    {    if($fec==null || $fec==""  )
     $fecha=date('Y-m-d');
     else $fecha=$fec;
        $response = "";
       $consulta=mysqli_query($this->conexion, "SELECT propuestas.estado FROM propuestas,`subsanaciones` WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id=$id_sub");
       echo "SELECT propuestas.estado FROM propuestas,`subsanaciones` WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id=$id_sub"; 
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos[0]==2){
                if($ban==1){
            mysqli_query($this->conexion, "UPDATE `subsanaciones` SET fecha2='$fecha'  WHERE `subsanaciones`.`id` = $id_sub  and estado=1"); 
                    
                }
          
            else{
                mysqli_query($this->conexion, "UPDATE `subsanaciones` SET fecha2=NULL  WHERE `subsanaciones`.`id` = $id_sub  and estado=1");
                
            }
             if(mysqli_affected_rows($this->conexion) > 0) {
               $response = "Operación realizada";
           }else{
               $response = "Operación no realizada";
           }
          
            }
            else{
                $response = "Operación no realizada";
            }
            
        }
            else{
                $response = "Operación denegada";
            }


        echo $response;
    }
    
    function cargarinfoSubsana($id){
       $array=array();
       $consulta = mysqli_query($this->conexion, "SELECT `subsanaciones`.*,propuestas.id as idpropu,propuestas.nom as propu,propuestas.estado as espropu,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as empr,tipos_cri_ele.nombre tpcri,criterios_ele.requisito as requisitocri FROM `subsanaciones`,propuestas,empresas,tipos_cri_ele,criterios_ele where subsanaciones.id_pro=propuestas.id AND propuestas.id_empresa=empresas.id and subsanaciones.id_criterio=criterios_ele.id and criterios_ele.tipo=tipos_cri_ele.cod and subsanaciones.id=$id");
        
        if ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['estado'] == 0) {
        $color = "#F7CEC5";
      $disabled="";  
    } else if ($datos['estado'] == 1){
        $color = "#FEFEA3";
       $disabled="";  
    }
    else{
         $color = "#B6F9AD";
         $disabled="disabled";
    }
    if($datos['espropu']>=3)
    {
        $disabled="disabled";
    }
    if($datos['fecha_col_pro']!=null){
        $checked="checked";
    }
    else{
        $checked="";
    }
    if($datos['fecha2']!=null){
        $checked2="checked";
    }
    else{
        $checked2="";
    }
            $array=[$datos[id],$this->FormatDate2($datos['fecha']),$datos['fecha_col_pro'],$datos['fecha2'],$fila,$datos['n_folio'],$checked,$checked2,$disabled];
        }
        
        echo json_encode($array);
    }
    
    function FinalizarSubsana($id){
       $response = "";
        $consulta = mysqli_query($this->conexion, "SELECT  * from subsanaciones WHERE `subsanaciones`.`id` = $id");
        
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos['estado']==2){
                if($datos['fecha_col_pro']!=null)
                {
            mysqli_query($this->conexion, "UPDATE `subsanaciones` SET `estado` =1  WHERE `subsanaciones`.`id` = $id ");            
                }
                else{
            mysqli_query($this->conexion, "UPDATE `subsanaciones` SET `estado` =0  WHERE `subsanaciones`.`id` = $id ");        
                }
            }
            else{
            mysqli_query($this->conexion, "UPDATE `subsanaciones` SET `estado` =2  WHERE `subsanaciones`.`id` = $id ");
        }
         if (mysqli_affected_rows($this->conexion) > 0) {
            $response ="Operacion realizada";
        } else {
            $response = "Error al realizar la operación";
        }

        echo $response; 
        }
        
        
        
    }
    // actualizar subsanacion
    function SubsanacionPro2($id_sub, $obs_eva, $apro)
    {
        $response = "";
        mysqli_query($this->conexion, "UPDATE `subsanaciones` SET `observacion` = '$obs_eva', `estado` = '$apro' WHERE `subsanaciones`.`id` = $id_sub");

        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Subsanación actualizada";
        } else {
            $response = "Subsanación no actualizada";
        }

        echo $response;
    }

    // agregar nueva subsanacion
    function NuevaSubsanacion($obs, $req, $pro, $npro, $tipo, $cumple)
    {
        $this->calificarElegibilidadUser($pro, $req, $cumple, "", $obs, $tipo);
        $response = "";
    
        if ($this->mensaje) {
            mysqli_query(
                $this->conexion,
                "INSERT INTO `subsanaciones` ( `id_pro`, `id_criterio`, `fecha`, `fecha2`, `observacion`, `respuesta`, `n_folio`, `estado`, `archivo`) VALUES ('$pro', '$req', '" . date('Y-m-d') . "', NULL, '$obs', '', NULL, '0', NULL);"
            );

            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = " Subsanación creada";
        $consulta = mysqli_query($this->conexion, "SELECT  count(*) from subsanaciones WHERE `subsanaciones`.`id_pro` = $pro");
         //echo "SELECT  count(*) from subsanaciones WHERE `subsanaciones`.`id_pro` = $pro";
        if ($datos = mysqli_fetch_array($consulta)) {
               if($datos[0]==1)
               {
                      mysqli_query(
                $this->conexion,
                "update `propuestas` set plazo_adi=plazo_adi+5 where id=$pro"
            );
           // echo "update `propuestas` set plazo_adi=plazo_adi+5 where id=$pro"; 
               }
               }
              
               
               
                $this->verificareleMailSubSol($pro, $npro);
            }
                
            else {
                $response = "No se creó la subsanación";
            }
        } else {
            $response = "No está asignado al criterio";
        }
        echo $response;
    }

    
    // eliminar subsanacion
    function EliminarSubsanar($id)
    {
        $response = "";
        mysqli_query($this->conexion, "delete from `subsanaciones` where id=$id AND archivo=NULL");

        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Subsanación eliminada";
        } else {
            $response = "No se eliminó la subsanación\nHay archivos cargados";
        }

        echo $response;
    }
 function AgregarObservacionPro($id,$obs,$fase)
    {
        $response = "";
        $fas="";
        mysqli_query($this->conexion, "INSERT INTO `observaciones` ( `usu`, `pro`, `fecha`, `fase`, `observacion`) VALUES ( '".$_COOKIE['user_code']."', '$id', '".date('Y-m-d')."', '$fase', '$obs');");

        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Observación agregada";
            if($fase=="ele") $fas="ELEGIBILIDAD";
            else $fas="VIABILIDAD"; 
            $this->notificacionobservacion($id,$fas);
        } else {
            $response = "No fue posible agregar la observación";
        }

        echo $response;
    }

    
    // adicionar anexos a proyectos
    function AddAnex($id_pro, $docu, $folio, $fec, $archivo)
    {
        $response = "";
        if ($fec=="" || $fec==null )
        {
        mysqli_query($this->conexion, "INSERT INTO `documentosxpropuesta` ( `id_propuesta`, `doc`, `n_folio`, `fecexp`, `ruta`) VALUES ( '$id_pro', '$docu', '$folio', NULL, '$archivo');");
        }
        else{
        mysqli_query($this->conexion, "INSERT INTO `documentosxpropuesta` ( `id_propuesta`, `doc`, `n_folio`, `fecexp`, `ruta`) VALUES ( '$id_pro', '$docu', '$folio', '$fec', '$archivo');");    
        }
        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Anexo agregado";
        } else {
            $response = "Anexo no agregado";
        }

        echo $response;
    }
    // adicionar centors de formacion a plan de transferencia
    function Addcf($pt, $centro, $folio, $formato)
    {
        $consulta = mysqli_query($this->conexion, "SELECT * from `centrosxpt` where pt='$pt' and centro='$centro'");

        if ($datos = mysqli_fetch_array($consulta)) {
            echo "El centro no se asignó";
        } else {
            $response = "";
            mysqli_query($this->conexion, "INSERT INTO `centrosxpt` (`pt`, `centro`, `folio`, `formato`) VALUES ('$pt', '$centro', '$folio', '$formato');");
            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Centro formación agregado";
            } else {
                $response = "Centro formación no agregado";
            }

            echo $response;
        }
    }
    
      function AddEB($pro, $nit,$num_ver, $raz, $fec_con)
    {
        $consulta = mysqli_query($this->conexion, "SELECT * from `ent_benxpro` where nit='$nit'	and num_ver='$num_ver' and pro='$pro'");

        if ($datos = mysqli_fetch_array($consulta)) {
            echo "La entidad no se asignó";
        } else {
            $response = "";
            mysqli_query($this->conexion, "INSERT INTO `ent_benxpro` (`nit`, `num_ver`, `fecha_cons`, `raz`, `pro`) VALUES ('$nit', '$num_ver', '$fec_con', '$raz', '$pro')");
            //echo "INSERT INTO `ent_benxpro` (`nit`, `num_ver`, `fecha_cons`, `raz`, `pro`) VALUES ('$nit', '$num_ver', '$fec_con', '$raz', '$pro')";
            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Entidad asignada";
            } else {
                $response = "Entidad no asignada";
            }

            echo $response;
        }
    }
        function AddTem($pro, $tem)
    {
        $consulta = mysqli_query($this->conexion, "SELECT * from `tematicasxproyecto` where pro='$pro' and tem='$tem'");

        if ($datos = mysqli_fetch_array($consulta)) {
            echo "La temática ya esta asignada";
        } else {
            $response = "";
            mysqli_query($this->conexion, "INSERT INTO `tematicasxproyecto` (`pro`, `tem`) VALUES ('$pro', '$tem')");
            
            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Temática agregada";
            } else {
                $response = "Temática no agregada";
            }

            echo $response;
        }
    }
    // adicionar objetivos especiales por proyecto
    function AddObjEsp($conv, $emp)
    {
        $response = "";
        mysqli_query($this->conexion, "INSERT INTO `especificos` ( `id_pro`, `objetivo`) VALUES ('$conv','$emp');");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Objetivo Insertado";
        } else {
            $response = "Objetivo no insertado";
        }
        echo $response;
    }
    // adicionar productos por proyecto
    function Addprodu($conv, $emp)
    {
        $response = "";
        mysqli_query($this->conexion, "INSERT INTO `productos` ( `id_pro`, `producto`) VALUES ('$conv','$emp');");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Producto Insertado";
        } else {
            $response = "Producto no insertado";
        }
        echo $response;
    }
    
    // adicionar resultados por proyecto
    function AddRes($conv, $emp)
    {
        $response = "";
        mysqli_query($this->conexion, "INSERT INTO `resultados` ( `id_pro`, `resultado`) VALUES ('$conv','$emp');");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Resultado Insertado";
        } else {
            $response = "Resultado no insertado";
        }
        echo $response;
    }
    // adicionar tipologia por proyecto
    function AddTip($conv, $emp)
    {
        $response = "";
        mysqli_query($this->conexion, "INSERT INTO `tipologia` ( `id_pro`, `tipologia`) VALUES ('$conv','$emp');");
        if (mysqli_affected_rows($this->conexion) > 0) {
            $response = "Resultado Insertado";
        } else {
            $response = "Resultado no insertado";
        }
        echo $response;
    }
    // guardar proyecto
    function guardarPro($conv, $emp, $nom, $fec_rec, $num_rad, $fec_rad, $duracion, $val_pro, $val_fin, $val_tot_con, $val_con_din, $val_con_esp, $uti_net, $act_corr, $pas_corr, $pas_tot, $act_tot, $pas_lar_pla, $pas_cor_pla, $EBITDA, $ciu,$tip_pro)
    {
        $response = [];
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) from propuestas where id_empresa=$emp"
        );
        
        if($datos = mysqli_fetch_array($consulta)) {
        if($datos[0]==0){
        mysqli_query(
            $this->conexion,
            "INSERT INTO `propuestas` ( `id_empresa`, `id_convocatoria`, `fec_rec`, `nom`, `obj_gen`,area_estra, `duracion`, `val_pro`, `val_fin`, `val_tot_con`, `val_con_din`, `val_con_esp`, `uti_net`, `act_corr`, `pas_corr`, `pas_tot`, `act_tot`, `pas_lar_pla`, `pas_cor_pla`, `EBITDA`, `num_rad`, `fec_rad`, `estado`, `fec_reg`,ciiudad) VALUES ( '$emp', '$conv', '$fec_rec', '$nom','','$tip_pro' ,'$duracion', '$val_pro', '$val_fin', '$val_tot_con', '$val_con_din', '$val_con_esp', '$uti_net', '$act_corr', '$pas_corr', '$pas_tot', '$act_tot', '$pas_lar_pla', '$pas_cor_pla', '$EBITDA', '$num_rad', '$fec_rad', '1', '" .
                date('Y-m-d') .
                "',$ciu);"
        );
//echo "INSERT INTO `propuestas` ( `id_empresa`, `id_convocatoria`, `fec_rec`, `nom`, `obj_gen`,area_estra, `duracion`, `val_pro`, `val_fin`, `val_tot_con`, `val_con_din`, `val_con_esp`, `uti_net`, `act_corr`, `pas_corr`, `pas_tot`, `act_tot`, `pas_lar_pla`, `pas_cor_pla`, `EBITDA`, `num_rad`, `fec_rad`, `estado`, `fec_reg`,ciiudad) VALUES ( '$emp', '$conv', '$fec_rec', '$nom','','$tip_pro' '$duracion', '$val_pro', '$val_fin', '$val_tot_con', '$val_con_din', '$val_con_esp', '$uti_net', '$act_corr', '$pas_corr', '$pas_tot', '$act_tot', '$pas_lar_pla', '$pas_cor_pla', '$EBITDA', '$num_rad', '$fec_rad', '1', '" .
                date('Y-m-d') .
                "',$ciu);";
        if (mysqli_affected_rows($this->conexion) > 0) {
            $lastid = mysqli_insert_id($this->conexion);
            $response = ["Proyecto guardado", $lastid];
          
              mysqli_query(
            $this->conexion,
            "INSERT INTO `historial_reg_pro` ( `pro`, `usu`, `fecha`,fec_ult) VALUES ( '$lastid', '$_COOKIE[user_code]', '".date('Y-m-d')."','".date('Y-m-d')."')");   
            
        } else {
            $response = ["Error al guardar,verifique título o SIGP", null];
        }
        }
        else
        {
            $response = ["La empresa esta registrada a otro proyecto", null];
        }
    }
        echo json_encode($response);
    }
    
    // actualizar proyecto
    function editarPro(
        $id,
        $conv,
        $emp,
        $nom,
        $fec_rec,
        $num_rad,
        $fec_rad,
        $duracion,
        $val_pro,
        $val_fin,
        $val_tot_con,
        $val_con_din,
        $val_con_esp,
        $uti_net,
        $act_corr,
        $pas_corr,
        $pas_tot,
        $act_tot,
        $pas_lar_pla,
        $pas_cor_pla,
        $EBITDA,
        $ciu,$tip_pro
    ) {
        
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) from propuestas where id_empresa=$emp and id<>$id"
        );
       // echo "SELECT count(*) from propuestas where id_empresa=$emp and id<>$id";
        if($datos = mysqli_fetch_array($consulta)) {
        if($datos[0]==0){
        mysqli_query(
            $this->conexion,
            "update `propuestas` set `id_empresa`='$emp', `id_convocatoria`='$conv', `fec_rec`='$fec_rec', `nom`='$nom',area_estra='$tip_pro',  `duracion`='$duracion', `val_pro`='$val_pro', `val_fin`='$val_fin', `val_tot_con`='$val_tot_con', `val_con_din`='$val_con_din', `val_con_esp`='$val_con_esp', `uti_net`='$uti_net', `act_corr`='$act_corr', `pas_corr`='$pas_corr', `pas_tot`='$pas_tot', `act_tot`='$act_tot', `pas_lar_pla`='$pas_lar_pla', `pas_cor_pla`='$pas_cor_pla', `EBITDA`='$EBITDA', `num_rad`='$num_rad', fec_rad='$fec_rad',ciiudad=$ciu where id='$id' and estado=1 "
        );
 
        if (mysqli_affected_rows($this->conexion) > 0) {
            echo "Proyecto modificado";
              mysqli_query(
            $this->conexion,
            "update `historial_reg_pro` set fec_ult= '".date('Y-m-d')."' where pro=$id"); 
    
        } else {
        echo "Error al modificar,verifique título,SIGP o que el proyecto no se encuentre en proceso de evaluación";
        }
        }
        else{
         echo "La empresa esta registrada a otro proyecto";   
        }
        }
      
    }
    //cargar evaluadores por proyecto en elegibilidad
    public function CargarEvaluadoresElePro($pro)
    {
        $response = "";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT usuariosxpropuesta_ele.*,usuarios.nombre,rol.nombre as rol FROM `usuariosxpropuesta_ele`,usuarios,rol WHERE usuariosxpropuesta_ele.id_usuario=usuarios.cod and usuarios.rol=rol.cod and usuariosxpropuesta_ele.id_propuesta=$pro GROUP by usuariosxpropuesta_ele.id_usuario"
        );
        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            $response .= "<div class='col-md-4' ><b> $datos[rol]  : </b> $datos[nombre]</div><div class='col-md-4'  ><b>Fecha asignación :</b> ".$this->FormatDate2($datos['fecha_asig'])." </div><div class='col-md-4'><b>Fecha Última modificación : </b>".$this->CargarUltimaFechaEle($datos['id_propuesta'],$datos['id_usuario'])."</div>";
            $fila++;
        }
        if ($fila == 1) {
            $response = "<span style='color:red;'>No hay evaluadores asignados</span><br>";
        }
        echo $response;
    }
    
    public function CargarEvaluadoresElePro2($pro)
    {
        $response = "";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT usuariosxpropuesta_ele.*,usuarios.nombre,rol.nombre as rol FROM `usuariosxpropuesta_ele`,usuarios,rol WHERE usuariosxpropuesta_ele.id_usuario=usuarios.cod and usuarios.rol=rol.cod and usuariosxpropuesta_ele.id_propuesta=$pro  and usuariosxpropuesta_ele.id_usuario=".$_COOKIE['user_code']." GROUP by usuariosxpropuesta_ele.id_usuario"
        );
       // echo "SELECT usuariosxpropuesta_ele.*,usuarios.nombre,rol.nombre as rol FROM `usuariosxpropuesta_ele`,usuarios,rol WHERE usuariosxpropuesta_ele.id_usuario=usuarios.cod and usuarios.rol=rol.cod and usuariosxpropuesta_ele.id_propuesta=$pro  and usuariosxpropuesta_ele.id_usuario=".$_COOKIE['user_code']." GROUP by usuariosxpropuesta_ele.id_usuario";
        $fila = 1;
        if($datos = mysqli_fetch_array($consulta)) {
            $response .= "<div class='col-md-6' style='margin-top:10px;margin-bottom:10px;' ><b>Fecha asignación :</b> ".$this->FormatDate2($datos['fecha_asig'])." </div><div class='col-md-6' style='margin-top:10px;margin-bottom:10px;'><b>Fecha Última modificación : </b>".$this->CargarUltimaFechaEle($datos['id_propuesta'],$datos['id_usuario'])."</div>";
            $fila++;
        }
        if ($fila == 1) {
            $response = "<span style='color:red;'>No hay evaluadores asignados</span><br>";
        }
        echo $response;
    }
     public function CargarEvaluadoresViaPro2($pro)
    {
        $response = "";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT usuariosxpropuesta_via.*,usuarios.nombre,rol.nombre as rol FROM `usuariosxpropuesta_via`,usuarios,rol WHERE usuariosxpropuesta_via.id_usuario=usuarios.cod and usuarios.rol=rol.cod and usuariosxpropuesta_via.id_propuesta=$pro  and usuariosxpropuesta_via.id_usuario=".$_COOKIE['user_code']." GROUP by usuariosxpropuesta_via.id_usuario"
        );
        $fila = 1;
        if($datos = mysqli_fetch_array($consulta)) {
            $response .= "<div class='col-md-6' style='margin-top:10px;margin-bottom:10px;' ><b>Fecha asignación :</b> ".$this->FormatDate2($datos['fecha_asig'])." </div><div class='col-md-6' style='margin-top:10px;margin-bottom:10px;'><b>Fecha Última modificación : </b>".$this->CargarUltimaFechaVia($datos['id_propuesta'],$datos['id_usuario'])."</div>";
            $fila++;
        }
        if ($fila == 1) {
            $response = "<span style='color:red;'>No hay evaluadores asignados</span><br>";
        }
        echo $response;
    }
    
    public function CargarUltimaFechaEle($pro,$usu)
    {
        $response = "Sin modificaciones";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT max(fecha) FROM `calificacion_elegibilidad` where id_propuesta=$pro and usuario=$usu"
        );
       // echo "SELECT max(fecha) FROM `calificacion_elegibilidad` where id_propuesta=$pro and usuario=$usu";
            if($datos = mysqli_fetch_array($consulta)) {
                if($datos[0]!=NULL ){
                $response=$this->FormatDate2($datos[0]);}
                
            }
 return $response;
    }
     public function CargarUltimaFechaVia($pro,$usu)
    {
        $response = "Sin modificaciones";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT max(fecha) FROM `calificacion_viabilidad` where id_propuesta=$pro and usuario=$usu"
        );
       // echo "SELECT max(fecha) FROM `calificacion_elegibilidad` where id_propuesta=$pro and usuario=$usu";
            if($datos = mysqli_fetch_array($consulta)) {
                if($datos[0]!=NULL ){
                $response=$this->FormatDate2($datos[0]);}
                
            }
 return $response;
    }
    
    
    // consultar proyectos por asignar a elegibilidad o viabilidad
    public function CargarProasig($conv, $tipo)
    {
        $sql = "";
        if ($tipo == "ele") {
            $sql =
                "SELECT propuestas.id,propuestas.nom,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp FROM `propuestas`,empresas where propuestas.id_empresa=empresas.id and propuestas.id not in(SELECT id_propuesta FROM `usuariosxpropuesta_ele` where criterio>1 ) GROUP by propuestas.id order by propuestas.nom asc";
        } else {
            $sql =
            "select propuestas.id,propuestas.nom,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp FROM `propuestas`,empresas where propuestas.id_empresa=empresas.id and propuestas.estado=4 and propuestas.`dia_ele`='ELEGIBLE'"; 
        }

        $opt = "";
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblpro',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblpro"><thead style="background:#f8f9fa;"><tr><th>Empresa</th><th>Título proyecto</th></tr></thead><tbody id="bd-list-convos">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 while ($datos = mysqli_fetch_array($consulta)) {
     echo "<tr onclick='SeleProAsig($datos[id])' style='cursor:pointer;'><td>$datos[emp]</td><td>".strtoupper($datos['nom'])."</td></tr>";
 }
 echo "</tbody></table>";
    }
    // consultar proyectos para asignar a asesor juridico
    public function CargarProasigJur($conv, $tipo)
    {
        $sql = "";

        $sql =
            "SELECT propuestas.id,propuestas.nom,CONCAT(empresas.nit,'-',empresas.num_ver,', ',empresas.razon_social) as emp FROM `propuestas`,empresas where propuestas.id_empresa=empresas.id and propuestas.id not in(SELECT id_propuesta FROM `usuariosxpropuesta_ele` where criterio=1) GROUP by propuestas.id order by propuestas.nom asc";

        $opt = "";
        ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblpro',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblpro"><thead style="background:#f8f9fa;"><tr><th>Empresa</th><th>Título proyecto</th></tr></thead><tbody id="bd-list-convos">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 while ($datos = mysqli_fetch_array($consulta)) {
     echo "<tr onclick='SeleProAsig($datos[id])' style='cursor:pointer;'><td>$datos[emp]</td><td>".strtoupper($datos['nom'])."</td></tr>";
 }
 echo "</tbody></table>";
    }
    // consultar empresas 
    public function CargarEmpPro($conv)
    {    
        $sql = "select empresas.nit,empresas.num_ver,empresas.razon_social,empresas.id from empresas  order by razon_social asc"; ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblemp',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblemp"><thead style="background:#f8f9fa;"><tr><th>Nit</th><th>Razón social</th></tr></thead><tbody id="bd-list-convos">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 while ($datos = mysqli_fetch_array($consulta)) {
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
     echo "<tr onclick='SeleEmpPro($datos[id])' style='cursor:pointer;'><td>$datos[nit]$num_ver</td><td>$datos[razon_social]</td></tr>";
 }
 echo "</tbody></table>";
    }
    
 public function CargarEmpProDP()
    {    
        $sql = "select empresas.nit,empresas.num_ver,empresas.razon_social,empresas.id from empresas  order by razon_social asc"; ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblemp',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblemp"><thead style="background:#f8f9fa;"><tr><th>Nit</th><th>Razón social</th></tr></thead><tbody id="bd-list-convos">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 while ($datos = mysqli_fetch_array($consulta)) {
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
     echo "<tr onclick='SeleEmpProDP($datos[id])' style='cursor:pointer;'><td>$datos[nit]$num_ver</td><td>$datos[razon_social]</td></tr>";
 }
 echo "</tbody></table>";
    }    
    public function CargarEmpProaux($conv)
    {    
        $sql = "select empresas.nit,empresas.num_ver,empresas.razon_social,empresas.id from empresas,historial_reg_emp WHERE empresas.id=historial_reg_emp.emp and historial_reg_emp.usu=$_COOKIE[user_code]  order by razon_social asc"; ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblemp',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblemp"><thead style="background:#f8f9fa;"><tr><th>Nit</th><th>Razón social</th></tr></thead><tbody id="bd-list-convos">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 while ($datos = mysqli_fetch_array($consulta)) {
     $num_ver="-0";
     if($datos['num_ver']!=0 && $datos['num_ver']!=null)
     {
         $num_ver="-".$datos['num_ver'];
     }
     echo "<tr onclick='SeleEmpPro($datos[id])' style='cursor:pointer;'><td>$datos[nit]$num_ver</td><td>$datos[razon_social]</td></tr>";
 }
 echo "</tbody></table>";
    }
        
    
   public function CargarCenFor_fil($conv)
    {
        $sql = "SELECT * FROM `centros_formacion` order by nombre ASC"; ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblcen_for',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblcen_for"><thead style="background:#f8f9fa;"><tr><th>Centro de Formación</th><th>Regional</th></tr></thead><tbody id="bd-list-convos">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 while ($datos = mysqli_fetch_array($consulta)) {
     
     echo "<tr onclick=\"SeleCenFor('".$datos['nombre']." - ".$datos['regional']."')\" style='cursor:pointer;'><td>$datos[nombre]</td> <td>$datos[regional]</td></tr>";
 }
 echo "</tbody></table>";
    }  
    
    // consultar proyectos sin asignar a elegibilidad
    public function ProSinAsigEle()
    {
        $conteo = "<span style='background-color:#FFF;color:#000;padding:5px;'>0</span>";
        $sql = "SELECT count(*) FROM `propuestas` where id not in(SELECT id_propuesta FROM `usuariosxpropuesta_ele` where criterio>1)";
        $consulta = mysqli_query($this->conexion, $sql);
        if ($datos = mysqli_fetch_array($consulta)) {
            if ($datos[0] > 0) {
                $conteo = "<span style='background-color:red;color:#FFF;padding:5px;' id='a_s_ele'>$datos[0]</span>";
            }
        }

        return $conteo;
    }
    // consultar proyectos sin asignar a elegibilidad asesor juridico 
    public function ProSinAsigEleJur()
    {
        $conteo = "<span style='background-color:#FFF;color:#000;padding:5px;'>0</span>";
        $sql = "SELECT count(*) FROM `propuestas` where id not in(SELECT id_propuesta FROM `usuariosxpropuesta_ele` where criterio=1)";
        $consulta = mysqli_query($this->conexion, $sql);
        if ($datos = mysqli_fetch_array($consulta)) {
            if ($datos[0] > 0) {
                $conteo = "<span style='background-color:red;color:#FFF;padding:5px;' id='a_s_elejur'>$datos[0]</span>";
            }
        }

        return $conteo;
    }
    // consultar proyectos sin asignar a viabilidad
    public function ProSinAsigVia()
    {
        $conteo = "<span style='background-color:#FFF;color:#000;padding:5px;'>0</span>";
        $sql = "SELECT count(*) FROM `propuestas` where estado=4 and `dia_ele`='ELEGIBLE' ";
        $consulta = mysqli_query($this->conexion, $sql);
        if ($datos = mysqli_fetch_array($consulta)) {
            if ($datos[0] > 0) {
                $conteo = "<span style='background-color:red;color:#FFF;padding:5px;' id='a_s_via'>$datos[0]</span>";
            }
        }

        return $conteo;
    }
    // consultar actividades economica 
    public function CargarAct_eco($conv)
    {
        $sql = "SELECT * FROM `activi_eco` order by nom asc"; ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblacteco',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblacteco"><thead style="background:#f8f9fa;"><tr><th style="display:none;">Id</th><th>Actividad</th></tr></thead><tbody id="bd-list-convos">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 while ($datos = mysqli_fetch_array($consulta)) {
     echo "<tr onclick=\"SeleActEmp('$datos[nom]')\" style='cursor:pointer;'><td style='display:none;'>$datos[id] </td><td>$datos[nom]</td></tr>";
 }
 echo "</tbody></table>";
    }
    
    
    public function ObservacionesEvaluacion($pro)
    {
 $sql = "SELECT observaciones.*,usuarios.nombre,rol.nombre as nrol FROM `observaciones`,usuarios,rol WHERE observaciones.usu = usuarios.cod and usuarios.rol=rol.cod and observaciones.pro=$pro and fase='ele' order by observaciones.fecha DESC";?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblobservaciones',this.value)" style="padding-left:40px;"  >
<div class="col-md-12" style="text-align:center;"><i class="fas fa-sync-alt" title="Actualizar" onclick="ObservacionesEvaluacion2(<?php echo $pro;?>)" style="cursor:pointer;color:#0075b0;font-size:25px;"></i></div>
<table class="table table-bordered" id="tblobservaciones"><thead style="background:#f8f9fa;">
    <tr><th width="20%" >Usuario</th><th width="20%">Rol</th><th width="10%">Fecha</th><th width="40%">Observación</th><th width="10%">Acciones</th></tr></thead><tbody id="bd-list-obs">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 $icon="";
 $observacion="";
 $fila=1;
 while ($datos = mysqli_fetch_array($consulta)) {
     if($datos['usu']==$_COOKIE['user_code']){
         $icon="<i class='fas fa-pencil-alt icon_sesion' onclick=\"editarObservacion($datos[id],$fila,'ele',$pro)\" title='Editar la observación'> </i><i class='fas fa-trash-alt icon_sesion' onclick=\"DelObservacion($datos[id],$fila,'ele',$pro)\" title='Eliminar la observación'></i>";  
        $observacion="<textarea  id='agregarObsPro$fila' class='form-control' style='height:80px;' >$datos[observacion]</textarea>" ;
     }
     else
     {
        $icon="";
        $observacion=$datos['observacion'];
     }
     echo "<tr ><td >$datos[nombre] </td><td>$datos[nrol]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td>$observacion</td><td>$icon <br><span id='loadingobs$fila'></span></td></tr>";
     $fila++;
 }
 echo "</tbody></table>";
    }
    
   public function ObservacionesEvaluacion2($pro)
    {
 $sql = "SELECT observaciones.*,usuarios.nombre,rol.nombre as nrol FROM `observaciones`,usuarios,rol WHERE observaciones.usu = usuarios.cod and usuarios.rol=rol.cod and observaciones.pro=$pro and fase='ele' order by observaciones.fecha DESC";?>

	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 $icon="";
 $fila=1;
 while ($datos = mysqli_fetch_array($consulta)) {
     if($datos['usu']==$_COOKIE['user_code']){
        $icon="<i class='fas fa-pencil-alt icon_sesion' onclick=\"editarObservacion($datos[id],$fila,'ele',$pro)\" title='Editar la observación'> </i><i class='fas fa-trash-alt icon_sesion' onclick=\"DelObservacion($datos[id],$fila,'ele',$pro)\" title='Eliminar la observación'></i>";  
        $observacion="<textarea  id='agregarObsPro$fila' class='form-control' style='height:80px;' >$datos[observacion]</textarea>" ;
     }
     else
     {
        $icon="";
        $observacion=$datos['observacion'];
     }
     echo "<tr ><td >$datos[nombre] </td><td>$datos[nrol]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td>$observacion</td><td>$icon <br><span id='loadingobs$fila'></span></td></tr>";
     $fila++;
 }

    }  
    
      public function ObservacionesEvaluacionV2($pro)
    {
      $sql = "SELECT observaciones.*,usuarios.nombre,rol.nombre as nrol FROM `observaciones`,usuarios,rol WHERE observaciones.usu = usuarios.cod and usuarios.rol=rol.cod and observaciones.pro=$pro and fase='via' order by observaciones.fecha DESC";?>
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 $icon="";
 $fila=1;
  while ($datos = mysqli_fetch_array($consulta)) {
     if($datos['usu']==$_COOKIE['user_code']){
        $icon="<i class='fas fa-pencil-alt icon_sesion' onclick=\"editarObservacion($datos[id],$fila,'via',$pro)\" title='Editar la observación'> </i><i class='fas fa-trash-alt icon_sesion' onclick=\"DelObservacion($datos[id],$fila,'via',$pro)\" title='Eliminar la observación'></i>";  
        $observacion="<textarea  id='agregarObsPro$fila' class='form-control' style='height:80px;'>$datos[observacion]</textarea>" ;
     }
     else
     {
        $icon="";
        $observacion=$datos['observacion'];
     }
     echo "<tr ><td >$datos[nombre] </td><td>$datos[nrol]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td>$observacion</td><td>$icon <br><span id='loadingobs$fila'></span></td></tr>";
     $fila++;
 }
    }
    
     public function ObservacionesEvaluacionV($pro)
    {
      $sql = "SELECT observaciones.*,usuarios.nombre,rol.nombre as nrol FROM `observaciones`,usuarios,rol WHERE observaciones.usu = usuarios.cod and usuarios.rol=rol.cod and observaciones.pro=$pro and fase='via' order by observaciones.fecha DESC";?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblobservaciones',this.value)" style="padding-left:40px;"  >
<div class="col-md-12" style="text-align:center;"><i class="fas fa-sync-alt" title="Actualizar" onclick="ObservacionesEvaluacionV2(<?php echo $pro;?>)" style="cursor:pointer;color:#0075b0;font-size:25px;"></i></div>
<table class="table table-bordered" id="tblobservaciones"><thead style="background:#f8f9fa;">
    <tr><th width="20%" >Usuario</th><th width="20%">Rol</th><th width="10%">Fecha</th><th width="40%">Observación</th><th width="10%">Acciones</th></tr></thead><tbody id="bd-list-obs">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 $icon="";
  $fila=1;
 while ($datos = mysqli_fetch_array($consulta)) {
     if($datos['usu']==$_COOKIE['user_code']){
        $icon="<i class='fas fa-pencil-alt icon_sesion' onclick=\"editarObservacion($datos[id],$fila,'via',$pro)\" title='Editar la observación'> </i><i class='fas fa-trash-alt icon_sesion' onclick=\"DelObservacion($datos[id],$fila,'via',$pro)\" title='Eliminar la observación'></i>";  
        $observacion="<textarea  id='agregarObsPro$fila' class='form-control' >$datos[observacion]</textarea>" ;
     }
     else
     {
        $icon="";
        $observacion=$datos['observacion'];
     }
     echo "<tr ><td >$datos[nombre] </td><td>$datos[nrol]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td>$observacion</td><td>$icon <br><span id='loadingobs$fila'></span></td></tr>";
     $fila++;
 }
 echo "</tbody></table>";
    } 
    
    
    
    
    
    // consultar evaluadores de viabilidad
    public function CargarEvaluadoresViaPro($pro,$cod)
    {
        $response = "";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT usuariosxpropuesta_via.*,usuarios.nombre FROM `usuariosxpropuesta_via`,usuarios WHERE usuariosxpropuesta_via.id_usuario=usuarios.cod and usuariosxpropuesta_via.id_propuesta=$pro GROUP by usuariosxpropuesta_via.id_usuario"
        );
        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            $fec_ult_mod=$this->CargarUltimaFechaVia($datos['id_propuesta'],$datos['id_usuario']);
            $fecha_asig=$this->FormatDate2($datos['fecha_asig']);
            $response .= "<div class='col-md-4'  ><b>Evaluador $fila : </b> $datos[nombre]<br></div><div class='col-md-4'  ><b>Asignado : </b> $fecha_asig<br></div><div class='col-md-4'><b>Última modificación : </b>$fec_ult_mod</div><div class='col-md-6' style='margin-top:15px;' ><button class='btn btn-primary' onclick=\"CargarDivevavia_ind($datos[id_usuario],'$datos[nombre]','$fecha_asig','$fec_ult_mod')\"><i class='fas fa-check'></i>  &nbsp; Ver Evaluación</button>&nbsp; &nbsp;<button class='btn btn-primary' onclick=\"window.open('templates/modules/dompdf/index2.php?id=$pro&conv=$cod&usu=$datos[id_usuario]')\"> <i class='fas fa-file-alt'></i> &nbsp; Ver ficha de evaluación</button></div><div class='col-md-12' style='height:20px;'></div>";
            $fila++;
        }

        if ($fila == 1) {
            $response = "<span style='color:red;'>No hay evaluadores asignados</span><br>";
        }
        echo $response . "</div>";
    }
    // consultar evaluadores de elegibilidad para reporte pdf
    public function CargarEvaluadoresEleRp($pro)
    {
        $response = "";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT usuariosxpropuesta_ele.*,usuarios.* FROM `usuariosxpropuesta_ele`,usuarios WHERE usuariosxpropuesta_ele.id_usuario=usuarios.cod and usuarios.rol=3 and usuariosxpropuesta_ele.id_propuesta=$pro GROUP by usuariosxpropuesta_ele.id_usuario"
        );
        $fila = 1;
        if ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tip_ide'] == 1) {
                $t = "C.C";
            } elseif ($datos['tip_ide'] == 2) {
                $t = "Pasaporte";
            } elseif ($datos['tip_ide'] == 3) {
                $t = "C.E";
            } else {
                $t = "NIT";
            }

            $response .=
                "<tr><td height='60' colspan='2' class='balnco'>Nombre y firma Evaluador :<br><br><br><br>______________________<br>$datos[nombre]<br>$t " .
                number_format($datos['num_ide'], 0, ',', '.') .
                "</td>";
            $fila++;
        }
        
        
       $consulta = mysqli_query(
            $this->conexion,
            "SELECT usuariosxpropuesta_ele.*,usuarios.* FROM `usuariosxpropuesta_ele`,usuarios WHERE usuariosxpropuesta_ele.id_usuario=usuarios.cod and usuarios.rol=6 and usuariosxpropuesta_ele.id_propuesta=$pro GROUP by usuariosxpropuesta_ele.id_usuario"
        );
        $fila = 1;
        if ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tip_ide'] == 1) {
                $t = "C.C";
            } elseif ($datos['tip_ide'] == 2) {
                $t = "Pasaporte";
            } elseif ($datos['tip_ide'] == 3) {
                $t = "C.E";
            } else {
                $t = "NIT";
            }

            $response .=
                "<td height='60' colspan='2' class='balnco'>Visto bueno Abogado / Asesor
Jurídico :<br><br><br><br>______________________<br>$datos[nombre]<br>$t " .
                number_format($datos['num_ide'], 0, ',', '.') .
                "</td></tr>";
            $fila++;
        }
        
        
        echo $response;
    }
    // consultar evaluadores de viabilidad para reporte pdf
    public function CargarEvaluadoresViaRp($pro)
    {
        $response = "";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT usuariosxpropuesta_via.*,usuarios.* FROM `usuariosxpropuesta_via`,usuarios WHERE usuariosxpropuesta_via.id_usuario=usuarios.cod and usuariosxpropuesta_via.id_propuesta=$pro GROUP by usuariosxpropuesta_via.id_usuario"
        );
        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tip_ide'] == 1) {
                $t = "C.C";
            } elseif ($datos['tip_ide'] == 2) {
                $t = "Pasaporte";
            } elseif ($datos['tip_ide'] == 3) {
                $t = "C.E";
            } else {
                $t = "NIT";
            }

            $response .=
                "<tr><td height='60' colspan='4' align='center'>Evaluador de viabilidad<br><br><br><br><br><br>______________________<br>$datos[nombre]<br>$t " .
                number_format($datos['num_ide'], 0, ',', '.') ."</td></tr>";
            $fila++;
        }
        if ($fila == 1) {
            $response = "<span style='color:red;'>No hay evaluadores asignados</span><br>";
        }

        echo $response . "</div>";
    }
    
     public function CargarEvaluadoresViaRp2($pro)
    {
        $response = "";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT usuariosxpropuesta_via.*,usuarios.* FROM `usuariosxpropuesta_via`,usuarios WHERE usuariosxpropuesta_via.id_usuario=usuarios.cod and usuariosxpropuesta_via.id_usuario=".$_COOKIE['user_code']." and usuariosxpropuesta_via.id_propuesta=$pro GROUP by usuariosxpropuesta_via.id_usuario"
        );
        //echo "SELECT usuariosxpropuesta_via.*,usuarios.* FROM `usuariosxpropuesta_via`,usuarios WHERE usuariosxpropuesta_via.id_usuario=usuarios.cod and usuariosxpropuesta_via.id_usuario=".$_COOKIE['user_code']." and usuariosxpropuesta_via.id_propuesta=$pro GROUP by usuariosxpropuesta_via.id_usuario";
        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tip_ide'] == 1) {
                $t = "C.C";
            } elseif ($datos['tip_ide'] == 2) {
                $t = "Pasaporte";
            } elseif ($datos['tip_ide'] == 3) {
                $t = "C.E";
            } else {
                $t = "NIT";
            }

           $response .=
                "<tr><td height='60' colspan='4' align='center'>Evaluador de viabilidad<br><br><br><br><br><br>______________________<br>$datos[nombre]<br>$t " .
                number_format($datos['num_ide'], 0, ',', '.') ."</td></tr>";
            $fila++;
        }
        if ($fila == 1) {
            $response = "<span style='color:red;'>No hay evaluadores asignados</span><br>";
        }

        echo $response . "</div>";
    }
    
     public function CargarEvaluadoresViaRp2_ind($pro,$usu)
    {
        $response = "";

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT usuariosxpropuesta_via.*,usuarios.* FROM `usuariosxpropuesta_via`,usuarios WHERE usuariosxpropuesta_via.id_usuario=usuarios.cod and usuariosxpropuesta_via.id_usuario=$usu and usuariosxpropuesta_via.id_propuesta=$pro GROUP by usuariosxpropuesta_via.id_usuario"
        );
        //echo  "SELECT usuariosxpropuesta_via.*,usuarios.* FROM `usuariosxpropuesta_via`,usuarios WHERE usuariosxpropuesta_via.id_usuario=usuarios.cod and usuariosxpropuesta_via.id_usuario=$usu and usuariosxpropuesta_via.id_propuesta=$pro GROUP by usuariosxpropuesta_via.id_usuario";
        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tip_ide'] == 1) {
                $t = "C.C";
            } elseif ($datos['tip_ide'] == 2) {
                $t = "Pasaporte";
            } elseif ($datos['tip_ide'] == 3) {
                $t = "C.E";
            } else {
                $t = "NIT";
            }

            $response .=
                "<tr><td height='60' colspan='4' align='center'>Evaluador de viabilidad<br><br><br><br><br><br>______________________<br>$datos[nombre]<br>$t " .
                number_format($datos['num_ide'], 0, ',', '.') ."</td></tr>";
            $fila++;
        }
        if ($fila == 1) {
            $response = "<span style='color:red;'>No hay evaluadores asignados</span><br>";
        }

        echo $response . "</div>";
    }
    
    // consultar calificacion de requisitos de elegibilidad de un proyecto
    public function ArrayCalifEle($pro)
    {
        $response = [];

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT calificacion_elegibilidad.*,usuarios.nombre FROM calificacion_elegibilidad,usuarios where calificacion_elegibilidad.usuario=usuarios.cod and calificacion_elegibilidad.id_propuesta=$pro"
        );

        while ($datos = mysqli_fetch_array($consulta)) {
            $response[] = $datos;
        }

        return $response;
    }
    
    public function ArrayCalifCau($pro)
    {
        $response = [];

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT calificacion_causales.*,usuarios.nombre,rol.nombre as nrol FROM calificacion_causales,usuarios,rol where calificacion_causales.usuario=usuarios.cod and usuarios.rol=rol.cod and calificacion_causales.id_propuesta=$pro"
        );
//echo        "SELECT calificacion_causales.*,usuarios.nombre,rol.nombre as nrol FROM calificacion_causales,usuarios,rol where calificacion_causales.usuario=usuarios.cod and usuarios.rol=rol.cod and calificacion_causales.id_propuesta=$pro"; 
        while ($datos = mysqli_fetch_array($consulta)) {
            $response[] = $datos;
        }

        return $response;
    }    
    
    
    // consultar calificacion de subsanacion de un proyecto
    public function ArraySubEle($pro)
    {
        $response = [];

        $consulta = mysqli_query($this->conexion, "SELECT * FROM `subsanaciones` where id_pro=$pro");
        while ($datos = mysqli_fetch_array($consulta)) {
            $response[] = $datos;
        }
        return $response;
    }
    // consultar calificacion de requisitos de viabilidad de un proyecto
    public function ArrayCalifVia($pro)
    {
        $response = [];

        $consulta = mysqli_query($this->conexion, "SELECT calificacion_viabilidad.*,usuarios.nombre FROM calificacion_viabilidad,usuarios where calificacion_viabilidad.usuario=usuarios.cod and usuarios.cod=".$_COOKIE['user_code']." and calificacion_viabilidad.id_propuesta=$pro");

        while ($datos = mysqli_fetch_array($consulta)) {
            $response[] = $datos;
        }

        return $response;
    }
    // consultar calificacion de requisitos adicionales de un proyecto
    public function ArrayCalifAdi($pro)
    {
        $response = [];

        $consulta = mysqli_query($this->conexion, "SELECT calificacion_adicional.*,usuarios.nombre FROM calificacion_adicional,usuarios where calificacion_adicional.usuario=usuarios.cod and usuarios.cod=".$_COOKIE['user_code']." and calificacion_adicional.id_propuesta=$pro");

        while ($datos = mysqli_fetch_array($consulta)) {
            $response[] = $datos;
        }

        return $response;
    }
    
     public function ArrayCalifVia_ind($pro,$usu)
    {
        $response = [];

        $consulta = mysqli_query($this->conexion, "SELECT calificacion_viabilidad.*,usuarios.nombre FROM calificacion_viabilidad,usuarios where calificacion_viabilidad.usuario=usuarios.cod and usuarios.cod=$usu and calificacion_viabilidad.id_propuesta=$pro");

        while ($datos = mysqli_fetch_array($consulta)) {
            $response[] = $datos;
        }

        return $response;
    }
    // consultar calificacion de requisitos adicionales de un proyecto
    public function ArrayCalifAdi_ind($pro,$usu)
    {
        $response = [];

        $consulta = mysqli_query($this->conexion, "SELECT calificacion_adicional.*,usuarios.nombre FROM calificacion_adicional,usuarios where calificacion_adicional.usuario=usuarios.cod and usuarios.cod=$usu and calificacion_adicional.id_propuesta=$pro");

        while ($datos = mysqli_fetch_array($consulta)) {
            $response[] = $datos;
        }

        return $response;
    }
    //consultar calificacion de requisito de elegibilidad
    function ConsultaCalifila($calificacion, $id)
    {
        $data = ["", "", "", "", ""];

        for ($i = 0; $i < count($calificacion); $i++) {
            if ($id == $calificacion[$i][1]) {
                $data[0] = $calificacion[$i][3];
                $data[1] = $calificacion[$i][4];
                $data[2] = $calificacion[$i][5];
                $data[3] = $calificacion[$i][6];
                $data[4] = $calificacion[$i][8];
                break;
            }
        }
        return $data;
    }
    
 function ConsultaCalifilaCausa($calificacion, $id)
    {   //calificacin,observacion,nombre usuario,fecha,rol
        $data = ["", "","","",""];

        for ($i = 0; $i < count($calificacion); $i++) {
            if ($id == $calificacion[$i][1]) {
                $data[0] = $calificacion[$i][3];
                $data[1] = $calificacion[$i][4];
                $data[2] = $calificacion[$i][7];
                $data[3] = $calificacion[$i][5];
                $data[4] = $calificacion[$i][8];
             
                break;
            }
        }
        return $data;
    }    
    // consultar calificacion de subsanacin 
    function ConsultaCalisub($calificacion, $id)
    {
        $data = "";

        for ($i = 0; $i < count($calificacion); $i++) {
            if ($id == $calificacion[$i][2]) {
                $data = $calificacion[$i][0];
                break;
            }
        }
        return $data;
    }
    // conultar calificacin de un requisito de viabilidad
    function ConsultaCalifila2($calificacion, $id)
    {
        $data = ["-", "", "", "", "A"];

        for ($i = 0; $i < count($calificacion); $i++) {
            if ($id == $calificacion[$i][1]) {
                $data[0] = $calificacion[$i][3];
                $data[1] = $calificacion[$i][4];
                $data[2] = $calificacion[$i][5];
                $data[3] = $calificacion[$i][8];
                $data[4] = $calificacion[$i][7];

                break;
            }
        }
        return $data;
    }
    // cargar vista de evaluacion de elegibilidad para gestor tecnico
    public function CargarDivevaele($cod, $pro)
    {      
         echo "<div class='col-md-12' style='margin-bottom:10px;'><button class='btn-functions' id='btn_add_sub' onclick=\"MostrarDivEvaEle('diveva')\"><i class='fas fa-sync-alt'></i>&nbsp;Actualizar</button></div>";
        	$this->CargarEvaluadoresElePro($pro);
        $calificacion = $this->ArrayCalifEle($pro);
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id group by criterios_ele.id  order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id  group by criterios_ele.id  order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
            }
        }
        ?>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th width="20%">Criterio</th><th width="35%">Requisito</th><th width="20%">Fuente de verificación</th><th width="10%">Cumple</th><th width="15%">Observación</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$contadorConceptof = 0;

while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila($calificacion, $datos['id']);
   
    echo "<td> $datos[requisito]</td><td> $datos[documento]</td><td>$califila[0]</td><td>$califila[2]</td></tr>";
    $fila++;
    if ($califila[0] == "Cumple") {
    } elseif ($califila[0] == "No cumple") {
        $contadorConceptof += 1;
    } 
    elseif ($califila[0] == "No aplica") {
        $contadorConceptof += 0;
    } 
    else {
        $contadorConceptof += 1;
    }
}
echo "<tr ><td colspan='8' style='border:0px solid #FFF;height:30px;'></td></tr>";
if ($contadorConceptof == 0) {
    echo "<tr ><td colspan='3'><b>Concepto Final</b> </td><td colspan='5'>Cumple</td></tr>";
} else {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5'>No cumple</td></tr>";
}
if ($fila == 1) {
    echo "<tr><td colspan='8' align='center'> No hay criterios</td></tr>";
}
echo "<tr ><td colspan='8' style='border:0px solid #FFF;height:30px;text-align:center;' ><div class='col-md-12' style='margin-bottom:10px;'><button class='btn-functions' id='btn_add_sub' onclick=\"MostrarDivEvaEle('diveva')\"><i class='fas fa-sync-alt'></i>&nbsp;Actualizar</button></div></td></tr>";
?>
</tbody></table>
<?php
    }
    // cargar vista de evaluacion de elegibilidad para evaluador
    public function CargarDivevaele_($cod, $pro)
    {
       	$this->CargarEvaluadoresElePro2($pro);
        $calificacion = $this->ArrayCalifEle($pro);
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT DISTINCT(criterios_ele.id),criterios_ele.tipo,criterios_ele.requisito,criterios_ele.documento,criterios_ele.observacion,tipos_cri_ele.nombre as ncri FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and (criterios_ele.tipo>1) order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT DISTINCT(criterios_ele.id),criterios_ele.tipo,criterios_ele.requisito,criterios_ele.documento,criterios_ele.observacion,tipos_cri_ele.nombre as ncri FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and (criterios_ele.tipo>1 ) order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
            }
        }
        ?>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th  width="20%">Criterio</th><th  width="30%">Requisito</th> <th  width="20%">Fuente de verificación</th><th width="10%">Cumple</th><th  width="20%">Observación</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$contadorConceptof = 0;

while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila($calificacion, $datos['id']);
   
    echo "<td> $datos[requisito]</td><td> $datos[documento]</td><td>$califila[0]</td><td>$califila[2]</td></tr>";
    $fila++;
    if ($califila[0] == "Cumple") {
    } elseif ($califila[0] == "No cumple") {
        $contadorConceptof += 1;
    }
     elseif ($califila[0] == "No aplica") {
        $contadorConceptof += 0;
    }
    else {
        $contadorConceptof += 1;
    }
}
echo "<tr ><td colspan='8' style='border:0px solid #FFF;height:30px;'></td></tr>";
if ($contadorConceptof == 0) {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5'>Cumple</td></tr>";
} else {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5'>No cumple</td></tr>";
}
if ($fila == 1) {
    echo "<tr><td colspan='8' align='center'> No hay criterios</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar vista de evaluacion de elegibilidad para asesor juridico
    public function CargarDivevaele_Jur($cod, $pro)
    {
        $this->CargarEvaluadoresElePro2($pro);
        $calificacion = $this->ArrayCalifEle($pro);
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id  and criterios_ele.tipo=1  group by criterios_ele.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id  and criterios_ele.tipo=1   group by criterios_ele.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
            }
        }
        ?>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th  width="20%">Criterio</th><th  width="30%">Requisito</th> <th  width="20%">Fuente de verificación</th><th width="10%">Cumple</th><th  width="20%">Observación</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$contadorConceptof = 0;

while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila($calificacion, $datos['id']);
   
    echo "<td> $datos[requisito]</td><td> $datos[documento]</td><td>$califila[0]</td><td>$califila[2]</td></tr>";
    $fila++;
    if ($califila[0] == "Cumple") {
    } elseif ($califila[0] == "No cumple") {
        $contadorConceptof += 1;
    }
    elseif ($califila[0] == "No aplica") {
        $contadorConceptof += 0;
    }
    else {
        $contadorConceptof += 1;
    }
}
echo "<tr ><td colspan='8' style='border:0px solid #FFF;height:30px;'></td></tr>";
if ($contadorConceptof == 0) {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5'>Cumple</td></tr>";
} else {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5'>No cumple</td></tr>";
}
if ($fila == 1) {
    echo "<tr><td colspan='8' align='center'> No hay criterios</td></tr>";
}?>
</tbody></table>
<?php
    }
// cargar vista de evaluacion de viabilidad para gestor tecnico

    
    public function CargarDivevavia($cod, $pro,$mostrar,$usu)
    {
         $this->CargarEvaluadoresViaPro($pro,$cod);
       
    }
    
    
    public function CargarDivevavia_ind($cod,$pro,$usu,$nom,$fec,$ult_fec)
    {
        echo "<div class='col-md-4'  ><b>Evaluador  </b> $nom<br></div><div class='col-md-4'  ><b>Asignado : </b> $fec<br></div><div class='col-md-4'><b>Última modificación : </b>$ult_fec</div>";
        $calificacion = $this->ArrayCalifVia_ind($pro,$usu);
        $calificacion2 = $this->ArrayCalifAdi_ind($pro,$usu);
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta3 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta4 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        $pun1 = 0;
        $pun2 = 0;
        $pun3 = 0;
        $pun4 = 0;
        $pun5 = 0;
        $pun6 = 0;
        $pun7 = 0;
        $pun8 = 0;
        $pun9 = 0;
        $pun10 = 0;
        $puntajeG = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
                $pun1 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
                $pun2 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
                $pun3 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
                $pun4 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
                $pun5 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
                $pun6 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
                $pun7 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
                $pun8 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
                $pun9 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
                $pun10 += $datos['puntaje'];
            }
            $puntajeG += $datos['puntaje'];
        }
       
        ?>
<br><br>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th width="15%">Criterio</th><th width="10%">Puntaje<br>(max)</th><th width="20%">Requisito</th><th width="15%">Fuente de verificación</th><th width="10%">Puntaje<br>(max)</th><th width="10%">Puntaje alcanzado</th><th width="20%"> Concepto</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$conceptoF = 0;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count1' style='vertical-align: middle;'><b>$pun1</b></td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count2' style='vertical-align: middle;'><b>$pun2</b></td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count3' style='vertical-align: middle;'><b>$pun3</b></td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count4' style='vertical-align: middle;'><b>$pun4</b></td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count5' style='vertical-align: middle;'><b>$pun5</b></td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td><td rowspan='$count6' style='vertical-align: middle;'><b>$pun6</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count7' style='vertical-align: middle;'><b>$pun7</b></td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count8' style='vertical-align: middle;'><b>$pun8</b></td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count9' style='vertical-align: middle;'><b>$pun9</b></td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count10' style='vertical-align: middle;'><b>$pun10</b></td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila2($calificacion, $datos['id']);
   

    echo "<td  style='vertical-align: middle;'> $datos[requisito] </td><td  style='vertical-align: middle;'> $datos[observacion] </td><td style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;'>$califila[0]</td><td style='vertical-align: middle;'>$califila[1]</td></tr>";
    $fila++;
    $conceptoF += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='5' ><b>Sub Total 1</b></td><td colspan='2'>$conceptoF</td></tr>";

if ($fila == 1) {
    echo "<tr><td colspan='7' align='center'> No hay criterios</td></tr>";
}

$countadc1 = 0;
$punadc1 = 0;
$puntajeGadc = 0;
while ($datos = mysqli_fetch_array($consulta3)) {
    if ($datos['tipo'] == 1) {
        $countadc1 += 1;
        $punadc1 += $datos['puntaje'];
    }
    $puntajeGadc += $datos['puntaje'];
}
$contadoradc = 0;
$contadorsubadc = 1;
$contador1adc = 0;
$filaadc = 1;
$conceptoFadc = 0;
while ($datos = mysqli_fetch_array($consulta4)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1adc == 0) {
        $contadoradc++;
        echo "<td rowspan='$countadc1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$countadc1' style='vertical-align: middle;'><b>$punadc1</b></td>";
        $contador1adc++;
        $contadorsubadc = 1;
    }
    $califila = $this->ConsultaCalifila2($calificacion2, $datos['id']);
    
    echo "<td  style='vertical-align: middle;'> $datos[requisito]</td><td  style='vertical-align: middle;'> $datos[observacion]</td><td  style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;'>$califila[0]</td><td style='vertical-align: middle;'>$califila[1]</td></tr>";
    $filaadc++;
    $conceptoFadc += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='5'><b>Sub Total 2</b></td><td colspan='2' >$conceptoFadc</td></tr>";

$puntTotal = $conceptoF + $conceptoFadc;
if ($puntTotal > 100) {
    $puntTotal = 100;
}
$conceptoFinnal="NO VIABLE";
if ($puntTotal >= 80) {
    $conceptoFinnal="VIABLE";
}
echo "<tr style='background:#E6F5F4;'><td colspan='5' ><b>Total</b></td><td colspan='2' >$puntTotal</td></tr>";

if ($filaadc == 1) {
    echo "<tr style='display:none;'><td colspan='7' align='center'> No hay criterios de puntaje adicional</td></tr>";
}

echo "<tr ><td colspan='7' style='border:0px solid #FFF;height:10px;vertical-align:midde;'></td></tr><tr><td colspan='2'><b> Concepto Final :</b> $conceptoFinnal</td><td colspan='6'>" . $this->finalConcept3($pro,$usu) . "</td></tr>";

echo "<tr ><td colspan='7' style='border:0px solid #FFF;height:30px;'></td></tr>";?>
</tbody></table>
<?php
    
    }
    
    
    
    
    
    // cargar vista de evaluacion de viabilidad para auxiliar tecnico
    public function CargarDivevavia2($cod, $pro)
    {
        $calificacion = $this->ArrayCalifVia($pro);
        $calificacion2 = $this->ArrayCalifAdi($pro);
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta3 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta4 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        $pun1 = 0;
        $pun2 = 0;
        $pun3 = 0;
        $pun4 = 0;
        $pun5 = 0;
        $pun6 = 0;
        $pun7 = 0;
        $pun8 = 0;
        $pun9 = 0;
        $pun10 = 0;
        $puntajeG = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
                $pun1 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
                $pun2 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
                $pun3 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
                $pun4 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
                $pun5 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
                $pun6 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
                $pun7 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
                $pun8 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
                $pun9 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
                $pun10 += $datos['puntaje'];
            }
            $puntajeG += $datos['puntaje'];
        }
        ?>
<br>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th width="15%">Criterio</th><th width="10%">Puntaje<br>(max)</th><th width="20%">Requisito</th><th width="18%">Fuente de verificación</th><th width="10%">Puntaje<br>(max)</th><th width="10%">Puntaje alcanzado</th><th width="17%"> Concepto</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$conceptoF = 0;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count1' style='vertical-align: middle;'><b>$pun1</b></td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count2' style='vertical-align: middle;'><b>$pun2</b></td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count3' style='vertical-align: middle;'><b>$pun3</b></td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count4' style='vertical-align: middle;'><b>$pun4</b></td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count5' style='vertical-align: middle;'><b>$pun5</b></td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td><td rowspan='$count6' style='vertical-align: middle;'><b>$pun6</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count7' style='vertical-align: middle;'><b>$pun7</b></td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count8' style='vertical-align: middle;'><b>$pun8</b></td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count9' style='vertical-align: middle;'><b>$pun9</b></td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count10' style='vertical-align: middle;'><b>$pun10</b></td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila2($calificacion, $datos['id']);
   

    echo "<td  style='vertical-align: middle;'> $datos[requisito] </td><td  style='vertical-align: middle;'> $datos[observacion] </td><td  style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;'>$califila[0]</td><td style='vertical-align: middle;'>$califila[1]</td></tr>";
    $fila++;
    $conceptoF += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='5' ><b>Sub Total</b></td><td colspan='2'>$conceptoF</td></tr>";

if ($fila == 1) {
    echo "<tr><td colspan='7' align='center'> No hay criterios</td></tr>";
}

$countadc1 = 0;
$punadc1 = 0;
$puntajeGadc = 0;
while ($datos = mysqli_fetch_array($consulta3)) {
    if ($datos['tipo'] == 1) {
        $countadc1 += 1;
        $punadc1 += $datos['puntaje'];
    }
    $puntajeGadc += $datos['puntaje'];
}
$contadoradc = 0;
$contadorsubadc = 1;
$contador1adc = 0;
$filaadc = 1;
$conceptoFadc = 0;
while ($datos = mysqli_fetch_array($consulta4)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1adc == 0) {
        $contadoradc++;
        echo "<td rowspan='$countadc1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$countadc1' style='vertical-align: middle;'><b>$punadc1</b></td>";
        $contador1adc++;
        $contadorsubadc = 1;
    }
    $califila = $this->ConsultaCalifila2($calificacion2, $datos['id']);
    

    echo "<td  style='vertical-align: middle;'> $datos[requisito]</td><td style='vertical-align: middle;'> $datos[observacion]</td><td  style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;'>$califila[0]</td><td style='vertical-align: middle;'>$califila[1]</td></tr>";
    $filaadc++;
    $conceptoFadc += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='5'><b>Sub Total 2</b></td><td colspan='2' >$conceptoFadc</td></tr>";

$puntTotal = $conceptoF + $conceptoFadc;
if ($puntTotal > 100) {
    $puntTotal = 100;
}
$conceptoFinnal="NO VIABLE";
if ($puntTotal >= 80) {
    $conceptoFinnal="VIABLE";
}
echo "<tr style='background:#E6F5F4;'><td colspan='5' ><b>Total</b></td><td colspan='2' >$puntTotal</td></tr>";

if ($filaadc == 1) {
    echo "<tr style='display:none;'><td colspan='7' align='center'> No hay criterios de puntaje adicional</td></tr>";
}

echo "<tr ><td colspan='7' style='border:0px solid #FFF;height:10px;vertical-align:midde;'></td></tr><tr><td colspan='2'> <b>Concepto Final : </b>$conceptoFinnal</td><td colspan='6'>" . $this->finalConcept2($pro) . "</td></tr>";

echo "<tr ><td colspan='7' style='border:0px solid #FFF;height:30px;'></td></tr>";?>
</tbody></table>
<?php
    }
    // cargar vista de evaluacion de elegibilidad para auxiliar tecnico
    public function CargarDivevaele2($cod, $pro)
    {
        	$this->CargarEvaluadoresElePro($pro);
        $calificacion = $this->ArrayCalifEle($pro);
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
            }
        }
        ?>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th width="20%">Criterio</th><th width="25%">Requisito</th><th width="20%">Fuente de verificación</th><th width="10%">Cumple</th><th width="25%">Observación</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$contadorConceptof = 0;

while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila($calificacion, $datos['id']);
   
    echo "<td> $datos[requisito]</td><td> $datos[documento]</td><td>$califila[0]</td><td>$califila[2]</td></tr>";
    $fila++;
    if ($califila[0] == "Cumple") {
    } elseif ($califila[0] == "No cumple") {
        $contadorConceptof += 1;
    } 
    elseif ($califila[0] == "No aplica") {
        $contadorConceptof += 0;
    }
    else {
        $contadorConceptof += 1;
    }
}
echo "<tr ><td colspan='8' style='border:0px solid #FFF;height:30px;'></td></tr>";
if ($contadorConceptof == 0) {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5'>Cumple</td></tr>";
} else {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5'>No cumple</td></tr>";
}
if ($fila == 1) {
    echo "<tr><td colspan='8' align='center'> No hay criterios</td></tr>";
}?>
</tbody></table>
<?php
    }
    // cargar vista de evaluacion de elegibilidad para colombia productiva
    public function CargarDivevaeleRp($cod, $pro)
    {
        //$this->CargarEvaluadoresElePro($pro);
        $calificacion = $this->ArrayCalifEle($pro);
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
            }
        }
        ?>

<table  width="100%"><thead style="background:#f8f9fa;"><tr><th width="20%">Criterio</th><th width="40%">Requisito</th><th width="10%">Cumplimiento</th><th width="30%">Observaciónes</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$contadorConceptof = 0;

while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila($calificacion, $datos['id']);
   
    echo "<td> $datos[requisito] </td><td class='balnco'>$califila[0]</td><td>$califila[2]</td></tr>";
    $fila++;
    if ($califila[0] == "Cumple") {
    } elseif ($califila[0] == "No cumple") {
        $contadorConceptof += 1;
    } 
    elseif ($califila[0] == "No aplica") {
        $contadorConceptof += 0;
    }
    else {
        $contadorConceptof += 1;
    }
}
echo "<tr><td colspan='4' class='espacio2'></td></td></tr>";
if ($contadorConceptof == 0) {
    echo "<tr ><td colspan='2'><b>Concepto Final</b></td><td colspan='2' class='balnco'>Cumple</td></tr>";
    $this->mensaje = "Cumple";
} else {
    echo "<tr ><td colspan='2'><b>Concepto Final</b></td><td colspan='2' class='balnco'>No cumple</td></tr>";
    $this->mensaje = "No Cumple";
}
if ($fila == 1) {
    echo "<tr><td colspan='4' align='center'> No hay criterios</td></tr>";
}?>
</tbody></table>
<?php
    }
// cargar vista de evaluacion viabilidad para colombia productiva
    public function CargarDivevaviaRp($cod, $pro)
    {
        $calificacion = $this->ArrayCalifVia($pro);
        $calificacion2 = $this->ArrayCalifAdi($pro);
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta3 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta4 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        $pun1 = 0;
        $pun2 = 0;
        $pun3 = 0;
        $pun4 = 0;
        $pun5 = 0;
        $pun6 = 0;
        $pun7 = 0;
        $pun8 = 0;
        $pun9 = 0;
        $pun10 = 0;
        $puntajeG = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
                $pun1 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
                $pun2 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
                $pun3 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
                $pun4 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
                $pun5 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
                $pun6 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
                $pun7 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
                $pun8 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
                $pun9 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
                $pun10 += $datos['puntaje'];
            }
            $puntajeG += $datos['puntaje'];
        }
        ?>
<br>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th width="15%">Criterio</th><th width="10%">Puntaje<br>(max)</th><th width="20%">Requisito</th><th width="15%">Fuente de verificación</th><th width="10%">Puntaje<br>(max)</th><th width="10%">Puntaje alcanzado</th><th width="15%"> Concepto</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$conceptoF = 0;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count1' style='vertical-align: middle;'><b>$pun1</b></td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count2' style='vertical-align: middle;'><b>$pun2</b></td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count3' style='vertical-align: middle;'><b>$pun3</b></td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count4' style='vertical-align: middle;'><b>$pun4</b></td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count5' style='vertical-align: middle;'><b>$pun5</b></td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td><td rowspan='$count6' style='vertical-align: middle;'><b>$pun6</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count7' style='vertical-align: middle;'><b>$pun7</b></td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count8' style='vertical-align: middle;'><b>$pun8</b></td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count9' style='vertical-align: middle;'><b>$pun9</b></td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count10' style='vertical-align: middle;'><b>$pun10</b></td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila2($calificacion, $datos['id']);
   

    echo "<td  style='vertical-align: middle;'> $datos[requisito]</td> <td  style='vertical-align: middle;'> $datos[observacion]</td><td  style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;' class='balnco'>$califila[0]</td><td style='vertical-align: middle;'>$califila[1]</td></tr>";
    $fila++;
    $conceptoF += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='5' class='balnco'><b>Sub Total</b></td><td colspan='2' class='balnco'>$conceptoF</td></tr>";

if ($fila == 1) {
    echo "<tr><td colspan='7' align='center'> No hay criterios</td></tr>";
}

$countadc1 = 0;
$punadc1 = 0;
$puntajeGadc = 0;
while ($datos = mysqli_fetch_array($consulta3)) {
    if ($datos['tipo'] == 1) {
        $countadc1 += 1;
        $punadc1 += $datos['puntaje'];
    }
    $puntajeGadc += $datos['puntaje'];
}
$contadoradc = 0;
$contadorsubadc = 1;
$contador1adc = 0;
$filaadc = 1;
$conceptoFadc = 0;
while ($datos = mysqli_fetch_array($consulta4)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1adc == 0) {
        $contadoradc++;
        echo "<td rowspan='$countadc1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$countadc1' style='vertical-align: middle;'><b>$punadc1</b></td>";
        $contador1adc++;
        $contadorsubadc = 1;
    }
    $califila = $this->ConsultaCalifila2($calificacion2, $datos['id']);
    $ayuda = "";
    if ($datos['observacion'] != "" || $datos['observacion'] != null) {
        $ayuda = "<i class=\"fa fa-question-circle\" style=\"cursor:help;\" onmouseover=\"$('#helpadc$filaadc').css('display','block')\" onmouseout=\"$('#helpadc$filaadc').css('display','none')\"></i>
  <span class='tooltiptext2' id='helpadc$filaadc'>$datos[observacion]</span>";
    } else {
        $ayuda = "";
    }

    echo "<td width='25%' style='vertical-align: middle;'> $datos[requisito] $ayuda</td><td width='6%' style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;' class='balnco'>$califila[0]</td><td style='vertical-align: middle;'>$califila[1]</td></tr>";
    $filaadc++;
    $conceptoFadc += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='5' class='balnco'><b>Sub Total 2</b></td><td colspan='2' class='balnco'>$conceptoFadc</td></tr>";

$puntTotal = $conceptoF + $conceptoFadc;
if ($puntTotal > 100) {
    $puntTotal = 100;
}
$conceptoFinnal="NO VIABLE";
if ($puntTotal >= 80) {
    $conceptoFinnal="VIABLE";
}
echo "<tr style='background:#E6F5F4;'><td colspan='5' class='balnco'><b>Total</b></td><td colspan='2' class='balnco'>$puntTotal</td></tr>";
$this->mensaje = $conceptoFinnal;
if ($filaadc == 1) {
    echo "<tr style='display:none;'><td colspan='7' align='center'> No hay criterios de puntaje adicional</td></tr>";
}

echo "<tr ><td colspan='7' class='espacio'></td></tr><tr><td colspan='2' style='vertical-align:midde;'> <b>Concepto Final : </b>$conceptoFinnal</td><td colspan='5'>" . $this->finalConcept2($pro) . "</td></tr>";

echo "<tr ><td colspan='7' class='espacio'></td></tr>";?>
</tbody></table>
<?php
    }

 public function CargarDivevaviaRp_ind($cod, $pro,$usu)
    {
        $calificacion = $this->ArrayCalifVia_ind($pro,$usu);
        $calificacion2 = $this->ArrayCalifAdi_ind($pro,$usu);
        $nombre = "";
        $row = 0;
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta3 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta4 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        $pun1 = 0;
        $pun2 = 0;
        $pun3 = 0;
        $pun4 = 0;
        $pun5 = 0;
        $pun6 = 0;
        $pun7 = 0;
        $pun8 = 0;
        $pun9 = 0;
        $pun10 = 0;
        $puntajeG = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
                $pun1 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
                $pun2 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
                $pun3 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
                $pun4 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
                $pun5 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
                $pun6 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
                $pun7 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
                $pun8 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
                $pun9 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
                $pun10 += $datos['puntaje'];
            }
            $puntajeG += $datos['puntaje'];
        }
        ?>
<br>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th width="25%">Criterio</th><th width="10%">Puntaje<br>(max)</th><th width="20%">Requisito</th><th width="10%">Puntaje<br>(max)</th><th width="10%">Puntaje alcanzado</th><th width="20%"> Concepto</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$conceptoF = 0;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count1' style='vertical-align: middle;'><b>$pun1</b></td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count2' style='vertical-align: middle;'><b>$pun2</b></td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count3' style='vertical-align: middle;'><b>$pun3</b></td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count4' style='vertical-align: middle;'><b>$pun4</b></td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count5' style='vertical-align: middle;'><b>$pun5</b></td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td><td rowspan='$count6' style='vertical-align: middle;'><b>$pun6</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count7' style='vertical-align: middle;'><b>$pun7</b></td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count8' style='vertical-align: middle;'><b>$pun8</b></td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count9' style='vertical-align: middle;'><b>$pun9</b></td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count10' style='vertical-align: middle;'><b>$pun10</b></td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila2($calificacion, $datos['id']);
    $ayuda = "";
    if ($datos['observacion'] != "" || $datos['observacion'] != null) {
        $ayuda = "<i class=\"fa fa-question-circle\" style=\"cursor:help;\" onmouseover=\"$('#help$fila').css('display','block')\" onmouseout=\"$('#help$fila').css('display','none')\"></i>
  <span class='tooltiptext2' id='help$fila'>$datos[observacion]</span>";
    } else {
        $ayuda = "";
    }

    echo "<td width='25%' style='vertical-align: middle;'> $datos[requisito] $ayuda</td><td width='6%' style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;' class='balnco'>$califila[0]</td><td style='vertical-align: middle;'>$califila[1]</td></tr>";
    $fila++;
    $conceptoF += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='4' class='balnco'><b>Sub Total</b></td><td colspan='3' class='balnco'>$conceptoF</td></tr>";

if ($fila == 1) {
    echo "<tr><td colspan='7' align='center'> No hay criterios</td></tr>";
}

$countadc1 = 0;
$punadc1 = 0;
$puntajeGadc = 0;
while ($datos = mysqli_fetch_array($consulta3)) {
    if ($datos['tipo'] == 1) {
        $countadc1 += 1;
        $punadc1 += $datos['puntaje'];
    }
    $puntajeGadc += $datos['puntaje'];
}
$contadoradc = 0;
$contadorsubadc = 1;
$contador1adc = 0;
$filaadc = 1;
$conceptoFadc = 0;
while ($datos = mysqli_fetch_array($consulta4)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1adc == 0) {
        $contadoradc++;
        echo "<td rowspan='$countadc1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$countadc1' style='vertical-align: middle;'><b>$punadc1</b></td>";
        $contador1adc++;
        $contadorsubadc = 1;
    }
    $califila = $this->ConsultaCalifila2($calificacion2, $datos['id']);
   

    echo "<td width='25%' style='vertical-align: middle;'> $datos[requisito] </td><td width='6%' style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;' class='balnco'>$califila[0]</td><td style='vertical-align: middle;'>$califila[1]</td></tr>";
    $filaadc++;
    $conceptoFadc += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='4' class='balnco'><b>Sub Total 2</b></td><td colspan='3' class='balnco'>$conceptoFadc</td></tr>";

$puntTotal = $conceptoF + $conceptoFadc;
if ($puntTotal > 100) {
    $puntTotal = 100;
}
$conceptoFinnal="NO VIABLE";
if ($puntTotal >= 80) {
    $conceptoFinnal="VIABLE";
}
echo "<tr style='background:#E6F5F4;'><td colspan='4' class='balnco'><b>Total</b></td><td colspan='3' class='balnco'>$puntTotal</td></tr>";
$this->mensaje = $conceptoFinnal;

echo "<tr ><td colspan='4' class='balnco'><b>Resultado Final</b></td><td colspan='3' class='balnco' >$conceptoFinnal</td></tr>";
echo "<tr ><td colspan='7' class='espacio'></td></tr><tr><td colspan='2' style='vertical-align:midde;'> <b>Concepto Final del evaluador: </b></td><td colspan='4'>" . $this->finalConcept3($pro,$usu) . "</td></tr>";

echo "<tr ><td colspan='7' class='espacio3'></td></tr>";?>
</tbody></table>
<?php
    }


    //cargar vizualizacion de evaluacion del proyecto por el usuario  gestor tecnico
    public function CargarDivevaeleusu($cod, $pro)
    {     
        $this->CargarEvaluadoresElePro2($pro);
        //se consultan las calificaciones del proyecto
        $calificacion = $this->ArrayCalifEle($pro);
        $Subsanac = $this->ArraySubEle($pro);
        $nombre = "";
        $row = 0;
        //se consultan los los criterios
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT DISTINCT(criterios_ele.id),criterios_ele.tipo,criterios_ele.requisito,criterios_ele.documento,criterios_ele.observacion,tipos_cri_ele.nombre as ncri FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.tipo>1 order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT DISTINCT(criterios_ele.id),criterios_ele.tipo,criterios_ele.requisito,criterios_ele.documento,criterios_ele.observacion,tipos_cri_ele.nombre as ncri FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.tipo>1 order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele, se cuentan los criterios para poder definir el rowspan segun la cantidad de requisitos por criterios
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
            }
        }
        ?>
<br>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th width="15%">Criterio</th><th width="25%">Requisito</th><th width="20%">Fuente de verificación</th><th width="10%">Cumple</th><th width="10%">Subsanar</th> <th width="20%">Observación</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$check = "";
$contadorConceptof = 0;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila($calificacion, $datos['id']);
    $calisub = $this->ConsultaCalisub($Subsanac, $datos['id']);

    if ($califila[0] == "Cumple") {
        // onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo])\"
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' checked  onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo],'No cumple')\" style='margin-left:17px;'>";
    } else if ($califila[0] == "No cumple") {
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' checked onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo],'No Cumple')\" style='margin-left:17px;'>";
        $contadorConceptof += 1;
    }
   /** else if ($califila[0] == "No aplica") {
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo],'No cumple')\" style='margin-left:17px;'><br><label for='Noa'>No aplica</label>&nbsp;<input type='radio' id='check_noa_$fila' name='gender$fila' value='No' checked onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo],'No aplica')\" style='margin-left:22px;'>";
    }**/
    else {
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo],'No cumple')\" style='margin-left:17px;'>";
        $contadorConceptof += 1;
    }

    if ($califila[1] == "--" || $califila[1] == "" || $califila[1] == null) {
        $detalle = $datos['requisito'];
    } else {
        $detalle = $califila[1];
    }
    if ($calisub == "") {
        $checksub = "<div class='custom-control custom-switch' 

style='text-align:center;'><input type='checkbox' class='custom-control-input' id='switchsub$fila' ><label class='custom-control-label' for='switchsubsana$fila' onclick=

\"NuevaSubsanacion($fila,$datos[id],$datos[tipo])\"></label></div>";
    } else {
        $checksub = "<div class='custom-control custom-switch' style='text-

align:center;'><input type='checkbox' checked class='custom-control-input' id='switchsub$fila' ><label class='custom-control-label' for='switchsubsana$fila' 

onclick='EliminarSubsanar($calisub)'></label></div>";
    }
    
    echo "<td style='vertical-align: middle;'> $datos[requisito]</td><td style='vertical-align: middle;'> $datos[documento]</td><td id='chequeo$fila' style='vertical-align: middle;text-align:center;' align='center'>$check</td><td align='center' style='vertical-align: middle;text-align:center;'>$checksub &nbsp;<span id='loadsubsave$fila'></span></td><td style='vertical-align: middle;'><textarea row='10' cols='20'  id='Observacion$fila' style='font-size:12px;border-radius:5px;border:1px solid #CCC;width:100%;height:100px;' onkeyup=\"GuardarAldejardEsc($pro,$datos[id],'$fila',$datos[tipo])\" >$califila[2]</textarea></td></tr>";
    $fila++;
}

$tot = "";
echo "<tr ><td colspan='8' style='border:0px solid #FFF;height:30px;'></td></tr>";
if ($contadorConceptof == 0) {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5'id='concepto_final'>Cumple</td></tr>";
    $tot = "Cumple";
} else {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5' id='concepto_final'>No cumple</td></tr>";
    $tot = "No cumple";
}
echo "<tr ><td colspan='8' style='border:0px solid #FFF;height:30px;'></td></tr>";
echo "<tr ><td colspan='8' align='center'><button class='btn-functions' onclick=\"FcalificarElegibilidadUser($pro,'$tot')\" style='margin-left:40%;'><i class='fas fa-check-square'></i>&nbsp;Finalizar evaluación &nbsp; <span id='load'></span></button></td>
</tr>";
//echo "<tr ><td colspan='8' style='align='center''>".$this->VerificarTerminoAjur($pro)."</td></tr>";
if ($fila == 1) {
    echo "<tr><td colspan='8' align='center'> No hay criterios</td></tr>";
}
?>
</tbody></table>
<div class="row"><div class="col-md-12"  style="padding:0 10px;">
	<?php $this->CargarDivsubusu($pro); ?>
</div></div>
<?php
    }
// //////
 
 
////////////////////////
public function EvaluarCausales($pro)
    {     
        
        $calificacion = $this->ArrayCalifCau($pro);
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT * FROM causales"
        );
       
        ?>
<br>
<button class="btn-functions" id="btn_add_sub" onclick=" listevaluarcausales(<?php echo $pro;?>) "><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
<table class="table table-bordered" id="tblcausales"><thead style="background:#f8f9fa;"><tr><th width="30%"
    >Causal de rechazo</th><th width="15%">¿Incurre en causal?</th><th width="25%">Observación</th><th width="17%">Usuario que calificó</th><th width="13%">Fecha</th></tr></thead><tbody id="bd-list-convos">
<?php

$fila = 1;
$check = "";
$contadorConceptof = 0;
while ($datos = mysqli_fetch_array($consulta)) {
    if($datos['id']==4){ $disabled="disabled";}
    else{$disabled="";
        
    }
    echo "<tr>";
   $califila = $this->ConsultaCalifilaCausa($calificacion, $datos['id']);
    if ($califila[0] == "Cumple") {
        $check = "<label for='Si'>No incurre</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' checked  onclick=\"calificarCausalUser($pro,$datos[id],'$fila','Cumple')\" style='margin-left:22px;' $disabled><br><label for='No'>Incurre</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No'$disabled  onclick=\"calificarCausalUser($pro,$datos[id],'$fila','No cumple')\" style='margin-left:37px;'><br><label for='Noa'>No aplica</label>&nbsp;<input type='radio' id='check_noa_$fila' $disabled  name='gender$fila' value='No' onclick=\"calificarCausalUser($pro,$datos[id],'$fila','No aplica')\" style='margin-left:24px;'>";
    } else if ($califila[0] == "No cumple") {
        $check = "<label for='Si'>No incurre</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarCausalUser($pro,$datos[id],'$fila','Cumple')\" style='margin-left:22px;' $disabled><br><label for='No'>Incurre</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' $disabled checked onclick=\"calificarCausalUser($pro,$datos[id],'$fila','No Cumple')\" style='margin-left:37px;'><br><label for='Noa'>No aplica</label>&nbsp;<input type='radio' id='check_noa_$fila' $disabled  name='gender$fila' value='No'  onclick=\"calificarCausalUser($pro,$datos[id],'$fila','No aplica')\" style='margin-left:24px;'>";
        $contadorConceptof += 1;
    }
    else if ($califila[0] == "No aplica") {
        $check = "<label for='Si'>No incurre</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarCausalUser($pro,$datos[id],'$fila','Cumple')\" style='margin-left:22px;' $disabled><br><label for='No'>Incurre</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' $disabled onclick=\"calificarCausalUser($pro,$datos[id],'$fila','No cumple')\" style='margin-left:37px;'><br><label for='Noa'>No aplica</label>&nbsp;<input type='radio' id='check_noa_$fila' $disabled name='gender$fila' value='No' checked onclick=\"calificarCausalUser($pro,$datos[id],'$fila','No aplica')\" style='margin-left:24px;'>";
    }
    else {
        $check = "<label for='Si'>No incurre</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarCausalUser($pro,$datos[id],'$fila','Cumple')\" style='margin-left:22px;' $disabled><br><label for='No'>Incurre</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' $disabled onclick=\"calificarCausalUser($pro,$datos[id],'$fila','No cumple')\" style='margin-left:37px;'><br><label for='Noa'>No aplica</label>&nbsp;<input type='radio' id='check_noa_$fila' $disabled name='gender$fila' value='No'  onclick=\"calificarCausalUser($pro,$datos[id],'$fila','No aplica')\" style='margin-left:24px;'>";
       
    }

    
    echo "<td style='vertical-align: middle;'> $datos[causa]</td><td id='chequeo$fila' style='vertical-align: middle;text-align:center;' align='center'>$check</td><td style='vertical-align: middle;'><textarea row='10' cols='20'  id='Observacion$fila' style='font-size:12px;border-radius:5px;border:1px solid #CCC;width:100%;height:100px;' $disabled onkeyup=\"GuardarAldejardEscCausal($pro,$datos[id],'$fila')\" >$califila[1]</textarea></td><td>$califila[2] - $califila[4]</td><td>".$this->FormatDate2($califila[3])."</td></tr>";
    $fila++;
}

$tot = "";
echo "<tr ><td colspan='5' style='border:0px solid #FFF;height:30px;'></td></tr>";
if ($contadorConceptof == 0) {
    echo "<tr style='background-color:#A0FB92;'><td ><b>Concepto Final</b></td><td id='concepto_final' colspan='4'>No incurre en causales de rechazo</td></tr><tr ><td  colspan='5'><button class='btn-functions' id='btn_add_sub' onclick='listevaluarcausales($pro)'><i class='fas fa-sync-alt'></i>&nbsp;Actualizar</button></td></tr>";
    $tot = "No incurre";
} else {
    echo "<tr style='background-color:#F7CEC5;;'><td ><b>Concepto Final</b></td><td  id='concepto_final' colspan='4'>Incurre en $contadorConceptof causales de rechazo</td></tr><tr><td colspan='5' align='center'> <button class='btn-functions' id='btn_add_sub' onclick='listevaluarcausales($pro)'><i class='fas fa-sync-alt'></i>&nbsp;Actualizar</button></td></tr>";
    $tot = "Incurre";
}
echo "<tr ><td colspan='5' style='border:0px solid #FFF;height:30px;'></td></tr>";

if ($fila == 1) {
    echo "<tr><td colspan='5' align='center'> No hay causales</td></tr>";
}
?>
</tbody></table>
<?php
    }


public function EvaluarCausalesView($pro)
    {     
        
        $calificacion = $this->ArrayCalifCau($pro);
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT * FROM causales"
        );
       
        ?>
<br>
<button class="btn-functions" id="btn_add_sub" onclick=" listevaluarcausales2(<?php echo $pro;?>) "><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
<table class="table table-bordered" id="tblcausales"><thead style="background:#f8f9fa;"><tr><th width="30%"
    >¿Incurre en causal?</th><th width="15%">¿Incurre en causal?</th><th width="25%">Observación</th><th width="17%">Usuario que calificó</th><th width="13%">Fecha</th></tr></thead><tbody id="bd-list-convos">
<?php

$fila = 1;
$check = "";
$contadorConceptof = 0;
$datamostrar="";
while ($datos = mysqli_fetch_array($consulta)) {
   
    echo "<tr>";
   $califila = $this->ConsultaCalifilaCausa($calificacion, $datos['id']);
   if ($califila[0] == "Cumple") {
         $contadorConceptof += 0;
         $datamostrar="No incurre";
    } else if ($califila[0] == "No cumple") {
        $datamostrar="Incurre";
        $contadorConceptof += 1;
    }
    else if ($califila[0] == "No aplica") {
        $contadorConceptof += 0;
        $datamostrar="No aplica";
    }
    else {
     $datamostrar="";
      
    }
    
    echo "<td style='vertical-align: middle;'> $datos[causa]</td><td id='chequeo$fila'>$datamostrar</td><td style='vertical-align: middle;'>$califila[1]</td><td>$califila[2] - $califila[4]</td><td>".$this->FormatDate2($califila[3])."</td></tr>";
    $fila++;
}

$tot = "";
echo "<tr ><td colspan='5' style='border:0px solid #FFF;height:30px;'></td></tr>";
if ($contadorConceptof == 0) {
    echo "<tr style='background-color:#A0FB92;'><td ><b>Concepto Final</b></td><td id='concepto_final' colspan='4'>No incurre en causales de rechazo</td></tr><tr ><td  colspan='5'><button class='btn-functions' id='btn_add_sub' onclick='listevaluarcausales2($pro)'><i class='fas fa-sync-alt'></i>&nbsp;Actualizar</button></td></tr>";
    $tot = "No incurre";
} else {
    echo "<tr style='background-color:#F7CEC5;;'><td ><b>Concepto Final</b></td><td  id='concepto_final' colspan='4'>Incurre en $contadorConceptof causales de rechazo</td></tr><tr><td colspan='5' align='center'> <button class='btn-functions' id='btn_add_sub' onclick='listevaluarcausales2($pro)'><i class='fas fa-sync-alt'></i>&nbsp;Actualizar</button></td></tr>";
    $tot = "Incurre";
}
echo "<tr ><td colspan='5' style='border:0px solid #FFF;height:30px;'></td></tr>";

if ($fila == 1) {
    echo "<tr><td colspan='5' align='center'> No hay causales</td></tr>";
}
?>
</tbody></table>
<?php
    }
        
    
    
    
    
// cargar datos para la evaluacion del proyecto del asesor juridico
    public function CargarDivevaeleusuJur($cod, $pro)
    {   
        $this->CargarEvaluadoresElePro2($pro);
        //consultar calificaciones y subsanaciones
        $calificacion = $this->ArrayCalifEle($pro);
        $Subsanac = $this->ArraySubEle($pro);
        $nombre = "";
        $row = 0;
        //consultar los criterios para el asesor juridico
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id  and criterios_ele.tipo=1  group by criterios_ele.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_ele.*,tipos_cri_ele.nombre as ncri,convocatoria.nombre FROM `criterios_ele`,tipos_cri_ele,convocatoria WHERE criterios_ele.tipo=tipos_cri_ele.cod and criterios_ele.id_convocatoria=$cod and criterios_ele.id_convocatoria=convocatoria.id  and criterios_ele.tipo=1   group by criterios_ele.id order by tipo"
        );
        //coincidir con codigos de tipo de criterios tabla tipo_cri_ele
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
            }
        }
        ?>
<br>

<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th width="15%">Criterio</th><th width="25%">Requisito</th> <th width="20%">Fuente de verificación</th><th width="10%">Cumple</th><th width="10%">Subsanar</th> <th width="15%">Observación</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$check = "";
$contadorConceptof = 0;
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td>";
        $contador10++;
        $contadorsub = 1;
    }
    $califila = $this->ConsultaCalifila($calificacion, $datos['id']);
    $calisub = $this->ConsultaCalisub($Subsanac, $datos['id']);
    
    if($datos['id']==90 || $datos['id']==91){
    
 if ($califila[0] == "Cumple") {
        // onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo])\"
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' checked  onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No cumple')\" style='margin-left:17px;'><br><label for='Noa'>No aplica</label>&nbsp;<input type='radio' id='check_noa_$fila' name='gender$fila' value='No' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No aplica')\" style='margin-left:22px;'>";
    } else if ($califila[0] == "No cumple") {
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' checked onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No Cumple')\" style='margin-left:17px;'><br><label for='Noa'>No aplica</label>&nbsp;<input type='radio' id='check_noa_$fila' name='gender$fila' value='No'  onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No aplica')\" style='margin-left:22px;'>";
        $contadorConceptof += 1;
    }
    else if ($califila[0] == "No aplica") {
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No cumple')\" style='margin-left:17px;'><br><label for='Noa'>No aplica</label>&nbsp;<input type='radio' id='check_noa_$fila' name='gender$fila' value='No' checked onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No aplica')\" style='margin-left:22px;'>";
    }
    else {
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No cumple')\" style='margin-left:17px;'><br><label for='Noa'>No aplica</label>&nbsp;<input type='radio' id='check_noa_$fila' name='gender$fila' value='No'  onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No aplica')\" style='margin-left:22px;'>";
        $contadorConceptof += 1;
    }
    
    }
    
    else
    {
        
       if ($califila[0] == "Cumple") {
        // onclick=\"calificarElegibilidadUser($pro,$datos[id],'$fila',$datos[tipo])\"
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' checked  onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No cumple')\" style='margin-left:17px;'>";
    } else if ($califila[0] == "No cumple") {
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' checked onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No Cumple')\" style='margin-left:17px;'>";
        $contadorConceptof += 1;
    }
  
    else {
        $check = "<label for='Si'>Si cumple</label><input type='radio' id='check_si_$fila' name='gender$fila' value='Si' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'Cumple')\" style='margin-left:23px;'><br><label for='No'>No cumple</label>&nbsp;<input type='radio' id='check_no_$fila' name='gender$fila' value='No' onclick=\"calificarElegibilidadUserJur($pro,$datos[id],'$fila',$datos[tipo],'No cumple')\" style='margin-left:17px;'>";
        $contadorConceptof += 1;
    } 
        
        
    }
    
    
    

    if ($califila[1] == "--" || $califila[1] == "" || $califila[1] == null) {
        $detalle = $datos['requisito'];
    } else {
        $detalle = $califila[1];
    }
    if ($calisub == "") {
        $checksub = "<div class='custom-control custom-switch' 

style='text-align:center;'><input type='checkbox' class='custom-control-input' id='switchsub$fila' ><label class='custom-control-label' for='switchsubsana$fila' onclick=

\"NuevaSubsanacionJur($fila,$datos[id],$datos[tipo])\"></label></div>";
    } else {
        $checksub = "<div class='custom-control custom-switch' style='text-

align:center;'><input type='checkbox' checked class='custom-control-input' id='switchsub$fila' ><label class='custom-control-label' for='switchsubsana$fila' 

onclick='EliminarSubsanarJur($calisub)'></label></div>";
    }
   
    echo "<td style='vertical-align: middle;'> $datos[requisito] </td><td style='vertical-align: middle;'> $datos[documento] </td><td id='chequeo$fila' style='vertical-align: middle;text-align:center;' align='center'>$check</td><td align='center' style='vertical-align: middle;text-align:center;'>$checksub &nbsp; <span id='loadsubsave$fila'></span></td><td style='vertical-align: middle;'><textarea row='10' cols='20'  id='Observacion$fila' style='font-size:12px;border-radius:5px;border:1px solid #CCC;width:100%;height:100px;' onkeyup=\"GuardarAldejardEscJur($pro,$datos[id],'$fila',$datos[tipo])\" >$califila[2]</textarea></td></tr>";
    $fila++;
}
$tot = "";
echo "<tr ><td colspan='8' style='border:0px solid #FFF;height:30px;'></td></tr>";
if ($contadorConceptof == 0) {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5' id='concepto_final'>Cumple</td></tr>";
    $tot = "Cumple";
} else {
    echo "<tr ><td colspan='3'><b>Concepto Final</b></td><td colspan='5' id='concepto_final'>No cumple</td></tr>";
    $tot = "No cumple";
}
echo "<tr ><td colspan='8' style='border:0px solid #FFF;height:30px;'></td></tr>";
echo "<tr ><td colspan='7' align='center'><button class='btn-functions' onclick=\"FcalificarElegibilidadUserJur($pro,'$tot')\" style='margin-left:40%;'><i class='fas fa-check-square'></i>&nbsp;Finalizar evaluación &nbsp; <span id='load'></span></button></td></tr>";
if ($fila == 1) {
    echo "<tr><td colspan='8' align='center'> No hay criterios</td></tr>";
}
?>
</tbody></table>
<div class="row"><div class="col-md-12"  style="padding:0 10px;">
	<?php 
	// cargar subsanaciones del proyecto
	$this->CargarDivsubusuJur($pro); 
	?>
</div></div>
<?php
    }
    // cargar la evaluacion de viabilidad del usuario con los valores ya evaluados
    public function CargarDivevaviausu($cod, $pro)
    {   // cargar calificaciones en un array
        $this->CargarEvaluadoresViaPro2($pro);
        $calificacion = $this->ArrayCalifVia($pro);
        $calificacion2 = $this->ArrayCalifAdi($pro);
        $nombre = "";
        $row = 0;
        // consultar los criterios de viabilidad
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT criterios_via.*,tipos_cri_via.nombre as ncri,convocatoria.nombre FROM `criterios_via`,tipos_cri_via,convocatoria WHERE criterios_via.tipo=tipos_cri_via.cod and criterios_via.id_convocatoria=$cod and criterios_via.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta3 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        $consulta4 = mysqli_query(
            $this->conexion,
            "SELECT criterios_adi.*,tipos_cri_adi.nombre as ncri,convocatoria.nombre FROM `criterios_adi`,tipos_cri_adi,convocatoria WHERE criterios_adi.tipo=tipos_cri_adi.cod and criterios_adi.id_convocatoria=$cod and criterios_adi.id_convocatoria=convocatoria.id order by tipo"
        );
        //consultar cuantos requisitos hay calificados por criterio y  el puntaje acomulado por cada uno
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
        $count7 = 0;
        $count8 = 0;
        $count9 = 0;
        $count10 = 0;
        $pun1 = 0;
        $pun2 = 0;
        $pun3 = 0;
        $pun4 = 0;
        $pun5 = 0;
        $pun6 = 0;
        $pun7 = 0;
        $pun8 = 0;
        $pun9 = 0;
        $pun10 = 0;
        $puntajeG = 0;
        while ($datos = mysqli_fetch_array($consulta)) {
            if ($datos['tipo'] == 1) {
                $count1 += 1;
                $pun1 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 2) {
                $count2 += 1;
                $pun2 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 3) {
                $count3 += 1;
                $pun3 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 4) {
                $count4 += 1;
                $pun4 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 5) {
                $count5 += 1;
                $pun5 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 6) {
                $count6 += 1;
                $pun6 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 7) {
                $count7 += 1;
                $pun7 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 8) {
                $count8 += 1;
                $pun8 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 9) {
                $count9 += 1;
                $pun9 += $datos['puntaje'];
            }
            if ($datos['tipo'] == 10) {
                $count10 += 1;
                $pun10 += $datos['puntaje'];
            }
            $puntajeG += $datos['puntaje'];
        }
        ?>
<br>
<!-- encabezado de la tabla para mostrar y evaluar-->
<table class="table table-bordered" id="tblcriele"><thead style="background:#f8f9fa;"><tr><th width="15%">Criterio</th><th width="6%">Puntaje<br>(max)</th><th width="25%">Requisito</th><th width="15%">Fuente de verificación</th><th width="6%">Puntaje<br>(max)</th><th width="6%">Puntaje alcanzado</th><th width="7%">Calificar</th><th width="20%"> Concepto</th></tr></thead><tbody id="bd-list-convos">
<?php
$contador = 0;
$contadorsub = 1;
$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$contador7 = 0;
$contador8 = 0;
$contador9 = 0;
$contador10 = 0;
$fila = 1;
$conceptoF = 0;
// imprimir las filas con la descripcion del criterios sus requisitos y los puntajes de cada uno
while ($datos = mysqli_fetch_array($consulta2)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1 == 0) {
        $contador++;
        echo "<td rowspan='$count1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count1' style='vertical-align: middle;'><b>$pun1</b></td>";
        $contador1++;
        $contadorsub = 1;
    }

    if ($datos['tipo'] == 2 && $contador2 == 0) {
        $contador++;
        echo "<td rowspan='$count2' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count2' style='vertical-align: middle;'><b>$pun2</b></td>";
        $contador2++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 3 && $contador3 == 0) {
        $contador++;
        echo "<td rowspan='$count3' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count3' style='vertical-align: middle;'><b>$pun3</b></td>";
        $contador3++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 4 && $contador4 == 0) {
        $contador++;
        echo "<td rowspan='$count4' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count4' style='vertical-align: middle;'><b>$pun4</b></td>";
        $contador4++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 5 && $contador5 == 0) {
        $contador++;
        echo "<td rowspan='$count5' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count5' style='vertical-align: middle;'><b>$pun5</b></td>";
        $contador5++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 6 && $contador6 == 0) {
        $contador++;
        echo "<td rowspan='$count6' style='vertical-align: middle;'><b>$datos[ncri]</b></td><td rowspan='$count6' style='vertical-align: middle;'><b>$pun6</b></td>";
        $contador6++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 7 && $contador7 == 0) {
        $contador++;
        echo "<td rowspan='$count7' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count7' style='vertical-align: middle;'><b>$pun7</b></td>";
        $contador7++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 8 && $contador8 == 0) {
        $contador++;
        echo "<td rowspan='$count8' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count8' style='vertical-align: middle;'><b>$pun8</b></td>";
        $contador8++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 9 && $contador9 == 0) {
        $contador++;
        echo "<td rowspan='$count9' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count9' style='vertical-align: middle;'><b>$pun9</b></td>";
        $contador9++;
        $contadorsub = 1;
    }
    if ($datos['tipo'] == 10 && $contador10 == 0) {
        $contador++;
        echo "<td rowspan='$count10' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$count10' style='vertical-align: middle;'><b>$pun10</b></td>";
        $contador10++;
        $contadorsub = 1;
    }
    // consultar en el array la calificacion del respectivo criterio
    $califila = $this->ConsultaCalifila2($calificacion, $datos['id']);

    
    echo "<td  style='vertical-align: middle;'> $datos[requisito]</td><td  style='vertical-align: middle;'> $datos[observacion]</td><td  style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;'><input type='text' value='$califila[0]' class='form-control' style='width:60px!important;' id='califiText$fila' readonly></td><td style='vertical-align: middle;'>" .
        $this->Selectevavia($fila, $califila[4], $datos['puntaje'],$pro,$datos['id'],$datos['tipo']) .
        "</td><td style='vertical-align: middle;'><textarea row='10'   id='Observacion$fila' style='font-size:12px;border-radius:5px;border:1px solid #CCC;width:100%;height:100px;'  onkeyup=\"GuardarAldejardEsc2($pro,$datos[id],'$fila',$datos[tipo])\">$califila[1]</textarea></td></tr>";
    $fila++;
    $conceptoF += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='5' ><b>Sub Total 1</b></td><td colspan='4'>$conceptoF</td></tr>";

if ($fila == 1) {
    echo "<tr><td colspan='9' align='center'> No hay criterios</td></tr>";
}
// se repite para criterios adicionale de viabilidad
$countadc1 = 0;
$punadc1 = 0;
$puntajeGadc = 0;
while ($datos = mysqli_fetch_array($consulta3)) {
    if ($datos['tipo'] == 1) {
        $countadc1 += 1;
        $punadc1 += $datos['puntaje'];
    }
    $puntajeGadc += $datos['puntaje'];
}
$contadoradc = 0;
$contadorsubadc = 1;
$contador1adc = 0;
$filaadc = 1;
$conceptoFadc = 0;
while ($datos = mysqli_fetch_array($consulta4)) {
    echo "<tr>";
    if ($datos['tipo'] == 1 && $contador1adc == 0) {
        $contadoradc++;
        echo "<td rowspan='$countadc1' style='vertical-align: middle;'><b>$datos[ncri]</b> </td><td rowspan='$countadc1' style='vertical-align: middle;'><b>$punadc1</b></td>";
        $contador1adc++;
        $contadorsubadc = 1;
    }
    $califila = $this->ConsultaCalifila2($calificacion2, $datos['id']);
    

    echo "<td style='vertical-align: middle;'> $datos[requisito] </td><td style='vertical-align: middle;'> $datos[observacion] </td><td  style='vertical-align: middle;'> $datos[puntaje]</td> <td style='vertical-align: middle;'><input type='text' value='$califila[0]' class='form-control' style='width:60px!important;' id='califiTextadc$filaadc' readonly></td><td style='vertical-align: middle;'>" .
        $this->Selectevaviaadc($filaadc, $califila[4], $datos['puntaje'],$pro,$datos['id'],$datos['tipo']) .
        "</td><td style='vertical-align: middle;'><textarea row='10' cols='20'  id='Observacionadc$filaadc' style='font-size:12px;border-radius:5px;border:1px solid #CCC;width:100%;height:100px;' onkeyup=\"GuardarAldejardEsc22($pro,$datos[id],'$filaadc',$datos[tipo])\" >$califila[1]</textarea></td></tr>";
    $filaadc++;
    $conceptoFadc += $califila[0];
}

echo "<tr style='background:#E6F5F4;display:none;'><td colspan='5'><b>Sub Total 2</b></td><td colspan='4' >$conceptoFadc</td></tr>";
// se calcula el puntaje total
$puntTotal = $conceptoF + $conceptoFadc;
if ($puntTotal > 100) {
    $puntTotal = 100;
}
$conceptoFinnal="NO VIABLE";
if ($puntTotal >= 80) {
    $conceptoFinnal="VIABLE";
}
echo "<tr style='background:#E6F5F4;'><td colspan='5' ><b>Total</b></td><td colspan='4' >$puntTotal</td></tr>";

if ($filaadc == 1) {
    echo "<tr style='display:none;'><td colspan='9' align='center'> No hay criterios de puntaje adicional</td></tr>";
}

echo "<tr ><td colspan='9' style='border:0px solid #FFF;height:10px;vertical-align:midde;'></td></tr><tr><td colspan='2'> <b>Concepto Final : </b>$conceptoFinnal</td><td colspan='6'> <textarea id='FinalConcept' style='width:100%;height:60px;border-radius:5px;'>" .
    $this->finalConcept2($pro) .
    "</textarea></td></tr>";

echo "<tr ><td colspan='9' style='border:0px solid #FFF;height:30px;'></td></tr>";
echo "<tr ><td colspan='9' align='center'><button class='btn-functions' onclick=\"FcalificarViabilidadUser($pro,$puntTotal)\" style='margin-left:40%;'><i class='fas fa-check-square'></i>&nbsp;Finalizar evaluación &nbsp; <span id='load'></span></button></td></tr>";?>
</tbody></table>
<?php
    }
     // seleccionar en el select de puntaje que puntaje habia seleccionado el evaluador - evaluacion de viabilidad
    function Selectevavia($fila, $num, $pun,$pro,$id,$tipo)
    { $sel2="";
    $sc=false;
       if($num=="A"){$sel2="selected";$sc=true;}
        $sele = "<select  onchange=\"CalcularPuntaje($fila,'$pun');calificarViabilidadUser($pro,$id,$fila,$tipo)\" id='Selcal$fila' style='height:35px;border-radius:5px;border:1px solid #CCC;'><option value='A' $sel2>--</option>";
       

        for ($i = 0; $i <= 10; $i++) {
             $s = "";
            if ($i == $num && !$sc) {
                $s = "selected";
            } else {
                $s = "";
            }
            $sele .= "<option value='$i' $s>$i</option>";
        }
        $sele .= "</select>";
        return $sele;
    }
    // seleccionar en el select de puntaje que puntaje habia seleccionado el evaluador - evaluacion de viabilidad
    function Selectevaviaadc($fila, $num, $pun,$pro,$id,$tipo)
    {   $sel2="";
        $sc=false;
       if($num=="A"){$sel2="selected";$sc=true;}
        $sele = "<select  onchange=\"CalcularPuntajeadc($fila,'$pun');calificarViabilidadUseradc($pro,$id,$fila,$tipo)\" id='Selcaladc$fila' style='height:35px;border-radius:5px;border:1px solid #CCC;'><option value='A' $sel2>--</option>";
       

        for ($i = 0; $i <= 10; $i++) {
            
            if ($i == $num && !$sc) {
                $s = "selected";
            } else {
                $s = "";
            }
            $sele .= "<option value='$i' $s>$i</option>";
        }
        $sele .= "</select>";
        return $sele;
    }
    // verificar asignacion de un usuari a un criterio
    function verificarElegibilidadUser($pro, $cri, $tipo, $user)
    {
        $response = false;

        $consulta = mysqli_query(
            $this->conexion,
            "SELECT `usuariosxpropuesta_ele`.* FROM `usuariosxpropuesta_ele`,criterios_ele where usuariosxpropuesta_ele.criterio=criterios_ele.tipo and usuariosxpropuesta_ele.id_propuesta=$pro and usuariosxpropuesta_ele.criterio=$tipo and id_usuario=$user group by usuariosxpropuesta_ele.id_propuesta"
        );
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = true;
        }

        return $response;
    }
    // consultar un concepto final de una evaluacion
    function finalConcept($pro)
    {
        $response = "";

        $consulta = mysqli_query($this->conexion, "SELECT con from conceptofinal where pro=$pro");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
    function finalConcept2($pro)
    {
        $response = "";

        $consulta = mysqli_query($this->conexion, "SELECT con_fin from usuariosxpropuesta_via where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
    
     function finalConcept3($pro,$usu)
    {
        $response = "";

        $consulta = mysqli_query($this->conexion, "SELECT con_fin from usuariosxpropuesta_via where id_propuesta=$pro and id_usuario=$usu");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
    // verificar criterios de elegibilidad
    function verificarCriElegibilidadUser($pro, $cri)
    {
        $response = false;

        $consulta = mysqli_query($this->conexion, "SELECT * FROM `calificacion_elegibilidad` where id_criterio=$cri and id_propuesta=$pro");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = true;
        }

        return $response;
    }
    // verificar asignacion de un usuari a un criterio
    function verificarViabilidadUser($pro, $cri, $tipo, $user)
    {
        $response = false;
echo "SELECT `usuariosxpropuesta_via`.* FROM `usuariosxpropuesta_via` where id_propuesta=$pro and id_usuario=$user";
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT `usuariosxpropuesta_via`.* FROM `usuariosxpropuesta_via` where id_propuesta=$pro and id_usuario=$user"
        );
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = true;
        }

        return $response;
    }
    // verificar un criterio de viabilidad
    function verificarCriViabilidadUser($pro, $cri,$usu)
    {
        $response = false;

        $consulta = mysqli_query($this->conexion, "SELECT * FROM `calificacion_viabilidad` where id_criterio=$cri and id_propuesta=$pro and usuario=$usu");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = true;
        }

        return $response;
    }
    // verificar un criterio adicional
    function verificarCriAdicionalUser($pro, $cri,$usu)
    {
        $response = false;

        $consulta = mysqli_query($this->conexion, "SELECT * FROM `calificacion_adicional` where id_criterio=$cri and id_propuesta=$pro and usuario=$usu");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = true;
        }

        return $response;
    }
    
     function validarProyectoevaluadoEle($pro)
    {
        $response = false;

        $consulta = mysqli_query($this->conexion, "SELECT estado FROM `propuestas` where id=$pro");
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos['estado']>2){
            $response = true;}
        }

        return $response;
    }
     // calificar un requisito de un criterio de evaluacion de elegibilidad del evaluador
     
     
     
    function calificarElegibilidadUser($pro, $cri, $cumple, $det, $obs, $tipo)
    {
       
        $this->mensaje = true;
       
        $response = "";
       // verificar si el usuario sta asignado y si el criterio fue evaluado
        if ($this->verificarElegibilidadUser($pro, $cri, $tipo, $_COOKIE['user_code'])) {
            if ($this->verificarCriElegibilidadUser($pro, $cri)) {
                mysqli_query(
                    $this->conexion,
                    "UPDATE `calificacion_elegibilidad` SET `calificacion` = '$cumple', `doc_detalle` = '$det', `observacion` = '$obs', `fecha` = '" .
                        date('Y-m-d') .
                        "', `usuario` = '$_COOKIE[user_code]'  WHERE `id_criterio`=$cri and `id_propuesta`=$pro"
                );
                if (mysqli_affected_rows($this->conexion) > 0) {
                    $response = "Calificación guardada";
                    mysqli_query(
                    $this->conexion,
                    "UPDATE `subsanaciones` SET `observacion` = '$obs' WHERE `id_criterio`=$cri and `id_pro`=$pro"
                ); 
                } else {
                    $response = "No se alteró de la calificación";
                }
            } else {
                mysqli_query(
                    $this->conexion,
                    "INSERT INTO `calificacion_elegibilidad` (`id_criterio`, `id_propuesta`, `calificacion`, `doc_detalle`, `observacion`, `fecha`, `usuario`) VALUES ('$cri', '$pro', '$cumple', '$det', '$obs','" .
                        date('Y-m-d') .
                        "','$_COOKIE[user_code]')"
                );
//echo "INSERT INTO `calificacion_elegibilidad` (`id_criterio`, `id_propuesta`, `calificacion`, `doc_detalle`, `observacion`, `fecha`, `usuario`) VALUES ('$cri', '$pro', '$cumple', '$det', '$obs','" . date('Y-m-d') ."','$_COOKIE[user_code]')";
                if (mysqli_affected_rows($this->conexion) > 0) {
                    $response = "Calificación guardada";
                } else {
                    $response = "No se guardo de la calificación";
                }
            }
        } else {
            $response = "No esta asignado al criterio";
            $this->mensaje = false;
        }
        //}
        echo $response;
       
    }
    // calificar un requisito de un criterio de evaluacion de elegibilidad del asesor juridico
    function calificarElegibilidadUserJur($pro, $cri, $cumple, $det, $obs, $tipo)
    {
        
        $this->mensaje = true;
        $response = "";
        // verificar si el criterio esta evaluado y si el usuario puede evaluarlo
        if ($this->verificarElegibilidadUser($pro, $cri, $tipo, $_COOKIE['user_code'])) {
            if ($this->verificarCriElegibilidadUser($pro, $cri)) {
                // actualizar la calificacion
                mysqli_query(
                    $this->conexion,
                    "UPDATE `calificacion_elegibilidad` SET `calificacion` = '$cumple', `doc_detalle` = '$det', `observacion` = '$obs', `fecha` = '" .
                        date('Y-m-d') .
                        "', `usuario` = '$_COOKIE[user_code]'  WHERE `id_criterio`=$cri and `id_propuesta`=$pro"
                );
                if (mysqli_affected_rows($this->conexion) > 0) {
                    $response = "Calificación guardada";
                      mysqli_query(
                    $this->conexion,
                    "UPDATE `subsanaciones` SET `observacion` = '$obs' WHERE `id_criterio`=$cri and `id_pro`=$pro"
                ); 
                } else {
                    $response = "No se alteró de la calificación";
                }
            } else {
                // guadar la calificacion
                mysqli_query(
                    $this->conexion,
                    "INSERT INTO `calificacion_elegibilidad` (`id_criterio`, `id_propuesta`, `calificacion`, `doc_detalle`, `observacion`, `fecha`, `usuario`) VALUES ('$cri', '$pro', '$cumple', '$det', '$obs','" .
                        date('Y-m-d') .
                        "','$_COOKIE[user_code]')"
                );

                if (mysqli_affected_rows($this->conexion) > 0) {
                    $response = "Calificación guardada";
                } else {
                    $response = "No se guardo de la calificación";
                }
            }
        } else {
            $response = "No esta asignado al criterio";
            $this->mensaje = false;
        }
        //}
        echo $response;
       
    }
    // calificar un requisito de un criterio de evaluacion de viabilidad 
    function calificarViabilidadUser($pro, $cri, $cal, $num, $obs, $tipo)
    {

        $response = "";
         // verificar si el criterio esta evaluado 
        if ($this->verificarViabilidadUser($pro, $cri, $tipo, $_COOKIE['user_code'])) {
            if ($this->verificarCriViabilidadUser($pro, $cri,$_COOKIE['user_code'])) {
                // actualizar la calificacion
                mysqli_query(
                    $this->conexion,
                    "UPDATE `calificacion_viabilidad` SET `calificacion` = '$cal',`observacion` = '$obs', `fecha` = '" . date('Y-m-d') . "', `usuario` = '$_COOKIE[user_code]',n_pun=$num  WHERE `id_criterio`=$cri and `id_propuesta`=$pro and usuario=$_COOKIE[user_code]"
                );

                if (mysqli_affected_rows($this->conexion) > 0) {
                    $response = "Calificación guardada";
                } else {
                    $response = "No se alteró de la calificación";
                }
            } else {
                // guardar la calificacion
                mysqli_query(
                    $this->conexion,
                    "INSERT INTO `calificacion_viabilidad` (`id_criterio`, `id_propuesta`, `calificacion`, `observacion`, `fecha`, `usuario`,n_pun) VALUES ('$cri', '$pro', '$cal','$obs','" . date('Y-m-d') . "','$_COOKIE[user_code]',$num)"
                );

                if (mysqli_affected_rows($this->conexion) > 0) {
                    $response = "Calificación guardada";
                } else {
                    $response = "No se guardo de la calificación";
                }
            }
        } else {
            $response = "No esta asignado al criterio";
        }

        echo $response;
    }
    // calificar un requisito de un criterio de evaluacion de viabilidad adicional
    function calificarViabilidadUseradc($pro, $cri, $cal, $num, $obs, $tipo)
    {
        $response = "";
         // verifica que el criterios  exista
        if ($this->verificarCriAdicionalUser($pro, $cri,$_COOKIE['user_code'])) {
            // actualizar la calificacion 
            mysqli_query(
                $this->conexion,
                "UPDATE `calificacion_adicional` SET `calificacion` = '$cal',`observacion` = '$obs', `fecha` = '" . date('Y-m-d') . "', `usuario` = '$_COOKIE[user_code]',n_pun=$num  WHERE `id_criterio`=$cri and `id_propuesta`=$pro and usuario=$_COOKIE[user_code]"
            );

            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Calificación guardada";
            } else {
                $response = "No se alteró de la calificación";
            }
        } else {
            // guardar la calificacion 
            mysqli_query(
                $this->conexion,
                "INSERT INTO `calificacion_adicional` (`id_criterio`, `id_propuesta`, `calificacion`, `observacion`, `fecha`, `usuario`,n_pun) VALUES ('$cri', '$pro', '$cal','$obs','" . date('Y-m-d') . "','$_COOKIE[user_code]',$num)"
            );

            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Calificación guardada";
            } else {
                $response = "No se guardo de la calificación";
            }
        }

        echo $response;
    }
     // contar cantidad de criterios de elegibilidad configurados
    function cantCriCon($conv)
    {
        $response = 0;

        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `criterios_ele` where id_convocatoria=$conv");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
     // contar cantidad de criterios de elegibilidad evaluados
    function cantCriEva($pro)
    {
        $response = 0;

        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `calificacion_elegibilidad` where id_propuesta=$pro");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
     function cantCriConAsig_($conv)
    {
        $response = 0;

        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `criterios_ele` where id_convocatoria=$conv and tipo>1");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
     // contar cantidad de criterios de elegibilidad evaluados
    function cantCriEvaAsig_($pro)
    {
        $response = 0;

        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `calificacion_elegibilidad` where id_propuesta=$pro and usuario=".$_COOKIE['user_code']."");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
    
    
    function UndoProyectEle($cod){
        $response="";
        $consulta = mysqli_query($this->conexion, "SELECT apro_ele FROM `propuestas` where id=$cod and (estado>4 or apro_ele=1)");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = "Operación denegada, el proyecto se encuentra aprobado para visualizar o esta en fase de viablidad";
        }  
        else{
           mysqli_query($this->conexion, "update usuariosxpropuesta_ele set elegible=NULL,fec_eva=NULL where id_propuesta=$cod");
           mysqli_query($this->conexion, "update propuestas set fecha_eva_ele=NULL,dia_ele='',causales_rechazo=NULL,estado=2 where id=$cod");
           mysqli_query($this->conexion, "delete from  calificacion_causales  where id_causa=4 and id_propuesta=$cod");
            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Operación exitosa";
            }
            else{
                $response = "Operación rechazada";
            }
        }
        return $response;
    }
    function UndoProyectVia($cod){
        $response="";
        $consulta = mysqli_query($this->conexion, "SELECT apro_via FROM `propuestas` where id=$cod and apro_via=1");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = "Operación denegada, el proyecto se encuentra aprobado para visualizar";
        }  
        else{
           mysqli_query($this->conexion, "update usuariosxpropuesta_via set pun_obt=NULL,viable=NULL,fec_eva=NULL where id_propuesta=$cod");
           mysqli_query($this->conexion, "update propuestas set fecha_eva_via=NULL,dia_via='',estado=5,pun_obt_via=NULL where id=$cod");
            if (mysqli_affected_rows($this->conexion) > 0) {
                $response = "Operación exitosa";
            }
            else{
                $response = "Operación rechazada";
            }
        }
        return $response;
    }
      function cantCriConAsig_Jur($conv)
    {
        $response = 0;

        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `criterios_ele` where id_convocatoria=$conv and tipo=1");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
     // contar cantidad de criterios de elegibilidad evaluados
    function cantCriEvaAsig_Jur($pro)
    {
        $response = 0;

        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `calificacion_elegibilidad` where id_propuesta=$pro  and usuario=".$_COOKIE['user_code']."");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
     // contar cantidad de criterios de viabilidad de la fase
    function cantCriCon2($conv)
    {
        $response = 0;

        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `criterios_via` where id_convocatoria=$conv");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
     // contar cantidad de criterios de viabilidad calificados
    function cantCriEva2($pro)
    {
        $response = 0;

        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `calificacion_viabilidad` where id_propuesta=$pro and usuario=".$_COOKIE['user_code']."");
        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
    // contar cantidad de subsanaciones
    function cantSub($pro, $cri)
    {
        $response = 0;

        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `subsanaciones` WHERE estado=0 and id_pro=$pro and id_criterio=$cri");

        if ($datos = mysqli_fetch_array($consulta)) {
            $response = $datos[0];
        }

        return $response;
    }
    
     function verificarConceptoElegibilidad($pro)
     {
         $ban=true;
        $consulta = mysqli_query($this->conexion, "SELECT calificacion FROM `calificacion_elegibilidad` WHERE `id_propuesta` = $pro and usuario=".$_COOKIE['user_code']."");
               while ($datos = mysqli_fetch_array($consulta)) {
                  if($datos[0]=="No cumple")
                  $ban=false;
               }
        return $ban;  
     }
     function verificarSubsanaciones($pro)
     {
         $ban=true;
        $consulta = mysqli_query($this->conexion, "SELECT subsanaciones.estado FROM `subsanaciones`,criterios_ele,propuestas,usuariosxpropuesta_ele,tipos_cri_ele WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id_criterio=criterios_ele.id and usuariosxpropuesta_ele.id_propuesta=subsanaciones.id_pro and criterios_ele.tipo=tipos_cri_ele.cod and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and usuariosxpropuesta_ele.id_propuesta=$pro and usuariosxpropuesta_ele.id_usuario=".$_COOKIE['user_code']."");
               while ($datos = mysqli_fetch_array($consulta)) {
                  if($datos[0]==0 || $datos[0]==1)
                  $ban=false;
               }
        return $ban;  
     }
     
     function AdicionarDiasProyectEle($cod)
     {
      $ban="";
      $consulta = mysqli_query($this->conexion, "SELECT plazo_adi from propuestas where id=$cod");
             if ($datos = mysqli_fetch_array($consulta)) {
                  $ban="<b>Días adicionales :</b> $datos[0]"; 
               }
      echo $ban;   
         
     }
      function AdicionarDiasProyectVia($cod)
     {
      $ban="";
      $consulta = mysqli_query($this->conexion, "SELECT plazo_adi2 from propuestas where id=$cod");
             if ($datos = mysqli_fetch_array($consulta)) {
               $ban="<b>Días adicionales :</b> $datos[0]";
                   
               }
        echo $ban;   
         
     }
     
    function FcalificarElegibilidadUser_($pro, $conv, $npro, $tot)
    {
        
        $response = "";
        $estado=0;
        $cantCriConAsig = $this->cantCriConAsig_($conv);
        $cantCriEvaAsig = $this->cantCriEvaAsig_($pro);

        if ($cantCriConAsig == $cantCriEvaAsig) {
            if($this->verificarSubsanaciones($pro)){
            $ele_ = "";
    
            if($this->verificarConceptoElegibilidad($pro))
           { $ele_=1;
               
           }
            else
           { $ele_=0;
               
           }
            $ba=true;
        $consulta = mysqli_query($this->conexion, "select count(*) from usuariosxpropuesta_ele where id_propuesta=$pro and (elegible=0 or elegible=1)");
        if ($datos = mysqli_fetch_array($consulta)) {
              if($datos[0]==0)
              {
                  $ba=false;
              }
        
        }
        if($ba)
        {      $ele="";
              $cumple="";
               $pun_pro=0;
               $consulta = mysqli_query($this->conexion, "select * from usuariosxpropuesta_ele where id_propuesta=$pro  and (`elegible` BETWEEN 0 AND 1) and id_usuario<>".$_COOKIE['user_code']."");
               if ($datos = mysqli_fetch_array($consulta)) {
                   $pun_pro=$datos['elegible']+$ele_;
                  if($pun_pro==2)
                 {    $estado=4;
                     $ele="ELEGIBLE";
                     $cumple="Cumple";
                 }
                  else
                  {$ele="NO ELEGIBLE";
                    $estado=3;  
                    $cumple="No cumple";
                  }
                   mysqli_query($this->conexion, "UPDATE propuestas set estado=$estado,dia_ele='$ele',fecha_eva_ele='" . date('Y-m-d') . "' where id=$pro");   
                    if (mysqli_affected_rows($this->conexion) > 0) {
                     mysqli_query($this->conexion, "UPDATE usuariosxpropuesta_ele set elegible= $ele_,fec_eva='".date('Y-m-d')."' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."");     
                    $this->verificareleMail2($pro, $npro);
                    
                    $this->calificarCausalUserA($pro, 4, $cumple, 'Evaluación Gererada automáticamente por el sistema');
                   // echo  "UPDATE usuariosxpropuesta_via set pun_obt=$tot,viable= $viable_,fec_eva='".date('Y-m-d')."',con_fin='$conf' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."";
                    $response = "Evaluación finalizada";
                    
                    }
                    else{
                     $response = "No se pudo finalizar la evaluación"; 
                        
                    }
                // enviar email y notificacion de la finalizacion de la evaluacion
               // $this->verificareleMail3($pro, $npro);
            } else {
                mysqli_query($this->conexion, "UPDATE usuariosxpropuesta_via set elegible= $ele_,fec_eva='".date('Y-m-d')."' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code'].""); 
            if (mysqli_affected_rows($this->conexion) > 0) {
                // verificar y actualizar concepto final del proyecto
               
               
                $response = "Evaluación finalizada";
               }
              else{
                // echo "UPDATE usuariosxpropuesta_via set pun_obt=$tot,viable= $viable_,fec_eva='".date('Y-m-d')."',con_fin='$conf' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."";
                 $response = "No se pudo finalizar la evaluación"; 
                  
              }
                
            }
         
        }
    
    else{
      mysqli_query($this->conexion, "UPDATE usuariosxpropuesta_ele set elegible= $ele_,fec_eva='".date('Y-m-d')."' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."");   
        if (mysqli_affected_rows($this->conexion) > 0) {
           $response = "Evaluación finalizada";
        }
        else {
                $response = "No se pudo finalizar la evaluación";
            }
    }
                  
                   }
            else
            {
                $response = "Hay subsanaciones sin finalizar\nDebe finalizarlas!";
            }
            
        } 
        
        else {
            $response = "Faltan criterios por evaluar\nPor favor revisar!";
        }
        echo $response;
    }
    
    
    
      
    function FcalificarElegibilidadUser_Jur($pro, $conv, $npro, $tot)
    {
         $response = "";
           $estado=0;
        $cantCriConAsig = $this->cantCriConAsig_Jur($conv);
        $cantCriEvaAsig = $this->cantCriEvaAsig_Jur($pro);

        if ($cantCriConAsig == $cantCriEvaAsig) {
            if($this->verificarSubsanaciones($pro)){
            $ele_ = "";              
    
            if($this->verificarConceptoElegibilidad($pro))
            $ele_=1;
            else
            $ele_=0;
            $ba=true;
        $consulta = mysqli_query($this->conexion, "select count(*) from usuariosxpropuesta_ele where id_propuesta=$pro and (elegible=0 or elegible=1)");
        if ($datos = mysqli_fetch_array($consulta)) {
              if($datos[0]==0)
              {
                  $ba=false;
              }
        
        }
        if($ba)
        {      $ele="";
         $cumple="";
               $pun_pro=0;
               $consulta = mysqli_query($this->conexion, "select * from usuariosxpropuesta_ele where id_propuesta=$pro  and (`elegible` BETWEEN 0 AND 1) and id_usuario<>".$_COOKIE['user_code']."");
               if ($datos = mysqli_fetch_array($consulta)) {
                   $pun_pro=$datos['elegible']+$ele_;
                  if($pun_pro==2)
                 {    $estado=4;
                     $ele="ELEGIBLE";
                     $cumple="Cumple";
                 }
                  else
                  {$ele="NO ELEGIBLE";
                    $estado=3;  
                    $cumple="No cumple";
                  }
                   mysqli_query($this->conexion, "UPDATE propuestas set estado=$estado,dia_ele='$ele',fecha_eva_ele='" . date('Y-m-d') . "' where id=$pro");   
                    if (mysqli_affected_rows($this->conexion) > 0) {
                     mysqli_query($this->conexion, "UPDATE usuariosxpropuesta_ele set elegible= $ele_,fec_eva='".date('Y-m-d')."' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."");     
                    $this->verificareleMail2($pro, $npro);
                    $this->calificarCausalUserA($pro, 4, $cumple, 'Evaluación Gererada automáticamente por el sistema');
                   // echo  "UPDATE usuariosxpropuesta_via set pun_obt=$tot,viable= $viable_,fec_eva='".date('Y-m-d')."',con_fin='$conf' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."";
                    $response = "Evaluación finalizada";
                    
                    }
                    else{
                     $response = "No se pudo finalizar la evaluación"; 
                        
                    }
                // enviar email y notificacion de la finalizacion de la evaluacion
               // $this->verificareleMail3($pro, $npro);
            } else {
                mysqli_query($this->conexion, "UPDATE usuariosxpropuesta_ele set elegible= $ele_,fec_eva='".date('Y-m-d')."' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code'].""); 
            if (mysqli_affected_rows($this->conexion) > 0) {
                // verificar y actualizar concepto final del proyecto
               
               
                $response = "Evaluación finalizada";
               }
              else{
                // echo "UPDATE usuariosxpropuesta_via set pun_obt=$tot,viable= $viable_,fec_eva='".date('Y-m-d')."',con_fin='$conf' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."";
                 $response = "No se pudo finalizar la evaluación"; 
                  
              }
                
            }
         
        }
    
    else{
      mysqli_query($this->conexion, "UPDATE usuariosxpropuesta_ele set elegible= $ele_,fec_eva='".date('Y-m-d')."' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."");   
        if (mysqli_affected_rows($this->conexion) > 0) {
           $response = "Evaluación finalizada";
        }
        else {
                $response = "No se pudo finalizar la evaluación";
            }
    }
                  
                   }
            else
            {
                $response = "Hay subsanaciones sin finalizar\nDebe finalizarlas!";
            }
            
        } 
        
        else {
            $response = "Faltan criterios por evaluar\nPor favor revisar!";
        }
        echo $response;
    }
    
    
    
     function calificarCausalUserM($pro, $cau, $cumple, $obs)
    {
       
    
                
        $consulta = mysqli_query($this->conexion, "SELECT  count(*) from calificacion_causales  WHERE id_causa=$cau and id_propuesta=$pro");
         
        if ($datos = mysqli_fetch_array($consulta)) {
               if($datos[0]==0)
               {
                      mysqli_query(
                $this->conexion,
                "INSERT INTO `calificacion_causales` (`id_causa`, `id_propuesta`, `calificacion`, `observacion`, `fecha`, `usuario`) VALUES ( '$cau', '$pro', '$cumple', '$obs', '".date('Y-m-d')."', ".$_COOKIE['user_code'].");"
            );
           
               }
               else
               {
                   mysqli_query(
                $this->conexion,
                "UPDATE `calificacion_causales` SET `calificacion` = '$cumple', `observacion` = '$obs', `fecha` = '".date('Y-m-d')."', `usuario` = ".$_COOKIE['user_code']."  WHERE id_propuesta = $pro and id_causa=$cau;"
            );
                  
                   
               }
               
              if (mysqli_affected_rows($this->conexion) > 0) {
                  
                  $cantcau=$this->CantCau();
                  $cancaucal=$this->CantCauCal($pro);
                  if($cantcau==$cancaucal)
                  {
                     
                     if($this->conceptocausa($pro)){
                       mysqli_query(
                $this->conexion,
                "UPDATE propuestas set causales_rechazo='Cumple' where id=$pro"
            );   }
                       else{
                           mysqli_query(
                $this->conexion,
                "UPDATE propuestas set causales_rechazo='No cumple' where id=$pro"
            ); 
                       }
                  }
              } 
               
               
               }
              
               
               
               
      
      
    }
    function CantCau(){
            $cant=0;
             $consulta = mysqli_query($this->conexion, "SELECT  count(*) from causales");
         //echo "SELECT  count(*) from causales";
        if ($datos = mysqli_fetch_array($consulta)) {
            $cant=$datos[0];
        } 
            
           return $cant;   
    }
     function CantCauCal($pro){
        $cant=0;
           $consulta = mysqli_query($this->conexion, "SELECT  count(*) from calificacion_causales  WHERE id_propuesta=$pro");
         //echo "SELECT  count(*) from calificacion_causales  WHERE id_propuesta=$pro";
        if ($datos = mysqli_fetch_array($consulta)) {
            $cant=$datos[0];
        }    
        
        return $cant;
    }
         function conceptocausa($pro){
        $cant=true;
           $consulta = mysqli_query($this->conexion, "SELECT  calificacion from calificacion_causales  WHERE id_propuesta=$pro");
         //echo "SELECT  calificacion from calificacion_causales  WHERE id_propuesta=$pro";
        while ($datos = mysqli_fetch_array($consulta)) {
            if($datos[0]=="No cumple")
            {
                $cant=false;
            }
        }    
        
        return $cant;
    }
     function calificarCausalUserA($pro, $cau, $cumple, $obs)
    {
       
       
    
                
        $consulta = mysqli_query($this->conexion, "SELECT  count(*) from calificacion_causales  WHERE id_causa=$cau and id_propuesta=$pro");
         
        if ($datos = mysqli_fetch_array($consulta)) {
               if($datos[0]==0)
               {
                      mysqli_query(
                $this->conexion,
                "INSERT INTO `calificacion_causales` (`id_causa`, `id_propuesta`, `calificacion`, `observacion`, `fecha`, `usuario`) VALUES ( '4', '$pro', '$cumple', '$obs', '".date('Y-m-d')."', 90);"
            );
           if (mysqli_affected_rows($this->conexion) > 0) {
                  
                  $cantcau=$this->CantCau();
                  $cancaucal=$this->CantCauCal($pro);
                  if($cantcau==$cancaucal)
                  {
                     
                     if($this->conceptocausa($pro)){
                       mysqli_query(
                $this->conexion,
                "UPDATE propuestas set causales_rechazo='Cumple' where id=$pro"
            );   }
                       else{
                          mysqli_query(
                $this->conexion,
                "UPDATE propuestas set causales_rechazo='No cumple' where id=$pro"
            ); 
                       }
                  }
              } 
               }
               else
               {
                   mysqli_query(
                $this->conexion,
                "UPDATE `calificacion_causales` SET `calificacion` = '$cumple', `observacion` = '$obs', `fecha` = '".date('Y-m-d')."', `usuario` =90  WHERE id_propuesta = $pro and id_causa=4;"
            );
                if (mysqli_affected_rows($this->conexion) > 0) {
                  
                  $cantcau=$this->CantCau();
                  $cancaucal=$this->CantCauCal($pro);
                  if($cantcau==$cancaucal)
                  {
                     
                     if($this->conceptocausa($pro)){
                         
                         mysqli_query(
                $this->conexion,
                "UPDATE propuestas set causales_rechazo='Cumple' where id=$pro"
            ); 
                       
                       
                         
                     }
                       else{
                           
                           
                          mysqli_query(
                $this->conexion,
                "UPDATE propuestas set causales_rechazo='No cumple' where id=$pro"
            ); 
                           
                           
                       }
                  }
              }   
                   
               }
                
               
               
               
               
               
               }
              
               
               
               
     
      
    }
    
    public function Mail2()
    {
        $ban = [2];
        $consulta = mysqli_query($this->conexion, "select cod,email from usuarios where rol=5 ");
        if ($datos = mysqli_fetch_array($consulta)) {
            $ban = [$datos['cod'], $datos['email']];
        }
        return $ban;
    }
    // notificar al evaluador de elgibilidad
    public function notificacionele2($pro, $usu, $nom)
    {
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '$usu', 'EVALUACION FINALIZADA', 'LA <b>EVALUACION DE ELEGIBILIDAD</b> DEL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom, HA SIDO FINALIZADA', '0', '0')"
        );
    }
    
     public function notificacionobservacion($pro,$fase)
    {
        $consulta = mysqli_query($this->conexion, "select nom from propuestas where id=$pro ");
        if ($datos = mysqli_fetch_array($consulta)) {
            $nom = $datos[0];
        } 
        if($_COOKIE['user_rol']==5){
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '0', 'OBSERVACION CP', 'LA <b>SE HA REGISTRADO UNA NUEVA OBSERVACIÓN FASE DE $fase </b> PARA EL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom ', '0', '0'),( '$pro', '0', 'OBSERVACION S', 'LA <b>SE HA REGISTRADO UNA NUEVA OBSERVACIÓN FASE DE $fase </b> PARA EL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom ', '0', '0')"
        );
        }
        else if($_COOKIE['user_rol']==7){
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '0', 'OBSERVACION GT', 'LA <b>SE HA REGISTRADO UNA NUEVA OBSERVACIÓN FASE DE $fase </b> PARA EL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom ', '0', '0'),( '$pro', '0', 'OBSERVACION S', 'LA <b>SE HA REGISTRADO UNA NUEVA OBSERVACIÓN FASE DE $fase </b> PARA EL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom ', '0', '0')"
        );
        }
        else{
             mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '0', 'OBSERVACION GT', 'LA <b>SE HA REGISTRADO UNA NUEVA OBSERVACIÓN FASE DE $fase </b> PARA EL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom ', '0', '0'),( '$pro', '0', 'OBSERVACION CP', 'LA <b>SE HA REGISTRADO UNA NUEVA OBSERVACIÓN FASE DE $fase </b> PARA EL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom ', '0', '0')"
        );
        }
        
    }
    // notificar solicitud de  subsanacion 
    public function notificacionSubSol($pro, $usu, $nom)
    {
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '$usu', 'SOLICITUD SUBSANACION', 'HA SIDO GENERADA UNA NUEVA <b>SOLICITUD DE SUBSANACION</b> PARA EL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom', '0', '0')"
        );
    }
    
    public function notificacionResSub($sub)
    { 
        $data=array();
        $consulta = mysqli_query($this->conexion, "SELECT usuariosxpropuesta_ele.id_propuesta,usuariosxpropuesta_ele.id_usuario,propuestas.nom FROM `usuariosxpropuesta_ele`,subsanaciones,tipos_cri_ele,criterios_ele,propuestas WHERE subsanaciones.id_pro=propuestas.id and subsanaciones.id_pro=usuariosxpropuesta_ele.id_propuesta and subsanaciones.id_criterio=criterios_ele.id and criterios_ele.tipo=tipos_cri_ele.cod and usuariosxpropuesta_ele.criterio=tipos_cri_ele.cod and subsanaciones.id=$sub");
        if ($datos = mysqli_fetch_array($consulta)) {
            $data = [$datos[0],$datos[1],$datos[2]];
        } 
        
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$data[0]', '$data[1]', 'RESPUESTA SUBSANACION', 'HA SIDO RECIBIDA UNA NUEVA <b>RESPUESTA DE SUBSANACION</b> PARA EL PROYECTO <b>ID</b> : $data[0], <b>NOMBRE</b> : $data[2]', '0', '0')"
        );
        
    }
    

 public function notificacionConflicto($pro, $usu, $nom,$fase)
    {
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '$usu', 'CONFLICTO DE INTERESES', 'HA SIDO REGISTRADO UN <b>CONFLICTO DE INTERESES </b>EN FASE DE $fase PARA EL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom', '0', '0')"
        );
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '".$_COOKIE['user_code']."', 'CONFLICTO DE INTERESES EVALUADOR', 'HA REGISTRADO UN <b>CONFLICTO DE INTERESES</b> EN FASE $fase PARA EL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom', '0', '0')"
        ); 
    }

    public function verificareleMailSubSol($pro, $nom)
    {   // consultar correo del usuario
        $datausu = $this->Mail2();
        // notificar solicitud de  subsanacion 
        $this->notificacionSubSol($pro, $datausu[0], $nom);
        $email = $datausu[1];
        require "class.phpmailer.php";
        require "class.smtp.php";

        // Datos de la cuenta de correo utilizada para enviar vía SMTP
        $smtpHost = "mail.cpcoriente.org"; // Dominio alternativo brindado en el email de alta
        $smtpUsuario = "gary.incode@cpcoriente.org"; // Mi cuenta de correo
        $smtpClave = "incode2020$$"; // Mi contraseña

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->CharSet = "utf-8";

        // VALORES A MODIFICAR //
        $mail->Host = $smtpHost;
        $mail->Username = $smtpUsuario;
        $mail->Password = $smtpClave;

        $mail->From = "evaluacion@neo.cpcoriente.org"; // Email desde donde envío el correo.
        $mail->FromName = "NEO SYSTEM";
        $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

        $mail->Subject = "NUEVA SOLICITUD DE SUBSANACION"; // Este es el titulo del email.
        $mensajeHtml = nl2br($pro);
        $mail->Body = "<html><body > <h3>HA SIDO GENERADA UNA NUEVA SOLICITUD DE SUBSANACION PARA EL PROYECTO</h3><p><b>ID DEL PROYECTO  : </b> {$pro}</p><p><b>NOMBRE DEL PROYECTO  : </b> $nom</p><p>-- <br><br><i>Este mensaje es generado automáticamente.</i></p></body> </html><br />"; // Texto del email en formato HTML
        $mail->AltBody = "{$pro} \n\n "; // Texto sin formato HTML
        // FIN - VALORES A MODIFICAR //

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];
        // enviar correo
        $mail->Send();
    }

   
    public function verificareleMail2($pro, $nom)
    {    // consultar correo del usuario
        $datausu = $this->Mail2();
        // notificar al usuario
        $this->notificacionele2($pro, $datausu[0], $nom);
        $email = $datausu[1];
        require "class.phpmailer.php";
        require "class.smtp.php";

        // Datos de la cuenta de correo utilizada para enviar vía SMTP
        $smtpHost = "mail.cpcoriente.org"; // Dominio alternativo brindado en el email de alta
        $smtpUsuario = "gary.incode@cpcoriente.org"; // Mi cuenta de correo
        $smtpClave = "incode2020$$"; // Mi contraseña

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->CharSet = "utf-8";

        // VALORES A MODIFICAR //
        $mail->Host = $smtpHost;
        $mail->Username = $smtpUsuario;
        $mail->Password = $smtpClave;

        $mail->From = "evaluacion@neo.cpcoriente.org"; // Email desde donde envío el correo.
        $mail->FromName = "NEO SYSTEM";
        $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

        $mail->Subject = "EVALUACION ELEGIBILIDAD FINALIZADA"; // Este es el titulo del email.
        $mensajeHtml = nl2br($pro);
        $mail->Body = "<html><body > <h3>LA EVALUACION DE ELEGIBILIDAD DEL PROYECTO, HA SIDO FINALIZADA</h3><p><b>ID DEL PROYECTO  : </b> {$pro}</p><p><b>NOMBRE DEL PROYECTO  : </b> $nom</p><p>-- <br><br><i>Este mensaje es generado automáticamente.</i></p></body> </html><br />"; // Texto del email en formato HTML
        $mail->AltBody = "{$pro} \n\n "; // Texto sin formato HTML
        // FIN - VALORES A MODIFICAR //

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];
        // enviar correo
        $mail->Send();
    }
    // finalizar la evaluacion de viabilidad
    function FcalificarViabilidadUser($pro, $conv, $npro, $tot, $conf)
    {
       
        $response = "";
        // comparar la cantidad de criterios de evaluacion de viabilidad con lo que ha evaluado
        $cantCriCon = $this->cantCriCon2($conv);
        $cantCriEva = $this->cantCriEva2($pro);
        // verificar puntaje
        if ($cantCriCon == $cantCriEva) {
            if ($tot >= 80) {
                $viable_ = "1";
            } else {
                $viable_ = "0";
        }
        $ba=true;
        $consulta = mysqli_query($this->conexion, "select count(*) from usuariosxpropuesta_via where id_propuesta=$pro and viable=0 or viable=1");
        if ($datos = mysqli_fetch_array($consulta)) {
              if($datos[0]==0)
              {
                  $ba=false;
              }
        
        }
        if($ba)
        {      $viable="";
               $pun_pro=0;
               $consulta = mysqli_query($this->conexion, "select * from usuariosxpropuesta_via where id_propuesta=$pro  and (`pun_obt` BETWEEN 0 AND 150) and id_usuario<>".$_COOKIE['user_code']."");
               if ($datos = mysqli_fetch_array($consulta)) {
                   $pun_pro=($datos['pun_obt']+$tot)/2;
                  if($pun_pro>=80)
                  $viable="VIABLE";
                  else
                  $viable="NO VIABLE";
                   mysqli_query($this->conexion, "UPDATE propuestas set estado=6,dia_via='$viable',fecha_eva_via='" . date('Y-m-d') . "',pun_obt_via=$pun_pro where id=$pro");   
                   
                    if (mysqli_affected_rows($this->conexion) > 0) {
                     mysqli_query($this->conexion, "UPDATE usuariosxpropuesta_via set pun_obt=$tot,viable= $viable_,fec_eva='".date('Y-m-d')."',con_fin='$conf' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."");     
                    $this->verificareleMail3($pro, $npro);
                   // echo  "UPDATE usuariosxpropuesta_via set pun_obt=$tot,viable= $viable_,fec_eva='".date('Y-m-d')."',con_fin='$conf' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."";
                    $response = "Evaluación finalizada";
                    
                    }
                    else{
                     $response = "No se pudo finalizar la evaluación"; 
                        
                    }
                // enviar email y notificacion de la finalizacion de la evaluacion
               // $this->verificareleMail3($pro, $npro);
            } else {
                mysqli_query($this->conexion, "UPDATE usuariosxpropuesta_via set pun_obt=$tot,viable= $viable_,fec_eva='".date('Y-m-d')."',con_fin='$conf' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code'].""); 
            if (mysqli_affected_rows($this->conexion) > 0) {
                // verificar y actualizar concepto final del proyecto
               
               
                $response = "Evaluación finalizada";
               }
              else{
                // echo "UPDATE usuariosxpropuesta_via set pun_obt=$tot,viable= $viable_,fec_eva='".date('Y-m-d')."',con_fin='$conf' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."";
                 $response = "No se pudo finalizar la evaluación"; 
                  
              }
                
            }
         
        }
    
    else{
      mysqli_query($this->conexion, "UPDATE usuariosxpropuesta_via set pun_obt=$tot,viable= $viable_,fec_eva='".date('Y-m-d')."',con_fin='$conf' where id_propuesta=$pro and id_usuario=".$_COOKIE['user_code']."");   
        if (mysqli_affected_rows($this->conexion) > 0) {
           $response = "Evaluación finalizada";
        }
        else {
                $response = "No se pudo finalizar la evaluación";
            }
    }
    
        }
        
         else {
            $response = "Faltan criterios por evaluar";
        } 
        echo $response; 
    }
    // notificar a usuario  evaluador de viabilidad
    public function notificacionvia3($pro, $usu, $nom)
    {
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '$usu', 'EVALUACION FINALIZADA', 'LA <b>EVALUACION DE VIABILIDAD</b> DEL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b> : $nom, HA SIDO FINALIZADA', '0', '0')"
        );
    }
    // notificar a usuario de colombia productiva
    public function notificacionColombiaP1($pro, $nom)
    {
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '0', 'EVALUACION FINALIZADA CP', 'LA <b>EVALUACION DE ELEGIBILIDAD</b> DEL PROYECTO <b>ID</b> :$pro, <b>NOMBRE</b>: $nom, HA SIDO FINALIZADA', '0', '0')"
        );
         mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '0', 'EVALUACION FINALIZADA S', 'LA <b>EVALUACION DE ELEGIBILIDAD</b> DEL PROYECTO <b>ID</b> :$pro, <b>NOMBRE</b>: $nom, HA SIDO FINALIZADA', '0', '0')"
        );
    }
    
      public function AgregarDiasVia($pro, $dias)
    {mysqli_query($this->conexion, "UPDATE propuestas set plazo_adi2=plazo_adi2+$dias where id=$pro");   
        if (mysqli_affected_rows($this->conexion) > 0) {
         echo "Operación realizada";
        }
        else {
               echo "No fue posible realizar la operación";
            }
    }
    // notificar a usuario de colombia productiva
    public function AgregarDiasEle($pro, $dias)
    {
       mysqli_query($this->conexion, "UPDATE propuestas set plazo_adi=plazo_adi+$dias where id=$pro");   
        if (mysqli_affected_rows($this->conexion) > 0) {
          echo  "Operación realizada";
        }
        else {
                echo "No fue posible realizar la operación";
            }
    }
    
    
    
    // notificar a usuario de colombia productiva
    public function notificacionColombiaP2($pro, $nom)
    {
        mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '0', 'EVALUACION FINALIZADA CP', 'LA <b>EVALUACION DE VIABILIDAD</b> DEL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b>: $nom, HA SIDO FINALIZADA', '0', '0')"
        );
         mysqli_query(
            $this->conexion,
            "INSERT INTO `notificaciones` ( `pro`, `usu`, `tipo`, `notificacion`, `visto`, `sonido`) VALUES ( '$pro', '0', 'EVALUACION FINALIZADA S', 'LA <b>EVALUACION DE VIABILIDAD</b> DEL PROYECTO <b>ID</b> : $pro, <b>NOMBRE</b>: $nom, HA SIDO FINALIZADA', '0', '0')"
        );
    }
   
    public function Conflicto_int_ele($pro)
    {   $fecha=$this->FormatDate2(date("Y-m-d"));
        $ban =["sin",$fecha];
        $consulta = mysqli_query($this->conexion, "SELECT * FROM `conflicto_int` where usu=".$_COOKIE['user_code']." and pro='$pro' and fase='ele'");
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos['conflicto']==1)
            {
                $ban=["con",$fecha];
            }
            else{
                $ban=["acu",$fecha];
            }
            
        }
        return json_encode($ban);
    } 
     public function Conflicto_int_via($pro)
    {   $fecha=$this->FormatDate2(date("Y-m-d"));
        $ban =["sin",$fecha];
        $consulta = mysqli_query($this->conexion, "SELECT * FROM `conflicto_int` where usu=".$_COOKIE['user_code']." and pro='$pro' and fase='via'");
        if ($datos = mysqli_fetch_array($consulta)) {
            if($datos['conflicto']==1)
            {
                $ban=["con",$fecha];
            }
            else{
                $ban=["acu",$fecha];
            }
            
        }
        return json_encode($ban);
    } 
    
    public function RegistrarConflictoEle($pro,$sino,$npro)
    {   $fecha=date("Y-m-d");
        $ban ="Error al registrar";
         $fec_asig=$this->FechaAsignacionUsuarioEle($pro);    
        if($sino==1){
        mysqli_query($this->conexion, "INSERT INTO `conflicto_int` ( `usu`, `pro`, `conflicto`, `fase`, `fec_asig`, `fec_registro`, `fec_ret`) VALUES ( '".$_COOKIE['user_code']."', '$pro', '1', 'ele', '$fec_asig', '$fecha', '$fecha');");
       //echo "INSERT INTO `conflicto_int` ( `usu`, `pro`, `conflicto`, `fase`, `fec_asig`, `fec_registro`, `fec_ret`) VALUES ( '".$_COOKIE['user_code']."', '$pro', '1', 'ele', '$fec_asig', '$fecha', '$fecha');";
        if(mysqli_affected_rows($this->conexion) > 0) 
        {
         $ban="Conflicto de intereses registado";
        $this->DelAsigele(null,null, $pro, $_COOKIE['user_code']); 
        $this->VerificaeStateProyectoEle($pro);
        $this->verificareleMailconflicto($pro, $npro,"ELEGIBILIDAD");
        
        }
        
        
        }
        else{
        mysqli_query($this->conexion, "INSERT INTO `conflicto_int` ( `usu`, `pro`, `conflicto`, `fase`, `fec_asig` , `fec_registro`) VALUES ( '".$_COOKIE['user_code']."', '$pro', '0', 'ele', '$fec_asig',  '$fecha');");    
      echo "INSERT INTO `conflicto_int` ( `usu`, `pro`, `conflicto`, `fase`, `fec_asig`  `fec_registro`) VALUES ( '".$_COOKIE['user_code']."', '$pro', '0', 'ele', '$fec_asig',  '$fecha');";
            if(mysqli_affected_rows($this->conexion) > 0) 
        {
         $ban="Conflicto de intereses registado";
            
        }
        }
        
        return $ban;
    }
     public function RegistrarConflictoVia($pro,$sino,$npro)
    {   $fecha=date("Y-m-d");
        $ban ="Error al registrar";
         $fec_asig=$this->FechaAsignacionUsuarioVia($pro); 
        if($sino==1){
          
        mysqli_query($this->conexion, "INSERT INTO `conflicto_int` ( `usu`, `pro`, `conflicto`, `fase`, `fec_asig`, `fec_registro`, `fec_ret`) VALUES ( '".$_COOKIE['user_code']."', '$pro', '1', 'via', '$fec_asig', '$fecha', '$fecha');");
       
        if(mysqli_affected_rows($this->conexion) > 0) 
        {
         $ban="Conflicto de intereses registado";
        $this->DelAsigvia(null, $pro, $_COOKIE['user_code']); 
         $this->VerificaeStateProyectoVia($pro);
        $this->verificareleMailconflicto($pro, $npro,"VIABILIDAD");
        
        }
        
        
        }
        else{
        mysqli_query($this->conexion, "INSERT INTO `conflicto_int` ( `usu`, `pro`, `conflicto`, `fase`,`fec_asig`,  `fec_registro`) VALUES ( '".$_COOKIE['user_code']."', '$pro', '0', 'via','$fec_asig',  '$fecha');");    
       
            if(mysqli_affected_rows($this->conexion) > 0) 
        {
         $ban="Conflicto de intereses registado";
            
        }
        }
        
        return $ban;
    }
    public function verificareleMailconflicto($pro, $nom,$fase)
    {   // consultar correo del usuario
        $datausu = $this->Mail2();
        $this->notificacionConflicto($pro, $usu, $nom,$fase);
        // notificar solicitud de  subsanacion 
        //$this->notificacionSubSol($pro, $datausu[0], $nom);
        $email = $datausu[1];
        require "class.phpmailer.php";
        require "class.smtp.php";

        // Datos de la cuenta de correo utilizada para enviar vía SMTP
        $smtpHost = "mail.cpcoriente.org"; // Dominio alternativo brindado en el email de alta
        $smtpUsuario = "gary.incode@cpcoriente.org"; // Mi cuenta de correo
        $smtpClave = "incode2020$$"; // Mi contraseña

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->CharSet = "utf-8";

        // VALORES A MODIFICAR //
        $mail->Host = $smtpHost;
        $mail->Username = $smtpUsuario;
        $mail->Password = $smtpClave;

        $mail->From = "evaluacion@neo.cpcoriente.org"; // Email desde donde envío el correo.
        $mail->FromName = "NEO SYSTEM";
        $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

        $mail->Subject = "REGISTRO DE CONFLICTO DE INTERESES"; // Este es el titulo del email.
        $mensajeHtml = nl2br($pro);
        $mail->Body = "<html><body > <h3>HA SIDO REGISTRADO UN CONFLICTO DE INTERESES EN FASE DE $fase, PARA EL PROYECTO </h3><p><b>ID DEL PROYECTO  : </b> {$pro}</p><p><b>NOMBRE DEL PROYECTO  : </b> $nom</p><p>-- <br><br><i>Este mensaje es generado automáticamente.</i></p></body> </html><br />"; // Texto del email en formato HTML
        $mail->AltBody = "{$pro} \n\n "; // Texto sin formato HTML
        // FIN - VALORES A MODIFICAR //

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];
        // enviar correo
        $mail->Send();
    }
 
    
    
    
     public function FechaAsignacionUsuarioEle($pro)
    {   
        $ban ="";
        $consulta = mysqli_query($this->conexion, "SELECT fecha_asig FROM `usuariosxpropuesta_ele` where id_usuario=".$_COOKIE['user_code']." and id_propuesta='$pro'");
        if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos['fecha_asig'];
            
        }
        return $ban;
    }
     public function FechaAsignacionUsuarioVia($pro)
    {   
        $ban ="";
        $consulta = mysqli_query($this->conexion, "SELECT fecha_asig FROM `usuariosxpropuesta_via` where id_usuario=".$_COOKIE['user_code']." and id_propuesta='$pro'");
        if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos['fecha_asig'];
            
        }
        return $ban;
    }
     public function VerificarTerminoAjur($pro)
    {   
        $ban ="<span style='color:red;'>El Asesor Jurídico/ Abogado, no ha terminado de evaluar <button class='btn-functions' id='btn_add_sub' onclick='RefreshSubsana()'><i class='fas fa-sync-alt'></i>&nbsp;Actualizar</button></span>";
        $consulta = mysqli_query($this->conexion, "SELECT count(*) FROM `calificacion_elegibilidad` where id_propuesta=$pro and usuario<>".$_COOKIE['user_code']."");
                
        if ($datos = mysqli_fetch_array($consulta)) {
        if($datos[0]==15) $ban ="<span style='color:green;'>El Asesor Jurídico/ Abogado, ya terminó de evaluar</span>";
           
        }
        
        
        
        return $ban;
    } 
    
    

    public function verificareleMail3($pro, $nom)
    {   //consutar email de usuario
        $datausu = $this->Mail2();
        //notificar a usuario
        $this->notificacionvia3($pro, $datausu[0], $nom);
        $email = $datausu[1];
        require "class.phpmailer.php";
        require "class.smtp.php";

        // Datos de la cuenta de correo utilizada para enviar vía SMTP
        $smtpHost = "mail.cpcoriente.org"; // Dominio alternativo brindado en el email de alta
        $smtpUsuario = "gary.incode@cpcoriente.org"; // Mi cuenta de correo
        $smtpClave = "incode2020$$"; // Mi contraseña

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->CharSet = "utf-8";

        // VALORES A MODIFICAR //
        $mail->Host = $smtpHost;
        $mail->Username = $smtpUsuario;
        $mail->Password = $smtpClave;

        $mail->From = "evaluacion@neo.cpcoriente.org"; // Email desde donde envío el correo.
        $mail->FromName = "NEO SYSTEM";
        $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

        $mail->Subject = "EVALUACION VIABILIDAD FINALIZADA"; // Este es el titulo del email.
        $mensajeHtml = nl2br($pro);
        $mail->Body = "<html><body > <h3>LA EVALUACION DE VIABILIDAD DEL PROYECTO, HA SIDO FINALIZADA</h3><p><b>ID DEL PROYECTO  : </b> {$pro}</p><p><b>NOMBRE DEL PROYECTO  : </b> $nom</p><p>-- <br><br><i>Este mensaje es generado automáticamente.</i></p></body> </html><br />"; // Texto del email en formato HTML
        $mail->AltBody = "{$pro} \n\n "; // Texto sin formato HTML
       

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];
        //enviar correo
        $mail->Send();
    }
    
public function TotalPropuestas()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) FROM propuestas"
        );
         if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos[0];
            
        }
       return  $ban;
    }  
public function TotalElegibles()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) FROM propuestas where estado>=3 and dia_ele='ELEGIBLE'"
        );
         if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos[0];
            
        }
       echo $ban;
    } 
    
public function TotalNoElegibles()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) FROM propuestas where estado>=3 and dia_ele='NO ELEGIBLE'"
        );
         if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos[0];
            
        }
       echo $ban;
    }
    
public function TotalViables()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) FROM propuestas where estado=6 and dia_via='VIABLE'"
        );
         if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos[0];
            
        }
       echo $ban;
    } 
    
public function TotalNoViables()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) FROM propuestas where estado=6 and dia_via='NO VIABLE'"
        );
         if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos[0];
            
        }
       echo $ban;
    }
    
public function TotalNoEvaViables()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) FROM propuestas where estado=4 or estado=5  "
        );
         if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos[0];
            
        }
       echo $ban;
    }    
    
public function TotalNoevaluadas()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) FROM propuestas where estado<3"
        );
         if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos[0];
            
        }
       echo $ban;
    }      
public function TotalPropuestas2()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*) FROM propuestas "
        );
         if ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos[0];
            
        }
       echo $ban;
    }      
    public function TotalAct_eco_emp()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "  SELECT count(*),act_eco FROM empresas,propuestas,convocatoria,ciudad,departamento,region WHERE empresas.id=propuestas.id_empresa and propuestas.id_convocatoria =convocatoria.id and empresas.ciudad=ciudad.codigo and ciudad.departamento= departamento.codigo and departamento.region=region.codigo group by act_eco order by act_eco ASC "
        );
         while ($datos = mysqli_fetch_array($consulta)) {
        $ban+=$datos[0];
            
        }
       echo $ban;
    }  
    
    public function Act_econo_list($tot)
    {     
        
       $sql = "SELECT count(*),act_eco FROM empresas,propuestas,convocatoria,ciudad,departamento,region WHERE empresas.id=propuestas.id_empresa and propuestas.id_convocatoria =convocatoria.id and empresas.ciudad=ciudad.codigo and ciudad.departamento= departamento.codigo and departamento.region=region.codigo group by act_eco order by act_eco ASC";?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblact_econo',this.value)" style="padding-left:40px;"  >
<div class="col-md-12" style="text-align:center;"><i class="fas fa-sync-alt" title="Actualizar" onclick="Act_econoRp(<?php echo $tot;?>)" style="cursor:pointer;color:#0075b0;font-size:25px;"></i></div>
<table class="table table-bordered" id="tblact_econo"><thead style="background:#f8f9fa;">
    <tr><th width="70%" >Actividad económica</th><th width="15%">Frecuencia</th><th width="15%">Porcentaje</th></tr></thead><tbody id="bd-list-obs">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 $icon="";
 $observacion="";
 $fila=1;
 while ($datos = mysqli_fetch_array($consulta)) {
  $porcentaje=$datos[0]*100/$tot;
     echo "<tr ><td >$datos[1] </td><td>$datos[0]</td><td >".number_format($porcentaje, 1, '.', ',')."%</td></td></tr>";
     $fila++;
 }
 echo "</tbody></table>";
    }  
    
      public function TotalTam_emp()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(*),empresas.tam FROM empresas,propuestas,convocatoria,ciudad,departamento,region WHERE empresas.id=propuestas.id_empresa and propuestas.id_convocatoria =convocatoria.id and empresas.ciudad=ciudad.codigo and ciudad.departamento= departamento.codigo and departamento.region=region.codigo group by empresas.tam"
        );
         while ($datos = mysqli_fetch_array($consulta)) {
        $ban+=$datos[0];
            
        }
       echo $ban;
    } 
    
  public function TotalEmp_Reg()
    {     
        
        $ban=0;
       
        $consulta = mysqli_query(
            $this->conexion,
            "SELECT count(empresas.id) FROM empresas,propuestas,convocatoria,ciudad,departamento,region WHERE empresas.id=propuestas.id_empresa and propuestas.id_convocatoria =convocatoria.id and empresas.ciudad=ciudad.codigo and ciudad.departamento= departamento.codigo and departamento.region=region.codigo "
        );
         while ($datos = mysqli_fetch_array($consulta)) {
        $ban=$datos[0];
            
        }
       echo $ban;
    }     
    
    public function Tam_emp_list($tot)
    {     
        
       $sql = "SELECT count(*),tam FROM `empresas` group by tam order by tam ASC";?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblact_econo',this.value)" style="padding-left:40px;"  >
<div class="col-md-12" style="text-align:center;"><i class="fas fa-sync-alt" title="Actualizar" onclick="Act_econoRp(<?php echo $tot;?>)" style="cursor:pointer;color:#0075b0;font-size:25px;"></i></div>
<table class="table table-bordered" id="tblact_econo"><thead style="background:#f8f9fa;">
    <tr><th width="70%" >Tamaño empresa</th><th width="15%">Frecuencia</th><th width="15%">Porcentaje</th></tr></thead><tbody id="bd-list-obs">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 $icon="";
 $observacion="";
 $fila=1;
 while ($datos = mysqli_fetch_array($consulta)) {
  $porcentaje=$datos[0]*100/$tot;
     echo "<tr ><td >$datos[1] </td><td>$datos[0]</td><td >".number_format($porcentaje, 1, ',', '.')."%</td></td></tr>";
     $fila++;
 }
 echo "</tbody></table>";
    }  
    
   public function lObserv()
    {$sql = "SELECT observaciones.*,usuarios.nombre,rol.nombre as nrol,CONCAT(propuestas.id,'-',propuestas.nom) as npropu,CONCAT(empresas.nit,'-',empresas.num_ver,',',empresas.razon_social) as nem FROM `observaciones`,usuarios,rol,propuestas,empresas WHERE observaciones.usu = usuarios.cod and usuarios.rol=rol.cod and observaciones.pro=propuestas.id and propuestas.id_empresa=empresas.id order by observaciones.fecha DESC";?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:37px;"></i>
<div class="col-md-12" ><i class="fas fa-sync-alt" title="Actualizar" onclick="Cargar('Observaciones.php', 'cont-convo-fun')" style="cursor:pointer;color:#0075b0;font-size:25px;"></i><i class="fa fa-file-excel" title="Descargar excel" onclick="window.open('templates/modules/ExcelObservaciones.php')" style="cursor:pointer;color:green;margin-left: 30px;font-size:25px;"></i></div>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="lObserv()" style="padding-left:40px;"  >

<table class="table table-bordered" id="tblobservaciones"><thead style="background:#f8f9fa;">
    <tr><th width="20%" >Proyecto </th><th width="20%" >Empresa </th><th width="10%" >Usuario</th><th width="10%">Rol</th><th width="10%" >Fecha</th><th width="10%">Fase</th><th width="20%">Observación</th></tr></thead><tbody id="bd-list-obs">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 $icon="";
 $fase="";
 $fila=1;

 while ($datos = mysqli_fetch_array($consulta)) {
    
      if($datos['fase']=="ele"){
          $fase="ELEGIBILIDAD";
      }  
      else{
          $fase="VIABILIDAD";
      }
    
     
     echo "<tr ><td >$datos[npropu] </td><td >$datos[nem] </td><td >$datos[nombre] </td><td>$datos[nrol]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td>$fase</td><td>$datos[observacion]</td></tr>";
     $fila++;
 }
 echo "</tbody></table>";
    }  
  public function lObservcp()
    {$sql = "SELECT observaciones.*,usuarios.nombre,rol.nombre as nrol,CONCAT(propuestas.id,'-',propuestas.nom) as npropu,CONCAT(empresas.nit,'-',empresas.num_ver,',',empresas.razon_social) as nem FROM `observaciones`,usuarios,rol,propuestas,empresas WHERE observaciones.usu = usuarios.cod and usuarios.rol=rol.cod and observaciones.pro=propuestas.id and propuestas.id_empresa=empresas.id and (propuestas.apro_ele=1 || propuestas.apro_via=1) order by observaciones.fecha DESC";?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:37px;"></i>
<div class="col-md-12" ><i class="fas fa-sync-alt" title="Actualizar" onclick="Cargar('Observaciones.php', 'cont-convo-fun')" style="cursor:pointer;color:#0075b0;font-size:25px;"></i><i class="fa fa-file-excel" title="Descargar excel" onclick="window.open('templates/modules/ExcelObservacionescp.php')" style="cursor:pointer;color:green;margin-left: 30px;font-size:25px;"></i></div>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="lObserv()" style="padding-left:40px;"  >

<table class="table table-bordered" id="tblobservaciones"><thead style="background:#f8f9fa;">
    <tr><th width="20%" >Proyecto </th><th width="20%" >Empresa </th><th width="10%" >Usuario</th><th width="10%">Rol</th><th width="10%" >Fecha</th><th width="10%">Fase</th><th width="20%">Observación</th></tr></thead><tbody id="bd-list-obs">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 $icon="";
 $fase="";
 $fila=1;

 while ($datos = mysqli_fetch_array($consulta)) {
    
      if($datos['fase']=="ele"){
          $fase="ELEGIBILIDAD";
      }  
      else{
          $fase="VIABILIDAD";
      }
    
     
     echo "<tr ><td >$datos[npropu] </td><td >$datos[nem] </td><td >$datos[nombre] </td><td>$datos[nrol]</td><td >".$this->FormatDate2($datos['fecha'])."</td><td>$fase</td><td>$datos[observacion]</td></tr>";
     $fila++;
 }
 echo "</tbody></table>";
    } 
    
}
?>

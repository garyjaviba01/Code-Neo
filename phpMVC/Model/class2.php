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
        //	$conex= mysqli_connect("localhost","root","","convecfc_neo");
        mysqli_query($conex, "set names 'utf8'");
        //asignar a la variable $conexion el retorno del metodo conectar()
        $this->conexion = $conex;
    }

    public function Listarsinasigele()
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT propuestas.id,propuestas.nom,CONCAT(empresas.nit,',',empresas.razon_social) as emp FROM `propuestas`,empresas where propuestas.id_empresa=empresas.id and propuestas.id not in(SELECT id_propuesta FROM `usuariosxpropuesta_ele` where criterio>1 ) GROUP by propuestas.id order by propuestas.nom asc"
        );

        echo "<input type='text'  placeholder='Filtrar datos' class='form-control' onkeyup=\"TableFilter('#tblasigeleN',this.value)\"><table class='table table-bordered' id='tblasigeleN'><thead style='background:#f8f9fa;'><tr><th>Id</th><th>Proyecto</th><th>Empresa</th></tr></thead><tbody id='bd-list-convos'>";
        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

            echo "<tr ><td>$datos[id]</td><td >$datos[nom]</td><td >$datos[emp]</td></tr>";

            $fila++;
        }

        if ($fila == 1) {
            echo "<tr ><td colspan='4'>No hay proyecto sin asignar a elegibilidad</td></tr>";
        }
        "</tbody></table>";
    }

    public function ListarsinasigeleJur()
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "SELECT propuestas.id,propuestas.nom,CONCAT(empresas.nit,',',empresas.razon_social) as emp FROM `propuestas`,empresas where propuestas.id_empresa=empresas.id and propuestas.id not in(SELECT id_propuesta FROM `usuariosxpropuesta_ele` where criterio=1) GROUP by propuestas.id order by propuestas.nom asc"
        );

        echo "<input type='text'  placeholder='Filtrar datos' class='form-control' onkeyup=\"TableFilter('#tblasigeleN',this.value)\"><table class='table table-bordered' id='tblasigeleN'><thead style='background:#f8f9fa;'><tr><th>Id</th><th>Proyecto</th><th>Empresa</th></tr></thead><tbody id='bd-list-convos'>";
        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

            echo "<tr ><td>$datos[id]</td><td >$datos[nom]</td><td >$datos[emp]</td></tr>";

            $fila++;
        }

        if ($fila == 1) {
            echo "<tr ><td colspan='3'>No hay proyecto sin asignar a elegibilidad</td></tr>";
        }
        "</tbody></table>";
    }

    public function Listarsinasigvia()
    {
        $consulta2 = mysqli_query(
            $this->conexion,
            "select propuestas.id,propuestas.nom,CONCAT(empresas.nit,',',empresas.razon_social) as emp FROM `propuestas`,empresas where propuestas.id_empresa=empresas.id and propuestas.estado=4 and propuestas.`dia_ele`='ELEGIBLE'"
        );

        echo "<input type='text'  placeholder='Filtrar datos' class='form-control' onkeyup=\"TableFilter('#tblasigeleN',this.value)\"><table class='table table-bordered' id='tblasigeleN'><thead style='background:#f8f9fa;'><tr><th>Id</th><th>Proyecto</th><th>Empresa</th></tr></thead><tbody id='bd-list-convos'>";
        $fila = 1;
        while ($datos = mysqli_fetch_array($consulta2)) {
            //$id,$nit,$raz,$act,$tam,$dep,$ciu,$dir,$cp,$tel,$ema,$ndoc,$dcrl,$grl,$aluc,$rep

            echo "<tr ><td>$datos[id]</td><td >$datos[nom]</td><td >$datos[emp]</td></tr>";

            $fila++;
        }

        if ($fila == 1) {
            echo "<tr ><td colspan='3'>No hay proyecto sin asignar a viabilidad</td></tr>";
        }
        "</tbody></table>";
    }
    
   public function list_pro_sigp()
    {
        $opt = "<option selected disabled value='none' id='sel-pro-def'>Seleccione...</option>";
        $consulta = mysqli_query($this->conexion, "select num_rad,id,nom from propuestas");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['num_rad'] . "'>" .$datos['num_rad']."-".$datos['nom'] . "</option>";
        }
        return $opt;
    }
    
    public function list_emp_sigp()
    {
        $opt = "<option selected disabled value='none' id='sel-emp-def'>Seleccione...</option>";
        $consulta = mysqli_query($this->conexion, "select id,razon_social from empresas");
        while ($datos = mysqli_fetch_array($consulta)) {
            $opt .= "<option value='" . $datos['id'] . "'>" .$datos['razon_social']."</option>";
        }
        return $opt;
    }
      public function CargarDatosDerPet($cod)
    {
        $array = [];
        $consulta = mysqli_query($this->conexion, "SELECT date(fec_rec),time(fec_rec),res,med_res,id_emp,SIGP,fase FROM `derechos_peticion` where  id='$cod'");
       
        if ($datos = mysqli_fetch_array($consulta)) {
            $array = [$datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6]];
        }
        return json_encode($array);
    }
    
     public function Del_DP($id)
    {
        $ban = false;
        mysqli_query($this->conexion, "delete from `derechos_peticion` where id=$id");
        
        if (mysqli_affected_rows($this->conexion) > 0) {
            $ban = true;
        }
        return $ban;
    }
    
    public function CargarProSIGP()
    {    
        $sql = "select propuestas.num_rad,propuestas.nom,CONCAT(empresas.nit,'-',empresas.num_ver) as nemp,empresas.razon_social from propuestas,empresas where propuestas.id_empresa=empresas.id"; ?>
<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i>
<input type="text"     placeholder="Buscar..."    class="form-control" onkeyup="TableFilter('#tblprosigp',this.value)" style="padding-left:40px;"  ><table class="table table-bordered" id="tblprosigp">
    <thead style="background:#f8f9fa;"><tr><th>SIGP</th><th>Título proyecto</th><th>Empresa</th></tr></thead><tbody id="bd-list-convos">
	<?php
 $consulta = mysqli_query($this->conexion, $sql);
 while ($datos = mysqli_fetch_array($consulta)) {
     
     echo "<tr onclick='SeleProsigp($datos[num_rad])' style='cursor:pointer;'><td>$datos[num_rad]</td><td>$datos[nom]</td><td>$datos[nemp], $datos[razon_social]</td></tr>";
 }
 echo "</tbody></table>";
    }
    
   public function  BuscarempresaSIGP($sigp){
       $sql = "SELECT id_empresa FROM `propuestas` WHERE num_rad=$sigp"; 

        $consulta = mysqli_query($this->conexion, $sql);
        if ($datos = mysqli_fetch_array($consulta)) 
        {
        echo $datos[0];
        }
       
   }
}
?>

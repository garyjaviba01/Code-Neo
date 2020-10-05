<?php 
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==5 ){
include("../../phpMVC/Model/class.php");
$obj=new transacciones;
$totalPro=$obj->TotalPropuestas(); 

?>

<div class="row" id="divpro" style="text-align: left;">
     <div class="col-md-12 " style="text-align: center; margin-bottom: 50px;margin-top:20px;">
     <?php
     $img="medidor0.png";
     if($totalPro>0 && $totalPro<=40)$img="medidor0-40.png";
     else if($totalPro>40 && $totalPro<=90)$img="medidor40-90.png";
     else if($totalPro>90 && $totalPro<130)$img="medidor90-130.png";
     else if($totalPro>130 && $totalPro<=180)$img="medidor130-180.png";
     else if($totalPro>180 && $totalPro<=230)$img="medidor180-230.png";
     else if($totalPro>230 && $totalPro<=280)$img="medidor230-280.png";
     else if($totalPro>280 && $totalPro<=310)$img="medidor280-310.png";
     else if($totalPro>310 && $totalPro<=370)$img="medidor310-370.png";
     else if($totalPro>370 && $totalPro<=410)$img="medidor370-410.png";
     else if($totalPro>410 && $totalPro<=460)$img="medidor410-460.png";
     else if($totalPro>460 && $totalPro<=510)$img="medidor460-510.png";
     else if($totalPro>510 && $totalPro<=560)$img="medidor510-560.png";
     else if($totalPro>560 && $totalPro<=600)$img="medidor560-600.png";
         else if($totalPro>600 )$img="medidor560-600.png";
     ?><img src='/templates/assets/<?php echo $img;?>'><br><br><h5 style="color: #196b95;">Propuestas registradas : <?php echo $totalPro; ?></h5></div>
     
    <div class="col-md-2" ></div>
    <div class="col-md-2 panel_divs" ><h5 style="color: #196b95;">Análisis regional de propuestas
</h5>
<i class='fa fa-chart-pie icon_sesion' title='Gráfica' onclick="ChartProyectos1()"></i><i class="fa fa-file-excel icon_sesion" title="Descargar excel" onclick="window.open('templates/modules/ExcelProyectos.php')" ></i>
<br><br><b>Total propuestas registradas : </b>  <?php 
echo $totalPro; 
?></div>
    
     <div class="col-md-1" ></div>
   <div class="col-md-2 panel_divs" ><h5 style="color: #196b95;">Análisis elegibilidad
</h5>
<i class='fa fa-chart-pie icon_sesion' title='Gráfica' onclick="ChartAnalisisEle1()"></i><i class="fa fa-file-excel icon_sesion" title="Descargar excel" onclick="window.open('templates/modules/ExcelProyectos.php')" ></i>
<br><br><b>Elegibles : </b><?php $obj->TotalElegibles();?><br><b>No elegibles : </b><?php $obj->TotalNoElegibles();?><br>
<b>Sin evaluar : </b><?php $obj->TotalNoevaluadas();?><br>
</div>
   
  <div class="col-md-1" ></div>
   <div class="col-md-2 panel_divs" ><h5 style="color: #196b95;">Actividades económicas
</h5>
<i class="fa fa-eye icon_sesion" title="ver" onclick="Act_econoRp(<?php $obj->TotalAct_eco_emp(); ?>)" ></i>
<br><br><b>Actividades económicas registradas : </b><?php $obj->TotalAct_eco_emp(); ?></div>
   
    <div class="col-md-2" ></div>
        <div class="col-md-2" ></div>
   <div class="col-md-2 panel_divs" ><h5 style="color: #196b95;">Tamaño de empresas
</h5>
<i class='fa fa-chart-pie icon_sesion' title='Gráfica' onclick="ChartTamanho1()"></i><i class="fa fa-file-excel icon_sesion" title="Descargar excel" onclick="window.open('templates/modules/ExcelEmpresas.php')" ></i>
<br><br><b>Empresas registradas : </b><?php $obj->TotalTam_emp();?></div> 
     <div class="col-md-1" ></div>
    <div class="col-md-2 panel_divs" ><h5 style="color: #196b95;">Análisis Viabilidad
</h5>
<i class='fa fa-chart-pie icon_sesion' title='Gráfica' onclick="ChartAnalisisVia1()"></i><i class="fa fa-file-excel icon_sesion" title="Descargar excel" onclick="window.open('templates/modules/ExcelProyectos.php')" ></i>
<br><br><b>Viables : </b><?php $obj->TotalViables(); ?><br><b>No viables : </b><?php $obj->TotalNoViables();?><br>
<b>Sin evaluar : </b><?php $obj->TotalNoEvaViables();?><br>
</div>

     <div class="col-md-1" ></div>
   
   
     <div class="col-md-2 panel_divs" ><h5 style="color: #196b95;">Análisis regional de empresas
</h5>
<i class='fa fa-chart-pie icon_sesion' title='Gráfica' onclick="ChartEmpresas1()"></i><i class="fa fa-file-excel icon_sesion" title="Descargar excel" onclick="window.open('templates/modules/ExcelEmpresas.php')" ></i>
<br><br><b>Empresas registradas : </b><?php $obj->TotalEmp_Reg()();?></div>
    <div class="col-md-2" ></div>
  


<?php    
}
?>

<?php
//session_start();
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==3)
{
/**include("../../models/EvalModel.php");
$obj= new  EvalMDL;
$conv="";
if(isset($_GET['pro']))
$conv=$_GET['pro'];**/
?>
<br>
<span class="pestanha pestanha_active" id="if1"  onclick="infoChange($('#if1'),1)" style="margin-left:-10px!important;">Empresa</span>
<span class="pestanha" id="if2" onclick="infoChange($('#if2'),2)">Proyecto</span>
<span class="pestanha" id="if3" onclick="infoChange($('#if3'),3)">Anexos</span>
<i class='fa fa-file-alt'  title='documento propuesta' onclick="window.open('fl-s/ans/test.pdf')" style='font-size:30px;cursor:pointer;position:absolute;right:10px;top:17px;color:#196B95;'></i>

<div  id='inf1' style="display:block;"><br>
    <table style="width:100%;" class='infemptb'>
        
     <tr class='blancas'><td ><b>Nit</b> </td> <td >897898780 -1</td></tr>
    <tr><td ><b>Razón social</b> </td><td >   Chocolateria Florida</td></tr>
    <tr class='blancas'><td ><b>Documento representante legal </b></td><td > Cédula ciudadanía</td></tr>
    <tr><td ><b>N. Documento </b></td><td >  1.087.765.345</td></tr>
    <tr class='blancas'><td ><b>Departamento </b></td><td > Santander</td></tr>
    <tr><td ><b>Ciudad </b></td><td >  Bucaramanga</td></tr>
    <tr class='blancas'><td ><b>Código postal</b> </td><td >  680003</td></tr>
    <tr><td ><b>Dirección</b></td><td > Cra. 34 # 56 -67 </td></tr>
    <tr class='blancas'><td ><b>Email</b></td><td > chocoflorida@gmail.com </td></tr>
    <tr><td ><b>Entidad con ánimo de lucro?</b></td><td > Si</td></tr>
    <tr class='blancas'><td ><b>Certificado camara de comercio o documento equivalente</b></td><td > Si </td></tr>
    <tr><td ><b>Fecha de expedición certificado</b></td><td > 2018-01-20 </td></tr>
     </table>
</div>     
<div  id='inf2' style="display:none;"><br>
    <table style="width:100%;" class='infemptb'>
        
     <tr class='blancas'><td ><b>Fecha recepción</b> </td> <td >2020-03-23</td></tr>
    <tr><td ><b>Carta postulación</b> </td><td >   Si</td></tr>
    <tr class='blancas'><td ><b>Documento que autorice al Representante legal a suscribir contratos de la cuantía estimada </b></td><td > Si</td></tr>
    <tr><td ><b>Fecha de expedición autorización</b></td><td > 2019-09-22</td></tr>
    <tr class='blancas'><td ><b>Carta de compromiso de aporte en contrapartida </b></td><td > Si</td></tr>
    <tr><td ><b>Fecha de expedición Carta</b></td><td > 2019-11-04</td></tr>
    <tr class='blancas'><td ><b>Valor total proyecto</b> </td><td >  $ 800.000.000</td></tr>
    <tr><td ><b>Valor a financiar</b></td><td > $600.000.000 </td></tr>
    <tr class='blancas'><td ><b>Valor total contrapartida</b></td><td > $200.000.000 </td></tr>
    <tr><td ><b>Valor contrapartida dinero</b></td><td > $100.000.000</td></tr>
    <tr class='blancas'><td ><b>Valor contrapartida especie</b></td><td > $100.000.000 </td></tr>
    <tr><td ><b>Formato de Plan de Transferencia</b></td><td > Si </td></tr>
    <tr class='blancas'><td ><b>Centro de formación Sena</b></td><td >Centro agroindustrial del oriente</td></tr>
    <tr><td ><b>Valor contrapartida Plan Transferencia</b></td><td > $150.000.000 </td></tr>
    <tr class='blancas'><td ><b>Valor financiación Plan Transferencia</b></td><td > $450.000.000 </td></tr>
    <tr><td ><b>Estado de situación financiera  31/12/19</b></td><td > Si </td></tr>
    <tr class='blancas'><td ><b>Valor financiación Plan Transferencia</b></td><td > $450.000.000 </td></tr>
    <tr><td ><b>Estado de resultados integrales a 31/12/19</b></td><td > Si </td></tr>
    <tr class='blancas'><td ><b>Cédula Revisor Fiscal / Contador</b></td><td > 1.098.234.654 </td></tr>
    <tr><td ><b>Tarjeta profesional Contador / revisor fiscal</b></td><td >1.087.623.487 </td></tr>
    <tr class='blancas'><td ><b>Certificado Junta Regional de Contadores</b></td><td > Si </td></tr>
    <tr><td ><b>Fecha de expedición Certificado</b></td><td >2018-03-30 </td></tr>
    <tr class='blancas'><td ><b>Utilidad neta</b></td><td > $.2000.000.000 </td></tr>
    <tr><td ><b>Activo corriente</b></td><td >$1.200.000.000 </td></tr>
    <tr class='blancas'><td ><b>Pasivo corriente</b></td><td > $200.000.000 </td></tr>
    <tr><td ><b>Pasivo total</b></td><td >$400.000.000 </td></tr>
    <tr class='blancas'><td ><b>Activo total</b></td><td > $1.200.000.000 </td></tr>
    <tr><td ><b>Pasivos a largo plazo</b></td><td >$300.000.000 </td></tr>
     <tr class='blancas'><td ><b>Pasivos a corto plazo</b></td><td > $1.200.000.000 </td></tr>
    <tr><td ><b>EBITDA</b></td><td >$300.000.000 </td></tr>
    <tr class='blancas'><td ><b>Certificación pago parafiscales</b></td><td > Si </td></tr>
    <tr><td ><b>Número radicación en la plataforma de registro</b></td><td >7876545 </td></tr>
    <tr class='blancas'><td ><b>Fecha de radicación</b></td><td > 2020-09-06 </td></tr>
   </table> 
</div>
<div  id='inf3' style="display:none;"><br>
    <table style="width:100%;"  class="table">
    <tr ><th ><b>Archivo</b> </th> <th >Folio</th><th >Ver</th></tr>    
     <tbody><tr ><td >Certificado camara de comercio </td> <td >45</td><td ><i class="fa fa-search" style="cursor:pointer;" ></i></td></tr>
    <tr ><td >Certificación pago parafiscales </td> <td >78</td><td ><i class="fa fa-search" style="cursor:pointer;" ></i></td></tr>
    <tr ><td >Formato de Plan de Transferencia </td> <td >90</td><td ><i class="fa fa-search" style="cursor:pointer;" ></i></td></tr>
    <tr ><td >Carta postulación </td> <td >56</td><td ><i class="fa fa-search" style="cursor:pointer;" ></i></td></tr></tbody>
     </table>
</div>


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

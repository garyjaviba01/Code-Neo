<?php /** 
     Archivo para cargar un proyecto que se va a vizualizar por el usuario evaluador de viabilidad 
     si existen las cookies relacionadas con los perfiles permitido abre el archivo de lo contrario envia a inicio de sesion 
      **/
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==4){

?>

<script>
    $( document ).ready(function() {
    <?php if(isset($_GET['id']))
    {
    // funcion para cargar todos los datos del proyecto y colocarlos en las respectivos elementos input para vizualización    
    echo "CargarDatosProusu($_GET[id])" ;
    }
    ?>
    });
</script>
<a href="#pan"><i class="fa fa-arrow-alt-circle-up icon_up"></i></a><input type="hidden" id="idProoo" />
<!-- bloque datos de proyecto-->
<div id="infogenpro">
    <div style="color: #0075b0; font-size: 18px; text-align: center;">
        <br />
        <b>Datos básicos</b> <br />
    </div>
    <br />
    <div class="row" id="divpro">
        <div class="col-md-12">
            <div class="form-group">
                <label>
                    Título <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help1_1').css('display','block')" onmouseout="$('#help1_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help1_1">Título o nombre del proyecto</span>
                </label>

                <textarea id="nom" class="form-control inps-forms" onkeyup="Maius()" disabled></textarea>
            </div>
        </div>
        <div class="col-md-6" style="display:none;">
            <div class="form-group">
                <label>
                    Convocatoria <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help2_1').css('display','block')" onmouseout="$('#help2_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help2_1">Convocatoria a la que aplica el proyecto</span>
                </label>
                <select id="conv" class="custom-select inps-forms mb-3">
                   <?php include("../../phpMVC/Model/class.php");
    $obj=new transacciones;
    // funcion para cargar convocatorias
    echo $obj->ComboConvo(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Empresa</label><span class="busqueda"><!--<i class="fa fa-search" onclick="CargarEmpPro()" ></i>--></span>
                <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help3_1').css('display','block')" onmouseout="$('#help3_1').css('display','none')"></i>
                <span class="tooltiptext" id="help3_1">Empresa que presenta el proyecto</span>
                <select id="emp" class="custom-select inps-forms mb-3" disabled>
                    <?php 
                        // funcion para cargar empresas                
                        echo $obj->ComboEmpresas(); 
                    ?>
                </select>
            </div>
        </div>
<div class="col-md-3">
            <div class="form-group">
                <label>
                    Fecha radicación <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help6_1').css('display','block')" onmouseout="$('#help6_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help6_1">Fecha de radicación del proyecto en SIGP</span>
                </label>
                <input type="date" id="fec_rad" class="form-control inps-forms" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    Fecha recepción <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help4_1').css('display','block')" onmouseout="$('#help4_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help4_1">Fecha de recepción del proyecto en CPC Oriente</span>
                </label>
                <input type="date" id="fec_rec" class="form-control inps-forms" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    Número de radicación-SIGP<i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help5_1').css('display','block')" onmouseout="$('#help5_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help5_1">Número de radicación del proyecto en sistema de información de contratante</span>
                </label>
                <input type="hidden" id="id" />
                <input type="text" id="num_rad" class="form-control inps-forms" onkeypress="return soloNumeros(event)" disabled />
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    Duración (meses) <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help7_1').css('display','block')" onmouseout="$('#help7_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help7_1">Duración del proyecto en meses</span>
                </label>
                <input type="text" id="duracion" class="form-control inps-forms" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group" style="text-align: left;">
                <label>
                    Tipo de proyecto 
                </label>
                <select id="tip_pro" class="custom-select inps-forms mb-3" disabled>
                   
                   <option value="INNOVACIÓN,SOFISTICACIÓN DE PRODUCTOS O SERVICIOS">INNOVACIÓN,SOFISTICACIÓN DE PRODUCTOS O SERVICIOS</option>
                    <option value="INNOVACIÓN,SOFISTICACIÓN DE PROCESOS">INNOVACIÓN,SOFISTICACIÓN DE PROCESOS</option>
                   
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>
                    Departamento ejecución <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help8_1').css('display','block')" onmouseout="$('#help8_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help8_1">Departamento de ejecución del proyecto</span>
                </label>
                <select id="dep" class="custom-select inps-forms mb-3" onchange="CargarCiudades()" disabled>
                   <?php include("ciudad.php");
                      // listar departamentos
                      listarDep();
			      	?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>
                    Ciudad ejecución <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help9_1').css('display','block')" onmouseout="$('#help9_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help9_1">Ciudad de ejecución del proyecto</span>
                </label>
                <select id="ciu" class="custom-select inps-forms mb-3" disabled>
                   <?php 
                        // Listar ciudades
                        listarCiu();
				    ?>
                </select>
            </div>
        </div>

        <div class="col-md-12" style="color: #0075b0; text-align: center; font-size: 18px; margin-bottom: 20px;">
            <br />
            <b></b>
        </div>
        <!-- fin bloque datos de proyecto-->
        <!-- bloque datos financieros de proyecto-->
        <div class="col-md-12" style="color: #0075b0; font-size: 18px; margin: 20px 0; text-align: center;"><b>Datos financieros del proyecto</b> <br /></div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Valor total proyecto</label>
                <input type="text" id="val_pro" class="form-control inps-forms" onkeyup="moneda('val_pro')" onkeypress="return soloNumeros(event)" disabled />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Valor a financiar</label>
                <input type="text" id="val_fin" class="form-control inps-forms" onkeyup="moneda('val_fin')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Valor total contrapartida</label>
                <input type="text" id="val_tot_con" class="form-control inps-forms" onkeypress="return soloNumeros(event)" onkeyup="moneda('val_tot_con')" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Valor contrapartida dinero</label>
                <input type="text" id="val_con_din" class="form-control inps-forms" onkeypress="return soloNumeros(event)" onkeyup="moneda('val_con_din')" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Valor contrapartida especie</label>
                <input type="text" id="val_con_esp" class="form-control inps-forms" onkeyup="moneda('val_con_esp')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-12" style="color: #0075b0; font-size: 18px; margin: 20px 0; text-align: center;"><b>Datos financieros de la empresa</b> <br /></div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Utilidad neta/Utilidad  del ejercicio</label>
                <input type="text" id="uti_net" class="form-control inps-forms" onkeyup="moneda('uti_net')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Activo corriente</label>
                <input type="text" id="act_corr" class="form-control inps-forms" onkeyup="moneda('act_corr')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Pasivo corriente/pasivos a corto plazo</label>
                <input type="text" id="pas_corr" class="form-control inps-forms" onkeyup="moneda('pas_corr')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Pasivo Total</label>
                <input type="text" id="pas_tot" class="form-control inps-forms" onkeyup="moneda('pas_tot')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Activo total</label>
                <input type="text" id="act_tot" class="form-control inps-forms" onkeyup="moneda('act_tot')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Pasivos a largo plazo/pasivo no corriente</label>
                <input type="text" id="pas_lar_pla" class="form-control inps-forms" onkeyup="moneda('pas_lar_pla')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Pasivos a corto plazo</label>
                <input type="text" id="pas_cor_pla" class="form-control inps-forms" onkeyup="moneda('pas_cor_pla')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>EBITDA</label>
                <input type="text" id="EBITDA" class="form-control inps-forms" onkeyup="moneda('EBITDA')" onkeypress="return soloNumeros(event)" disabled/>
            </div>
        </div>
        <div class="col-md-12" id="divadd">
            <div class="form-group"></div>
        </div>
        <div class="col-md-12" id="divupd" style="display: none;">
            <div class="form-group"></div>
        </div>
    </div>
    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivPeva('divanx')">
                Anexos <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help10_1').css('display','block')" onmouseout="$('#help10_1').css('display','none')"></i>
                <span class="tooltiptext" id="help10_1">Documentos anexados al proyecto</span>
            </div>
        </div>
    </div>
    <!-- fin  bloque datos financieros de proyecto-->
    <!-- bloque anexos de proyecto-->
    <div>
        <div class="row" id="divanx" style="display: none;">
            <br />
            <div class="col-md-12" id="list_anex"></div>
        </div>
    </div>
</div>
<!-- fin bloque anexos de proyecto-->
<!-- bloque planes transferencia de proyecto-->
<div id="infoplanestras">
    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivPeva('divtra')">
                Planes de trasferencia
            </div>
        </div>
    </div>

    <div class="display_none" id="divtraP">
        <div class="row" style="padding-left: 15px;">
            <button class="btn lactive" id="link1" onclick="$('#divtraP').addClass('display_none');$('#listadoPT').removeClass('display_none');$('#link1').addClass('lactive');">Volver al listado</button><br />
            <br />
        </div>

        <div class="row" id="divtra">
            <div class="col-md-3">
                    <div class="form-group">
                        <label>
                            Valor Cofinanciación SENA
                            
                        </label>
                        <input type="hidden" id="cod_pt" />
                        <input type="text" id="nom_pt" class="form-control inps-forms"  disabled/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Valor contrapartida efectivo 
                        <input type="text" id="val_con_pt" class="form-control inps-forms" disabled/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Valor contrapartida especie </label>
                        <input type="text" id="val_fin_pt" class="form-control inps-forms" disabled />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Valor total plan de transferencia</label>
                        <input type="text" id="val_tot_pt" class="form-control inps-forms" disabled />
                    </div>
                </div>

            <div id="listCF" class="col-md-12"></div>
        </div>
    </div>
    <div id="listadoPT">
        <div id="list_pt"></div>
    </div>
</div>
<!-- fin  bloque planes transferencia de proyecto-->
<!-- bloque información adicional de proyecto-->
<div id="infoadicio">
    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivPeva('divtem_asoc')">
                Temáticas asociadas
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
        <div class="row" id="divtem_asoc" style="display: none;">
       
                <div id="listTA" class="col-md-12"></div>
        </div>
    </div>

    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivPeva('divent_ben')">
                Entidades beneficiarias
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
        <div class="row" id="divent_ben" style="display: none;">
            <div id="listEB" class="col-md-12"></div>
        </div>
    </div>

    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivPeva('divobj')">
                Objetivos
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
        <div class="row" id="divobj" style="display: none;">
            <div class="col-md-4">
                <div class="form-group">
                    <label>General</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <textarea id="obj_gen" class="form-control inps-forms" rows="7" disabled></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group"></div>
            </div>

            <div class="col-md-1">
                <div class="form-group">
                    Específicos
                </div>
            </div>
            <div class="col-md-11" id="obj_esp"></div>
        </div>
    </div>
    
    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivPeva('divprod')">
                Productos
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e0e0e0;">
        <div class="row" id="divprod" style="display: none;">
            <div class="col-md-1">
                <div class="form-group"></div>
            </div>
            <div class="col-md-11" id="produc"></div>
        </div>
    </div>
    
    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivPeva('divres')">
                Resultados
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
        <div class="row" id="divres" style="display: none;">
            <div class="col-md-1">
                <div class="form-group"></div>
            </div>
            <div class="col-md-11" id="resul"></div>
        </div>
    </div>
  
   
    
</div>
<!-- fin bloque informacion adicional de proyecto-->
<?php 
    
}
else
  {
?>
     <script>
         location.href = "index.php";
     </script>
<?php    
  }
?>


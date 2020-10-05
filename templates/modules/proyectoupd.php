<?php /** 
     Archivo para cargar un proyecto que se va a modificar por el gestor técnico o auxiliar técnico   
     si existen las cookies relacionadas con los perfiles permitido abre el archivo de lo contrario envia a inicio de sesion 
      **/
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5 || $_COOKIE['user_rol']==2)){?>
<script>
    $( document ).ready(function() {
    <?php if(isset($_GET['id']))
    {
    // funcion para cargar todos los datos del proyecto y colocarlos en las respectivos elementos input para modificación   
    echo "CargarDatosPro($_GET[id])" ;
    }
    ?>
    });
</script>
<a href="#pan"><i class="fa fa-arrow-alt-circle-up icon_up"></i></a><input type="hidden" id="id" />
<div style="text-align: left; width: 100%; padding: 5px; box-sizing: border-box;  border: 1px solid #0075b0;color:#FFF;font-size:14px; background: #0075b0; border-radius: 3px;">
    <span id="progeso_div">Registrar nuevo proyecto</span><br />
    <progress id="progresb" value="0" max="100" style="height: 30px;"> </progress> <span id="progresl" style="position: absolute; margin-left: -90px; margin-top: 6px; font-size: 12px; color: #000;">0%</span>
</div>
<div style="text-align: left; margin-top: 20px;">
    <span class="pestanha pestanha_active" id="infpro1" onclick="infoChangePro($('#infpro1'),1)">Datos básicos &nbsp;<i id="chekP1" class="fa fa-check-circle" style="color: #ccc; font-size: 18px;"></i></span>
    <span class="pestanha" id="infpro4" onclick="infoChangePro($('#infpro4'),4)">Información financiera &nbsp;<i id="chekP4" class="fa fa-check-circle" style="color: #ccc; font-size: 18px;"></i></span>
    <span class="pestanha" id="infpro2" onclick="infoChangePro($('#infpro2'),2)">Planes transferencia &nbsp;<i id="chekP2" class="fa fa-check-circle" style="color: #ccc; font-size: 18px;"></i></span>
    <span class="pestanha" id="infpro5" onclick="infoChangePro($('#infpro5'),5)">Anexos &nbsp;<i id="chekP5" class="fa fa-check-circle" style="color: #ccc; font-size: 18px;"></i></span>
    <span class="pestanha" id="infpro3" onclick="infoChangePro($('#infpro3'),3)">Información adicional &nbsp;<i id="chekP3" class="fa fa-check-circle" style="color: #ccc; font-size: 18px;"></i></span>
</div>
<!-- bloque datos de proyecto-->
<div id="infogenpro" class="conpes">
    <br />
    <br />
    <div style="color: red; text-align: left;">Campos obligatorios *</div>

    <br />
    <div class="row" id="divpro">
        <div class="col-md-12">
            <div class="form-group" style="text-align: left;">
                <label>
                    Título <span style="color: red;">*</span> <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help1_1').css('display','block')" onmouseout="$('#help1_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help1_1">Título del proyecto</span>
                </label>

                <textarea id="nom" class="form-control inps-forms" onkeyup="Maius()" onblur="Maius()" placeholder="Nombre del proyecto"></textarea>
            </div>
        </div>
        <div class="col-md-6"  style="display:none;">
            <div class="form-group" style="text-align: left;">
                <label>
                    Convocatoria <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help6_1').css('display','block')" onmouseout="$('#help6_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help6_1">Convocatoria a la que aplica el proyecto</span>
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
            <div class="form-group" style="text-align: left;">
                <label>Empresa <span style="color: red;">*</span></label>
                <span class="busqueda">
                    <i class="fa fa-search" onclick="CargarEmpPro()"></i>  </span>
                    <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help7_1').css('display','block')" onmouseout="$('#help7_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help7_1">Empresa que postula el proyecto</span>
              
                <select id="emp" class="custom-select inps-forms mb-3">
                    <option value="0">Seleccione...</option>
                    <?php 
                        // funcion para cargar empresas                
                        echo $obj->ComboEmpresas(); 
                    ?>
                </select>
            </div>
        </div>
 <div class="col-md-3">
            <div class="form-group" style="text-align: left;">
                <label>
                    Fecha radicación SIGP <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help4_1').css('display','block')" onmouseout="$('#help4_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help4_1">Fecha radicación del proyecto en sistema de información de contratante</span>
                </label>
                <input type="date" id="fec_rad" class="form-control inps-forms" /> <input type="hidden" id="id" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" style="text-align: left;">
                <label>
                    Fecha recepción <span style="color: red;">*</span>
                    <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help2_1').css('display','block')" onmouseout="$('#help2_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help2_1">Fecha recibido el proyecto en CPC Oriente</span>
                </label>
                <input type="date" id="fec_rec" class="form-control inps-forms" placeholder="fecha recepción cpc" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" style="text-align: left;">
                <label>
                    Número de radicación-SIGP <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help3_1').css('display','block')" onmouseout="$('#help3_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help3_1">Número de radicado de proyecto en SIGP</span>
                </label>
                <input type="hidden" id="id" />
                <input type="text" id="num_rad" class="form-control inps-forms" placeholder="N. radicación Colombia productiva" />
            </div>
        </div>
       
        <div class="col-md-3">
            <div class="form-group" style="text-align: left;">
                <label>
                    Duración (meses) <span style="color: red;">*</span>
                    <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help5_1').css('display','block')" onmouseout="$('#help5_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help5_1">Duración de ejecución del proyecto en meses de 1 a 12</span>
                </label>
                <input type="text" id="duracion" class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="Duración proyecto" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" style="text-align: left;">
                <label>
                    Tipo de proyecto <span style="color: red;">*</span>
                </label>
                <select id="tip_pro" class="custom-select inps-forms mb-3" >
                    <option value="0">Seleccione...</option>
                   <option value="INNOVACIÓN,SOFISTICACIÓN DE PRODUCTOS O SERVICIOS">INNOVACIÓN,SOFISTICACIÓN DE PRODUCTOS O SERVICIOS</option>
                    <option value="INNOVACIÓN,SOFISTICACIÓN DE PROCESOS">INNOVACIÓN,SOFISTICACIÓN DE PROCESOS</option>
                   
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" style="text-align: left;">
                <label>
                    Departamento ejecución <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help8_1').css('display','block')" onmouseout="$('#help8_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help8_1">Departamento de ejecución el proyecto</span>
                </label>
                <select id="dep" class="custom-select inps-forms mb-3" onchange="CargarCiudades()">
                   <option value="0">Seleccione...</option>
                   <?php include("ciudad.php");
                      // listar departamentos
                      listarDep();
			      	?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" style="text-align: left;">
                <label>
                    Ciudad ejecución <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help9_1').css('display','block')" onmouseout="$('#help9_1').css('display','none')"></i>
                    
                    <span class="tooltiptext" id="help9_1">Ciudad de ejecución del proyecto</span>
                </label>
                <select id="ciu" class="custom-select inps-forms mb-3">
                    <option value="0">Seleccione...</option>
                   <?php 
                        // Listar ciudades
                        listarCiu();
				    ?>
                </select>
            </div>
        </div>
        <div class="col-md-12" id="divadd">
            <div class="form-group">
                <br />

                <button class="btn-functions" id="btn-add-pro" onclick="GuardarPro()"><i class="fas fa-check"></i>&nbsp;Guardar</button>
            </div>
        </div>
        <div class="col-md-12" id="divupd" style="display: none;">
            <div class="form-group">
                <br />
                <button class="btn-functions" id="btn-edt-pro" onclick="EditarPro()"><i class="fas fa-check"></i>&nbsp;Editar</button>
            </div>
        </div>
    </div>
</div>
<!-- fin bloque datos de proyecto-->
<!-- bloque datos financieros de proyecto-->
<div id="infofinanciera" class="conpes" style="display: none;">
    <br />
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
        <div class="row" id="divinfofin" style="display: block; padding: 15px;">
            <div style="color: red; text-align: left;">Campos obligatorios *</div>
            <br />

            <div>
                <div class="row">
                    <div class="col-md-12" style="color:#0075B0;font-size: 18px;margin: 20px; 0"><b>Datos financieros de proyecto</b> <br /></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Valor total proyecto </label>
                            <input type="text" id="val_pro" class="form-control inps-forms" readonly onkeyup="moneda('val_pro')" onkeypress="return soloNumeros(event)" value="0" placeholder="Total proyecto" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Valor a financiar <span style="color: red;">*</span></label>
                            <input type="text" id="val_fin" class="form-control inps-forms" onkeyup="moneda('val_fin');CalcularVTP()" onblur="moneda('val_fin');CalcularVTP()" onkeypress="return soloNumeros(event)" value="0" placeholder="Valor a financiar" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Valor Total contrapartida </label>
                            <input type="text" id="val_tot_con" class="form-control inps-forms" readonly onkeypress="return soloNumeros(event)" onkeyup="moneda('val_tot_con')" value="0" placeholder="Total contrapartida" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contrapartida especie <span style="color: red;">*</span></label>
                            <input type="text" id="val_con_esp" class="form-control inps-forms" onkeyup="moneda('val_con_esp');CalcularVTC()" onblur="moneda('val_con_esp');CalcularVTC()" onkeypress="return soloNumeros(event)" value="0" placeholder="Contrapartida especie" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contrapartida dinero <span style="color: red;">*</span></label>
                            <input type="text" id="val_con_din" class="form-control inps-forms" onkeypress="return soloNumeros(event)" onblur="moneda('val_con_din');CalcularVTC()" onkeyup="moneda('val_con_din');CalcularVTC()" value="0" placeholder="Contrapatida dinero" />
                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-12" style="color:#0075B0;font-size: 18px;margin: 20px; 0"><b>Datos financieros de la empresa</b> <br /></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Utilidad neta/utilidad del ejercicio </label>
                            <input type="text" id="uti_net" class="form-control inps-forms" onkeyup="moneda('uti_net')" onkeypress="return soloNumeros(event)" value="0" placeholder="Utilidad neta" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Activo corriente </label>
                            <input type="text" id="act_corr" class="form-control inps-forms" onkeyup="moneda('act_corr')" onkeypress="return soloNumeros(event)" value="0" placeholder="Activo corriente" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Pasivo corriente/pasivos a corto plazo </label>
                            <input type="text" id="pas_corr" class="form-control inps-forms" onkeyup="moneda('pas_corr')" onkeypress="return soloNumeros(event)" value="0" placeholder="Pasivo corriente" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Pasivo Total </label>
                            <input type="text" id="pas_tot" class="form-control inps-forms" onkeyup="moneda('pas_tot')" onkeypress="return soloNumeros(event)" value="0" placeholder="Pasivo total" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Activo total </label>
                            <input type="text" id="act_tot" class="form-control inps-forms" onkeyup="moneda('act_tot')" onkeypress="return soloNumeros(event)" value="0" placeholder="Activo total" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Pasivos a largo plazo/pasivo no corriente</label>
                            <input type="text" id="pas_lar_pla" class="form-control inps-forms" onkeyup="moneda('pas_lar_pla')" onkeypress="return soloNumeros(event)" value="0" placeholder="Pasivo largo plazo" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Pasivos a corto plazo </label>
                            <input type="text" id="pas_cor_pla" class="form-control inps-forms" onkeyup="moneda('pas_cor_pla')" onkeypress="return soloNumeros(event)" value="0" placeholder="Pasivo corto plazo" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>EBITDA</label>
                            <input type="text" id="EBITDA" class="form-control inps-forms" onkeyup="moneda('EBITDA')" onkeypress="return soloNumeros(event)" value="0" placeholder="EBITDA" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <br />
                            <button class="btn-functions" id="btn-edt-pro" onclick="EditarPro2()"><i class="fas fa-check"></i>&nbsp;Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin  bloque datos financieros de proyecto-->
<!-- bloque anexos de proyecto-->
<div id="infoAnexos" class="conpes" style="display: none;">
    <br />
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
        <div class="row" id="divanex" style="display: block;">
            <div style="color: red; text-align: left; padding: 15px;">Campos obligatorios *</div>
            <br />
            <div>
                <div class="row" id="divanx" style="display: none; padding-left: 15px;">
                    <br />
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>
                                Documento <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help10_1').css('display','block')" onmouseout="$('#help10_1').css('display','none')"></i>
                                <span class="tooltiptext" id="help10_1">Documento o anexo del proyecto</span>
                            </label>
                            <select id="docu_ane" class="custom-select inps-forms mb-3">
                                <?php 
                                    // cargar documentos
                                    echo $obj->ComboDocumentos(); 
                                 ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Número de folio <span style="color: red;">*</span> <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help866_1').css('display','block')" onmouseout="$('#help866_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help866_1">Número de folio inicial</span></label>
                            <input type="text" id="num_folio2" class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="N. Folio anexo" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fecha de expedición</label>
                            <input type="date" id="fec_exp" class="form-control inps-forms" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Archivo <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help11_1').css('display','block')" onmouseout="$('#help11_1').css('display','none')"></i>
                                <span class="tooltiptext" id="help11_1">Seleccione un archivo en cualquier formato, no superior a 40MB</span>
                            </label>
                            <br />
                            <input type="file" id="doc_ane" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn-functions" id="btn-add-anex" onclick="AddAnex()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar<span id="loadanex"></span></button>
                        </div>
                    </div>
                    <div class="col-md-12" id="list_anex"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin bloque anexos de proyecto-->
<!-- bloque planes transferencia de proyecto-->
<div id="infoplanestras" class="conpes" style="display: none;">
    <br />
    <br />
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
        <button class="btn lactive" id="link1" onclick="$('#divtraP').addClass('display_none');$('#listadoPT').removeClass('display_none');$('#link1').addClass('lactive');$('#link2').removeClass('lactive');CargarPt();">Ver planes</button>
        <button
            id="link2"
            style="margin-left: 30px;"
            class="btn"
            onclick="$('#divtraP').removeClass('display_none');$('#listadoPT').addClass('display_none');$('#link2').addClass('lactive');$('#link1').removeClass('lactive');$('#listCF').html('');limpiarFormPT()"
        >
            Agregar plan
        </button>
        <br />
        <br />
        <div class="display_none" id="divtraP">
            <div class="row" id="divtra">
                <div class="col-md-12" style="color: red; text-align: left; margin-bottom: 30px;">Campos obligatorios *</div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>
                            Valor Cofinanciación SENA<span style="color: red;">*</span>
                            <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help12_1').css('display','block')" onmouseout="$('#help12_1').css('display','none')"></i>
                            <span class="tooltiptext" id="help12_1">Valor de la cofinanciación del SENA</span>
                        </label>
                        <input type="hidden" id="cod_pt" />
                        <input type="text" id="nom_pt" class="form-control inps-forms" placeholder="Cofinanciación SENA" onkeypress="return soloNumeros(event)" onblur="moneda('nom_pt');CalcularVTPT()" onkeyup="moneda('nom_pt');CalcularVTPT()" value="0" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Valor contrapartida efectivo <span style="color: red;">*</span></label>
                        <input type="text" id="val_con_pt" class="form-control inps-forms" onkeypress="return soloNumeros(event)" onkeyup="moneda('val_con_pt');CalcularVTPT()" onblur="moneda('val_con_pt');CalcularVTPT()" placeholder="Valor contrapartida plan" value="0" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Valor contrapartida especie <span style="color: red;">*</span></label>
                        <input type="text" id="val_fin_pt" class="form-control inps-forms" onkeypress="return soloNumeros(event);" onkeyup="moneda('val_fin_pt');CalcularVTPT()" onblur="moneda('val_fin_pt');CalcularVTPT()" placeholder="Valor financiación plan" value="0" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Valor total plan de transferencia</label>
                        <input type="text" id="val_tot_pt" class="form-control inps-forms" onkeypress="return soloNumeros(event)" onkeyup="moneda('val_tot_pt')" placeholder="Valor total plan de transferencia" disabled />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn-functions" id="btn-add-pt" onclick="AddPt()"><i class="fas fa-save"></i>&nbsp;Guardar<span id="loadpt"></span></button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Centro de formación SENA  <span class="busqueda">
                    <i class="fa fa-search" onclick="CargarCenFor_fil()"></i>  </span></label>
                        <select id="cen_for" class="form-control inps-forms">
                            <?php 
                               // listar centros de formacion sena
                               include("centros_formacion.php"); 
                               listarCen();
				             ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Número de folio <span style="color: red;">*</span><i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help9866_1').css('display','block')" onmouseout="$('#help9866_1').css('display','none')"></i>
                    <span class="tooltiptext" id="help9866_1">Número de folio inicial</span></label>
                        <input type="text" id="num_folio" class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="N. folio plan" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>
                            Formato <i class="fa fa-question-circle" style="cursor: help; margin-left: 20px;" onmouseover="$('#help13').css('display','block')" onmouseout="$('#help13').css('display','none')"></i>
                            <span class="tooltiptext" id="help13">Seleccione un archivo de cualquier formato, no superior a 40MB</span>
                        </label>
                        <br />
                        <input type="file" id="formato" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn-functions" id="btn-add-cf" onclick="Addcf()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar<span id="loadcf"></span></button>
                    </div>
                </div>
                <div id="listCF" class="col-md-12"></div>
            </div>
        </div>
        <div id="listadoPT">
            <div id="list_pt"></div>
        </div>
    </div>
</div>
<!-- fin  bloque planes transferencia de proyecto-->
<!-- bloque información adicional de proyecto-->
<div id="infoadicio" class="conpes" style="display: none;">
    <br />
    <br />
   <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivP('divtem_asoc')">
                Temáticas asociadas
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
        <div class="row" id="divtem_asoc" style="display: none;">
             <div class="col-md-6">
                    <div class="form-group">
                        <label>Temáticas</label>
                        <select id="tema_" class="form-control inps-forms">
                           <?php 
                               // listar tematicas
                               
                               echo $obj->ComboTematicas(); 
				             ?>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <br>
                        <button class="btn-functions" id="btn-add-addtem" onclick="Addtem_Asc()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar<span id="loadtemasc"></span></button>
                    </div>
                </div>
                <div id="listTA" class="col-md-12"></div>
        </div>
    </div>


    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivP('divent_ben')">
                Entidades beneficiarias
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
         <div class="row" id="divent_ben" style="display: none;">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nit <span style="color: red;">*</span></label>
                     <input type="text" id="nit_emp_ben" maxlength='14' class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="NIT" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                     <label>Número de verificación <span style="color: red;">*</span></label>
                     <input type="text" id="num_ver" maxlength='1' class="form-control inps-forms" onkeypress="return soloNumeros(event)" placeholder="Número de verificación" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                     <label>Razón social <span style="color: red;">*</span></label>
                     <input type="text" id="raz_soc"  class="form-control inps-forms"  placeholder="Razón social" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                     <label>Fecha de constitución <span style="color: red;">*</span></label>
                     <input type="date" id="fec_con"  class="form-control inps-forms"  placeholder="Fecha de constitución de la entidad" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                        <br>
                        <button class="btn-functions" id="btn-add-addEB" onclick="AddEB()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar<span id="loadEB"></span></button>
                    </div>
            </div>
            <div id="listEB" class="col-md-12"></div>
        </div>
    </div>
    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivP('divobj')">
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
                    <textarea id="obj_gen" class="form-control inps-forms" rows="7" placeholder="Objetivo general"></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button class="btn-functions" id="btn-add-pers" onclick="AddObjGen()"><i class="fas fa-check"></i>&nbsp;Guardar</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Especificos</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <textarea id="obj_esp1" class="form-control inps-forms" placeholder="Objetivo especificos" rows="7"> </textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button class="btn-functions" id="btn-add-pers" onclick="AddObjEsp()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar</button>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group"></div>
            </div>
            <div class="col-md-11" id="obj_esp"></div>
        </div>
    </div>
    
    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivP('divprod')">
                Productos
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e0e0e0;">
        <div class="row" id="divprod" style="display: none;">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nombre</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <textarea id="des_pro" class="form-control inps-forms" placeholder="Nombre del producto" rows="7"></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button class="btn-functions" id="btn-add-pers" onclick="AddProdu()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar</button>
                </div>
            </div>

            <div class="col-md-1">
                <div class="form-group"></div>
            </div>
            <div class="col-md-11" id="produc"></div>
        </div>
    </div>
    <div>
        <div>
            <div class="encabezadospro" onclick="MostrarDivP('divres')">
                Resultados
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e0e0e0; background: #fff;">
        <div class="row" id="divres" style="display: none;">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nombre</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <textarea id="des_res" class="form-control inps-forms" placeholder="Nombre del resultado" rows="7"></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button class="btn-functions" id="btn-add-pers" onclick="AddRes()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar</button>
                </div>
            </div>

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

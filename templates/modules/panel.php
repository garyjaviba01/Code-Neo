<?php 
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && $_COOKIE['user_rol']==5 ){
  include("../../phpMVC/Model/class.php");
  $obj=new transacciones;
  $totalPro=$obj->TotalPropuestas(); 
?>

  <!-- ============================================================
  *CARGADOR CENTRAL 
  ============================================================= -->
  <div class="row" id="divpro" style="text-align: left;">
    <div class="col-md-12 container-fluid" style="text-align: center; margin-bottom: 50px;margin-top:20px;">
      <div class="card">
        <div class="card-body">
          <br>
          <div id="progress-pan"></div>
          <br>
        </div>
        <div class="card-footer">
         <h5 style="color: #196b95;">Propuestas registradas : <?php echo $totalPro; ?></h5>
        </div>
      </div>

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
      ?>
    </div>

  </div>
  <!-- ============================================================
  *CARGADORES ANALISIS
  ============================================================= -->
  <div class="container-fluid">
    <div class="card-columns">
      <!-- =============================================
      *Análisis regional de propuestas
      =============================================== -->
      <div class="card card-panel">
        <div class="card-header">
           <h5 style="color: #196b95;">Análisis regional de propuestas</h5>
        </div>
        <div class="card-body">
          <div class="card">
            <div class="card-body">
              <div id="container-pross" class="progg-big"></div>
            </div>
            <div class="card-footer terxt-center">
              <p>Total propuestas registradas</p>
              <hr>
              <strong><?php echo $obj->TotalPropuestas(); ?></strong>
            </div>
          </div>
          <br>
        </div>
        <div class="card-footer">
          <div class="btn-group special">
            <button type="button" class="btn btn-outline-primary" onclick="ChartProyectos1()">
              <i class='fa fa-chart-pie' title='Gráfica'></i>
            </button>
            <button type="button" class="btn btn-outline-info" onclick="window.open('templates/modules/ExcelProyectos.php')">
              <i class='fa fa-file-excel' title="Descargar excel"></i>
            </button>
          </div> 
        </div>
      </div>
      <!-- =============================================
      *Tamaño de empresas
      =============================================== -->
      <div class="card card-panel">
        <div class="card-header">
          <h5 style="color: #196b95;">Tamaño de empresas</h5>
        </div>
        <div class="card-body">
          <div class="card">
            <div class="card-body">
              <div class="progg-big" id="progg-tama"></div>
            </div>
            <div class="card-footer">
              <p>Empresas registradas</p>
              <hr>
              <strong><?php $obj->TotalTam_emp();?></strong>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="btn-group special">
            <button type="button" class="btn btn-outline-primary" onclick="ChartTamanho1()">
              <i class='fa fa-chart-pie' title='Gráfica'></i>
            </button>
            <button type="button" class="btn btn-outline-info" onclick="window.open('templates/modules/ExcelEmpresas.php')">
              <i class='fa fa-file-excel' title="Descargar excel"></i>
            </button>
          </div> 
        </div>
      </div>
      <!-- =============================================
      *Análisis elegibilidad
      =============================================== -->
      <div class="card card-panel">
        <div class="card-header">
          <h5 style="color: #196b95;">Análisis elegibilidad</h5>
          
        </div>
        <div class="card-body">
          
          <div class="card-group" style="margin-bottom: 30px">
            <div class="card">
              <div class="card-body">
                <div class="progg-small" id="progg-sinev"></div>
              </div>
              <div class="card-footer text-center">
                <p class="card-text">Sin evaluar</p>
                <hr>
                <strong><?php $obj->TotalNoevaluadas();?></strong>
              </div>
            </div>
          
            <div class="card">
              <div class="card-body">
                <div class="progg-small" id="progg-elegib"></div>
              </div>
              <div class="card-footer text-center">
                <p class="card-text">Elegibles</p>
                <hr>
                <strong><?php $obj->TotalElegibles();?></strong>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="progg-small" id="progg-noelegib"></div>
              </div>
              <div class="card-footer text-center">
                <p class="card-text">No elegibles</p>
                <hr>
                <strong><?php $obj->TotalNoElegibles();?></strong>
              </div>
            </div>
          </div>

        </div>
        
        <div class="card-footer">
          <div class="btn-group special">
            <button type="button" class="btn btn-outline-primary" onclick="ChartAnalisisEle1()">
              <i class='fa fa-chart-pie' title='Gráfica'></i>
            </button>
            <button type="button" class="btn btn-outline-info" onclick="window.open('templates/modules/ExcelProyectos.php')">
              <i class='fa fa-file-excel' title="Descargar excel"></i>
            </button>
          </div> 
        </div>
      </div>
      <!-- =============================================
      *Análisis Viabilidad
      =============================================== -->
      <div class="card card-panel">
        <div class="card-header">
          <h5 style="color: #196b95;">Análisis Viabilidad</h5>
        </div>
        <div class="card-body">
          
          <div class="card-group" style="margin-bottom: 30px">
            <div class="card">
              <div class="card-body">
                <div id="progg-via-sinev" class="progg-small"></div>
              </div>
              <div class="card-footer">
                <p>Sin Evaluar</p>
                <hr>
                <strong><?php $obj->TotalNoEvaViables();?></strong>                
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div id="progg-via-viab" class="progg-small"></div>
              </div>
              <div class="card-footer">
                <p>Viables: </p>
                <hr>
                <strong><?php $obj->TotalViables();?></strong>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div id="progg-via-noviab" class="progg-small"></div>
              </div>
              <div class="card-footer">
                <p>No viables</p>
                <hr>
                <strong><?php $obj->TotalNoViables();?></strong>                
              </div>
            </div>
          </div>

        </div>
       
        <div class="card-footer">
          <div class="btn-group special">
            <button type="button" class="btn btn-outline-primary" onclick="ChartAnalisisVia1()">
              <i class='fa fa-chart-pie' title='Gráfica'></i>
            </button>
            <button type="button" class="btn btn-outline-info" onclick="window.open('templates/modules/ExcelProyectos.php')">
              <i class='fa fa-file-excel' title="Descargar excel"></i>
            </button>
          </div> 
        </div>
      </div>
      <!-- =============================================
      *Actividades económicas
      =============================================== -->  
      <div class="card card-panel">
        <div class="card-header">
          <h5 style="color: #196b95;">Actividades económicas</h5>
        </div>
        <div class="card-body">
          <div class="card">
            <div class="card-body">
              <div class="progg-big" id="progg-activeco"></div>
            </div>
            <div class="card-footer">
              <p>Actividades económicas registradas</p>
              <hr>
              <strong><?php $obj->TotalAct_eco_emp(); ?></strong>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="btn-group special">
            <button type="button" class="btn btn-outline-primary" onclick="Act_econoRp(<?php $obj->TotalAct_eco_emp(); ?>)">
              <i class='fa fa-eye' title='Gráfica'></i>
            </button>
          </div>
        </div>
      </div>
      <!-- =============================================
      *Análisis regional de empresas
      =============================================== -->
      <div class="card card-panel">
        <div class="card-header">
          <h5 style="color: #196b95;">Análisis regional de empresas</h5>
        </div>
        <div class="card-body">
          
          <div class="card">
            
            <div class="card-body">
              <div id="progg-empreg" class="progg-big"></div>
            </div>
            
            <div class="card-footer">
              <p>Empresas registradas</p>
              <hr>
              <strong><?php $obj->TotalEmp_Reg();?></strong>
            </div>
          </div>
          
        </div>
        <div class="card-footer">
          <div class="btn-group special">
            <button type="button" class="btn btn-outline-primary" onclick="ChartEmpresas1()">
              <i class='fa fa-chart-pie' title='Gráfica'></i>
            </button>
            <button type="button" class="btn btn-outline-info" onclick="window.open('templates/modules/ExcelEmpresas.php')">
              <i class='fa fa-file-excel' title="Descargar excel"></i>
            </button>
          </div> 
        </div>
      </div>

    </div>
  </div>
  <script type="text/javascript">
    var bar_panel = new ProgressBar.Line('#progress-pan', {
      strokeWidth: 4,
      easing: 'easeInOut',
      duration: 1400,
      color: '#82CEFF',
      trailColor: '#eee',
      trailWidth: 1,
      svgStyle: {width: '100%', height: '100%'},
      text: {
        style: {
          // Text color.
          // Default: same as stroke color (options.color)
          color: '#999',
          position: 'absolute',
          right: '0',
          top: '30px',
          padding: 0,
          margin: 0,
          transform: null
        },
        autoStyleContainer: false
      },
      from: {color: '#82CEFF'},
      to: {color: '#FF5F4B'},
      step: (state, bar_panel) => {
        bar_panel.setText(Math.round(bar_panel.value() * 100) + ' %');
      }
    });
    bar_panel.text.style.textAlign = 'center';
    bar_panel.text.style.margin = 'auto auto';
    bar_panel.text.style.fontSize = '1.5rem';
    bar_panel.animate(1.0); 
  </script>
  <script src="templates/js/panel-bars.js"></script>
<?php 
}
?>

<?php date_default_timezone_set('America/Bogota');
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5 || $_COOKIE['user_rol']==7 || $_COOKIE['user_rol']==8)){
		$data="";
		$labels="";
		$total=0;
		$x=0;
      //
		// $conect= mysqli_connect("localhost","cpcorien_us_neo","neo2020_","cpcorien_neo_bd");
    $conect= mysqli_connect("localhost","root","","cpcorien_neo_bd");
	       mysqli_query($conect,"set names 'utf8'");
        $query=mysqli_query($conect,"SELECT count(DISTINCT(empresas.id)),region.nombre FROM empresas,propuestas,convocatoria,ciudad,departamento,region WHERE empresas.id=propuestas.id_empresa and propuestas.id_convocatoria =convocatoria.id and empresas.ciudad=ciudad.codigo and ciudad.departamento= departamento.codigo and departamento.region=region.codigo  group by region.nombre");
        
        while($datos=mysqli_fetch_array($query))
        {
         if($x>0) {$data.=",".$datos[0].""; $labels.=",'".$datos[1]."'"; $total+=$datos[0]; } else{ $data.=$datos[0]; $labels.="'".$datos[1]."'"; $total+=$datos[0]; } $x++; } ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pie Chart</title>
        <script src="../js/Chart.min.js"></script>
        <script src="../js/utils.js"></script>
        <style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	body{
	    font-family:Arial, Helvetica, sans-serif;
	}
	</style>
    </head>
    <body>
        <div id="canvas-holder" style="width: 100%;">
            <canvas id="chart-area"></canvas>
        </div>
        <br />
        <div id="fecha"><?php $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $dias = ["", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
        $fecha=date('Y-m-d');
        echo "<b>Fecha reporte :</b> ".date("j", strtotime($fecha)) . " de " . $meses[date("n", strtotime($fecha))] . ", " . date("Y", strtotime($fecha));?> </div>
        <br>
        <div id="data" style="width: 100%;"></div>

        <script>
            function calcularPorcentaje(valor,total){
                  var resultado=Math.round(valor*100/total)
            }
            var randomScalingFactor = function() {
            	return Math.round(Math.random() * 100);
            };
            var total=<?php echo $total;?>;
            if(total==0){
            document.getElementById("data").innerHTML="No hay resultados para mostrar"
            document.getElementById("chart-area").style.display="none"
            }
            else{

            var html="<table class='table table-bordered' style='width:100%;'><tr><td bgcolor='#EFE0FC' align='center'><b>Región</b></td><td bgcolor='#EFE0FC' align='center'><b>N. Empresas</b></td><td bgcolor='#EFE0FC' align='center'><b>Porcentaje</b></td></tr>";
                  var registros=<?php echo $x;?>;
                  var colores=[window.chartColors.red,window.chartColors.orange,window.chartColors.yellow,window.chartColors.green,window.chartColors.blue,window.chartColors.purple,window.chartColors.gray,window.chartColors.white];
                  var color_html=["#F9CACA","#F9E0CA","#F9F8CA","#D5F9CA","#CADEF9","#CC9AF2","#D0CECE","#FFF"];
                  var bgcolor=[];
                  var datos=[<?php echo $data;?>];
                  var etiquetas=[<?php echo $labels;?>];
                  var cantidades=[];
                  for(var i=0;i<registros;i++)
                  {
                  cantidades[i]=Math.round(datos[i]*100/total)
                  html+="<tr style='background-color:"+color_html[i]+";'><td >"+etiquetas[i]+"</td><td align='right'>"+datos[i]+"</td><td align='right'>"+cantidades[i]+" %</td></tr>";
                  }
                 html+="<tr><td bgcolor='#EFE0FC' align='right'><b>"+registros+"</b></td><td bgcolor='#EFE0FC' align='right'><b>"+total+"</b></td><td bgcolor='#EFE0FC' align='right'><b>100%</b></td></tr></table>";
                  for(var i=0;i<registros;i++)
                  {
                    bgcolor[i]=colores[i]

                  }

                 document.getElementById("data").innerHTML=html+"</div>"
                 }
            var config = {
            	type: 'pie',
            	data: {
            		datasets: [{
            			data: datos,
            			backgroundColor: bgcolor,
            			label: 'Dataset 1'
            		}],
            		labels: etiquetas
            	},
            	options: {
            		responsive: true
            	}
            };



            window.onload = function() {
            	var ctx = document.getElementById('chart-area').getContext('2d');
            	window.myPie = new Chart(ctx, config);
            };

            document.getElementById('randomizeData').addEventListener('click', function() {
            	config.data.datasets.forEach(function(dataset) {
            		dataset.data = dataset.data.map(function() {
            			return randomScalingFactor();
            		});
            	});

            	window.myPie.update();
            });

            var colorNames = Object.keys(window.chartColors);
            document.getElementById('addDataset').addEventListener('click', function() {
            	var newDataset = {
            		backgroundColor: [],
            		data: [],
            		label: 'New dataset ' + config.data.datasets.length,
            	};

            	for (var index = 0; index < config.data.labels.length; ++index) {
            		newDataset.data.push(randomScalingFactor());

            		var colorName = colorNames[index % colorNames.length];
            		var newColor = window.chartColors[colorName];
            		newDataset.backgroundColor.push(newColor);
            	}

            	config.data.datasets.push(newDataset);
            	window.myPie.update();
            });

            document.getElementById('removeDataset').addEventListener('click', function() {
            	config.data.datasets.splice(0, 1);
            	window.myPie.update();
            });
        </script>
    </body>
</html>
<?php }
else{?>
<script>
    location.href = "index.php";
</script>
<?php    
}
?>

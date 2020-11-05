<?php date_default_timezone_set('America/Bogota');
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && ($_COOKIE['user_rol']==5 || $_COOKIE['user_rol']==7 || $_COOKIE['user_rol']==8)){
 
		$data=array();
		$labels="";
		$total=0;
		$x=0;
        $y=1;
        $values=array();
        $estado=array();
		// $conect= mysqli_connect("localhost","cpcorien_us_neo","neo2020_","cpcorien_neo_bd");
        $conect= mysqli_connect("localhost","root","","cpcorien_neo_bd");
		for($i=0;$i<7;$i++){
//SELECT count(DISTINCT(propuestas.id)),departamento.nombre FROM propuestas,convocatoria,ciudad,departamento,region WHERE propuestas.id_convocatoria =convocatoria.id and propuestas.ciiudad=ciudad.codigo and ciudad.departamento= departamento.codigo and departamento.region=region.codigo and region.codigo=$_REQUEST[region]  group by departamento.nombre		    
        $query=mysqli_query($conect,"SELECT count(*),propuestas.dia_via from propuestas,ciudad,departamento,region WHERE propuestas.ciiudad=ciudad.codigo and ciudad.departamento= departamento.codigo and departamento.region=region.codigo and region.codigo=$y  and estado>=4 group by propuestas.dia_via");
        
       
        $x=0;
        $values[$i][0]=0;
        $values[$i][1]=0;
        $values[$i][2]=0;
        $estado[$i][0]="SIN EVALUAR";
        $estado[$i][1]="VIABLE";
        $estado[$i][2]="NO VIABLE";
        while($datos=mysqli_fetch_array($query))
        {
         if($x==0) {
         
         if($datos[1]=="" || $datos[1]==NULL) 
         {
             $values[$i][0]=$datos[0];
             $estado[$i][0]="SIN EVALUAR";
             $values[$i][1]=0;
             $estado[$i][1]="VIABLE";
             $values[$i][2]=0;
             $estado[$i][2]="NO VIABLE";
         }
         else if($datos[1]=="VIABLE" )
         {
             $values[$i][0]=0;
             $estado[$i][0]="SIN EVALUAR";
             $values[$i][1]=$datos[0];
             $estado[$i][1]="VIABLE";
             $values[$i][2]=0;
             $estado[$i][2]="NO VIABLE";
         }
         else  if($datos[1]=="NO VIABLE" ) { 
             
             $values[$i][0]=0;
             $estado[$i][0]="SIN EVALUAR";
             $values[$i][1]=0;
             $estado[$i][1]="VIABLE";
             $values[$i][2]=$datos[0];
             $estado[$i][2]="NO VIABLE";
             
         }
         
         }
         else if($x==1)
         {
             
         if($datos[1]=="VIABLE" )
         {
             $values[$i][1]=$datos[0];
             $estado[$i][1]="VIABLE";
             $values[$i][2]=0;
             $estado[$i][2]="NO VIABLE";
         }
         else  if($datos[1]=="NO VIABLE" ) { 
             
            
             $values[$i][1]=0;
             $estado[$i][1]="VIABLE";
             $values[$i][2]=$datos[0];
             $estado[$i][2]="NO VIABLE";
             
         }
            
         }
         
         else if($x==2){
            if($datos[1]=="NO VIABLE" ) { 
             
             $values[$i][2]=$datos[0];
             $estado[$i][2]="NO VIABLE";
             
         }
            
             }
            $x++; 
          $total+=$datos[0];  
            
        }
    
      
        $a=$values[$i][0];
        $b=$values[$i][1];
        $c=$values[$i][2];
        $d=$estado[$i][0];
        $e=$estado[$i][1];
        $f=$estado[$i][2];
       
        $data[$i][0]="".$a.",".$b.",".$c."";
            
        $data[$i][1]="'".$d."','".$e."','".$f."'";    
      
		$y++;  
		
		}	
		
 ?>
<!doctype html>
<html>

<head>
	<title>Horizontal Bar Chart</title>
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
	table td{
    text-align:center;
}
	</style>
</head>

<body>
	<div id="container" style="width: 100%;">
		<canvas id="canvas"></canvas>
	</div>
  <br />
        <div id="fecha"><?php $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $dias = ["", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
         $regiones = ["AMAZONAS", "ANTIOQUIA Y EJE CAFETERO", "CARIBE", "CENTRAL", "ORINOQUIA", "PACÍFICO", "SANTANDERES"];
         $color_html=["#F9CACA","#F9E0CA","#F9F8CA","#D5F9CA","#CADEF9","#CC9AF2","#D0CECE","#FFF"];
        $fecha=date('Y-m-d');
        echo "<b>Fecha reporte :</b> ".date("j", strtotime($fecha)) . " de " . $meses[date("n", strtotime($fecha))] . ", " . date("Y", strtotime($fecha));?> </div>
        <br>
        <div id="data" style="width: 100%;">
         <table class='table table-bordered' style='width:100%;'><tr><td bgcolor='#EFE0FC' align='center'><b>Región</b></td><td bgcolor='#EFE0FC' align='center'><b>Sin evaluar</b></td><td bgcolor='#EFE0FC' align='center'><b>Viable</b></td><td bgcolor='#EFE0FC' align='center'><b>No viable</b></td><td bgcolor='#EFE0FC' align='center'><b>Total región</b></td></tr>  
         <?php 	
         for($i=0;$i<7;$i++){
           ?>  
            
            <tr style='background-color:<?php echo $color_html[$i];?>'><td style="text-align:left;"><?php echo $regiones[$i];?></td><td ><?php echo $values[$i][0];?></td><td ><?php echo $values[$i][1];?></td><td ><?php echo $values[$i][2];?></td><td ><?php echo array_sum($values[$i]);?></td></tr>
            
        <?php      
         }
         ?>
         
         </table>
            
        </div>
	<script>
	 var total=<?php echo $total;?>;
            if(total==0){
            document.getElementById("data").innerHTML="No hay resultados para mostrar"
            document.getElementById("canvas").style.display="none"
            }
        else{    
		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var color = Chart.helpers.color;
	    var colores=[window.chartColors.red,window.chartColors.orange,window.chartColors.yellow,window.chartColors.green,window.chartColors.blue,window.chartColors.purple,window.chartColors.gray,window.chartColors.white];
		var horizontalBarChartData = {
			labels: ['SIN EVALUAR', 'VIABLE', 'NO VIABLE'],
			datasets: [{
				label: 'AMAZONAS',
				backgroundColor: color(colores[0]).alpha(0.5).rgbString(),
				borderColor: colores[0],
				borderWidth: 1,
				data: [
				<?php echo  $data[0][0];?>
				]
			}, {
				label: 'ANTIOQUIA Y EJE CAFETERO',
				backgroundColor: color(colores[1]).alpha(0.5).rgbString(),
				borderColor: colores[1],
				data: [
				<?php echo  $data[1][0];?>
				]
			},
			{
				label: 'CARIBE',
				backgroundColor: color(colores[2]).alpha(0.5).rgbString(),
				borderColor: colores[2],
				borderWidth: 1,
				data: [
					<?php echo  $data[2][0];?>
				]
			}, {
				label: 'CENTRAL',
				backgroundColor: color(colores[3]).alpha(0.5).rgbString(),
				borderColor: colores[3],
				data: [
				<?php echo  $data[3][0];?>
				]
			},
			{
				label: 'ORINOQUIA',
				backgroundColor: color(colores[4]).alpha(0.5).rgbString(),
				borderColor: colores[4],
				borderWidth: 1,
				data: [
					<?php echo  $data[4][0];?>
				]
			}, {
				label: 'PACÍFICO',
				backgroundColor: color(colores[5]).alpha(0.5).rgbString(),
				borderColor: colores[5],
				data: [
				<?php echo  $data[5][0];?>
				]
			},{
				label: 'SANTANDERES',
				backgroundColor: color(colores[6]).alpha(0.5).rgbString(),
				borderColor: colores[6],
				data: [
				<?php echo  $data[6][0];?>
				]
			}
			
			
			]

		};
}
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myHorizontalBar = new Chart(ctx, {
				type: 'bar',
				data: horizontalBarChartData,
				options: {
					indexAxis: 'y',
					// Elements options apply to all of the options unless overridden in a dataset
					// In this case, we are setting the border of each horizontal bar to be 2px wide
					elements: {
						rectangle: {
							borderWidth: 2,
						}
					},
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: ''
					}
				}
			});

		};

	
	
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

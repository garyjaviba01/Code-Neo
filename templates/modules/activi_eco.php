<?php
$activi_eco = array(
  array('id' => '18','nom' => 'Actividades artísticas, de entretenimiento y recreación'),
  array('id' => '17','nom' => 'Actividades de atención de la salud humana y de asistencia social'),
  array('id' => '20','nom' => 'Actividades de los hogares en calidad de empleadores; actividades no diferenciadas de los hogares individuales como productores de bienes y servicios para uso propio'),
  array('id' => '21','nom' => 'Actividades de organizaciones y entidades extraterritoriales'),
  array('id' => '14','nom' => 'Actividades de servicios administrativos y de apoyo'),
  array('id' => '11','nom' => 'Actividades financieras y de seguros'),
  array('id' => '12','nom' => 'Actividades inmobiliarias'),
  array('id' => '13','nom' => 'Actividades profesionales, científicas y ténicas'),
  array('id' => '15','nom' => 'Administración pública y defensa, planes de seguridad social de afiliación obligatoria'),
  array('id' => '1','nom' => 'Agricultura, ganadería, caza, silvicultura pesca'),
  array('id' => '9','nom' => 'Alojamiento y servicios de comida'),
  array('id' => '7','nom' => 'Comercio al por mayor y al por menor, reparación de vehículos automotores y motocicletas'),
  array('id' => '6','nom' => 'Construcción'),
  array('id' => '5','nom' => 'Distribución de agua, evacuación y tratamiento de aguas residuales, gestión de desechos y actividades de saneamiento ambiental'),
  array('id' => '16','nom' => 'Educación'),
  array('id' => '2','nom' => 'Explotación de minas y canteras'),
  array('id' => '3','nom' => 'Industrias manufactureras'),
  array('id' => '10','nom' => 'Información y comunicaciones'),
  array('id' => '19','nom' => 'Otras actividades de servicios'),
  array('id' => '4','nom' => 'Suministro de electricidad, gas y agua'),
  array('id' => '8','nom' => 'Transporte y almacenamiento')
);
function listaractivi_eco(){
  global $activi_eco;
foreach($activi_eco  as $valor) {    
echo "<option value='".$valor['nom']."'>". $valor['nom'] ."</option>";
 }}
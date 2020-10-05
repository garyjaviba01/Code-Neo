<?php
class conex{
	public function conectar(){
$conex= mysqli_connect("localhost","convecfc_alianza","cpcpanel_:or_:19","convecfc_bd_alianza");
//$conex= mysqli_connect("localhost","root","","plataforma_edu");
	mysqli_query($conex,"set names 'utf8'");
	return $conex;		
	}	
}


?>
<?php

function OpenCon(){
	$host="localhost";
	$user="despliegue";
	$pass="despliegue";
	$base="tienda";
	$msqli=new mysqli($host,$user,$pass,$base) or die ("Connection failed: " . $msqli->connect_error);
	
	return $msqli;
	
}

	function CloseCon($msqli){
	
	$msqli->close();
	
	}


?>




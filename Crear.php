<html>
<head>
</head>
<body>
<?php
require_once 'conectar.php';

try{
	$con=OpenCon();
	
	if($con->connect_error){
		die("ha fallado la conexion".$con->connect_error);
		
	}
	else{
		
		$dni=$_POST["dni"];
		$nombre=$_POST["nombre"];
		
		$direccion=$_POST["direccion"];
		$telefono=$_POST["telefono"];
		
		$sql="INSERT INTO clientes (dni,nombre, direccion, telefono) VALUES ('$dni','$nombre', '$direccion','$telefono')";
		
		if(!$con->query($sql) ){
			$registros= $con->query($sql) or trigger_error("Query Failed! SQL: $sql-Error: ".mysqli_error($con),E_USER_ERROR);
		}else{
		echo"Insertado Correctamente";
		}
		
	}
	


}
catch(Exception $e){
	echo"Fallo conexion";
}
?>
<form action="index.html">


<input type="submit" value="volver">

</form>
</body>
</html>




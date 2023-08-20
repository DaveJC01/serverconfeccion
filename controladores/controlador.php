<?php
require './conexion/conexionBD.php';


#si se da clic en el boton ingresar 
if (!empty($_POST["btnIngresar"])) {
	#verificar si los campos estan vacios 
	if (empty($_POST["users"]) || empty($_POST["password"])) {
		echo ('<div class="alert">LOS CAMPOS ESTAN VACIOS</div>');
		
	} else {
		$usuario =$_POST["users"];
		$conraseña =$_POST["password"];
		$sql = $conection->query("SELECT * FROM registro WHERE numDc = '$usuario' and contraseña = '$conraseña' ");
		#verificar si la informacon de la base de datos es correcta
		if ($datos = $sql->fetch_object()) {
			echo "<script>window.location= 'compras.html' </script>";
		} else {
			echo ('<div class="alert">USUARIO O CONTRASEÑA INCORRECTOS</div>');
		};	
	};
};
if (!empty($_POST["btnRegistrar"])) {
	echo "<script>window.location ='registrarse.php' </script>";
};


?>
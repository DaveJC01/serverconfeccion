<?php
require "./Conexion/conexionBD.php";
#si se da clic en el boton ingresar 
if (!empty($_POST["btnIngresar"])) {
	#verificar si los campos estan vacios 
	if (empty($_POST["users"]) || empty($_POST["password"])) {
		echo ('<div class="alert">LOS CAMPOS ESTAN VACIOS</div>');
		
	} else {
		$usurio = $_POST["users"];
		$pass = $_POST["password"];

		$sql = "SELECT * FROM registro WHERE numDc = '".$usurio."' and password = '".$pass."'";
		$resultado = mysqli_query($conn,$sql);
		$numero_registros = mysqli_num_rows($resultado);
		if($numero_registros != 0){
		#verificar si la informacon de la base de datos es correcta
			echo "<script>window.location= 'compras.html' </script>";
		}else {
			echo ('<div class="alert">USUARIO O CONTRASEÑA INCORRECTOS</div>');
		};	
	};
};

	


?>
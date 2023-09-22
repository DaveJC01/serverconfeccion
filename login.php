<?php
require "./Conexion/conexionBD.php";
#si se da clic en el boton ingresar 
if (!empty($_POST["btnIngresar"])) {
	#verificar si los campos estan vacios 
	if (empty($_POST["users"]) || empty($_POST["password"])) {
		
		echo "<script> alert('LOS CAMPOS ESTAN VACIOS');window.location= 'index.html' </script>";
	} else {
		/* echo "<script>window.location= './Compras/compras.html' </script>"; */
		
		$usurio = $_POST["users"];
		$pass = $_POST["password"];

		$query = mysqli_query($conn,"SELECT * FROM registro WHERE numDc = '".$usurio."' and password = '".$pass."'");
		$numero_registros = mysqli_num_rows($query);
		if($numero_registros == 1){
		#verificar si la informacon de la base de datos es correcta
			echo "<script>window.location= './Compras/compras.html' </script>";
		}else if ($numero_registros == 0){
		
			echo "<script> alert('USUARIO O CONTRASEÑA INCORRECTOS');window.location= 'index.html' </script>";
		}; 	
	};
};

	


?>
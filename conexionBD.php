<?php
#conexion a la base de datos 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "confeccion";


$conection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conection) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

#si se da clic en el boton ingresar 
if (!empty($_POST["btnIngresar"])) {
	#verificar si los campos estan vacios 
	if (empty($_POST["users"]) || empty($_POST["password"])) {
		echo ('<div class="alert">LOS CAMPOS ESTAN VACIOS</div>');
		
	} else {
		$usuario =$_POST["users"];
		$conrasena =$_POST["password"];
        $sql = $conection->query("SELECT * FROM registro WHERE numDc = '".$usuario."' and contraseña = '".$conrasena."'");
		if ($datos = $sql->fetch_object()){
		#verificar si la informacon de la base de datos es correcta
		 
			echo "<script>window.location= 'compras.html' </script>";
		} else {
			echo ('<div class="alert">USUARIO O CONTRASEÑA INCORRECTOS</div>');
		};	
	};
};
if (!empty($_POST["btnRegistrar"])) {
	echo "<script>window.location ='registrarse.php' </script>";
};


if (!empty($_POST["btnGuardar"])) {
	#verificar si los campos estan vacios________________________________________________________________________________________
	if (empty($_POST["numDoc"]) ||
     empty($_POST["nombre"]) || 
     empty($_POST["apellido"]) || 
     empty($_POST["correo"]) || 
     empty($_POST["tel"]) || 
     empty($_POST["direccion"]) || 
     empty($_POST["pass"])) {
		echo ('<div class="alert">UNO DE LOS CAMPOS ESTA VACIO</div>');
		
	}   else {
        #Si los los campos no estan registrados insertar en la base de datos________________________________________________________
        $tipodoc =$_POST["tipoDoc"];
        $numdoc =$_POST["numDoc"];
        $nombre =$_POST["nombre"];
        $apellido =$_POST["apellido"];
        $telef =$_POST["tel"];
        $correo =$_POST["correo"];
        $direccion =$_POST["direccion"];
        $pass =$_POST["pass"];
        $sqls = $conection->query("INSERT INTO registro (tipoDc, numDc, nombre, apellido, telefono, correo, direccion, contraseña) 
        VALUES('$tipodoc','$numdoc',' $nombre','$apellido','$telef',' $correo','$direccion',' $pass')");

        #Verifica si el usuario es registrado o no_________________________________________________________________________________
        if ($sqls==1) {
            echo ('<div class="registrado">USUARIO REGISTRADO CORRECTAMENTE</div>');
        } else {
            echo ('<div class="alert">USUARIO NO REGISTRADO</div>');
        }
    };
}; 



?>
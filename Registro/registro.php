<?php
require "../Conexion/conexionBD.php";

if (!empty($_POST["btnGuardar"])) {
	#verificar si los campos estan vacios________________________________________________________________________________________
	if (empty($_POST["numDoc"]) or
     empty($_POST["nombre"]) or 
     empty($_POST["apellido"]) or
     empty($_POST["correo"]) or 
     empty($_POST["tel"]) or 
     empty($_POST["direccion"]) or
     empty($_POST["password"])) {
		echo "<script> alert('LOS CAMPOS ESTAN VACIOS');window.location= 'registro.html' </script>";
		
	}   else {
        #Si los los campos no estan registrados insertar en la base de datos________________________________________________________
        $tipodoc =$_POST["tipoDoc"];
        $numdoc =$_POST["numDoc"];
        $nombre =$_POST["nombre"];
        $apellido =$_POST["apellido"];
        $telef =$_POST["tel"];
        $correo =$_POST["correo"];
        $direccion =$_POST["direccion"];
        $pass =$_POST["password"];
        $sqls = $conn->query("INSERT INTO registro (tipoDc, numDc, nombre, apellido, telefono, correo, direccion, password) 
        VALUES('$tipodoc','$numdoc',' $nombre','$apellido','$telef',' $correo','$direccion',' $pass')");

        #Verifica si el usuario es registrado o no_________________________________________________________________________________
        if ($sqls==1) {
            echo "<script> alert('USUARIO REGISTRADO CORRECTAMENTE');window.location= 'registro.html' </script>";
           
        } else {
           
            echo "<script> alert('USUARIO NO REGISTRADO<');window.location= 'registro.html' </script>";
        }
    };
}; 

?>
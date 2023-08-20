<?php
require './conexion/conexionBD.php';

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



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300;1,500&display=swap');

body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: linear-gradient(150deg, #E74C3C, #3498DB);
    height: 140vh;
    font-family: 'Open Sans'; 
}

.contenedor {
    position: absolute;
    top: 400px;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 400px;
    height: 770px;
    background: white;
    border-radius: 20px;
    box-shadow: 2px 4px 6px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.contenedor h1 {
    text-align: center;
    padding: 0 0 20px 0;
    border-bottom: 1px solid silver;

}
.contenedor form {
    padding: 0 40px;
    box-sizing: border-box;
}
form .registro {
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 30px 0 ;
} 
.registro input {
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 16px;
    border: none;
    background: none;
    outline: none;
}
.registro label {
    position: absolute;
    top: 5%;
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);
    font-size: 16px;
    pointer-events: none;
    transition: .5s;
}
.registro span::before {
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 100%;
    height: 2px;
    background: #797D7F;
    transition: .5s;
}

.registro input:focus ~ label,
.registro input:focus ~ label {
    top: -5px;
    color: #040404;

}

.registro input:focus ~ samp::before,
.registro input:focus ~ samp::before {
    width: 100%;
} 

input[type="submit"]:hover{
    background: #0b0b0b8b;
    transition: .5s;
}

#btn_registrarse{
    width: 250px;
    height: 40px;
    background: linear-gradient(150deg, #797D7F, #3498DB );
    border-radius: 20px;
    transition: .5s; 
}

#btn_registrarse:hover{
    scale: 1.09;
    background: rgb(14, 233, 69);
}

#tipo_documento{
    width: 200px;
    height: 40px;
    background: linear-gradient(150deg, #797D7F, #3498DB );
    border-radius: 20px;
    transition: .5s;
    margin-left: 20px; 
}

#tipo_documento:hover{
    scale: 1.09;
}

.alert{
    height: 39px;
    color: red;
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
}
.registrado{
    height: 39px;
    color: rgb(31, 151, 0);
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
}
#btn_atras{
    width: 250px;
    height: 40px;
    background: linear-gradient(150deg, #797D7F, #3498DB );
    border-radius: 20px;
    transition: .5s; 
    margin-top: 5px;
}
</style>

<body>
    <div class="contenedor">
        <h1>Registrarse</h1>
        <form method="post" action="">
            <select id="tipo_documento" name="tipoDoc">
                <option>Cedula de ciudadania</option>
                <option>Cedula extrangera</option>
                </select>
                <?php
                include('conexionBD.php');
                ?>
            <div class="registro">
                <input type="tel" name="numDoc">
                <label>Numero de documento</label>
            </div>
            <div class="registro">
                <input type="text" name="nombre">
                <label>Nombre</label>
            </div>
            <div class="registro">
                <input type="text" name="apellido">
                <label>Apellido</label>
            </div>
            <div class="registro">
                <input type="email" name="correo">
                <label>Correo</label>
            </div>
            <div class="registro">
                <input type="tel" name="tel">
                <label>Telefono</label>
            </div>
            <div class="registro">
                <input type="text" name="direccion">
                <label>Dirección</label>
            </div>
            <div class="registro">
                <input type="password" name="pass">
                <label>Contraseña</label>
            </div>
            <div>
                <input type="submit" value="Registrarse" id="btn_registrarse" name="btnGuardar"/>
            </div>
            

            <a href="./index.php">Atras</a>
            
        </div>
        </form>

    </div>



</body>
</html>
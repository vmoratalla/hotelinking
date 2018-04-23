<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="css/estilos.css" rel="stylesheet" type="text/css">

    <title>Prueba Hotelinking</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--    Script con la lógica para enviar petición de registro o login desde Ajax-->
    <script src="js/login.js"></script>

</head>
<body>
<div class="contenedor">
    <div class="ventanalogin">
        <div class="tituloventana">
            Entrar / Registrarse
        </div>
        <div class="grupo">
            <div >
                Usuario
            </div>
            <div class="input">
                <input type="text" placeholder="Nombre de usuario" id="usuario">
            </div>
            <div id="errorusuario">
                &nbsp;
            </div>
        </div>
        <div class="grupo">
            <div >
                Contraseña
            </div>

            <div class="input">
                <input type="password" placeholder="Contraseña" id="password">
            </div>
            <div id="errorpassword">
                &nbsp;

            </div>
        </div>
        <div class="botones">
            <a href="#" id="entrar">Entrar</a>
            <a href="#" id="registrar">Registrase</a>
        </div>
    </div>

</div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Volver la página un poco responsive-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/global.css">
    <title>ViewTMonument</title>
    <link class="favicon" id="favicon" rel="icon" type="image/x-icon" href="">
</head>

<body class="bloquear">
    <!--Elementos principales del header-->
    <?php
    include("include/header.php");
    ?>
    <!--Elementos principales del body-->
    <main>
        <!--Todas las pantallas del drag and drop-->
        <div>
            <!--Fondo drag and drop-->
            <div class="contenedor_imagen">
            <!--
            <img class="transparente" src="img/1920x1080.jpg" alt="Imagen_Monumento">
            Funcionalidades del drag and drop-->
                <div class="escenario_principal">
                    <!--Texto principal drag and drop-->
                        <h2 class="texto_principal">Descubre la <br>grandeza de los <br>monumentos</h2>
                    <!--Recuadro drag and drop-->
                    <div class="cuadrado">
                        <h2 class="sustituir">Arrastra y suelta aquí o</h2>    
                        <button class="texto_bf">busca archivos</button>  
                        <input type="file" hidden>  
                    </div>
                </div>
            </div>
            <!--Boton que permite el scrolleo
            <span>
                 <a class="boton_abajo"> ↓ </a>
            </span>
            -->
        </div>
        <!--Todas las pantallas de la información de la página-->
        <div>
            <hr class="separacion">
            <div class="acomodo_general_1">
                <div class="acomodo_primero">
                    <h3 class="titulos">Identifica monumentos</h3> <br>
                    <p class="parrafos">
                    Averigua qué monumentos hay en tu ciudad, conoce su historia, el año de su creación, dónde se encuentran y visítalos.</p>
                </div>
                <img class="info_imagenes" src="https://i.postimg.cc/TwfHZ52n/azteca-1-1000x1000.png">
            </div>
            <span class="acomodo_general_2">
                <div class="acomodo_segundo">
                    <h3 class="titulos">Escanea monumentos</h3> <br>
                    <p class="parrafos">Puede escanear un monumento con la cámara de la aplicación para obtener información sobre él y ver un modelo 3D detallado del mismo.</p>
                </div>  
                <img class="info_imagenes" src="https://i.postimg.cc/kX5M0wTX/azteca-2-1000x1000.png">
            </span>
        </div>
    </main>
    <!--Elementos principales del footer-->
    <?php
    include("include/footer.php");
    ?>
    <script language="JavaScript" type="text/javascript" src="js/inicio.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/global.js"></script>
</body>

</html>
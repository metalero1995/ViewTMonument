<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Volver la página un poco responsive-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <link rel="stylesheet" href="css/global.css">

    <title>ViewTMonument</title>
    <link class="favicon" id="favicon" rel="icon" type="image/x-icon" href=" ">

    <script src="js/librerias/jquery.min.js"></script>
    <script src="js/librerias/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="ordenar">
    <?php
    include("include/header.php");
    ?>
    <!--Formulario-->
    <main>
        <div>
            <form method="post" id="formLogueo">
                <div class="contenido_principal" id="ingreso">
                    <h2 class="titulo_principal" id="ingreso2">Pon tu correo o teléfono</h2>
                    <div class="contenido_secundario_p1">
                        <label class="parrafos_primarios" for="emailUsername">E-mail o número</label>
                        <input class="input" type="text" name="emailUsername" id="datosLogueo">
                        <label class="parrafos_primarios" for="contraseña">Contraseña</label>
                        <input class="input" type="password" name="contrasenia" id="contraseñaLogueo">
                    </div>
                    <div class="contenido_secundario_p2">
                        <div>
                            <input type="checkbox" name="recuerdame" checked="checked">&nbsp Recuérdame
                        </div>
                        <a class="open-modal" type="button" data-open="modal2" data-toggle="modal" data-target="#exampleModalCenter">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button class="submit" type="button" name="entrar" id="loguearse">Iniciar sesión</button>
                    <hr class="linea_horizontal">
                    <button class="boton_noAcc open-modal" type="button" data-open="modal1" data-toggle="modal" data-target="#exampleModalCenter">¿Aún no tienes cuenta? ¡Crea una!</button>
                </div>
            </form>
            <!--Modal-->

            <div class="modal" id="modal1" data-animation="slideInOutLeft">
                <div class="modal-dialog">
                    <header class="modal-header">
                        Registrarse
                        <button class="close-modal" aria-label="close modal" data-close>
                            ✕
                        </button>
                    </header>
                    <hr class="linea_horizontal_2">
                    <section class="modal-content">
                        <form method="post" id="formRegistro">
                            <div class="input_registro_flex">
                                <input class="input_registro" type="text" name="nombreR" id="nombreR" placeholder="Nombre">
                                <p>&nbsp&nbsp&nbsp&nbsp</p>
                                <input class="input_registro" type="text" name="apellidoR" id="apellidoR" placeholder="Apellido paterno">
                            </div>
                            <div>
                                <input class="input_registro" type="text" name="emailR" id="emailR" placeholder="E-mail">
                                <input class="input_registro" type="text" name="numberR" id="numberR" placeholder="Número de teléfono">
                                <input class="input_registro" type="password" name="contraseniaR" id="contraseniaR" placeholder="Contraseña">
                                <!--Cambiar esta parte -->
                                <input class="input_registro" type="password" name="contraseniaR2" id="contraseniaR2" placeholder="Repite la contraseña">
                                <p class="contenido_secundario_p3">Cliqueando en "registrarse" usted acepta nuestra <a class="aceptarTerminos" href="#">Política de privacidad</a> y de <a class="" href="">cookies.</a> Recibirás un correo o una notificación al celular por parte de nosotros.</p>

                            </div>
                        </form>
                        <button class="registro" name="signupR" id="signupR">Registrarse</button>
                    </section> 
                </div>
            </div>

            <div class="modal" id="modal2" data-animation="slideInOutLeft">
                <div class="modal-dialog2">
                <header class="modal-header">
                        Recuperar contraseña
                        <button class="close-modal" aria-label="close modal" data-close>
                            ✕
                        </button>
                    </header>
                    <hr class="linea_horizontal_2">
                    <section class="modal-content">
                        <form method="post" id="formContrasenia">
                            <div>
                                <p class="p_correo_tel">Ingresa tu correo electrónico o número de celular para buscar tu cuenta.</p>
                                <input class="input_registro" type="text" name="email-Tel" id="email-Tel" placeholder="E-mail o número de teléfono">

                            </div>
                        </form>
                        <button class="registro" name="signupR" id="signupR">Buscar</button>
                    </section> 
                </div>
            <div>

            </div>
        </div>
    </main>
    <?php
    include("include/footer.php");
    ?>

    <script language="JavaScript" type="text/javascript" src="js/login.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/global.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/loginAJAX.js"></script>

</body>

</html>
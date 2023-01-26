<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/contacto.css">

    <title>ViewTMonument</title>
    <link class="favicon" id="favicon" rel="icon" type="image/x-icon" href="">
</head>

<body class="ordenar">
    <?php
    include("include/header.php");
    ?>
    <!--Formulario-->
    <main>
        <div>
            <form method="post" id="formMensaje">
                <div class="contenido_principal" id="ingreso">
                    <h2 class="titulo_principal" id="ingreso2">Contáctanos</h2>
                    <div class="contenido_secundario_p1">
                        <label class="parrafos_primarios" for="asunto">Asunto</label>
                        <input class="input" type="text" name="asunto" id="asunto" required>
                        <label class="parrafos_primarios" for="email">E-mail</label>
                        <input class="input" type="email" name="email" id="email" required>
                        <label class="parrafos_primarios" for="descripcion">¿Cómo podemos ayudarte?</label>
                        <textarea maxlength="750" class="input tamaño" type="text" name="descripcion" id="descripcion" required> </textarea>
                        
                    </div>
                    <button class="submit" type="button" name="enviarMensaje" id="enviarMensaje">Enviar</button>
                </div>
            </form>
            
        </div>
    </main>
    <?php
    include("include/footer.php");
    ?>
    <script language="JavaScript" type="text/javascript" src="js/login.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/global.js"></script>

</body>

</html>
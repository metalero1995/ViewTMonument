<?php

    include '../clases/cUsuario.php';

    //Instanciar un objeto de la clase usuario
    $cUsuario = new cUsuario();

    $resultado = "";
    //Utilizamos la funcion isset, para saber si una variable esta definida o no
    if (isset($_GET['inicia_sesion'])){
        //Los datos que se reciben desde los input del formulario, se enlazan con el name del campo
        $cUsuario->setCorreo($_POST['emailUsername']);
        $cUsuario->setTelefono($_POST['emailUsername']);
        $cUsuario->setContrasenia($_POST['contrasenia']);

        //Iniciar la sesion
        $resultado = $cUsuario->iniciarSesion();
    }

    ob_clean();
    echo json_encode($resultado);

?>
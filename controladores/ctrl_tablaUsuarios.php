<?php
    include '../clases/cUsuario.php';

    $result = "";
    $usuario = new cUsuario;

    //Opcion para consultar usuarios
    if($_GET['opcion']==1){
        $result = $usuario->consultaUsuarios();
    }

    ob_clean();
    echo json_encode($result);


?>
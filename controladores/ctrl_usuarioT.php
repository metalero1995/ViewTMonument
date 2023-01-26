<?php

include '../clases/cUsuarioT.php';

$result = "";
$usuario = new cUsuarioT();

//Consultar usuarios opcion 1
if($_GET['opcion']==1){
    $result = $usuario->consultarUsuarios();
}

//Eliminar resgistro opcion 2
if($_GET['opcion']==2){
    $usuario->setIdUsuario($_GET['id_usuario']);
    $result = $usuario->eliminaUsuario();  

}

ob_clean();
echo json_encode($result);
?>
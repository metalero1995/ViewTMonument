<?php

include '../clases/cComentariosT.php';

$result = "";
$comentario = new cComentariosT();

if($_GET['opcion']==1){
    $result = $comentario->consultarComentarios();
}

//Eliminar resgistro opcion 2
if($_GET['opcion']==2){
    $comentario->setIdComentario($_GET['id_comentario']);
    $result = $comentario->eliminaComentarios();  

}

ob_clean();
echo json_encode($result);
?>
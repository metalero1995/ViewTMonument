<?php
include('../clases/cMonumentos.php');
$nombre = $_POST['nombre'];
if( empty($nombre) ) $nombre = NULL;

$numero = $_POST['numero'];

$respuesta = buscar( $nombre, $numero );
echo json_encode( $respuesta );
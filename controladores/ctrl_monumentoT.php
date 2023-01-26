<?php

include '../clases/cMonumentoT.php';

$result = "";
$registroMonumento = new cMonumentoT();
$monumento = new cMonumentoT();

//Consultar monumentos opcion 1
if($_GET['opcion']==1){
    $result = $monumento->consultarMonumentos();
}

//Registrar monumentos opcion 2
if($_GET['opcion']==2){
    $registroMonumento->setIdCiudad($_POST['id_ciudad']);
    $registroMonumento->setNombre($_POST['nombre']);
    $registroMonumento->setDescripcion($_POST['descripcion']);
    $registroMonumento->setAnio($_POST['anio']);
    $registroMonumento->setTipo($_POST['tipo']);
    $registroMonumento->setModelado3dHp($_POST['modelado_3d_hp']);
    $registroMonumento->setModelado3dLp($_POST['modelado_3d_lp']);
    $registroMonumento->setLatitud($_POST['latitud']);
    $registroMonumento->setLongitud($_POST['longitud']);

    $result = $registroMonumento->registrarMonumento();
}

//Traer datos de un monumento opcion 3
if($_GET['opcion']==3){
    $monumento->setIdMonumento($_POST['id_monumento']);
    $result = $monumento->consultaMonumento();  

}

//Editar informacion de un monumento opcion 4
if($_GET['opcion']==4){
    $monumento->setIdMonumento($_GET['id_monumento']);
    $monumento->setIdCiudad($_POST['id_ciudadE']); 
    $monumento->setNombre($_POST['nombreE']);
    $monumento->setDescripcion($_POST['descripcionE']);
    $monumento->setAnio(($_POST['anioE']));
    $monumento->setTipo(($_POST['tipoE']));
    $monumento->setModelado3dHp(($_POST['modelado_3d_hpE']));
    $monumento->setModelado3dLp(($_POST['modelado_3d_lpE']));
    $monumento->setLatitud(($_POST['latitudE']));
    $monumento->setLongitud(($_POST['longitudE']));

    $result = $monumento->actualizaMonumento();      
}

//Eliminar resgistro opcion 5
if($_GET['opcion']==5){
    $monumento->setIdMonumento($_GET['id_monumento']);
    $result = $monumento->eliminaMonumento();  

}

ob_clean();
echo json_encode($result);
?>
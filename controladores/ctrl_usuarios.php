<?php
	include '../clases/cUsuario.php';
	
	$result = "";
    $registroUsuario= new cUsuario();
    $usuario = new cUsuario();
	
		
	//Registrar datos del formulario
	if($_GET['opcion']==1){
		$registroUsuario->setNombre($_POST['nombreR']);
		$registroUsuario->setApellidos($_POST['apellidoR']);
		$registroUsuario->setCorreo($_POST['emailR']);
		$registroUsuario->setTelefono($_POST['numberR']);
		$registroUsuario->setContrasenia($_POST['contraseniaR']);

		$result = $registroUsuario->registrarUsuario();
	}

    ob_clean();
    echo json_encode($result);

?>
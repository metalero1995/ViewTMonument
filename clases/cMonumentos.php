<?php 
    include ("cBaseDeDatos.php");
    $bd = new cBaseDeDatos();

//$cnx = mysqli_connect( 'localhost', 'root', 'utchetumal', 'viewtmonument');
$cant_por_pagina = 1;

function buscar( $que = NULL, $pagina = 1 ){
	global $bd, $cant_por_pagina;
	
	$where = is_null( $que ) ? '' : "AND A.nombre LIKE '%$que%' ";
	$inicio = ( $pagina - 1 ) * $cant_por_pagina;
	$consulta = "SELECT A.id_monumento, A.nombre, B.url 
	FROM monumento AS A
	INNER JOIN imagenes AS B
	ON A.id_monumento = B.id_monumento
	WHERE B.tipo = 0 $where 
	ORDER BY `B`.`id_imagenes` DESC
	LIMIT $inicio, $cant_por_pagina";
	
	$registros = [ ];
	$filas = $bd->ConsultarRegistro($consulta);
	if(isset($_POST['consulta'])){
		$filas = $bd->ConsultarRegistroTiempoReal($_POST['consulta']);

	}
	while( $r = mysqli_fetch_assoc( $filas ) ){
		$registros[] = $r;
	}

	$consulta2 = "SELECT COUNT(*) AS CANTIDAD FROM monumento AS A INNER JOIN imagenes AS B ON A.id_monumento = B.id_monumento WHERE B.tipo = 0 $where";
	$filas2 = $bd->ConsultarRegistro($consulta2);
	$array = mysqli_fetch_assoc($filas2);
	$paginas = ceil( $array['CANTIDAD'] / $cant_por_pagina );

	return [ 'resultados' => $registros, 'paginas' => $paginas, 'actual' => $pagina ];
}





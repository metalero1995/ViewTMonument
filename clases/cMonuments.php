<?php
    include ("cBaseDeDatos.php");
    $bd = new cBaseDeDatos();

    $salida = "";
    /*Ordenar del mas reciente al mas antiguo*/
    $comandoSQL =
        "SELECT B.id_imagenes, A.nombre, B.url 
        FROM monumento AS A
        INNER JOIN imagenes AS B
        ON A.id_monumento = B.id_monumento
        WHERE B.tipo = 0  
        ORDER BY `B`.`id_imagenes` DESC";

    if(isset($_POST['consulta'])){
        $q = $bd->ConsultarRegistroTiempoReal($_POST['consulta']);
        $comandoSQL =
        "SELECT A.nombre, B.url 
        FROM monumento AS A
        INNER JOIN imagenes AS B
        ON A.id_monumento = B.id_monumento
        WHERE B.tipo = 0  
        AND A.nombre LIKE '%".$q."%'";
    }

    $resultado = ($bd->ConsultarRegistro($comandoSQL));

    if($resultado->num_rows > 0){
        $salida.="<div class='contenido_principal'>
        <div class='contenido_secundario'>
        ";
        while($fila = $resultado->fetch_assoc()){
            $salida.="
                        <div class='imagenes_centrales'>
                        <img class='imagenes' src=".$fila['url']."></img>
                        <p class='parrafo'>".$fila['nombre']."</p>
                        </div>
                    ";
        }
        $salida.="</div></div>";
    }else{
        $salida.="No hay datos";
    }
    echo $salida;

    
?>
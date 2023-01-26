<?php
function conectar(){
    $conn = null;
    $host = 'localhost';
    $db = 'viewtmonument';
    $user = 'root';
    $pwd = '';
    try{
        $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
    }catch(PDOException $e){
        echo ': Error al conectar con la base de datos'.$e;
        exit;
    }
    return $conn;
}

?>
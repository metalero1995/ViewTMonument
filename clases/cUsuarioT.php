<?php

include 'cBaseDeDatos.php';

class cUsuarioT{
    //Atributos
    private $id_usuario;
    private $nombre;
    private $apellido_p;
    private $apellido_m;
    private $correo;
    private $contrasenia;
    private $telefono;
    private $modelado_3d_lp;

    //constructor de la clase
   function __construct(){
        $this->id_usuario="";
        $this->nombre="";
        $this->apellido_p="";
        $this->apellido_m="";
        $this->correo="";
        $this->contrasenia="";
        $this->telefono="";
        $this->tipo="";
    }

    //Setters
    function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    function setIdCiudad($nombre){
        $this->nombre = $nombre;
    }
    function setNombre($apellido_p){
        $this->apellido_p = $apellido_p;
    }
    function setDescripcion($apellido_m){
        $this->apellido_m = $apellido_m;
    }
    function setAnio($correo){
        $this->correo = $correo;
    }
    function setTipo($contrasenia){
        $this->contrasenia = $contrasenia;
    }
    function setModelado3dHp($telefono){
        $this->telefono = $telefono;
    }
    function setModelado3dLp($tipo){
        $this->tipo = $tipo;
    }

    //Getters
    function getIdMonumento(){
        return $this->id_usuario;
    }
    function getIdCiudad(){
        return $this->nombre;
    }
    function getNombre(){
        return $this->apellido_p;
    }
    function getDescripcion(){
        return $this->apellido_m;
    }
    function getAnio(){
        return $this->correo;
    }
    function getTipo(){
        return $this->contrasenia;
    }
    function getModelado3dHp(){
        return $this->telefono;
    }
    function getModelado3dLp(){
        return $this->tipo;
    }

    //Metodo para consultar monumentos
    function consultarUsuarios(){
        $bd = new cBaseDeDatos();

        $sentenciaSQL = "SELECT * from usuarios";

        $rs = $bd->realizarConsulta($sentenciaSQL);
        $result = array('data' => array());
        if ($rs->num_rows > 0){
            while($row = $rs->fetch_assoc()){
                $result['data'][]=$row;
            }
        }
        else{
            $result["error"] = 1;
            $result["message"] = "Error al ejcutar la consulta";
        }

        return $result;
    }

    function eliminaUsuario(){
        $bd = new cBaseDeDatos();

        $sentenciaSQL = "DELETE FROM usuarios WHERE id_usuario='$this->id_usuario'";

        $result = $bd->eliminarRegistro($sentenciaSQL);

        if($result) {
            $response["success"] = 1;
            $response["message"] = "Usuario eliminado con exito";
        }
        else{
            $response["success"] = 0;
            $response["message"] = "Ocurrió un error";
        }

        return $response;
    }
}
?>
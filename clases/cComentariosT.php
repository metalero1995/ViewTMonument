<?php

include 'cBaseDeDatos.php';

class cComentariosT{
    //Atributos
    private $id_comentario;
    private $id_usuario;
    private $id_monumento;
    private $titulo;
    private $valoracion;
    private $descripcion;

    //constructor de la clase
   function __construct(){
        $this->id_comentario="";
        $this->id_usuario="";
        $this->id_monumento="";
        $this->titulo="";
        $this->valoracion="";
        $this->descripcion="";
    }

    //Setters
    function setIdComentario($id_comentario){
        $this->id_comentario = $id_comentario;
    }
    function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    function setIdMonumento($id_monumento){
        $this->id_monumento = $id_monumento;
    }
    function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    function setValoracion($valoracion){
        $this->valoracion = $valoracion;
    }
    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    //Getters
    function getIdComentario(){
        return $this->id_comentario;
    }
    function getIdUsuario(){
        return $this->id_usuario;
    }
    function getIdMonumento(){
        return $this->id_monumento;
    }
    function getTitulo(){
        return $this->titulo;
    }
    function getValoracion(){
        return $this->valoracion;
    }
    function getDescripcion(){
        return $this->descripcion;
    }

    //Metodo para consultar monumentos
    function consultarComentarios(){
        $bd = new cBaseDeDatos();

        $sentenciaSQL = "SELECT * from comentarios";

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

    function eliminaComentarios(){
        $bd = new cBaseDeDatos();

        $sentenciaSQL = "DELETE FROM comentarios WHERE id_comentario='$this->id_comentario'";

        $result = $bd->eliminarRegistro($sentenciaSQL);

        if($result) {
            $response["success"] = 1;
            $response["message"] = "Comentario eliminado con exito";
        }
        else{
            $response["success"] = 0;
            $response["message"] = "Ocurrió un error";
        }

        return $response;
    }
}
?>
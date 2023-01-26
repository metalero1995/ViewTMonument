<?php

include 'cBaseDeDatos.php';

class cMonumentoT{
    //Atributos
    private $id_monumento;
    private $id_ciudad;
    private $nombre;
    private $descripcion;
    private $anio;
    private $tipo;
    private $modelado_3d_hp;
    private $modelado_3d_lp;
    private $latitud;
    private $longitud;

    //constructor de la clase
   function __construct(){
        $this->id_monumento="";
        $this->id_ciudad="";
        $this->nombre="";
        $this->descripcion="";
        $this->anio="";
        $this->tipo="";
        $this->modelado_3d_hp="";
        $this->modelado_3d_lp="";
        $this->latitud="";
        $this->longitud="";
    }

    //Setters
    function setIdMonumento($id_monumento){
        $this->id_monumento = $id_monumento;
    }
    function setIdCiudad($id_ciudad){
        $this->id_ciudad = $id_ciudad;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    function setAnio($anio){
        $this->anio = $anio;
    }
    function setTipo($tipo){
        $this->tipo = $tipo;
    }
    function setModelado3dHp($modelado_3d_hp){
        $this->modelado_3d_hp = $modelado_3d_hp;
    }
    function setModelado3dLp($modelado_3d_lp){
        $this->modelado_3d_lp = $modelado_3d_lp;
    }
    function setLatitud($latitud){
        $this->latitud = $latitud;
    }
    function setLongitud($longitud){
        $this->longitud = $longitud;
    }

    //Getters
    function getIdMonumento(){
        return $this->id_monumento;
    }
    function getIdCiudad(){
        return $this->id_ciudad;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getDescripcion(){
        return $this->descripcion;
    }
    function getAnio(){
        return $this->anio;
    }
    function getTipo(){
        return $this->tipo;
    }
    function getModelado3dHp(){
        return $this->modelado_3d_hp;
    }
    function getModelado3dLp(){
        return $this->modelado_3d_lp;
    }
    function getLatitud(){
        return $this->latitud;
    }
    function getLongitud(){
        return $this->longitud;
    }

    //Metodo para consultar monumentos
    function consultarMonumentos(){
        $bd = new cBaseDeDatos();

        $sentenciaSQL = "SELECT * from monumento";

        $rs = $bd->realizarConsulta($sentenciaSQL);
        $result = array('data' => array());
        if ($rs->num_rows > 0){
            while($row = $rs->fetch_assoc()){
                $result['data'][]=$row;
            }
        }
        else{
            $result["error"] = 1;
            $result["message"] = "Error al eejcutar la consulta";
        }

        return $result;
    }

    //Metodo para registrar un nuevo monumento
    function registrarMonumento(){
        $bd = new cBaseDeDatos();
        $sentenciaSQL = "INSERT INTO monumento (id_ciudad, nombre, descripcion, anio, tipo, modelado_3d_hp, modelado_3d_lp, latitud, longitud) VALUES ('$this->id_ciudad', '$this->nombre', '$this->descripcion', '$this->anio', '$this->tipo', '$this->modelado_3d_hp', '$this->modelado_3d_lp',
        '$this->latitud',
        '$this->longitud')";

        $result = $bd->insertarRegistro($sentenciaSQL);

        $response = array();
        
        if ($result){
            $response["success"] = 1;
            $response["message"] = "Monumento registrado correctamente.";
        }
        else{
            $response["seccess"] = 0;
            $response["message"] = "Ocurrio un error";
        }

        return $response;
    }

    //Metodo para consultar un monumento
    function consultaMonumento(){     
	    
		$bd = new cBaseDeDatos();
		
		$sentenciaSQL="SELECT id_monumento, id_ciudad, nombre, descripcion, anio, tipo, modelado_3d_hp, modelado_3d_lp, latitud, longitud FROM monumento WHERE id_monumento= ".$this->id_monumento;
		$rs = $bd->realizarConsulta($sentenciaSQL);
		$result = array();
		if ($rs->num_rows > 0){
	    	while($row = $rs->fetch_assoc()){
				
                $result[]=  $row;
			
            }
		}
		else{
        
        	$result["error"] = 1;
        	$result["message"] = "El monumento no existe en la BD.";
		
		}

		return $result;
		 
    }

    //Metodo para editar monumento
    function actualizaMonumento(){
        $bd = new cBaseDeDatos();

        $sentenciaSQL = "UPDATE monumento set id_ciudad='$this->id_ciudad', nombre='$this->nombre', descripcion='$this->descripcion', anio='$this->anio', tipo='$this->tipo', modelado_3d_hp='$this->modelado_3d_hp', modelado_3d_lp='$this->modelado_3d_lp', latitud='$this->latitud', longitud='$this->longitud' WHERE id_monumento='$this->id_monumento'";

        $result = $bd->modificarRegistro($sentenciaSQL);
        $response = array();

        if ($result>0){
            $response["success"] = 1;
            $response["message"] = "Información modificada con exito";
        }
        else{
            $response["success"] = 0;
            $response["message"] = "Ocurrió un error";
        }

        return $response;

    }

    function eliminaMonumento(){
        $bd = new cBaseDeDatos();

        $sentenciaSQL = "DELETE FROM monumento WHERE id_monumento='$this->id_monumento'";

        $result = $bd->eliminarRegistro($sentenciaSQL);

        if($result) {
            $response["success"] = 1;
            $response["message"] = "Monumento eliminado con exito";
        }
        else{
            $response["success"] = 0;
            $response["message"] = "Ocurrió un error";
        }

        return $response;
    }

}
?>
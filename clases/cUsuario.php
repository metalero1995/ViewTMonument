<?php

//Llamar a la clase base de datos, para usar sus funciones
include 'cBaseDeDatos.php';

//Crear la clase usuario
class cUsuario{
    //Definir atributos de la clase
    private $id_usuario;
    private $nombre;
    private $apellidos;
    private $correo;
    private $contrasenia;
    private $telefono;
    private $tipo;

    //Definir el metodo constructor, ya que se usuaran los mismo atributos y metodos para multiple ususarios
    function __construct(){
        $this->id_usuario = "";
        $this->nombre = "";
        $this->apellidos = "";
        $this->correo = "";
        $this->contrasenia = "";
        $this->telefono = "";
        $this->tipo = "";
    }

    //Crear los getters y setters de la clase para pode usar los atributos fuera de ella
    function setIdusuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    function setCorreo($correo){
        $this->correo = $correo;
    }

    function setContrasenia($contrasenia){
        $this->contrasenia = $contrasenia;
    }

    function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    function setTipo($tipo){
        $this->tipo = $tipo;
    }

    function getIdUsuario(){
        return $this->id_usuario;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getApellidos(){
        return $this->apellidos;
    }

    function getCorreo(){
        return $this->correo;
    }

    function getContrasenia(){
        return $this->contrasenia;
    }

    function getTelefono(){
        return $this->telefono;
    }

    function getTipo(){
        return $this->tipo;
    }

    //Crear el metodo para iniciar sesion
    function iniciarSesion(){
        //Instanciar un objeto de la clase cBaseDeDatos, para utilizar los atributos y metodos
        $baseDatos = new cBaseDeDatos();

        //Validar el logueo, con un SELECT, que se almacena en una variable
        $comandoSQL = "SELECT * FROM usuarios WHERE correo = '$this->correo' OR telefono = '$this->telefono' AND contrasenia = '$this->contrasenia'";
        //Si trae alguna fila como resultado, es porque el usuario existe
        
        $resultado = $baseDatos->realizarConsulta($comandoSQL);

        //Estructura condicional, para saber si se encontro o no al usuario
        if($resultado->num_rows > 0){
            //Inicia sesion y crea las variables de sesión
            session_start();
            $_SESSION['autenticado'] = true;
            $_SESSION['correo'] = $this->correo;
            $_SESSION['telefono'] = $this->telefono;

            $fila = $resultado->fetch_row(); //Obtener el resultado de la consulta y guardarlo en un arreglo
            $_SESSION['id_usuario'] = $fila[0];
            $_SESSION['nombre'] = $fila[1];
            $_SESSION['tipo'] = $fila[7];


            $cad = $_SESSION['tipo'];
            //return 1;
            return ($cad);
         //Esto indica que se inicio sesion correctamente
        }//Sino se encontro el usuario
        else{
            $cad = '0';
            //return 0;
            return ($cad);
        }
    }

    function consultaUsuarios(){     
        
        $baseDatos = new cBaseDeDatos();
        
        $sentenciaSQL="SELECT * from usuarios";

        $rs = $baseDatos->realizarConsulta($sentenciaSQL);
        $result = array('data' => array());
        if ($rs->num_rows > 0){
            while($row = $rs->fetch_assoc()){
                //$result[]=  array_map('utf8_encode', $row);
                $result['data'][]= $row;
            }
        }
        else{
        
            $result["error"] = 1;
            $result["message"] = "Error al ejecutar la consulta en la BD.";
        
        }

        return $result;
         
    }

    //Resgistrar usuario
    function registrarUsuario(){
        $baseDatos = new cBaseDeDatos();
        $comandoSQL = "INSERT INTO usuarios (id_usuario, nombre, apellido_p, apellido_m, correo, contrasenia, telefono, tipo) VALUES ('', '$this->nombre', '$this->apellidos', '', '$this->correo', SHA2('$this->contrasenia', 224), '$this->telefono', '2')";

        $result = $baseDatos->insertarRegistro($comandoSQL);

        $response = array();

        if ($result){
            $response["success"] = 1;
            $response["message"] = "Resgitro correcto";
        }
        else{
            $response["success"] = 0;
            $response["message"] = "Error al registrarse, intente de nuevo";
        }

        return $response;
    }
}

?>
<?php

    class cBaseDeDatos{
        //Creamos las variables
        private $hostname;
        private $username;
        private $password;
        private $database;
        //Variable para instanciar objeto de creacion a base de datos
        private $conexion;

        //Creamos el constructor de la clase
        function __Construct(){
            $this->hostname = 'localhost';
            $this->username = 'root';
            $this->password = 'utchetumal';
            $this->database = 'viewtmonument';
        }

        //Metodo para iniciar la conexion con la base de datos
        function IniciarConexion(){
            $this->conexion = new mysqli($this->hostname, $this->username, $this->password, $this->database);

            if($this->conexion->connect_errno){
                echo 'Conexion fallida, intente de nuevo';
                exit();
            }
        }

        //Metodo para cerrar la conexion con la base de datos
        function CerrarConexion(){
            $this->conexion->close();
        }

        //Metodo para Insertar un registro en la base de datos
        function InsertarRegistro($consulta){
            $this->IniciarConexion();
            $resultado = $this->conexion->query($consulta);
            $this->CerrarConexion();
            return $resultado;
        }

        //Metodo para Consultar registro en la base de datos
        function ConsultarRegistro($consulta){
            $this->IniciarConexion();
            $resultado = $this->conexion->query($consulta);
            $this->CerrarConexion();
            return $resultado;
        }

        //Metodo para Actualizar registro en la base de datos
        function ActualizarRegistro($consulta){
            $this->IniciarConexion();
            $resultado = $this->conexion->query($consulta);
            $this->CerrarConexion();
            return $resultado;
        }

        //Metodo para Eliminar registro en la base de datos
        function EliminarRegistro($consulta){
            $this->IniciarConexion();
            $resultado = $this->conexion->query($consulta);
            $this->CerrarConexion();
            return $resultado;
        }
        function ConsultarRegistroTiempoReal($consulta){
            $this->IniciarConexion();
            $resultado = $this->conexion->real_escape_string($consulta);
            $this->CerrarConexion();
            return $resultado;
        }
    }
?>
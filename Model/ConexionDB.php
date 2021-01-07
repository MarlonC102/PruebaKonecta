<?php 

class Conexion {
        private $servername="localhost";
        private $dbname = "prueba";
        private $username="root";
        private $userpassword="";
        protected $conexion;

        public function __CONSTRUCT()
        {
            try{
            $this->conexion=new PDO("mysql:host={$this->servername}; dbname={$this->dbname};charset=utf8", $this->username, $this->userpassword);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexion exitosa";
        }catch(Exception $error){
            //echo "Se ha presentado un error en la conexion".$error->getMessage();
            die($error->getMessage());
        }
        }
    }
 ?>
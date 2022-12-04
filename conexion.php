<?php

class conexion{

    private $servidor = "localhost";
    private $user = "root";
    private $password = "";
    private $conexion;

    //Constructor base de datos.
    public function __construct() {
    
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=album",$this->user,$this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            return "Fallo de conexión".$e;
        }
    }

    //Inserta, borra o actualiza datos de la bd
    public function ejecutar($sql) {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql){
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();


    }


}

?>
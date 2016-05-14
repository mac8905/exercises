<?php
    namespace Models;
    
    use \PDO as PDO;
    
    class Seccion
    {
        private $id;
        private $nombre;
        private $conn;
        private static $table1 = "secciones";
        private static $table2 = "estudiantes";
        
        public function __construct()
        {
            $this->conn = new Conexion();
        }
        
        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }
    
        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
        
        public function listar()
        {
            $sql  = " SELECT *";
            $sql .= " FROM ".self::$table1;
            $prepare = $this->conn->prepare($sql);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_CLASS); // PDO::FETCH_ASSOC
            $conn = null;

            return $this->conn->sendResult($result);
        }
        
        public function registrar()
        {
            $sql  = " INSERT INTO ".self::$table1;
            $sql .= " (id, nombre)";
            $sql .= " VALUES (:id, :nombre)";
            $prepare = $this->conn->prepare($sql);
            $prepare->bindParam(':id', null);
            $prepare->bindParam(':nombre', $this->nombre);
            $prepare->execute();
            $conn = null;
        }
        
        public function eliminar()
        {
            $sql  = " DELETE FROM ".self::$table1;
            $sql .= " WHERE id = :id";
            $prepare = $this->conn->prepare($sql);
            $prepare->bindParam(':id', $this->id);
            $prepare->execute();
            $conn = null;
        }
        
        public function actualizar()
        {
            $sql  = " UPDATE ".self::$table1;
            $sql .= " SET nombre = :nombre,";
            $sql .= " WHERE id = :id";
            $prepare = $this->conn->prepare($sql);
            $prepare->bindParam(':id', $this->id);
            $prepare->bindParam(':nombre', $this->nombre);
            $prepare->execute();
            $conn = null;
        }
        
        public function ver()
        {
            $sql  = " SELECT *";
            $sql .= " FROM ".self::$table1;
            $sql .= " WHERE id = :id";
            $prepare = $this->conn->prepare($sql);
            $prepare->bindParam(':id', $this->id);
            $prepare->execute();
            $result = $prepare->fetch(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC
            $conn = null;

            return $this->conn->sendResult($result);
        }
    }
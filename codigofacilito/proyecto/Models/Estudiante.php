<?php
    namespace Models;
    
    class Estudiante
    {
        private $id;
        private $nombre;
        private $edad;
        private $promedio;
        private $imagen;
        private $idSeccion;
        private $fecha;
        private $conn;
        private static $table1 = "estudiantes";
        private static $table2 = "secciones";
        
        public function __construct()
        {
            $this->conn = new Conexion();
            echo "has instanciado la clase Estudiante<br>";
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
            $sql  = " SELECT t1.*, t2.nombre As nombre_seccion";
            $sql .= " FROM ".self::$table1." As t1";
            $sql .= " INNER JOIN ".self::$table2." As t2";
            $sql .= " ON t1.id_seccion = t2.id";
            $prepare = $this->conn->prepare($sql);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_CLASS); // PDO::FETCH_ASSOC
            $conn = null;

            return $this->conn->sendResult($result);
        }
        
        public function registrar()
        {
            $sql  = " INSERT INTO ".self::$table1;
            $sql .= " (id, nombre, edad, promedio, imagen, id_seccion, fecha)";
            $sql .= " VALUES (:id, :nombre, :edad, :promedio, :imagen, :id_seccion, :fecha)";
            $prepare = $this->conn->prepare($sql);
            $prepare->bindParam(':id', null);
            $prepare->bindParam(':nombre', $this->nombre);
    	    $prepare->bindParam(':edad', $this->edad);
    	    $prepare->bindParam(':promedio', $this->promedio);
    	    $prepare->bindParam(':imagen', $this->imagen);
    	    $prepare->bindParam(':id_seccion', $this->id_seccion);
    	    $prepare->bindParam(':fecha', 'NOW()');
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
            $sql .= " SET edad = :edad,";
            $sql .= " SET promedio = :promedio,";
            $sql .= " SET id_seccion = :id_seccion";
            $sql .= " WHERE id = :id";
            $prepare = $this->conn->prepare($sql);
            $prepare->bindParam(':id', $this->id);
            $prepare->bindParam(':nombre', $this->nombre);
    	    $prepare->bindParam(':edad', $this->edad);
    	    $prepare->bindParam(':promedio', $this->promedio);
    	    $prepare->bindParam(':id_seccion', $this->id_seccion);
            $prepare->execute();
            $conn = null;
        }
        
        public function ver()
        {
            $sql  = " SELECT t1.*, t2.nombre As nombre_seccion";
            $sql .= " FROM ".self::$table1." As t1";
            $sql .= " INNER JOIN ".self::$table2." As t2";
            $sql .= " ON t1.id_seccion = t2.id";
            $sql .= " WHERE t1.id = :id";
            $prepare = $this->conn->prepare($sql);
            $prepare->bindParam(':id', $this->id);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_CLASS); // PDO::FETCH_ASSOC
            $conn = null;

            return $this->conn->sendResult($result);
        }
    }
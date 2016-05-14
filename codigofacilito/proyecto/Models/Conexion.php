<?php
    namespace Models;
    
    use \PDO as PDO;

    class Conexion extends PDO
    {
        private static $DBMS = "mysql";
        private static $host = "127.0.0.1";
        private static $DBName = "c9";
        private static $username = "mac8905";
        private static $password = "";
        
        public function __construct()
        {
            try {
				parent::__construct	(
					self::$DBMS.':host='.
					self::$host.';dbname='.
					self::$DBName.';charset=utf8',
					self::$username,
					self::$password
				);
			} catch (PDOException $e) {
				print_r('Connection error: '.$e->getMeassage());
			}
        }
        
        public function sendResult($result) {
            if ($result) {
                return $result;
            }
            
            return false;
        }
    }
<?php

    class Pagina
    {
        // metodos
        public $nombre = "CodigoFacilito";
        public static $url = "www.codigofacilito.com";
        
        // atributos
        public function bienvenida()
        {
            $mensaje = "";
            
            $mensaje .= "Bienvenidos a ";
            $mensaje .= "<b>";
            $mensaje .= $this->nombre;
            $mensaje .= "</b>";
            $mensaje .= " la pagina es ";
            $mensaje .= "<b>";
            $mensaje .= self::$url;
            $mensaje .= "</b>";
            
            self::imprimir($mensaje);
        }
        
        public static function getUrl()
        {
            $mensaje = "";
            
            $mensaje .= "La pagina es ";
            $mensaje .= "<b>";
            $mensaje .= self::$url;
            
            self::imprimir($mensaje);
        }
        
        public static function imprimir($mensaje)
        {
            $mensaje .= "<br>";
            echo $mensaje;
        }
    }
    
    class Web extends Pagina
    {
        
    }
    
    $pagina = new Pagina();
    $pagina->bienvenida();
    
    Web::getUrl();
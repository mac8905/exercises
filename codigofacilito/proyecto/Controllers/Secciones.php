<?php

    namespace Controllers;
    
    class Secciones
    {
        public function index()
        {
            echo "Hola soy el index de secciones" . "<br>";
        }
        
        public function ver($num)
        {
            echo "Eres el numero: $num" . "<br>";
        }
    }
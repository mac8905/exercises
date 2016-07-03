<?php

    class Persona
    {
        
        function __construct($data)
        {
            switch($data["action"])
            {
                case "agregar":
                    $this->agregar($data["data"]);
                    break;

                default:
                    $this->pintar();
                    break;
            }
        }
        
        public function agregar($data)
        {
            echo json_encode(array(
                    'nombre' => $data . 3,
                    'id' => "nombre" . 3
                )
            );
        }
        
        public function pintar()
        {
            echo '
                <form id="formID">
                    <span id="container"></span>
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" value=""/>
                    <input type="submit" value="Agregar" id="agregar"/>
                </form>
                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
                <script type="text/javascript" src="dinamicForm.js"></script>
            ';
        }
    }
    
    $persona = new Persona($_POST);
?>
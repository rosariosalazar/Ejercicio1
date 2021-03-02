<?php

class Errores extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje_error = "Error al cargar el recurso";
        $this->view->render('errores');
        //echo "<p>Error al cargar recurso</p>";
    }
}

?>
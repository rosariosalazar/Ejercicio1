<?php

class Main extends Controller{
    function __construct(){
        parent::__construct();
        //$this->view->render('main');
        //echo "<p>Nuevo Controlador Main</p>";
    }

    function render(){
        $this->view->render('main');
    }
}

?>
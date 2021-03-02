<?php

class Nuevo extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        //echo "<p>Error al cargar recurso</p>";
    }

    function render(){
        $this->view->render('nuevo');
    }

    function registrarProducto(){
        //$idproducto = $_POST['idproducto'];
        $nombreproducto = $_POST['nombreproducto'];
        $precio = $_POST['precio'];

        $mensaje="";
       if( $this->model->insert(['nombreproducto'=>$nombreproducto,'precio'=>$precio])){
           $mensaje="Nuevo producto creado";
       }else{
           $mensaje = "El producto ya existe";
       }
        
       $this->view->mensaje=$mensaje;
       $this->render();
    }
}

?>
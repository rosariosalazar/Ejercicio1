<?php

class Consulta extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->datos = [];
    }

    function render(){
        $productos = $this->model->get();
        $this->view->productos = $productos;
        $this->view->render('consulta');
    }

    function verProducto($param = null){
        $idProducto = $param[0];
        $producto = $this->model->getById($idProducto);

        session_start();
        $_SESSION['id_verProducto'] = $producto->idproducto;
        $this->view->producto = $producto;
        $this->view->productoeditar = $producto->nombreproducto;
        $this->view->mensaje = "";
        $this->view->render('consultadetalle');
    }

    function actualizarProducto(){
        session_start();
        $idproducto =  $_SESSION['id_verProducto'];
        $nombreproducto    = $_POST['nombreproducto'];
        $precio  = $_POST['precio'];

        unset($_SESSION['id_verProducto']);

        if($this->model->update(['idproducto' => $idproducto, 'nombreproducto' => $nombreproducto, 'precio' => $precio] )){
            // actualizar producto exito
            $producto = new Producto();
            $producto->idproducto = $idproducto;
            $producto->nombreproducto = $nombreproducto;
            $producto->precio = $precio;
            
            $this->view->producto = $producto;
            $this->view->productoeditar = $nombreproducto;
            $this->view->mensaje = "Producto actualizado correctamente";
        }else{
            // mensaje de error
            $this->view->mensaje = "No se pudo actualizar el producto";
        }
        $this->view->render('consultadetalle');
    }

    function eliminarProducto($param = null){
        $idproducto = $param[0];

        if($this->model->delete($idproducto)){
            $this->view->mensaje = "Producto eliminado correctamente";
        }else{
            // mensaje de error
            $this->view->mensaje = "No se pudo eliminar el producto";
        }

        $this->render();
    }

    
}

?>
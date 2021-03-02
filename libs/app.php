<?php
require_once 'controllers/errores.php';

class App{
    function __construct(){
        //echo "<p>2.Nueva app</p>";

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        //$url =$_GET['url'];

        //echo $url;
        $url=rtrim($url,'/');
        $url = explode('/', $url);

        //Cuando seingresasin definir controlador
        if(empty($url[0])){
            $archivoController = 'controllers/main.php';
            require_once $archivoController;;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        //var_dump($url);

        $archivoController = 'controllers/' . $url[0] .'.php';
        
        if(file_exists($archivoController)){
            require_once $archivoController;

            //inicializar controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

             // # elementos del arreglo
             $nparam = sizeof($url);

             if($nparam > 1){
                 if($nparam > 2){
                     $param = [];
                     for($i = 2; $i<$nparam; $i++){
                         array_push($param, $url[$i]);
                     }
                     $controller->{$url[1]}($param);
                 }else{
                     $controller->{$url[1]}();
                 }
             }else{
                 $controller->render();
             }

           
        }
        else{
            
            $controller = new Errores();
        }

        


    }
}
?>
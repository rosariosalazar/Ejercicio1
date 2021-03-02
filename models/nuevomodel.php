<?php

class NuevoModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        //Insertar registro en BD
        try{
            $query= $this->db->connect()->prepare('INSERT INTO PRODUCTOS(PRODUCTO,PRECIO) VALUES(:nombreproducto,:precio)');
            $query->execute(['nombreproducto' =>$datos['nombreproducto'],'precio'=>$datos['precio']]);
                echo "Insertar datos";
            return true;
        }
        catch(PDOException $e){
            //echo $e->getMessage();
            //echo "Ya existe un registro con la informacion del producto.";
            return false;
        }
        
    }
}
?>
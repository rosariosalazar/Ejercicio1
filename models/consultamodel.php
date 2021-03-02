<?php

include_once 'models/producto.php';

class ConsultaModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT*FROM productos");

            while($row = $query->fetch()){
                $item = new Producto();
                $item->idproducto = $row['idproducto'];
                $item->nombreproducto    = $row['producto'];
                $item->precio  = $row['precio'];

                $iva = $row['precio'] * .16;

                $item->iva  = $iva;
                $item->total  = $row['precio'] + $iva;

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function getById($id){
        $item = new Producto();

        $query = $this->db->connect()->prepare("SELECT * FROM productos WHERE idproducto = :idproducto");
        try{
            $query->execute(['idproducto' => $id]);

            while($row = $query->fetch()){
                $item->idproducto = $row['idproducto'];
                $item->nombreproducto = $row['producto'];
                $item->precio = $row['precio'];
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE productos SET producto = :nombreproducto, precio = :precio WHERE idproducto = :idproducto");
        try{
            $query->execute([
                'idproducto'=> $item['idproducto'],
                'nombreproducto'=> $item['nombreproducto'],
                'precio'=> $item['precio']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM productos WHERE idproducto = :id");
        try{
            $query->execute([
                'id'=> (int)$id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

}
?>
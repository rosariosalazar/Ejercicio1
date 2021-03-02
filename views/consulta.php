<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <?php require 'views/header.php';?>

    <div id="main">
        <h1 class="center"> Consulta de Productos</h1>
        <div id="respuesta" class="center">

            <table width="100%">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>IVA</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="tbody-productos">
                    <?php
                        include_once 'models/producto.php';
                        foreach($this->productos as $row){
                            $producto = new Producto();
                            $producto = $row; 
                    ?>
                    <tr id="fila-<?php echo $producto->idproducto; ?>">
                        <td><?php echo $producto->nombreproducto; ?></td>
                        <td><?php echo $producto->precio; ?></td>
                        <td><?php echo $producto->iva; ?></td>
                        <td><?php echo $producto->total; ?></td>
                        
                        <td><a href="<?php echo constant('URL') . 'consulta/verProducto/' . $producto->idproducto; ?>">Editar</a>  </td>
                        <td><a href="<?php echo constant('URL') . 'consulta/eliminarProducto/' . $producto->idproducto; ?>">Eliminar</a> </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require'views/footer.php';?>
</body>
</html>
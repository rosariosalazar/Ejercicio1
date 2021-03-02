<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <?php require 'views/header.php';?>

    <h1><?php echo "Nuevo Producto"; ?></p></h1>

    <div class="center"><?php echo $this->mensaje; ?></div>

        <form class="center" action="<?php echo constant('URL'); ?>nuevo/registrarProducto" method="POST">

            <p>
                <label for="matricula">Nombre del Producto</label><br>
                <input type="text" name="nombreproducto" id="" required>
            </p>
            <p>
                <label for="precio">Precio</label><br>
                <input type="number" name="precio" id="" required>
            </p>

            <p>
            <input type="submit" value="Registrar nuevo producto">
            </p>

        </form>
    </div>

    <?php require'views/footer.php';?>
</body>
</html>
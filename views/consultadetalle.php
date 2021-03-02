<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center">Detalle de <?php echo $this->productoeditar; ?> </h1>

        <div class="center"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL'); ?>consulta/actualizarProducto" method="POST">

           
            <p>
                <label for="nombre">Nombre del producto</label><br>
                <input type="text" name="nombreproducto" value="<?php echo $this->producto->nombreproducto; ?>" required>
            </p>
            <p>
                <label for="precio">Precio</label><br>
                <input type="number" name="precio" value="<?php echo $this->producto->precio; ?>" required>
            </p>

            <p>
            <input type="submit" value="Actualizar producto">
            </p>

        </form>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>
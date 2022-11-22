<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');
$captura = consultarUsuario($_GET['id_producto']);

function consultarUsuario($id_producto) {
    $conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');



    $consulta = "SELECT * FROM producto WHERE id_producto=  $id_producto";

    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_assoc($resultado);
    return[
        $filas['id_producto'],
        $filas['nombre_producto'],
        $filas['precio_producto'],
        $filas['marca'],
        $filas['presentacion'],
        $filas['cantidad_productos']
    ];
}
?>

<html>

    <head>
        <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
        <title>Actualizar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body >

        <div class="container" align='center'>

            <br><br>
            <div class="card border-success mb-3" style="width: 18rem;" >

                <div class="card-body">
                    <form action="ActualizarN.php" method="POST">
                        <div class="form-group">
                            <div class="form-group">
                                <label >ID Producto</label>
                                <input type='text' class='form-control' value="<?php echo $captura[0] ?>" placeholder="ID Producto " name="id_producto" required="true" readonly="true">
                            </div>
                            <div class="form-group">
                                <label >Nombre Producto</label>
                                <input type='text' class='form-control' value="<?php echo $captura[1] ?>" placeholder="Nombre Producto" name="nombre_producto" required="true">
                            </div>
                            <div class="form-group">
                                <label >Precio</label>
                                <input type="text" class="form-control" value="<?php echo $captura[2] ?>" placeholder="Precio" name="precio_producto" required="true">
                            </div>
                            <div class="form-group">
                                <label >Marca</label>
                                <input type="text" class="form-control" value="<?php echo $captura[3] ?>" placeholder="Marca" name="marca" required="true">
                            </div>
                            <div class="form-group">
                                <label >Presentacion</label>
                                <input type="text" class="form-control" value="<?php echo $captura[4] ?>"  placeholder="Presentacion" name="presentacion" >
                            </div>
                            <!--disabled-->
                            <label for="exampleInputEmail1">Cantidad Productos</label>
                            <input type="text" class="form-control" value="<?php echo $captura[5] ?>" placeholder=" Cantidad Productos" name="cantidad_productos" required="true">

                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <br><br>

                    </form>
                </div>

            </div>
            <br>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>


<html>
    <head>
        <title>Nuevo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body >

<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');

$id= $_POST['id_producto'];
$nombre= $_POST['nombre_producto'];
$precio= $_POST['precio_producto'];
$marca= $_POST['marca'];
$presentacion= $_POST['presentacion'];
$cantidad_prod= $_POST['cantidad_productos'];


$actualizarDatos = mysqli_query($conexion, "UPDATE producto SET nombre_producto= '$nombre' , precio_producto= '$precio', marca= '$marca',  presentacion='$presentacion', cantidad_productos='$cantidad_prod' WHERE id_producto ='$id'") or die($conexion->error);
echo "ID:V ".$id;
if (!$actualizarDatos) {
    header("location: ../Productos/Error.php");   
    die("<br>".mysqli_error($conexion));
} else {
      
    header("location: ../Productos/AlertaAct.php");   

    
 
}

        mysqli_close($conexion);
?>
    </body>
   
</html>


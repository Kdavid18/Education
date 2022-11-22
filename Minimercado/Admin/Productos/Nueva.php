<?php
include '../../Conexion.php';


$nombre= $_POST['nombre_prod'];
$precio= $_POST['precio'];
$marca= $_POST['marca'];
$presentacion= $_POST['presentacion'];
$cantidad_prod= $_POST['cantidad_prod'];

$insertar = "INSERT INTO mini.producto( nombre_producto, precio_producto, marca, presentacion, cantidad_productos) VALUES ('$nombre', '$precio', '$marca', '$presentacion', '$cantidad_prod')" ;
$resultado  = mysqli_query($conexion, $insertar);
if (!$resultado) {
    // header("location: Error.php");  
      die("<br>".mysqli_error($conexion));
} else {
     header("location: AlertaNuevo.php");   
}
// Cerrar conexion
mysqli_close($conexion);
?>



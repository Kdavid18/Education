<?php

$servidor = "localhost";
$usuario = "mini";
$password = "mini";
$bd = "mini";
$conexion = mysqli_connect($servidor, $usuario, $password, $bd) or die("ERROR");


$NombreCat= $_POST['NombreCat'];
$id_producto = $_POST['id_producto'];

$consulta = "SELECT * FROM categoria INNER JOIN producto ON categoria.id_producto = producto.id_producto WHERE categoria.id_producto =  $id_producto";
$insertar = "INSERT INTO categoria (nombre_categoria , id_producto) values ('$NombreCat', '$id_producto')" ;

$resultado  = mysqli_query($conexion, $insertar) or die("Error_ ".$conexion->error);
if (!$resultado) {
   //  header("location: Error.php"); 
          die("<br>".mysqli_error($conexion));
} else {
     header("location: AlertaNuevo.php");   
}
// Cerrar conexion
mysqli_close($conexion);
?>



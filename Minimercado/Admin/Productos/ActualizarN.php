

<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');

$id= $_POST['id_producto'];
$nombre= $_POST['nombre_producto'];
$precio= $_POST['precio_producto'];
$marca= $_POST['marca'];
$presentacion= $_POST['presentacion'];
$cantidad_prod= $_POST['cantidad_productos'];


$actualizarDatos = mysqli_query($conexion, "UPDATE mini.producto SET nombre_producto= '$nombre' , precio_producto= '$precio', marca= '$marca',  presentacion='$presentacion', cantidad_productos='$cantidad_prod' WHERE id_producto ='$id'");
$resultado= mysqli_query($conexion, $actualizarDatos);

if (!$actualizarDatos) {
    header("location: ../Productos/Error.php");   
    die("<br>".mysqli_error($conexion));
} else {
      
    header("location: ../Productos/AlertaAct.php");   

    
 
}

        mysqli_close($conexion);
?>


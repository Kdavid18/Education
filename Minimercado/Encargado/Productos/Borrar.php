<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini')
        or die("Error en la conexion");

if (isset($_GET['delete'])){
    $id= $_GET['id_producto'];
    $sqld = "DELETE FROM producto WHERE id_producto = $id";
    $conexion->query($sqld);
    
    header('location: AlertaBorrar.php');
    
      
}

?>


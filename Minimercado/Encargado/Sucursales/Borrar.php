<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini')
        or die("Error en la conexion");

if (isset($_GET['delete'])){
    $id_sucursal= $_GET['id_sucursal'];
    $sqld = "DELETE FROM sucursal WHERE id_sucursal= $id_sucursal";
    $conexion->query($sqld);
    
    header('location: AlertaBorrar.php');
    
      
}

?>


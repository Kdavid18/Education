<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini')
        or die("Error en la conexion");

if (isset($_GET['delete'])){
    $id_categoria= $_GET['id_categoria'];
    $sqld = "DELETE FROM categoria WHERE id_categoria = $id_categoria";
    $conexion->query($sqld);
    
    header('location: AlertaBorrar.php');
    
      
}

?>


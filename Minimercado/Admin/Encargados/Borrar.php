<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini')
        or die("Error en la conexion");

if (isset($_GET['delete'])){
    $id_encargado = $_GET['id_encargado'];
    $sqld = "DELETE FROM encargado WHERE id_encargado = $id_encargado";
    $conexion->query($sqld);
    
    header('location: AlertaBorrar.php');
    
      
}

?>


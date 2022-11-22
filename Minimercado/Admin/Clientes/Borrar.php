<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini')
        or die("Error en la conexion");

if (isset($_GET['delete'])){
    $numDoc = $_GET['num_doc'];
    $sqld = "DELETE FROM cliente WHERE num_doc = $numDoc ";
    $conexion->query($sqld);
    
    header('location: AlertaBorrar.php');
    
      
}

?>


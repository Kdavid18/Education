<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini')
        or die("Error en la conexion");

if (isset($_GET['delete'])){
    $PK_id_administrador = $_GET['PK_id_administrador'];
    $sqld = "DELETE FROM administrador WHERE PK_id_administrador = $PK_id_administrador";
    $conexion->query($sqld);
    
    header('location: AlertaBorrar.php');
    
      
}

?>


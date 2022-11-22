<?php
include '../Conexion.php';

$razon_social= $_POST['razon_social'];
$direccion= $_POST['direccion'];
$telefono= $_POST['telefono'];
$id_administrador = $_POST['id_administrador'];

 $consulta = "SELECT * FROM sucursal INNER JOIN administrador ON sucursal.id_administrador = administrador.id_administrador WHERE sucursal.id_administrador=  $id_administrador";
$insertar = "INSERT INTO mini.sucursal (razon_social, direccion_suc, telefono, id_administrador) VALUES ('$razon_social', '$direccion', '$telefono', $id_administrador)" ;
$resultado  = mysqli_query($conexion, $insertar);
if (!$resultado) {
 //    header("location: Error.php"); 
      die("<br>".mysqli_error($conexion));
} else {
     header("location: AlertaNuevo.php");   
}
// Cerrar conexion
mysqli_close($conexion);
?>



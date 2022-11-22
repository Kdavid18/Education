<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$contrasena= $_POST['contrasena'];
$tipoDoc = $_POST['tipoDoc'];
$numDoc = $_POST['numDoc'];
$celular= $_POST['celular'];
$rol= $_POST['rol'];
$id_administrador = $_POST['id_administrador'];

$consulta = "SELECT * FROM encargado INNER JOIN administrador ON encargado.id_administrador = administrador.id_administrador WHERE encargado.id_administrador=  $id_administrador";
$insertar = "INSERT INTO encargado (nombres, apellidos,contrasena, tipo_doc, num_doc, celular, rol, id_administrador) VALUES ('$nombres', '$apellidos', '$contrasena', '$tipoDoc', '$numDoc', '$celular', '$rol', '$id_administrador')" ;
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



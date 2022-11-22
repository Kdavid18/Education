<?php
include '../../Conexion.php';

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$contrasena= $_POST['contrasena'];
$tipoDoc = $_POST['tipo_doc'];
$numDoc = $_POST['num_doc'];
$celular= $_POST['celular'];
$rol= $_POST['rol'];


$Usuariob = "SELECT * FROM administrador WHERE num_doc= '$_POST[num_doc]' ";
$resultad = $conexion->query($Usuariob);
$resultadoI = mysqli_num_rows($resultad);
if ($resultadoI == 1) {
         header("location: Error.php");  
     die("<br>".mysqli_error($conexion));

} else {

  $insertar = "INSERT INTO administrador ( nombres,   apellidos, contrasena, tipo_doc, num_doc, celular, rol) VALUES ( '$nombres',  '$apellidos','$contrasena', '$tipoDoc', '$numDoc', $celular, '$rol')";
  $resultado = mysqli_query($conexion, $insertar);
  if (!$resultado) {
    echo 'Error al registrarse';
  } else{
       header("location: AlertaNuevo.php");  
  }
}
// Cerrar conexion
mysqli_close($conexion);
?>



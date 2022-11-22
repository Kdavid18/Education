<?php

$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$contrasena = $_POST['contrasena'];
$tipoDoc = $_POST['tipoDoc'];
$numDoc = $_POST['numDoc'];
$celular = $_POST['celular'];
$rol = $_POST['rol'];

$Usuariob = "SELECT * FROM encargado WHERE num_doc= '$_POST[numDoc]' ";
$resultad = $conexion->query($Usuariob);
$resultadoI = mysqli_num_rows($resultad);
if ($resultadoI == 1) {
  echo 'Error, El usuario ya existe';
  echo '<br>';
  echo "<a href='Registro.html' >Por favor registre otro usuario</a>";
} else {

  $insertar = "INSERT INTO encargado ( nombres,   apellidos, contrasena, tipo_doc, num_doc, celular, rol) VALUES ( '$nombres',  '$apellidos','$contrasena', '$tipoDoc', '$numDoc', $celular, '$rol')";
  $resultado = mysqli_query($conexion, $insertar);
  if (!$resultado) {
    echo 'Error al registrarse';
     die("<br>".mysqli_error($conexion));
  } else {
    header("location: ../LogIn/Registro.php");
  }
}

// Cerrar conexion
mysqli_close($conexion);
?>


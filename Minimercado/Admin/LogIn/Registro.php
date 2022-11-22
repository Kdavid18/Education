<?php

$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');

$nombres = $_POST['nombres'];
$usuario= $_POST['usuario'];
$apellidos = $_POST['apellidos'];
$contrasena = $_POST['contrasena'];
$tipoDoc = $_POST['tipoDoc'];
$numDoc = $_POST['numDoc'];
$celular = $_POST['celular'];
$rol = $_POST['rol'];

$Usuariob = "SELECT * FROM administrador WHERE num_doc= '$_POST[numDoc]' ";
$resultad = $conexion->query($Usuariob);
$resultadoI = mysqli_num_rows($resultad);
if ($resultadoI == 1) {
  echo 'Error, El usuario ya existe';
  echo '<br>';
  echo "<a href='Registro.html' >Por favor registre otro usuario</a>";
} else {

  $insertar = "INSERT INTO administrador ( usuario,nombres,   apellidos, contrasena, tipo_doc, num_doc, celular, rol) VALUES ('$usuario', '$nombres',  '$apellidos','$contrasena', '$tipoDoc', '$numDoc', $celular, '$rol')";
  $resultado = mysqli_query($conexion, $insertar);
  if (!$resultado) {
    echo 'Error al registrarse';
  } else {
    header("location: ../LogIn/LogIn.html");
  }
}

// Cerrar conexion
mysqli_close($conexion);
?>


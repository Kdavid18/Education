<?php

include '../Conexion.php';

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$contrasena = $_POST['contrasena'];
$tipoDoc = $_POST['tipoDoc'];
$numDoc = $_POST['numDoc'];
$celular = $_POST['celular'];
$rol = $_POST['rol'];

$Usuariob = "SELECT * FROM cliente WHERE num_doc= '$_POST[numDoc]' ";
$resultad = $conexion->query($Usuariob);
$resultadoI = mysqli_num_rows($resultad);
if ($resultadoI == 1) {
header("location: Error.php");
} else {

    $insertar = "INSERT INTO mini.cliente (nombres, apellidos, contrasena, tipo_doc, num_doc, celular, rol) VALUES ('$nombres',  '$apellidos', '$contrasena','$tipoDoc', '$numDoc', '$celular', '$rol')";
    $resultado = mysqli_query($conexion, $insertar);
    if (!$resultado) {
        header("location: Error.php");
    } else {
        header("location: AlertaNuevo.php");
    }
}
// Cerrar conexion
mysqli_close($conexion);
?>



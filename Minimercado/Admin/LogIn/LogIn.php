<?php
session_start();
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');

$numDoc= $_POST['numDoc'];
$contrasena= $_POST['contrasena'];

$consulta= "SELECT * FROM administrador WHERE num_doc = '$numDoc' AND contrasena = '$contrasena' ";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);
if ($filas>0 ) {
    header("location: ../Administrador/Inicio.php ");
} else {
    
    echo 'Error de autenticacion';
}



mysqli_free_result($resultado);
mysqli_close($conexion);




//
//$consulta2 = "SELECT * FROM mini.encargado WHERE num_doc = '$numDoc'";
//if ($f = mysqli_fetch_array($consulta2 , $conexion)){
//    if ($contrasena ==$f['contrasena']){
//        $_SESSION['id_encargado']=$f['id_encargado'];
//        $_SESSION['nombres'] = $f['nombres'];
//        header("Location: ../Encargados/Inicio.php");
//    } else {
//        echo '<script>alert ("Bienvenido Cliente") </script>';    
//    }
//}

//$resultado = mysqli_query($conexion, $consulta);
//$filas = mysqli_num_rows($resultado);
//if ($filas>0 ) {
//    header("location: ../Tablas/listadoTablas.php ");
//} else {
//    
//    echo 'Error de autenticacion';
//}
//mysqli_free_result($resultado);

?>
<html>
    <head>
        <title>Actualizar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body >

<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');
$num_doc= $_POST['num_doc'];

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$contrasena= $_POST['contrasena'];
$tipoDoc = $_POST['tipo_doc'];
$celular = $_POST['celular'];
$rol= $_POST['rol'];
// sentencia para actualizar 
$actualizarDatos = mysqli_query($conexion, "UPDATE administrador SET  nombres = '$nombres' , apellidos = '$apellidos', contrasena = '$contrasena',   celular = '$celular', rol = '$rol' WHERE num_doc = '$num_doc'");
$resultado= mysqli_query($conexion, $actualizarDatos);

if (!$actualizarDatos) {
    header("location: ../Administrador/Error.php");   
    die("<br>".mysqli_error($conexion));
} else {
      
    header("location: ../Administrador/AlertaAct.php");   

    
 
}

        mysqli_close($conexion);
?>
    </body>
   
</html>


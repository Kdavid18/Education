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

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$contrasena = $_POST['contrasena'];
$tipoDoc = $_POST['tipo_doc'];
$numDoc = $_POST['num_doc'];
$celular = $_POST['celular'];



$actualizarDatos = mysqli_query($conexion, "UPDATE mini.cliente SET nombres = '$nombres' ,  apellidos= '$apellidos', contrasena = '$contrasena ', tipo_doc= '$tipoDoc',  celular='$celular' WHERE num_doc='$numDoc'");
$resultado= mysqli_query($conexion, $actualizarDatos);

if (!$actualizarDatos) {
    header("location: ../Clientes/Error.php");   
    die("<br>".mysqli_error($conexion));
} else {
      
    header("location: ../Clientes/AlertaAct.php");   

    
 
}
        mysqli_close($conexion);
?>
    </body>
   
</html>


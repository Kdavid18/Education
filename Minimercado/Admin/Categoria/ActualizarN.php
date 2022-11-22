<html>
    <head>
        <title>Nuevo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body >

<?php
$conexion = mysqli_connect('localhost', 'mini', 'mini', 'mini');

$nombre_categoria= $_POST['nombre_categoria'];
$id_categoria = $_POST['id_categoria'];

$actualizarDatos = mysqli_query($conexion, "UPDATE categoria SET nombre_categoria= '$nombre_categoria'  WHERE id_categoria = '$id_categoria' ");
$resultado= mysqli_query($conexion, $actualizarDatos);

if (!$actualizarDatos) {
    header("location: ../Categoria/Error.php");   
    die("<br>".mysqli_error($conexion));
} else {
      
    header("location: ../Categoria/AlertaAct.php");   

    
 
}
        mysqli_close($conexion);
?>
    </body>
   
</html>


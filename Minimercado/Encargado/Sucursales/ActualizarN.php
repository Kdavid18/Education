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
$id_sucursal = $_POST['id_sucursal'];
$razon_social= $_POST['razon_social'];
$direccion= $_POST['direccion'];
$telefono= $_POST['telefono'];
$id_administrador= $_POST['id_administrador'];


$actualizarDatos = mysqli_query($conexion, "UPDATE mini.sucursal SET razon_social= '$razon_social' , direccion_suc= '$direccion', telefono= '$telefono',  id_administrador='$id_administrador' WHERE id_sucursal='$id_sucursal'   ");
$resultado= mysqli_query($conexion, $actualizarDatos);

if (!$actualizarDatos) {
    header("location: ../Sucursales/Error.php");   
    die("<br>".mysqli_error($conexion));
} else {
      
    header("location: ../Sucursales/AlertaAct.php");   

    
 
}
    "<br>";"<br>";
        "<br>";"<br>";
   echo '<button type="button" class="btn btn-success" ><a href="principal.php" style="color:white ">Volver</a></button>';
        mysqli_close($conexion);
?>
    </body>
   
</html>


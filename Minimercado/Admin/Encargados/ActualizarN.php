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
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$contrasena= $_POST['contrasena'];
$tipoDoc = $_POST['tipo_doc'];
$numDoc = $_POST['num_doc'];
$celular = $_POST['celular'];
$rol= $_POST['rol'];
$id_encargado=$_POST['id_admin'];
echo $nombres."<br>";
echo $apellidos."<br>";
echo $contrasena."<br>";
echo $tipoDoc."<br>";
echo $numDoc."<br>";
echo $celular."<br>";
echo $rol."<br>";
echo $id_encargado."<br>";

$actualizarDatos = mysqli_query($conexion, "UPDATE ENCARGADO SET  nombres= '$nombres' , apellidos= '$apellidos', contrasena = '$contrasena', tipo_doc= '$tipoDoc', num_doc=$numDoc, celular='$celular', rol='$rol' WHERE id_encargado = $id_encargado") or die("ERROR1: ".mysqli_error($conexion));

if (!$actualizarDatos) {
    header("location: ../Encargados/Error.php");   
    die("<br>".mysqli_error($conexion));
} else {
      
    header("location: ../Encargados/AlertaAct.php");   

    
 
}
    "<br>";"<br>";
        "<br>";"<br>";
   echo '<button type="button" class="btn btn-success" ><a href="principal.php" style="color:white ">Volver</a></button>';
        mysqli_close($conexion);
?>
    </body>
   
</html>


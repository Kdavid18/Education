<?php

$conexion = mysqli_connect('localhost', 'mini', 'mini',  'mini');
$captura =  consultarUsuario($_GET['id_administrador']);

 function consultarUsuario($id_administrador){
   $conexion = mysqli_connect('localhost', 'mini', 'mini',  'mini');
   

   
 $consulta = "SELECT * FROM sucursal INNER JOIN administrador ON sucursal.id_administrador = administrador.id_administrador WHERE sucursal.id_administrador=  $id_administrador";

$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_assoc($resultado);
return[
    $filas['id_sucursal'],
    $filas['razon_social'],
    $filas['direccion_suc'],
    $filas['telefono'],
    $filas['id_administrador']
];
 }



?>

<html>

  <head>
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <title>Registro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  </head>
  <body >

    <div class="container" align='center'>

      <br><br>
      <div class="card border-success mb-3" style="width: 18rem;" >

        <div class="card-body">
            <form action="ActualizarN.php" method="POST">
            <div class="form-group">
                 <div class="form-group">
                <label >ID Sucursal</label>
                <input type='text' class='form-control' value="<?php echo $captura[0] ?>" placeholder="ID Sucursal" name="id_sucursal" required="true" disabled="true">
              </div>
              <div class="form-group">
                <label >Razon Social</label>
                <input type='text' class='form-control' value="<?php echo $captura[1] ?>" placeholder="Razon Social" name="razon_social" required="true">
              </div>
              <div class="form-group">
                <label >Direccion </label>
                <input type="text" class="form-control" value="<?php echo $captura[2] ?>" placeholder="Direccion" name="direccion" required="true">
              </div>
              <div class="form-group">
                <label >Telefono</label>
                <input type="text" class="form-control" value="<?php echo $captura[3] ?>" placeholder="Telefono" name="telefono" required="true">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">ID Administrador</label>
              <input type="text" class="form-control" value="<?php echo $captura[4] ?>" placeholder="ID Administrador" name="id_administrador" required="true" disabled="true">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <br><br>

          </form>
        </div>

      </div>
      <br>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>


<?php
session_start();
if(isset($_SESSION['tipo'])){
  $tipo=$_SESSION['tipo'];
}else{
  $tipo='text';
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>MiniMercados</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

  </head>
  <body>
    <?php

if(isset($_POST['check_list'])){
  if(!empty($_POST['check_list'])){
    $consulta="";
  foreach($_POST['check_list'] as $selected){
    echo $selected."</br>";
  }
  }
}

    ?>
    <div class="wrapper">
      <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

        <!--
    
            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag
    
        -->

        <div class="sidebar-wrapper">
          <div class="logo">
            <a href="#" class="simple-text">
              MiniMercados
            </a>
          </div>
          <ul class="nav">

            <li>
                <a href="../Historial/historial.php">
                <i class="pe-7s-display2"></i>
                <p>Historial</p>
              </a>
            </li>
            <li>
                <a href="../Productos/Inicio.php">
                <i class="pe-7s-cart"></i>
                <p>Productos</p>
              </a>
            </li>
          <li>
              <a href="Inicio.php">
                <i class="pe-7s-network"></i>
                <p>Sucursal</p>
              </a>
            </li>
             <li>
                 <a href="../Categoria/Inicio.php">
                <i class="pe-7s-note2"></i>
                <p>Categoria</p>
              </a>
            </li>

             <li>
                 <a href="../Clientes/Inicio.php">
                <i class="pe-7s-users"></i>
                <p>Clientes</p>
              </a>
            </li>
             <li>
                 <a href="ventaNuevo.php">
                <i class="pe-7s-shopbag"></i>
                <p>Ventas</p>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Ventas</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-globe"></i>
                    <b class="caret hidden-lg hidden-md"></b>
                    <p class="hidden-lg hidden-md">
                      5 Notifications
                      <b class="caret"></b>
                    </p>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Notification 1</a></li>
                    <li><a href="#">Notification 2</a></li>
                    <li><a href="#">Another notification</a></li>
                  </ul>
                </li>
                <li>
                  <a href="">
                    <i class="fa fa-search"></i>
                    <p class="hidden-lg hidden-md">Buscar</p>
                  </a>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right">

                <li>
                    <a href="../../botones.html">
                    <p> Cerrar Sesion</p>
                  </a>
                </li>
                <li class="separator hidden-lg"></li>
              </ul>
            </div>
          </div>
        </nav>


        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                  <div class="card">

                  <div >
                      <button type="button" class="btn btn-success btn-lg btn-block"><a href="Nueva.php" >Generar Recibo <i class="fa fa-plus-square"></i></a></button>
                  </div>
                      <div class="col-md-12">
                          <div class="panel panel-default">
                              <div class="panel-body">
                                  <button type="button" class="btn btn-success"><a href="../Productos/session.php">Agregar Producto</a>  <i class="fa fa-plus-square"></i></button>
                                  <hr>
                                   <?php
                    //Establecemos la conexion
                    $conexion = mysqli_connect('localhost', 'mini', 'mini');
                    if($tipo=="checkbox"){
                      echo '<table class="table table">';
                    echo '  <thead>';
                    echo '<tr>';
                    echo ' <th scope="col">ID Producto</th>';
                    echo ' <th scope="col">Nombre Prod.</th>';
                    echo '<th scope="col">Precio</th>';
                    echo '<th scope="col">Marca</th>';
                    echo '<th scope="col">Presentacion</th>';
                    echo '<th scope="col">Cantidad de Prod.</th>';
                    echo '</tr>';
                    echo '  </thead>';
                    /*
                    $sentencia = "SELECT * FROM mini.producto";
                    $resultado = mysqli_query($conexion, $sentencia);
                    while ($filas = mysqli_fetch_assoc($resultado)) {

                      echo '<tr>';
                      echo '<td>';
                      echo $filas['id_producto'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['nombre_producto'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['precio_producto'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['marca'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['presentacion'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['cantidad_productos'];
                      echo '</td>';
                      echo '<td><input type="checkbox" class="form-check-input" id="exampleCheck1" ></td>';
                      echo '</tr>';
                    }
*/
                    echo '</table>';
                    }else{
                      echo '<table class="table table">';
                    echo '  <thead>';
                    echo '<tr>';
                    echo ' <th scope="col">ID Producto</th>';
                    echo ' <th scope="col">Nombre Prod.</th>';
                    echo '<th scope="col">Precio</th>';
                    echo '<th scope="col">Marca</th>';
                    echo '<th scope="col">Presentacion</th>';
                    echo '<th scope="col">Cantidad de Prod.</th>';
                    echo '</tr>';
                    echo '  </thead>';
                    /*
                    $sentencia = "SELECT * FROM mini.producto";
                    $resultado = mysqli_query($conexion, $sentencia);
                    while ($filas = mysqli_fetch_assoc($resultado)) {

                      echo '<tr>';
                      echo '<td>';
                      echo $filas['id_producto'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['nombre_producto'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['precio_producto'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['marca'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['presentacion'];
                      echo '</td>';
                      echo '<td>';
                      echo $filas['cantidad_productos'];
                      echo '</td>';
                      echo '<td><button type="button" class="btn btn-warning" name="actualizar" ><a href="Actualizar.php?id_producto='.$filas['id_producto'].'""  ">Actualizar  <i class="fa fa-edit"></i></a></button></td>';
                      echo '<td><input type="hidden" class="form-check-input" id="exampleCheck1" ></td>';
                      echo '</tr>';
                    }
                    */

                    echo '</table>';
                    }
                    ?>
                              </div>
                          </div>
                      </div>
                </div>
         
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </body>

  <!--   Core JS Files   -->
 
  <script src="../../assets/js/controladores/VentaController.js" type="text/javascript"></script>
  <script src="../../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
  <script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>

  <!--  Charts Plugin -->
  <script src="../../assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="../../assets/js/bootstrap-notify.js"></script>

  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
  <script src="../../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

  <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
  <script src="../../assets/js/demo.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {

      demo.initChartist();

      $.notify({
        icon: 'pe-7s-gift',
        message: "Bienvenido a las bicicletas su Supremacia."

      }, {
        type: 'warning',
        timer: 4000
      });

    });
  </script>

</html>

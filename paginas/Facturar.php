<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    
    <title>Facturar - Marmori Est.</title>
    <?php
        include "../componentes/head.php";
    ?>
  </head>

  <body class="bg-body">

    <header>
      <?php
        include "../componentes/menu.php";
      ?>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container mt-5">

      <div class="row justify-content-center">

          <div class="col-sm-3   mb-3">

            <form action="../funciones/HacerFacturar.php">
              <div class="form-group">
                <h3 style="color: black" class="h3 mb-5 text-center">Facturar Vehiculo<h3> 
                <h2 class="mt-5 text-center" style="color:hsl(40,100%,60%);">Patente</h2>
                <input class="form-control" autocomplete="off" class="navbar-brand" type="text" name="Patente" required onchange="javascript:this.value=this.value.toUpperCase();"/>
              </div>
              <button  class="btn btn-lg btn-warning btn-block" type="submit"><img class="pr-1" height="30px" width="30px" src="../img/facturar.png"> Facturar</button>

              <?php 
                  date_default_timezone_set('America/Argentina/Buenos_Aires');
                  if (isset($_GET['exito']))
                  {        
                      echo '<p style="color:yellow">Vehiculo facturado!</p>'; 
                  }
                 if (isset($_GET['cobrar'])) 
                  { 
                    $aPagar = $_GET['cobrar'];
                    $ingreso = $_GET['ingreso'];
                    $salida = $_GET['salida'];
                    echo "<p style='color:white'>Fecha de ingreso: ".date("d-m-y H:i",$ingreso)."</p>";
                    echo "<p style='color:white'>Fecha de egreso: ".date("d-m-y H:i",$salida)."</p>";
                    echo "<p style='color:white'>Se facturo: $".$aPagar."</p><br>";
                  }
                  else if (isset($_GET['error'])) 
                  {
                    echo '<p style="color:yellow">Patente no encontrada, Intente nuevamente!</p>';  
                  }
              ?>

            </form>

          </div>

            <div class="col-sm-6">
              <table class="table table-hover table-dark">
                <thead>
                  <h2 class="mb-5 text-center">Vehiculos estacionados</h2>
                  <tr style="color:hsl(40,100%,60%);">
                    <th scope="col">#</th>
                    <th scope="col">Patente</th>
                    <th scope="col">Hora Ingreso</th>
                    <th scope="col">Usuario</th>
                  </tr>
                </thead>
                <tbody>

                <?php 

                    date_default_timezone_set('America/Argentina/Buenos_Aires');

                    include '../funciones/AccesoDatos.php';

                    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                    $consulta =$objetoAccesoDato->RetornarConsulta("select * from Vehiculos");
                    $consulta->execute();
                    $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

                    $contador = 1;

                    foreach ($datos as $Vehiculos) 
                    {

                      echo "<tr><th scope='row'>".$contador."</th>";
                      echo "<td>".$Vehiculos['patente']."</td>";
                      echo "<td>".date("d-m-y H:i",$Vehiculos['horario'])."</td>";
                      echo "<td>".$Vehiculos['usr_registra']."</td></tr>";

                      $contador++;
                    }

                    $contador = $contador - 1;
                  ?>

                </tbody>
              </table>
              <h3 class="mb-5 text-center" style="color: black">Se encuentran <?php echo "$contador"." vehiculos estacionados"?></h3>
            </div>  
        </div>
      
    </main>

    <footer>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

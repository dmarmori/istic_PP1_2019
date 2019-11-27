<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Ingreso v. - Marmori Est. </title>
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
            <form action="HistoricoPorFecha.php">
                <div class="form-group">
                  <h1 style="color: black" class="h1 mb-5 text-center">Ingrese fecha<h1> 
                  <h3 style="color: black" class="text-center">desde<h3> 
                  <input class="form-control" name="Fecha1" autocomplete="off" type="date" class="navbar-brand" required onchange="javascript:this.value=this.value.toUpperCase();"/>
                  <h3 style="color: black" class="text-center">hasta<h3> 
                  <input class="form-control" name="Fecha2" autocomplete="off" type="date" class="navbar-brand" required onchange="javascript:this.value=this.value.toUpperCase();"/>
                </div>  
                  <button  class="btn btn-lg btn-warning btn-block" type="submit"><img class="pr-1" height="30px" width="30px" src="../img/lupa.png">Buscar</button>
              
              </form> 

                     

              <div class="col-sm-8">
              <table class="table table-hover table-dark">
                <thead>
                  <h2 class="mb-5 text-center">Vehiculos estacionados</h2>
                  <tr style="color:hsl(40,100%,60%);">
                    <th scope="col">#</th>
                    <th scope="col">Patente</th>
                    <th scope="col">Hora Ingreso</th>
                    <th scope="col">Hora Egreso</th>
                    <th scope="col">Valor Facturado</th>
                    <th scope="col">Usuario</th>
                  </tr>
                </thead>
                <tbody>

              <?php 
              error_reporting(0);
              //       $Original1 = $_GET['Fecha1'];
              //       $Original2 = $_GET['Fecha2'];

              //       $newDate = date("d-m-y 00:01", strtotime($Original1));
              //       $newDate2 = date("d-m-y 23:59", strtotime($Original2));

              //       $newDat3=mktime($newDate);
              //       $newDat4=mktime($newDate2);

              //       list($day, $month, $year) = explode('-', $Original1);
              //       echo mktime(0, 0, 0, $day, $month, $year);
              //       list($day, $month, $year) = explode('-', $Original2);
              //       echo mktime(0, 0, 0, $day, $month, $year);

              // echo "- 1 ".$Original1;  
              // echo "- 2 ".$Original2; 
              // echo "- 3 ".$newDate;  
              // echo "- 4 ".$newDate2;   
              // echo "- 5 ".$newDat3;  
              // echo "- 6 ".$newDat4;
              // echo "-orueba".mktime(0, 0, 0, $newDate);
              


                    date_default_timezone_set('America/Argentina/Buenos_Aires');

                    include '../funciones/AccesoDatos.php';

                    $Original1 = $_GET['Fecha1'];
                    $Original2 = $_GET['Fecha2'];

                    $newDate = date("d-m-y 00:01", strtotime($Original1));
                    $newDate2 = date("d-m-y 23:59", strtotime($Original2));

                    $Fecha1=mktime($newDate);
                    $Fecha2=mktime($newDate2);

                    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                    $consulta =$objetoAccesoDato->RetornarConsulta("select * from Facturados where horaSalida >= '$Fecha1' and horaSalida <= '$Fecha2'");
                    $consulta->execute();
                    $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

                    $contador = 1;
                    $acumula= 0;

                    foreach ($datos as $Facturados) 
                    {

                      echo "<tr><th scope='row'>".$contador."</th>";
                      echo "<td>".$Facturados['patente']."</td>";
                      echo "<td>".date("d-m-y H:i",$Facturados['horaIngreso'])."</td>";
                      echo "<td>".date("d-m-y H:i",$Facturados['horaSalida'])."</td>";
                      echo "<td>"."$".$Facturados['valorFacturado']."</td>";
                      echo "<td>".$Facturados['usr_factura']."</td></tr>";

                      $contador++;
                      $acumula = ($acumula + $Facturados['valorFacturado']);
                    }

                    $contador = $contador - 1;


              ?>
              </tbody>
          </table>
           
              
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

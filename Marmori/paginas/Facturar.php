<?php
session_start();
?>

<!doctype html>
<html lang="es">
  <head>
    
    <title>Facturar - Marmori Est.</title>
    <?php
        include "../componentes/head.php";
    ?>
  </head>

  <body>

    <header>
      <?php
        include "../componentes/menu.php";
      ?>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <center>
      
        
        <form action="../funciones/HacerFacturar.php">
                <h1>Patente</h1><br>
                <input autocomplete="off" class="navbar-brand" type="text" name="Patente" value="" required>
                <br><br>
        <?php 
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        if (isset($_GET['exito']))
        {        
            echo '<p style="color:green">Vehiculo facturado!</p>'; 
        }
       if (isset($_GET['cobrar'])) 
        { 
          $aPagar = $_GET['cobrar'];
          $ingreso = $_GET['ingreso'];
          $salida = $_GET['salida'];
          echo "<p>Fecha de ingreso: ".date("Y-m-d h:i:sa",$ingreso)."</p><br>";
          echo "<p>Fecha de salida: ".date("Y-m-d h:i:sa",$salida)."</p><br>";
          echo "<p>Se facturo: $".$aPagar."</p><br>";
        }
        else if (isset($_GET['error'])) 
        {
          echo '<p style="color:red">Patente no encontrada, Intente nuevamente!</p>';  
        }
        ?>
                <input class="navbar-brand" type="submit" value="Facturar">
          </form> 
      </center>
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">"El arte de estacionar".</span>
      </div>
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

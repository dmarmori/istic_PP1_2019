<?php
session_start();
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Ingreso v. - Marmori Est. </title>
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
      <h1 style="color:red";> Ingresar Vehiculo<h1>
        
        <form action="/marmori/funciones/HacerVehiculo.php">
                Patente:<br>
                <input autocomplete="off" class="navbar-brand" type="text" name="Patente" value="" required>
                <br><br>
                <input class="navbar-brand" type="submit" value="Ingresar">
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

<?php
session_start();
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Ingreso v. Ok - Marmori Est.</title>
    <?php
        include "../../componentes/head.php";
    ?>

  </head>

  <body>

    <header>
      <?php
        include "../../componentes/menu.php";
      ?>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <center>
      <h1 class="mt-5"style="color:hsl(0,100%,50%);"><em>Ingreso de patente exitoso<em></h1>
      <img src="/Marmori/img/RegistroOk.png">
      <h3><a href="/marmori/paginas/Vehiculo.php">Seguir ingresando</a></h3>
      </center>
    </main>

    <footer>
      
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/Marmori/js/popper.min.js"></script>
    <script src="/Marmori/js/bootstrap.min.js"></script>
  </body>
</html>

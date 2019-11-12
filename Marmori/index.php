<?php
session_start();
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Marmori Estacionamientos</title>
   <?php
        include "componentes/head.php";
    ?>
    

  </head>

  <body>

    <header>
    <?php
        include "componentes/menu.php";
    ?>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5"style="color:hsl(0,100%,50%);"><em>Marmori Estacionamientos SA<em></h1>
      <p class="lead"><h2>Primer sistema de estacionamiento con cobro digital</h2></p>
      <p><h4>"El arte de estacionar"</h4></p>
      
      <center>
     <img src="img/estacionamiento.png"height=350” width=1000”>
     </center>

      <?php
        include "componentes/pie.php";
      ?>
    
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

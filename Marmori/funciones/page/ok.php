<?php
session_start();
?>

<!doctype html>
<html lang="es">
  <head>
   
    <title>Ok - Marmori Est.</title>
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
      <h1 class="mt-5"style="color:green";><em>BIENVENIDO</em></h1>
      </center>

      <h1 class="mt-5"style="color:hsl(0,100%,50%);"><em>Marmori Estacionamientos SA<em></h1>
     <p class="lead"><h2>Primer sistema de estacionamiento con cobro digital</h2></p>
     <p><h4>"El arte de estacionar"</h4></p>

     <center>
      <h1 class="mt-5"style="color:green";><em>
        <?php 
            echo  "Usuario: ".$_SESSION['Usuario']." / "."Tipo de perfil: ".$_SESSION['Perfil']          
        ?>
        <em></h1>
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

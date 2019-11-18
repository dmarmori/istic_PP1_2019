<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
   
    <title>Ok - Marmori Est.</title>
    <?php
        include "../../componentes/head.php";
    ?>
    
  </head>

  <body background="../../img/Fondo.png">
        

    <header>
       
      <?php
        include "../../componentes/menu.php";
      ?>

    </header>
    

    <!-- Begin page content -->
    <main role="main" class="container">

      <h1 class="mt-5"style="color:hsl(40,100%,0%); padding-top: 0px"><em>Marmori Estacionamientos SA<em></h1>

      <center>
      <h1 class="mt-5"style="color:yellow";><em>BIENVENIDO</em></h1>
      </center>

     <p class="lead"><h2 style="color: white">Primer sistema de estacionamiento con cobro digital</h2></p>
     <p><h4 style="color: white">"El arte de estacionar"</h4></p>

     <center>
      <h1 class="mt-5"style="color:yellow";><em>
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
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>

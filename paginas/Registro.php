<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Regstro - Marmori Est. </title>
    <?php
        include "../componentes/head.php";
    ?>
  </head>

  <body background="../img/Fondo.png">

    <header>
      <?php
        include "../componentes/menu.php";
      ?>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
     
            <form action="../funciones/HacerRegistro.php" class="form-signin">
              <div class="text-center mb-4">
                <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Registro de usuario</h1>
              </div> 
                
                
                <input autocomplete="off" type="text" class="form-control" placeholder="Usuario" name="Usuario" required>
                <br /><br>
                <select name="TipoUsuario">
                  <option value="1">empleado</option>
                  <option value="2">admin</option>
                </select><br /><br>
                <input  type="password" class="form-control" placeholder="Ingrese Clave " name="Clave" required>
                <br /><br>
                <button  class="btn btn-lg btn-warning btn-block" type="submit">Ingresar</button>

                <?php 
                    if (isset($_GET['usuarioExistente']))
                    {
                      echo '<p style="color:yellow">El usuario ya existe</p>';
                      echo '<p style="color:white">Intente nuevamente con otro</p>';
                    }
                  ?>
                  
              </form> 

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

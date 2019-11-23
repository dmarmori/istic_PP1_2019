<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Ingreso - Marmori Est.</title>
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

      <h1 class="mt-5"style="color:hsl(40,100%,0%); padding-top: 100px"><em>Marmori Estacionamientos SA<em></h1>    

            <form class="form-signin" action="../funciones/HacerLogin.php">
                <h1 style="color: white" class="h3 mb-3 font-weight-normal">Ingrese sus datos</h1>

                <label for="uname" class="sr-only">Usuario</label>
                <input autocomplete="off" type="text" id="uname" name="Usuario"class="form-control" placeholder="usuario" required autofocus onchange="javascript:this.value=this.value.toUpperCase();"/>

                <label for="psw" class="sr-only">Clave</label>
                <input type="password" id="psw" name="Clave" class="form-control" placeholder="clave" required>

                <div class="checkbox mb-3">
                <label style="color: yellow">
                <input type="checkbox" value="remember-me"> Recordarme
                </label>
                </div>
                <button class="btn btn-lg btn-warning btn-block" type="submit">Ingresar</button>
                <?php
                  if (isset($_GET['errorClave']))
                  {
                    echo '<p style="color:red">La contraseña es incorrecta</p>';
                    echo '<p style="color:white">Vuelva a intentarlo o pongase en contacto con el administrador</p>';
                  }
                  else if (isset($_GET['errorUsuario']))
                  {
                    echo '<p style="color:yellow">Cuenta inexistente o inhabilitada</p>';
                    echo '<p style="color:white">Pongase en contacto con el administrador</p>';
                  }
                ?>
                <p class="mt-5 mb-3 text-muted">&copy; 2020-2020</p>
            
      
          </form>
    </main>

    <footer>
      
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

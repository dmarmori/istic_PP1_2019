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
    <main role="main" class="container mt-4">       

      <div class="row justify-content-center">

            <div class="col-sm-6">

              <form action="../funciones/ActualizarUsuario.php" method="post" accept-charset="utf-8">
                <table class="table table-hover table-dark">
                  <thead>
                    <h2 style="color:hsl(40,100%,60%);" class="mb-5 text-center">Listado de Usuarios</h2>
                    <tr style="color:hsl(40,100%,60%);">
                      <th scope="col">Usuario</th>
                      <th scope="col">TipoUsuario</th>
                      <th scope="col">Habilitar / Deshabilitar</th>
                    </tr>
                  </thead>
             

                  <?php 
                    

                    include '../funciones/AccesoDatos.php';

                    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                    $consulta =$objetoAccesoDato->RetornarConsulta("select * from Usuarios order by habilitado,nombre");
                    $consulta->execute();
                    $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($datos as $Usuarios) 
                    {

                      echo "<tr><th>".$Usuarios['nombre']."</th>";
                      echo "<td>".$Usuarios['tipoUsuario']."</td>";

                      if ($Usuarios['habilitado'] == 0)
                      {
                        echo "<td><button type='submit' name='habilitar' value='".$Usuarios['id']."' class='btn ml-4 btn-secondary'><img class='pr-4' src='../img/icons8_ok_16px.png'>Habilitar</button></td></tr>";
                      } 
                      else
                      {
                        echo "<td><button type='submit' name='deshabilitar' value='".$Usuarios['id']."' class='btn ml-4 btn-warning'><img class='pr-4' src='../img/icons8_cancel_16px.png'>Deshabilitar</button></td></tr>";
                      }


                    }

                  ?>

                </table> 
             </form> 
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

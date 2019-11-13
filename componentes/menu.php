
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/marmori/index.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <?php
              if(isset($SESSION['Usuario'])==false)
                //solo muestra estos item , si el usuario no esta logeado
              {
            ?> 
            <li class="nav-item active">
              <a class="nav-link" href="/marmori/paginas/Login.php">Ingresar</a>
            </li> 
            <?php
              }
            ?>


            <?php
              if(isset($_SESSION['Usuario']))
              {
              //solo muestra el menu si estas con la variable de sesión instaciada
            ?> 
            <li class="nav-item active">
              <a class="nav-link" href="/marmori/paginas/Vehiculo.php">IngresaVehiculo</a>
            </li>
            <li class="nav-item active">
              <a  style="color:red"; class="nav-link" href="/marmori/paginas/Facturar.php">$Facturar</a>
            </li>
            <li class="nav-item active">
              <a  style="color:green"; class="nav-link" href="ListaUsuario.php">Lista Users</a>
            </li>
            <li class="nav-item active">
              <a style="color:green"; class="nav-link" href="ListaVehiculo.php">Lista Vehiculos</a>
            </li>

            <?php
              }
            ?>


            <?php 
            if(isset($_SESSION['Usuario']) && isset($_SESSION['Perfil']) &&$_SESSION['Perfil']=="admin")
            {
              //solo muestra el menu si estas con la variable de sesión instaciada y sos de perfil admin
            ?>
            <li class="nav-item active">
              <a class="nav-link" href="/marmori/paginas/Registro.php">Registrar<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a  style="color:blue"; class="nav-link" href="HistoricoFacturado.php"> Historico Users</a>
            </li>
            <li class="nav-item active">
              <a  style="color:blue"; class="nav-link" href="HistoricoEmpleados.php"> Historico Facturados</a>
            </li>

            <?php
              }
            ?>
              
            <li class="nav-item active">
              <a class="nav-link disabled" href="/marmori/paginas/MasInfo.php" target="_blank">Mas info</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" action="/Marmori/funciones/hacerLogout.php">
            <input class="form-control mr-sm-2" type="text"

                placeholder=
                <?php 
                  if(isset($_SESSION['Usuario']))
                    //Muestra el usuaio que esta logueado
                {  

                 ?> 
                   <?php echo  $_SESSION['Usuario']."-".$_SESSION['Perfil'] ?>
                <?php 
                }
                else
                {
                ?>             
                "Usuario Logeado"
                <?php 
                }
              ?>

            aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Salir</button>
          </form>
        </div>
      </nav>
    
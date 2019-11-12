<?php
	include 'AccesoDatos.php';
	session_start();


		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select nombre,clave,tipoUsuario from usuario");
		$consulta->execute();
		$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

		foreach ($datos as $usuario) 
			{
				if ($usuario["nombre"] == $_GET['Usuario']) 
				{				 
					if ($usuario["clave"] == $_GET['Clave'])
					{
		
						$_SESSION['Usuario']=$usuario["nombre"];
						$_SESSION['Perfil']=$usuario["tipoUsuario"];
						header("Location: page/ok.php");
						exit();
					}
					else
					{
					
						//header("Location: page/nok.php");
						header("Location: ../paginas/login.php?errorClave");
						exit();
					}
				}

			}
		

		header("Location: ../paginas/login.php?errorUsuario");
		exit();
		
	
	exit();

?>
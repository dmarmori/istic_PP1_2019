<?php
	include 'AccesoDatos.php';
	session_start();


		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from Usuarios");
		$consulta->execute();
		$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

		foreach ($datos as $usuario) 
			{
				if (($usuario["nombre"] == $_GET['Usuario']) && ($usuario["habilitado"] == "1"))
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
					
						header("Location: ../paginas/Login.php?errorClave");
						exit();
					}
				}

			}
		

		header("Location: ../paginas/Login.php?errorUsuario");
		exit();
		
	
	exit();

?>
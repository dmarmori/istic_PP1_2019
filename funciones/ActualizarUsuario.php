<?php
	include 'AccesoDatos.php';
	session_start();

	if (isset($_POST['habilitar'])) 
	{
		$UsuarioModificar = $_POST['habilitar'];
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$update = "UPDATE Usuarios SET habilitado = 1 WHERE id = '$UsuarioModificar'";
		
		$modificar =$objetoAccesoDato->RetornarConsulta($update);
		$modificar->execute();
		header ("Location: ../paginas/ListaUsuarios.php?actualizar=exito");
		exit();
	}
	elseif (isset($_POST['deshabilitar'])) 
	{
		$UsuarioModificar = $_POST['deshabilitar'];
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$update = "UPDATE Usuarios SET habilitado = 0 WHERE id = '$UsuarioModificar'";
		
		$modificar =$objetoAccesoDato->RetornarConsulta($update);
		$modificar->execute();
		header ("Location: ../paginas/ListaUsuarios.php?actualizar=exito");
		exit();
	}

?>
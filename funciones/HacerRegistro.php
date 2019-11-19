<?php

include 'AccesoDatos.php';
session_start();

$miobjeto=new stdClass();
$miobjeto->Usuario=$_GET['Usuario'];
$miobjeto->Clave=$_GET['Clave'];

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("select nombre from Usuarios");
	$consulta->execute();			
	$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);	

	foreach ($datos as $usuario ) 
	{
		if ($usuario['nombre'] == $miobjeto->Usuario) 
		{	
			header("Location: ../paginas/Registro.php?usuarioExistente=error");
			exit();
		}			
	}

	switch ($_GET['TipoUsuario'])
	{
		case '1':
			$Tusuario = "empleado";
			break;
		case '2':
			$Tusuario = "admin";
			break;
		default:
			$Tusuario = "";
			break;
	}

$miobjeto->Tusuario = $Tusuario;

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$select="INSERT INTO Usuarios (nombre, clave, tipoUsuario, habilitado) VALUES ('$miobjeto->Usuario','$miobjeto->Clave','$miobjeto->Tusuario',1)";
$consulta =$objetoAccesoDato->RetornarConsulta($select);
$consulta->execute();

header("Location: page/RegistroOk.php");

?>
<?php

include 'AccesoDatos.php';
session_start();

$miobjeto=new stdClass();
$miobjeto->Usuario=$_GET['Usuario'];
$miobjeto->Clave=$_GET['Clave'];

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

$miobjeto->Tusuario= $Tusuario;

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$select="INSERT INTO Usuarios (nombre, clave, tipoUsuario, habilitado) VALUES ('$miobjeto->Usuario','$miobjeto->Clave','$miobjeto->Tusuario','1')";
$consulta =$objetoAccesoDato->RetornarConsulta($select);
$consulta->execute();

//header("Location: page/RegistroOk.php");

?>
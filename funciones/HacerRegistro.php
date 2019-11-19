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

$miobjeto->Tusuario = $Tusuario;



//header("Location: page/RegistroOk.php");

?>
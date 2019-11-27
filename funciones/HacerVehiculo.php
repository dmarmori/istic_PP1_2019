<?php

include 'AccesoDatos.php';
session_start();

	$miobjetoVehiculo=new stdClass();

	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$IngresoHora = mktime();

	$miobjetoVehiculo->Patente = $_GET['Patente'];
	$miobjetoVehiculo->Horario = $IngresoHora;
	$miobjetoVehiculo->UsrRegistra = $_SESSION['Usuario'];

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("select patente from Vehiculos");
	$consulta->execute();			
	$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);	

	foreach ($datos as $patente ) 
	{
		if ($patente['patente'] == $miobjetoVehiculo->Patente) 
		{	
			header("Location: ../paginas/Vehiculo.php?patenteExistente=error");
			exit();
		}			
	}
	
	$alpha6=substr($_GET['Patente'], 0,3);
	$digit6 = substr($_GET['Patente'], 3,3);
	$alpha17=substr($_GET['Patente'], 0,2);
	$digit7=substr($_GET['Patente'], 2,3);
	$alpha27=substr($_GET['Patente'], 5,2);

	if (strlen($_GET['Patente']) == 6)
	{
			if (ctype_alpha($alpha6) && ctype_digit($digit6)) 
			{
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$select="INSERT INTO Vehiculos (patente, horario, usr_registra) VALUES ('$miobjetoVehiculo->Patente','$miobjetoVehiculo->Horario','$miobjetoVehiculo->UsrRegistra')";
				$consulta =$objetoAccesoDato->RetornarConsulta($select);
				$consulta->execute();

				header("Location: page/IngresoPatenteOK.php");
				exit();
			}	
			else
			{
			header("Location: ../paginas/Vehiculo.php?patenteNoOk=error");
			exit();
			}
	}
	else if (strlen($_GET['Patente']) == 7)
		{
			if (ctype_alpha($alpha17) && ctype_digit($digit7) && ctype_alpha($alpha27))
			{
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$select="INSERT INTO Vehiculos (patente, horario, usr_registra) VALUES ('$miobjetoVehiculo->Patente','$miobjetoVehiculo->Horario','$miobjetoVehiculo->UsrRegistra')";
				$consulta =$objetoAccesoDato->RetornarConsulta($select);
				$consulta->execute();

				header("Location: page/IngresoPatenteOK.php");
				exit();
			}		
			else
			{
				header("Location: ../paginas/Vehiculo.php?patenteNoOk=error");
				exit();
			}
		}
	else
	{
		header("Location: ../paginas/Vehiculo.php?patenteNoOk=error");
		exit();
	}
	

	

?>	
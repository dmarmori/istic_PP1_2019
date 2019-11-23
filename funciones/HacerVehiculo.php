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
	$select="INSERT INTO Vehiculos (patente, horario, usr_registra) VALUES ('$miobjetoVehiculo->Patente','$miobjetoVehiculo->Horario','$miobjetoVehiculo->UsrRegistra')";
	$consulta =$objetoAccesoDato->RetornarConsulta($select);
	$consulta->execute();

	

	header("Location: page/IngresoPatenteOK.php");

?>	
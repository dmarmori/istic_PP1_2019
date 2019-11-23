<?php

include 'AccesoDatos.php';
session_start();

	$miobjetoVehiculo=new stdClass();

	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$IngresoHora = mktime();

	$miobjetoVehiculo->Patente = $_GET['Patente'];
	$miobjetoVehiculo->Horario = $IngresoHora;

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$select="INSERT INTO Vehiculos (patente, horario) VALUES ('$miobjetoVehiculo->Patente','$miobjetoVehiculo->Horario')";
	$consulta =$objetoAccesoDato->RetornarConsulta($select);
	$consulta->execute();

	

	header("Location: page/IngresoPatenteOK.php");

?>	
<?php
	include 'AccesoDatos.php';
	session_start();


		


	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Facturados.csv');

	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');

	// output the column headings
	fputcsv($output, array('patente;horaIngreso;horaEgreso;valorFacturado;Usuario'));

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("select patente,horaIngreso,horaSalida,valorFacturado,usr_factura from Facturados order by id");
  	$consulta->execute();
 	$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

	foreach ($datos as $Facturados) 
	{
	
	 	$arrayName = array($Facturados["patente"],date("d-m-y H:i",$Facturados["horaIngreso"]),date("d-m-y H:i",$Facturados["horaSalida"]),$Facturados["valorFacturado"],$Facturados["usr_factura"]);

		fputcsv($output, $arrayName,';');
	}


	
?>
<?php
	include 'AccesoDatos.php';
	session_start();

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select patente,horario from vehiculos");
		$consulta->execute();
		$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

	//Inicializo variables
	$PrecioF = 100;	
	$contadorF = 0;
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$SalidaHora = mktime(); 

	$PatenteIngresada = $_GET['Patente'];
	
		foreach ($datos as $vehiculosEstacionados)  
		{

			//$objetoPatente = $objetoVehiculo->Patente;
			//$horaEntrada = $objetoVehiculo->Horario;

			if ($vehiculosEstacionados["patente"] == $PatenteIngresada) 
			{	
				$diffSegundos = $SalidaHora - $vehiculosEstacionados["horario"];

				while ($diffSegundos >= 3600) 
				{			
					if ($diffSegundos >= 3600) 
					{
						$contadorF++;
						$diffSegundos = $diffSegundos - 3600;
					}
					else if ($diffSegundos >= 1800)
					{
						$contadorF++;
					}					
				}
				$ValorCobrar = $contadorF * $PrecioF;

				//Paso parametros a la clase miobjetoVehiculoFact
				$PatenteFact = $vehiculosEstacionados["patente"];
				$HorarioIniFact = $vehiculosEstacionados["horario"];
				$HorarioSalFact = $SalidaHora;
				$ValorFacturado = $ValorCobrar;

				//Guardo datos de facturado en BD

				$select="INSERT INTO facturados (patente, horaIngreso, horaSalida, valorFacturado) VALUES ('$PatenteFact','$HorarioIniFact','$HorarioSalFact','$ValorCobrar')";
				$consulta =$objetoAccesoDato->RetornarConsulta($select);
				$consulta->execute();

							

				//Envio datos Factrar.php para mostrar resltado en pantalla
				//header("Location: /Marmori/Facturar.php?exito");
				header("Location: /Marmori/paginas/Facturar.php?exito=exito&cobrar=".$ValorCobrar."&ingreso=".$vehiculosEstacionados["horario"]."&salida=".$SalidaHora);
				exit();
			}
			else
			{
				header("Location: /Marmori/paginas/Facturar.php?error");
			}
      	}

      	//break;
      	//Prueba para deneter el .php y verificar algo!
      	//var_dump("prueba");
      	//die();
      		
?>
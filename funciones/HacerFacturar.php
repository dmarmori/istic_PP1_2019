<?php
	include 'AccesoDatos.php';
	session_start();

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select patente,horario from Vehiculos");
		$consulta->execute();
		$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

	//Inicializo variables
	$PrecioF = 100;	
	$contadorF = 0;
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$SalidaHora = mktime();
	$UsrFactura = $_SESSION['Usuario']; 

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

				$Insertar="INSERT INTO Facturados (patente, horaIngreso, horaSalida, valorFacturado,usr_factura) VALUES ('$PatenteFact','$HorarioIniFact','$HorarioSalFact','$ValorCobrar','$UsrFactura')";
				$Insert =$objetoAccesoDato->RetornarConsulta($Insertar);
				$Insert->execute();

				//Borro el registro de Vechivulos

				$Delete="DELETE FROM Vehiculos WHERE patente = '$PatenteFact'";
				$Borrar =$objetoAccesoDato->RetornarConsulta($Delete);
				$Borrar->execute();							

				//Envio datos Factrar.php para mostrar resltado en pantalla
				//header("Location: /Marmori/Facturar.php?exito");
				header("Location: ../paginas/Facturar.php?exito=exito&cobrar=".$ValorCobrar."&ingreso=".$vehiculosEstacionados["horario"]."&salida=".$SalidaHora);
				exit();
			}
			else
			{
				header("Location: ../paginas/Facturar.php?error");
			}
      	}

      	//break;
      	//Prueba para deneter el .php y verificar algo!
      	//var_dump("prueba");
      	//die();
      		
?>
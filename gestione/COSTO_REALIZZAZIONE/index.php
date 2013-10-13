<!DOCTYPE html>
<html>

<head>
		<meta charset="utf-8">
		<title>.: HQDesign Calcolo Budget Mensile :.</title>
		<meta name="description" content="Qui inserisci la description">
		<link href="cssReset.css" rel="stylesheet" type="text/css" />
</head>

<body>
	
		<?php 
				//CONNESSIONE AL DATABASE HQD
				$con=mysqli_connect("localhost","hqd","hqd","hqd_schede_lavoro");
				if (mysqli_connect_errno($con)){
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$idScheda = $_GET['id_scheda'];
				//echo "mese ".$mese[0];
				$result = mysqli_query($con,"SELECT costoRealizzazione FROM scheda_lavoro WHERE id=".$idScheda);
				while($row = mysqli_fetch_array($result)){
					echo "Costo Lavoro: ".$row['costoRealizzazione'];
					//$totale = $totale + utf8_decode($row['costoRealizzazione']);
				}
				mysqli_close($con);
		?><br />
		
		<a href="budget.php">Calcola costi mensili totali</a>
</body>

</html>
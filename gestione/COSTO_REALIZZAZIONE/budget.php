<!DOCTYPE html>
<html>
 
<head>
	<meta charset="utf-8">
	<title>Metti il titolo qui</title>
	<meta name="description" content="Qui inserisci la description">
	<link href="cssReset.css" rel="stylesheet" type="text/css" />
	<link href="style.css" rel="stylesheet" type="text/css" /> <!-- OPZIONALE -->
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
	<span>Costo Mensile Calcolato: </span>
	<input type="text" name="bud" id="budget" />
	<br />
	<input type="submit" value="Calcola Budget" />
	<span id="utileMedio">Utile Medio Giornaliero per rientrare: </span>
	<br />
	<select name="selectMese[]" id="selMese">
		<option value="00" selected="selected">Mese</option>
		<option value="01">gennaio</option>
		<option value="02">febbraio</option>
		<option value="03">marzo</option>
		<option value="04">aprile</option>
		<option value="05">maggio</option>
		<option value="06">giugno</option>
		<option value="07">luglio</option>
		<option value="08">agosto</option>
		<option value="09">settembre</option>
		<option value="10">ottobre</option>
		<option value="11">novembre</option>
		<option value="12">dicembre</option>
	</select>
</form>
		
<?php 
	if($_SERVER['REQUEST_METHOD']=='GET'){ /* LA PRIMA VOLTA CHE RICHIAMIAMO LO SCRIPT CREIAMO LA FORM HTML */
	} else if($_SERVER['REQUEST_METHOD'] == 'POST'){ /* IL METHOD DELLA FORM E' GET */
		//CONNESSIONE AL DATABASE HQD
		$con=mysqli_connect("localhost","hqd","hqd","hqd_schede_lavoro");
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		//QUERY CHE SELEZIONA IL MESE 2013 RICHIESTO
		$mese = $_POST['selectMese'];
		//echo "mese ".$mese[0];
		$result = mysqli_query($con,"SELECT costoRealizzazione FROM scheda_lavoro WHERE DataConsegna >= '2013-".$mese[0]."-01' AND DataConsegna <= '2013-".$mese[0]."-30'");
		//CICLO CHE CALCOLA IL COSTO TOTALE A CUI VA AGGIUNTA LA SOMMA DEI COSTI GENERICI
		$totale = 0;
		while($row = mysqli_fetch_array($result)){
		$totale = $totale + utf8_decode($row['costoRealizzazione']);
		}
		$utile = $totale/30;
		echo "<script> document.getElementById('budget').value = '".$totale." + COSTI GENERICI'; </script>";
		echo '<script> document.getElementById("utileMedio").innerHTML = "Utile Medio giornaliero per rientrare: '.$utile.'";  </script>';
		//echo "budget totale: ".$totale;
		mysqli_close($con);
		}else{
		die("This script only works with GET and POST request.");
		}?>
</body>
</html> 
<!-- DIV CONTAINER -->
<?php
	require ('COSTO_REALIZZAZIONE/objConnector.php');
?>

<div style="height:400px">

	<p>
		<h2>LISTA SPESE GENERICHE</h2>

		<script type="text/javascript">
			function myFunction() {
				alert("Hello World!");
			}
		</script>
		
		<table style="text-align:center;">
			<tr>
				<td>DESCRIZIONE</td>
				<td>COSTO</td>
				<td>DATA</td>
			</tr>
		<?php
		//CONNESSIONE AL DATABASE HQD
		$con = mysqli_connect("localhost", "hqd", "hqd", "hqd_schede_lavoro");
		if (mysqli_connect_errno($con)) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($con, "SELECT * FROM costigenerici");
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo '<td>' . $row['note'] . '</td><td>' . $row['costo'] . '</td><td>'.$row['data'].'</td>';
			echo "</tr>";
			//$totale = $totale + utf8_decode($row['costoRealizzazione']);
		}
		mysqli_close($con);
		?>
		</table>
	</p>

</div>
<!-- FINE DIV CONTAINER -->
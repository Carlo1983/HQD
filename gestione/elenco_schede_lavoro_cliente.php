
<?php
	require('dbmanager.inc.php'); $manager_sql = new dbManager();
	
	$idcliente = $_POST['id_cliente'];
	$idsettore = $_POST['id_settore'];
	
	$schede_array = $manager_sql->get_schedaLavoro_by_cliente($idcliente,$idsettore);
	$cnt_sl = count($schede_array);

	echo "<table>";
	echo "<tr><th align='left'>Lavoro</th><th>&nbsp;&nbsp;</th><th align='left'>Consegna</th><th></th><th></th><th></th><th></th></tr>";
			
	for($i=0; $i<$cnt_sl; $i++){
		$id_scheda = $schede_array[$i][0];
		$titolo = $schede_array[$i][7];
		$consegna = $schede_array[$i][9];
		
		$posizione = $schede_array[$i]['Posizione'];
		$scheda_prev = $schede_array[$i-1][0];
		$scheda_next = $schede_array[$i+1][0];
		
		
		$data_consegna_arr = explode('-',$consegna);
		$data_consegna = $data_consegna_arr[2].'/'.$data_consegna_arr[1].'/'.$data_consegna_arr[0];
		
		
		echo "<tr><td align='left'>".$titolo."</td><td></td><td align='left' width='60' >".$data_consegna."</td>";
		echo "<td width='20' ><img src='images/modify.png' width='15' height='15' class='modify_cat' onclick='open_modifica_schedalavoro($id_scheda, $idcliente)' ></td>
                <td width='20'><img src='images/trash.png' width='15' height='15' class='modify_cat' onclick='delete_schedalavoro($id_scheda, \"$titolo\",$idcliente)'></td>";
		
		if(is_null($scheda_prev))
			echo "<td>&nbsp;</td>";
		else
			echo "<td><img class='cursor_pointer' src='images/arrow-up.png' width='13' height='13' onclick='position_change($id_scheda,\"su\",$posizione,$scheda_prev)' /></td>";
		
		if(is_null($scheda_next))
			echo "<td>&nbsp;</td>";
		else
			echo "<td><img class='cursor_pointer' src='images/arrow-down.png' width='13' height='13' onclick='position_change($id_scheda,\"giu\",$posizione,$scheda_next)' /></td>";
				
		echo "<td align='center' width='20'><span style='color:#FF6600'>$posizione</span></td>";
		
	} 
	
	echo "<table>";
	
?>
<style>
.ijiy{ color:#FF6600}
</style>
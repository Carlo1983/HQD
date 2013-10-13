<table width="960"  id="box-table-a">
	<thead>
        <tr>
        	<th align="left">Cliente</th>
            <th align="left">Tipo Lavoro</th>
            <th align="left">Stato</th>
            <th align="center">Priorità</th>
            <th align="left">Consegna</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php
		$idOperatore = $_SESSION['id_op'];
		$stato='';
		//$idOperatore = $_POST['id_op'];
		$lavori_array = $manager_sql->get_schedaLavoro_by_operatore($idOperatore,$stato);
		$cnt_lav = count($lavori_array);
								
		$settore_sel = "";
								
		for($i=0; $i<$cnt_lav; $i++){
			$idlavoro = $lavori_array[$i][0];
			$idcliente = $lavori_array[$i][1];
			$data_inserimento = $lavori_array[$i][2];
			$stato = $lavori_array[$i][3];
			$idSettore = $lavori_array[$i][5];
			$titolo = $lavori_array[$i][7];
			$consegna = $lavori_array[$i][9];
			$priorita = $lavori_array[$i][10];
			$importanza = $lavori_array[$i][11];
			
			$data_consegna_arr = explode('-',$consegna);
			$data_consegna = $data_consegna_arr[2].'/'.$data_consegna_arr[1].'/'.$data_consegna_arr[0];
			
			$cliente_arr = $manager_sql->get_cliente_by_id($idcliente);
			$cliente_nome = $cliente_arr[0][1];
			
			
	?>
    	<tr onclick='open_modifica_schedalavoro(<?php echo $idlavoro.','.$idcliente?>)'>
        	<td align="left"><?php echo $cliente_nome?></td>
        	<td align="left"><?php echo $titolo?></td>
            <td align="left"><?php echo $stato?></td>
            <td align="center"><img src="images/<?php echo "priorita_".$priorita.".gif"?>" /> </td>
            <td align="left"><?php echo $data_consegna?></td>
            <td></td>
        </tr>
    <?php
		}
	?>
    </tbody>
</table>
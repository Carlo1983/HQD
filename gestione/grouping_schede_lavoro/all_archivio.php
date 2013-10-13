<?php require('../dbmanager.inc.php'); $manager_sql = new dbManager(); ?>

<script>
    $(function(){
        $('.tab_archivio').dataTable( {
	"bJQueryUI": true,
        "aoColumns": [
            null,
            null,
            null,
            null,
            null
            /* 
            { "bSortable": false },
            { "bSortable": false }*/
        ],
       "oLanguage": {
            "sInfo": "Record _START_ a _END_ di _TOTAL_ totali",
            "sInfoEmpty": "nessun record"
         },
          "bPaginate": false
        } );
    })
</script>
<table width="1200" class="tab_archivio tab_ric">
	<thead>
    <tr>
                    <th align="left">Cliente </th>
                    <th align="left">Tipo Lavoro </th>
                    <th align="left">Stato </th>
                    <th align="center" width="80">Priorit&aacute; &nbsp;</th>
                    <th align="left">Consegna &nbsp; </th>
                    
    </tr>
    </thead>
    <tbody>
    <?php
		
		//$idOperatore = $_POST['id_op'];
		//$lavori_array = $manager_sql->get_all_schedeLavoro(1);
		$lavori_array = $manager_sql->get_all_schedeLavoro(9);
		$cnt_lav = count($lavori_array);
								
		$settore_sel = "";
		//for($i=0; $i<$cnt_lav; $i++){						
		for($i=0; $i<$cnt_lav-1; $i++){
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
			
			/*POSIZIONE GENERICA*/
			$posizione = $lavori_array[$i]['PosizioneGenerale'];
			//$scheda_prev = $lavori_array[$i-1][0];
			$scheda_prev = $lavori_array[$i][0];
			$scheda_next = $lavori_array[$i+1][0];
			/********************/
			
			
								
			
			?>
         <tr onclick="open_modifica_schedalavoro_admin(<?php echo $idlavoro?>)">
        	<td align="left"><?php echo $cliente_nome?></td>
        	<td align="left"><?php echo $titolo?></td>
            <td align="left"><?php echo $stato?></td>
            <td align="center"><img src="images/<?php echo "priorita_".$priorita.".gif"?>" /> </td>
            <td align="left"><?php echo $data_consegna?></td>
           
        </tr>
    	
	<?php
		}
	?>
    </tbody>
</table>
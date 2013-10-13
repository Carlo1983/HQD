<div style="height:400px">
        
        <div style="position:relative; float:left; height:300px;">
            <p style="background-color:#FF9933; padding:5px">Lista Operatori</p>
            <div style="background-color:#CCCCCC; padding-top:10px; position:relative; top:-20px">
            <table class="table-segreteria">
            <tr><th align="left">Nome</th><th align="left">Cognome</th><th align="left">Interno</th><th align="left">Telefono</th><th align="left">Mail</th></tr>
            <?php
				$operatori_array = $manager_sql->get_lista_operatori();
				$cnt_cat = count($operatori_array);
				
				$settore_sel = "";
				
				for($i=0; $i<$cnt_cat; $i++){
				
				$id_op = $operatori_array[$i][0];
				$nome_op = $operatori_array[$i][1];
				$cognome_op = $operatori_array[$i][2];
				$interno_op = $operatori_array[$i][3];
				$id_settore = $operatori_array[$i][7];
				
                                $mail = $operatori_array[$i]['Mail'];
				
                                $title_settore_arr = $manager_sql->get_settore_by_Id($id_settore);
				$title_settore = $title_settore_arr[0][1];
				
                                $tel = $operatori_array[$i]['Cell1'];
                                if($operatori_array[$i]['Cell2']!=''){
                                   $tel .= ' | '.$operatori_array[$i]['Cell2'];
                                }
                                
				if($settore_sel != $title_settore){
					$settore_sel = $title_settore;
					echo "<tr style='background-color:#999'> <td ><strong>$title_settore</strong></td><td></td><td></td><td></td><td></td></tr>";
				}
				
			?>
            <tr>
            	<td align="left"><?php echo $nome_op ?></td>
                <td align="left"><?php echo $cognome_op ?></td>
                <td align="left"><?php echo $interno_op ?></td>
                <td  align="left"><?php echo $tel ?></td>
                <td  align="left"><?php echo $mail ?></td>
                
            </tr>
            <?php		
				}
			?>
            </table>
            </div>
            
            
            
            
        </div>	
    	
        </div>
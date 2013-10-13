<div style="height:400px">
        
        <div style="position:relative; float:left; height:300px;">
            <p style="background-color:#FF9933; padding:5px">Lista Operatori</p>
            <div style="background-color:#CCCCCC; padding-top:10px; position:relative; top:-20px">
            <table cellpadding="5">
            <tr><th>Nome</th><th>Cognome</th><th>Interno</th><th></th><th></th></tr>
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
				
				$title_settore_arr = $manager_sql->get_settore_by_Id($id_settore);
				$title_settore = $title_settore_arr[0][1];
				
				if($settore_sel != $title_settore){
					$settore_sel = $title_settore;
					echo "<tr><td ><strong>$title_settore</strong></td><td></td><td></td><td></td><td></td></tr>";
				}
				
			?>
            <tr>
            	<td ><?php echo $nome_op ?></td>
                <td ><?php echo $cognome_op ?></td>
                <td ><?php echo $interno_op ?></td>
                <td><img src="images/modify.png" width="15" height="15" class='modify_cat' onclick="modify_op(<?php echo $id_op?>)"></td>
                <td><img src="images/trash.png" width="15" height="15" class='modify_cat' onclick="delete_op(<?php echo $id_op?>, '<?php echo $nome_op." ".$cognome_op?>')"></td>
            </tr>
            <?php		
				}
			?>
            </table>
            </div>
            
            
            
            <div id="dialog-form" title="Modifica Operatore">
                    
                    <form action="" method="post" id="form_update_operatore" >
                <table>
                <tr><td>Nome: <input type="text" name="nome_operatore" id="nome_operatore_dg"></td><td>Cognome: <input type="text" name="cognome_operatore" id="cognome_operatore_dg"></td></tr>
                <tr>
                    <td>N&deg; Interno: <input name="interno" id="interno_dg" style="width:50px"/></td>
                    <td>Mail: <input type="text" name="email_operatore" id="email_operatore_dg"></td>
                </tr>
                <tr><td>Cell1: <input type="text" name="cell1" id="cell1_dg"></td><td>Cell2: <input type="text" name="cell2" id="cell2_dg"></td></tr>
                <tr><td>Settore: 
                        <select name="settore_operatore" id="settore_operatore_dg">
                       	<?php
							$settori_array = $manager_sql->get_lista_settori();
							$cnt_cat = count($settori_array);
							
							$tipo_sel = "";
							
							for($j=0; $j<$cnt_cat; $j++){
							
							$id_cat = $settori_array[$j][0];
							$nome_cat = $settori_array[$j][1];
						?>
                        <option value="<?php echo $id_cat?>" ><?php echo $nome_cat?></option>
                        <?php }?>
                       
                        </select>
                        <input type="hidden" name="id_op" id="id_op" value=""/>
                    </td></tr>

                
                </table>
            </form>
                </div>
            
        </div>
		<!--fine lista operatori -->
        
        <div style="position:relative; float:left; margin-left:20px; height:300px">
            <p style="background-color:#FF9933; padding:5px">Aggiungi Nuovo Operatore </p>
            <div style="background-color:#CCCCCC; padding-top:10px; position:relative; top:-20px">
            <form action="operatore_aggiungi.php" method="post" id="form_nuovo_operatore">
                <table>
                <tr><td>Nome: <input type="text" name="nome_operatore"></td><td>Cognome: <input type="text" name="cognome_operatore"></td></tr>
                <tr>
                    <td>N&deg; Interno: <input name="interno" style="width:50px"/></td>
                    <td>Mail: <input type="text" name="email_operatore"></td>
                </tr>
                <tr><td>Cell1: <input type="text" name="cell1"></td><td>Cell2: <input type="text" name="cell2"></td></tr>
                <tr><td>Settore: 
                        <select name="settore_operatore">
                       	<?php
							$settori_array = $manager_sql->get_lista_settori();
							$cnt_cat = count($settori_array);
							
							$tipo_sel = "";
							
							for($j=0; $j<$cnt_cat; $j++){
							
							$id_cat = $settori_array[$j][0];
							$nome_cat = $settori_array[$j][1];
						?>
                        <option value="<?php echo $id_cat?>" ><?php echo $nome_cat?></option>
                        <?php }?>
                       
                        </select>
                    </td></tr>
					
                <tr><td><input type="button" value="Aggiungi" id="btn_nuovo_operatore"></td><td></td></tr>
                </table>
            </form>
            </div>
            
        </div>
		<!-- fine aggiungi operatore -->
    	
        </div>
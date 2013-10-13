<div style="height:400px">
<div style="height:400px; float:left; position:relative; ">
        	<p style="background-color:#FF9933; padding:5px">Lista Fornitori</p>
            <div style="background-color:#CCCCCC; padding-top:10px; position:relative; top:-20px">
 <table class="table-segreteria"  >
     <tr><th width="300" align="left">Ragione Sociale</th><th width="150" align="left">Telefono</th><th width="150" align="left">Citt&aacute;</th><th width="20">&nbsp;</th></tr>
 </table>
 <div style="height:315px; overflow:scroll">
     <table class="table-segreteria" >
			<?php
				$clienti_array = $manager_sql->get_lista_fornitori();
				$cnt_cat = count($clienti_array);
				
				$settore_sel = "";
				
				for($i=0; $i<$cnt_cat; $i++){
				
				$id_cliente = $clienti_array[$i][0];
				$nome_cliente = $clienti_array[$i][1];
				
				$citta_cliente = $clienti_array[$i][3];
				$tel_cliente = $clienti_array[$i]['Telefono'];
				
			?>
            <tr>
            	<td width="300" align="left"><?php echo $nome_cliente ?></td>
                <td width="150" align="left"><?php echo $tel_cliente ?></td>
                <td width="150" align="left"><?php echo $citta_cliente ?></td>
                
                <td><img src="gestione/images/modify.png" width="15" height="15" class='modify_cat' onclick="modify_fornitore(<?php echo $id_cliente?>)"/></td>
                
            </tr>
            <?php		
				}
			?>
            </table>           
            </div>
            
            </div>
         </div>
         
         <div id="dialog-form-fornitore" title="Modifica Fornitore">
                    
                    <form action="" method="post" id="form_update_fornitore" >
                <table>
                <tr>
                	<td colspan="2">Ragione Sociale: <input type="text" name="rag_soc_dg" id="rag_soc_for" style="width:300px"></td>
                </tr>
                <tr>
                    <td>PIVA: <input type="text" name="piva_dg" id="piva_for"></td>
                    <td>CF: <input type="text" name="cf_dg" id="cf_for"></td>
                </tr>
                <tr>
                    <td colspan="2">Indirizzo: <input type="text" name="indirizzo_dg" id="indirizzo_for" style="width:300px"></td>
                </tr>
                <tr>
                    
                    <td>Citt&aacute;: <input type="text" name="citta_dg" id="citta_for"></td>
                    <td>CAP: <input type="text" name="cap_dg" id="cap_for"></td>
                </tr>
                <tr><td colspan="2"><hr width="100%" /></td></tr>
                
                <tr><td colspan="2">Referente: <input type="text" name="referente_dg" id="referente_for"  style="width:300px"></td></tr>
                <tr><td colspan="2">E-mail: <input type="text" name="mail_dg" id="mail_for" style="width:300px"></td></tr>
                <tr><td>Cell1: <input type="text" name="cell1_dg" id="cell1_cliente_for"></td><td>Cell2: <input type="text" name="cell2_dg" id="cell2_cliente_for"></td></tr>
                <tr>
                	<td>Telefono: <input type="text" name="tel_dg" id="tel_for"></td>
                    <td>Sito: <input type="text" name="sito_dg" id="sito_for"></td>
                </tr>
		
                <tr><td colspan="2"><hr width="100%" /></td></tr>
                
                
                <tr><td colspan="2">Tipo: 
                    <select name="tipo" id="tipo_fornitore">
                            <?php 
                                
                                for($i=0; $i<$cnt_arr_tipo; $i++){
                            ?>
                        <option value="<?php echo $tipo_arr[$i]?>"> <?php echo $tipo_arr[$i]?> </option>
                            <?php        
                                }
                            ?>
                        </select>
                    </td></tr>
                
                <input type="hidden" name="id_cliente_dg" id="id_cliente_for" value=""/>
                </table>
            </form>
                </div>
        
        
</div>
<div style="height:400px">
<div style="height:400px; float:left; position:relative; ">
        	<p style="background-color:#FF9933; padding:5px">Lista Clienti</p>
            <div style="background-color:#CCCCCC; padding-top:10px; position:relative; top:-20px">
 
 <div style="height:400px; overflow:auto">
 <table cellpadding="5" class="tabella_ricerca">
     <thead>
         <tr><th width="280" align="left">Ragione Sociale</th><th width="100" align="left">Citt&aacute;</th><th></th><th></th></tr>
     </thead>
     <tbody>
			<?php
				$clienti_array = $manager_sql->get_lista_clienti();
				$cnt_cat = count($clienti_array);
				
				$settore_sel = "";
				
				for($i=0; $i<$cnt_cat; $i++){
				
				$id_cliente = $clienti_array[$i][0];
				$nome_cliente = $clienti_array[$i][1];
				
				$citta_cliente = $clienti_array[$i][3];
				
				
			?>
            <tr>
            	<td ><?php echo $nome_cliente ?></td>
                
                <td ><?php echo $citta_cliente ?></td>
                
                <td><img src="images/modify.png" width="15" height="15" class='modify_cat' onclick="modify_cliente(<?php echo $id_cliente?>)"></td>
                <td><img src="images/trash.png" width="15" height="15" class='modify_cat' onclick="delete_cliente(<?php echo $id_cliente?>, '<?php echo addslashes($nome_cliente)?>')"></td>
            </tr>
            <?php		
				}
			?>
            </tbody>
            </table>           
            </div>
            
            </div>
         </div>
         
         <div id="dialog-form-2" title="Modifica Cliente">
                    
                    <form action="" method="post" id="form_update_cliente" >
                <table>
                <tr>
                	<td colspan="2">Ragione Sociale: <input type="text" name="rag_soc_dg" id="rag_soc_dg" style="width:300px"></td>
                </tr>
                <tr>
                    <td>PIVA: <input type="text" name="piva_dg" id="piva_dg"></td>
                    <td>CF: <input type="text" name="cf_dg" id="cf_dg"></td>
                </tr>
                <tr>
                    <td colspan="2">Indirizzo: <input type="text" name="indirizzo_dg" id="indirizzo_dg" style="width:300px"></td>
                </tr>
                <tr>
                    
                    <td>Citt&aacute;: <input type="text" name="citta_dg" id="citta_dg"></td>
                    <td>CAP: <input type="text" name="cap_dg" id="cap_dg"></td>
                </tr>
                <tr><td colspan="2"><hr width="100%" /></td></tr>
                
                <tr><td colspan="2">Referente: <input type="text" name="referente_dg" id="referente_dg"  style="width:300px"></td></tr>
                <tr><td colspan="2">E-mail: <input type="text" name="mail_dg" id="mail_dg" style="width:300px"></td></tr>
                <tr><td>Cell1: <input type="text" name="cell1_dg" id="cell1_cliente_dg"></td><td>Cell2: <input type="text" name="cell2_dg" id="cell2_cliente_dg"></td></tr>
                <tr>
                	<td>Telefono: <input type="text" name="tel_dg" id="tel_dg"></td>
                    <td>Sito: <input type="text" name="sito_dg" id="sito_dg"></td>
                </tr>
					
                <input type="hidden" name="id_cliente_dg" id="id_cliente_dg" value=""/>
                </table>
            </form>
                </div>
        
        <div style="position:relative; float:left; margin-left:20px; height:300px">
            <p style="background-color:#FF9933; padding:5px">Aggiungi Nuovo Cliente </p>
            <div style="background-color:#CCCCCC; padding-top:10px; position:relative; top:-20px">
            <form  method="post" id="form_nuovo_cliente">
                <table>
                <tr>
                	<td colspan="2">Ragione Sociale: <input type="text" name="rag_soc" style="width:300px" id="rag_soc_clie_news"></td>
                </tr>
                <tr>
                    <td>PIVA: <input type="text" name="piva"></td>
                    <td>CF: <input type="text" name="cf"></td>
                </tr>
                <tr>
                    <td colspan="2">Indirizzo: <input type="text" name="indirizzo" style="width:300px"></td>
                </tr>
                <tr>
                    
                    <td>Citt&aacute;: <input type="text" name="citta"></td>
                    <td>CAP: <input type="text" name="cap"></td>
                </tr>
                <tr><td colspan="2"><hr width="100%" /></td></tr>
                
                <tr><td colspan="2">Referente: <input type="text" name="referente" style="width:300px"></td></tr>
                <tr><td colspan="2">E-mail: <input type="text" name="mail" style="width:300px" id="email_cli_news"></td></tr>
                <tr><td>Cell1: <input type="text" name="cell1"></td><td>Cell2: <input type="text" name="cell2"></td></tr>
                <tr>
                	<td>Telefono: <input type="text" name="tel"></td>
                    <td>Sito: <input type="text" name="sito"></td>
                </tr>
					
                <tr><td><input type="button" value="Aggiungi" id="btn_nuovo_cliente"></td><td></td></tr>
                </table>
            </form>
            </div>
            
        </div>
</div>
<style>
	.cursor_pointer { cursor:pointer}
	.cursor_pointer:hover { color:#FF9900}
	.tabella_clienti_in_lavoro tr td{
    	cursor:pointer;
   	}
        
	.span_clienti{
		font-size:12px;
		text-decoration:underline;
		cursor:pointer
	}
	
	#container_new_scheda_lavoro{
		display:none;
		position:relative;
	}
	
	#table_clienti_hover tr:hover td
	{
		cursor:pointer;
		color: #fff;
	}
	
	#nome_cliente_scheda, #data_scheda{
		font-weight:bold;
		color:#FF6600;
	}
	
	#tabs-settori-new-schedalavoro{
		top:20px;
		position:relative;
		clear:both;
	}
	
	#aggiungi_scheda{
		float:left; 
		font-size:12px; 
		text-decoration:underline; 
		cursor:pointer;
	}
	
	#counter_schede{
		float:right;
		font-size:18px;
		font-weight:bold;
	}
	/** scroller schede lavoro */
	
	
	#scroller-horizontal{
		width:670px;
		height:420px;
		position:relative;
		overflow:auto;
	}
	
	.div_scheda_lavoro{
		width:640px;
		height:450px;
		margin-top:10px;
		position:relative;
		float:left;
	}
	
	#settore_scheda_lavoro{
		font-weight:bold;
		color:#666666;
	}
	
	#aggiungi_scheda:hover {color:#FF6600}
</style>

<div style="height:400px">
        
	<div style="height:400px; float:left; position:relative" id="lista_clienti">
        <p style="background-color:#FF9933; padding:5px">Lista Clienti</p>
        <div style="background-color:#CCCCCC; padding-top:10px; position:relative; top:-20px">
 
 			<div style="height:470px; overflow:auto">
 				<table cellpadding="5" class="tabella_clienti_in_lavoro">
     	 		<thead>
         			<tr>
         			<th width="350" align="left">Ragione Sociale</th>
         			<th width="100" align="left">Citt&aacute;</th></tr>
     			</thead>
     			<tbody>
            		<?php
					$clienti_array = $manager_sql->get_lista_clienti();
					$cnt_cat = count($clienti_array);
				
					$settore_sel = "";
				
					for($i=0; $i<$cnt_cat; $i++){
				
						$id_cliente = $clienti_array[$i][0];
						$nome_cliente = $clienti_array[$i][1];
						$cognome_cliente = $clienti_array[$i][2];
						$citta_cliente = $clienti_array[$i][3];
					?>
            		<tr class="tr_select_cliente" onclick="scegli_settore(<?php echo $id_cliente ?>,'<?php  echo $nome_cliente  ?>')">
            		<td><?php echo $nome_cliente ?></td>
                	<td><?php echo $citta_cliente ?></td>
            		</tr>
            		<?php		
					}
					?>
            	</tbody>
            	</table>           
            </div>
            <p style="background-color:#FF9933; padding:5px">
            </p>
    	</div>
	</div>
	<!-- fine lista clienti -->

	<div style="height:400px; width:650px; float:left; position:relative; margin-left:10px;" id="container_new_scheda_lavoro">
        	
   		<p style="background-color:#FF9933; padding:5px; height:20px; line-height:15px">
   			Nuova Scheda Lavoro &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   			<span>Settore: <span id="settore_scheda_lavoro">Grafica</span></span>
   		</p>
   
   		<div style="background-color:#CCCCCC; padding:10px; position:relative; top:-20px">
   	
    	<div> 
    		<div style="position:relative; float:left">Cliente: <span id="nome_cliente_scheda"></span></div> 
    		<div style="position:relative; float:right">data: <span id="data_scheda"><?php echo date('d-m-Y') ?></span></div> 
    	</div>
    
    	<?php include('content_new_scheda_lavoro.php')?>
    
    
    	</div>
    
    
    	<div style="height:400px; width:650px; position:relative; display:none;" id="list_schede_lavoro_cliente">
			<p style="background-color:#FF9933; padding:5px; height:20px; line-height:15px">
        		Schede Lavoro Aperte per: <span id="cliente_in_elenco_schede" style="font-weight:bold; color:#666666"> </span>
    		</p>
    		<div style="background-color:#CCCCCC; padding:10px; position:relative; top:-20px" id="content_list_schede_cliente">
    		</div>
    	</div>
	</div>




<!-- DIALOG SCELTA SETTORE NUOVA SCHEDA LAVORO-->
<div id="dialog-form-scelta-settore" title="Scegli Settore">
     
	<?php
	$settori_array = $manager_sql->get_lista_settori();
	$cnt_cat = count($settori_array);
							
	$tipo_sel = "";
							
	for($j=0; $j<$cnt_cat; $j++){
							
	$id_cat = $settori_array[$j][0];
	$nome_cat = $settori_array[$j][1];
	$nome_cat_low = strtolower($nome_cat);
	
	echo "<p onclick='new_scheda_lavoro($id_cat,\" $nome_cat_low \")' class='cursor_pointer'>".$nome_cat."</p>";
	/*?>*/               
                    
  	/*<?php*/ } ?>          
</div>
<!-- FINE DIALOG -->

<!-- DIALOG MODIFICA SCHEDA LAVORO-->
<div id="dialog-form-modifica-schedalavoro" title="Modifica Scheda Lavoro">
	<form id="form_modifica_schedalavoro">
		<input type="hidden" name="id_scheda" id="id_scheda_to_modify" />
		<table cellpadding="0" cellspacing="0">
            	<tr>
                	<td align="left">Titolo:</td>
                    <td align="left"><input type="text" style="width:250px" name="titolo_scheda" id="ts_mod"/></td>
                	<td align="left">&nbsp;&nbsp;Priorit&aacute;:</td>
                    <td align="left">
                    	<select name="priorita" id="pr_mod">
                        	<option value="3">Bassa</option>
                            <option value="2">Media</option>
                            <option value="1">Alta</option>
                        </select>
                 	</td>
                </tr>
                
                <tr>
                	<td align="left">Consegna: </td>
                    <td align="left"><input type="text" class="data_consegna" id="dtcons_mod" name="data_consegna"/></td>
                	<td align="left">&nbsp;&nbsp;Stato: </td>
                    <td align="left" id="td_stato">
                    	<select name="stato" id="stato_lavori">
                            <option value="da realizzare">da realizzare</option>
                            <option value="in lavorazione">in lavorazione</option>
                            <option value="bozza pronta">bozza pronta</option>
                            <option value="da preparare per la stampa">da preparare per la stampa</option>
                            <option value="pronto per la stampa">pronto per la stampa</option>
                            <option value="in stampa">in stampa</option>
                            <option value="in magazzino">in magazzino</option>
                            <option value="consegnato">consegnato</option>
                        </select>   
                    </td>
                </tr>
                
                <tr>
                	<td colspan="4" align="left">Note:<br /> <textarea  name="note" style="width:630px; height:200px" id="nt_mod"></textarea></td>
                </tr>
                <tr>
                	<td colspan="4" align="left">
                    	Assegna a:
                        <select name="operatore_to_scheda_lavoro" id="op_mod">
                        	<option value="0">Seleziona Operatore</option>
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
									if($selettore_sel!='') echo '</optgroup>';
									echo "<optgroup label='$title_settore'>";
								}
								
							?>
                            <option value="<?php echo $id_op?>"><?php echo $nome_op." ".$cognome_op?></option>
                            <?php  }?>
                            </optgroup>
                        </select>
                    
                    </td>
                </tr>
                  <tr>
                 <td colspan="4" align="left" >
                        Costo:<br />
                        <textarea name="costo_lavoro" style="width:300px; height:100px" id="costo_lavoro"/> </textarea>
                    </td>
                </tr>
            </table>
   </form>       
</div>
<!-- FINE DIALOG -->
    	
</div>
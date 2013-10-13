

<div id="scroller-horizontal">
	<form action="scheda_lavoro_aggiungi.php" method="post" id="form_scheda_lavoro_aggiungi">
		
		<input type="hidden" id="id_cliente_to_scheda_lavoro" name="id_cliente_to_scheda_lavoro_" />
		<input type="hidden"  name="data_ingresso"  value="<?php echo date('Y-m-d') ?>"/>
		<input type="hidden"  id="id_settore_to_scheda_lavoro" name="id_settore_to_scheda_lavoro_"  value=""/>

		<div class="div_scheda_lavoro" id="master_scheda_lavoro">

			<table cellpadding="0" cellspacing="0">
            	<tr>
                	<td align="left">Titolo:</td>
                    <td align="left"><input type="text" style="width:250px" name="titolo_scheda"/></td>
                	<td align="left">&nbsp;&nbsp;Priorit&aacute;:</td>
                    <td align="left">
                    	<select name="priorita">
                        	<option value="3">Bassa</option>
                            <option value="2">Media</option>
                            <option value="1">Alta</option>
                        </select>
                        
                        
                    </td>
                </tr>
                <tr>
                	<td align="left">Consegna: </td>
                    <td align="left"><input type="text" class="data_consegna" id="datapicker" name="data_consegna"/></td>
                	<td align="left">&nbsp;&nbsp;Stato: </td>
                    <td align="left" id="td_stato">
                    	
                    </td>
                </tr>
                 <tr>
                	<td colspan="4" align="left">Note:<br /> <textarea  name="note" style="width:630px; height:200px"></textarea></td>
                </tr>
                <tr>
                	<td colspan="4" align="left">
                    	Assegna a:
                        <select name="operatore_to_scheda_lavoro">
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
									if($settore_sel!='') echo '</optgroup>'; //nome variabile errato $selettore_sel
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
                        <textarea name="costo_lavoro" style="width:300px; height:100px"/> </textarea>
                    </td>
                </tr>
            </table>
            
</div><!-- chiusura master_scheda_lavoro -->

<p style="position:relative; clear:both"><input type="button" value="Salva e Crea Nuova Scheda" id="salva_scheda_lavoro"  style="right:20px;"></p>

</form>
</div><!-- chiusura div scroller -->
<input type="hidden" id="id_cliente_to_scheda_lavoro" name="id_cliente_to_scheda_lavoro" />
<input type="hidden"  id="id_settore_to_scheda_lavoro" name="id_settore_to_scheda_lavoro"  value=""/>


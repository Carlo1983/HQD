<style>
	.riepilogo_ordini {
		border-collapse: collapse;
		background-color: #CCCCCC;
	}
	.riepilogo_ordini thead th {
		background-color: #999999;
		color: #fff;
		border-bottom: solid 1px #666666;
		border-top: solid 2px #666;
	}
	.riepilogo_ordini tbody td {
		border-bottom: solid 1px #fff;
		height: 30px;
	}
	.riepilogo_ordini tbody tr:hover td {
		background-color: #666666;
		color: #fff;
		cursor: pointer;
	}
	.content_in_stampa {
		display: none;
		clear: both;
		width: 100%;
	}
</style>

<div style="height:400px">
	
	<!-- INIZIO SEZIONE DELLE TABS -->
	<div style="height:400px; float:left; position:relative">
		
		<p style="background-color:#FF9933; padding:5px">
			Riepilogo
		</p>
		
		<div style="background-color:#CCCCCC; padding-top:10px; position:relative; top:-20px">
			<div id="tabs_grouping">
				<ul>
					<li>
						<a href="#tabs-grouping-1">Grafica</a>
					</li>
					<li>
						<a href="#tabs-grouping-12">Allestimenti</a>
					</li>
					<li>
						<a href="#tabs-grouping-2">Laboratorio</a>
					</li>
					<li>
						<a href="#tabs-grouping-10">Transfer</a>
					</li>
					<li>
						<a href="#tabs-grouping-3">Web</a>
					</li>
					<li>
						<a href="#tabs-grouping-4">Software</a>
					</li>
					<li style="margin-left:40px">
						<a href="#tabs-grouping-5">Ordini</a>
					</li>
					<li>
						<a href="#tabs-grouping-6">Preventivi</a>
					</li>
					<li>
						<a href="#tabs-grouping-11">Archivio</a>
					</li>
					<li style="margin-left:40px">
						<a href="#tabs-grouping-7">In Stampa</a>
					</li>
					<li>
						<a href="#tabs-grouping-8">In Magazzino</a>
					</li>
					<li>
						<a href="#tabs-grouping-9">Consegnati</a>
					</li>
				</ul>

				<div id="tabs-grouping-1"></div>
				<div id="tabs-grouping-2"></div>
				<div id="tabs-grouping-3"></div>
				<div id="tabs-grouping-4"></div>
				<div id="tabs-grouping-5"></div>
				<div id="tabs-grouping-6"></div>
				<div id="tabs-grouping-7"></div>
				<div id="tabs-grouping-8"></div>
				<div id="tabs-grouping-9"></div>
				<div id="tabs-grouping-10"></div>
				<div id="tabs-grouping-11"></div>
				<div id="tabs-grouping-12"></div>
			</div>
		</div>
	</div>
	<!-- FINE SEZIONE DELLE TABS -->




	
	<!-- DIALOG MODIFICA SCHEDA LAVORO-->
	<div id="dialog-form-modifica-schedalavoro-admin" title="Modifica Scheda Lavoro">
		<form id="form_modifica_schedalavoro_admin">
			<!--<input type="hidden" name="id_scheda" id="id_scheda_to_modify_admin" value=""/>-->
			<!-- ID SCHEDA DA PASSARE modificato value=""-->
			<table cellpadding="0" cellspacing="0">
				<tr>

					<!-- TITOLO -->
					<td align="left">Titolo:</td>
					<td align="left">
					<input type="text" style="width:250px" name="titolo_scheda" id="ts_mod_admin"/>
					</td>
					<!-- FINE TITOLO -->

					<!-- PRIORITA' -->
					<td align="left">&nbsp;&nbsp;Priorit&aacute;:</td>
					<td align="left">
					<select name="priorita" id="pr_mod_admin">
						<option value="3">Bassa</option>
						<option value="2">Media</option>
						<option value="1">Alta</option>
					</select></td>
					<!-- FINE PRIORITA' -->

				</tr>

				<tr>

					<!-- CONSEGNA -->
					<td align="left">Consegna: </td>
					<td align="left">
					<input type="text" class="data_consegna" id="dtcons_mod_admin" name="data_consegna"/>
					</td>
					<!-- FINE CONSEGNA -->

					<!-- STATO -->
					<td align="left">&nbsp;&nbsp;Stato: </td>
					<td align="left" id="td_stato">
					<select name="stato" id="stato_lavori_admin">
						<option value="da realizzare">da realizzare</option>
						<option value="in lavorazione">in lavorazione</option>
						<option value="bozza pronta">bozza pronta</option>
						<option value="da preparare per la stampa">da preparare per la stampa</option>
						<option value="pronto per la stampa">pronto per la stampa</option>
						<option value="in stampa">in stampa</option>
						<option value="in magazzino">in magazzino</option>
						<option value="consegnato">consegnato</option>
					</select></td>
					<!-- FINE STATO forse si deve chiudere il tag <td> di stato-->

				</tr>

				<tr class="content_in_stampa">
					<td></td>
					<td></td>
					<td align="left">&nbsp;&nbsp;Fornitore: </td>
					<td>
					<select name="fornitore_lavoro">
						<option value="0">Seleziona Fornitore</option>
						<?php
							$fornitori_array = $manager_sql->get_fornitore_by_tipo('stampatore');
							$cnt_for = count($fornitori_array);
							for($j=0; $j<$cnt_for; $j++){
								$rag_for = $fornitori_array[$j]['Ragione_Sociale'];
								$id_for = $fornitori_array[$j]['Id'];
						?>
						<option value="<?php echo $id_for?>"><?php echo $rag_for?></option>
						<?php 
							} 
						?>
					</select>
					</td>
				</tr>

				<tr class="content_in_stampa">
					<td></td>
					<td></td>
					<td align="left">&nbsp;&nbsp;Ritiro: </td>
					<td> data
					<input type="text" name="data_ritiro" class="data_consegna" style="width:100px" />
					<br />
					&nbsp; ora
					<input type="text" name="ora_ritiro"  style="width:60px" />
					</td>
				</tr>

				<tr>
					<td colspan="4" align="left">Note:
					<br />
					<textarea  name="note" style="width:630px; height:100px" id="nt_mod_admin"></textarea>					</td>
				</tr>

				<tr>
					<td colspan="4" align="left">Note Operatore:
					<br />
					<textarea  name="noteoperatore" style="width:630px; height:100px" id="ntop_mod_admin"></textarea>					</td>
				</tr>

				<tr>
					<td colspan="2" align="left"> Assegna a:
					<select name="operatore_to_scheda_lavoro" id="op_mod_admin">
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
									//if($selettore_sel!='') echo '</optgroup>';
									if($settore_sel!='') echo '</optgroup>';
									echo "<optgroup label='$title_settore'>";
								}
						?>
						<option value="<?php echo $id_op?>"><?php echo $nome_op." ".$cognome_op?></option>
						<?php
							} 
						?>
						</optgroup>
					</select>
					</td>

					<td colspan="2" align="right"> Settore:
					<select name="settore_to_scheda_lavoro" id="settore_mod_admin">
						<?php
							$settori_array = $manager_sql->get_lista_settori();
							$cnt_cat = count($settori_array);
							$settore_sel = "";
							for($i=0; $i<$cnt_cat; $i++){
								$id_settore = $settori_array[$i][0];
								$nome_settore = $settori_array[$i][1];
						?>
						<option value="<?php echo $id_settore?>"><?php echo $nome_settore?></option>
						<?php
							}
						?>
						</optgroup>
					</select>
					</td>
				</tr>

				<tr>
					<td colspan="4" align="left"> Preventivo:<br />
						<textarea name="preventivo_lavoro" style="width:600px; height:100px" id="preventivo_lavoro_adm"/>
						</textarea> 
					</td>
				</tr>

				<tr>
					<!-- <td colspan="4" align="left" > -->
					<td colspan="2" align="left" > Costo:<br />
						<textarea name="costo_lavoro" style="width:300px; height:100px" id="costo_lavoro_adm"/>
						</textarea> 
					</td>

					<td colspan="2" align="left" ><!-- id_scheda -->
						<div onclick="location.href='COSTO_REALIZZAZIONE/index.php?id_scheda='+id_scheda" style="cursor:pointer; background-color: orange; text-align:center;">
							COSTO REALIZZAZIONE
						</div>
						<br />
					</td>
				</tr>

			</table>
		</form>
	</div>
	<!-- FINE DIALOG -->

</div>
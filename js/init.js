
var sURL = unescape(window.location.pathname);
$(function(){
	
	/*refreshing*/
	
   /*var refreshId = setInterval(function() {
    	location.reload();
   }, 3000);*/
   //$.ajaxSetup({ cache: false });
	$("#tabs_grouping").tabs();
	
	$('#tabs-grouping-1').load('../grouping_schede_lavoro/all_grafica.php');
	$('#tabs-grouping-2').load('../grouping_schede_lavoro/all_serigrafia.php');
	$('#tabs-grouping-3').load('../grouping_schede_lavoro/all_web.php');
	$('#tabs-grouping-5').load('../grouping_schede_lavoro/all_ordini.php');
	$('#tabs-grouping-6').load('../grouping_schede_lavoro/all_preventivi.php');
	$('#tabs-grouping-7').load('../grouping_schede_lavoro/all_instampa.php');
	$('#tabs-grouping-8').load('../grouping_schede_lavoro/all_inmagazzino.php');
	$('#tabs-grouping-9').load('../grouping_schede_lavoro/all_consegnati.php');
        
        $('#tabs-grouping-11').load('../grouping_schede_lavoro/all_archivio.php');
        
        /*** SEGRETERIA *********/
        
        $( "#dialog-form-2" ).dialog({
			autoOpen: false,
			height: 500,
			width: 500,
			modal: true,
			
			open: function() {
				id_cliente = $(this).data('id_cliente');
				$.post('gestione/get_cliente_by_id.php', { id_cliente : id_cliente }, function(data){
					
					var arr_cliente = data.split('(:)');
					
					$('#rag_soc_dg').val(arr_cliente[0]);
					$('#indirizzo_dg').val(arr_cliente[1]);
					$('#citta_dg').val(arr_cliente[2]);
					$('#cap_dg').val(arr_cliente[3]);
					$('#piva_dg').val(arr_cliente[4]);
					$('#cf_dg').val(arr_cliente[5]);
					$('#referente_dg').val(arr_cliente[6]);
					$('#mail_dg').val(arr_cliente[7]);
					$('#tel_dg').val(arr_cliente[8]);
					$('#cell1_cliente_dg').val(arr_cliente[9]);
					$('#cell2_cliente_dg').val(arr_cliente[10]);
					$('#sito_dg').val(arr_cliente[11]);
					
					$('#id_cliente_dg').val(id_cliente);
					
					//alert(data);
										
				});
				
				
			}, 
			
			buttons: {
				Modifica: function() {
					//$( this ).dialog( "close" );
					var dati = $('#form_update_cliente').formSerialize();
					
					$.post('gestione/cliente_modifica.php', dati, function(data){
						if(data=='1'){
							alert('Cliente Modificato con successo');
						}
						else{
							alert('non e\' stato possibile modificare il cliente');
						}
						
						window.location.href = sURL+'#tabs-3';
						location.reload();
					});
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		
		});
        
        
        
        $( "#dialog-form-fornitore" ).dialog({
			autoOpen: false,
			height: 500,
			width: 500,
			modal: true,
			
			open: function() {
				id_cliente = $(this).data('id_fornitore');
				$.post('gestione/get_fornitore_by_id.php', { id_cliente : id_cliente }, function(data){
					
					var arr_cliente = data.split('(:)');
					
					$('#rag_soc_for').val(arr_cliente[0]);
					$('#indirizzo_for').val(arr_cliente[1]);
					$('#citta_for').val(arr_cliente[2]);
					$('#cap_for').val(arr_cliente[3]);
					$('#piva_for').val(arr_cliente[4]);
					$('#cf_for').val(arr_cliente[5]);
					$('#referente_for').val(arr_cliente[6]);
					$('#mail_for').val(arr_cliente[7]);
					$('#tel_for').val(arr_cliente[8]);
					$('#cell1_cliente_for').val(arr_cliente[9]);
					$('#cell2_cliente_for').val(arr_cliente[10]);
					$('#sito_for').val(arr_cliente[11]);
                                        
                                        $('#tipo_fornitore').val(arr_cliente[12]).attr('selected',true);;
					
					$('#id_cliente_for').val(id_cliente);
					
					//alert(data);
										
				});
				
				
			}, 
			
			buttons: {
				/*Modifica: function() {
					//$( this ).dialog( "close" );
					var dati = $('#form_update_fornitore').formSerialize();
					
					$.post('fornitore_modifica.php', dati, function(data){
						if(data=='1'){
							alert('Fornitore Modificato con successo');
						}
						else{
							alert('non e\' stato possibile modificare il fornitore');
						}
						
						window.location.href = sURL+'#tabs-5';
						location.reload();
					});
                                    
				},*/
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		
		});
        /****** NEWSLETTER *****************/
                $('#btn_nuova_newsletter').click(
			function(){
				var dati = $('#form_nuova_newsletter').formSerialize();
				$.post('gestione/newsletter_aggiungi.php', dati, function(data){
					if(data=='1'){
						email = $('#form_nuova_newsletter #email_news').val();
                                                nome = $('#form_nuova_newsletter #rag_soc_news').val();
                                                //alert('Nuovo Utente Newsletter aggiunto con successo');
                                             //alert(email+' '+nome);
                                             $.get('http://www.hqdesign.it/newsletters/common/inserisci_utente.php', {mail : email, nome : nome}, function(data2){
                                                 if(data2 =='1')
                                                     alert( 'email aggiunta da tutte le parti' );
                                                 else
                                                      alert( 'email non aggiunta '); 
                                             });
                                              
					}
					else{
						alert('non e\'stato possibile aggiungere l\'utente nella newsletter ');
					}
					window.location.href = sURL+'#tabs-6';
					location.reload();
				});
				//alert(dati);
			}
		);
                
                
                $( "#dialog-form-modifica-newsletter" ).dialog({
			autoOpen: false,
			height: 500,
			width: 500,
			modal: true,
			
			open: function() {
				id_cliente = $(this).data('id_fornitore');
				$.post('gestione/get_newsletter_by_id.php', { id_cliente : id_cliente }, function(data){
					
					var arr_cliente = data.split('(:)');
					
					$('#dialog-form-modifica-newsletter #rag_soc_for').val(arr_cliente[0]);
					$('#dialog-form-modifica-newsletter #indirizzo_for').val(arr_cliente[1]);
					$('#dialog-form-modifica-newsletter #citta_for').val(arr_cliente[2]);
					$('#dialog-form-modifica-newsletter #cap_for').val(arr_cliente[3]);
					$('#dialog-form-modifica-newsletter #piva_for').val(arr_cliente[4]);
					$('#dialog-form-modifica-newsletter #cf_for').val(arr_cliente[5]);
					$('#dialog-form-modifica-newsletter #referente_for').val(arr_cliente[6]);
					$('#dialog-form-modifica-newsletter #mail_for').val(arr_cliente[7]);
					$('#dialog-form-modifica-newsletter #tel_for').val(arr_cliente[8]);
					$('#dialog-form-modifica-newsletter #cell1_cliente_for').val(arr_cliente[9]);
					$('#dialog-form-modifica-newsletter #cell2_cliente_for').val(arr_cliente[10]);
					$('#dialog-form-modifica-newsletter #sito_for').val(arr_cliente[11]);
                                        
                                        $('#dialog-form-modifica-newsletter #prov').val(arr_cliente[12]).attr('selected',true);;
					
					$('#dialog-form-modifica-newsletter #id_cliente_for').val(id_cliente);
					
					//alert(data);
										
				});
				
				
			}, 
			
			buttons: {
				Modifica: function() {
					//$( this ).dialog( "close" );
					var dati = $('#form_update_newsletter').formSerialize();
					
					$.post('gestione/newsletter_modifica.php', dati, function(data){
						if(data=='1'){
							alert('Utente Newsletter Modificato con successo');
						}
						else{
							alert('non e\' stato possibile modificare l\'utente newsletter');
						}
						
						window.location.href = sURL+'#tabs-6';
						location.reload();
					});
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		
		});
        
        
	/*** SCHEDA LAVORO ***/
		
		$("#tabs_operatori").tabs();
		
		$('#dialog-form-modifica-schedalavoro').dialog({
			autoOpen: false,
			height: 500,
			width: 680,
			modal: true,
			
			
			open: function() {
				id_scheda = $(this).data('id_scheda');
				
				$.post('gestione/get_schedalavoro_by_id.php', { id_scheda : id_scheda }, function(data){
					
					var arr_scheda = data.split('|');
					
					$('#ts_mod').html(arr_scheda[2]);
					
					$('#pr_mod').attr('src', 'images/priorita_'+arr_scheda[5]+'.png');
					
					$('#imp_mod').val(arr_scheda[6]).attr('selected',true);
					
					$('#dtcons_mod').html(arr_scheda[4]);
					$('#nt_mod').val(arr_scheda[3]);
					$('#ntop_mod').val(arr_scheda[7]);
					
					$('#stato_lavori').val(arr_scheda[0]).attr('selected',true);
					
					$('#cliente_mod').html(arr_scheda[8]);
					$('#cliente_mail').html(arr_scheda[10]);
                                        $('#cliente_tel').html(arr_scheda[11]);
                                        $('#cliente_ref').html(arr_scheda[12]);
                                        
					$('#id_scheda_to_modify').val(id_scheda);
					//alert(arr_scheda[10]);
				});
			},
			
			buttons: {
				
				Modifica: function() {
					/*id_cliente = $(this).data('id_cliente');*/
					var dati = $('#form_modifica_schedalavoro').formSerialize();
					$.post('gestione/scheda_lavoro_modifica_by_op.php', dati, function(data){
						if(data=='1'){
							alert('Scheda Modificata con successo');
							window.location.href = sURL;
							location.reload();
						}
						else{
							alert('non e\' stato possibile modificare la scheda');
						}
					});
					
					
					
					$( this ).dialog( "close" );
				},
				
				Chiudi: function() {
					$( this ).dialog( "close" );
				}
			}
		
		});
		
		
		
		
		
		
		
		
		
		
		
})

function modify_cliente(id){
	$("#dialog-form-2").data('id_cliente',id);
	$("#dialog-form-2").dialog( "open" );
}

function delete_cliente(id,nome){
	
	if(confirm('Sicuro di eliminare il cliente: '+ nome )){
	$.post('gestione/cliente_elimina.php', { id_cliente : id }, function(data){
			if(data=='1'){
				alert('Cliente eliminato con successo');
			}
			else{
				alert('non è stato possibile eliminare il cliente');
			}
			window.location.href = sURL+'#tabs-3';
			location.reload();
	});
	}
}


function open_modifica_schedalavoro(idscheda, idcliente){
	$("#dialog-form-modifica-schedalavoro").data('id_cliente',idcliente);
	$("#dialog-form-modifica-schedalavoro").data('id_scheda',idscheda);
	$("#dialog-form-modifica-schedalavoro").dialog( "open" );
}


function modify_fornitore(id){
	$("#dialog-form-fornitore").data('id_fornitore',id);
	$("#dialog-form-fornitore").dialog( "open" );
}

function modify_newsletter(id){
	$("#dialog-form-modifica-newsletter").data('id_fornitore',id);
	$("#dialog-form-modifica-newsletter").dialog( "open" );
}
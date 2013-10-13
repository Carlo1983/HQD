
var sURL = unescape(window.location.pathname);

$(function(){
	
	$("#tabs").tabs();
	
	$("#tabs_grouping").tabs();
	
	$('#tabs-grouping-1').load('grouping_schede_lavoro/all_grafica.php');
	$('#tabs-grouping-2').load('grouping_schede_lavoro/all_serigrafia.php');
	$('#tabs-grouping-3').load('grouping_schede_lavoro/all_web.php');
	$('#tabs-grouping-5').load('grouping_schede_lavoro/all_ordini.php');
	$('#tabs-grouping-6').load('grouping_schede_lavoro/all_preventivi.php');
	$('#tabs-grouping-7').load('grouping_schede_lavoro/all_instampa.php');
	$('#tabs-grouping-8').load('grouping_schede_lavoro/all_inmagazzino.php');
	$('#tabs-grouping-9').load('grouping_schede_lavoro/all_consegnati.php');
    $('#tabs-grouping-11').load('grouping_schede_lavoro/all_archivio.php');
    $('#tabs-grouping-12').load('grouping_schede_lavoro/all_allestimenti.php');
	/*$('#tabs-grouping-2').load('grouping_schede_lavoro/all_serigrafia.php');
	$('#tabs-grouping-2').load('grouping_schede_lavoro/all_serigrafia.php');
	*/
       
       /** table **/
       
    $('.tabella_ricerca').dataTable( {
    "bJQueryUI": true,
        "aoColumns": [
            null,
            null,
             
            { "bSortable": false },
            { "bSortable": false }
        ],
       "oLanguage": {
            "sInfo": "Record _START_ a _END_ di _TOTAL_ totali",
            "sInfoEmpty": "nessun record"
         }
        } );
        
        $('.tabella_clienti_in_lavoro').dataTable( {
	"bJQueryUI": true,
        "aoColumns": [
            null,
            null
             
           
        ],
       "oLanguage": {
            "sInfo": "Record _START_ a _END_ di _TOTAL_ totali",
            "sInfoEmpty": "nessun record"
         }
        } );
        
       
    
    
       
	/*** OPERATORE ***************************************************/
	/* $('#result').html(decodeURIComponent(querystring)); per visualizzare correttamente i caratteri */

	$('#btn_nuovo_operatore').click(
		function(){
			var dati = $('#form_nuovo_operatore').formSerialize(); //codifica dei caratteri per questo nn li visualizza correttamente
			$.post('operatore_aggiungi.php', dati, function(data){
			if(data=='1'){
				alert('Nuovo Operatore aggiunto con successo');
			}
			else{
				alert('non è stato possibile aggiungere la categoria');
			}
			window.location.href = sURL+'#tabs-1';
			location.reload();
			});
		}
	);
	
	$( "#dialog-form" ).dialog({	//<-------------------------------------------------------dimensioni finestra
			autoOpen: false,
			height: 300,
			width: 500,
			modal: true,
			
			open: function() {
				id_op = $(this).data('id_operatore');
				$.post('get_operatore_by_id.php', { id_operatore : id_op }, function(data){
					var arr_operatore = data.split(',');
					//alert(arr_operatore[0]);
					$('#nome_operatore_dg').val(arr_operatore[0]); //<-val(decodeURIComponent(arr_operatore[0]))
					$('#cognome_operatore_dg').val(arr_operatore[1]);
					$('#interno_dg').val(arr_operatore[2]);
					$('#email_operatore_dg').val(arr_operatore[7]);
					$('#cell1_dg').val(arr_operatore[4]);
					$('#cell2_dg').val(arr_operatore[5]);
					$('#id_op').val(id_op);
					
					$("#settore_operatore_dg").val( arr_operatore[6] ).attr('selected',true);
					
				});
			}, 
			
			buttons: {
				Modifica: function() {	//<---------------------------------- modifica operatore
					//$( this ).dialog( "close" );
					//funzione .text();
					var dati = $('#form_update_operatore').formSerialize();//<-------------------------------------------------------------------
					
					$.post('operatore_modifica.php', dati, function(data){
						if(data=='1'){
							alert('Operatore Modificato con successo');
						}
						else{
							alert('non e\' stato possibile modificare l\'operatore');
						}
						
						window.location.href = sURL+'#tabs-1';
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
		
		/*** CLIENTE ***************************************************/
		$('#btn_nuovo_cliente').click(
			function(){
				var dati = $('#form_nuovo_cliente').formSerialize();
				$.post('cliente_aggiungi.php', dati, function(data){
					if(data=='1'){
						//alert('Nuovo Cliente aggiunto con successo');
                        email = $('#form_nuovo_cliente #email_cli_news').val();
                        nome = $('#form_nuovo_cliente #rag_soc_clie_news').val();
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
						alert('non e\'stato possibile aggiungere il cliente');
					}
					window.location.href = sURL+'#tabs-3';
					location.reload();
				});
				//alert(dati);
			}
		);
		
		$( "#dialog-form-2" ).dialog({
			autoOpen: false,
			height: 500,
			width: 500,
			modal: true,
			
			open: function() {
				id_cliente = $(this).data('id_cliente');
				$.post('get_cliente_by_id.php', { id_cliente : id_cliente }, function(data){
					
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
					var dati = $('#form_update_cliente').formSerialize();//<--------------------------------------------------------------------------
					$.post('cliente_modifica.php', dati, function(data){
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
		
                
                
                
                
                
                /**** FORNITORI ****************************************/
                $('#btn_nuovo_fornitore').click(
			function(){
				var dati = $('#form_nuovo_fornitore').formSerialize();
				$.post('fornitore_aggiungi.php', dati, function(data){
					if(data=='1'){
						alert('Nuovo Fornitore aggiunto con successo');
					}
					else{
						alert('non e\'stato possibile aggiungere il fornitore');
					}
					window.location.href = sURL+'#tabs-5';
					location.reload();
				});
				//alert(dati);
			}
		);
                    
                $( "#dialog-form-modifica-fornitore" ).dialog({
			autoOpen: false,
			height: 500,
			width: 500,
			modal: true,
			
			open: function() {
				id_cliente = $(this).data('id_fornitore');
				$.post('get_fornitore_by_id.php', { id_cliente : id_cliente }, function(data){
					
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
				Modifica: function() {
					//$( this ).dialog( "close" );
					var dati = $('#form_update_fornitore').formSerialize();//<-----------------------------------------------------------
					
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
				},
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
				$.post('newsletter_aggiungi.php', dati, function(data){
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
				$.post('get_newsletter_by_id.php', { id_cliente : id_cliente }, function(data){
					
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
					var dati = $('#form_update_newsletter').formSerialize();//<------------------------------------------------------------------
					
					$.post('newsletter_modifica.php', dati, function(data){
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
		
                $('#stato_lavori_admin').change(
                    function(){
                        value_sel =$(this).val();
                        if(value_sel=='in stampa'){
                            $('.content_in_stampa').fadeIn();
                        }
                        else{
                            $('.content_in_stampa').fadeOut();
                        }
                    }
                )
                
                
		$( "#dialog-form-scelta-settore" ).dialog({
			autoOpen: false,
			height: 300,
			width: 500,
			modal: true,
			
			buttons: {
				Chiudi: function() {
					$( this ).dialog( "close" );
				}
			}
		
		});
		
		$('#dialog-form-modifica-schedalavoro').dialog({
			autoOpen: false,
			height: 450,
			width: 680, //<----------------------------------------------------- forse questo
			modal: true,
			
			
			open: function() {
				id_scheda = $(this).data('id_scheda');
				
				$.post('get_schedalavoro_by_id.php', { id_scheda : id_scheda }, function(data){
					
					var arr_scheda = data.split('|');
					
					$('#ts_mod').val(arr_scheda[2]);
					$('#pr_mod').val(arr_scheda[5]).attr('selected',true);
					$('#imp_mod').val(arr_scheda[6]).attr('selected',true);
					
					$('#dtcons_mod').val(arr_scheda[4]);
					$('#nt_mod').val(arr_scheda[3]);
					$('#op_mod').val(arr_scheda[1]).attr('selected',true);
					
					$('#stato_lavori').val(arr_scheda[0]).attr('selected',true);
					
					$('#id_scheda_to_modify').val(id_scheda);
                                        
                                        $('#costo_lavoro').val(arr_scheda[13]);
					//alert(data);
				});
			},
			
			buttons: {
				
				Modifica: function() {
					id_cliente = $(this).data('id_cliente');
					var dati = $('#form_modifica_schedalavoro').formSerialize();
					
					
					
					$.post('scheda_lavoro_modifica.php', dati, function(data){
						if(data=='1'){
							
							id_settore = $('#id_settore_to_scheda_lavoro').val();
							$.post('elenco_schede_lavoro_cliente.php', { id_cliente : id,id_settore : id_settore}, function(data){
								$('#content_list_schede_cliente').html(data);
							});
							
							alert('Scheda Modificata con successo');
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
		
		
		$('.data_consegna').datepicker();
		$(".data_consegna").datepicker('option', 'monthNames', ['Gennaio','Febraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre']);
		$(".data_consegna").datepicker('option', 'dayNamesMin', ['Dom', 'Lu', 'Ma', 'Me', 'Gio', 'Ve', 'Sa']);
		$(".data_consegna").datepicker('option', 'dateFormat', 'dd/mm/yy');
		$(".data_consegna").datepicker({ constrainInput: false });
		$(".data_consegna").datepicker( "option", "minDate", new Date());
		
		
		$('#salva_scheda_lavoro').click(
		function(){
			var dati = $('#form_scheda_lavoro_aggiungi').formSerialize();
			$.post('scheda_lavoro_aggiungi.php', dati, function(data){
			if(data=='1'){
				
				id_cliente = $('#id_cliente_to_scheda_lavoro').val();
				id_settore = $('#id_settore_to_scheda_lavoro').val();
				
				$.post('elenco_schede_lavoro_cliente.php', { id_cliente : id,id_settore : id_settore}, function(data){
					$('#content_list_schede_cliente').html(data);
				});
				
				alert('Nuova Scheda aggiunta con successo');
			}
			else{
				alert('non è stato possibile aggiungere la scheda');
			}
			$('#form_scheda_lavoro_aggiungi')[0].reset();
			//alert(data);
			
			/** RESET FORM */
			
			
			});
		}
		);
		
		/** MODIFICA BY ADMIN */
		$('#dialog-form-modifica-schedalavoro-admin').dialog({
			autoOpen: false,
			height: 500,
			width: 680,
			modal: true,
			
			
			open: function() {
				id_scheda = $(this).data('id_scheda');
				$('.content_in_stampa').fadeOut();
				$.post('get_schedalavoro_by_id.php', { id_scheda : id_scheda }, function(data){
					
					var arr_scheda = data.split('|');
					
					$('#ts_mod_admin').val(arr_scheda[2]);
					$('#pr_mod_admin').val(arr_scheda[5]).attr('selected',true);
					$('#imp_mod_admin').val(arr_scheda[6]).attr('selected',true);
					
					$('#dtcons_mod_admin').val(arr_scheda[4]);
					$('#nt_mod_admin').val(arr_scheda[3]);
					$('#ntop_mod_admin').val(arr_scheda[7]);
					
					$('#op_mod_admin').val(arr_scheda[1]).attr('selected',true);
					$('#settore_mod_admin').val(arr_scheda[9]).attr('selected',true);
					$('#stato_lavori_admin').val(arr_scheda[0]).attr('selected',true);
					
                                        $('#costo_lavoro_adm').val(arr_scheda[13]);
                                        
					$('#id_scheda_to_modify_admin').val(id_scheda);
					//alert(data);
				});
			},
			
			buttons: {
				
				Modifica: function() {
					id_scheda = $(this).data('id_scheda');
					var dati = $('#form_modifica_schedalavoro_admin').formSerialize();
					
					$.post('scheda_lavoro_modifica_by_admin.php', dati, function(data){
						if(data=='1'){
							
							alert('Scheda Modificata con successo');
							/*$('#tabs-grouping-1').load('grouping_schede_lavoro/all_grafica.php');	
							$('#tabs-grouping-2').load('grouping_schede_lavoro/all_serigrafia.php');
							$('#tabs-grouping-5').load('grouping_schede_lavoro/all_ordini.php');
							$('#tabs-grouping-6').load('grouping_schede_lavoro/all_preventivi.php');
							$('#tabs-grouping-7').load('grouping_schede_lavoro/all_instampa.php');
							$('#tabs-grouping-8').load('grouping_schede_lavoro/all_inmagazzino.php');
							$('#tabs-grouping-9').load('grouping_schede_lavoro/all_consegnati.php');
                            $('#tabs-grouping-11').load('grouping_schede_lavoro/all_consegnati.php');
                            */
                           window.location.href = sURL+'#tabs-1';
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
		
		$.addslashes = function (str) {
                str = str.replace(/\'/g,'\\\'');
                str = str.replace(/\"/g,'\\"');
                str = str.replace(/\\/g,'\\\\');
                str = str.replace(/\0/g,'\\0');
                return str;
        };
		
		
		
})


/*MODIFICA OPERATORE*/
function modify_op(id){
	$("#dialog-form").data('id_operatore',id);
	$( "#dialog-form" ).dialog( "open" );
}

function modify_cliente(id){
	$("#dialog-form-2").data('id_cliente',id);
	$("#dialog-form-2").dialog( "open" );
}

function modify_fornitore(id){
	$("#dialog-form-modifica-fornitore").data('id_fornitore',id);
	$("#dialog-form-modifica-fornitore").dialog( "open" );
}

function modify_newsletter(id){
	$("#dialog-form-modifica-newsletter").data('id_fornitore',id);
	$("#dialog-form-modifica-newsletter").dialog( "open" );
}

function delete_op(id,nome){
	
	if(confirm('Sicuro di eliminare l\'operatore: '+nome)){
	$.post('operatore_elimina.php', { id_op : id }, function(data){
			if(data=='1'){
				alert('Operatore eliminato con successo');
			}
			else{
				alert('non è stato possibile eliminare l\' operatore');
			}
			window.location.href = sURL+'#tabs-1';
			location.reload();
	});
	}
}

function delete_cliente(id,nome){
	
	if(confirm('Sicuro di eliminare il cliente: '+ nome )){
	$.post('cliente_elimina.php', { id_cliente : id }, function(data){
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


/************************* SCHEDE LAVORO ******************************/
function scegli_settore(id,nome){
	$('#container_new_scheda_lavoro').fadeOut();
	$('#list_schede_lavoro_cliente').fadeOut();
	
	$("#dialog-form-scelta-settore").dialog( "open" );
	
	
	
	$('#cliente_in_elenco_schede').html(nome);
	$('#nome_cliente_scheda').html(nome);
	$('#id_cliente_to_scheda_lavoro').val(id);
}

function new_scheda_lavoro(id_settore,nome){
	$( '#dialog-form-scelta-settore' ).dialog( "close" );
	
	$('#id_settore_to_scheda_lavoro').val(id_settore);
	
	/*$('#lista_clienti').hide("slide", { direction: "left", distance: 400 }, 1000, function(){
		
	
	});
	*/
	page = 'select_stato_lavori_grafica.php';
	
		$('#td_stato').load(page);
		
		id = $('#id_cliente_to_scheda_lavoro').val();
		$.post('elenco_schede_lavoro_cliente.php', { id_cliente : id,id_settore : id_settore}, function(data){
			$('#content_list_schede_cliente').html(data);
		});
		
		$('#settore_scheda_lavoro').html(nome);
		
		$('#container_new_scheda_lavoro').fadeIn();
		
		$('#list_schede_lavoro_cliente').fadeIn();
	
	
}

function open_modifica_schedalavoro(idscheda, idcliente){
	$("#dialog-form-modifica-schedalavoro").data('id_cliente',idcliente);
	$("#dialog-form-modifica-schedalavoro").data('id_scheda',idscheda);
	$("#dialog-form-modifica-schedalavoro").dialog( "open" );
}

function delete_schedalavoro(id,nome,id_cliente){
	
	if(confirm('Sicuro di eliminare la Scheda Lavoro: '+nome)){
	$.post('scheda_lavoro_elimina.php', { id_scheda : id }, function(data){
			if(data=='1'){
				
				id_cliente = $('#id_cliente_to_scheda_lavoro').val();
				id_settore = $('#id_settore_to_scheda_lavoro').val();
				
				$.post('elenco_schede_lavoro_cliente.php', { id_cliente : id_cliente,id_settore : id_settore}, function(data){
					$('#content_list_schede_cliente').html(data);
				});
				alert('Scheda Lavoro eliminata con successo');
			}
			else{
				alert('non è stato possibile eliminare la scheda lavoro');
			}
			
	});
	
					
	}
}

/* altra function eliminazione */
function delete_schedalavoro_by_admin(id){
	
	if(confirm('Sicuro di eliminare la Scheda Lavoro')){
	$.post('scheda_lavoro_elimina.php', { id_scheda : id }, function(data){
			if(data=='1'){
				alert('Scheda Lavoro eliminata con successo');
			}
			else{
				alert('non è stato possibile eliminare la scheda lavoro');
                        }
	});
	
					
	}
}

function position_change(idscheda, action, posizione, idnext){
	$.post('cambia_posizione.php', { id_scheda : idscheda, azione : action, posizione : posizione, nextid : idnext }, function(data){
			if(data=='1'){
				
				id_cliente = $('#id_cliente_to_scheda_lavoro').val();
				id_settore = $('#id_settore_to_scheda_lavoro').val();
				$.post('elenco_schede_lavoro_cliente.php', { id_cliente : id,id_settore : id_settore}, function(data){
					$('#content_list_schede_cliente').html(data);
				});
				
				
			}
			else{
				alert('Errore nel cambio di posizione')
			}
			//alert(data)
			
	});
}

function position_change_generica(idscheda, action, posizione, idnext){
	$.post('cambia_posizione_generica.php', { id_scheda : idscheda, azione : action, posizione : posizione, nextid : idnext }, function(data){
			if(data=='1'){
				
				$('#tabs-grouping-1').load('grouping_schede_lavoro/all_grafica.php');
				$('#tabs-grouping-2').load('grouping_schede_lavoro/all_serigrafia.php');
				$('#tabs-grouping-3').load('grouping_schede_lavoro/all_web.php');
				$('#tabs-grouping-5').load('grouping_schede_lavoro/all_ordini.php');
				$('#tabs-grouping-6').load('grouping_schede_lavoro/all_preventivi.php');
				$('#tabs-grouping-7').load('grouping_schede_lavoro/all_instampa.php');
				$('#tabs-grouping-8').load('grouping_schede_lavoro/all_inmagazzino.php');
				$('#tabs-grouping-9').load('grouping_schede_lavoro/all_consegnati.php');
				
				
			}
			else{
				alert('Errore nel cambio di posizione')
			}
			
			
			
	});
}

/**** modifica by admin **/
function open_modifica_schedalavoro_admin(idscheda){
	$("#dialog-form-modifica-schedalavoro-admin").data('id_scheda',idscheda);
	$("#dialog-form-modifica-schedalavoro-admin").dialog( "open" );
}
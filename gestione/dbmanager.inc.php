<?php
	session_start();


    $tipo_arr = array('seleziona tipo','stampatore', 'fornitore', 'corriere');
    $cnt_arr_tipo = count($tipo_arr);


	class dbManager{
		private $user = 'hqd';
		private $pass = 'hqd';
		private $db_name = 'hqd_schede_lavoro';
		private $host = 'localhost';
		private $connection= NULL;


	function __construct() {
			/*riferimento alla variabile $connection dell'oggetto dbManager*/
            $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
	}

	function __destruct() { 
            $this->connection->close();
	}
    
	
	/*********** LOGIN *************************************/
	function login_operatore($nome, $psw){
			$toReturn = false;
            $risultato=0;
            $sql = "SELECT * FROM Operatore WHERE Nome = '$nome' and Password = '$psw' ;" ;
            $risultato = $this->connection->query($sql);
            $num = $this->connection->affected_rows;
            if($num>0){
                $riga = mysqli_fetch_array($risultato);
                $toReturn=array(); /*array $toReturn*/
                $toReturn['idOperatore'] = $riga['Id'];
                $toReturn['Nome'] = $riga['Nome'];
				$toReturn['id_settore'] = $riga['Settore'];
            }
            return $toReturn;
	}
	
	/*********** SETTORI *************************************/
	function get_lista_settori(){
		$toReturn = null;
			
			$sql = "SELECT * FROM Settore ORDER BY Nome";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	function get_settore_by_Id($id){
		$toReturn = null;
			
			$sql = "SELECT * FROM Settore WHERE Id = $id";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	/*********** OPERATORI *************************************/
	function get_lista_operatori(){
		$toReturn = null;
			
			$sql = "SELECT * FROM Operatore ORDER BY Settore";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	function get_operatore_by_id($id){
		$toReturn = null;
			
			$sql = "SELECT * FROM Operatore WHERE id = $id";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	function insert_operatore($nome, $cognome, $interno, $privilegio, $cell1, $cell2, $settore, $mail){
		if(empty($nome)){
                return false;
            }
            $sql = "INSERT INTO Operatore (Nome, Cognome, N_Interno, Privilegio, Cell1, Cell2, Settore, Mail) VALUES ('$nome', '$cognome', '$interno', '$privilegio', '$cell1', '$cell2', $settore, '$mail');";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
	}
	
	function update_operatore($id,$nome, $cognome, $interno, $cell1, $cell2, $settore, $mail){
		 $sql = "UPDATE Operatore SET Nome='$nome', Cognome='$cognome', N_Interno='$interno', Cell1='$cell1', Cell2='$cell2', Settore=$settore, Mail='$mail' WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
				//return $sql;
            }
            return false;
			//return $sql;
	}
	
	function delete_operatore($id){
		 $sql = "DELETE FROM Operatore WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
	}
	
   /*********** CLIENTI *************************************/
	function get_lista_clienti(){
		$toReturn = null;
			
			$sql = "SELECT * FROM Clienti ORDER BY Ragione_Sociale";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	function get_cliente_by_id($id){
		$toReturn = null;
			
			$sql = "SELECT * FROM Clienti WHERE id = $id";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	function insert_cliente($rag_soc, $indirizzo, $citta, $cap, $piva, $cf, $ref, $mail, $tel, $cell1, $cell2, $sito){
		
            $sql = "INSERT INTO Clienti (Ragione_Sociale, Indirizzo, Citta, CAP, PIVA, CF, Referente, Mail, Telefono, Cell1, Cell2, Sito) VALUES ('$rag_soc', '$indirizzo', '$citta', '$cap', '$piva', '$cf', '$ref', '$mail', '$tel', '$cell1', '$cell2', '$sito');";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
	}
	
	function update_cliente($id, $rag_soc, $indirizzo, $citta, $cap, $piva, $cf, $ref, $mail, $tel, $cell1, $cell2, $sito){
		 $sql = "UPDATE Clienti SET Ragione_Sociale = '$rag_soc', Indirizzo='$indirizzo', Citta='$citta', CAP='$cap', PIVA='$piva', CF='$cf', Referente='$ref', Mail='$mail', Telefono='$tel', Cell1='$cell1', Cell2='$cell2', Sito='$sito'  WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
				//return $sql;
            }
            return false;
			//return $sql;
	}
	
	function delete_cliente($id){
		 $sql = "DELETE FROM Clienti WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
	}
	
        
        /*********** FORNITORI *************************************/
	function get_lista_fornitori(){
		$toReturn = null;
			
			$sql = "SELECT * FROM Fornitori ORDER BY Ragione_Sociale";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	function get_fornitore_by_id($id){
		$toReturn = null;
			
			$sql = "SELECT * FROM Fornitori WHERE id = $id";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
        
        function get_fornitore_by_tipo($tipo){
		$toReturn = null;
			
			$sql = "SELECT * FROM Fornitori WHERE tipo = 'stampatore'";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	function insert_fornitore($rag_soc, $indirizzo, $citta, $cap, $piva, $cf, $ref, $mail, $tel, $cell1, $cell2, $sito,$tipo){
		
            $sql = "INSERT INTO Fornitori (Ragione_Sociale, Indirizzo, Citta, CAP, PIVA, CF, Referente, Mail, Telefono, Cell1, Cell2, Sito, tipo) VALUES ('$rag_soc', '$indirizzo', '$citta', '$cap', '$piva', '$cf', '$ref', '$mail', '$tel', '$cell1', '$cell2', '$sito','$tipo');";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
	}
	
	function update_fornitore($id, $rag_soc, $indirizzo, $citta, $cap, $piva, $cf, $ref, $mail, $tel, $cell1, $cell2, $sito,$tipo){
		 $sql = "UPDATE Fornitori SET Ragione_Sociale = '$rag_soc', Indirizzo='$indirizzo', Citta='$citta', CAP='$cap', PIVA='$piva', CF='$cf', Referente='$ref', Mail='$mail', Telefono='$tel', Cell1='$cell1', Cell2='$cell2', Sito='$sito', tipo='$tipo'  WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
				//return $sql;
            }
            return false;
			//return $sql;
	}
	
	function delete_fornitore($id){
		 $sql = "DELETE FROM Fornitori WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
	}
	
        
         /*********** NEWSLETTER *************************************/
	function get_lista_newsletter(){
		$toReturn = null;
			$sql = "SELECT * FROM Newsletter ORDER BY Ragione_Sociale";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                                    $toReturn[] = $riga;
                                }
			}
			return $toReturn;
	}
	
	function get_newsletter_by_id($id){
		$toReturn = null;
			
			$sql = "SELECT * FROM Newsletter WHERE id = $id";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
        
        
	
	function insert_newsletter($rag_soc, $indirizzo, $citta, $cap, $piva, $cf, $ref, $mail, $tel, $cell1, $cell2, $sito,$prov){
		
            $sql = "INSERT INTO Newsletter (Ragione_Sociale, Indirizzo, Citta, CAP, PIVA, CF, Referente, Mail, Telefono, Cell1, Cell2, Sito, provincia) VALUES ('$rag_soc', '$indirizzo', '$citta', '$cap', '$piva', '$cf', '$ref', '$mail', '$tel', '$cell1', '$cell2', '$sito',$prov);";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
	}
	
	function update_newsletter($id, $rag_soc, $indirizzo, $citta, $cap, $piva, $cf, $ref, $mail, $tel, $cell1, $cell2, $sito,$prov){
		 $sql = "UPDATE Newsletter SET Ragione_Sociale = '$rag_soc', Indirizzo='$indirizzo', Citta='$citta', CAP='$cap', PIVA='$piva', CF='$cf', Referente='$ref', Mail='$mail', Telefono='$tel', Cell1='$cell1', Cell2='$cell2', Sito='$sito', provincia=$prov  WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
				//return $sql;
            }
            return false;
			//return $sql;
	}
	
	function delete_newsletter($id){
		 $sql = "DELETE FROM Newsletter WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
	}
        
        
        function get_tutte_province(){
            $toReturn = false;
            $sql = "SELECT codprov, riduct, provincia FROM regioni ORDER BY riduct ";
            if(($risultato = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
                $toReturn = array();
                while( $riga = mysqli_fetch_array($risultato) ){
                    $toReturn[] = $riga;
                }
            }
            return $toReturn;
        }
	/*********** SCHEDE LAVORO *************************************/
	
	function insert_schedaLavoro($IdCliente, $Data_ingresso, $Stato, $Creatore, $IdSettore, $IdOperatore, $Titolo, $Note, $DataConsegna, $Priorita, $costo, $NoteOperatore){	//manca NoteOperatore nelle variabili e nella query
			$posizione = $this->get_maxpos_schedeLavoro($IdCliente,$IdSettore);
			$posizioneGenerale = $this->get_maxposGenerica_schedeLavoro($IdSettore);
			
            $sql = "INSERT INTO Scheda_Lavoro (IdCliente, Data_ingresso, Stato, Creatore, IdSettore, IdOperatore, Titolo, Note, DataConsegna, Priorita, Posizione, PosizioneGenerale, NoteOperatore, costo) VALUES ($IdCliente, '$Data_ingresso', '$Stato', $Creatore, $IdSettore, $IdOperatore, '$Titolo', '$Note', '$DataConsegna', $Priorita, $posizione, $posizioneGenerale, '$NoteOperatore', '$costo' );";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
               return true;
			   //return $sql;
            }
            return false;
			//return $sql;
	}
	
	function get_all_schedeLavoro($idsettore){
		$toReturn = null;
			$sql = "SELECT * FROM Scheda_Lavoro WHERE IdSettore = $idsettore AND Stato != 'in stampa' AND  Stato != 'in magazzino' AND Stato != 'consegnato' ORDER BY PosizioneGenerale ASC";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
		return $toReturn;
	}
	
	function get_all_schedeLavoro_byStato($stato){
		$toReturn = null;
			$sql = "SELECT * FROM Scheda_Lavoro WHERE Stato = '$stato' ORDER BY PosizioneGenerale ASC";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
		return $toReturn;
	}
	
	function get_maxpos_schedeLavoro($idcliente, $idsettore){
			$toReturn = null;
			$sql = "SELECT MAX(Posizione) FROM Scheda_Lavoro WHERE IdCliente = $idcliente AND IdSettore = $idsettore";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    //$toReturn[] = $riga;
					$toReturn = $riga[0];
                }
			}
			
			if( is_null($toReturn) )
				$toReturn = 1;
			else
				$toReturn = $toReturn + 1;
				
			return $toReturn;
	}
	
	function get_maxposGenerica_schedeLavoro($idsettore){
			$toReturn = null;
			$sql = "SELECT MAX(PosizioneGenerale) FROM Scheda_Lavoro WHERE IdSettore = $idsettore";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn = $riga[0];
                }
			}
			if( is_null($toReturn) )
				$toReturn = 1;
			else
				$toReturn = $toReturn + 1;
				
			return $toReturn;
	}
	
	
	function update_schedaLavoro($id, $Stato, $IdOperatore, $Titolo, $Note, $DataConsegna, $Priorita,$costo){
		 $sql = "UPDATE Scheda_Lavoro SET Stato = '$Stato', IdOperatore= $IdOperatore, Titolo = '$Titolo', Note = '$Note', DataConsegna = '$DataConsegna',Priorita = '$Priorita', costo='$costo'  WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
				//return $sql;
            }
            return false;
			//return $sql;
	}
	
	function update_schedaLavoro_by_op($id, $Stato, $NoteOp){
		 $sql = "UPDATE Scheda_Lavoro SET Stato = '$Stato', NoteOperatore = '$NoteOp' WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
				//return $sql;
            }
            return false;
			//return $sql;
	}
	
	function update_schedaLavoro_by_admin($id, $Stato, $IdOperatore, $Titolo, $Note, $DataConsegna, $Priorita, $Settore, $costo){
		 // controllare la posizione da modificare in caso di cambio di settore
		 
		 $scheda_arr = $this->get_schedaLavoro_by_id($id);
		 $Settore_Scheda = $scheda_arr[$i][5];
		 
		 if($Settore_Scheda != $Settore){
		 	$new_posizione = $this->get_maxposGenerica_schedeLavoro($Settore);
		 	 $sql = "UPDATE Scheda_Lavoro SET Stato = '$Stato', IdOperatore= $IdOperatore, Titolo = '$Titolo', Note = '$Note', DataConsegna = '$DataConsegna',Priorita = '$Priorita', IdSettore = $Settore, costo='$costo'  WHERE Id = $id";
		 }
		 
		 $sql = "UPDATE Scheda_Lavoro SET Stato = '$Stato', IdOperatore= $IdOperatore, Titolo = '$Titolo', Note = '$Note', DataConsegna = '$DataConsegna',Priorita = '$Priorita', IdSettore = $Settore, costo='$costo'  WHERE Id = $id";
           if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
				//return $sql;
            }
            return false;
			//return $sql;
			//echo $sql;
	}
	
	
	
	function cambia_posizione($id_scheda, $pos ){
		$sql = "UPDATE Scheda_Lavoro SET Posizione = $pos  WHERE  Id = $id_scheda  ";
		if($this->connection->query($sql) && $this->connection->affected_rows>0){
              	return true;
				//return $sql;
            }
            return false;
			//return $sql;
	}
	
	function cambia_posizione_generica($id_scheda, $pos ){
		$sql = "UPDATE Scheda_Lavoro SET PosizioneGenerale = $pos  WHERE  Id = $id_scheda  ";
		if($this->connection->query($sql) && $this->connection->affected_rows>0){
              	return true;
				//return $sql;
            }
            return false;
			//return $sql;
	}
	
	function update_posizione_after_delete($idscheda,$idcliente, $idsettore ){
		$sql = "UPDATE Scheda_Lavoro SET Posizione = Posizione - 1  WHERE  Id > $idscheda AND IdCliente = $idcliente AND IdSettore = $idsettore";
		if($this->connection->query($sql) && $this->connection->affected_rows>0){
              	return true;
				//return $sql;
            }
            return false;
			//return $sql;
	}
	
	function delete_schedaLavoro($id){
		 $sql = "DELETE FROM Scheda_Lavoro WHERE Id = $id";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
	}
	
	function get_schedaLavoro_by_id($id){
		$toReturn = null; //forse si può mettere $toReturn = array();
			
			$sql = "SELECT * FROM Scheda_Lavoro WHERE Id = $id";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	function get_schedaLavoro_by_cliente($id,$idsettore){
		$toReturn = null; //forse si può mettere $toReturn = array();
			
			$sql = "SELECT * FROM Scheda_Lavoro WHERE IdCliente = $id AND IdSettore = $idsettore ORDER BY Posizione ASC";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
	
	function get_schedaLavoro_by_operatore($id, $stato){
		$toReturn = null;
			
			if($stato=='')
				$sql = "SELECT * FROM Scheda_Lavoro WHERE IdOperatore = $id AND (Stato = 'in lavorazione' OR Stato = 'da realizzare') AND IdSettore != 9 AND IdSettore != 11 ORDER BY PosizioneGenerale ASC";
			else
				$sql = "SELECT * FROM Scheda_Lavoro WHERE IdOperatore = $id AND Stato = '$stato' AND IdSettore != 9 AND IdSettore != 11 ORDER BY PosizioneGenerale ASC";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}


}



?>

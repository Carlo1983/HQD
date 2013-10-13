<?php

class dbManager_newsletter{
 /* 
	private $user = 'test';
	private $pass = 'test';
	private $db_name = 'newsletter';
	private $host = '192.168.1.254';
	private $connection= NULL;

  */
    
   	
  
	private $user = 'Sql505343';
	private $pass = '7f6ed400';
	private $db_name = 'Sql505343_2';
	private $host = '62.149.150.142'; //aruba
	private $connection= NULL;	


	function __construct() {
            $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
	}

	function __destruct() { 
            $this->connection->close();
	}
        

        /*
        * Questa funzione salva nel database un nuovo venditore
        *
        * $venditore deve essere un array associativo composto dai seguenti campi:
        * denominazione,piva,citta,prov,cap,indirizzo,telefono,
        * fax,email,categoria,sottocategoria,username,password
        *
        */
        
        function get_utenti(){
		$toReturn = null;
			
			$sql = "SELECT * FROM utente";
			if( ($risultati = $this->connection->query($sql)) && ($this->connection->affected_rows>0)){
				while( $riga = mysqli_fetch_array($risultati) ){
                    $toReturn[] = $riga;
                }
			}
			return $toReturn;
	}
        
        function aggiungi_utente($mail,$nome){
            
            $sql = "INSERT INTO utente (email, ragione_sociale) VALUES ('$mail', '$nome');";
            if ( $this->connection->query($sql) === TRUE ){
                return true;
            }
            else{
                return false;
            }
        }
        
        function elimina_utente($mail){
             $sql = "DELETE FROM utente WHERE email = $mail";
            if($this->connection->query($sql) && $this->connection->affected_rows>0){
                return true;
            }
            return false;
        }

}

?>

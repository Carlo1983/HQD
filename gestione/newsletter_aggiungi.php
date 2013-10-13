<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();


$rag_soc = addslashes($_POST['rag_soc']);
$piva = $_POST['piva'];
$cf = $_POST['cf'];
$indirizzo = addslashes($_POST['indirizzo']);
$citta = addslashes($_POST['citta']);

$cap = $_POST['cap'];
$referente = addslashes($_POST['referente']);
$mail = $_POST['mail'];
$cell1 = $_POST['cell1'];
$cell2 = $_POST['cell2'];
$tel = $_POST['tel'];
$sito = $_POST['sito'];

$prov = $_POST['prov'];

if($manager_sql->insert_newsletter($rag_soc, $indirizzo, $citta, $cap, $piva, $cf, $referente, $mail, $tel, $cell1, $cell2, $sito,$prov)){
	
      
    echo '1';
    
}
else
	echo '0';

?>
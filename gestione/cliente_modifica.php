<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();

$rag_soc = addslashes($_POST['rag_soc_dg']);
$piva = $_POST['piva_dg'];
$cf = $_POST['cf_dg'];
$indirizzo = addslashes($_POST['indirizzo_dg']);
$citta = addslashes($_POST['citta_dg']);
$cap = $_POST['cap_dg'];
$referente = addslashes($_POST['referente_dg']);
$mail = $_POST['mail_dg'];
$cell1 = $_POST['cell1_dg'];
$cell2 = $_POST['cell2_dg'];
$tel = $_POST['tel_dg'];
$sito = $_POST['sito_dg'];

$id = $_POST['id_cliente_dg'];

/*$debug = $manager_sql->update_cliente($id, $rag_soc, $indirizzo, $citta, $cap, $piva, $cf, $referente, $mail, $tel, $cell1, $cell2, $sito);
echo $debug;
*/

if($manager_sql->update_cliente($id, $rag_soc, $indirizzo, $citta, $cap, $piva, $cf, $referente, $mail, $tel, $cell1, $cell2, $sito))
	echo '1';
else
	echo '0';

?>
<?php require('dbmanager.inc.php'); $manager_sql = new dbManager();



$id_cliente = $_POST['id_cliente_to_scheda_lavoro_'];
$data_ingresso = $_POST['data_ingresso'];
$stato = $_POST['stato'];
$creatore = 1; //prendere da session in base al login
$idsettore = $_POST['id_settore_to_scheda_lavoro_'];
$idoperatore =$_POST['operatore_to_scheda_lavoro'];
$titolo = addslashes($_POST['titolo_scheda']);
$note = addslashes($_POST['note']);
$data_consegna = $_POST['data_consegna'];
$priorita = $_POST['priorita'];


$data_consegna_arr = explode('/',$data_consegna);
$data_consegna = $data_consegna_arr[2].'/'.$data_consegna_arr[1].'/'.$data_consegna_arr[0];

$costo = $_POST['costo_lavoro'];

/*$debug = $manager_sql->insert_schedaLavoro($id_cliente, $data_ingresso, $stato, $creatore, $idsettore, $idoperatore, $titolo, $note, $data_consegna, $priorita);
echo $debug;
*/

if($manager_sql->insert_schedaLavoro($id_cliente, $data_ingresso, $stato, $creatore, $idsettore, $idoperatore, $titolo, $note, $data_consegna, $priorita,$costo))
	echo '1';
else
	echo '0';

?>
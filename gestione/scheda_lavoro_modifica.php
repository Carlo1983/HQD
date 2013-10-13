<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();
$id_scheda = $_POST['id_scheda'];
$id_cliente = $_POST['id_cliente_to_scheda_lavoro'];
$data_ingresso = $_POST['data_ingresso'];
$stato = $_POST['stato'];


$idoperatore =$_POST['operatore_to_scheda_lavoro'];
$titolo = addslashes($_POST['titolo_scheda']);
$note = addslashes($_POST['note']);
$data_consegna = $_POST['data_consegna'];
$priorita = $_POST['priorita'];

$costo = $_POST['costo_lavoro'];

$data_consegna_arr = explode('/',$data_consegna);
$data_consegna = $data_consegna_arr[2].'/'.$data_consegna_arr[1].'/'.$data_consegna_arr[0];

/*$debug = $manager_sql->update_schedaLavoro($id_scheda,$stato, $idoperatore, $titolo, $note, $data_consegna, $priorita);
echo $debug;
*/

if($manager_sql->update_schedaLavoro($id_scheda,$stato, $idoperatore, $titolo, $note, $data_consegna, $priorita,$costo))
	echo '1';
else
	echo '0';

?>
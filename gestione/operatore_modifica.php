<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();

$id = $_POST['id_op'];
$nome = $_POST['nome_operatore'];
$cognome = $_POST['cognome_operatore'];
$interno = $_POST['interno'];
$privilegio = $_POST['nome_operatore'];
$cell1 = $_POST['cell1'];
$cell2 = $_POST['cell2'];
$settore = $_POST['settore_operatore'];
$mail = $_POST['email_operatore'];


/*$debug = $manager_sql->update_operatore($id,$nome, $cognome, $interno, $cell1, $cell2, $settore, $mail);
echo $debug;
*/
if($manager_sql->update_operatore($id,$nome, $cognome, $interno, $cell1, $cell2, $settore, $mail))
	echo '1';
else
	echo '0';

?>
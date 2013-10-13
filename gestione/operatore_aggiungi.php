<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();


$nome = $_POST['nome_operatore'];
$cognome = $_POST['cognome_operatore'];
$interno = $_POST['interno'];
$privilegio = $_POST['nome_operatore'];
$cell1 = $_POST['cell1'];
$cell2 = $_POST['cell2'];
$settore = $_POST['settore_operatore'];
$mail = $_POST['email_operatore'];


if($manager_sql->insert_operatore($nome, $cognome, $interno, $privilegio, $cell1, $cell2, $settore, $mail))
	echo '1';
else
	echo '0';

?>
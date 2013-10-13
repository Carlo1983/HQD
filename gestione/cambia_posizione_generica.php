<?php require('dbmanager.inc.php'); $manager_sql = new dbManager();

$id_scheda = $_POST['id_scheda'];
$action = $_POST['azione'];
$pos = $_POST['posizione'];
$nextid = $_POST['nextid'];


if($action == 'su'){
	
	$new_position = $pos -1 ;
	
	if( $manager_sql->cambia_posizione_generica($id_scheda, $new_position) && $manager_sql->cambia_posizione_generica($nextid, $pos) )
		echo '1';
	else
		echo '0';
	
}

if($action == 'giu'){
	
	$new_position = $pos + 1 ;
	if( $manager_sql->cambia_posizione_generica($id_scheda, $new_position) && $manager_sql->cambia_posizione_generica($nextid, $pos) )
		echo '1';
	else
		echo '0';
	
	
}





?>
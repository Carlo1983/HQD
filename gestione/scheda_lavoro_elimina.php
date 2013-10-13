<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();

$id = $_POST['id_scheda'];

/*  */


$schede_array = $manager_sql->get_schedaLavoro_by_id($id);
$cnt_sl = count($schede_array);
for($i=0; $i<$cnt_sl; $i++){
		
		$idcliente = $schede_array[$i][1];
		$idsettore = $schede_array[$i][5];
}


/*if($manager_sql->delete_schedaLavoro($id))
	echo '1';
else
	echo '0';
*/
$manager_sql->update_posizione_after_delete($id,$idcliente, $idsettore );


if($manager_sql->delete_schedaLavoro($id))
	echo '1';
else
	echo '0';

?>
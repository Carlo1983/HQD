<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();

$id = $_POST['id_op'];

//echo $nome." ".$tipo." ".$id;

if($manager_sql->delete_operatore($id))
	echo '1';
else
	echo '0';

?>
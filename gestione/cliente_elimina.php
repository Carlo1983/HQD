<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();

$id = $_POST['id_cliente'];

if($manager_sql->delete_cliente($id))
	echo '1';
else
	echo '0';

?>
<?php 
	ini_set('session.gc_maxlifetime','86400');
	require('dbmanager.inc.php');
	$manager_sql = new dbManager();


	$nome = $_POST['nome'];
	$psw = $_POST['psw'];



	if($arr_operataore = $manager_sql->login_operatore($nome, $psw)){
	
		$_SESSION['id_op'] = $arr_operataore['idOperatore'];
		$_SESSION['nome_op'] = $arr_operataore['Nome'];
		$_SESSION['id_settore'] = $arr_operataore['id_settore'];
        if ($nome == 'Reception')
            echo '2';
        else
            echo '1';
}
else
	echo '0';
?>
<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();

$id_op = $_POST['id_operatore'];

$arr_operatore = $manager_sql->get_operatore_by_id($id_op);

if(!empty($arr_operatore)){
	
	
	
	$cnt_operatore = count($arr_operatore);
	for($i=0; $i<$cnt_operatore; $i++){
		$nome = $arr_operatore[$i][1];
		$cognome = $arr_operatore[$i][2];
		$interno = $arr_operatore[$i][3];
		$privilegio = $arr_operatore[$i][4];
		$cell1 = $arr_operatore[$i][5];
		$cell2 = $arr_operatore[$i][6];
		$settore = $arr_operatore[$i][7];
		$mail = $arr_operatore[$i][8];
		
		$toReturn = $nome.",".$cognome.",".$interno.",".$privilegio.",".$cell1.",".$cell2.",".$settore.",".$mail;
		
	}
	
	echo $toReturn;
}
else{
	echo "Error";
}

?>
<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();

$id_cliente = $_POST['id_cliente'];

$arr_cliente = $manager_sql->get_cliente_by_id($id_cliente);

if(!empty($arr_cliente)){
	
	$cnt = count($arr_cliente);
	for($i=0; $i<$cnt; $i++){
		$rag_soc = $arr_cliente[$i][1];
		$indirizzo = $arr_cliente[$i][2];
		$citta = $arr_cliente[$i][3];
		$cap = $arr_cliente[$i][4];
		$piva = $arr_cliente[$i][5];
		$cf = $arr_cliente[$i][6];
		$referente = $arr_cliente[$i][7];
		$mail = $arr_cliente[$i][8];
		$tel = $arr_cliente[$i][9];
		$cell1 = $arr_cliente[$i][10];
		$cell2 = $arr_cliente[$i][11];
		$sito = $arr_cliente[$i][12];
		
$toReturn = $rag_soc."(:)".$indirizzo."(:)".$citta."(:)".$cap."(:)".$piva."(:)".$cf."(:)".$referente."(:)".$mail."(:)".$tel."(:)".$cell1."(:)".$cell2."(:)".$sito;
		
	}
	
	echo $toReturn;
}
else{
	echo "Error";
}

?>
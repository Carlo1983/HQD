<?php 

require('dbmanager.inc.php');
$manager_sql = new dbManager();

$id_scheda = $_POST['id_scheda'];

$arr_scheda = $manager_sql->get_schedaLavoro_by_id($id_scheda);

if(!empty($arr_scheda)){
	
	$cnt = count($arr_scheda);
	for($i=0; $i<$cnt; $i++){
		$stato = $arr_scheda[$i][3];
		$operatore = $arr_scheda[$i][6];
		$titolo = $arr_scheda[$i][7];
		$note = $arr_scheda[$i][8];
		$consegna = $arr_scheda[$i][9];
		$priorita = $arr_scheda[$i][10];
		$importanza = $arr_scheda[$i][11];
		$note_operatore = $arr_scheda[$i][13];
		$settore = $arr_scheda[$i][5];
		
		$data_consegna_arr = explode('-',$consegna);
		$data_consegna = $data_consegna_arr[2].'/'.$data_consegna_arr[1].'/'.$data_consegna_arr[0];
		
                $costo = $arr_scheda[$i][14];
                
		$idcliente = $arr_scheda[$i][1];
		$cliente_arr = $manager_sql->get_cliente_by_id($idcliente);
		$cliente_nome = $cliente_arr[0][1];
                $cliente_mail = $cliente_arr[0][8];
                $cliente_tel = $cliente_arr[0][9].' '.$cliente_arr[0][10];
                $cliente_ref = $cliente_arr[0]['Referente'];
                
		
$toReturn = $stato."|".$operatore."|".$titolo."|".$note."|".$data_consegna."|".$priorita.'|'.$importanza.'|'.$note_operatore.'|'.$cliente_nome.'|'.$settore.'|'.$cliente_mail.'|'.$cliente_tel.'|'.$cliente_ref.'|'.$costo;
		
	}
	
	echo $toReturn;
}
else{
	echo "Error";
}

?>
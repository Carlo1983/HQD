<?php
	if(isset($_SESSION['id_op'])){
		$id_op = $_SESSION['id_op'];
		$nome_op = $_SESSION['nome_op'];
		$id_settore_op = $_SESSION['id_settore'];
		
		$title_settore_arr = $manager_sql->get_settore_by_Id($id_settore_op);
		$title_settore = $title_settore_arr[0][1];
?>

<span class="orange">Operatore</span><span>: <?php echo  $nome_op ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;
<span class="orange">Settore</span><span>: <?php echo $title_settore?></span>
<?php } ?>
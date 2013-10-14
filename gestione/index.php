<!DOCTYPE html>
<html>

<head><!-- MODIFICA A CAZZO -->
	<meta charset="utf-8">
	<?php
		require ('dbmanager.inc.php');
		$manager_sql = new dbManager();
	?>
	<link href="css/demo_table.css" rel="stylesheet" type="text/css" />
	<link href="css/style_table.css" rel="stylesheet" type="text/css" />
	<link href="js/css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	
	

	<style>
		.modify_cat {
			cursor: pointer
		}
	</style>
	
</head>

<body>

<div id="tabs">
	
	<ul>
		<li><a href="#tabs-4">Home</a></li>
		<li><a href="#tabs-1">Gestione Operatori</a></li>
		<li><a href="#tabs-2">Gestione Schede Lavoro</a></li>
		<li><a href="#tabs-3">Gestione Clienti</a></li>
        <li><a href="#tabs-5">Gestione Fornitori</a></li>
        <li><a href="#tabs-6">Gestione Newsletter</a></li>
        <li><a href="#tabs-7">Costi Generici</a></li>
	</ul>
	
    <div id="tabs-4"><?php include('tab-riepilogo-home.php')?></div>
    <div id="tabs-1"><?php include('tab-gestione-operatori.php')?></div>
	<div id="tabs-2"><?php include('tab-gestione-schedelavoro.php')?></div>
	<div id="tabs-3"><?php include('tab-gestione-clienti.php')?></div>
	<div id="tabs-5"><?php include('tab-gestione-fornitori.php')?></div>
    <div id="tabs-6"><?php include('tab-gestione-newsletter.php')?></div>
    <div id="tabs-7"><?php include('tab-gestione-costigenerici.php')?></div>

</div>

</body>

</html>
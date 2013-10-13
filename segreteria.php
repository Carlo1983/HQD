<?php  
require('gestione/dbmanager.inc.php'); $manager_sql = new dbManager();
require('verify_login.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/init.js"></script>

<link href="js/css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css" />
<link href="css/style_table.css" rel="stylesheet" type="text/css" />

<style>
    .table-segreteria{ width:650px;}
    .table-segreteria tr{
        height:30px;
        font-size:18px;
    }
    
    .table-segreteria th {
        color:#999;
        font-size:18px
    }
</style>

</head>
<body>

<div id="container">
<?php include('top.php') ?>

<div id="top_2">
<div style="position:relative; float:left; width:200px;">Schede Lavoro</div>
<div style="position:relative; float:right; width:100px;"><?php echo date('d/m/Y')?></div>	
</div>

<div id="content_schede_lavoro">
<?php include('schede_lavoro_segreteria.php')?>
</div>


</div>

<!-- DIALOG MODIFICA SCHEDA LAVORO-->
<div id="dialog-form-modifica-schedalavoro" title="Modifica Scheda Lavoro">
<form id="form_modifica_schedalavoro">
<input type="hidden" name="id_scheda" id="id_scheda_to_modify" />
<table cellpadding="0" cellspacing="0">
            	
                <tr>
                	<td align="left">Cliente:</td>
                        <td align="left"><div id="cliente_mod" class='txt-bold-orange'></div></td>
                	<td align="left">Email:</td>
                        <td align="left"><div id="cliente_mail" class='txt-bold-orange'></div></td>
                </tr>
    
                 <tr>
                	
                	<td align="left">Referente:</td>
                        <td align="left"><div id="cliente_ref" class='txt-bold-orange'></div></td>
                        <td align="left">Telefono:</td>
                        <td align="left"><div id="cliente_tel" class='txt-bold-orange'></div></td>
                </tr>
                <tr><td colspan="4" align="left" height="10">&nbsp;</td></tr>
                <tr>
                	<td align="left">Titolo:</td>
                    <td align="left"><div id="ts_mod" class='txt-bold-orange'></div></td>
                	<td align="left">&nbsp;&nbsp;Priorit&aacute;:</td>
                    <td align="left"><img src="" id="pr_mod" /></td>
                </tr>
                
                
                
                <tr>
                	<td align="left">Consegna: </td>
                    <td align="left"><div id="dtcons_mod" ></div></td>
                	<td align="left">&nbsp;&nbsp;Stato: </td>
                    <td align="left" id="td_stato">
                    	<select name="stato" id="stato_lavori">
                            <option value="da realizzare">da realizzare</option>
                            <option value="in lavorazione">in lavorazione</option>
                            <option value="bozza pronta">bozza pronta</option>
                            <option value="da preparare per la stampa">da preparare per la stampa</option>
                            <option value="pronto per la stampa">pronto per la stampa</option>
                            <option value="in stampa">in stampa</option>
                            <option value="in magazzino">in magazzino</option>
                            <option value="consegnato">consegnato</option>
                        </select>
                    </td>
                </tr>
                <tr><td colspan="4" align="left" height="10">&nbsp;</td></tr>
                 <tr>
                	<td colspan="4" align="left">Note:<br /> <textarea  name="note" style="width:630px; height:120px" id="nt_mod" disabled="disabled"></textarea></td>
                </tr>
                
                <tr><td colspan="4" align="left" height="10">&nbsp;</td></tr>
                
                <tr>
                	<td colspan="4" align="left">Note Operatore:<br /> <textarea  name="noteoperatore" style="width:630px; height:120px" id="ntop_mod" ></textarea></td>
                </tr>
                
            </table>
   </form>       
</div>
<!-- FINE DIALOG -->

</body>
</html>

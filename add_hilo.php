<?  if(isset($_POST["submit"])) { ///header("Location: index.php");}
 include 'conexion.php';
if( isset( $_POST["submit"] ) ) // se envio el formulario?
//echo "valTotal: ".$valTotal=$_POST["valTotal"];echo "<br>";
for($x =1 ; $x <= $_POST['cantidad'] ; $x++) // recorremos 10 posibles registros, puedes poner los que necesites
// se recuperan cada uno de los datos del form siempre y cuando se hayan enviado, de lo contrario los omite
if(isset($_POST["opcStatus".$x])) // se envio el registro opcStatus1, opcStatus2, ... etc. ?
{
// obtenemos cada uno de los datos
 "Date: ".$date=$_POST["date".$x ]; "<br>";
 "orden: ".$orden=$_POST["orden".$x ];  "<br>";
 "product: ".$product=$_POST["product".$x ];  "<br>";
 "item_: ".$item_=$_POST["item_".$x ];  "<br>";
 "qty: ".$qty=$_POST["qty".$x ];  "<br>";
 "mps: ".$mps=$_POST["mps".$x ];  "<br>";
 "fecha_ide: ".$fecha_ide=$_POST["fecha_ide".$x ];  "<br>";
 "fecha_limit: ".$fecha_limit=$_POST["fecha_limit".$x ];  "<br>";
 "inserted_by : ".$inserted_by=$_POST["inserted_by".$x ];  "<br>";
 "inserted_from: ".$inserted_from=$_SERVER["REMOTE_ADDR"];  "<br>"; ///.' PC->: '.gethostbyaddr($_SERVER["REMOTE_ADDR"])
// se insertan los datos
$insertSQL="INSERT INTO external_mat(date,orden,product,item_,qty,mps,fecha_ide,fecha_limit,inserted_by,inserted_from,valTotal)
VALUES('$date','$orden','$product','$item_','$qty','$mps','$fecha_ide','$fecha_limit','$inserted_by','$inserted_from','$valTotal')";
$Result1 = mysql_query($insertSQL, $conn) or die (mysql_error());
echo (mysql_error()); //header("Location: index.php");/// se hace un retorno a la pagina de inicio
 } }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Vendors</title>
        <script language="javascript" type="text/javascript" src="../ajax/extras/js/jquery-1.3.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="../ajax/extras/js/jquery.blockUI.js"></script>
        <script language="javascript" type="text/javascript" src="../ajax/extras/js/jquery.validate.1.5.2.js"></script>
<link href="/extras/bootstraptable/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/extras/bootstraptable/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="app/views/default/css/estilo.css"/>
<!------------------------------- INICIA DATEPICKER---------------------------------------->
	<script src="/administrator/datepicker2/arian-datepicker/Test/mootools-core.js" type="text/javascript"></script>
	<script src="/administrator/datepicker2/arian-datepicker/Test/mootools-more.js" type="text/javascript"></script>
	<script src="/administrator/datepicker2/arian-datepicker/Source/Locale.en-US.DatePicker.js" type="text/javascript"></script>
	<script src="/administrator/datepicker2/arian-datepicker/Source/Picker.js" type="text/javascript"></script>
	<script src="/administrator/datepicker2/arian-datepicker/Source/Picker.Attach.js" type="text/javascript"></script>
	<script src="/administrator/datepicker2/arian-datepicker/Source/Picker.Date.js" type="text/javascript"></script>
<link  href="/administrator/datepicker2/arian-datepicker/Source/datepicker.css" rel="stylesheet" type="text/css" media="screen" />
<link  href="/administrator/datepicker2/arian-datepicker/Source/datepicker_vista/datepicker_vista.css" rel="stylesheet" type="text/css" media="screen" />

<? $cantidad=1; while($cantidad<=$_POST['cantidad']){ ?>
<script>
window.addEvent('domready', function(){
		new Picker.Date('date<?=$cantidad?>', {
		pickerClass: 'datepicker_vista'});});

	window.addEvent('domready', function(){
		new Picker.Date('mps<?=$cantidad?>', {
		pickerClass: 'datepicker_vista'});});

	window.addEvent('domready', function(){
		new Picker.Date('fecha_ide<?=$cantidad?>', {
		pickerClass: 'datepicker_vista'});});

	window.addEvent('domready', function(){
		new Picker.Date('fecha_limit<?=$cantidad?>', {
		pickerClass: 'datepicker_vista'});});
		</script>
			 <? $cantidad++; } ?>
		<!--------------------------------------------- TERMINA DATEPICKER------------------------------------------->

</head>
<body>
<div id="wrapper">

<div id="cuerpo" align="center"/>
<div id="menu">
<? include "app/views/default/sections/s.menuizquierda.php"?>
</div>
<div class="table-responsive">
<table width="60%" border="" class="table table-striped table-bordered table-condensed" />
 <thead>
  <tr>
   <th scope="col" bgcolor="#FF6600" colspan="3">Numero de filas para la tabla Hilo</th>
    <th scope="col" bgcolor="#FF6600" colspan="2"><form name="formname" method="POST" action="" class="table-hover"/><input name="cantidad" type="text"  class="input-medium search-query"/>
</th>
	<th scope="col" bgcolor="#FF6600" colspan="2">Vendor :: <input type="text" name="vendor" /></th>
	<th scope="col" bgcolor="#FF6600" align="center">   <button type="submit" class="btn">Search</button></form></th>
	 </thead>
  <tbody>
	<tr>
    <th scope="col" bgcolor="#0099CC">Fecha</th>
    <th scope="col" bgcolor="#0099CC">Orden</th>
	<th scope="col" bgcolor="#0099CC">Total</th>
	<th scope="col" bgcolor="#0099CC">ITEM</th>
    <th scope="col" bgcolor="#0099CC">Qty</th>
    <th scope="col" bgcolor="#0099CC">MPS</th>
	<th scope="col" bgcolor="#0099CC">Fecha Ideal</th>
    <th scope="col" bgcolor="#0099CC">Fecha Limite</th>
    </tr>
  <tr>

 <form name="form1" method="POST" action="" />
 <? $cantidad=1; while($cantidad<=$_POST['cantidad']){ ?>
 <script type="text/javascript" language="javascript">
<!--
function calcVals(price,qty){
    var total = document.getElementById("valTotal");
    var currentTotal = total.value.replace('$','');
    var thisTotal = price + qty;
    var newTotal = eval(Number(currentTotal) + Number(thisTotal));
    total.value = newTotal;
}
</script>
    <td>	<div class="input-prepend input-group">
    		<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
    	<input type='' name='date<?=$cantidad?>' id="date<?=$cantidad?>" value="<?= date('Y-m-d');?>" />
    	</div></td>
    <td><input type='text' name='orden<?=$cantidad?>'/></td>

    <td><input type='text' name='fabric<?=$cantidad?>' id="fabric<?=$cantidad?>" /></td>
    <td><input type='text' name='color<?=$cantidad?>' id="color<?=$cantidad?>" /> </td>
    <td><input type='text' name='yards<?=$cantidad?>' id="yards<?=$cantidad?>" title="0" onblur="calcVals(this.title,this.value);"  /></td>

	<input type='hidden' name='total<?=$cantidad?>' id="total<?=$cantidad?>" />
    <input type='hidden' name='item_<?=$cantidad?>' id="item_<?=$cantidad?>" />
    <input type='hidden' name='qty<?=$cantidad?>' id="qty<?=$cantidad?>" title="0" onblur="calcVals(this.title,this.value);"/>

    <td><div class="input-prepend input-group">
    		<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
    		<input type='' name='mps<?=$cantidad?>' id="mps<?=$cantidad?>" onChange="addNumber<?=$cantidad?>()"/> </td>
    <td>
    	<div class="input-prepend input-group">
    		<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
    		<input type='' name='fecha_ide<?=$cantidad?>' id="fecha_ide<?=$cantidad?>" />
    		</div></td>
    <td>
    	<div class="input-prepend input-group">
    		<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
    		<input type='' name='fecha_limit<?=$cantidad?>' id="fecha_limit<?=$cantidad?>" />
    		</div>


	<input name="opcStatus<?=$cantidad;?>" type="hidden">
	<input name="cantidad" type="hidden" id="cantidad" value="<? echo "$_POST[cantidad]"; ?>" />
	<input name="inserted_by<?=$cantidad?>" type="hidden" id="inserted_by<?=$cantidad?>" value="<?=$user?>" />
	</td>
  </tr>
    <tr>
     <tr>
  <? $cantidad++; } ?>
	<th scope="row"></th>
    <td align="center"></td>
	<th scope="row"></th>
	<th scope="row">Total</th>
	<th scope="row"><input type="text"  name="valTotal" id="valTotal"  style="border:0px;" /></th>
	<td align="center"> <button type="submit" name="submit" class="btn btn-primary">Guardar</button></td>
	<td></td>
	<td></td>
	</tbody>
</form>

</table>
</div>
<!--
<form name="submit" action="index.php" method="get">
Buscar estilo:<input type="text" id="cut_name" name="cut_name" >
<input class="inspc" type="submit" value="Buscar">
</form>
<table border="1"  width="65%" cellpadding="0" cellspacing="0"/>
	<td width="150" bgcolor="#0099CC">Etilo & Corte</td>
    <td width="100" bgcolor="#0099CC">Area en pulgadas&#710;2</td>
    <td width="100" bgcolor="#0099CC">Area en Yardas&#710;2</td>
    <td width="50" bgcolor="#0099CC">Editar</td>
    <td width="50" bgcolor="#0099CC">Borrar</td>
			<?php
			include("db.php");
			$cut_name="".$_GET['cut_name']."";
			$result=mysql_query("SELECT * FROM   WHERE cut_name LIKE '%".$cut_name."%' ORDER BY area_id DESC ");
			while($area = @mysql_fetch_array($result))
			{
				$area_id = $area['area_id'];
				$cut_name = $area['cut_name'];
				echo "<tr align='center'>";
				echo"<td><font color='black'>" .$area['cut_name']."</font></td>";
				echo"<td><font color='black'>" .$area['area_qrt_inch']."</font></td>";
				"<td><font color='black'>" .$area['area_sqrt_yard']."</font></td>";
				$yards=number_format($area['area_qrt_inch'],2);
				echo "<td><font color='black'>" .$yards/1296.."</font></td>";
				echo "<td> <a href ='view.php?area_id=$area_id'>Edit</a>";
				echo"<td> <a href ='del.php?area_id=$area_id'><center>Delete</center></a>";
				echo "</tr>";
			}  mysql_close($conn);	?>
</table>
</p><form><input class="inspc" type="button" value=" Imprimir pagina "onclick="window.print();return false;" /></form></p>
</body>
</html>
-->

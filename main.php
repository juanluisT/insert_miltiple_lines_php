<? include'conexion.php';
 //////////////////////////////////////////////////////////////
 if(isset($_POST["Edited"])) {
  "Date: ".$date=$_POST["date_edit"];  "<br>";
  "orden: ".$orden=$_POST["orden"];  "<br>";
  "fabric: ".$fabric=$_POST["fabric"];  "<br>";
  "color: ".$color=$_POST["color"];  "<br>";
  "yards: ".$yards=$_POST["yards"];  "<br>";
   "product: ".$product=$_POST["product"];  "<br>";
  "item_: ".$item_=$_POST["item_"];  "<br>";
 "qty: ".$qty=$_POST["qty"];  "<br>";
 "mps: ".$mps=$_POST["mps"];  "<br>";
 "fecha_ide: ".$fecha_ide=$_POST["fecha_ide"];  "<br>";
 "fecha_limit: ".$fecha_limit=$_POST["fecha_limit"];  "<br>";
 "inserted_by : ".$inserted_by=$_POST["inserted_by"];  "<br>";
 "inserted_from: ".$inserted_from=$_SERVER["REMOTE_ADDR"];   "<br>";
  "inserted_from: ".$vendor=$_POST["vendor"];   "<br>"; ///.' PC->: '.gethostbyaddr($_SERVER["REMOTE_ADDR"])
 "\n".$id=$_POST['id'];
$Updatesql = "UPDATE external_mat SET   date='$date',orden='$orden',fabric='$fabric',color='$color',yards='$yards',mps='$mps',fecha_ide='$fecha_ide',fecha_limit='$fecha_limit' WHERE id = '$id'" ;
mysql_select_db($database_my, $conn);
$Result1 = mysql_query($Updatesql, $conn) or die (mysql_error());
echo (mysql_error());
         }   
if(isset($_POST["Deleted"])) {
         $deleted='1';
 "\n".$id=$_POST['id'];
$Deletesql = "UPDATE external_mat SET deleted = 1 WHERE id = ".$id." " ;
mysql_select_db($database_my, $conn);
$Result1 = mysql_query($Deletesql, $conn) or die (mysql_error());
echo (mysql_error());
         }    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Main</title>
<link href="/extras/bootstraptable/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="app/views/default/css/estilo.css"/>
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;
            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";
            //Print Page
            window.print();
            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
    </script>
</head>
<body>
<div id="wrapper">
<div id="cuerpo" align="center"/>
<? include 'header.php'; ?>
<div class="table-responsive">
    <?  if(!isset($_POST['Delete'])) { ?> 
         <?  if(!isset($_POST['Edit'])) { ?> 
 <div id="printablediv" style="width: 100%; background-color: ; height: 200px"> 
 <div class="panel panel-default">
  <div class="panel-body">
  </div>
</div>
<table width="60%" border="0" class="table table-striped table-bordered table-condensed">
 <thead>
  <tr><form name="" method="POST" action="" class="well form-inline"/>   
     <th  align="center" bgcolor="#FF6600" colspan="1" >
         <img src="/extras/ico/dracilogo_Tranparent.png" title="Draci sports de Mexico" width="120" height="20" >
         <div class="input-prepend">
    <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
  <input type="text" class="input-small" name="date1" id="date1" style="width: 90px"
  value="<?
  if (isset($_POST['date1'])) {
       echo $_POST['date1'];
       }
  else
  { echo date('Y-m-d', strtotime("Last Monday"))
  ;}?>"/>
</div>
  </th>
 <th  align="center" bgcolor="#FF6600" colspan="1" >
 <div class="input-prepend">
    <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15"> 
        <i class=""></i></span>
  <input type="text" class="input-small" id="date2"  name="date2" style="width: 90px" 
  value="<?
  if (isset($_POST['date2'])) {
       echo $_POST['date2'];
       }
  else
  { echo date('Y-m-d')
  ;}?>"/>
  </th>
 <th  align="center" bgcolor="#FF6600" colspan="1" >
      <div class="input-prepend">
    <span class="add-on"><img src="glyphicons/png/.png" width="15" height="15"> 
        <i class=""></i></span>
     <input name="orden" type="number"  class="input-small"  style="width: 80px" placeholder="Orden"/>
     </div>
     </th>
<th  align="center" bgcolor="#FF6600" colspan="6">
	      <div class="input-prepen input-append">
	 <input name="vendor" type="text" class="input-small" style="width: 80px" placeholder="Vendor" />
    <button type="submit" class="btn">Buscar</button> 
  
 <button  class="btn btn-info "  />||| </button>
        
<button type="submit" class="btn btn-warning"  onclick="javascript:printDiv('printablediv')"> 
	    <img src="glyphicons/icon-print.png" width="15" height="20"  /></button>
	</div>    	    
	    </th>
	 </thead>
  <tbody>
	<tr>
<!--<th scope="col" bgcolor="#0099CC">Fecha</th>-->
    <th scope="col" bgcolor="#0099CC">Orden</th>
	<th scope="col" bgcolor="#0099CC">Fabric</th>
	<th scope="col" bgcolor="#0099CC">Color</th>
	<th scope="col" bgcolor="#0099CC">Yards</th>
<!--<th scope="col" bgcolor="#0099CC">Total</th>
	<th scope="col" bgcolor="#0099CC">Total</th>
	<th scope="col" bgcolor="#0099CC">ITEM</th>
    <th scope="col" bgcolor="#0099CC">Qty</th>-->
    <th scope="col" bgcolor="#0099CC">MPS</th>
	<th scope="col" bgcolor="#0099CC">Fecha Ideal</th>
    <th scope="col" bgcolor="#0099CC">Fecha Limite</th>
    <th scope="col" bgcolor="#0099CC">Edit</th>
    <th scope="col" bgcolor="#0099CC">Delete</th>
    </tr>
<?php
     "rden: ".$orden="".$_POST['orden']."";
	 "vendor: ".$vendor="".$_POST['vendor']."";
              $date1=$_POST['date1'];
              $date2=$_POST['date2'];
	$result=mysql_query("SELECT * FROM  external_mat WHERE date BETWEEN '".$date1."' AND '".$date2."' AND deleted = 0 AND orden LIKE '%".$orden."%' AND vendor LIKE '%".$vendor."%' ORDER by id"); ///    AND vendor LIKE '%".$vendor."%'
    while($res = @mysql_fetch_array($result))	{ ?>
<!--<td><?=$res['date'];?> </td>-->
    <td><?=$res['orden'];?></td>
<!--<td><?=$res['total'];?></td>-->
	<td><?=$res['fabric'];?></td>
	<td><?=$res['color'];?></td>
	<td><?=$res['yards'];?></td>
<!--<td><?=$res['item_'];?> </td>
    <td><?=$res['qty'];?></td>-->
    <td><?=$res['mps'];?> </td>
    <td><?=$res['fecha_ide'];?></td>
    <td><?=$res['fecha_limit'];?> </td>
    <td width="50px">
    <form method="POST" >
      <input type="hidden" value="<?=$res['id'];?>" name="id" />
      <input type="hidden" value="<?=$_POST['date1'];?>" name="date1" />
      <input type="hidden" value="<?=$_POST['date2'];?>" name="date2" />
      <button type="submit" name="Edit" class="btn btn-success">
            <img src="glyphicons/icon-editalt.png" width="10" height="10"  />
</button>
</form>
    </td>

<td width="50px">
           <form method="POST" >
      <button type="submit" name="Delete" class="btn btn-danger"> 
         <input type="hidden" value="<?=$res['id'];?>" name="id" />
    <img src="glyphicons/icon-trash.png" width="10" height="10" />
     </button>
     </form>
    </td>
 
  </tr>
 <?  } ?>

	<th scope="row">Total</th>
    <td align="center"></td>
	<th scope="row"></th>
	<th scope="row" class="danger"><?php
			$result=mysql_query("SELECT SUM(qty),SUM(yards) FROM  external_mat WHERE date BETWEEN '".$date1."' AND '".$date2."' AND deleted = 0  AND orden LIKE  '%".$orden."%' AND vendor LIKE '%".$vendor."%'  GROUP by deleted"); /// WHERE date LIKE '%".$date."%'
			while($qty = @mysql_fetch_array($result))	{ ?>
			<?=number_format($qty['SUM(yards)'],2,",","."); } ?></th>
	<td align="center"></td>
	<td></td>
	<td></td>
	<th scope="row"></th>
	<th scope="row"></th>
 </table>
 <table width="100%" class="table">
	<tr>
	<th scope="row" colspan="3">Entregado: __________________</th>
		<th scope="row"></th>
    <th align="center" colspan="3">Recibido: __________________</th>
    <th scope="row"></th>
    <th scope="row"></th>
<tr/>
    <th scope="row"></th>
    <th scope="row"></th>
    <th scope="row"></th>
    <th scope="row"></th>
    <th scope="row" colspan="3">Autorizado por : __________________</th>
    <th scope="row"></th>
    <th scope="row"></th>
  <tr/>
	<th scope="row">Fecha</th>
    <th align="center"><?=date('Y-m-d');?></th>
	<th scope="row"></th>
		<th scope="row"></th>
    <th align="center">Fecha</th>
	<th scope="row"><?=date('Y-m-d');?></th>
	<th scope="row"></th>
	<th scope="row"></th>
	<th scope="row"></th>
  <tr>
</table>
<? } } ?>
</div>

<div id="footer">
 
</div>


<!-----************************************************************************--------->
<?  if(isset($_POST['Edit'])) { ?> 
    
<div class="table-responsive">
<table width="60%" border="1" class="table table-striped table-bordered table-condensed"  style="border-radius: 15px;">
 <thead>
  <tr>
  <th scope="col" bgcolor="yellow" colspan="10">Edit </th>
     </thead>
  <tbody>
    <tr>
    <th scope="col" bgcolor="#0099CC">Fecha</th>
    <th scope="col" bgcolor="#0099CC">Orden</th>
    <th scope="col" bgcolor="#0099CC">Fabric</th>
    <th scope="col" bgcolor="#0099CC">Color</th>
    <th scope="col" bgcolor="#0099CC">Yards</th>
    <!--
    <th scope="col" bgcolor="#0099CC">Total</th>
    <th scope="col" bgcolor="#0099CC">Total</th>
    <th scope="col" bgcolor="#0099CC">ITEM</th>
    <th scope="col" bgcolor="#0099CC">Qty</th>-->
    <th scope="col" bgcolor="#0099CC">MPS</th>
    <th scope="col" bgcolor="#0099CC">Fecha Ideal</th>
    <th scope="col" bgcolor="#0099CC">Fecha Limite</th>
    </tr>
  <tr>
 <? $id = $_POST['id'];?>
 <form name="form" method="POST" action="" />
 <?php  $result=mysql_query("SELECT * FROM  external_mat where id='$id' "); ///  
    while($res = @mysql_fetch_array($result))   { ?>   
   <input type="hidden" value="<?=$res['id'];?>" name="id" />
        <td>
            <div class="input-prepend input-group">
 <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
        <input type='text' name='date_edit' id="date_edit" value="<?= date('Y-m-d');?>" class="input-small" />
        </div></td>
    <td><input type='text' name='orden' value="<?=$res['orden'];?>" class="input-small"/></td
    <td><input type='text' name='fabric' id="fabric" value="<?=$res['fabric'];?>" class="input-small" /></td>
    <td><input type='text' name='color' id="color" value="<?=$res['color'];?>"  class="input-small" /> </td>
    <td><input type='text' name='yards' id="yards" value="<?=$res['yards'];?>" title="0" onblur="calcVals(this.title,this.value);"  class="input-small"/></td>
    <td><div class="input-prepend input-group">
 <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
            <input type='text' name='mps' id="mps" value="<?=$res['mps'];?>"  class="input-small" /> </td>
    <td><div class="input-prepend input-group">
            <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
            <input type='text' name='fecha_ide' id="fecha_ide" value="<?=$res['fecha_ide'];?>" class="input-small" />
            </div></td> <td>
        <div class="input-prepend input-group">
 <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
            <input type='text' name='fecha_limit' id="fecha_limit" value="<?=$res['fecha_limit'];?> " class="input-small" />
            </div>
    </td>
  </tr>
  <? } ?>
    <tr>
     <tr>
    <td colspan="10" bgcolor="#FF6600" align="center"> 
      <input type="hidden" value="<?=$_POST['date1'];?>" name="date1" />
      <input type="hidden" value="<?=$_POST['date2'];?>" name="date2" />
        <button type="submit" name="Edited" class="btn btn-mini btn-primary">Guardar</button>
        </form>
        <a href="<?=$_SEVER['PHP_SELF'];?>">
     <button type="submit" name="submit" class="btn btn-mini btn-danger">Cancelar</button>
     </a>
     </td>

</table>
<? } ?>

<!-----************************************************************************--------->
<? if(isset($_POST['Delete'])) { ?> 
<div class="table-responsive">
<table width="60%" border="1" class="table table-striped table-bordered table-condensed"  style="border-radius: 15px;">
 <thead>
  <tr>
  <th scope="col" bgcolor="red" colspan="7">Delete </th>
     </thead>
  <tbody>
    <tr>
<!--<th scope="col" bgcolor="#0099CC">Fecha</th>-->
    <th scope="col" bgcolor="#0099CC">Orden</th>
    <th scope="col" bgcolor="#0099CC">Fabric</th>
    <th scope="col" bgcolor="#0099CC">Color</th>
    <th scope="col" bgcolor="#0099CC">Yards</th>
    <!--
    <th scope="col" bgcolor="#0099CC">Total</th>
    <th scope="col" bgcolor="#0099CC">Total</th>
    <th scope="col" bgcolor="#0099CC">ITEM</th>
    <th scope="col" bgcolor="#0099CC">Qty</th>-->
    <th scope="col" bgcolor="#0099CC">MPS</th>
    <th scope="col" bgcolor="#0099CC">Fecha Ideal</th>
    <th scope="col" bgcolor="#0099CC">Fecha Limite</th>

    </tr>
  <tr>
     <? $id = $_POST['id'];?>
 <?php  $result=mysql_query("SELECT * FROM  external_mat where id='$id' "); ///  
    while($res = @mysql_fetch_array($result))   { ?> 
    <!--<td><?=$res['date'];?> </td>-->
    <td><?=$res['orden'];?></td>
    <!--<td><?=$res['total'];?></td>-->
    <td><?=$res['fabric'];?></td>
    <td><?=$res['color'];?></td>
    <td><?=$res['yards'];?></td>
<!--<td><?=$res['item_'];?> </td>
    <td><?=$res['qty'];?></td>-->
    <td><?=$res['mps'];?> </td>
    <td><?=$res['fecha_ide'];?></td>
    <td><?=$res['fecha_limit'];?> </td>
    
  </tr>
  <? } ?>
  
    </td>
  </tr>
    <tr>
     <tr>
    <td colspan="7" bgcolor="#FF6600" align="center"> Confima que quiere borrar
         <form name="form1" method="POST" action="" />
          <input type="hidden" value="<?=$_POST['id'];?>" name="id" />
        <button type="submit" name="Deleted" class="btn btn-mini btn-warning">Borrar</button>
        
        O
        <a href="<?=$_SEVER['PHP_SELF'];?>">
     <button type="submit" name="submit" class="btn btn-mini btn-danger">Cancelar</button>
     </form>
     </a>
     </td>
   
</table>
<? } ?>



</body>
</html>

<!-------------date pickers-------------------->
<link rel="stylesheet" href="/extras/bootstraptable/bootstrap-datepicker-master/css/datepicker.css">
<!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="/extras/bootstraptable/bootstrap-datepicker-master/js/jquery-1.9.1.min.js"></script>
        <script src="/extras/bootstraptable/bootstrap-datepicker-master/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#date1').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#date2').datepicker({
                    format: "yyyy-mm-dd"
                });
                                
                $('#mps').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#fecha_limit').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#fecha_ide').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#date_edit').datepicker({
                    format: "yyyy-mm-dd"
                });
                
            });
        </script>
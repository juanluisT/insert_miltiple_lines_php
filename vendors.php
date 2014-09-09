<? include 'conexion.php';
	if(isset($_POST["submit"])) { ///header("Location: index.php");}
// obtenemos cada uno de los datos
 "Date: ".$name=$_POST["name"]; "<br>";
 "location: ".$location=$_POST["location"];  "<br>";
 "inserted_by : ".$inserted_by=$_POST["inserted_by"];  "<br>";
 "inserted_from: ".$inserted_from=$_SERVER["REMOTE_ADDR"];  "<br>"; ///.' PC->: '.gethostbyaddr($_SERVER["REMOTE_ADDR"])
// se insertan los datos
$insertSQL="INSERT INTO vendors(name,location,inserted_by,inserted_from) 
VALUES('$name','$location','$inserted_by','$inserted_from')";
$Result1 = mysql_query($insertSQL, $conn) or die (mysql_error());
echo (mysql_error()); //header("Location: index.php");/// se hace un retorno a la pagina de inicio 
 } 
 //////////////////////////////////////////////////////////////
 if(isset($_POST["Edited"])) {
         "\n".$name=$_POST['name'];
 "\n".$location=$_POST['location'];
 "\n".$id=$_POST['id'];
$Updatesql = "UPDATE vendors SET name='$name',location='$location' WHERE id = '$id'" ;
$Result1 = mysql_query($Updatesql, $conn) or die (mysql_error());
echo (mysql_error());
         }
     
if(isset($_POST["Deleted"])) {
         $deleted='1';
 "\n".$id=$_POST['id'];
$Deletesql = "DELETE from vendors WHERE id = '$id' " ;

$Result1 = mysql_query($Deletesql, $conn) or die (mysql_error());
echo (mysql_error());    }   ?>
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
</head>
<body>
<div id="wrapper">
<div id="cuerpo" align="center"/>
<? include 'header.php'; ?>
<? if(!isset($_POST['Agregar']) || (!isset($_POST['Edit']) || (!isset($_POST['Delete'])))) { ?> 
<div class="table-responsive">
<table width="60%" border="0" class="table table-striped table-bordered table-condensed" >
 <thead>
 	<tr>
   <th scope="col" bgcolor="#FF6600" colspan="4">
   	<form method="POST" >
   	<button type="submit" name="Agregar" class="btn btn-success">Agregar</button>
   	</form>
   	</th>
  <tbody>
	<tr>
    <th scope="col" bgcolor="#0099CC">NAme</th>
    <th scope="col" bgcolor="#0099CC">Locations</th>
	<th scope="col" bgcolor="#0099CC">Edit</th>
	<th scope="col" bgcolor="#0099CC">Delete</th>
    </tr>
  <tr>
<?php  $result=mysql_query("SELECT * FROM  vendors  ORDER BY id"); ///  
    while($res = @mysql_fetch_array($result))	{ ?>
    	<tr>
    <td><?=$res['name'];?></td>
	<td><?=$res['location'];?></td>
	<td width="50px">
    <form method="POST" >
       <button type="submit" name="Edit" class="btn btn-success">
 <img src="glyphicons/icon-editalt.png" width="10" height="10"  />
      <input type="hidden" value="<?=$res['id'];?>" name="id" />
</button>
</form>
	</td>
	</div>
<td width="50px">
	       <form method="POST" >
  <button type="submit" name="Delete" class="btn btn-danger">
  <img src="glyphicons/icon-trash.png" width="10" height="10"  />
  <input type="hidden" value="<?=$res['id'];?>" name="id" />
	 </button>
	 </form>
	</td>
	</div>
	</td>
  </tr>
	</td>
  </tr>
    <tr>
<?  } ?>
	<th scope="row">Total : <?php
   $result=mysql_query("SELECT COUNT(name) FROM  vendors  "); ///  
    while($res = @mysql_fetch_array($result))	{ ?>
    	<?=$res['COUNT(name)'];?> <?  } ?></th>
  <? //mysql_close($conn); ?>
</table>
</div>
<!-----************************************************************************--------->
<? } if(isset($_POST['Agregar'])) { ?> 
<div class="table-responsive">
<table width="60%" border="1" class="table table-striped table-bordered table-condensed"  style="border-radius: 15px;">
 <thead>
  <tr>
  <th scope="col" bgcolor="green" colspan="2">Agregar Vendors</th>
	 </thead>
  <tbody>
	<tr>
 <th scope="col" bgcolor="#0099CC">Name</th>
    <th scope="col" bgcolor="#0099CC">Locations</th>
    </tr>
  <tr>
 <form name="form1" method="POST" action="" />
    <td><input type='text' name='name'   /> </td>
    <td><input type='text' name='location'/></td>
	</td>
  </tr>
    <tr>
     <tr>
	<td align="center"> 
	    <button type="submit" name="submit" class="btn btn-mini btn-primary">Guardar</button>
	    </form>
	    <a href="<?=$_SEVER['PHP_SELF'];?>">
	 <button type="submit" name="submit" class="btn btn-mini btn-danger">Cancelar</button>
	 </a>
	 </td>
	<td></td>
</table>
<? } ?>

<!-----************************************************************************--------->
<?  if(isset($_POST['Edit'])) { ?> 
    
<div class="table-responsive">
<table width="60%" border="1" class="table table-striped table-bordered table-condensed"  style="border-radius: 15px;">
 <thead>
  <tr>
  <th scope="col" bgcolor="yellow" colspan="2">Edit Vendors</th>
     </thead>
  <tbody>
    <tr>
 <th scope="col" bgcolor="#0099CC">Name</th>
    <th scope="col" bgcolor="#0099CC">Locations</th>
    </tr>
  <tr>
 <? $id = $_POST['id'];?>
 <form name="form1" method="POST" action="" />
 <?php  $result=mysql_query("SELECT * FROM  vendors where id='$id' "); ///  
    while($res = @mysql_fetch_array($result))   { ?>
        
    <td> <input type="hidden" value="<?=$res['id'];?>" name="id" /><input type='text' name='name' value="<?=$res['name'];?>"/> </td>
    <td><input type='text' name='location' value="<?=$res['location'];?>"/></td>
  </tr>
  <? } ?>
    <tr>
     <tr>
    <td  bgcolor="#FF6600" align="center"> 
        <button type="submit" name="Edited" class="btn btn-mini btn-primary">Guardar</button>
        </form>
        <a href="<?=$_SEVER['PHP_SELF'];?>">
     <button type="submit" name="submit" class="btn btn-mini btn-danger">Cancelar</button>
     </a>
     </td>
    <td  bgcolor="#FF6600"></td>
</table>
<? } ?>
<!-----************************************************************************--------->
<? if(isset($_POST['Delete'])) { ?> 
<div class="table-responsive">
<table width="60%" border="1" class="table table-striped table-bordered table-condensed"  style="border-radius: 15px;">
 <thead>
  <tr>
  <th scope="col" bgcolor="red" colspan="2">Delete Vendors</th>
     </thead>
  <tbody>
    <tr>
 <th scope="col" bgcolor="#0099CC">Name</th>
    <th scope="col" bgcolor="#0099CC">Locations</th>
    </tr>
  <tr>
 <form name="form1" method="POST" action="" />
    <? $id = $_POST['id'];?>
 <form name="form1" method="POST" action="" />
 <?php  $result=mysql_query("SELECT * FROM  vendors where id='$id' "); ///  
    while($res = @mysql_fetch_array($result))   { ?>
    <td> <input type="hidden" value="<?=$res['id'];?>" name="id" />
        <?=$res['name'];?> </td>
    <td "><?=$res['location'];?></td>
  </tr>
  <? } ?>
    </td>
  </tr>
    <tr>
     <tr>
    <td  bgcolor="#FF6600" align="center"> Confima que quiere borrar
        <button type="submit" name="Deleted" class="btn btn-mini btn-warning">Borrar</button>
        </form>
        O
        <a href="<?=$_SEVER['PHP_SELF'];?>">
     <button type="submit" name="submit" class="btn btn-mini btn-danger">Cancelar</button>
     </a>
     </td>
    <td  bgcolor="#FF6600"></td>
</table>
<? } ?>
 <? mysql_close($conn); ?>
</body>
</html>

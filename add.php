<?  if(isset($_POST["submit"])) { ///header("Location: index.php");}
 include 'conexion.php';
if( isset( $_POST["submit"] ) ) // se envio el formulario?
//echo "valTotal: ".$valTotal=$_POST["valTotal"];echo "<br>";
for($x =1 ; $x <= $_POST['cantidad'] ; $x++) // recorremos 10 posibles registros, puedes poner los que necesites
// se recuperan cada uno de los datos del form siempre y cuando se hayan enviado, de lo contrario los omite
if(!empty($_POST["orden".$x ])){
if(isset($_POST["opcStatus".$x])) // se envio el registro opcStatus1, opcStatus2, ... etc. ?
{
// obtenemos cada uno de los datos
  "Date: ".$date=$_POST["date".$x ];  "<br>";
  "orden: ".$orden=$_POST["orden".$x ];  "<br>";
  "fabric: ".$fabric=$_POST["fabric".$x ];  "<br>";
  "color: ".$color=$_POST["color".$x ];  "<br>";
  "yards: ".$yards=$_POST["yards".$x ];  "<br>";

   "product: ".$product=$_POST["product".$x ];  "<br>";
  "item_: ".$item_=$_POST["item_".$x ];  "<br>";
 "qty: ".$qty=$_POST["qty".$x ];  "<br>";

 "mps: ".$mps=$_POST["mps".$x ];  "<br>";
 "fecha_ide: ".$fecha_ide=$_POST["fecha_ide".$x ];  "<br>";
 "fecha_limit: ".$fecha_limit=$_POST["fecha_limit".$x ];  "<br>";
 "inserted_by : ".$inserted_by=$_POST["inserted_by".$x ];  "<br>";
 "inserted_from: ".$inserted_from=$_SERVER["REMOTE_ADDR".$x];   "<br>";
  "inserted_from: ".$vendor=$_POST["vendor".$x];   "<br>"; ///.' PC->: '.gethostbyaddr($_SERVER["REMOTE_ADDR"])
// se insertan los datos
$insertSQL="INSERT INTO external_mat(date,orden,fabric,color,yards,product,item_,qty,mps,fecha_ide,fecha_limit,inserted_by,inserted_from,valTotal, vendor)
VALUES('$date','$orden','$fabric','$color','$yards','$product','$item_','$qty','$mps','$fecha_ide','$fecha_limit','$inserted_by','$inserted_from','$valTotal','$vendor')";
$Result1 = mysql_query($insertSQL, $conn) or die (mysql_error());
echo (mysql_error()); //header("Location: index.php");/// se hace un retorno a la pagina de inicio
 } }  }  require "../../../allowing.php";  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Vendors</title>
<link rel="stylesheet" type="text/css" href="/extras/bootstraptable/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="app/views/default/css/estilo.css"/>
<script >
    function formSubmit(formId) {
  var thisForm = document.getElementById(formId);
  if (thisForm) {
    thisForm.submit(); 
  }
}
</script>

</head>
<body>
<div id="wrapper">
<div id="cuerpo" align="center"/>

<? include 'header.php'; ?>

<div class="table-responsive">

<table width="60%" border="" class="table table-striped table-bordered table-condensed" >
 <thead>
  <tr>
        <form name="formId" id="formId" method="POST" action="" /> 
    <th scope="col" bgcolor="#FF6600" colspan="4"> 
<div class="input-prepend">
 <span class="add-on">#
 <i class=""></i></span>
        <input name="cantidad" type="number" placeholder="# de filas" class="input-small"/> 
	    <? include 'conexion.php';
$sql="SELECT * FROM vendors";
$result=mysql_query($sql);
$options="";
while ($row=mysql_fetch_array($result)) {
    $id=$row["id"];
    $name=$row["name"];
    $options.="<OPTION selected='selected' VALUE=\"$name\">".$name;}?>
<SELECT name="vendor"  class="input-small">
<OPTION ><?=$options?><option >N/A</option>
</SELECT>
	   </div>
	</th>
	         <th scope="col" bgcolor="#FF6600" colspan="1"></th>
         <th scope="col" bgcolor="#FF6600" colspan="1">
        <div class="input-prepend">
 <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
        <input type='text' name='mps' id="mps" value="<?= date('Y-m-d');?>" class="input-small" />
        </div></th>
                
         <th scope="col" bgcolor="#FF6600" colspan="1">
        <div class="input-prepend">
 <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
        <input type='text' name='fecha_ide' id="fecha_ide" value="<?= date('Y-m-d');?>" class="input-small" />
        </div></th>
                
         <th scope="col" bgcolor="#FF6600" colspan="1">
        <div class="input-prepend">
 <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
        <input type='text' name='fecha_limit' id="fecha_limit" value="<?= date('Y-m-d');?>" class="input-small" onchange="formSubmit('formId')"/>
 
 
            <button type="submit" class="btn btn-info">Filas</button>
            </form>
        </div>
        </th>

	 </thead>
  <tbody>
	<tr>
    <th scope="col" bgcolor="#0099CC">Fecha</th>
    <th scope="col" bgcolor="#0099CC">Orden</th>
    <th scope="col" bgcolor="#0099CC">Fabric</th>
	<th scope="col" bgcolor="#0099CC">Color</th>
    <th scope="col" bgcolor="#0099CC">Yardas</th>
    <!--
	<th scope="col" bgcolor="#0099CC">Total</th>
	<th scope="col" bgcolor="#0099CC">ITEM</th>
    <th scope="col" bgcolor="#0099CC">Qty</th>
    -->
    <th scope="col" bgcolor="#0099CC">MPS</th>
	<th scope="col" bgcolor="#0099CC">Fecha Ideal</th>
    <th scope="col" bgcolor="#0099CC">Fecha Limite</th>
    </tr>
  <tr>

 <form name="form1" method="POST" action="" />
 <? $cantidad=1; while($cantidad<=$_POST['cantidad']){ ?>
 <script type="text/javascript" language="javascript">
<!--
function calcVals(price,yards){
    var total = document.getElementById("valTotal");
    var currentTotal = total.value.replace('$','');
    var thisTotal = price + yards;
    var newTotal = eval(Number(currentTotal) + Number(thisTotal));
    total.value = newTotal;
}
</script>
    <td>
    	<div class="input-prepend input-group">
 <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
    	<input type='text' name='date<?=$cantidad?>' id="date<?=$cantidad?>" value="<?= date('Y-m-d');?>" class="input-small" />
    	</div></td>
    <td><input type='hidden' name='vendor<?=$cantidad?>' value="<?=$_POST['vendor']?>" class="input-small" />
        <input type='text' name='orden<?=$cantidad?>' class="input-small"/></td>

    <td><input type='text' name='fabric<?=$cantidad?>' id="fabric<?=$cantidad?>" class="input-small" /></td>
    <td><input type='text' name='color<?=$cantidad?>' id="color<?=$cantidad?>"  class="input-small" /> </td>
    <td><input type='text' name='yards<?=$cantidad?>' id="yards<?=$cantidad?>" title="0" onblur="calcVals(this.title,this.value);"  class="input-small"/></td>

	<input type='hidden' name='total<?=$cantidad?>' id="total<?=$cantidad?>" />
    <input type='hidden' name='item_<?=$cantidad?>' id="item_<?=$cantidad?>" />
    <input type='hidden' name='qty<?=$cantidad?>' id="qty<?=$cantidad?>" title="0" onblur="calcVals(this.title,this.value);" class="input-small" />

    <td><div class="input-prepend input-group">
 <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
    		<input type='text' name='mps<?=$cantidad?>' id="mps<?=$cantidad?>" value="<?=$_POST['mps']?>"  class="input-small" /> </td>
    <td>
    	<div class="input-prepend input-group">
    		<span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
    		<input type='text' name='fecha_ide<?=$cantidad?>' id="fecha_ide<?=$cantidad?>" value="<?=$_POST['fecha_ide']?>" class="input-small" />
    		</div></td>
    <td>
    	<div class="input-prepend input-group">
 <span class="add-on"><img src="glyphicons/png/calendar.png" width="15" height="15">
 <i class=""></i></span>
    		<input type='text' name='fecha_limit<?=$cantidad?>' id="fecha_limit<?=$cantidad?>" value="<?=$_POST['fecha_limit']?>" class="input-small" />
    		</div>

	<input name="opcStatus<?=$cantidad;?>" type="hidden">
	<input name="cantidad" type="hidden" id="cantidad" value="<? echo "$_POST[cantidad]"; ?>" class='input-small' />
	<input name="inserted_by<?=$cantidad?>" type="hidden" id="inserted_by<?=$cantidad?>" value="<?=$username?>" class="input-small" />

	</td>
  </tr>
    <tr>
     <tr>
         <!-------------date pickers-------------------->
<link rel="stylesheet" href="/extras/bootstraptable/bootstrap-datepicker-master/css/datepicker.css">
<!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="/extras/bootstraptable/bootstrap-datepicker-master/js/jquery-1.9.1.min.js"></script>
        <script src="/extras/bootstraptable/bootstrap-datepicker-master/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#date1<?=$cantidad?>').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#date2<?=$cantidad?>').datepicker({
                    format: "yyyy-mm-dd"
                });
                
                $('#mps<?=$cantidad?>').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#fecha_limit<?=$cantidad?>').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#fecha_ide<?=$cantidad?>').datepicker({
                    format: "yyyy-mm-dd"
                });
            });
        </script>
  <? $cantidad++; } ?>
	<td ></td>
    <td ></td>
	<td ></td>
	<td >Total</td>
	<td  align="center"><input type="text"  name="valTotal" id="valTotal"  style="border:0px;" class="input-small" readonly/></td>
	<td > <button type="submit" name="submit" class="btn btn-primary">Guardar</button></td>
	<td></td>
	<td></td>
	</tbody>
</form>

</table>
</div>
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
                
                $('#mps').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#fecha_limit').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#fecha_ide').datepicker({
                    format: "yyyy-mm-dd"
                });
            });
        </script>

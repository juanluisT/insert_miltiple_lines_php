<div class="t"><?php echo $titulo; ?></div>		
    <table border="0" cellspacing="3" cellpadding="0" class="tabla" width="100%">
		 <tr>
	    	<th>date</th>
	    	<th>orden</th>
	    	<th>product </th>
	    	<th>item_  </th>
		    <th>qty</th>
			<th>mps</th>
			<th>fecha_ide</th>
			<th>fecha_limit</th>
			<th>Note</th>
			<th>Vendor</th>
		  </tr>
	   <?php foreach ($busqueda_Array as $data): ?>		
	   <tr>
	       <td><?php  echo $data['date'];?></td>
		    <td><?php echo $data['orden'];?></td>
		    <td><?php echo $data['product'];?></td>
	       <td><?php echo $data['item_'];?></td>
	       <td><?php echo $data['qty'];?></td>
		   <td><?php echo $data['mps'];?></td>
		     <td><?php echo $data['fecha_ide'];?></td>
		     <td><?php echo $data['fecha_limit'];?></td>
		    <td><?php echo $data['notes'];?></td>
			<td><?php echo $data['vendor'];?></td>
			<td><a href="index.php?delete&id=<?=$data['id'];?>" >edit</a>a</td>
			<td> delete</td>
			 <tr>
		
	   </tr>
	   <?php endforeach; ?>
	   <td></td>
	   	 <td>Entregado</td>
		  <td><?php echo "Engineer ".$data['Engineer'];?></td>
		    <td></td>
			  <td></td>
			    <td></td>
		 <td>Recivido</td>
		  <td><?php echo "Engineer ".$data['vendor'];?></td>
				
		  <tr>
		  <td></td>
		  <td>Fecha</td>
		  <td><?php echo $data['date'];?></td>
		  	    <td></td>
			  <td></td>
			    <td></td>
		 <td>Fecha</td>
		  <td><?php echo $data['date'];?></td>
		  <tr>
		    <td></td>
		   <td><?php $data['SUM(qty)'];?>Total</td>
		    <td></td>
			    <td></td>
		    <td><?php echo $data['SUM(qty)'];?></td>
			 <td></td>

	</table>		   
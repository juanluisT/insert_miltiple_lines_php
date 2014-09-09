<div class="t"><?php echo $titulo; ?></div>		
    <table border="0" cellspacing="3" cellpadding="0" class="tabla" width="100%">
		 <tr>

			<th>Vendor</th>
		  </tr>
	   <?php foreach ($vend_Array as $data): ?>		
	   <tr>
			<td><?php echo $data['vendor'];?></td>
			<td><a href="index.php?delete&id=<?=$data['id'];?>" >edit</a></td>
			<td> delete</td>
			 <tr>
			 <?php endforeach; ?>
		<!--
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
-->
	</table>		   


<html>
	<table>
		<tr>
			<td>User id</td>
			<td>Username</td>
			<td>Email</td>
		</tr>
		<?php foreach($export as $row){?>
		<tr>
			<td><?php echo $row->id;?></td>
			<td><?php echo $row->username;?></td>
			<td><?php echo $row->email;?></td>
			
		</tr>
		<?php };?>
	</table>
</html>



<?php 
$file="UserList(excel)".date('Y-m-d H:i:s').".xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
header("Pragma: ");
header("Cache-Control: ");
?>
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

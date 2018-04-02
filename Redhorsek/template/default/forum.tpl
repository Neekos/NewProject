<div class="container">
	<div class="row">
		<?php
		global $db;
		$tbl_name="fquestions"; // Table name 
		$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
		// OREDER BY id DESC is order result by descending
		$result=mysqli_query($db,$sql);
		?>

	<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<td width="6%" align="center" bgcolor="#E6E6E6"><strong> №</strong></td>
			<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
			<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
			<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
			<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
		</tr>

	<?php
	// Start looping table row
	while($rows = mysqli_fetch_array($result)){
	?>
		<tr>
			<td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
			<td bgcolor="#FFFFFF"><a href="?action=view_topic&id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
		</tr>

	<?php
	// Exit looping and close connection 
	}
	mysqli_close($db);
	?>

		<tr>
			<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="?action=new_topic"><strong>Create New Topic</strong> </a></td>
		</tr>
	</table>
	</div>
</div>
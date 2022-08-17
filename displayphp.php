<?php
//dispalyphp.php
	$connect = mysqli_connect("localhost", "root", "", "project3ajax");
	$output = '';
	$query = "SELECT * FROM records";
	$result = mysqli_query($connect, $query);
	$output = '
		<h1>Database Records</h1>
		<table class="displaytable">
		 <tr>
		  <th>S.No.</th>
		  <th>Name</th>
		  <th>Email</th>
		  <th>Age</th>
		  <th>Action</th>
		 </tr>
	';
	$count = 1;
	while($row = mysqli_fetch_array($result))
	{
		$id = $row["id"];
	 $output .= '
		<tr>
			<td>'.$count++.'</td>
			<td id=\'name'.$id.'\'>'.$row["name"].'</td>
			<td id=\'email'.$id.'\'>'.$row["email"].'</td>
			<td id=\'age'.$id.'\'>'.$row["age"].'</td>
			<td><span id=\'editupdate'.$id.'\'><input type=\'button\' id=\'ed'.$id.'\' onClick=\'reply_edit(this.id)\' value=\'Edit\'></span>
			<input type=\'button\' id=\'del'.$id.'\' onClick=\'reply_del(this.id)\' value=\'Delete\'></td>
		</tr>
	 ';
	}
	$output .= '</table>';
	echo $output;
?>
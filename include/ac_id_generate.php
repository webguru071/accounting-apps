<?php 
if (isset($_POST['data']))
	{
		include '../db_connect.php';
		$id =0;
		$query = "SELECT max(code) FROM ac_list " ;
		$exe = mysqli_query($conn,$query);
		while($row  = mysqli_fetch_array($exe))
		{
			$id = $row[0];
		}
		echo $id+1;
		exit();
	}

?>
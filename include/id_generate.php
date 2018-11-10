<?php 
if (isset($_POST['data']))
	{
		include '../db_connect.php';
		$id ='';
		$query = "SELECT max(inv_id) FROM sale_invoice " ;
		$exe = mysqli_query($conn,$query);
		while($row  = mysqli_fetch_array($exe))
		{
			$id = $row[0];
		}
		if ($id == '') {
			$id = date('Ym').'0';
		}
		echo $id+1;
		exit();
	}

?>
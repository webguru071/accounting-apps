
<!--DELETE FROM INDEX JOURNAL -->
<?php 
if (isset($_GET['index'])) {
	{
		include '../db_connect.php';
		$id=$_GET['index'];

		$qq = "DELETE  FROM journal WHERE id='$id' " ;
		$b22=mysqli_query($conn,$qq);
		if($b22>0)
		{
		 header('location:../index.php');
		}
	}
}
?>
<!--DELETE FROM INDEX JOURNAL -->

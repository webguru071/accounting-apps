
<?php
if (isset($_POST["cd"])) 
{
	include '../db_connect.php' ;
	$title = $_POST['cd'];
	$pname ="";$type ="";
	$query = "SELECT code,type FROM ac_list WHERE title= '$title' " ;
	$exe = mysqli_query($conn,$query);
	while($row  = mysqli_fetch_array($exe))
	{
		$pname = $row[0];
		$type = $row[1];
	}
	echo $pname.",".$type;
    exit();
}
?>
<?php
if (isset($_POST["bcd"])) 
{
	include '../db_connect.php' ;
	$code = $_POST['bcd'];
	$pname ="";
	$query = "SELECT title FROM ac_list WHERE code= '$code' " ;
	$exe = mysqli_query($conn,$query);
	while($row  = mysqli_fetch_array($exe))
	{
		$pname = $row[0];
	}
	echo $pname;
    exit();
}
?>
<?php 
include '../db_connect.php';
if (isset($_POST['code'])) {
	$code = $_POST['code'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$type = $_POST['type'];

	$query ="INSERT INTO `ac_list` ( `date`, `code`,`title`,`type`) VALUES ( '$date', '$code', '$title', '$type');";
	$exe = mysqli_query($conn,$query);
	exit;
}

// add

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
	$id=0;
	$result = $conn->query("SELECT * FROM ac_list");
	while($row = $result->fetch_assoc()){
        $id++;
		?>
		<tr>
			<td><?php echo $id ?></td>
			<td><?php echo $row['title'] ?></td>
			<td><?php echo $row['code'] ?></td>
			<td><?php echo $row['type'] ?></td>
			<td><?php echo $row['date'] ?></td>
		</tr>
		<?php
	}
} else{

	header('Content-Type: application/json');

	$input = filter_input_array(INPUT_POST);



	if ($input['action'] == 'edit') {
		$conn->query("UPDATE ac_list SET  title='" . $input['title'] . "',type='" . $input['type'] . "' WHERE code='" . $input['id'] . "'");
	} 
	else if ($input['action'] == 'delete') {
		$conn->query("DELETE FROM ac_list WHERE code='" . $input['id'] . "'");
	} 

	mysqli_close($conn);

	echo json_encode($input);

}
?>


<?php 
include '../db_connect.php';
if(isset($_POST['search'])){
	$id=0;
	$search = $_POST['search'];
	$result = $conn->query("SELECT * FROM ac_list where title like '%$search%' or code like '%$search%' or type like '%$search%' or date like '%$search%'");
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


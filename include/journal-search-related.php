<?php 
include '../db_connect.php';
if(isset($_POST['search'])){
	$search = $_POST['search'];
	$queryn = "SELECT * from journal where title like '$search%' or reverse like '$search%' ";
              $exen = mysqli_query($conn,$queryn);
              $i = 0;
              While($rown=mysqli_fetch_array($exen)){
                $i++ ;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rown['date']; ?></td>
                  <td><?php echo $rown['code']; ?></td>
                  <td><?php echo $rown['title']; ?></td>
                  <td><?php echo $rown['debit']; ?></td>
                  <td><?php echo $rown['credit']; ?></td>
                  <td><?php echo $rown['description']; ?></td>
                  <td class="no-print"> <a href="include/delete.php?index=<?php echo $rown['id']; ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
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


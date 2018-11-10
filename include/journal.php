<?php 
include '../db_connect.php';
 
        if (isset($_POST['d_code'])) {

          $d_code = $_POST['d_code'];
          $c_code = $_POST['c_code'];
          $d_title = $_POST['d_title'];
          $c_title = $_POST['c_title'];
          $date = $_POST['date'];
          $d_amount = $_POST['d_amount'];
          $c_amount = $_POST['c_amount'];
          $d_type = $_POST['d_type'];
          $c_type = $_POST['c_type'];
          $description = $_POST['description'];

          $query1 = "insert into journal (date,code,title,debit,reverse,type,description)values('$date','$d_code','$d_title','$d_amount','$c_title','$d_type','$description')";
          $exe = mysqli_query($conn,$query1);

          $query2 = "insert into journal (date,code,title,credit,reverse,type,description)values('$date','$c_code','$c_title','$c_amount','$d_title','$c_type','$description')";
          $exe1 = mysqli_query($conn,$query2);
        }

// add
?>
<?php
include '../db_connect.php';
$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
	$queryn = "SELECT * from journal order by id desc";
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
} 
?>


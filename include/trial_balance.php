<?php 
if (isset($_POST["date1"])) 
{
  $date1 = $_POST['date1'];
  $date2 = $_POST['date2'];
	include '../db_connect.php' ;

  $i= 1;$sumd =0;$sumc =0;
    $query ="SELECT title,sum(debit),sum(credit),sum(debit-credit) from journal where date between '$date1' and '$date2' group by title ";
    $exe = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($exe)){
          $sumc +=$row[2];
          $sumd +=$row[1];
        ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row[0] ?></td>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
        </tr>
        <?php
    }
    ?>
    <tr>
      <th colspan="2"></th>
      <th >Debit: <?php echo $sumd ?> tk</th>
      <th >Credit: <?php echo $sumc ?> tk</th>
    </tr>
    <?php 
    if ($i == 1) 
    {
      ?><td colspan="5" style="color:red;font-size:18px;text-align: center;padding:15px">No Data Found</td><?php
    }
}
?>

<?php

include '../db_connect.php';

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $i= 1;$sumd =0;$sumc =0;
    $query ="SELECT title,sum(debit),sum(credit),sum(debit-credit) from journal group by title ";
    $exe = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($exe)){
          $sumc +=$row[2];
          $sumd +=$row[1];
        ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row[0] ?></td>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
        </tr>
        <?php
    }?><tr>
      <th colspan="2"></th>
      <th >Debit: <?php echo $sumd ?> tk</th>
      <th >Credit: <?php echo $sumc ?> tk</th>
    </tr><?php 
} 

?>


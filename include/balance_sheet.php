<?php 
if (isset($_POST["date1"])) 
{
  $date1 = $_POST['date1'];
  $date2 = $_POST['date2'];
	include '../db_connect.php' ;
  $i= 1;$dr =0;$cr =0;$balance =0;
    $query ="SELECT title,sum(debit) as dr,sum(credit) as cr ,sum(debit-credit) as balance from journal where type like '%b%' and date between '$date1' and '$date2' group by title ";
    $exe = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($exe)){
          $dr =$row[1];
          $cr =$row[2];

        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $row[0] ?></td>


        <?php 

        if ($dr > $cr){
          $temp= $dr - $cr;
          ?>
      <td><?php echo $temp ?></td>
            <td>0</td>
          <?php

        }else{
          $temp=$cr- $dr;
          ?>
      <td>0</td>
            <td><?php echo $temp ?></td>
          <?php
        }
        
          
        ?>
      
        </tr>
        <?php
    }
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
    $i= 1;$dr =0;$cr =0;$balance =0;
    $query ="SELECT title,sum(debit) as dr,sum(credit) as cr ,sum(debit-credit) as balance from journal where type like '%b%' group by title ";
    $exe = mysqli_query($conn,$query);
    // ###############
      $query_pl = "SELECT sum(debit-credit) as balance from journal where type like '%p%'";
      $exe_pl = mysqli_query($conn,$query_pl);
      $pl = 0;
      while($row = mysqli_fetch_array($exe_pl))
      {
        $pl = $row['balance'];
      }
    // ###############
    while($row = mysqli_fetch_array($exe)){
          $dr =$row[1];
          $cr =$row[2];

        ?>
        <tr>
        	<td><?php echo $i++ ?></td>
        	<td><?php echo $row[0] ?></td>


        <?php 

        if ($dr > $cr){
        	$temp= $dr - $cr;
        	?>
			    <td><?php echo $temp ?></td>
          <td>0</td>
        	<?php

        }else{
        	$temp=$cr- $dr;
        	?>
			    <td>0</td>
          <td><?php echo $temp ?></td>
        	<?php
        }
         
        ?>
			
        </tr>
        <?php
    }
    ?><tr>
      <?php 
          if($pl > 0){
            ?>
            <td>*</td>
            <td>Profit & Loss A/C Balance (Debit)</td>
            <td>0</td>
            <td><?php echo $pl; ?></td>
            <?php
          }
          else{
            ?>
            <td>*</td>
            <td>Profit & Loss A/C Balance (Credit)</td>
            <td><?php echo abs($pl); ?></td>
            <td>0</td>
            <?php
          }
      ?>
    </tr><?php
} 

?>


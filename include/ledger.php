<?php 
if (isset($_POST["code"])) 
{
  $code = $_POST['code'];
  $date1 = $_POST['date1'];
  $date2 = $_POST['date2'];
	include '../db_connect.php' ;
  $debit=0;$Credit=0;$title='';$sumd=0;$sumc=0;$balance=0;
  $queryff = "SELECT title FROM `journal` WHERE code = '$code'";
  $exeff = mysqli_query($conn,$queryff);
  $rowf=mysqli_fetch_array($exeff);
  $title=$rowf[0];
	$invoice ='<div class="table-responsive">
        <table id="tabledit" class="table table-hover table-bordered">
          <thead>
            <tr class="danger">
              <th class="no-print">
                <button class="btn btn-block no-print gc no-print"  onclick="window.print();"  ><i class="fa fa-print"></i>&nbsp;Print</button>
              </th>
              <th colspan="22" class="text-center">"'.$title.'" লেজার</th>
            </tr>
            <tr class="bg-info">
              <th width="60px">Sl</th>
              <th>Date</th>
              <th>Perpose</th>
              <th>Debit</th>
              <th>Credit</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody class="bg-warning">';

	
  $queryf = "SELECT title,sum(debit),sum(credit),reverse,date,description FROM `journal` WHERE code = '$code' and date between '$date1' and '$date2' GROUP by reverse";
  $exef = mysqli_query($conn,$queryf);$i=1;
  while($row=mysqli_fetch_array($exef)){
      $sumd = $sumd+$row[1];
      $sumc = $sumc+$row[2];
      $debit= $row[1];
      $credit= $row[2];
      if($debit > $credit){
        $temp= $debit-$credit;
        $balance +=$temp;
      }else{
        $temp= $credit-$debit;
        $balance -=$temp;
      }
      $reverse= $row[3];
      $date= $row[4];
      $Description= $row[5];

      $invoice .='<tr>
      <td>'.$i++.'</td>
      <td>'.$date.'</td>
      <td>'.$reverse.'</td>
      <td>'.$debit.'</td>
      <td>'.$credit.'</td>
      <td>'.$balance.'</td>
      </tr>';
  }
  
  $invoice .='<tr><th colspan="8" class="text-center">Balance:'.($sumd-$sumc).'</th></tr>'; 

  $invoice .='</tbody></table><p style="color:#fff;font-size:18px;text-align:center">Showing Results for '.$date1.' TO '.$date2.' </p></div>';
  echo $invoice;
  exit();
}
?>

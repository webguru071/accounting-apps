<?php
session_start();
$username=$_SESSION['username'];
if(!$_SESSION['username'])
{
	header('location:logout.php');
}
else{
	include 'db_connect.php' ;
	include 'header.php' ;
	?>
	<div class="container no-print">
    	<h2 class="heade-title">Ledger</h2>
 	</div>
	<div class="container no-print">
		<div class="row">
			<div class="col-sm-12 pull-center ">
				<form class="form-inline" action="#">
					<center>		
						<select class="form-control" id="title">
							<?php
							$q="select distinct title,code from journal order by title asc";
							$a=mysqli_query($conn,$q);
							while($row=mysqli_fetch_array($a))
							{

								 $name=$row['title'];
								?>


								<option value="<?php  echo $row['code']; ?>"><?php  echo $name; ?></option>
							<?php  }  ?>
						</select>
						<input type="date" class="form-control" id="date1" value="<?php echo date('Y-m-d') ?>">
						<label for="" class="form-control-label btn btn-default">TO</label>  
						<div class="input-group custom-search-form">
							<input type="date" class="form-control" id="date2" value="<?php echo date('Y-m-d') ?>">

							<span class="input-group-btn">
								<button class="btn btn-default" onclick="searchLedger();" type="button">
									<i>search</i>
								</button>
							</span>
						</div>
					</center>
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 result">
      
    		</div>
		</div>
	</div>
	<script>
	function searchLedger(){
		var code = $('#title').val();
		var date1 = $('#date1').val();
		var date2 = $('#date2').val();
		
		if(code != "" )
		{
			$.ajax({
				url:"include/ledger.php",
				method:"POST",
				data:{code:code,date1:date1,date2:date2},
				success:function(data){
					$('.result').html(data);
				},
				error:function(data){
					alert("Error Occured");
				}
			}); 
		}
		else
		{
			alert("EMPTY VALUE NOT ALLOWED");
		}
	}
	</script>
	<?php
	include 'footer.php' ;
}
?>

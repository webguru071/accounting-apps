
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
		<h2 class="heade-title">Balance Sheet</h2>

	</div>
	<div class="container no-print">
		<div class="row">
			<div class="col-sm-12 pull-center ">
				<form class="form-inline" action="#">
					<center>
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
				<div class="table-responsive">
					<table id="tabledit" class="table table-hover table-bordered">
						<thead>
							<tr class="success">
								<th colspan="2" class="text-left"></th>
								<th colspan="" class="center-block no-print"><button class="btn btn-block no-print gc no-print"  onclick="window.print();"  ><i class="fa fa-print"></i>&nbsp;Print</button></th>
								<th colspan="3" class="text-right"></th>
							</tr>
							<tr class="danger">
								<th colspan="22" class="text-center">Balance Sheet</th>
							</tr>
							
							<tr class="bg-info">
								<th width="60px">Sl</th>
								<th>Accounts</th>
								<th>Capital & Liabilities</th>
								<th>Assets & Property</th>
							</tr>
						</thead>
						<tbody class="bg-warning">
						</tbody>
					</table>
				</div>'
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			viewData();
		});
		function viewData(){

			$.ajax({
				url: 'include/balance_sheet.php?p=view',
				method: 'GET'
			}).done(function(data){
				$('tbody').html(data);
			})
		}
		function searchLedger(){
			var date1 = $('#date1').val();
			var date2 = $('#date2').val();
			$.ajax({
					url:"include/balance_sheet.php",
					method:"POST",
					data:{date1:date1,date2:date2},
					success:function(data){
						$('tbody').html(data);
					},
					error:function(data){
						alert("Error Occurred");
					}
				}); 
			}

	</script>
<?php
include 'footer.php' ;
}
?>

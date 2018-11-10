
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
		<h2 class="heade-title">Trial Balance</h2>
	</div>
	 <?php include 'search.php' ?> <!-- **SEARCH**-->
	<div class="container">
		<div class="row">
			<div class="col-md-12 result">
				<div class="table-responsive">
					<table id="tabledit" class="table table-hover table-bordered">
						<thead>
							<tr class="danger">
								<th class="no-print">
									<button class="btn btn-block no-print gc no-print"  onclick="window.print();"  ><i class="fa fa-print"></i>&nbsp;Print</button>
								</th>
								<th colspan="22" class="text-center">Trial Balance</th>
							</tr>
							<tr class="bg-info">
								<th width="60px">Sl</th>
								<th>Account</th>
								<th>Debit</th>
								<th>Credit</th>
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
				url: 'include/trial_balance.php?p=view',
				method: 'GET'
			}).done(function(data){
				$('tbody').html(data);
			})
		}
		function search(){
			var date1 = $('#date1').val();
			var date2 = $('#date2').val();
			$.ajax({
					url:"include/trial_balance.php",
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

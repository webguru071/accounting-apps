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
								<button class="btn btn-default" onclick="search();" type="button">
									<i>search</i>
								</button>
							</span>
						</div>
					</center>
				</form>
			</div>
		</div>
	</div>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/fonts.googleapis.com.css" />
	<link rel="stylesheet" href="css/ace.min.css" />
	<link rel="stylesheet" href="css/ace-rtl.min.css" />
</head>
<body class="login-layout">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container" method="post">
						<div class="center">
							<h1>	
								<span class="red">Account</span>
								<span class=""><i class="fa fa-leaf green" aria-hidden="true"></i></span>
								<span class="white" id="id-text2">Manager</span>
							</h1>
							<h4 class="blue" id="id-company-text">&copy; AND IT</h4>
						</div>
						<div class="space-6"></div>
						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="fa fa-coffee green"></i>
											User/Admin
										</h4>
										<div class="space-6"></div>
										<form method="post">
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" class="form-control" name="username" placeholder="Username" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" class="form-control" name="password" placeholder="Password" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>

												<div class="space"></div>

												<div class="clearfix">
													<label class="inline">
														<input type="checkbox" class="ace" />
														<span class="lbl"> Remember Me</span>
													</label>

													<button type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-primary">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Login</span>
													</button>
													
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>
										<div class="space-6"></div>
									</div>
									<div class="toolbar clearfix">
										<div>
											<a class="ace-icon "></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include 'db_connect.php';
	session_start();
	if(isset($_POST['submit']))
	{
		$username= $_POST['username'];
		$password= $_POST['password'];
		$q="select * from admin_login where user='$username' and pass='$password'";
		$exe=mysqli_query($conn,$q);
		if(mysqli_num_rows($exe)>0)
		{
			$username=$_SESSION['username']= $_POST['username'];
			header('location:index.php');
		}
		else
		{
			echo"<script>alert('Login Failed')</script>";
		}
	}
	?>
</body>
</html>
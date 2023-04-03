<?php
	if(!defined('SECURITY')){
		die("ERROR");
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mulie Auto Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Mulie Auto Authorized Seller - Administrator</div>
				<div class="panel-body">

					<?php
					if(isset($_SESSION['account'])){
						header('location: admin.php');
					}
					if(isset($_POST['sbm'])){
						$account = $_POST['mail'];
						$pass = $_POST['pass'];				

						$sql_user_list = "select * from user where user_mail = '$account' and user_pass = '$pass';";
						$data_sql = mysqli_query($connect, $sql_user_list);

						if(mysqli_fetch_array($data_sql)){
							$_SESSION['account'] = $account;
							$_SESSION['pass'] = $pass;
							header('location: index.php');
						}else{
							$error = '<div class="alert alert-danger">Incorret email or password</div>';
							echo $error;
						}

					}
					?>
					
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" class="btn btn-primary" name="sbm">Log In</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>

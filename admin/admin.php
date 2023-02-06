
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

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php
		// include & require
		session_start();
		if(!isset($_SESSION['account'])){
			header('Location:index.php');
		}
		// include_once & require_once
		if(isset($_GET['page_layout'])){
			switch ($_GET['page_layout']) {
				case "admin":
					include_once('sub_admin.php');
					break;
				case "add_category":
					include_once('add_category.php');
					break;
				case "add_product":
					include_once('add_product.php');
					break;
				case "add_user":
					include_once('add_user.php');
					break;
				case "category":
					include_once('category.php');
					break;
				case "edit_category":
					include_once('edit_category.php');
					break;
				case "edit_product":
					include_once('edit_product.php');
					break;
				case "edit_user":
					include_once('edit_user.php');
					break;
				case "login":
					include_once('login.php');
					break;
				case "product":
					include_once('product.php');
					break;
				case "user":
					include_once('user.php');
					break;
				
				case "bill":
					include_once('bill.php');
					break;
				default:
					break;
			}
		}
		else{

			include_once("sub_admin.php");
		}
	?>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><span>ThuyHT</span>BH00335</a>
						<ul class="user-menu">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['account']; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Profile</a></li>
									<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Log out</a></li>
								</ul>
							</li>
						</ul>
					</div>
									
				</div><!-- /.container-fluid -->
			</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>	
		<ul class="nav menu">
			<li <?php if(!isset($_GET['page_layout'])) echo 'class="active"';?>><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li <?php if(isset($_GET['page_layout']) && $_GET['page_layout'] == "user") echo 'class="active"';?>><a href="admin.php?page_layout=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>User Management</a></li>
			<li <?php if(isset($_GET['page_layout']) &&$_GET['page_layout'] == "category") echo 'class="active"';?>><a href="admin.php?page_layout=category"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Brand Management</a></li>
			<li <?php if(isset($_GET['page_layout']) &&$_GET['page_layout'] == "product") echo 'class="active"';?>><a href="admin.php?page_layout=product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Product Management</a></li>
			<li <?php if(isset($_GET['page_layout']) &&$_GET['page_layout'] == "bill") echo 'class="active"';?>><a href="admin.php?page_layout=bill"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Order Management</a></li>

		</ul>

	</div><!--/.sidebar-->
		
	
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/bootstrap-table.js"></script>	
</body>

</html>

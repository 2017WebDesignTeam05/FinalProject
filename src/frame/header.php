<!DOCTYPE html>
<html>
	<head>
			<title>Tickets</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="../css/style.css">
			<link rel="stylesheet" href="../css/flex.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="../script/popupmodal.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top bg-faded navbar-toggleable-md">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="home.php" class="navbar-brand">
							<i class="fa fa-ticket" aria-hidden="true"></i>
							<span>鳳梨購票</span>
						</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="http://www.google.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="glyphicon glyphicon-user navrighticon"></span>
									<?php echo $_SESSION['name'];?>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="setAccountInfo.php">Account Setting</a>
									<a class="dropdown-item" href="forum.php">Form</a>
									<a class="dropdown-item" href="cart.php">Shoopping Cart</a>
								</div>
							</li>
							<li>
								<a id="" href="logout.php">
									<span class="glyphicon glyphicon-log-in navrighticon"></span>
									Logout
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
<?php
	class View
	{	
		public static function showLinker()
		{
			echo'
				<title>Pineapple Ticket</title>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
				<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
				
				<link rel="stylesheet" href="../css/style.css">
				<link rel="stylesheet" href="../css/flex.css">
				<link rel="stylesheet" href="../css/set1.css">
				<script src="../script/popupmodal.js"></script>
			';
		}
		
		public static function showHeader($name, $permission)
		{
			$result='';
			$output='';
			
			if(!(isset($name)))
			{
				$output='
					<nav class="navbar navbar-inverse navbar-fixed-top">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a href="../index.html" class="navbar-brand">
									<i class="fa fa-ticket" aria-hidden="true"></i>
									<span>鳳梨購票</span>
								</a>
							</div>
							<div class="collapse navbar-collapse" id="myNavbar">
								<ul class="nav navbar-nav navbar-right">
									<li><a id="signuper" href="#"><span class="glyphicon glyphicon-user navrighticon"></span>Sign Up</a></li>
									<li><a id="loginer" href="#"><span class="glyphicon glyphicon-log-in navrighticon"></span>Login</a></li>
								</ul>
							</div>
						</div>
					</nav>
					<div>			
						<div id="dialog" title="Login">
							<form action="login.php" method="post" name="LoginForm">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" id="name11" class="form-control" placeholder="Name">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" id="pass11" name="password" class="form-control" placeholder="Passowrd">
								</div>
								<button type="submit" id="submit11" class="btn btn-default">Submit</button>
								<button type="reset" class="btn btn-default">Clear</button>
							</form>
						</div>
					</div>
		
					<div>
						<div id="dialog2" title="SignUp">
							<form action="signup.php" method="post" name="SignupForm">
								<div class="form-group">
									<label>Name</label>
									<input type="name" name="name" id="name01" class="form-control">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" id="pass01" name="password" class="form-control">
								</div>
								<div class="form-group">
									<label>Re-enter password</label>
									<input type="password" id="pass02" class="form-control" name="p">
								</div>
					
								<button type="submit" id="submit01" class="btn btn-primary btn-block">Create account</button>
							</form>
						</div>
					</div>
				';
			}
			else
			{
				if($permission==1)
				{
					$result='
						<li role="separator" class="divider"></li>
						<li><a href="edit.php">Manage</a></li>
					';
				}
				
				$output='
					<nav class="navbar navbar-inverse navbar-fixed-top">
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
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											<span class="glyphicon glyphicon-user navrighticon"></span>
											'.$name.'
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="setAccountInfo.php">Account Setting</a></li>
											<li><a href="ticket.php">Tickets</a></li>
											<li><a href="forum.php">Forum</a></li>
											<li><a href="cart.php">Shopping Cart</a></li>
											'.$result.'
										</ul>
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
				';
			}
			echo $output;
		}
		
		public static function showFooter()
		{
			echo '
				<nav class="navbar navbar-inverse navbarmargin" style="margin-top:3vw;">
					<div class="container-fluid">
						<div class="navbar-header">
							<p class="navbar-text"><i class="fa fa-copyright" aria-hidden="true"></i>2018 WebDesignClass Team05</p>
						</div>
					</div>
				</nav>
			';
		}
		
		public static function showError($message)
		{
			echo '
				<div class="page text-center">
					<div style="background-color:lightblue;">
						<h3>'.$message.'</h3>
					</div>
				</div>
			';
		}
	}
?>
<nav class="navbar navbar-inverse navbarmargin">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
<?php
	if($_SESSION["permission"]==1)
	{
		echo '
					<ul class="nav navbar-nav navbar-left">
						<li><a id="" href="#"><i class="fa fa-pencil navrighticon" aria-hidden="true"></i>Edit</a></li>
					</ul>
			';
	}
?>
					<ul class="nav navbar-nav navbar-right">
						<li><a id="" href="cart.php"><i class="fa fa-shopping-cart navrighticon" aria-hidden="true"></i>Cart</a></li>
						<li><a href="forum.php"><i class="fa fa-comment-o navrighticon" aria-hidden="true"></i>Forum</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</body>
</html>
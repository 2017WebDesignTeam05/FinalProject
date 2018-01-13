<?php
	require_once("autoload.php");
	session_start();
?>
<html>
	<head>
		<?php View::showLinker(); ?>
	</head>
	<body>
		<?php View::showHeader($_SESSION["name"], $_SESSION["permission"]); ?>

		<div class="page_home">
			<div class="col-md-10 col-sm-offset-1 text-center page01-pic">
				<div id="myCarousel" class="carousel slide">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>   

					<div class="carousel-inner">
						<div class="item active">
							<img src="../image/park_01.jpg" alt="First slide">
						</div>
						<div class="item">
							<img src="../image/park_02.jpg" alt="Second slide">
						</div>
						<div class="item">
							<img src="../image/park_03.jpg" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control left" href="#myCarousel" data-slide="prev"></a>
					<a class="carousel-control right" href="#myCarousel" data-slide="next"></a>
				</div>
				<div>
					<button class="btn text-align page01-btn"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
		
		<div class="page_home page02-bg">
			<div class="text-center" style="color:white;">
				<h2>Buy a Ticket</h2>
				<h4>Famous theme park tickets are on sale.</h4>
			</div>
			<div class="page02">
				<div class="parks">
					<div class="spark text-center">
						<div class="grid">
							<figure class="effect-sadie">
								<img src="../image/icons/disney2.jpg" class="img-responsive">
								<figcaption>
									<h2>Disney<span>Land</span></h2>
									<p>The Holidays Begin Here at the Disneyland Resort</p>
									<a href="ticket.php">Shop now</a>
								</figcaption>
							</figure>
						</div>
					</div>
					
					<div class="spark text-center">
						<div class="grid">
							<figure class="effect-sadie">
								<img src="../image/icons/usj.jpg" class="img-responsive">
								<figcaption>
									<h2>Universal<span>Global</span></h2>
									<p>異なる表情を持つさまざまなエリアは、感動がいっぱいの別世界</p>
									<a href="ticket.php">Shop now</a>
								</figcaption>
							</figure>
						</div>
					</div>
				
					<div class="spark text-center">
						<div class="grid">
							<figure class="effect-sadie">
								<img src="../image/icons/op.jpg" class="img-responsive">
								<figcaption>
									<h2>Ocean<span>Park</span></h2>
									<p>超級人氣冠軍王‧海中精靈-海豚秀</p>
									<a href="ticket.php">view</a>
								</figcaption>
							</figure>
						</div>
					</div>
				
					<div class="spark text-center">
						<div class="grid">
							<figure class="effect-sadie">
								<img src="../image/icons/sf.jpg" class="img-responsive">
								<figcaption>
									<h2>Six<span>Flag</span></h2>
									<p>Six Flags is the biggest regional theme park company in the world!</p>
									<a href="ticket.php">view</a>
								</figcaption>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php View::showFooter(); ?>
	</body>
</html>

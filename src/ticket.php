<?php
	require_once("autoload.php");
	session_start();
	
	$conn=AllFunction::connect();
	if($conn)
	{
		$ticket=new Ticket($conn);
		$result=$ticket->showTickets();
		
		$parkname=new Park($conn);
		$cart=new Cart($conn);
		
		if(isset($_SESSION["name"]))
		{
			$name=$_SESSION["name"];
			$permission=$_SESSION["permission"];
		}
		else
		{
			$name=null;
			$permission=null;
		}
?>
		<head>
			<?php View::showLinker(); ?>
		</head>
		<body>
			<?php View::showHeader($name, $permission); ?>
			
			<div class="flex_forum page container">
				<div>
					<label><h2>Ticket</h2></label>
				</div>
				<div class="ticketToCartIcon">
					<div>
						<input class="form-control" id="myInput" type="text" placeholder="Search..">
					</div>
<?php 
					if(isset($_SESSION["account_id"]))
					{
						echo '
							<div style="margin:0 1vw;">
								<a href="cart.php">
									<i class="glyphicon glyphicon-shopping-cart shoppingcarticon"></i>
								</a>
							</div>
						';
					}
?>
				</div>
		
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Park</th>
							<th>Type</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Operator</th>
						</tr>
					</thead>
					<tbody id="myTable">
<?php
				$counter=0;
				foreach($result as $value)
				{
					if($value["quantity"]>0)
					{
						echo '
							<tr>
								<td>'.++$counter.'</td>
								<td>'.$value["name"].'</td>
								<td>'.$parkname->getParkName($value["park_id"]).'</td>
								<td>'.$value["type"].'</td>
								<td>'.$value["price"].'</td>
					
								<form action="" method="post" class="ticket_layout">
									<input type="hidden" name="account_id" value="'.$name.'">
									<input type="hidden" name="ticket_id" value="'.$value["ticket_id"].'">
									<input type="hidden" name="price" value="'.$value["price"].'">
									<td>
										<input type="number" class="loginonly" name="quantity" min="1" max="'.$value["quantity"].'">
									</td>	

									<td>
										<button type="submit" class="btn btn-default loginonly" name="submitbtn">Buy now</button>
									</td>
								</form>
							</tr>
						';
					}
				}
?>
					</tbody>
				</table>
			</div>
			<?php View::showFooter(); ?>
			<script>
				$(document).ready(function(){
					$("#myInput").on("keyup", function() {
						var value = $(this).val().toLowerCase();
						$("#myTable tr").filter(function() {
							$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					});
				});
			</script>
		</body>
<?php
		
		if(!(isset($_SESSION["account_id"])))
		{
			echo '<script>';
			echo 'var arr=document.getElementsByClassName("loginonly");';
			echo '
				for(var i=0;i<arr.length;i++)
				{
					arr[i].disabled=true;
				}
			';
			echo '</script>';
		}

		if(isset($_POST["submitbtn"]))
		{
			$tid=$_POST["ticket_id"];
			$tq=$_POST["quantity"];
			
			$fin=$ticket->delTickets($tid, $tq);
		
			if($fin==1)
			{
				$res=$cart->addToCart($_SESSION["account_id"], $tid, $tq);
				
				echo '<script>alert("finish!");</script>';
				echo '<meta http-equiv="refresh" content="0">';
			}
			else if($fin==0)
			{
				echo '<script>alert("Change quantity!");</script>';
			}
			else
			{
				echo '<script>alert("'.$fin.'");</script>';
			}
		}
	}
?>

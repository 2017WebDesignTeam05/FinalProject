<?php
	require_once("autoload.php");
	session_start();
	
	$conn=AllFunction::connect();
	if($conn)
	{
		$cart=new Cart($conn);
		$result=$cart->showCart($_SESSION["account_id"]);
		$result2=$cart->showHistory($_SESSION["account_id"]);
		
		$ticket=new Ticket($conn);
		$park=new Park($conn);
		
		$total=0;
		$counter=0;
?>
		<head>
			<?php View::showLinker(); ?>
		</head>
		<body>
			<?php View::showHeader($_SESSION["name"], $_SESSION["permission"]); ?>
			<div class="page container flex_forum">
				<div>
					<label><h2>Shopping Cart</h2></label>
				</div>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">name</th>
							<th scope="col">park</th>
							<th scope="col">type</th>
							<th scope="col">quantity</th>
							<th scope="col">price</th>
							<th scope="col">Operator</th>
						</tr>
					</thead>
					<tbody>
<?php
				$counter=0;
				foreach($result as $value)
				{
					$total+=$value["quantity"]*$ticket->getTicketPrice($value["ticket_id"]);
			
					echo '
						<tr>
							<td scope="row">'.++$counter.'</td>
							<td>'.$ticket->getTicketName($value["ticket_id"]).'</td>
							<td>'.$park->getParkName($ticket->getParkId($value["ticket_id"])).'</td>
							<td>'.$ticket->getTicketType($value["ticket_id"]).'</td>
							<td>'.$value["quantity"].'</td>
							<td>'.$value["quantity"]*$ticket->getTicketPrice($value["ticket_id"]).'</td>
							<td>
								<form action="" method="post">
									<input type="hidden" value="'.$value["order_id"].'" name="order_id">
									<button type="submit" class="btn btn-danger" name="deletebtn"><i class="glyphicon glyphicon-trash"></i></button>
								</form>
							</td>
						</tr>
					';
				}
?>
						<tr>
							<td colspan="2">
								<a href="ticket.php" class="btn btn-warning">
									<i class="glyphicon glyphicon-menu-left"></i>
									Continue Shopping
								</a>
							</td>
							<td><b>Total</b></td>
							<td colspan="2"></td>
							<td><b><?php echo $total; ?></b></td>
							<td>
								<form action="" method="post">
									<input type="hidden" name="account_id" value="<?php echo $_SESSION["account_id"]; ?>">
									<button type="submit" name="checkoutbtn" class="btn btn-primary">Checkout<i class="glyphicon glyphicon-menu-right"></i></button>
								</form>
							</td>
						</tr>
					</tbody>
				</table>

				<div>
					<label><h2>History</h2></label>
				</div>
				
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">name</th>
							<th scope="col">park</th>
							<th scope="col">type</th>
							<th scope="col">quantity</th>
							<th scope="col">price</th>
						</tr>
					</thead>
					<tbody>
<?php
				$counter=0;
				foreach($result2 as $value)
				{
					echo '
						<tr>
							<td scope="row">'.++$counter.'</td>
							<td>'.$ticket->getTicketName($value["ticket_id"]).'</td>
							<td>'.$park->getParkName($ticket->getParkId($value["ticket_id"])).'</td>
							<td>'.$ticket->getTicketType($value["ticket_id"]).'</td>
							<td>'.$value["quantity"].'</td>
							<td>'.$value["quantity"]*$ticket->getTicketPrice($value["ticket_id"]).'</td>
						</tr>
					';
				}
?>
					</tbody>
				</table>
			</div>
			<?php View::showFooter(); ?>
		</body>
		
<?php
		if(isset($_POST["deletebtn"]))
		{
			$res=$cart->deleteCart($_POST["order_id"]);
			
			if($res==1)
			{
				echo '<script>alert("Delete Complete!");</script>';
				echo '<meta http-equiv="refresh" content="0">';
			}
		}
		
		if(isset($_POST["checkoutbtn"]))
		{
			$res=$cart->checkout($_POST["account_id"]);
			
			if($res==1)
			{
				echo '<script>alert("Checkout!");</script>';
				echo '<meta http-equiv="refresh" content="0">';

			}
		}
	}
?>
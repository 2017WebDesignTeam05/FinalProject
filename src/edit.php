<?php
	require_once("autoload.php");
	session_start();
	
	$conn=AllFunction::connect();
	if($conn)
	{
		if($_SESSION["permission"]==1)
		{
			$park=new Park($conn);
			$parkinfo=$park->showPark();
			
			$ticket=new Ticket($conn);
			$ticketinfo=$ticket->showTickets();
			
			$cart=new Cart($conn);
			$cartinfo=$cart->showAllCart();
			
			$account=new Account($conn);
			$accountinfo=$account->showAccount();
?>
			<head>
				<?php View::showLinker(); ?>
			</head>
			
			<body>
				<?php View::showHeader($_SESSION["name"], $_SESSION["permission"]); ?>
				<div class="container-fulid flex_forum text-center page">
					<div>
						<label><h2>Administrator</h2></label>
					</div>
					
					<div id="exTab2" class="container">
						<ul class="nav nav-tabs">
							<li class="active">
								<a  href="#1" data-toggle="tab">Park</a>
							</li>
							<li>
								<a href="#2" data-toggle="tab">Ticket</a>
							</li>
							<li>
								<a href="#3" data-toggle="tab">Order</a>
							</li>
							<li>
								<a href="#4" data-toggle="tab">History</a>
							</li>
							<li>
								<a href="#5" data-toggle="tab">Account</a>
							</li>
						</ul>
		
						<div class="tab-content">
							<div class="tab-pane active" id="1">
								<div>
									<label><h2>Park</h2></label>
								</div>
				
								<table class="table">
									<thead>
										<tr>
											<th>id</th>
											<th>Park_name</th>
											<th>Operator</th>
										</tr>
									</thead>
									<tbody>
<?php
									foreach($parkinfo as $value)
									{
										echo'<tr><form action="" method="post">';
							
										echo '<td>'.$value["park_id"].'</td>';
										echo '<td><input type="text" value="'.$value["name"].'" name="pname" class="form-control"></td>';
										echo '
											<td>
												<input type="hidden" value="'.$value["park_id"].'" name="pid">
												<button type="submit" class="btn btn-success" name="subfinpark"><i class="glyphicon glyphicon-ok"></i></button>
											</td>
										';
										echo '</form></tr>';
									}
?>
										<tr>
											<form action="" method="post">
												<td>#</td>
												<td><input type="text" placeholder="park_name" class="form-control" name="paddname"></td>
												<td><button type="submit" class="btn" name="subaddpark"><i class="glyphicon glyphicon-plus"></i></button></td>
											</form>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="2">
								<div>
									<label><h2>Ticket</h2></label>
								</div>
					
								<table class="table">
									<thead>
										<tr>
											<th>id</th>
											<th>name</th>
											<th>park_id</th>
											<th>type</th>
											<th>price</th>
											<th>quantity</th>
											<th>Operator</th>
										</tr>
									</thead>
									<tbody>
<?php
									foreach($ticketinfo as $value)
									{
										echo'<tr><form action="" method="post">';
							
										echo '<td>'.$value["ticket_id"].'</td>';
										echo '<td><input type="text" value="'.$value["name"].'" class="form-control" name="tname"></td>';
										echo '<td>'.$value["park_id"].'</td>';
										echo '<td><input type="text" value="'.$value["type"].'" class="form-control" name="ttype"></td>';
										echo '<td><input type="text" value="'.$value["price"].'" class="form-control" name="tprice"></td>';
										echo '<td><input type="number" value="'.$value["quantity"].'" class="form-control" name="tq" min="0"></td>';
										echo '
											<td>
												<input type="hidden" value="'.$value["ticket_id"].'" name="tid">
												<button type="submit" class="btn btn-success" name="subfinticket"><i class="glyphicon glyphicon-ok"></i></button>
											</td>
										';
										echo '</form></tr>';
									}
?>
										<tr>
											<form action="" method="post">
												<td>#</td>
												<td><input type="text" placeholder="ticket_name" class="form-control" name="taddname"></td>
												<td>
													<select class="form-control" name="taddparkid">
													<?php
														for($i=0;$i<($park->getParkNumber());$i++)
														{
															echo '<option>'.($i+1).'</option>';
														}
													?>
													</select>
												</td>
												<td><input type="text" class="form-control" name="taddtype"></td>
												<td><input type="text" class="form-control" name="taddprice"></td>
												<td><input type="text" class="form-control" name="taddq"></td>
												<td><button type="submit" class="btn" name="subaddticket"><i class="glyphicon glyphicon-plus"></i></button></td>
											</form>
										</tr>					
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="3">
								<div>
									<label><h2>Order</h2></label>
								</div>
					
								<table class="table">
									<thead>
										<tr>
											<th>id</th>
											<th>account_id</th>
											<th>ticket_id</th>
											<th>quantity</th>
											<th>checkout</th>
											<th>Operator</th>
										</tr>
									</thead>
									<tbody>
<?php
									foreach($cartinfo as $value)
									{
										if($value["checkout"]!=1)
										{
											echo'<tr><form action="" method="post">';
							
											echo '<td>'.$value["order_id"].'</td>';
											echo '<td>'.$value["account_id"].'</td>';
											echo '<td>'.$value["ticket_id"].'</td>';
											echo '<td><input type="text" value="'.$value["quantity"].'" class="form-control" name="cq"></td>';
											echo '
												<td>
													<select class="form-control" name="ccheck">
														<option value="0">No</option>
														<option value="1">Yes</option>
													</select>
												</td>
											';
											echo '
												<td>
													<input type="hidden" value="'.$value["order_id"].'" name="corderid">
													<button type="submit" class="btn btn-success" name="subfincart"><i class="glyphicon glyphicon-ok"></i></button>
													<button type="submit" class="btn btn-danger" name="subdelcart"><i class="glyphicon glyphicon-trash"></i></button>
												</td>
											';
											echo '</form></tr>';
										}
									}
?>
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="4">
								<div>
									<label><h2>History</h2></label>
								</div>
				
								<table class="table table-striped">
									<thead>
										<tr>
											<th>id</th>
											<th>account_id</th>
											<th>ticket_id</th>
											<th>quantity</th>
											<th>checkout</th>
										</tr>
									</thead>
									<tbody>
<?php
									foreach($cartinfo as $value)
									{
										if($value["checkout"]==1)
										{
											echo'<tr>';
							
											echo '<td>'.$value["order_id"].'</td>';
											echo '<td>'.$value["account_id"].'</td>';
											echo '<td>'.$value["ticket_id"].'</td>';
											echo '<td>'.$value["quantity"].'</td>';
											echo '<td>Yes</td>';

											echo '</tr>';
										}
									}
?>
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="5">
								<div>
									<label><h2>Account</h2></label>
								</div>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>name</th>
											<th>permission-now</th>
											<th>setPermission</th>
											<th>operator</th>
										</tr>
									</thead>
									<tbody>
<?php
									foreach($accountinfo as $value)
									{
										if($value["permission"]==1)
										{
											$per='Administrator';
										}
										else
										{
											$per='Customer';
										}
										
										echo '<tr><td>';
										echo $value["name"];
										echo '</td><td>';
										echo $per.'</td>';
										echo '<form action="" method="post" name="setPermission">';
										echo '<input type="hidden" value="'.$value["name"].'" name="accountname">';
										echo '
												<td>
													<select class="form-control" name="accountpermission">
														<option value="2">Customer</option>
														<option value="1">Administrator</option>	
													</select>
												</td>
												<td>
													<button type="submit" class="btn btn-success" name="subfinaccount"><i class="glyphicon glyphicon-ok"></i></button>
												</td>
										';
										echo '</form>';
										echo '</tr>';
									}
?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php View::showFooter(); ?>
			</body>
			
<?php
			require_once("editFuntion.php");
		}
	}
?>

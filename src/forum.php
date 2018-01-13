<?php
	require_once("autoload.php");
	session_start();
	
	$conn=AllFunction::connect();
	if($conn)
	{
		$mes=new Message($conn);
		$all=$mes->showMessage();
		
		$tempAccount=new Account($conn);
?>
		<head>
			<?php View::showLinker(); ?>
		</head>
		<body>
			<?php View::showHeader($_SESSION["name"], $_SESSION["permission"]); ?>
			<div class="flex_forum page">
				<div>
					<label><h2>Forum</h2></label>
					<?php
						foreach($all as $value)
						{
							echo '<div class="flex_box">';
			
							$tempname=$tempAccount->getAccountName($value["account_id"]);
			
							echo '
								<div class="forum_name">
									<h4>'.$tempname.'</h4>
								</div>
							';
			
							echo '
								<div class="forum_content">
									<h4>'.$value["content"].'</h4>
								</div>
							';
		
							echo '</div>';
						}
					?>
					<div class="forum_form">
						<form action="" method="post">
							<div class="form-group">
								<label>Content</label>
								<input type="text" class="form-control" name="content">
							</div>
				
							<button type="submit" class="btn" name="submitbtn">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<?php View::showFooter(); ?>
		</body>

<?php
		if(isset($_POST["submitbtn"]))
		{
			$content=$_POST["content"];
			$mes->addMessage($_SESSION["account_id"], $content);
			header("Location:forum.php");
		}
	}
?>

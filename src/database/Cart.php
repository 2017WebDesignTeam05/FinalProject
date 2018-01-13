<?php
	class Cart
	{
		private $dbConn;
		
		public function __construct($conn)
		{
			$this->dbConn=$conn;
		}
		
		/*
		**return 1:success
		**return -1:pdo_exception
		*/
		public function addToCart($aid, $tid, $tq)
		{
			try
			{
				$sql="INSERT INTO cart (order_id, account_id, ticket_id, quantity) VALUES (:oid, :aid, :tid, :tq)";
				$stmt=$this->dbConn->prepare($sql);
				
				$oid=$this->getOrderNumber()+1;
				
				$stmt->bindParam(':oid', $oid);
				$stmt->bindParam(':aid', $aid);
				$stmt->bindParam(':tid', $tid);
				$stmt->bindParam(':tq', $tq);
				
				$stmt->execute();
				return 1;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		/*
		**number of order
		**return number
		**return -1:pdo_exception
		*/
		private function getOrderNumber()
		{
			try
			{
				$sql="SELECT coalesce(MAX(order_id), 0) FROM cart";
				$result=current($this->dbConn->query($sql)->fetch());
				return $result;
			}
			catch(PDOException $e)
			{
				//echo "Error: ".$e->getMessage();
				return -1;
			}
		}
		
		/*
		**return cart which is not finish the payment
		**return -1:pdo_exception
		*/
		public function showCart($aid)
		{
			try
			{
				$sql="SELECT order_id, ticket_id, quantity FROM cart WHERE account_id=:aid AND checkout=0";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':aid', $aid);
				$stmt->execute();
				
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$result=$stmt->fetchAll();
				return $result;	
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		/*
		**return 1:success
		**return -1:pdo_exception
		*/
		public function deleteCart($oid)
		{
			try
			{
				$sql="DELETE FROM cart WHERE order_id=:oid";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':oid', $oid);
				
				$stmt->execute();
				return 1;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		/*
		**return 1:success
		**return -1:pdo_exception
		*/
		public function checkout($aid)
		{
			try
			{
				$sql="UPDATE cart SET checkout=1 WHERE account_id=:aid AND checkout=0";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':aid', $aid);
				
				$stmt->execute();
				return 1;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		/*
		**return order which is already checkout
		**return -1:pdo_exception
		*/
		public function showHistory($aid)
		{
			try
			{
				$sql="SELECT order_id, ticket_id, quantity FROM cart WHERE account_id=:aid AND checkout=1";
				$stmt=$this->dbConn->prepare($sql);
			
				$stmt->bindParam(':aid', $aid);
				$stmt->execute();
				
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$result=$stmt->fetchAll();
				return $result;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		public function showAllCart()
		{
			try
			{
				$sql="SELECT * FROM cart";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$result=$stmt->fetchAll();
				return $result;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		public function setCart($oid, $cq, $cc)
		{
			try
			{
				$sql="UPDATE cart SET quantity=:cq, checkout=:cc WHERE order_id=:oid";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':cq', $cq);
				$stmt->bindParam(':cc', $cc);
				$stmt->bindParam(':oid', $oid);
				
				$stmt->execute();
				return 1;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
	}
?>
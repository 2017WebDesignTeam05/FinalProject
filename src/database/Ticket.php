<?php
	class Ticket
	{
		private $dbConn;
		
		public function __construct($conn)
		{
			$this->dbConn=$conn;
		}
		
		/*
		**return:array of result
		**return -1:pdo_exception
		*/
		public function showTickets()
		{
			try
			{
				$sql="SELECT ticket_id, name, park_id, type, price, quantity FROM mall";
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
		
		/*
		**delete ticket quantity after booking
		**return 1:success
		**return 0:booking number is larger than existed quantity
		**return -1:pdo_exception
		*/
		public function delTickets($tid, $tnum)
		{
			try
			{
				$sql="SELECT quantity FROM mall WHERE ticket_id=:tid";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':tid', $tid);
				$stmt->execute();
				
				$number=current($stmt->fetch());
				
				if($number>=$tnum)
				{
					try
					{
						$sql2="UPDATE mall SET quantity=:tq WHERE ticket_id=:tid";
						$stmt2=$this->dbConn->prepare($sql2);
						
						$finNum=$number-$tnum;
						
						$stmt2->bindParam(':tq', $finNum);
						$stmt2->bindParam(':tid', $tid);
					
						$stmt2->execute();
						return 1;
					}
					catch(PDOException $e)
					{
						return -1;
					}
				}
				else
				{
					return 0;
				}
			
			}
			catch(PDOException $e)
			{
				//return "Error: ".$e->getMessage();
				return -1;
			}
		}
		
		/*
		**return ticket name
		**return -1:pdo_exception
		*/
		public function getTicketName($tid)
		{
			try
			{
				$sql="SELECT name FROM mall WHERE ticket_id=:tid";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':tid', $tid);
				$stmt->execute();
				
				$result=current($stmt->fetch());
				
				return $result;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		/*
		**return -1:pdo_exception
		*/
		public function getParkId($tid)
		{
			try
			{
				$sql="SELECT park_id FROM mall WHERE ticket_id=:tid";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':tid', $tid);
				$stmt->execute();
				
				$result=current($stmt->fetch());
				
				return $result;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		/*
		**return -1:pdo_exception
		*/
		public function getTicketType($tid)
		{
			try
			{
				$sql="SELECT type FROM mall WHERE ticket_id=:tid";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':tid', $tid);
				$stmt->execute();
				
				$result=current($stmt->fetch());
				
				return $result;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		/*
		**return -1:pdo_exception
		*/
		public function getTicketPrice($tid)
		{
			try
			{
				$sql="SELECT price FROM mall WHERE ticket_id=:tid";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':tid', $tid);
				$stmt->execute();
				
				$result=current($stmt->fetch());
				
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
		public function setTicketInfo($tid, $tname, $ttype, $tprice, $tq)
		{
			try
			{
				$sql="UPDATE mall SET name=:tname, type=:ttype, price=:tprice, quantity=:tq WHERE ticket_id=:tid";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':tname', $tname);
				$stmt->bindParam(':ttype', $ttype);
				$stmt->bindParam(':tprice', $tprice);
				$stmt->bindParam(':tq', $tq);
				$stmt->bindParam(':tid', $tid);
				
				$stmt->execute();
				
				return 1;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		/*
		**number of tickets
		**return number
		**return -1:pdo_exception
		*/
		private function getTicketNumber()
		{
			try
			{
				$sql="SELECT coalesce(MAX(ticket_id), 0) FROM mall";
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
		**return 1:success
		**return -1:pdo_exception
		*/
		public function addTicket($tname, $pid, $ttype, $tprice, $tq)
		{
			try
			{
				$sql="INSERT INTO mall (ticket_id, name, park_id, type, price, quantity) VALUES (:tid, :tname, :pid, :ttype, :tprice, :tq)";
				$stmt=$this->dbConn->prepare($sql);
				
				$idNum=$this->getTicketNumber()+1;
				
				$stmt->bindParam(':tid', $idNum);
				$stmt->bindParam(':tname', $tname);
				$stmt->bindParam(':pid', $pid);
				$stmt->bindParam(':ttype', $ttype);
				$stmt->bindParam(':tprice', $tprice);
				$stmt->bindParam(':tq', $tq);
				
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
<?php
	class Park
	{
		private $dbConn;
		
		public function __construct($conn)
		{
			$this->dbConn=$conn;
		}
		
		/*
		**return 0:not found
		**return -1:pdo_exception
		*/
		public function getParkName($pid)
		{
			try
			{
				$sql="SELECT name FROM parks WHERE park_id= :pid";
				$stmt=$this->dbConn->prepare($sql);
			
				$stmt->bindParam(':pid', $pid);
				$stmt->execute();
				
				$result=current($stmt->fetch());
				
				if($result)
				{
					return $result;
				}
				else
				{
					return 0;
				}
			}
			catch(PDOException $e)
			{
				//echo "Error: ".$e->getMessage();
				return -1;
			}
		}
		
		/*
		**return all park info
		**return -1:pdo_exception
		*/
		public function showPark()
		{
			try
			{
				$sql="SELECT * FROM parks";
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
		**return 1:success
		**return -1:pdo_exception
		*/
		public function setParkName($pid, $pname)
		{
			try
			{
				$sql="UPDATE parks SET name=:pname WHERE park_id=:pid";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':pname', $pname);
				$stmt->bindParam(':pid', $pid);
				
				$stmt->execute();
				return 1;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		/*
		**number of parks
		**return number
		**return -1:pdo_exception
		*/
		public function getParkNumber()
		{
			try
			{
				$sql="SELECT coalesce(MAX(park_id), 0) FROM parks";
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
		public function addPark($pname)
		{
			try
			{
				$sql="INSERT INTO parks (park_id, name) VALUES (:pid, :pname)";
				$stmt=$this->dbConn->prepare($sql);
				
				$idNum=$this->getParkNumber()+1;
				
				$stmt->bindParam(':pid', $idNum);
				$stmt->bindParam(':pname', $pname);
				
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
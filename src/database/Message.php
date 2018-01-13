<?php
	class Message
	{
		private $dbConn;

		public function __construct($conn)
		{
			$this->dbConn=$conn;
		}
		
		/*
		**return 1:success
		**return -1:pdo_exception
		**return 0:message number error
		*/
		public function addMessage($account_id, $content)
		{
			try
			{
				$sql="INSERT INTO forum (post_id, account_id, content) VALUES (:pid, :aid, :content)";
			
				$stmt=$this->dbConn->prepare($sql);

				$MessageNum=$this->getMessageNumber()+1;
			
				if($MessageNum!=-1)
				{
					$stmt->bindParam(':pid', $MessageNum);
					$stmt->bindParam(':aid', $account_id);
					$stmt->bindParam(':content', $content);
					$stmt->execute();

					return 1;
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
		**number of message
		**return number
		**return -1:pdo_exception
		*/
		private function getMessageNumber()
		{
			try
			{
				$sql="SELECT COUNT(*) FROM forum";
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
		**return array of result
		*/
		public function showMessage()
		{
			try
			{
				$sql="SELECT account_id, content FROM forum";
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
	}
?>
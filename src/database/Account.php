<?php
	class Account
	{
		private $dbConn;
		private $name;
		private $password;
		private $login=false;
		
		public function __construct($conn)
		{
			$this->dbConn=$conn;
		}
		
		/*
		**return 1:success
		**return 0:password error
		**retrun -2:name of account error
		*/
		public function login($name, $password)
		{
			if($this->checkNameExisted($name)==1)
			{
				if($this->checkPass($name, $password)==1)
				{
					$this->name=$name;
					$this->password=$password;
					$this->login=true;
					
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return -2;
			}
		}
		
		
		/*
		**number of account
		**return number
		**return -1:pdo_exception
		*/
		private function getAccountNumber()
		{
			try
			{
				$sql="SELECT coalesce(MAX(account_id), 0) FROM accounts";
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
		**return 0:name of account error
		**return -2:name of account existed
		*/
		public function addAccount($name, $password)
		{
			try
			{
				if($this->checkNameExisted($name)==0)
				{
					$sql="INSERT INTO accounts (account_id, name, password) VALUES (:idNum, :name, :password)";
					$stmt=$this->dbConn->prepare($sql);
				
					$idNum=$this->getAccountNumber()+1;
				
					if($idNum!=-1)
					{
						$stmt->bindParam(':idNum', $idNum);
						$stmt->bindParam(':name', $name);
						$stmt->bindParam(':password', $password);
						$stmt->execute();
						
						return 1;
					}
					else
					{
						//echo "idNum Error!";
						return 0;
					}
				}
				else
				{
					return -2;
				}
			}
			catch(PDOException $e)
			{
				//echo "Error: ".$e->getMessage();
				return -1;
			}
		}
		
		
		/*
		**return 0:not existed
		**return 1:existed
		**return -1:pdo_exception
		*/
		public function checkNameExisted($name)
		{
			try
			{
				$sql="SELECT COUNT(*) FROM accounts WHERE name= :name";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':name', $name);
				$stmt->execute();
				
				$result=current($stmt->fetch());
				
				if($result==0)
				{
					//not existed
					return 0;
				}
				else
				{
					return 1;
				}
			}
			catch(PDOException $e)
			{
				//echo "Error: ".$e->getMessage();
				return -1;
			}
		}
		
		/*
		**return 1:correct password
		**return 0:password error
		**return -1:pdo_exception
		*/
		public function checkPass($name, $password)
		{
			try
			{
				$sql="SELECT password FROM accounts WHERE name= :name";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':name', $name);
				$stmt->execute();
				
				$result=current($stmt->fetch());
				
				if(strcmp($result, $password)==0)
				{
					//equal
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
		**return 1:administrator
		**return 2:normal user
		**return -1:pdo_exception
		**return 0:not login
		*/
		public function accountPermission()
		{
			try
			{
				if($this->login)
				{
					//get permission number
					$sql="SELECT permission FROM accounts WHERE name= :name";
					$stmt=$this->dbConn->prepare($sql);
				
					$stmt->bindParam(':name', $this->name);
					$stmt->execute();
				
					$result=current($stmt->fetch());
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
		**return 1:success
		**return 0:not login
		**return -1:pdo_exception
		*/
		public function updateAccountInfo($idNumber, $gender, $birthday, $address, $email)
		{
			try
			{
				if($this->login)
				{
					$sql="UPDATE accounts SET 
					idNumber= :idNumber,
					gender= :gender,
					birthday= :birthday,
					address= :address,
					email=:email
					WHERE name= :name";
					$stmt=$this->dbConn->prepare($sql);
					
					$stmt->bindParam(':name', $this->name);
					$stmt->bindParam(':idNumber', $idNumber);
					$stmt->bindParam(':gender', $gender);
					$stmt->bindParam(':birthday', $birthday);
					$stmt->bindParam(':address', $address);
					$stmt->bindParam(':email', $email);
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
		**return 1:success
		**return 0:not login
		**return -1:pdo_exception
		*/
		public function changePass($new)
		{
			try
			{
				if($this->login)
				{
					$sql="UPDATE accounts SET password= :new WHERE name= :name";
					$stmt=$this->dbConn->prepare($sql);
					
					$stmt->bindParam(':new', $new);
					$stmt->bindParam(':name', $this->name);
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
		**return 1:success
		**return -1:pdo_exception
		**return 0:not login
		**return -2:not an administrator
		*/
		public function setPermission($name, $permission)
		{
			try
			{
				if($this->login)
				{
					if($this->accountPermission()==1)
					{
						$sql="UPDATE accounts SET permission= :permission WHERE name= :name";
						$stmt=$this->dbConn->prepare($sql);
						
						$stmt->bindParam(':permission', $permission);
						$stmt->bindParam(':name', $name);
						$stmt->execute();
						
						return 1;
					}
					else
					{
						return -2;
					}
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
		**return :id
		**return -1:pdo_exception
		**return 0:not login
		*/
		public function getAccountId()
		{
			try
			{
				if($this->login)
				{
					$sql="SELECT account_id FROM accounts WHERE name=:name";
					$stmt=$this->dbConn->prepare($sql);
					
					$stmt->bindParam(':name', $this->name);
					$stmt->execute();
					
					$result=current($stmt->fetch());
					
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
		**return :name
		**return -1:pdo_exception
		*/
		public function getAccountName($id)
		{
			try
			{
				$sql="SELECT name FROM accounts WHERE account_id=:id";
				$stmt=$this->dbConn->prepare($sql);
				
				$stmt->bindParam(':id', $id);
				
				$stmt->execute();
				
				$result=current($stmt->fetch());
				
				return $result;
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}
		
		public function showAccount()
		{
			try
			{
				$sql="SELECT name, permission FROM accounts";
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
<?php

require_once('database.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($fname,$lname,$phone,$umail,$upass)
	{
		try
		{
			$new_pass = password_hash($upass, PASSWORD_DEFAULT);
		
			$accnum = rand(1000000000,9999999999); 
				//	echo $accnum; 
				
			$ball = 0;
			$otp = "";
			$admin = "";
			$WithDraw = "";
			
			$stmt = $this->conn->prepare("INSERT INTO users(FirstName,LastName,Phone,Email,accNum,upass,otps,admin,Ball) 
										VALUES(:fname, :lname, :phone, :umail, :accnum, :upass, :otp, :admin, :ball)");
												  
			$stmt->bindparam(":fname", $fname);
			$stmt->bindparam(":lname", $lname);
			$stmt->bindparam(":phone", $phone);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":accnum", $accnum);
			$stmt->bindparam(":upass", $new_pass);
			$stmt->bindparam(":otp", $otp);
			$stmt->bindparam(":admin", $admin);
			$stmt->bindparam(":ball", $ball);
			
			$stm = $this->conn->prepare("INSERT INTO transactions(FirstName,LastName,Phone,Email,accNum,WithDraw,Ball) 
		    VALUES(:fname, :lname, :phone, :umail, :accnum, :WithDraw, :ball)");
													   
													   
			$stm->bindparam(":fname", $fname);
			$stm->bindparam(":lname", $lname);
			$stm->bindparam(":phone", $phone);
			$stm->bindparam(":umail", $umail);
			$stm->bindparam(":accnum", $accnum);
			$stm->bindparam(":WithDraw", $WithDraw);
			$stm->bindparam(":ball", $ball);
			
			if($stmt->execute() AND $stm->execute())	
			{
				return $stmt;
				return $stm;
			}
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($phone,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT userID, Phone, Email, upass FROM users WHERE Phone=:phone OR Email=:umail ");
			$stmt->execute(array(':phone'=>$phone, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['upass']))
				{
					$_SESSION['user_session'] = $userRow['userID'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function createData($fname,$lname,$phone,$umail,$accnum,$amount,$rBall,$WtdrDate,$Treated,$tate,$sfname,$slname,$sphone,$sumail,$myAcc,$srBall,$sTreated,$sstate)
	{
		try
		{
			$otp = "";
		
			$stms = $this->conn->prepare("INSERT INTO transactions(FirstName,LastName,Phone,Email,accNum,WithDraw,Ball,WtdrDate,Treated,state) 
		                                               VALUES(:fname, :lname, :phone, :umail, :accnum, :amount,:rBall,:WtdrDate,:Treated,:tate)");
												  
			$stms->bindparam(":fname", $fname);
			$stms->bindparam(":lname", $lname);
			$stms->bindparam(":phone", $phone);
			$stms->bindparam(":umail", $umail);
			$stms->bindparam(":accnum", $accnum);
			$stms->bindparam(":amount", $amount);								  
			$stms->bindparam(":rBall", $rBall);								  
			$stms->bindparam(":WtdrDate", $WtdrDate);								  
			$stms->bindparam(":Treated", $sTreated);								  
			$stms->bindparam(":tate", $tate);	
				
				
			$stm = $this->conn->prepare("INSERT INTO transactions(FirstName,LastName,Phone,Email,accNum,WithDraw,Ball,WtdrDate,Treated,state) 
		                                               VALUES(:sfname, :slname, :sphone, :sumail, :myAcc, :samount,:srBall,:sWtdrDate,:sTreated,:state)");
												  
			$stm->bindparam(":sfname", $sfname);
			$stm->bindparam(":slname", $slname);
			$stm->bindparam(":sphone", $sphone);
			$stm->bindparam(":sumail", $sumail);
			$stm->bindparam(":myAcc", $myAcc);
			$stm->bindparam(":samount", $amount);								  
			$stm->bindparam(":srBall", $srBall);								  
			$stm->bindparam(":sWtdrDate", $WtdrDate);								  
			$stm->bindparam(":sTreated", $sTreated);								  
			$stm->bindparam(":state", $sstate);
			
			$sto = $this->conn->prepare("UPDATE users SET otps=:otp, Ball=:srBall WHERE accNum=:accnum");
												  
			$sto->bindparam(":accnum", $myAcc);
			$sto->bindparam(":otp", $otp);
			$sto->bindparam(":srBall", $srBall);
			
			$stt = $this->conn->prepare("UPDATE users SET Ball=:rBall WHERE accNum=:accnum");
												  
			$stt->bindparam(":accnum", $accnum);
			$stt->bindparam(":rBall", $rBall);
			
				
			
			if($stms->execute() AND $stm->execute() AND $sto->execute() AND $stt->execute())	
			{
				return $stms;
				return $stm;
				return $sto;
				return $stt;
			}
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}		
	}
	
	public function updateOtp($accnum,$otp)
	{
		try
		{
			$stm = $this->conn->prepare("UPDATE users SET otps=:otp WHERE accNum=:accnum");
												  
			$stm->bindparam(":accnum", $accnum);
			$stm->bindparam(":otp", $otp);
			
			if($stm->execute())	
			{
				return $stm;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function updateBallance($fname,$lname,$phone,$email,$accnum,$amount,$am,$treat,$state)
	{
		try
		{
			$WtdrDate  = date("y-m-d h:i:sa");
			
			$stm = $this->conn->prepare("UPDATE users SET Ball=:amount WHERE accNum=:accnum");
												  
			$stm->bindparam(":accnum", $accnum);
			$stm->bindparam(":amount", $amount);
			
			$stmt = $this->conn->prepare("INSERT INTO transactions(FirstName,LastName,Phone,Email,accNum,WithDraw,Ball,WtdrDate,Treated,state) 
										VALUES(:fname, :lname, :phone, :email, :accnum, :am, :amount,:WtdrDate,:treat,:state)");		  
			$stmt->bindparam(":fname", $fname);
			$stmt->bindparam(":lname", $lname);
			$stmt->bindparam(":phone", $phone);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":accnum", $accnum);
			$stmt->bindparam(":am", $am);
			$stmt->bindparam(":amount", $amount);
			$stmt->bindparam(":WtdrDate", $WtdrDate);
			$stmt->bindparam(":treat", $treat);
			$stmt->bindparam(":state", $state);
			
			if($stm->execute() AND $stmt->execute())	
			{
				return $stm;
				return $stmt;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function treating($accNum,$tret)
	{
		try
		{
			$stm = $this->conn->prepare("UPDATE transactions SET Treated=:tret, TreatedDate=:TreDate WHERE accNum=:accnum");
												  
			$stm->bindparam(":accnum", $accNum);
			$stm->bindparam(":tret", $tret);
			$TreDate  = date("y-m-d h:i:sa");
			$stm->execute();
			
			
			return $stm;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>
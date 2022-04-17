<?php
class Database
{   
    
	private $host = "localhost";
    private $db_name = "banking";
    private $username = "root";
    private $password = "";
    public $conn;
	
	
	//private $host = "localhost";
    //private $db_name = "u517789962_uBank";
    //private $username = "u517789962_Workshop";
    //private $password = "samuel4Jesus.";
    //public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}	 
?>
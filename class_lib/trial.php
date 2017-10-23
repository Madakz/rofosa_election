<?php
	session_start();
	/**
	* Title: Authentication class
	* Purpose: election_project
	* Author: Madaki Fatsen
	* Created: 21/10/2017
	*/

	// include "./db_connect.php";

	// class Rofosa {

	// 	private $username;
	// 	private $password;

	// 	public $pdo_obj;

	//     public function __construct()
	//     {
	//         $hostname ="localhost";
	// 		$db_username = "root";
	// 		$passwd = "madivel@";
	// 		$dbname ="rofosa_election";
	// 		try {
	// 		    $pdo_obj = new PDO("mysql:host=$hostname;dbname=$dbname", "$db_username", "$passwd");
	// 		    // set the PDO error mode to exception
	// 		    $pdo_obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 		}
	// 		catch(PDOException $e)
	// 		    {
	// 		    echo "Connection failed: " . $e->getMessage();
	// 	    }
	//     }

	//     public function bar()
	//     {
	//         $this->$pdo_obj->prepare('SELECT * FROM voters');
	//         return $this->pdo_obj->execute();

	//      //    $query = $this->$pdo_obj->prepare("SELECT * FROM voters WHERE username='$username' AND password ='$password'"); 
 //    		// $query->execute();
	//     }




	// }

	class Foo /*extends PDO*/
	{
	  //   public $dbh;

	  //   public function __construct()
	  //   {
	  //   	$hostname ="localhost";
			// $db_username = "root";
			// $passwd = "madivel@";
			// $dbname ="rofosa_election";
	  //       $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", "$db_username", "$passwd");
	  //   }

	    public function connection()
		{
		    $hostname ="localhost";
			$db_username = "root";
			$passwd = "madivel@";
			$dbname ="rofosa_election";
	        $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", "$db_username", "$passwd");
	        return $dbh;
		} 

		public function bar()
		{
		   // $query = $this->connection()->prepare('SELECT * FROM voters');
		   // now you have the connection.. now, time for to do some query..
		   // return $query->execute();

			$sth = $this->connection()->prepare("SELECT * FROM voters WHERE phone_number='08136943343' AND password ='ppp'");
			$sth->execute();

			/* Fetch all of the remaining rows in the result set */
			print("Fetch all of the remaining rows in the result set:\n");
			$result = $sth->fetchAll();
			print_r($result);
		}

		
	}

	$obj = new Foo;
	echo $obj->bar();
?>
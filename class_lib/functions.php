<?php
	session_start();
	/**
	* Title: Authentication class
	* Purpose: election_project
	* Author: Madaki Fatsen
	* Created: 21/10/2017
	*/

	// include "./db_connect.php";

	class Rofosa {

		private $username;
		private $password;

		public function connection()
		{
		    $hostname ="localhost";
			$db_username = "root";
			$passwd = "madivel@";
			$dbname ="rofosa_election";
	        $pdo_obj = new PDO("mysql:host=$hostname;dbname=$dbname", "$db_username", "$passwd");
	        return $pdo_obj;
		} 

		public function bar()
		{
		   $query = $this->connection()->prepare('SELECT * FROM voters');
		   // now you have the connection.. now, time for to do some query..
		   return $query->execute();
		}



		//defining Login function
		public function login($username, $password){

			$this->username=$username;
			$this->password=$password;

			$query = $this->connection()->prepare("SELECT * FROM voters WHERE phone_number='$username' AND password ='$password'"); 
    		$query->execute();
			$result = $query->fetch();		//same as mysql_fetch_array

			if($query->rowCount() >= '1') {		//condition to check if a record is gotten from the database
				// print_r($result);
			
				$_SESSION['voter_id'] = $result['id'];
				$_SESSION['surname'] = $result['surnames'];	
				$_SESSION['othername'] = $result['othernames'];
				
			    header("location:voter/index.php");
			}elseif ($username == 'Rofosa' && $password == 'thankyou2#') {
				$_SESSION['admin'] = $username;	//picks the username value and stores it in the admin key
				header('location:admin/index.php');
			}
			else{
				return "Invalid Login Details!!!";
			}
		}
		//end Login Function


		//defining Logout function
		public function Logout(){
			$_SESSION = array();
			session_destroy();
			header("location:index.php");		
			
		}
		//end Logout function


		//define save function
		public function save($surname, $othername, $picname, $address, $number, $form_price, $course, $institution, $position, $reasons, $impacts, $membership_number){
			$sql = "INSERT INTO aspirants (id, surname, othername, membership_number, course, institution, position, reason, possible_impact, address, phone_number, form_price, picture) VALUES (NULL,  '$surname', '$othername', '$membership_number', '$course', '$institution', '$position', '$reasons', '$impacts', '$address', '$number', '$form_price', '$picname')";
		    // use exec() because no results are returned
		    $this->connection()->exec($sql);
		}
		//end save function

		//define findById function
		public function findById($id, $table){
			$query = $this->connection()->prepare("SELECT * FROM $table WHERE id ='$id'"); 
    		$query->execute();
    		return $query->fetch();
		}
		//end findById function


		//define viewAllAspirants function
		public function viewAllAspirants(){
			$query = $this->connection()->prepare("SELECT * FROM aspirants"); 
    		$query->execute();
    		return $query->fetchAll();
		}
		//end viewAllAspirants function

		//define viewAllAspirantsAndPosition function
		public function viewAllAspirantsAndPosition($position){
			$query = $this->connection()->prepare("SELECT * FROM aspirants where position='$position'"); 
    		$query->execute();
    		return $query->fetchAll();
		}
		//end viewAllAspirantsAndPosition function

		//define deleteAspirant function
		public function deleteAspirant($id){
			$sql = "DELETE FROM aspirants WHERE id='$id'"; 
    		$this->connection()->exec($sql);
    		return true;
		}
		//end deleteAspirant function

		//define update function
		public function update($id, $surname, $othername, $membership_number, $course, $institution, $position, $reason, $impacts, $address, $number, $form_price){
		    // Prepare statement
		    $query = $this->connection()->prepare("UPDATE aspirants SET surname='$surname', othername='$othername' , membership_number='$membership_number', course='$course', institution='$institution', position='$position', reason='$reason', possible_impact='$impacts', address='$address', phone_number='$number', form_price='$form_price' WHERE id='$id'");
		    $query->execute();
		    return true;
		}
		//end update function




		//define vote function
		public function voteAspirant(){

		}
		// end vote function

		// define viewAspirantResult function
		public function viewAspirantResult(){

		}
		// end viewAspirantResult function

		// define viewAllAspirantsResult function
		public function viewAllAspirantsResult(){

		}
		// end viewAspirantResult function


	}

	// $obj = new Rofosa;
	// $med = $obj->deleteAspirant('1');
	// echo $med;
	// print_r($med);
	// die();

?>
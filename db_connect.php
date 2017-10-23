<?php
	$hostname ="localhost";
	$db_username = "root";
	$passwd = "madivel@";
	$dbname ="rofosa_election";
	try {
	    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", "$db_username", "$passwd");
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
    }
	// $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$passwd");
	// $connect = mysql_connect(,$username,$passwd) or die(mysql_error());
	// mysql_select_db($dbname) or die(mysql_error());
 ?>
<?php
	include "./class_lib/functions.php";

	$logout=new Rofosa;
	$logout->Logout();
	header('location:index.php');

?>
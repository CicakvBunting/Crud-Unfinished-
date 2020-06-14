<?php 
session_start();
	if(isset($_GET["id"])){
		include 'connect.php';
		$connection->query("DELETE FROM zzmart WHERE IDproduct = ".$_GET["id"]);
	}
	header("location:view.php");
	exit();
?>
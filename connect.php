<?php
	$connection = new mysqli("localhost","root","","erere1");
	if(!$connection){
		echo "connection error!";
		exit();
	}
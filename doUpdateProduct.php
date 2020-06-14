<?php 
session_start();
	if(isset($_POST["NAMAproduct"])){
		include 'connect.php';
		$IDproduct = $_POST["id"];
		$NAMAproduct = $_POST["NAMAproduct"];
		$DESKproduct = $_POST["DESKproduct"];
		$Harga = $_POST["Harga"];
		$IMGproduct = $_FILES["IMGproduct"];

		if($NAMAproduct==""){
			$message = "product Name must be filed!";
		}else if($DESKproduct==""){
			$message = "DESKproduct must be filled!";
		}else if($Harga==""){
			$message = "Harga must be filled!";
		}else {

			if(isset($IMGproduct["tmp_name"]) && $IMGproduct["tmp_name"]!=""){
				$filePath="crud/".basename($IMGproduct["name"]);
				move_uploaded_file($IMGproduct["tmp_name"],$filePath);
				$connection -> query("UPDATE product SET IMGproduct='".$filePath."' WHERE IDproduct = ".$IDproduct);
			}
			
			$connection -> query("UPDATE zzmart SET NAMAproduct='".$NAMAproduct."',DESKproduct='".$DESKproduct."',Harga='".$Harga."' WHERE IDproduct = ".$IDproduct);
			$message = "succesfully UPDATE product";
		}
		$_SESSION["message"] = $message;
		header("location:update.php?id=".$IDproduct);
		exit();
	}
	header("location:view.php");
	exit();
?>
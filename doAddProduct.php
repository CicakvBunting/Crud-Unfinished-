<?php
session_start();
	if(isset($_POST["NAMAproduct"])){
		include 'connect.php';

		$Harga = $_POST["Harga"];
		$NAMAproduct = $_POST["NAMAproduct"];
		$DESKproduct = $_POST["DESKproduct"];
		$IMGproduct = $_FILES["IMGproduct"];

		$message ="";

		if($NAMAproduct==""){
			$message = "Nama produk harus di isi!";
		}else if($DESKproduct==""){
			$message = "Deskripsi produk harus di isi!";
		}else if($Harga==""){
			$message = "harga harus di isi!";
		}else if(!isset($IMGproduct["tmp_name"])||$IMGproduct["tmp_name"]==""){
			$message = "Gambar produk harus ada!";
		}else{

		$filePath = "erere/".basename($IMGproduct["name"]);
		move_uploaded_file($IMGproduct["tmp_name"], $filePath);

		$connection->query("INSERT INTO zzmart VALUES (null,'".$Harga."','".$NAMAproduct."','".$DESKproduct."','".$filePath."')");
		
		$message = "produk berhasil di tambahkan";
		 }
		 $_SESSION["message"] = $message;
		   
	}
	header("location:insert.php");
		 exit();
?>

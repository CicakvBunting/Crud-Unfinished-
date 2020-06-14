<?php
	session_start();
	include 'connect.php';
	if(!isset($_GET["id"])){
		header("location:view.php");
		exit();
	}
	$id = $_GET["id"];
	$getData = $connection -> query("SELECT *FROM zzmart WHERE IDproduct = ".$id);

	if($getData->num_rows==0){
		header("location:view.php");
		exit();
	}
	$getData=$getData -> fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD - Update</title>
    <style>
html {
    min-height: 100%; 
}
body {
    background: -webkit-linear-gradient(#fbd500, #C9DCB9); 
    background: -o-linear-gradient(#fbd500, #C9DCB9); 
    background: -moz-linear-gradient(#fbd500, #C9DCB9); 
    background: linear-gradient(#fbd500, #C9DCB9); 
    background-color: #fbd500; 
}

</style>
</head>
<body>
	<a href="view.php"><button>BACK</button></a>
	<h1>Create Product</h1>
	<form action="doUpdateProduct.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<input type="hidden" name="id" value="<?=$_GET["id"]?>">
			<td>Nama Produk</td>
			<td>:</td>
			<td><input type="text" name="NAMAproduct" value="<?=$getData["NAMAproduct"]?>"></td>
		</tr>
		<tr>
			<td>Deskripsi produk</td>
			<td>:</td>
			<td><input type="text" name="DESKproduct" value="<?=$getData["DESKproduct"]?>"></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><input type="number" name="Harga" value="<?=$getData["Harga"]?>"></td>
		</tr>
		<tr>
			<td>Gambar produk</td>
			<td>:</td>
			<td><input type="file" name="IMGproduct"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button>Update Product</button></td>
		</tr>
	</table>
	</form>
	<?php
	if (isset($_SESSION["message"])){
	 	echo $_SESSION["message"];
	 	unset($_SESSION["message"]);
	}
	?>
</body>
</html>
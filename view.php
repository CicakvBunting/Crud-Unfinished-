<!DOCTYPE html>
<html>
<head>
	<title>ZZmart view</title>
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
	<h1>ZZmart shop</h1>
	<?php
		include 'connect.php';
		$getProduct = $connection -> query("SELECT * FROM zzmart");
		while($fetchProduct = $getProduct -> fetch_assoc()){
		?>

		<table style="display:inline-table;width: 200px">
			<tr>
				<td><img style="width: 100%" src="<?=$fetchProduct["IMGproduct"]?>"></td>
			</tr>
			<tr>
				<td>
					<strong>Nama produk : <?=$fetchProduct["NAMAproduct"]?></strong><br>
					IDR : <?=number_format($fetchProduct["Harga"])?><br>
					description : <?=$fetchProduct["DESKproduct"]?>
				</td>				
			</tr>
			<tr>
				<td>
					<a href="update.php?id=<?=$fetchProduct["IDproduct"]?>"><button>UPDATE</button></a>
					<a href="delete.php?id=<?=$fetchProduct["IDproduct"]?>"><button>DELETE</button></a>
				</td>
			</tr>>
		</table>

		<?php
		}
	?>
	<a href="insert.php" style="text-align:right;"><button>insert new product</button></a>
</body>
</html>
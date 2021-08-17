<!doctype html>
	<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Document</title>
	</head>
	<body>
		<style type="text/css">
		#h_menu {
			width: 1000px;
			line-height: 30px;
			background-color: blue
			
		}
		#h_menu ul li{
			
			list-style: none;
			text-align: center;
			display: inline-table;
			margin: 10px
			
		}
		#h_menu ul li a{
			text-decoration: none;
			color: white
		}
		#wrapper{
			width: 1000px;
			margin: auto;
			color: blue;
		}
		#h_menu2{
			width: 200px;
			height: 400px;
			background-color: aqua;
			float: left;
			border: 1px solid black;
			
		}
		.content{
			width: 100%;
			height: 900px;
			border: 1px solid black
		}
		.left{
			width: 20%;
			background: gray;
			height: 900px;
			float: left;
		}
		.right
		width: 80%;
		background:yellow;
		height: 900px;
		float:right;
	}
	.footer{
		width: 100%;
		height: 100px;
		background: red;
		border: 1px solid black;
		clear: both;
	}
	#products_box{
		width: 780px;
		text-align: center;
		margin-left: 30px;
		margin-bottom: 10px;
	}
	#single_product{
		float: left;
		margin-left: 30px;
		padding: 10px;
	}
}
table{
	border: 1px solid black;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="">Home</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
			</li>
			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Admin
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="Songlist.php">Songs</a>
					<a class="dropdown-item" href="./Genrelist.php">Genre</a>
					
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Acount
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="Login_music.php">SingIn</a>
					<a class="dropdown-item" href="Register_music.php">SingUp</a>
					
				</div>
			</li>

		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>

<div class="container">
	<div class="row justify-content-center">
		<div class="col col-8">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name </label>
					<input class="form-control"  name="ProductName" type="text">
				</div>
				<div class="form-group">
					<label for="name">Price</label>
					<input class="form-control"  name="Price" type="text">
				</div>
				
				
				<div class="form-group">
					<label for="priceproduct">ProductImage</label>
					<input type="file" name="ProductImage" id="priceproduct" class="form-control">
				</div>
				
				<div class="form-group">
					<label for="category">Category</label>
					<select name="CategoryID" >
						<?php
						include("connect.php");
						if (!$connect){
							echo "kết nối thất bại";
						}else{
							echo "";
						}
						$result=$connect->query("select * from category");
						while($row=$result->fetch_array()){
							$catId=$row["CategoryID"];
							$catName=$row["CategoryName"];
							echo "<option value='$catId'>$catName</option>";
						}
						?>
					</select>
				</div>
				
				<button name="Add" type="submit" class="form-control btn btn-primary">Add</button>
				
			</form>
		</div>
	</div>
</div>
<?php

include("connect.php");
if (!$connect){
	echo "kết nối thất bại";
}else{
	echo "";
}
if(isset($_POST['Add'])){
	$ProductName=$_POST['ProductName'];
	$Price=$_POST['Price'];
	
	$category=$_POST['CategoryID'];
	$ProductImage=$_FILES['ProductImage']['name'];
	$target="img".basename($ProductImage);
	$resulttarget="img".basename($ProductImage);
	
	move_uploaded_file($_FILES['ProductImage']['tmp_name'],$target);
	
	$result2=$conn->query("INSERT INTO `product`(`ProductName`, `Price`, `CategoryID`,`ProductImage`) VALUES('$ProductName','$Price','$category','$ProductImage')");
	if($result2){
		echo "<script>alert('thêm dữ liệu thành công')</script>";
		echo"<script>window.open('view.php','_self')</script>";

	}
	else{
		echo "<script>alert('thêm dữ liệu thất bại')</script>";
		echo"<script>window.open('Add.php','_self')</script>";


		
	}
}




?>
</body>
</html>

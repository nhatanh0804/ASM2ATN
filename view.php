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
		.right{
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
  <a class="navbar-brand" href="../Index.php">ATN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
     
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
              </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Dangnhap.php">Sign In</a>
          <a class="dropdown-item" href="Dangky.php">Sign Up</a>
        
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
			<div class='col-2'>
				<h6>Song Name</h6>
			</div>
			<div class='col-2'>
				<h6>Price</h6>
			</div>
			<div class='col-2'>
				<h6>Image</h6>
			</div>
			<div class='col-2'>
				<h6>Genre</h6>
			</div>
			<div class='col-2'>
				<h6>Action</h6>
			</div>
		</div>
		<?php 
		$conn = mysqli_connect('localhost','root','','asm2');
		$sql="select*from product";
		$result= $conn->query($sql);
		while($song=$result->fetch_object()){
			echo "
        <div class='row justify-content-center' style='margin-bottom:20px;'>
			<div class='col-2'>
				<p>$song->ProductName</p>
			</div>
			<div class='col-2'>
				<p>$song->Price</p>
			</div>
			<div class='col-2'>
				<img src='img/$song->ProductImage' style=' height: 60px; width: 60px;' >
			</div>";
			$genreID=$song->CategoryID;
			$sql1="select*from category where CategoryID=$genreID";
			$result1= $conn->query($sql1);
			$category=$result1->fetch_object();
			echo"
			<div class='col-2'>
				<p>$category->CategoryName</p>
			</div>
			<div class='col-2'>
			    <a href='Add.php'>Add</a>
				<a href='Edit.php?update_id=$song->ProductID'>Edit</a>
				<a href='view.php?delete_id=$song->ProductID'>Delete</a>
			</div>
		</div>";
		}
			?>


			
            

    </div>
                <?php
                if(isset($_GET['delete_id'])){
						
					$songID=$_GET['delete_id'];
                    
                        $result2=$conn->query("delete from product where ProductID=$songID");
                        
					
                        if($result2){
                            echo "<script>alert('xóa dữ liệu thành công')</script>";
							echo"<script>window.open('view.php','_self')</script>";
                       
                        }
                        else{
                            echo "<script>alert('xóa dữ liệu thất bại')</script>";
                          
                        }
                }
           



?>
</body>
</html>

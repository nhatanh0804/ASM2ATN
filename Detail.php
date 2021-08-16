<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
</head>

<body>
  <?php 
session_start();
 ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Index.php"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="WebsiteLayout/Index.php">Home <span class="sr-only">(current)</span></a>
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
 <div class="row justify-content-between">
    <?php 
     
    $conn = mysqli_connect('localhost','root','','asm2');

   if($conn){ echo"";}
    $id=$_GET["id"];
    $sql="SELECT * FROM product Where product.ProductID={$id} ";
    $rs= mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_assoc($rs)) {
     ?>
        <div class="col-12" style=" text-align: left;">
        <h2 class="name-pro">Name Of Product: <?php echo $row['ProdcuctName'] ?></h2>
        <p style="color: red;padding-left: 20px;"> Price: <?php echo $row['Price']." "; ?></p>
          
          
         <form method="POST" action="cart.php"> 
            <input type="number" name="sl" value="1" min="1" max="1" style="display: none;"> 
            <input type="hidden" name="id" value="<?=$id?>">
            <button type="submit" name="button-buy" class="button-buy"><i class="fas fa-cart-plus"></i>  Add to cart</button>
          </form>
        <br>
        <br>

        <div style="border-bottom: 1px solid black"></div>
        <br>
        <p>
          Basic song info:
        </p>
        
        
        </div>
        <div class="col-4">
          <img src="img/<?php echo $row['ProductImage']?>" style="width: 600px;height: 500px" >
        </div>
    <div class="col-4">

         
        </div>
   
        <?php
      }
      ?>
     </div>
     </div>
    
      ?>
</body>
</html>

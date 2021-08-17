<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include("connect.php");
	if (!$connect){
		echo "kết nối thất bại";
	}else{
		echo "";
	}
	if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
		$SongID=$_GET['id'];
		$sql = "DELETE FROM product WHERE ProductID='$SongID'";
		if ($connect->query($sql) === TRUE) {
			echo "Xoá thành công!";
		} else {
			echo "Error updating record: " . 
			$connect->error;
		}
		
		$connect->close();
	}
	?>
</body>
</html>
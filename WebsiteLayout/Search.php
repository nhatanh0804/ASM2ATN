<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
            $connect = mysqli_connect('localhost','root','','asm2');
           if(isset($_POST['submitsearch']))
           {
            $search=$_POST['searchinput'];
			$sql = "select * from song where SongName like '%$search%'";
			
			$run_pro = mysqli_query($connect,$sql);
			
			while($row_pro = mysqli_fetch_array($run_pro)){
				$SongID = $row_pro['SongID'];
				$SongName = $row_pro['SongName'];
				$Price= $row_pro['Price'];
				$SongImage = $row_pro['SongImage'];
				$Lyrics= $row_pro['Lyrics'];
				$GenreID= $row_pro['GenreID'];
                $MP3= $row_pro['MP3'];
                $Singer= $row_pro['Singer'];
				echo"
                    <div class='col-md-9 col-sm-6 col-12'>
                    <div class='card card-product mb-3'>
                    <div id='song'>
                    
                    <img src='/Img/$SongImage' width='280' height='280' alt='Hinh Anh'/>
                    <p><b>$SongName</b></p>
                    <p>Singer: $Singer</p>
                    <p>Price: $Price  </p>
                    <audio id='audio_1' style='width: 247px'controls controlsList='nodownload' ><source src='/Song/$MP3' type='audio/mpeg' >
                    </audio>
                    <a href=''>Details</a>
                    <a href=''>
                     <button style='float:'>Add to cart</button>
                    </a>
                    </div>
                    </div>
                    </div>
					
					
				";
				
				
			}
           }
           
    
	        ?>
</body>
</html>
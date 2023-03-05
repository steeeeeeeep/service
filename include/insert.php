<?php  	
    if(ISSET($_POST['submit'])){
    	$user_no = $_SESSION['user_no'];
    	$name = $_POST['name'];
	    $activity = $_POST['activity'];
		$tdate = $_POST['tdate'];
		$dtime = $_POST['dtime'];
        $conn = new mysqli("localhost","root","","activity");
         $q1 = $conn->query("SELECT * FROM `home_tasks` WHERE  '$_SESSION[user_no]' && `activity` = '$activity'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
			if($c1 > 0){
				echo "<script>alert('home tasks already taken')</script>";
			}else{
				$conn->query("INSERT INTO `home_tasks` VALUES(NULL, '$user_no', '$name', '$activity', '$tdate', '$dtime', '0')") or die(mysqli_error());
				echo "<script>alert('sucessfully inserted')</script>";
				echo "<script>window.location='manage_house.php';</script>";
			}				
		}

		
		$db_home_service_111->close();
?>
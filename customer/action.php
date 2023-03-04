<?php
    require_once '/scripts/session.php'
?>
<?php
    if(!isset($_SESSION['provider_id'])){
        header('location: index.php');
    }
?>
 <?php
      $conn = new mysqli("localhost","root","","home_service") or die(mysqli_error());
      $query = $conn->query("SELECT * FROM `workers` WHERE `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
      $fetch = $query->fetch_array();
    ?>

 <?php
// mysql connection
$hostname = "localhost";
$username = "root";
$password = "";
$db_home_service_111name = "home_service";

$con = mysqli_connect($hostname, $username, $password, $db_home_service_111name) or die("Error: " . mysqli_error($con));

// fetch records
$result = @mysqli_query($con, "SELECT * FROM bookings") or die("Error: " . mysqli_error($con));

// delete records
 if(isset($_POST['chk_id']))
{

    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        @mysqli_query($con,"DELETE FROM bookings WHERE booking_id = " . $id);
    }
    
   echo "<script>alert('sucessfully deleted')</script>";
        echo "<script>window.location='serviceProvider/request.php';</script>";
}

?> 

 <?php 
date_default_timezone_set('Asia/Manila');

//action.php
if(isset($_POST["action"]))
{
	include('./scripts/conn1.php');
	if($_POST["action"]=='fetch')
	{   
		
		$output ='';
		$query = "SELECT * FROM  bookings  where `provider_id`= '$_SESSION[provider_id]'";
        $statement = $conn->prepare($query);
		$statement->execute();	
		$result = $statement->fetchAll(); 
		$output .='
         <form id="formABC" method="post" action="action.php">
         <table class="table table-bordered table-striped">
         <tr>
            <td><center>Check ALL &nbsp; <input id="chk_all" name="chk_all" type="checkbox"/>
          
            </center></td>
            <td class="hidden"></td>
            <td class="hidden"></td>
            <td>Service Tasks</td>
            <td>Scheduled Date</td>
            <td>Payment</td>
            <td>Status</td>
           <td><center>Action</center></td> 
         </tr>
        
		';

		foreach ($result as $row) 
       
		{
		  $status = '';
		  
		  if($row["status"] == '1')
		  {
             $status = '<span class="label label-success">done</span>';
            
		  }	
      if($row["status"] == '0')
		  {
               $status = '<span class="label label-danger">not yet started</span>';
		  }
		  $disabled='';
          if($row['status']==1) {
          	$disabled='disabled="disabled"';
          }
		  $output .='
             <tr>
                <td> <center><input name="chk_id[]" type="checkbox" class="chkbox" value="'.$row['booking_id'].'"/></center></td>
                <td class="hidden">'.$fetch["customer_id"].'</td> 
                <td class="hidden">'.$fetch["firstname"].''.$fetch["lastname"].'</td> 
                <td>'.$row['service_type'].'</td>
                <td>'.$row["date"].'</td>
                <td>'.$row["payment"].'</td> 
                
                <td>'.$status.'</td>
                <td>
                   <audio id="audioMusic">
                    <source src="./sounds/beep1.mp3" type="audio/mpeg">
                      </audio>
                    <center><button type="button" onclick="ting()" name="action" class="btn btn-info btn-xs action"  data-booking_id="'.$row["service_type"].'"   data-dtime="'.$date.'" data-customer_id="'.$row["customer_id"].'" data-status="'.$row["status"].'" value="" '.$disabled.' >  <span class="fa fa-check"></span> </button>
                     <br/> <br/> 
                      <button id="submit"   name="submit" type="submit" class="btn btn-xs btn-danger"> <span class="fa fa-trash">  Delete</span></button></center>
                </td>
            </tr>

           
		  ';
		}
		$output .= '</table>
             </form>';
		echo $output;
	}
	
	if ($_POST["action"] == 'change_status') {
		$status = '';
		
		if($_POST['status'] ==1) {
             $status = '0';
		} 
		if($_POST['status'] == 0) {
             $status = '1';
		}
		
		
		
		$query =  'UPDATE bookings  SET status=:status WHERE  service_type=:service_type';

		$statement = $connect->prepare($query);
		$statement->execute(

			array(
				':status'=> $status,
				':service_type'=> $_POST['booking_id']

			)
		); 
		
	}
}	

?>

<script type="text/javascript">
$(document).ready(function(){
    $('#chk_all').click(function(){
        if(this.checked)
            $(".chkbox").prop("checked", true);
        else
            $(".chkbox").prop("checked", false);
    });
});

$(document).ready(function(){
    $('#delete_form').submit(function(e){
        if(!confirm("Confirm Delete?")){
            e.preventDefault();
        }
    });
});

  var audio = document.getElementById("audioMusic");
  function ting(){
    audio.play();
   
  }

</script>


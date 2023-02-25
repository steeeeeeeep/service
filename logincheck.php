<?php
	error_reporting(0);
		if(!ISSET($_SESSION['customer_id']))
			{
				header('location:booking.php');
			}
?>
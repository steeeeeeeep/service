<header>
	
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php 
		$query = $db->query("SELECT * FROM sp_list WHERE `provider_id`='$_SESSION[provider_id]'") or die(mysqli_error());
		while($fetch = $query->fetch_array()){
?>
		<nav>
			<?php require_once 'count.php'?>
			

			<div class="topnav" id="myTopnav">
				<div id="logo">
					<img src="../images/Logo-1.png" ></div>
					<div class="menu"><button class="fa fa-bars"></button></div>
				</div>
			</div>

			<div class="side-bar" id="side-bar">
				<div class="info">
					<span><i class="fa fa-user-circle" style="margin-right: 20px"></i><strong><?php echo $fetch['firstname'] ." ". $fetch['lastname']?></strong></span>
				</div><hr>
				<div class="navigation">
					<div id="link" class="home"><a href="WorkGo-service_provider.php"><span>Dashboard<i class="fa fa-home"></i></span></a></div>
					<div id="link" class="req"><a href="request.php"><span>Request<i class="fa fa-plus-circle"></i></span><span class='notif'><?php echo $req['total']?></span></a></div>
					<div id="link" class="notification"><a href="notification.php"><span>Notification<i class="fa fa-bell"></i></span><span class='notif'><?php echo $notif['total'] + $done['total'];?></span></a></div>
					<div id="link" class="help"><a href="../help.php"><span>Help<i class="fa fa-question-circle" ></i></span></a></div>
					<div id="link" class="contact"><a href="../contact.php"><span>Contact<i class="fa fa-phone" ></i></span></a></div>
				</div><hr>
				
				<div class="logout">
					<div id="link"><a href="../about.php" id="ab"><span>About<i class="fa fa-exclamation-circle" ></i></span></a></div>
					<div id="link"><a href="../logout.php?logout='1'"><span>Logout<i class="fa fa-sign-out" ></i></span></a></div>
				</div>
			</div>
		</nav>
		
        <script>
			$(document).ready(function(){
				$('#menu_btn').on('click', function(){
					$('#side-bar').toggle();
				})
			})

		</script>
<?php }
?>
    </header>
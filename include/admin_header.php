<header>
	
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<nav>
			<div class="topnav" id="myTopnav">
				<div class="menu"><button id="menu_btn" class="fa fa-bars"></button></div>
				<div id="logo">
					<a href="dashboard.php"><img src="../images/Logo-1.png"></a>
				</div>
			</div>

			<div class="side-bar" id="side-bar">
				<div class="navigation">
					<div id="link" class="dashboard"><a href="dashboard.php"><span>Dashboard<i class="fa fa-dashboard"></i></span></a></div>
					<div id="link" class="users"><a href="users.php"><span>Manage Users<i class="fa fa-users"></i></span></a></div>
					<div id="link" class="general-stat"><a href="stats.php"><span>General Stats<i class="fa fa-line-chart"></i></span></a></div>
				</div><hr>
				
				<div class="logout">
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

    </header>
<?php 
require_once "../scripts/session.php";
include_once "../scripts/db_conn.php"; 
include_once "login.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Logo-Title.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/
	bootstrap.min.css" rel="stylesheet" integrity=
	"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
	crossorigin="anonymous">
    <link rel="stylesheet" href="../index_css/dashboard.css">
    <link rel="stylesheet" href="../index_css/login.css">
    <title>WorkGO/Admin</title>
</head>

<style>

	#ps-visible{
		display: none;
	}

	div#eye.selected{
    	color: #088F8F;	
	}
	div#eye {
		position: absolute;
		right: 40px;
		top: 50%;
		transform: translateY(-50%);
        cursor: pointer;
	}
	.modal1 {
		overflow: hidden;
		display: flex;
		justify-content: center;
		position: fixed;
		z-index: 4;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0,0,0);
		background-color: rgba(0,0,0, 60%);
		padding-top: 60px;
	}

	.modal-content{
		width: 100%;
		height: 100%;
    	 max-width: 100%;
	}

</style>

<body>

	<div id="id01" class="modal1" style="display: flex">

		<form  action="index.php" method="post">
			<div class="modal-content animate">
				<div class="warning">
				<span style="color: #ff7c7c; font-size:light;">
					<?php include('../scripts/errors.php');?>
				</span>
				</div>
				<div class="modal-container" style="background: none">
					<img src="../images/Logo-1.png" />
				</div>

				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput" 
					placeholder="Username" name="username" required>
					<label for="floatingInput">Username</label>
				</div>

				<div class="form-floating">
					<input type="password" class="form-control" name="password"
					id="floatingPassword" placeholder="Password" required>
					<label for="floatingPassword">Password</label>
							<input type="checkbox" id="ps-visible" >
							<div id="eye"><i class="fa fa-eye" onclick="PSvisible()"></i></div>
				</div> 
					<script>
						document.getElementById("eye").addEventListener("click", function() {
							var radio = document.getElementById("ps-visible");
							radio.checked = !radio.checked;
							if (radio.checked) {
								this.classList.add("selected");
							} else {
								this.classList.remove("selected");
							}
						});
					</script>
				
				<div class="center">
					<button class="submit" type="submit" name="login_admin">Log in</button>
				</div><br/>

					<p3><span>or</span></p3>

					<div class="other-option">
						
						<div class="center">
							<a class="submit" type="submit" href="register_admin.php" style="width: 120px">Register as Admin</a>
						</div><br/>
						
					</div>
			</div>
			
        </form>
        </div>
        
    <script src="../js/navs.js"></script>
</body>
</html>
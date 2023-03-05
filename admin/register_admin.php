<?php include_once './login.php';?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-wid, intial-scale=1" 
    meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/Logo-Title.png">
    <link href="../css/register.css" rel="stylesheet">
    <title>Register Admin</title>
</head>
<style>
    .content form .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
        flex-direction: column;
    }
    form .user-details .input-box {
        margin-bottom: 15px;
        width: 100%;
    }
    
</style>
<body>
    <div class="user_data">
        <!-- Created By CodingLab - www.codinglabweb.com -->
        <div class="container" style="display:flex; flex-flow: nowrap column">
            <div class="title">Registration</div>
                <div class="content">
                    <form method="post" action="register_admin.php" enctype="multipart/form-data">
                    <div class="error">
                        <span style="color: #ff7c7c; font-size:light;">
                            <?php include('../scripts/errors.php');?>
                        </span>
                    </div>
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Name</span>
                                <input type="name" name="name" 
                                placeholder="Input your name"/>
                            </div>
                            <div class="input-box">
                                <span class="details">Username</span>
                                <input type="text" placeholder="Enter your username" 
                                name="username" value="<?php echo $username; ?>">
                            </div>
                            <div class="input-box">
                                <span class="details">Password</span>
                                <input type="password" name="password_1" 
                                placeholder="Enter your password" 
                                name="password_1" minlength="8" maxlength="100">
                            </div>
                            <div class="input-box">
                                <span class="details">Confirm Password</span>
                                <input type="password" name="password_2" 
                                placeholder="Confirm your password" 
                                name="password_2" >
                            </div>
                        </div>
                            <div class="button">
                            <input type="submit" value="Register" name="register_admin">
                            </div>
                    </form>
                </div>                    
            </div>
        </div>
    </div>
    

</body>
</html>
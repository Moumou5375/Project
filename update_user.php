<?php

	session_start();
    $chk_error = false;

//13.display old info and update into users table
    include_once 'db_plan.php';

	//fetch existing records
	if (isset($_GET['user_id'])) {
		$sql = "SELECT * FROM users WHERE ID = " . $_GET['user_id'];
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
	}

	//update record
	if (isset($_POST['update']))  {
		$user_id = $_POST['id'];
		$name_up = $_POST['txtname'];
		$email_up = $_POST['txtemail'];
		$passwd_up = $_POST['txtpasswd'];
		$cpasswd_up = $_POST['txtcpasswd'];
		
		//validation input fields
		if (!preg_match("/^[a-zA-Z\s]+$/", $name_up)) {
			#code if not match
			$chk_error = true;
			$err_msg = "Name must contain only alphabets and space"; 
		}
		if (!filter_var($email_up,FILTER_VALIDATE_EMAIL)) {
			#code if not match
			$chk_error = true;
			$err_msg = "Please enter valid E-mail"; 
		}
		if (strlen($passwd_up) < 8) {
			#code if not match
			$chk_error = true;
		
			$err_msg = "Password must be minimum of 6 characters"; 
		}
		
		//validation password as so as cfpassword 
		if ($passwd_up != $cpasswd_up) {
			#code if not match
			$chk_error = true;
			$err_msg = "Password don't match confirm password"; 
		}
		
		//insert into users table in database
		if ($chk_error == false) {
		
			$SQL_Update = "UPDATE users SET Name = '" . $name_up . "', 
					Email = '" . $email_up . "', 
					password = '" . md5($passwd_up) . "' 
					WHERE ID = " . $user_id ;
			//ex. INSERT INTO users(Name,Email,password) VALUES('John','John@email.com','123lok')

			if (mysqli_query($con, $SQL_Update)) {
				// insert success
				$success_msg = "Update successfully.";
				header("Location: show_stu.php");
			} else {
				// insert error
				//$chk_error = true;
				$err_msg = "Updateed error!"; 
			}
		}

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="17x16" href="picture/logo.png">
    <title>My Plan</title>
    <link rel="stylesheet" href="CSS/mainUVT.css">
	<link rel="stylesheet" href="CSS/phpstyle.css">
    <link rel="stylesheet" href="CSS/sh_stu.css">
	<link rel="stylesheet" href="CSS/nav.css">
    <style>
        #b4 {
    font-weight: bolder;
    margin-top:  3px;
    margin-left: 7px;
    margin-right: auto;
    background-color: rgb(0, 172, 6);
    color: aliceblue;
    }
    #b5 {
    font-weight: bolder;
    margin-top:  3px;
    margin-right: 70px;  
    margin-left: 10px;
    background-color: rgb(218, 0, 18);
    color: aliceblue;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	<?php
	        if ($chk_error) { ?>
		        <div class="alert alert-danger alert-dismissible fade show" role="alert">
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
				<strong><?php echo $err_msg ?></strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.location = 'show_stu.php'" style = "justify-content: right;"></button>
			  </div>
	        <?php } else { 
		        if (isset($success_msg)) {?> 
			    <div class="alert alert-success alert-dismissible fade show" role="alert"> 
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						<strong><?php echo $success_msg ?> </strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.location = 'show_stu.php'" style = "justify-content: right;"></button>
					</div>
					<?php }
	 } ?>
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <nav class="navbar" id="barc">  <!--style="background-color: #000407;"!-->
                <div class = "div1">
                    <a class="navbar-brand" href="mainUVT.html">
                    <img src="picture/logo3.png" alt="" width="100px" height ="60PX" id="img2"></img></a>
                </div>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end" id ="div2">
					<button type="button" class="btn" id ="b5" onclick="document.location = 'show_stu.php'">Cancel</button>
                </div>
            </nav><br><br>
            <div class="container">
	            <div class="row">
		            <div class="col-xl-4 col-lg-4 col-md-4 col-md-offset-4 well" id="sign1"><br>
			            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform"> <!--action = "register.php"!-->
				            <fieldset>
					            <legend style="font-weight: bold;">Update your profile</legend>
								<br>
					            <div class="form-group">
						<input type="hidden" name="id" value="<?php echo $row['ID']; ?>" />
						<label for="txtname" style="font-weight: bold;">Name</label>
						<input type="text" name="txtname" placeholder="EX.Muthita Phuttha" required value="<?php echo $row['Name']; ?>" class="form-control" />
					</div>

					<div class="form-group">
						<label for="txtemail" style="font-weight: bold;">Email</label>
						<input type="text" name="txtemail" placeholder="EX.xxxxx@gmail.com" required value="<?php echo $row['Email']; ?>" class="form-control" />
					</div>

					<div class="form-group">
						<label for="txtpasswd" style="font-weight: bold;">Password</label>
						<input type="password" name="txtpasswd" placeholder="Password" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="txtcpasswd" style="font-weight: bold;">Confirm Password</label>
						<input type="password" name="txtcpasswd" placeholder="Confirm Password" required class="form-control" />
					</div><br>

					<div class="form-group">
						<input type="submit" name="update" value="Update" class="btn btn-primary" />
					</div><br><br>
					            </div>
				            </fieldset>
			            </form><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- if ($chk_error) {
					echo "<span class = 'text-danger'>" . $err_msg . "</span>";
				} else {
					if (isset($success_msg)) {
						echo "<span class = 'text-success'>" . $success_msg . "</span>";
					}
				} -->
</body>
</html>
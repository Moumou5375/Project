<?php 
	include_once "db_plan.php";

	$chk_error = false;

	//check if from is submittion 
	if (isset($_POST['signup'])) {
		$user_name = $_POST['txtName'];
		$user_email = $_POST['txtEmail'];
		$user_passwd = $_POST['txtpasswd'];
		$user_cpasswd = $_POST['txtcpasswd'];
		$user_branch = $_POST['dropbranch'];


		//validation input fields
		// if (!preg_match("/^[a-zA-Z\s]+$/", $user_name)) {
		// 	#code if not match
		// 	$chk_error = true;
		// 	$err_msg = "First name must contain only alphabets and space"; 
		// }
		// if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
		// 	#code if not match
		// 	$chk_error = true;
		// 	$err_msg = "Please enter valid E-mail"; 
		// }
		if (strlen($user_passwd) < 8) {
			#code if not match
			$chk_error = true;
			$err_msg = "Password must be minimum of 8 characters"; 
		}
		//validation password as so as cfpassword 
		if ($user_passwd != $user_cpasswd) {
			#code if not match
			$chk_error = true;
			$err_msg = "Password don't match confirm password"; 
		}
		//insert into users table in database
		if ($chk_error == false) {
			// $chk_name = "SELECT Name,password FROM users WHERE Name = '". $user_name ."'" ;
			// $chk_pass = "SELECT password FROM users WHERE password = '". md5($user_passwd) ."'";
			// $re_chkn = mysqli_query($con, $chk_name);
    		// if($re_chk > 0){
			// 	$chk_error = true;
			// 	$err_msg = "this name already used.";
    		// 	} else {
				$SQL = "INSERT INTO bis(Course_ID,Course_Name,Credit,Semester,Education_level,Teachers) VALUES('" . $user_name . "','" . $user_email . "','" . md5($user_passwd) . "','" . ($user_branch) . "')";
				if (mysqli_query($con, $SQL)) {
					// insert success
					$success_msg = "Successfully registered, you can login";
				} else {
					// insert error
					$chk_error = true;
					$err_msg = "Insert error! Please contact admin."; 
				}
			}
		}
	// }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="17x16" href="picture/logo.png">
    <title>Registering</title>
    <link rel="stylesheet" href="CSS/mainUVT.css">
	<link rel="stylesheet" href="CSS/phpstyle.css">
	<style>
        .row {justify-content: center;}
    </style>
	<!-- <link href=""> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		function accept(id) {
			if (confirm("Are you sure to delete this user?")) {
        	;
        	}
		};
 </script>
	</script>
</head>
<body>
<?php
	if ($chk_error) { ?>
		<div class="alert alert-danger d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					<?php echo $err_msg ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.location = 'signup_user.php'" style = "justify-content: right;"></button></button>
			  </div>
	<?php } else { 
		if (isset($success_msg)) {?> 
			<div class="alert alert-success d-flex align-items-center" role="alert"> 
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						<?php echo $success_msg ?> 
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.location = 'signin_user.php'" style = "justify-content: right;"></button>
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
                    <button type="button" class="btn" id ="b1" onclick="document.location = 'signin_user.php'">Sign in</button>
					<button type="button" class="btn" id ="b2" onclick="document.location = 'Course_FMS.html'">< Back</button>
                </div>
            </nav><br><br>
            <div class="container">
	            <div class="row">
		            <div class="col-xl-4 col-lg-4 col-md-4 col-md-offset-4 well" id="sign"><br>
			            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform"> <!--action = "register.php"!-->
				            <fieldset>
					            <legend>Sign Up</legend>
								<br>
					            <div class="form-group">
						            <label for="txtName">Name</label>
						            <input type="text" name="txtName" placeholder="EX.Muthita Phuttha" required maxlength="30" value="" class="form-control" />
					            </div><br>
					            <div class="form-group">
						            <label for="txtEmail">Email</label>
						            <input type="email" name="txtEmail" placeholder="EX.xxxxx@gmail.com" required  maxlength="30" value="" class="form-control" />
					            </div><br>
					            <div class="form-group">
						            <label for="txtpasswd">Password</label>
						            <input type="password" name="txtpasswd" placeholder="Password" required maxlength="12" class="form-control" />
					            </div><br>
					            <div class="form-group">
						            <label for="txtcpasswd">Confirm Password</label>
						            <input type="password" name="txtcpasswd" placeholder="Confirm Password" required class="form-control" />
					            </div><br>
								<div class="form-group">
						            <label for="dropbranch">Choose a field of study</label>
									<select name="dropbranch" required class="form-control">
  										<option value="BIS">Business Information System</option>
  										<option value="MRK">Marketing</option>
  										<option value="MICE">MICE</option>
  										<option value="FIN">Financial</option>
									</select><br>
					            </div>
					            <div class="form-group">
						            <input type="submit" name="signup" value="Sign Up" class="btn btn-primary">
								</div><br><br>
					            </div>
				            </fieldset>
			            </form><br><br>
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
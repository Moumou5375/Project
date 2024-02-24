<?php
	session_start();
	include_once "db_plan.php";

	if (isset($_SESSION["user_id"])) {
		//back to index.php
		header("location: show_stu.php");
	}

	//เชื่อมต่อกับ Database

	//check if form is submitted
	if (isset($_POST['login'])) {
		$user_email = $_POST['txtEmail'];
		$user_passwd = $_POST['txtpasswd'];
		$SQL = "SELECT * FROM users WHERE Email = '". $user_email . "' AND password = '" . md5($user_passwd) . "'";
		$result = mysqli_query($con, $SQL);
		if ($row = mysqli_fetch_array($result)) {
			//email & passwd correct -> index.php
			$_SESSION["user_id"] = $row["ID"]; 		
			$_SESSION["user_name"] = $row["Name"];
			header("location: show_stu.php"); 
		} else {
			//email & passwd incorrect
			$err_msg = "Email or Password incorrect";
		}
	}
?>

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
		body {
			/* font-family: 'Kanit', sans-serif; */
            background-image: url('picture/22.jpg');
            /* background-size: cover; */
            background-repeat: no-repeat;
		    background-attachment: fixed; 
		    background-size: 100% 100%;
		}

    </style>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="CSS/nav.css">
	<!-- <link href=""> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		function accept() {
			// alert("Are you sure you want to save the information");
		}
	</script>
</head>
<body>
<div class="row1">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<?php
			if (isset($err_msg)) { ?>
				 <div class="alert alert-danger alert-dismissible fade show" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					<strong><?php echo $err_msg ?></strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.location = 'signin_user.php'" style = "justify-content: right;"></button></button>
			  	</div>
				<?php } ?>
            <nav class="navbar">  <!--style="background-color: #000407;"!-->
                <div class = "div1">
                    <a class="navbar-brand" href="mainUVT.html">
                    <img src="picture/logo.png" alt="" width="170px" height ="120PX" id="img2"></img></a>
                </div>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end" id ="div2">
                    <button type="button" class="btn" id ="b1" onclick="document.location = 'signin_user.php'">Sign in</button>
					<button type="button" class="btn" id ="b2" onclick="document.location = 'Course_FMS.html'">< Back</button>
                </div>
            </nav><br><br><br><br>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 well" id="sign">
						<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform"> <!--or action = "login.php" !--> 
							<fieldset><br>
								<legend style="font-weight: bold;">Login</legend>
									<div class="form-group">
										<label for="txtEmail" style="font-weight: bold;">Email</label>
										<input type="text" name="txtEmail" placeholder="Your Email" required class="form-control" />
									</div><br>
									<div class="form-group">
										<label for="txtpasswd" style="font-weight: bold;">Password</label>
										<input type="password" name="txtpasswd" placeholder="Your Password" required class="form-control" />
									</div><br>
									<div class="form-group">
										<input type="submit" name="login" value="Login" class="btn btn-primary" />
									</div>
							</fieldset>
						</form>
						<div>if you are admin please <a href="admin.php" style="text-decoration: none; color:chocolate; font-weight: bold; font-size: 25px;">click here</a></div><br>
			<!-- <span class = 'text-danger'>
				<?php 
					// if (isset($err_msg)) {
					// 	echo $err_msg;
					// } 
				?></span> -->
		</div>
	</div>
	<!-- <div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		New User? <a href="register.php">Sign Up Here</a>
		</div> -->
	</div>
</div>
</body>
</html>

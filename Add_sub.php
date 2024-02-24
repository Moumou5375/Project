<?php 
	include_once "db_plan.php";

	//check if from is submittion 
	if (isset($_POST['add'])) {
		$ID_course = $_POST['txtID'];
		$Name_course = $_POST['txtsub'];
		$credit = $_POST['numCR'];
		$type = $_POST['dropcourse'];
		$adj = $_POST['txtaddj'];
        $dec = $_POST['txtdec'];
        $note = $_POST['txtnote'];
		$SQL = "INSERT INTO course(ID_course, Name_course, Credit, Type_course, Recom_course, Scoring_criteria, note) 
                VALUES('" . $ID_course . "','" . $Name_course . "','" . $credit . "','" . $type . "','" . $adj . "','" . $dec . "','" . $note . "')";
		if (mysqli_query($con, $SQL)) {		
			$success_msg = "Successfully registered, you can login";
		} else {
			$err_msg = "Insert error! Please contact admin."; 
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
	<link rel="stylesheet" href="CSS/nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
	<style>
        .row {justify-content: center;}
        form {
            font-family:'Kanit', sans-serif;
        }
        body {background-color: #edecd9;}

    </style>
	<!-- <link href=""> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		// function accept(id) {
		// 	if (confirm("Are you sure to delete this user?")) {
        // 	;
        // 	}
		// };
 </script>
	</script>
</head>
<body id="bodyc">
<?php
	if (isset($err_msg)) { ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					<strong><?php echo $err_msg ?></strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.location = 'Add_sub.php'" style = "justify-content: right;"></button></button>
			  </div>
	<?php } else { 
		if (isset($success_msg)) {?> 
			<div class="alert alert-success alert-dismissible fade show" role="alert"> 
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						<strong><?php echo $success_msg ?> </strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.location = 'index.php'" style = "justify-content: right;"></button>
					</div>
					<?php }
	 } ?>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <nav class="navbar" id="barc">  <!--style="background-color: #000407;"!-->
                <div class = "div1">
                    <a class="navbar-brand" href="index.php">
                    <img src="picture/logo3.png" alt="" width="120px" height ="80PX" id="img2"></img></a>
                </div>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end" id ="div2">
                    <button type="button" class="btn" id ="b1" onclick="document.location = 'signup_user.php'">Sign up</button>
					<button type="button" class="btn" id ="b2" onclick="document.location = 'signin_user.php'">Sign in</button>
                </div>
            </nav><br><br>
            <div class="container">
	            <div class="row">
		            <div class="col-xl-8 col-lg-8 col-md-8 col-md-offset-6 well" id="sign1"><br>
			            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="addsubform"> <!--action = "register.php"!-->
				            <fieldset>
					            <legend style="font-weight: bold;">Add course</legend>
								<br>
					            <div class="form-group">
						            <label for="txtID" style="font-weight: bold;">รหัสรายวิชา</label>
						            <input type="text" name="txtID" placeholder="Ex. xxx-xxx " maxlength="10" value="" class="form-control" />
					            </div><br>
								<div class="form-group">
									<label for="txtsub" style="font-weight: bold;">ชื่อรายวิชา</label>
						            <input type="text" name="txtsub" placeholder="EX.อังกฤษกันทุกวัน (ENGLISH EVERYDAY)" maxlength="100" value="" class="form-control" />
								</div>
					            <div class="form-group">
						            <label for="numCR" style="font-weight: bold;">หน่วยกิต</label>
						            <input type="number" name="numCR" placeholder="Credit"  maxlength="10" value="" class="form-control" />
                                </div><br>
								<div class="form-group">
								<label for="dropcourse" style="font-weight: bold;">ประเภทรายวิชา</label>
						            <select name="dropcourse"  class="form-control">
  										<option value="รายวิชาเลือกทั่วไป">รายวิชาเลือกทั่วไป</option>
  										<option value="รายวิชาเลือกเสรี">รายวิชาเลือกเสรี</option>
									</select><br>
								</div>
					            <div class="form-group">
						            <label for="txtaddj" style="font-weight: bold;">คำแนะนำรายวิชา</label>
									<textarea name="txtaddj" maxlength="12" class="form-control"></textarea>
					            </div><br>
					            <div class="form-group">
						            <label for="txtdec" style="font-weight: bold;">เกณฑ์การให้คะแนน</label>
									<textarea name="txtdec" maxlength="200" class="form-control"></textarea>
					            </div><br>
								<div class="form-group">
                                    <label for="txtnote" style="font-weight: bold;">หมายเหตุ</label>
									<textarea name="txtnote" maxlength="200" class="form-control"></textarea>
					            </div><br>
					            <div class="form-group">
						            <input type="submit" name="add" value="Add course" class="btn btn-primary">
								</div><br><br>
					            </div>
				            </fieldset>
			            </form><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br>
	<!-- if ($chk_error) {
					echo "<span class = 'text-danger'>" . $err_msg . "</span>";
				} else {
					if (isset($success_msg)) {
						echo "<span class = 'text-success'>" . $success_msg . "</span>";
					}
				} -->
</body>
</html>
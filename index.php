<?php 

include_once("db_plan.php");
?>
<title>แนะนำรายวิชาเลือกในมหาวิทยาลัยสงขลานครินทร์ วิทยาเขตหาดใหญ่</title>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="17x16" href="picture/logo.png">
	<title>แนะนำรายวิชาเลือกในมหาวิทยาลัยสงขลานครินทร์</title>
	<link rel="stylesheet" href="CSS/mainUVT.css">
	<link rel="stylesheet" href="CSS/phpstyle.css">
	<link rel="stylesheet" href="CSS/nav.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="getData.js"></script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@700&family=Noto+Serif+Thai:wdth,wght@90.3,313&family=Playfair+Display:wght@600&display=swap');
	</style>
	<style>
		body {
		font-family: 'Kanit', sans-serif;
		color: black;
		background-color: #edecd9;
		}
		#b1 {
    	font-weight: bolder;
   		margin-top:  7px;
    	margin-left: 7px;
    	margin-right: auto;
    	background-color: rgb(255, 247, 0);
		}	
		#b2 {
    	font-weight: bolder;
    	margin-top:  7px;
    	margin-right: 70px;  
    	margin-left: 10px;
    	background-color: rgb(252, 252, 252)}
		.button2 {
    	display: inline-block;
    	padding: 5px 25px;
    	margin-left: 110px;
    	font-size: 16px;
    	cursor: pointer;
    	text-align: center;
    	text-decoration: none;
    	outline: none;
    	color: aliceblue;
    	background-color: #d16200;
    	border: none;
    	border-radius: 10px;
    	box-shadow: 0 4px #999;
    	margin-top: 15px;
    	justify-content: center;
}
#p1:hover {
            transform: scale(1.10);
        }

.button2:hover {background-color: #d6d303}
.button2:active {
        background-color: #dae202;
        box-shadow: 0 5px #1e1d1d;
        transform: translateY(4px);
}
	</style>
</head>
<body style="background-color: #edecd9;">
<nav class="navbar" id="barc">  <!--style="background-color: #000407;"!-->
<div></div>
	<div class="d-grid gap-2 d-md-flex justify-content-md-end" id ="div2">
                    <button type="button" class="btn" id ="b1" onclick="document.location = 'signup_user.php'">Sign Up</button>
                    <button type="button" class="btn" id ="b2" onclick="document.location = 'signin_user.php'">Sign in</button>
                </div>
</nav>
<br>
<div class="container" style="text-align: center;">
<a href="mainUVT.html"><img src="picture/logo.png" id="p1" width="250px" height="170px" /></a>
	<h2 >แนะนำรายวิชาเลือกในมหาวิทยาลัยสงขลานครินทร์ วิทยาเขตหาดใหญ่</h2>
	<h4 >
Introducing elective courses in Prince of Songkla University Hat Yai Campus</h4>		
	<div ><br>
        <h2>
			<select id="course" class="form-control" >
				<option value="" selected="selected">ค้นหารายวิชา</option>
				<?php
				$sql = "SELECT ID_course, Name_course, Credit, Type_course,Recom_course,Scoring_criteria,note FROM course";
				$resultset = mysqli_query($con, $sql);
				while( $rows = mysqli_fetch_assoc($resultset) ) { 
				?>
				<option value="<?php echo $rows["ID_course"]; ?>"><?php echo $rows["Name_course"]; ?></option>
				<?php }	?>
			</select>
        </h2>	
    </div>	
	<div class="hidden" id="errorMassage"></div>
	<table class="table table-striped hidden" id="recordListing"  class="table table-hover">
		<thead>
		  <tr style="color: black; border-radius: 2px;">
			<th style="text-align:center;">รหัสวิชา</th>
			<th style="text-align:center;">ชื่อวิชา</th>
			<th style="text-align:center;">หน่วยกิต</th>
			<th style="text-align:center;">ประเภทรายวิชา</th>
			<th style="text-align:center;">คำแนะนำรายวิชา</th>
			<th style="text-align:center;">เกณฑ์การให้คะแนน</th>
			<th style="text-align:center;">หมายเหตุ</th>
		  </tr>
		  <tr>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td id="CourseId" width = "50" style="text-align:center;"></td>
			<td id="CourseName"  width = "80" ></td>
			<td id="CourseCredit"  width = "10" style="text-align:center;"></td>
			<td id="CourseType" width = "40" style="text-align:center;" ></td>
			<td id="CourseRecom" width = "110" ></td>
			<td id="CourseScoring" width = "90" ></td>
			<td id="Coursenote"width = "40" style="text-align:center;"></td>
		  </tr>
		  <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                    </table>
                </div>
		</tbody>			
	</table> 
</div>
<div style="width:93%;text-align:center;">
	<button class="button2" onclick="document.location = 'Add_sub.php'">Add Course</a></button> 
</div><br><br>


</body>
</html>


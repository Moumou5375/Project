<?php
		session_start();
		include_once 'db_plan.php';
        $SQL = "SELECT administration.Ad_ID, users.Name FROM administration INNER JOIN users WHERE administration.Abbrev = users.Abbrev";      
        $res = mysqli_query($con, $SQL);
        if ($row = mysqli_fetch_assoc($res)) {
            $br_id = $row["Ad_ID"];
            $sql = "SELECT * FROM bis WHERE Ad_ID = '" . $br_id . "' AND Education_level = '1'";
            $result = mysqli_query($con, $sql);}
        
        if (isset($_GET["ID_c"])) {
            echo $_GET["ID_c"];
            $SQL = "DELETE FROM bis WHERE ID = " . $_GET["ID_c"] ;
            mysqli_query($con, $SQL);
            header("Location: y1.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body style="background-color:rgb(240, 234, 246);" class="font">
    <div class="row1">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <nav class="navbar" id="barc">  <!--style="background-color: #000407;"!-->
                <div class = "div1">
                    <a class="navbar-brand" href="show_stu.php">
                    <img src="picture/logo3.png" alt="" width="100px" height ="65PX" id="img2"></img></a>
                </div>
                <div class="nav justify-content-end">
                    <?php 
					if (isset($_SESSION["user_id"])) { ?>
                        <span class="navbar-text" style="font-weight: bolder; margin-top: 0px; margin-right: 30px; color:aliceblue;"><?php echo $_SESSION["user_name"]; ?></span>
						<span class="navbar-text"><a href="signout_user.php" style="text-decoration: none; font-weight: bolder; margin-top: 10px; margin-right: 40px; color:aliceblue;">Sign Out</a></span>
                    <?php } ?>  
                </div>
                <!-- <div>
                    <button type="button" class="btn" id ="b2" onclick="document.location = 'signin_user.php'">< Back</button>
                </div> -->
            </nav>
            <div class="row" style="border-radius: 10px; justify-content: left ;display: flex; margin-left: 2px; margin-top: 7px">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5" id="col2"><br>
                    <a class="highlight" href="#" onclick="document.location = 'y1.php'" style="text-decoration: none;"><div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;">วิชาเรียนปีที่ 1</div></a>
                    <a href="#" onclick="document.location = 'y2.php'" style="text-decoration: none;"><div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;">วิชาเรียนปีที่ 2</div></a>
                    <a href="#" onclick="document.location = 'y3.php'" style="text-decoration: none;"><div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;">วิชาเรียนปีที่ 3</div></a>
                    <a href="#" onclick="document.location = 'y4.php'" style="text-decoration: none;"><div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;">วิชาเรียนปีที่ 4</div></a>
                    <!-- <div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;"><a>วิชาเลือกศึกษาทั่วไป</a></div>
                    <div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;"><a>วิชาเลือกเสรี</a></div>
                    <br> --> <br>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-5" id="col3" style="margin-left: 50px; margin-top: 5px">
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2">
                                <legend style="text-align: center;">สวัสดีชาว BIS</legend>
                                    <div class="table-responsive">
                                        <table class="table" style="border-spacing: 30px;">
                                            <!-- <thead>
                                                <tr>
                                                    <th style="text-align:center">User Name</th>
                                                    <th colspan="2" style="text-align:center">E-Mail</th>
                                                    <th colspan="2" style="text-align:center">Actions</th>
                                                </tr>
                                            </thead> -->
                                        <tbody>
                                        <!-- <a href="#" onclick="show_sub(<?php echo $row['ID']; ?>)"> -->
                    <?php
                        while ($rows = mysqli_fetch_assoc($result)) { ?>
                        <tr style="font-size:medium;" >
                        <td style="text-align:center; background-color: aliceblue;"><?php echo $rows["Course_ID"]?></td> 
                        <td style="background-color: aliceblue;"><?php echo $rows["Course_Name"]?></td>
                        <td style="text-align:center;background-color: aliceblue;"><a href="#" onclick="delete_sub(<?php echo $rows['ID']; ?>)"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td>
                        </tr>
                            <!-- <td><a href="#" onclick="delete_sub(<?php echo $rows['ID']; ?>)"><i class="fa-solid fa-trash" style="color: #ff0000;"></i>Delete</a></td> -->
                            <!-- <td colspan="3" style="background-color: aliceblue;"></td> -->
                            <!-- <td><a href="#" onclick="update_user(<?php echo $row['ID']; ?>)"><i class="fa-solid fa-pencil"></i>Update</a></td>
                            <td><a href="#" onclick="delete_user(<?php echo $row['ID']; ?>)"><i class="fa-solid fa-trash" style="color: #ff0000;"></i>Delete</a></td>
                        </tr>
                  }} -->
                 <?php  } ?>  
                    </tbody>
             </table>
            </div>
            <div>
                
            </div>
         </div>
     </div>
 </div>
                    
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script>
    function delete_sub(id) {
        if (confirm("Are you sure to you studied this course?")) {
            window.location.href = "y1.php?ID_c=" + id;
        }
    }
    </script>
</body>
</html>

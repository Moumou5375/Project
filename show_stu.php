<?php
		session_start();
		include_once 'db_plan.php';
        
        if (isset($_SESSION["user_id"])) {
            //email & passwd correct -> index.php
            // $_SESSION["user_name"] = $row["Name"];
            // if ()
            $SQL = "SELECT administration.Ad_ID, users.Name FROM administration INNER JOIN users WHERE administration.Abbrev = users.Abbrev";      
            $res = mysqli_query($con, $SQL);
            while ($row = mysqli_fetch_array($res)) {
                $br_id = $row["Ad_ID"];
                $sql = "SELECT * FROM bis WHERE Ad_ID = '" . $br_id . "'";
                $result = mysqli_query($con, $sql);
            }
        }
// ?>

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
    <style>
        .button1 {
            display: inline-block;
            padding: 5px 25px;
            margin-left: 105px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: aliceblue;
            background-color: #d12600;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px #999;
            justify-content: center;
        }

        .button1:hover {background-color: #3e8e41}
        .button1:active {
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
}
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

.button2:hover {background-color: #d6d303}
.button2:active {
        background-color: #dae202;
        box-shadow: 0 5px #1e1d1d;
        transform: translateY(4px);
}
#ck {
    transition: all 0.3s;
}
#ck1:hover {
    transform: scale(1.10);
}
    </style>
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

                    <a href="#" onclick="document.location = 'y1.php'" style="text-decoration: none;"><div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;">วิชาเรียนปีที่ 1</div></a>
                    <a href="#" onclick="document.location = 'y2.php'" style="text-decoration: none;"><div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;">วิชาเรียนปีที่ 2</div></a>
                    <a href="#" onclick="document.location = 'y3.php'" style="text-decoration: none;"><div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;">วิชาเรียนปีที่ 3</div></a>
                    <a href="#" onclick="document.location = 'y4.php'" style="text-decoration: none;"><div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;">วิชาเรียนปีที่ 4</div></a>
                    <?php if (isset($_SESSION["user_id"])) {
                            $SQL = "SELECT * FROM users ORDER BY ID ASC";      
                            $res = mysqli_query($con, $SQL);
                            while ($row = mysqli_fetch_assoc($res)) {
                                if ($row['ID'] == $_SESSION["user_id"]){ ?> 
                                <button class="button1" onclick="update_user(<?php echo $row['ID']; ?>)">Update your profile</a></button>
                    <!-- <div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;"><a>วิชาเลือกศึกษาทั่วไป</a></div>
                    <div style="background-color: rgb(28, 0, 55); padding: 1rem; border-radius: 2px; color:aliceblue; margin: 0.5em; text-align: center;"><a>วิชาเลือกเสรี</a></div>
                    <br> --> <?php }}} ?><br>
                    <!-- <a><button class="button2" onclick="document.location = 'Add_bis.php'">Add Course</a></button> </a> -->
                </div>
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-5" id="col3" style="margin-left: 50px; margin-top: 5px">
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2">
                                <legend style="text-align: center; font-weight:bolder;">สวัสดีชาว BIS คุณต้องเรียนอะไรบ้าง</legend>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                             <!-- table-hover -->
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
                        if (isset($_SESSION["user_id"])) {
                            //email & passwd correct -> index.php
                            // $_SESSION["user_name"] = $row["Name"];
                            // if ()
                            $cnt = 1;
                            $SQL = "SELECT administration.Ad_ID, users.Name FROM administration INNER JOIN users WHERE administration.Abbrev = users.Abbrev";      
                            $res = mysqli_query($con, $SQL);
                            if ($row = mysqli_fetch_assoc($res)) {
                                $br_id = $row["Ad_ID"];
                                if ($br_id == "A01")
                                    $sql = "SELECT * FROM bis WHERE Ad_ID = '" . $br_id . "'";
                                    $result = mysqli_query($con, $sql);
                                    while ($rows = mysqli_fetch_assoc($result)) { ?>
                                    <tr style="font-size:medium;" >
                                    <td style="text-align:center; background-color: aliceblue; width:15%;"><?php echo $rows["Course_ID"]?></td> 
                                    <td style="background-color: aliceblue;"><?php echo $rows["Course_Name"]?></td>
                                    <?php $cnt= $cnt + 1; ?>
                            <!-- <td colspan="3" style="background-color: aliceblue;"></td> -->
                            <!-- <td><a href="#" onclick="update_user(<?php echo $row['ID']; ?>)"><i class="fa-solid fa-pencil"></i>Update</a></td>
                            <td><a href="#" onclick="delete_user(<?php echo $row['ID']; ?>)"><i class="fa-solid fa-trash" style="color: #ff0000;"></i>Delete</a></td> -->
                            <?php }} else { 
                                $sql = "SELECT * FROM mrk  WHERE Ad_ID = '" . $br_id . "'";
                                $result = mysqli_query($con, $sql);
                                while ($rows = mysqli_fetch_assoc($result)) { ?>
                                <tr style="font-size:medium;">
                                <td style="text-align:center; background-color: aliceblue; width:15%;"><?php echo $rows["Course_ID"]?></td> 
                                <td style="background-color: aliceblue;"><?php echo $rows["Course_Name"]?></td> 
                                <?php $cnt= $cnt + 1; ?>
                        </tr>
                 <!-- }} -->
                 <?php }}}?>  
                    </tbody>
             </table>
             <span class="panel-footer"><?php echo   " พยายามเข้านักศึกษา!!!! เหลืออีก " . $cnt . " รายวิชา."; ?></span>
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
        function update_user(id) {
            window.location.href = "update_user.php?user_id=" + id;
        }
        function add_sub(id) {
            window.location.href = "Add_bis.php?add_sub=" + id;
        }
    </script>
</body>
</html>
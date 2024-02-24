<?php
    //9.fetch and delete record
    session_start();
    if (!isset($_SESSION["user_id"])) {
        header("Location: admin.php");
    }

    include_once 'db_plan.php';

    // fetch records
    $SQL = "SELECT * FROM users ORDER BY ID DESC";          //เอาล่าสุดขึ้นก่อน
    $result = mysqli_query($con, $SQL);
    //display record number
    $cnt = 1;


    // delete record
    if (isset($_GET["mem"])) {
        $SQL = "DELETE FROM users WHERE ID = " . $_GET["mem"];
        mysqli_query($con, $SQL);
        header("Location: show_data.php");
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
                transform: translateY(4px);}
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
            <div class="row" style="border-radius: 10px; justify-content: center;display: flex;  margin-top: 10px; ">
                <div class="col-xl-10 col-lg-10 col-md-8 col-sm-6" id="col3" style="margin-left: 50px; margin-top: 5px">
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2">
                                <legend style="text-align: center; font-weight:bolder;">สมาชิกที่เข้ามาใช้ PLan</legend>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                             <!-- table-hover -->
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">number</th></th>
                                                    <th style="text-align:center">Name</th>
                                                    <th style="text-align:center">E-Mail</th>
                                                    <th style="text-align:center">Edition</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                
                    <?php
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr style="font-size:medium; background-color: aliceblue;" >
                                        <td style="text-align:center"><?php echo $cnt++; ?></td>
                                        <td style="background-color: aliceblue; width:15%;"><?php echo $row["Name"]?></td> 
                                        <td style="background-color: aliceblue; text-align:center"><?php echo $row["Email"]?></td>
                                        <td style="background-color: aliceblue; text-align:center"><a href="#" onclick="delete_member(<?php echo $row['ID']; ?>)"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td>
                                    </tr>
                    <?php }?>  
                    </tbody>
             </table>
             <span class="panel-footer"><?php echo   " สมาชิก " . $cnt-1 . " คน"; ?></span>
             <br>
            </div><br>
            <div>
                
            </div>
         </div>
     </div>
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
    function delete_member(id) {
        if (confirm("Are you sure to you delete this member?")) {
            window.location.href = "show_data.php?mem=" + id;
        }
    }
    </script>
</body>
 </html>

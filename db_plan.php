<?php
    //connect to mysql database
    $host = "localhost";
    $db_user = "root";
    $db_passwd = "DB-v',6Tb9k"; 
    $db_name = "plan";
    $con = mysqli_connect($host, $db_user, $db_passwd, $db_name) or die("Error: ไม่สามารถเชื่อมต่อฐานข้อมูลได้" . mysqli_error($con));
?> 

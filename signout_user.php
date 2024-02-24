<?php
	//16.clear sessions
	session_start();

	if (isset($_SESSION["user_id"])) {
		session_destroy();
		unset($_SESSION["user_id"]);
		unset($_SESSION["user_name"]);
		header("Location: Course_FMS.html");
	} 
	else {
		header("Location: Course_FMS.html");
	}
?>

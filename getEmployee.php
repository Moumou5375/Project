<?php
include_once("db_plan.php");
if($_REQUEST['empid']) {
	$sql = "SELECT ID_course, Name_course, Credit, Type_course,Recom_course,Scoring_criteria,note
	FROM course
	WHERE ID_course='".$_REQUEST['empid']."'";
	$resultSet = mysqli_query($con, $sql);	
	$courseData = array();
	while( $emp = mysqli_fetch_assoc($resultSet) ) {
		$courseData = $emp;
	}
	echo json_encode($courseData);
} else {
	echo 0;	
}
?>

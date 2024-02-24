$(document).ready(function(){  	
	$("#course").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'empid='+ id;    
		$.ajax({
			url: 'getEmployee.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(courseData) {
			   if(courseData) {
					$("#errorMassage").addClass('hidden').text("");
					$("#recordListing").removeClass('hidden');							
					$("#CourseId").text(courseData.ID_course);
					$("#CourseName").text(courseData.Name_course);
					$("#CourseCredit").text(courseData.Credit);
					$("#CourseType").text(courseData.Type_course);
					$("#CourseRecom").text(courseData.Recom_course);
					$("#CourseScoring").text(courseData.Scoring_criteria);
					$("#Coursenote").text(courseData.note);				
				} else {
					$("#recordListing").addClass('hidden');	
					$("#errorMassage").removeClass('hidden').text("");
				}   	
			} 
		});
 	}) 
});


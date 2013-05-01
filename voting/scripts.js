function getfunction(data) {
	$.get("nameSubmission.php?"+data);
				
}


function init() {
		console.log("narp");
	 	$(function(){
	 		
		    $(".name").click(function() {
		        getfunction($(this).find(".nam2").text());
		    });
		    
		});		
	}
	
	
init();
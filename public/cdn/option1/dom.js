$( document ).ready(function() {
    
	console.log( "page loaded" );
	
	def_config_page_control();
});


function def_config_page_control(){
	
	//adding functionality to change display of the page control
	$("#get_page_control").click(function(e){
		
		if($("body").hasClass("show_page_control")){
			
			e.preventDefault();
			$("body").removeClass("show_page_control");
			
		}
		else{
			
			$("body").addClass("show_page_control");
		
		}
		
	});
}
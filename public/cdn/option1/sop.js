$( document ).ready(function() {
    
	console.log( "SOP Search loaded" );
	
	
	
});

function ajax_sopSearch_cb(ajx){
	
	if(typeof(ajx["search_results"])!== "undefined"){
		
		
		$("#work_area > .container-fluid")
			.html(ajx["search_results"])
			.each(function(){
				
				dom_config_elements($(this));
				
				
				alert(ajx["ajax_form"]);
			})
		;
	}
	
	
}

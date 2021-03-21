var
unnamed_element = 0
,ajax_elements = []
,child_tabs = []
;

$( document ).ready(function() {
    
	console.log( "page loaded" );
	dom_config_elements($("body"));
	dom_config_page_control();
});


function dom_config_elements(parent_con){
	
	dom_check_element_name(parent_con);	
	
	console.log("configuring child elements of " + parent_con.prop("id"));
	
	parent_con.find("*").each(function(){
		
		dom_check_element_name($(this));
		
		if($(this).hasClass("ajax_form")){	dom_config_ajax($(this));	}
		
		if($(this).hasClass("a_child_tab")){	dom_config_child_tab($(this));	}
		
	});
}

//adding functionality for page_control container
function dom_config_page_control(){
	
	//toggling display/hide
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

//receiving an element, if the id property is not populated then it is assigned an id
function dom_check_element_name(check_element){
	
	if(check_element.prop("id") == ""){
		unnamed_element++;
		check_element.prop("id","anon_" + unnamed_element.toString());
	}
}

//configuring a form to make an ajax call and return it to a callback function
function dom_config_ajax(use_form){
	
	dom_check_element_name(use_form);	//checking/getting a name
	console.log("configuring ajax functionality for #" + use_form.prop("id"));
	
	
	//each submit will check the ajax_* tags and base the decision to submit on that
	use_form
	.unbind("submit")
	.submit(function(e){
		
		var
		ajax_url = ""
		,ajax_action = ""
		,ajax_precall = ""
		,ajax_callback = ""
		,cancel_submit = 0
		;
				
		e.preventDefault();
		
		//checking if a PHP action is there, if it is then we will default the callback to its name + "_cb" 
		if(use_form.prop("action") == ""){
			console.log("Cannot submit #" + use_form.prop("id") + ", no action/URL was specified");
			cancel_submit++;
		}
		else{
			ajax_url = use_form.prop("action");
		}
		
		//checking if a PHP action is there, if it is then we will default the callback to its name + "_cb" 
		if(use_form.find(".ajax_action").length!== 1 || use_form.find(".ajax_action").val() == ""){
			console.log("Cannot submit #" + use_form.prop("id") + ", no ajax_action was specified");
			cancel_submit++;
		}
		else{
			ajax_callback = use_form.find(".ajax_action").val() + "_cb";
		}
		
		//if there is a specified callback then this will supercede [ajax_action]_cb
		if(use_form.find(".ajax_callback").length == 1 && use_form.find(".ajax_callback").val()!== ""){
			ajax_callback = use_form.find(".ajax_callback").val();
		}
		
		//checking if the callback value exists
		if(ajax_callback!== "" && typeof(window[ajax_callback])!== "function"){
			console.log("Cannot submit #" + use_form.prop("id") + ", the ajax_callback '" + ajax_callback + "' could not be found");
			cancel_submit++;
		}
		
		//checking if a function exists to run prior to the ajax call (display a spinner, disable an input etc)
		if(use_form.find(".ajax_precall").length == 1 && use_form.find(".ajax_precall").val()!== ""){
			ajax_precall = use_form.find(".ajax_precall").val();
			if(typeof(window[ajax_precall])!== "function"){
				console.log("Cannot submit #" + use_form.prop("id") + ", the ajax_precall '" + ajax_precall + "' could not be found");
				cancel_submit++;
			}
		}
		
		//iterating through the ajax_elements array to determine whether the form is currently submitting (only one submit at a time!)
		ajax_elements.forEach(check_submitters)
		
		
		//if everything so far checks out then add the form id to 
		//array of active ajax calls, then serialize + submit the form
		//success response will then 
		if(cancel_submit < 1){
			
			ajax_elements.push(use_form.prop("id"));
			
			if(window[ajax_precall]!== "" && typeof(window[ajax_precall]) == "function"){
				window[ajax_precall]();
			}
			
			console.log("Sending #" + use_form.prop("id") + " to ajax");
			
			$.ajax
			({
				
				url:	ajax_url
				,data:	use_form.serialize() 
					
				,error:
					function(){
						clean_submitters();
						console.log("ajax call failed for #" + use_form.prop("id"));
					}
				
				,dataType:	"json"
				
				,success:
					function(data){
						clean_submitters();
						ajax_response_handle(data);
						window[ajax_callback](data);
						
						
					}
				,type: "POST"
			});	
		}
		
		function check_submitters(value,index,array){
			if(value == use_form.prop("id")){
				cancel_submit++;
				console.log("#" + use_form.prop("id") + " was already submitting");
			}
		}
		
		function clean_submitters(){
			var new_list = [];
			console.log("cleaning ajax_elements: " + ajax_elements);
			ajax_elements.forEach(cleaning);
			function cleaning(value,index,array){
				if(value!== use_form.prop("id")){
					new_list.push(value);
				}
			}
			ajax_elements = new_list;		
			console.log("ajax_elements cleaned: " + ajax_elements);
		}
		
		function ajax_response_handle(ajx){
			
			//alert(typeof(ajx));
			Object.assign(ajx,{ajax_form: "#" + use_form.prop("id")});
			
			if(typeof(ajx["console"])!== "undefined" && ajx["console"].length >= 1 && ajx["console"]!== ""){
				console.log("ajax message for #" + use_form.prop("id") + ":\r\n" + ajx["console"]);
			}
			
			if(typeof(ajx["console-dir"])!== "undefined" && ajx["console-dir"].length >= 1){
				console.dir(ajx["console-dir"]);
			}
			//console.clear();
		}
	});
}

function dom_config_child_tab(anchor){
	
	//alert("configuring child tab process for " + anchor.prop("id"));
	
	anchor
	.unbind("click")
	.click(function(e){
		
		e.preventDefault();
		
		alert(anchor.attr("href"));
		
		var
		new_window = window.open(anchor.prop("href"),"_blank");
		
		child_tabs.push(new_window);
		
		console.dir(child_tabs);
		
	})
		
}
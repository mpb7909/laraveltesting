<?php


namespace App\Http\Controllers\option1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class serviceControl extends Controller
{
    
	public
	$req					//will populate this with the Request details 
	,$path					//this will be an array representing each segment in the path
	,$service				//identifying the service of the path
	,$arg					//this will be an array that can include any info that needs to be interpreted by view(s)
	,$ajax					//this will be an array that can include any info that needs to be interpreted by the front end
	;
	
	function __construct(Request $req){
		
		$this->req = $req;
		
		$this->arg = array();
		
		$this->check_path();
		$this->check_environment();

	}
	
	//validating the path we have received, aborting if first + second 
	//segments are not expected values (ie. included in $valid_services)
	function check_path(){
		$this->path = explode("/",$this->req->path());
		$valid_services = array("dashboard" => 1,"sop" => 1);
		
		if
		(
			!isset($this->path[0])
			|| $this->path[0]!== "option1"
			|| !isset($this->path[1])
			|| !isset($valid_services[$this->path[1]])
		)
		{		
			abort(404);
		}
		else{
			$this->service = $this->path[1];
			unset($this->path[0]);
			unset($this->path[1]);
			$this->path = array_values($this->path);
			//dd($this->path);
		}	
	}
	
	//determining if we are on live or test and setting a flag to send to the view(s)
	function check_environment(){
		
		//$this->arg["page_is_dev"] = 1;
	}
	
	/*
	The child controller class will receive a post to /ajax_handle and end at this controller action
	This action then calls the action stored as $_POST["ajax_action"] on the html form if it is received
	Action [$ajax_action] on the child controller class builds the property $this->ajax
	This controller action then returns the JSON of $this->ajax which the DOM can interpret and work with
	*/
	function ajax_handle(){
		//if we dont have an $ajax_action then "" which will build a response for the DOM console to log
		$ajax_action = $this->req->request->get("ajax_action") ?? "";				
		
		//we may want to delay the execution to ensure an event (spinner, progress bar etc) displays on screen for minimum amount of time
		$ajax_delay = $this->req->request->get("ajax_delay") ?? 0;					
		
		//setting up the default response/log for DOM
		$this->ajax["console"] = "No \$_POST[\"ajax_action\"] was specified on the form\r\n" . print_r($_POST,true);
		
		//checking if the received $ajax_action is present in class, error if not, but if it is then will execute it
		if($ajax_action!== ""){
			if(!method_exists($this,$ajax_action)){
				$this->ajax["console"] = "Could not locate the requested controller action";
			}
			else{			
				
				sleep($ajax_delay);
				
				$this->$ajax_action();		//assuming there is no need for any parameters, these will be in $this->req
			}
		}
		
		return json_encode($this->ajax);
	}
}

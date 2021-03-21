<?php

namespace App\Http\Controllers\option1;
use Illuminate\Http\Request;
//use serviceControl;

class dashboardControl extends serviceControl
{
    
	//running construct in parent class
	
	//pseudo router following construct
	function dashboardControl(){
		
		if(count($this->path) < 1){		
			$this->arg["page_control"] = 1;
				
			$this->arg["page_title"] = "Project dashboard";
			$this->arg["page_h1"] = "Project dashboard";
			return view("option1.dashboard",$this->arg);	
		}
		else{
			dd($this);
		}
	}
}

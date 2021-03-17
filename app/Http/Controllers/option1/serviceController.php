<?php

namespace App\Http\Controllers\option1;

use Illuminate\Http\Request;

class serviceController extends Controller
{
    
	var
	$vTarget
	,$vArgs
	;
	
	function __construct(){
		
		$this->vTarget = "";
		$this->vArgs = array();
		
	}
	
	// private function get_view(){
		
		// return view($vTarget,$vArgs);
	// }
}

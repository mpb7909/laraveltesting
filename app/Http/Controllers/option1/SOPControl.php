<?php

namespace App\Http\Controllers\option1;

use Illuminate\Http\Request;
use DB;


class SOPControl extends serviceControl
{
    
	
	function sopControl(){
		
		//standard sop default page
		if(count($this->path) < 1){
			return $this->sopSearch();
		}
		//ajax post
		else if($this->path[0] == "ajax_handle"){
			return $this->ajax_handle();
		}
		//ajax post
		else if($this->path[0] == "contacts" && $this->path[1] ?? -1!== -1){
			return $this->contactManage();
		}
		else{
			
			abort(404);
		}
	}
	
	
	function sopSearch(){
		
		$this->arg["page_control"] = 1;
		$this->arg["page_title"] = "SOP search";
		$this->arg["page_h1"] = "SOP search";
		
		$this->arg["page_js"] = array(0 => "/cdn/option1/sop.js");
		
		return view("option1.sop",$this->arg);	
	
	}
	
	function ajax_sopSearcha(){
		
		$search_term = $this->req->request->get("search_term") ?? "";
		
		$contacts = \DB::select(
			"call select_contacts('{$search_term}')"
		);
		
		$this->arg["contacts"] = $contacts;
		
		$this->ajax["search_results"] = view("option1.partials.sop-search-results",$this->arg)->render();
		
	}
	
	function ajax_sopSearch(){
		
		$results = array(0 => "hello world");
		$db = DB::connection('mysql');
		
		
		
		$this->ajax["search_results"] = "<pre>" . print_r($results,true);
		
	}
	
	function contactManage(){
		
		$contact_number = $this->path[1];
		
		$this->arg["page_title"] = "Contact #{$contact_number}";
		$this->arg["page_h1"] = "Contact administration > {$contact_number}";
		
		return view("option1.sop-contact-mgmt",$this->arg);	
	
	}
	
	
}

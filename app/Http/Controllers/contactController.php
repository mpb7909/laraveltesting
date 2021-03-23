<?php

namespace App\Http\Controllers;

use App\Http\Controllers\serviceController;
use Illuminate\Http\Request;

class contactController extends serviceController
{
    function contacts_search(Request $GET){
		
		$contact_search = $GET->contact_name ?? "";
		
		$contacts = \DB::select(#
			"call select_contacts('{$contact_search}')"
		);
		
		
		$this->vArgs["contacts"] = $contacts;
		
		//dd($this->vArgs);
		
		return view("contacts",$this->vArgs);
		
	}
}

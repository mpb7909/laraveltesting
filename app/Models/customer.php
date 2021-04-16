<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
	
	public static function get_customers($arg = array()){
		
		if(count($arg) == 0){
			
			return customer::take(10)->get();
			
		}
	}
	
}

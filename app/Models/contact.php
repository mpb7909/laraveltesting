<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
	
	
	protected $fillable = [
        'customer_id',
        'number',
        'name',
		'email'
    ];
	
	public static function get_contacts($arg = array()){
		
		$contacts = array();
		if(count($arg) == 0){
			
			$contacts = contact::take(10)->get();
			
		}
		
		return $contacts;
		
	}
	
}

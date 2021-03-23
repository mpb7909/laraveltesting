<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new  \App\Models\contact([
			"customer_id" => 1
			,"number" => "P00000001"
			,"name" => "Captain America"
			,"email" => "captainamerica@avengers.com"
			
		]);
		$post->save();
		
		$post = new  \App\Models\contact([
			"customer_id" => 2
			,"number" => "P00000002"
			,"name" => "Superman"
			,"email" => "clark-kent@dailyplanet.com"
			
		]);
		$post->save();
		
		$post = new  \App\Models\contact([
			"customer_id" => 2
			,"number" => "P00000003"
			,"name" => "Batman"
			,"email" => "brucew@wayne-enterprises.com"
			
		]);
		$post->save();
		
		$post = new  \App\Models\contact([
			"customer_id" => 1
			,"number" => "P00000004"
			,"name" => "Black Widow"
			,"email" => "scarlettj@marvel.net"
			
		]);
		$post->save();
		
		$post = new  \App\Models\contact([
			"customer_id" => 2
			,"number" => "P00000005"
			,"name" => "Wonder Woman"
			,"email" => "dprince@amazon.com"
			
		]);
		$post->save();
		
		$post = new  \App\Models\contact([
			"customer_id" => 1
			,"number" => "P00000006"
			,"name" => "Thor, God of Thunder"
			,"email" => "thor@asgard.ne"
			
		]);
		$post->save();
    }
}

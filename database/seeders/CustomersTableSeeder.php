<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new  \App\Models\customer([
			"number" => "AV0000001"
			,"name" => "The Avengers"
			,"posting_group" => "IND"
			,"blocked" => 0
		]);
		$post->save();
		
		$post = new  \App\Models\customer([
			"number" => "JL0000001"
			,"name" => "Justice League"
			,"posting_group" => "IND"
			,"blocked" => 0
		]);
		$post->save();
    }
}

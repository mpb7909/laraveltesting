<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('customers',function(Blueprint $table){
			$table->increments("id");
			$table->timestamps();
			$table->string("number");
			$table->string("name");
			$table->string("posting_group");
			$table->integer("blocked");

		});//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("customers");
    }
}

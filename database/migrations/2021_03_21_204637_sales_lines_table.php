<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalesLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('sales_lines',function(Blueprint $table){
			$table->increments("id");
			$table->timestamps();
			
			$table->string("sales_header_number");
			$table->integer("line_number");
			$table->integer("line_type");
			
			$table->string("item_number");
			$table->string("description");
			$table->string("description_2");
			
			$table->integer("quantity");
			$table->integer("unit_price");
			$table->integer("line_amount");
			$table->integer("line_amount_vat");
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("sales_lines");
    }
}

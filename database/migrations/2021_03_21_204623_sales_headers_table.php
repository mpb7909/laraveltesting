<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalesHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('sales_headers',function(Blueprint $table){
			$table->increments("id");
			$table->timestamps();
			
			$table->string("number");
			$table->integer("document_type");
			$table->integer("customer_id");
			$table->integer("contact_id");
			
			$table->string("external_reference");
			$table->string("shipping_reference");
			
			$table->string("bill_address");
			$table->string("bill_address2");
			$table->string("bill_city");
			$table->string("bill_county");
			$table->string("bill_postcode");
			$table->string("bill_country");
			$table->string("bill_phone");
			
			$table->string("ship_address");
			$table->string("ship_address2");
			$table->string("ship_city");
			$table->string("ship_county");
			$table->string("ship_postcode");
			$table->string("ship_country");
			$table->string("ship_phone");
			
			$table->integer("vat_rate");
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("sales_headers");
    }
}

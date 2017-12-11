<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            // unsignedBigInteger data type is better and is the same thing as
            // what I wrote below, but it's called a CONVENIENCE method and Laravel
            // is jam packed with such helpers and shortcuts
            $table->bigInteger('id', false, true)->primary();
            // really important to set the customer ID to INDEX actually, because
            // will really improve the performance when searching the db
            // This is because this is the value key that overlaps with our Customers table
            // here as well, unsignedBigInteger would have been better
            $table->bigInteger('customer_id', false, true)->index();
            $table->bigInteger('customer_address_id')->nullable();
            $table->string('email')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('postcode')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('telephone')->nullable();
            $table->string('country_id')->nullable();
            // Address type is always null, so the way to handle this case is to make it a string
            // because this is the most flexible data type and can deal with any type of data
            $table->string('address_type')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
            // There is no time stamp value that comes with our data, so what we will do
            // is add the time stamps function available with Laravel
            // BUT the difference is in our Customer addresses model, we will set our
            // timestamp as TRUE, so we are telling Laravel to manage timestamps on its own completely
            // while in cases where it comes with the data, we would want to set it to FALSE
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
}

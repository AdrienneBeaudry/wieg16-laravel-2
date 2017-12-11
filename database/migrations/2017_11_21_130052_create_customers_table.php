<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id', false, true); // the two options mean that NOT auto-increment, and UNSIGNED
            $table->string('email')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            // so little gender options, and autoincrement unsigned
            $table->tinyInteger('gender', false, true)->nullable();
            // Better  to use boolean, because only yes or no option
            // $table->boolean('customer_activated');
            $table->tinyInteger('customer_activated')->nullable();
            // Because group ID is so important, no worth it to "save" on performance
            // by choosing a smaller number because down the road this would cause huge problems
            // For example, Gangham Style on YouTube busted the INT data type, causing Youtube engineers
            // to scramble for a solution
            // $table->unsignedBigInteger('group_id');
            $table->integer('group_id', false, true);

            $table->integer('company_id')->nullable();
            $table->string('customer_company')->nullable();
            $table->integer('default_billing')->nullable();
            $table->integer('default_shipping')->nullable();
            $table->integer('is_active')->nullable();
            $table->string('customer_invoice_email')->nullable();
            $table->text('customer_extra_text')->nullable();
            // unsignedInteger would have been better, because we have one object that has the value "45"
            // and all the other objects have a value of NULL for this field.
            $table->integer('customer_due_date_period', false, true)->nullable();
            $table->integer('address_id', false, true)->nullable();
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
        Schema::dropIfExists('customers');
    }
}

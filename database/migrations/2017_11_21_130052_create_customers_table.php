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
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('customer_activated')->nullable();
            $table->integer('group_id', false, true);
            $table->integer('company_id')->nullable();
            $table->string('customer_company')->nullable();
            $table->integer('default_billing')->nullable();
            $table->integer('default_shipping')->nullable();
            $table->integer('is_active')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->string('customer_invoice_email')->nullable();
            $table->text('customer_extra_text')->nullable();
            $table->integer('customer_due_date_period', false, true)->nullable();
            $table->integer('address_id', false, true)->nullable();
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

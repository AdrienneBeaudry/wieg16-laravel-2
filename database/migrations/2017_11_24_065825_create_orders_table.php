<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('increment_id');
            $table->integer('id', false, true); // the two options mean that NOT auto-increment, and UNSIGNED
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('customer_id', false, true)->nullable();
            $table->string('customer_email')->nullable();
            $table->string('status')->nullable();
            $table->string('marking')->nullable();
            $table->decimal('grand_total', 10, 4)->nullable();
            $table->decimal('subtotal', 10, 4)->nullable();
            $table->decimal('tax_amount', 10, 4)->nullable();
            $table->integer('billing_address_id', false, true)->nullable();
            $table->integer('shipping_address_id', false, true)->nullable();
            $table->string('shipping_method')->nullable();
            $table->decimal('shipping_amount', 10, 4)->nullable();
            $table->decimal('shipping_tax_amount', 10, 4)->nullable();
            $table->string('shipping_description')->nullable();
            $table->string('items_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

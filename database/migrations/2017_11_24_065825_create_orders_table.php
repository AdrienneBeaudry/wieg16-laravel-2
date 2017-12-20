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

            $table->bigInteger('id', false, true)->primary();
            // WATCH OUT. In Magento the Order ID can have dashes, so it cannot be an Integer
            $table->string('increment_id');
            // important to set index to the below column
            $table->integer('customer_id', false, true)->index();
            $table->string('customer_email')->nullable();
            $table->string('status')->nullable();
            $table->string('marking')->nullable();
            // IN MAGENTO decimals are always 12, 4 in format
            $table->decimal('grand_total', 12, 4)->nullable();
            $table->decimal('subtotal', 12, 4)->nullable();
            $table->decimal('tax_amount', 12, 4)->nullable();
            // unsignedBigInteger
            $table->bigInteger('billing_address_id', false, true)->index();
            // unsignedBigInteger
            $table->bigInteger('shipping_address_id', false, true)->index();
            
            $table->string('shipping_method')->nullable();
            $table->decimal('shipping_amount', 12, 4)->nullable();
            $table->decimal('shipping_tax_amount', 12, 4)->nullable();
            $table->string('shipping_description')->nullable();
            $table->string('items_id')->nullable();
            $table->string('invoice_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

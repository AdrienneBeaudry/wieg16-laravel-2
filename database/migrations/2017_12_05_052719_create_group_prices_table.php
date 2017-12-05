<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_prices', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->decimal('price', 10, 4)->nullable();
            $table->tinyInteger('group_id')->nullable();
            $table->bigInteger('price_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_prices');
    }
}

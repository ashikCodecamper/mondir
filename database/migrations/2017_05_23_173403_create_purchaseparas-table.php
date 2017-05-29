<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseparasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseparas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('para_id');
            $table->unsignedInteger('pcs');
            $table->unsignedInteger('purchases_price');
            $table->unsignedInteger('sales_price');
            $table->string('date');
            $table->string('challan_no');
            $table->foreign('para_id')->references('id')->on('paras');
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
        Schema::dropIfExists('purchaseparas');
    }
}

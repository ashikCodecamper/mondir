<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booksales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->integer('pcs')->unsigned();
            $table->integer('total_amount')->unsigned();
            $table->integer('due_amount')->nullable();
            $table->integer('rcv_amount')->unsigned();
            $table->string('cheque_num')->nullable();
            $table->string('inv_num');
            $table->string('avl_pcs');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('book_id')->references('id')->on('books');
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
        Schema::dropIfExists('booksales');
    }
}

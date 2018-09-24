<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('book',function (Blueprint $table){
            $table->increments('b_id');
            $table->integer('b_cid')->unsigned();
            $table->foreign('b_cid')->references('c_id')->on('categories');
            $table->integer('b_aid')->unsigned();
            $table->foreign('b_aid')->references('a_id')->on('author');
            $table->string('b_name');
            $table->enum('b_status',['1','0']);
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
        //
        Schema::drop('book');
    }
}

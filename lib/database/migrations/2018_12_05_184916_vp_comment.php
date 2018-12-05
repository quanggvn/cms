<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_comment', function (Blueprint $table) {
            $table->increments('cmt_id');
            $table->string('cmt_email');
            $table->string('cmt_name');
            $table->string('cmt_content');
            $table->integer('cmt_product')->unsigned();
            $table->foreign('cmt_product')
                -> references('pro_id')
                ->on('vp_products')
                ->onDelete('cascade');
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
        Schema::dropIfExists('vp_comment');
    }
}

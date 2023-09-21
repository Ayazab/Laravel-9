<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //$table->integer('user_id');
            $table->foreignId('user_id')->constrained();   //constrain me table ka name
            //$table->foreignId('user_id')->constrained();  //singular name
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  //singular name
            $table->string('title');
            $table->text('description');
            // $table->text('description')->nullable();
            // $table->text('description')->default('Aubhs bdwyb');
            $table->boolean('is_published')->default(false);
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
        Schema::dropIfExists('posts');
    }
};

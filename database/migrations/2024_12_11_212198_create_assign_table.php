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
        // Schema::create('tasks', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('assign_from',false,true);
        //     $table->foreign('assign_from')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->integer('assign_user',false,true);
        //     $table->foreign('assign_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->integer('assign_status',false,true);
        //     $table->foreign('assign_status')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
        //     $table->integer('assign_department',false,true);
        //     $table->foreign('assign_department')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
        //     $table->string('title');
        //     $table->string('description',500);
        //     $table->string('attachment',300)->nullable();
        //     $table->datetime('start_time')->nullable();
        //     $table->datetime('end_time')->nullable();
        //     $table->softDeletes();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
};

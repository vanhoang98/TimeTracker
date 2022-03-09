<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskClosuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_closures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ancestor')->unsigned();
            $table->integer('descendant')->unsigned();
            $table->foreign('ancestor')
                ->references('id')->on('tasks')
                ->onDelete('cascade');
            $table->foreign('descendant')
                ->references('id')->on('tasks')
                ->onDelete('cascade');
            $table->integer('depth');
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
        Schema::dropIfExists('task_closures');
    }
}

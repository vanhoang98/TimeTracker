<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
            $table->string('name');
            $table->bigInteger('parent_task_id')->nullable();
            $table->integer('number_item');
            $table->tinyInteger('status');
            $table->string('leader');
            $table->dateTime('start_date');
            $table->dateTime('finish_date');
            $table->integer('work_in_time');
            $table->integer('actual_work_in_time');
            $table->integer('progress');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}

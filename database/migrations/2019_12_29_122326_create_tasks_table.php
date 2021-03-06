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
            $table->bigIncrements('id');

            $table->bigInteger('responsible_person_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned();

            $table->integer('priority');
            $table->integer('position')->default(0);

            $table->string('slug')->unique()->nullable();
            $table->string('title');
            $table->text('body')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('responsible_person_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
            ;
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->index('responsible_person_id');
            $table->index('status_id');
            $table->index('priority');
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

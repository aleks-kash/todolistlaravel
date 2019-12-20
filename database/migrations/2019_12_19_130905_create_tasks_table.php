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
            // status_id,
            $table->text('status_id');
            // responsible_person_id
            $table->text('responsible_person_id');
            // title,
            $table->text('title');
            //
            //
            //
            $table->text('body');// body,
            //
            //
            //

            // priority,
            $table->text('priority');
            // updated_at
//            $table->text('updated_at');
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
        Schema::dropIfExists('tasks');
    }
}

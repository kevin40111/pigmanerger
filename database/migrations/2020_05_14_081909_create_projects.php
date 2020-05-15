<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('title', 100);
            $table->text('content')->nullable();
            $table->boolean('finish')->default(0);
            $table->integer('income')->nullable();
            $table->integer('outcome')->nullable();

            $table->bigInteger('users_id');
            $table->bigIncrements('id');
            $table->datetime('start_at')->nullable();
            $table->datetime('close_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOexResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oex_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exam_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('yes_ans')->nullable();
            $table->string('no_ans')->nullable();
            $table->string('question_json')->nullable();
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
        Schema::dropIfExists('oex_results');
    }
}

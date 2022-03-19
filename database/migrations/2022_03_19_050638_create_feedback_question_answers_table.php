<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_question_answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('feedback_question_id');
            $table->bigInteger('feedback_answer_id');
            $table->text('answer');
            $table->timestamps();
            $table->foreign('feedback_question_id')->references('id')->on('feedback_questions')->onDelete('cascade');
            $table->foreign('feedback_answer_id')->references('id')->on('feedback_answers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_question_answers');
    }
}

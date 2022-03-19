<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackQuestionAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['feedback_question_id', 'feedback_answer_id', 'answer'];
}

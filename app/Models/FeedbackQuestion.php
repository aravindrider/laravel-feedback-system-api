<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'type', 'question', 'description', 'data', 'feedback_id'];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackAnswer extends Model
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = ['feedback_id', 'start_date', 'end_date'];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}

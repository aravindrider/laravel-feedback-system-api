<?php

namespace App\Http\Controllers;

use App\Http\Resources\DashBoardResource;
use App\Http\Resources\FeedbackAnswerResource;
use App\Models\Feedback;
use App\Models\FeedbackAnswer;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{


    public function index(Request $request)
    {

        $user = $request->user();

        //Total no of feedbacks 
        $total = Feedback::query()->where('user_id', $user->id)->count();

        //latest feedback
        $latest = Feedback::query()->where('user_id', $user->id)->latest('created_at')->first();

        //total number of answered feedbacks 
        $totalAnswers = FeedbackAnswer::query()
            ->join('feedback', 'feedback_answers.feedback_id', '=', 'feedback.id')
            ->where('feedback.user_id', $user->id)
            ->count();

        // Latest 5 answer
        $latestAnswers = FeedbackAnswer::query()
            ->join('feedback', 'feedback_answers.feedback_id', '=', 'feedback.id')
            ->where('feedback.user_id', $user->id)
            ->orderBy('end_date', 'DESC')
            ->limit(5)
            ->getModels('feedback_answers.*');

        return [
            'totalFeedbacks' => $total,
            'latestFeedback' => $latest ? new DashBoardResource($latest) : null,
            'totalAnswers' => $totalAnswers,
            'latestAnswers' => FeedbackAnswerResource::collection($latestAnswers)
        ];
    }
}

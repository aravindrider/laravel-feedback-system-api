<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackAnswerRequest;
use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Http\Resources\FeedbackResource;
use App\Models\FeedbackAnswer;
use App\Models\FeedbackQuestion;
use App\Models\FeedbackQuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return FeedbackResource::collection(Feedback::where('user_id', $user->id)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeedbackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedbackRequest $request)
    {

        $data  = $request->validated();
        $feedback =  Feedback::create($data);


        //store new question
        foreach ($data['questions'] as $question) {
            $question['feedback_id'] = $feedback->id;
            $this->createQuestion($question);
        }

        return new FeedbackResource($feedback);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback, Request $request)
    {
        $user = $request->user();
        if ($user->id !== $feedback->user_id) {
            return abort(404, 'Unauthorized action');
        }
        return new FeedbackResource($feedback);
    }

    public function showForGuest(Feedback $feedback)
    {
        return new FeedbackResource($feedback);
    }

    public function storeAnswer(StoreFeedbackAnswerRequest $request, Feedback $feedback)
    {
        $validated = $request->validated();

        $feedbackAnswer = FeedbackAnswer::create([
            'feedback_id' => $feedback->id,
            'start_date' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s'),
        ]);

        foreach ($validated['answers'] as $questionId => $answer) {
            $question = FeedbackQuestion::where(['id' => $questionId, 'feedback_id' => $feedback->id])->get();
            if (!$question) {
                return response("Invalid question ID: \"$questionId\"", 400);
            }

            $data = [
                'feedback_question_id' => $questionId,
                'feedback_answer_id' => $feedbackAnswer->id,
                'answer' => is_array($answer) ? json_encode($answer) : $answer
            ];

            FeedbackQuestionAnswer::create($data);
        }

        return response([
            'success' => 'Feedback Completed'
        ], 201);
    }

    public function showAnswer(Feedback $feedback)
    {
        $feedbackAnswers = FeedbackQuestionAnswer::query()
            ->join('feedback_answers', 'feedback_question_answers.feedback_answer_id', '=', 'feedback_answers.id')
            ->where('feedback_answers.feedback_id', $feedback->id)
            ->getModels('feedback_question_answers.*');

        return response([
            'response' => $feedbackAnswers
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeedbackRequest  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $data = $request->validated();
        $feedback->update($data);

        $questionMap = collect($data['questions'])->keyBy('id');
        foreach ($feedback->questions as $question) {
            if (isset($questionMap[$question->id])) {
                $this->updateQuestion($question, $questionMap[$question->id]);
            }
        }

        return new FeedbackResource($feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback, Request $request)
    {

        $user = $request->user();
        if ($user->id !== $feedback->user_id) {
            return abort(403, 'Unauthorized action');
        }

        $feedback->delete();
        return response('Feedback deleted', 204);
    }

    private function createQuestion($data)
    {

        if (is_array($data['data'])) {
            $data['data'] = json_encode($data['data']);
        }

        $validator = Validator::make($data, [
            'question' => 'required|string',
            'type' => ['required', Rule::in([
                Feedback::TYPE_TEXT,
                Feedback::TYPE_TEXTAREA,
                Feedback::TYPE_RADIO,
                Feedback::TYPE_CHECKBOX,
            ])],
            'description' => 'nullable|string',
            'data' => 'present',
            'feedback_id' => 'exists:App\Models\Feedback,id'
        ]);
        return FeedbackQuestion::create($validator->validated());
    }

    private function updateQuestion(FeedbackQuestion $question, $data)
    {

        if (is_array($data['data'])) {
            $data['data'] = json_encode($data['data']);
        }
        $validator = Validator::make($data, [
            'id' => 'exists:App\Models\FeedbackQuestion,id',
            'question' => 'required|string',
            'type' => ['required', Rule::in([
                Feedback::TYPE_TEXT,
                Feedback::TYPE_TEXTAREA,
                Feedback::TYPE_RADIO,
                Feedback::TYPE_CHECKBOX,
            ])],
            'description' => 'nullable|string',
            'data' => 'present',
        ]);

        return $question->update($validator->validated());
    }
}

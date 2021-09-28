<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

class FrontendQuizController extends Controller
{
    public function quiz($slug)
    {
        return view('quiz', [
            'quiz' => Quiz::whereSlug($slug)->withCount('result')->withCount('questions')->first() ?? abort(404, 'Quiz Not Found')
        ]);
    }

    public function quizStart($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first() ?? abort(404, 'Question Not Found');
        if (!$quiz->is_started || $quiz->is_finished) {
            abort(404, 'Quiz not start, finished or not yet started');
        }

        if (!$questions = $quiz->questions) {
            abort(404, 'Questions not found');
        }

        if ($quiz->myResult) {
            return redirect()->route('quiz', $slug)
                ->withError('Quize daha önce katıldın!.');
        }

        return view('start_quiz', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    public function quizSave(Request $request, $slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first() ?? abort(404, 'Question Not Found');
        if (!$quiz->is_started || $quiz->is_finished) {
            abort(404, 'Quiz answers not save, finished or not yet started');
        }

        if ($quiz->myResult) {
            return redirect()->route('quiz', $slug)
                ->withError('Quize daha önce katıldın!.');
        }

        $correct_answer = 0;
        $user_answers = [];
        foreach($quiz->questions as $question) {
            if ($question_answer = request($question->id)) {
                $user_answers[] = [
                    'question_id' => $question->id,
                    'user_id'     => auth()->user()->id,
                    'answer'      => $question_answer
                ];
            }
            if ($question_answer === $question->correct) {
                $correct_answer++;
            }
        }
        if ($user_answers) {
            Answer::insert($user_answers);
        }

        $quiz_point = (100 / count($quiz->questions)) * $correct_answer;
        Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point'   => $quiz_point,
            'correct' => $correct_answer,
            'wrong'   => count($quiz->questions) - $correct_answer
        ]);

        return redirect()->route('quiz', $slug)
                ->withSuccess('Quiz başarıyla tamamlandı. Puan: ' . number_format($quiz_point, 1));
    }
}

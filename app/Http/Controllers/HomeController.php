<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class HomeController extends Controller
{

    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'active')
                       ->where(function($query) {
                        $query->orWhereNull('finished_at')->orWhere('finished_at', '>', date('Y-m-d H:i'));
                       })
                       ->withCount('questions');

        return view('dashboard', [
            'quizzes' => $quizzes->orderBy('started_at', 'ASC')->paginate(9)
        ]);
    }


    public function quiz($slug)
    {
        return view('quiz', [
            'quiz' => Quiz::whereSlug($slug)->withCount('questions')->first() ?? abort(404, 'Quiz Not Found')
        ]);
    }
}

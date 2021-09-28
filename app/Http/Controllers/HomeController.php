<?php

namespace App\Http\Controllers;

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
            'quizzes' => $quizzes->latest()->paginate(9)
        ]);
    }
}

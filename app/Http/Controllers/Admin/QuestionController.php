<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionCreateRequest;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($quiz_id)
    {
        $quiz = Quiz::find($quiz_id) ?? abort(404, 'Quiz Not Found');
        return view('admin.question.index', [
            'quiz'      => $quiz,
            'questions' => $quiz->questions()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz_id)
    {
        return view('admin.question.create', [
            'quiz' => Quiz::find($quiz_id) ?? abort(404, 'Quiz Not Found')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request, $quiz_id)
    {
        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->title) . time() .'.'. $request->image->extension();
            // https://laravel.com/docs/8.x/filesystem#specifying-a-file-name
            $request->image->move(public_path('uploads'), $fileName);
            // https://laracasts.com/discuss/channels/laravel/how-to-change-request-data
            $request->merge([
                'image' => 'uploads/' . $fileName
            ]);
        }
        // https://laravel.com/docs/8.x/eloquent-relationships#the-create-method
        Quiz::find($quiz_id)->questions()->create(
            $request->post()
        );
        return redirect()->route('questions.index', $quiz_id)->withSuccess('Question başarıyla eklendi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id, $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id, $id)
    {
        return view('admin.question.edit', [
            'question' => Quiz::find($quiz_id)->questions()->find($id) ?? abort(404, 'Question Not Found')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionCreateRequest $request, $quiz_id, $id)
    {
        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->title) . time() .'.'. $request->image->extension();
            $request->image->move(public_path('uploads'), $fileName);
            $request->merge([
                'image' => 'uploads/' . $fileName
            ]);
        }
        Question::find($id)->update($request->post());
        return redirect()->route('questions.index', $quiz_id)->withSuccess('Question başarıyla güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id, $id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['status' => 'error'], 404);
        }
        $question->delete();
        return response()->json(['status' => 'success']);
    }
}

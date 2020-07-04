<?php

namespace App\Http\Controllers;


use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::latest()->paginate(5);
  
        return view('answers.index',compact('answers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    public function create(){
        return view('answers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required',
            'user_id' => 'required',
            'content' => 'required',
            'is_selected' => 'required'
        ]);
  
        Answer::create($request->all());
   
        return redirect()->route('answers.index')
                        ->with('success','Answer created successfully.');
    }

    public function show(Answer $answer){
        return view('answers.show',compact('answers'));

    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
  
        return redirect()->route('answers.index')
                        ->with('success','Question deleted successfully');
    }
}

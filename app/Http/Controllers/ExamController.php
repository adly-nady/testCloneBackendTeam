<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $data = Exam::get();
        foreach($data as $item)
        {
            $item->user_name = $item->user->name;
        }
        session()->put('status',null);
        return view('exams.index',compact('data'));
    }
    public function create()
    {
        $users = User::get();
        return view('exams.create',compact('users'));
    }
    public function store(Request $R)
    {
        $data = $R->except('_token');
        $row = Exam::create($data);
        session()->put('status',"Done");
        return redirect()->route('exam.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        Exam::find($id)->delete(); 
        return redirect()->back()->with('status',"Done");
    }
}

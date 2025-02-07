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
            // $item->user_name = $item->user->name; // 1
            // $item->user_name = User::where('id',$item->user_id)->get()[0]->name; // 2
            // $item->user_name = User::where('name',"Mahmoud Besher")->first()->email; // 3
            $item->user_name = User::find($item->user_id)->name; // 4
        }
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
        Exam::create($data);
        
        return redirect()->route('exam.index')->with('status',"create");
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $exam = Exam::find($id);
        $users = User::get();
        return view('exams.edit',compact('exam','users')); // ['data'=>$exam] //get_defined_vars() // compact()
    }
    public function update(Request $R, $id)
    {
        Exam::find($id)->update([
            'title' => $R->title,
            'time' => $R->time,
            'description' => $R->description,
            'status' => $R->status,
            'user_id' => $R->user_id,
        ]);

        return redirect()->route('exam.index')->with('status',"update");
    }
    public function destroy($id)
    {
        Exam::find($id)->delete(); 
        return redirect()->back()->with('status',"delete");
    }

    // public function testGetParam($name)
    // {
    //     return $name;
    // }

    public function SearchTitle(Request $r)
    {
        $data = Exam::where('title',$r->title)->get();
        
        foreach($data as $item)
        {
            $item->user_name = User::find($item->user_id)->name; 
        }
        return redirect()->back()->with('data',$data);
    }
}

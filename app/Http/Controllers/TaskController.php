<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks=Task::all();
      return view('tasks.index',compact('tasks'));
      return redirect()->back();
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
        ]);
        Task::create([
            'title'=>$request->title
        ]);
        session()->flash('msg','task has been created');
        return redirect()->back();
    }

    public function destroy($id){
        Task::destroy($id);
        return redirect()->back()->with('msg','task has been deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //####################################################### //
    public function index()
    {
        $tasks = Task::where('user_id' , auth()->user()->id)->get();
        return view('tasks.tasks',compact('tasks'));
    }
    //####################################################### //
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3|max:25',
            'note'=>'min:5',
        ]);
        $tasks = new Task;
        $tasks->title = $request->title;
        $tasks->type = $request->type;
        $tasks->taskComplete = $request->taskComplete;
        $tasks->exp = $request->exp;
        $tasks->note = $request->note;
        $tasks->user_id = auth()->id();
        $tasks->save();
        session()->flash('Add' , 'تم اضافة المهمة بنجاح');
        return back();
    }
    //####################################################### //
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:3|max:30',
            'note'=>'min:5|max:150',
        ]);

        $tasks = Task::find($id);
        $tasks->title = $request->title;
        $tasks->type = $request->type;
        $tasks->taskComplete = $request->taskComplete;
        $tasks->exp = $request->exp;
        $tasks->note = $request->note;
        $tasks->save();
        session()->flash('edit','تم تعديل بيانات المهمة بنجاح');
        return back();
    }
    //####################################################### //
    public function destroy($id)
    {
        $tasks = Task::where('id', $id)->firstOrFail();
        $tasks->delete();
        session()->flash('delete','تم حذف المهمة بنجاح');
        return back();
    }
    //####################################################### //
    // public function statusComplete(Request $request, $id){

    //     $tasks = Task::firstOrFail($id);
    //      if ($request->taskComplete == 1) { // المهمة المكتملة
    //         $tasks->update([
    //             'taskComplete'=> $request->taskComplete,
    //             'dataComplete'=>$request->dataComplete,
    //         ]);
    //      }elseif ($request->taskComplete == 0) {
    //         $tasks->update([
    //             'taskComplete'=> $request->taskComplete,
    //             'dataComplete'=>  NULL,
    //         ]);
    //      }
    // }
}

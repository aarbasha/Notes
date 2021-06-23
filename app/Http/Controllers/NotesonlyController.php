<?php

namespace App\Http\Controllers;

use App\Notesonly;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotesonlyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //####################################################### //
    public function index()
    {
        $notesonly = Notesonly::where('user_id' , auth()->user()->id)->get();
        return view('notes_only.notes_only',compact('notesonly'));
    }
    //####################################################### //
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3|max:50',
            'note'=>'min:5',
        ]);
        $notesonly = new Notesonly;
        $notesonly->title = $request->title;
        $notesonly->note = $request->note;
        $notesonly->user_id = auth()->id();
        $notesonly->save();
        session()->flash('Add' , 'تم اضافة الملاحظة بنجاح');
        return back();
    }
    //####################################################### //
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:3|max:90',
            'note'=>'min:5',
        ]);

        $notesonly = Notesonly::find($id);
        $notesonly->title = $request->title;
        $notesonly->note = $request->note;
        $notesonly->save();

        session()->flash('edit','تم تعديل بيانات الملاحظة بنجاج');
        return back();
    }
    //####################################################### //
    public function destroy($id)
    {
        $notesonly = Notesonly::where('id', $id)->firstOrFail();
        $notesonly->delete();
        session()->flash('delete','تم حذف الملاحظة بنجاح');
        return back();
    }
}

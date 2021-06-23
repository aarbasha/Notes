<?php

namespace App\Http\Controllers;

use App\Note;
use App\Page;
use Illuminate\Http\Request;
use DB;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //####################################################### //
    public function index()
    {
        $notes = Note::where('user_id' , auth()->user()->id)->get();
        return view('notes.notes',compact('notes'));
    }
    //####################################################### //
    public function store(Request $request,Page $page)
    {
        $request->validate([
            'title'=>'min:3|max:50',
            'note'=>'min:5',
        ]);
        $note = new Note;
        $note->title = $request->title;
        $note->note = $request->note;
        $note->page_id = Page::latest()->first()->id;
        $note->user_id = auth()->id();
        $note->save();
        session()->flash('Add' , 'تم اضافة الملاحظة بنجاح');
        return back();
    }
    //####################################################### //
    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'min:3|max:90',
            'note'=>'min:5',
        ]);

        $notes = Note::find($id);
        $notes->title = $request->title;
        $notes->note = $request->note;
        $notes->save();

        session()->flash('edit','تم تعديل بيانات الملاحظة بنجاج');
        return back();
    }
    //####################################################### //
    public function destroy($id)
    {
        $pages = Note::where('id', $id)->firstOrFail();
        $pages->delete();
        session()->flash('delete','تم حذف الملاحظة بنجاح');
        return back();
    }
}

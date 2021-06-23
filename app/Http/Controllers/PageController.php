<?php

namespace App\Http\Controllers;

use App\Page;
use App\Note;
use App\User;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //####################################################### //
    public function index()
    {
        $pages = Page::where('user_id' , auth()->user()->id)->get();
        return view('pages.pages',compact('pages'));
    }
    //####################################################### //
    public function store(Request $request,User $user)
    {
        $request->validate([
            'title'=>'min:3|max:30',
            'discraption'=>'min:5|max:200',
        ]);

        $Page = new Page;
        $Page->title = $request->title;
        $Page->discraption = $request->discraption;
        $Page->type = $request->type;
        $Page->user_id = auth()->id();
        $Page->save();
        session()->flash('Add' , 'تم اضافة الصفحة بنجاح');
        return back();
    }
    //####################################################### //
    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'min:3|max:30',
            'discraption'=>'min:5|max:90',
        ]);

        $pages = Page::find($id);
        $pages->title = $request->title;
        $pages->discraption = $request->discraption;
        $pages->type = $request->type;
        $pages->save();

        session()->flash('edit','تم تعديل بيانات الصفحة بنجاح');
        return back();
    }
    //####################################################### //
    public function destroy($id)
    {
        $pages = Page::where('id', $id)->firstOrFail();
        $pages->delete();
        session()->flash('delete','تم حذف الصفحة  بنجاح');
        return back();
    }
    //####################################################### //
    public function nestedpage(Page $page){
        return view('notes.notes',compact('page'));
    }
    //####################################################### //
}

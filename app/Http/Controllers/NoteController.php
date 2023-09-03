<?php

namespace App\Http\Controllers;
use App\Models\Data;
use App\Models\Note;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function editNote($id){

        $note = Note::find($id);
        return view('addnote', ['title'=>'Update Note', 'note'=>$note, 'id'=>$id]);
    }

    public function updateNote($id, Request $request){
        Note::update(['title'=>$request->title, 'desc'=>$request->desc]);
        return redirect()->route('allnotes')->with('success', 'Data added successfully');
    }

    public function add(){
        return view('addnote', ['title'=>'Add Note', 'note'=>['title'=>'', 'desc'=>''], 'id'=>'false']);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        if ($request->input('note_id') !== 'false') {
            // Handle the update logic here
            $note = Note::find($request->input('note_id'));
            $note->title = $request->input('title');
            $note->desc = $request->input('desc');
            $note->save();
    
            return redirect()->route('allnotes')->with('success', 'Data updated successfully');
        } else {
            // Handle the insert logic here
            DB::table('notes')->insert([
                'title' => $request->input('title'),
                'desc' => $request->input('desc'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            return redirect()->route('allnotes')->with('success', 'Data added successfully');
        }
    }
    

    public function showAllNotes(){
        $notes = Note::where('done', 0)->get()->reverse();
        return view('allnotes', ['title'=>'All Notes', 'notes'=>$notes]);
    }

    public function showDoneNotes(){
        $notes = Note::where('done', 1)->get()->reverse();
        return view('donenotes', ['title'=>'Done Notes', 'notes'=>$notes]);
    }

    public function deleteNote($id, $view){

        Note::find($id)->delete();
        $notes = Note::where('done', 0)->get()->reverse();
        $redirectRoute = ($view === 'all') ? 'allnotes' : 'showDoneNotes';

        return redirect()->route($redirectRoute)->with('success', 'Note deleted successfully');
    }

    public function doneNote($id){
        Note::find($id)->update(['done' => true]);
        return redirect()->route('allnotes')->with('success', 'Note marked as done successfully');
    }
    
    
    
}

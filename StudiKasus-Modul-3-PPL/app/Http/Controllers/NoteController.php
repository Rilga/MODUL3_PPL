<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes_data = Note::with('penulis')
                        ->where('penulis_id', auth()->id())
                        ->orderBy('updated_at', 'desc')
                        ->get();
        return view('Notes/index', compact('notes_data'));
    }

    public function create()
    {
        return view('Notes.create');
    }

    
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Simpan data
        $create_note = Note::create([
            'judul' => $validatedData['title'],
            'isi' => $validatedData['description'],
            'penulis_id' => Auth::id(),
            'created_at' => Carbon::now()
        ]);

            if($create_note){
                return redirect()->route('notes')->with(['success' => 'new note has been created']);
            } return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Some problem occurred, please try again');
    }

    
    public function show($id)
    {
        $note_data = Note::findOrFail($id);

        return view('Notes.detail', compact('note_data'));
    }

    
    public function edit($id)
    {
        $note_edit = Note::findOrFail($id);

        return view('Notes.edit', compact('note_edit'));
    }

    
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //         'title' => 'required',
        //         'description' => 'required',
        //     ]);

            $update_note = Note::findOrFail($id);

            $update_note->update([
                'judul' => $request->title,
                'isi' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            if ($update_note) {
                return redirect()
                    ->route('notes')
                    ->with([
                        'success' => 'Note has been updated'
                    ]);
            } else {
                return redirect()
                    ->route('notes')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem has occured, please try again'
                    ]);
            }
    }

    
    public function destroy($id)
    {
        $note_delete = Note::findOrFail($id);
        $note_delete->delete();

        if ($note_delete) {
            return redirect()
                ->route('notes')
                ->with([
                    'success' => 'Note has been deleted'
                ]);
        } else {
            return redirect()
                ->route('notes')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    //

    public function index()
    {
        //

        $notes = Note::whereBelongsTo(Auth::user())->onlyTrashed()
            ->latest()->paginate(5);

        return view('notes.index')->with('notes', $notes);

    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
        if (!$note->user->is(Auth::user())) {
            return abort(403);
        }
        return view('notes.show')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Note $note)
    {
        //
        //
        if (!$note->user->is(Auth::user())) {
            return abort(403);
        }


        $note->restore();


        return to_route('notes.show', $note)->with('success', 'Note restored successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
        if (!$note->user->is(Auth::user())) {
            return abort(403);
        }

        $note->forceDelete();

        return to_route('notes.index')->with('success', 'Note Deleted');

    }
}

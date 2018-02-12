<?php

namespace App\Http\Controllers\Admin\Personal\Culture;

use App\Http\Requests\Personal\Culture\CreateNoteRequest;
use App\Http\Requests\Personal\Culture\EditNoteRequest;
use App\Models\Personal\Culture\Notes;
use App\Repositories\Personal\Culture\Notes\NotesEloquentRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Exception;

/**
 * @property  userId
 */
class NoteController extends Controller
{
    public function __construct(NotesEloquentRepository $notesRepository)
    {
        $this->notesRepository = $notesRepository;
        $this->status = [Notes::ENABLE => 'Enable', Notes::DISABLE => 'Disable'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $userId = Sentinel::getUser()->id;
            $notes = $this->notesRepository->getNoteWithPaginate($userId, 10, 'desc');
            $lastNote = $this->notesRepository->getLastNoteOfUserOrderBy($userId, 'created_at', 'desc');
            return view('admin.pages.personal.culture.notes.index', ['notes' => $notes, 'lastNote' => $lastNote]);
        } catch (Exception $e) {
            return Redirect::route('main');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.personal.culture.notes.create', ['status' => $this->status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNoteRequest $request)
    {
        try {
            $userId = Sentinel::getUser()->id;
            $data = $request->all();
            $data['user_id'] = $userId;
            unset($data['_token']);
            $note = $this->notesRepository->create($data);
            if ($note['status']) {
                return Redirect::route('note.index')->with('success', 'Create new note successfully!');
            } else {
                return Redirect::back()->withInput()->with('errors', $note['content']);
            }
        } catch (Exception $e) {
            return Redirect::back()->withInput()->with('errors', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = $this->notesRepository->find($id);
        return view('admin.pages.personal.culture.notes.show',['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = $this->notesRepository->find($id);
        return view('admin.pages.personal.culture.notes.edit',['note' => $note, 'status' => $this->status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNoteRequest $request, $id)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            $note = $this->notesRepository->update($id, $data);
            if ($note['status']) {
                return Redirect::route('note.index')->with('success', 'Update note successfully!');
            } else {
                return Redirect::back()->withInput()->with('errors', $note['content']);
            }
        } catch (Exception $e) {
            return Redirect::back()->withInput()->with('errors', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

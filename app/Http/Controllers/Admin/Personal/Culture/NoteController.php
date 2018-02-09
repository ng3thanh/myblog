<?php

namespace App\Http\Controllers\Admin\Personal\Culture;

use App\Models\Personal\Culture\Notes;
use App\Repositories\Personal\Culture\Notes\NotesEloquentRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class NoteController extends Controller
{
    public function __construct(NotesEloquentRepository $notesRepository)
    {
        $this->notesRepository = $notesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = $this->notesRepository->paginate(10);
        return view('admin.pages.personal.culture.notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = [Notes::ENABLE => 'Enable', Notes::DISABLE => 'Disable'];
        return view('admin.pages.personal.culture.notes.create',['status'=>$status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Sentinel::getUser();

        $data = $request->all();
        $data['user_id'] = 1;
        unset($data['_token']);
        $note = $this->notesRepository->create($data);
        if ($note) {
            return Redirect::route('note.index');
        } else {
            return Redirect::back();
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
        //
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
        $status = [Notes::ENABLE => 'Enable', Notes::DISABLE => 'Disable'];
        return view('admin.pages.personal.culture.notes.edit',['note' => $note, 'status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $note = $this->notesRepository->update($id, $data);
        if ($note) {
            return Redirect::route('note.index');
        } else {
            return Redirect::back();
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

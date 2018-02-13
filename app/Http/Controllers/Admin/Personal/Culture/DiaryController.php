<?php

namespace App\Http\Controllers\Admin\Personal\Culture;

use App\Models\Personal\Culture\Diary;
use App\Repositories\Personal\Culture\Diaries\DiariesEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class DiaryController extends Controller
{

    public function __construct(DiariesEloquentRepository $diariesRepository)
    {
        $this->diariesRepository = $diariesRepository;
        $this->status = [Diary::ENABLE => 'Enable', Diary::DISABLE => 'Disable'];
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
            $diaries = $this->diariesRepository->getDiaryWithPaginate($userId, 10, 'desc');
            $lastDiary = $this->diariesRepository->getLastDiaryOfUserOrderBy($userId, 'created_at', 'desc');
            return view('admin.pages.personal.culture.diaries.index', ['diaries' => $diaries, 'lastDiary' => $lastDiary]);
        } catch (Exception $e) {
            return Redirect::route('main')->with('errors', $e->getMessage());
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
    public function store(Request $request)
    {
        try {
            $userId = Sentinel::getUser()->id;
            $data = $request->all();
            $data['user_id'] = $userId;
            unset($data['_token']);
            $note = $this->diariesRepository->create($data);
            if ($note['status']) {
                return Redirect::route('note.index')->with('success', 'Create new note successfully!');
            } else {
                return Redirect::back()->withInput()->with('danger', $note['content']);
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
        //
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
        //
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

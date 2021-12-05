<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompetitionType;
use App\Helpers\Message;
use Illuminate\Support\Str;
use Validator;
use Auth;

class CompetitionTypeController extends Controller
{
    protected $view = 'admin.competitionType.';
    protected $back = 'admin.competitionType.index';

    use Message;

    public function index()
    {
        $models = CompetitionType::isNotDeleted();

        $models = $models->get();
        return view($this->view.'index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $models = CompetitionType::findOrFail($id);
        return view($this->view.'form', compact('models'));
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
        $model = CompetitionType::findOrFail($id);
        $model->description = $request->description;

        $model->tm_video = $request->tm_video;
        $model->tm_file = $request->tm_file;

        if ($request->file('image') != null) {
            $file   = $request->file('image');
            $name   = Str::slug($model->name, '-') . '-' . Str::random(4) . '.' . strtolower($file->getClientOriginalExtension());
            $model->image = $name;
            $model->save();
            $model->uploadImage($file, $name);
        }

        $model->save();

        return redirect()->back()->with('info', $this->SUCCESS_UPDATE);
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panduan;
use App\Helpers\Message;
use Illuminate\Support\Str;
use Validator;
use Auth;

class PanduanController extends Controller
{
    protected $view = 'admin.panduan.';
    protected $back = 'admin.panduan.index';
    protected $validator;

    use Message;

    protected function validationData($request){
        $this->validator      = Validator::make(
            $request,
            [
                'name'              => 'required',
                'description'       => 'required',
                'video_desktop'     => 'required',
                'video_mobile'     => 'required',
            ],
            [
                'required'          => ':attribute harus diisi.'
            ],
            [
                'name'              => 'Nama',
                'description'       => 'Deskripsi',
                'video_desktop'     => 'Video Desktop',
                'video_mobile'      => 'Video Mobile',
            ]
        );
    }

    public function index()
    {
        $models = Panduan::isNotDeleted();
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
        $models = new Panduan();
        return view($this->view.'form', compact('models'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validationData($request->all());
        if ($this->validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($this->validator->errors());
        }

        $model = new Panduan();
        $model->name = $request->name;
        $model->slug = Str::slug($model->name, '-');
        $model->description = $request->description;
        $model->video_desktop = $request->video_desktop;
        $model->video_mobile = $request->video_mobile;
        $model->save();

        return redirect()->route($this->back)->with('info', $this->SUCCESS_ADD);
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
        $models = Panduan::findOrFail($id);
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
        $this->validationData($request->all());
        if ($this->validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($this->validator->errors());
        }

        $model = Panduan::findOrFail($id);
        $model->name = $request->name;
        $model->slug = Str::slug($model->name, '-');
        $model->description = $request->description;
        $model->video_desktop = $request->video_desktop;
        $model->video_mobile = $request->video_mobile;
        $model->save();

        return redirect()->route($this->back)->with('info', $this->SUCCESS_UPDATE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Panduan::findOrFail($id);
        $model->status = Panduan::STATUS_DELETE;
        $model->save();

        return redirect()->route($this->back)->with('info', $this->SUCCESS_DELETE);
    }
}

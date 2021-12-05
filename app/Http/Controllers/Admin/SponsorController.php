<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Helpers\Message;
use Illuminate\Support\Str;
use Validator;
use Auth;

class SponsorController extends Controller
{
    protected $view = 'admin.sponsor.';
    protected $back = 'admin.sponsor.index';
    protected $validator;

    use Message;

    protected function validationData($request){
        $this->validator      = Validator::make(
            $request,
            [
                'name'              => 'required',
                'type'              => 'required',
                'main'              => 'required',
            ],
            [
                'required'          => ':attribute harus diisi.'
            ],
            [
                'name'              => 'Nama',
                'type'              => 'Tipe',
                'main'              => 'Sponsor utama',
            ]
        );
    }

    public function index(Request $request)
    {
        $models = Sponsor::isNotDeleted();

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
        $this->validationData($request->all());
        if ($this->validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($this->validator->errors());
        }

        $model = new Sponsor();
        $model->name = $request->name;
        $model->status = Sponsor::STATUS_ACTIVE;
        $model->type = $request->type;
        $model->main = $request->main;

        if ($request->file('image') != null) {
            $file   = $request->file('image');
            $name   = Str::slug($model->name, '-') . '-' . Str::random(4) . '.' . strtolower($file->getClientOriginalExtension());
            $model->image = $name;
            $model->save();
            $model->uploadImage($file, $name);
        }

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
        $this->validationData($request->all());
        if ($this->validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($this->validator->errors());
        }

        $model = Sponsor::findOrFail($id);
        $model->name = $request->name;
        $model->status = Sponsor::STATUS_ACTIVE;
        $model->type = $request->type;
        $model->main = $request->main;

        if ($request->file('image') != null) {
            $file   = $request->file('image');
            $name   = Str::slug($model->name, '-') . '-' . Str::random(4) . '.' . strtolower($file->getClientOriginalExtension());
            $model->image = $name;
            $model->save();
            $model->uploadImage($file, $name);
        }

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
      $model = Sponsor::findOrFail($id);
      $model->status = Sponsor::STATUS_DELETE;
      $model->save();

      return redirect()->route('admin.sponsor.index')->with('info', $this->SUCCESS_DELETE);
    }

    public function imgDelete($id)
    {
        $model = Sponsor::findOrFail($id);
        $model->image = "";
        $model->save();

        return redirect()->back()->with('info', $this->SUCCESS_DELETE_IMG);

    }
}

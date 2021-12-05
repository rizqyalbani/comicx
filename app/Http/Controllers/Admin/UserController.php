<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Message;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

class UserController extends Controller
{
    protected $view = 'admin.user.'; 
    protected $back = 'admin.user.index'; 
    protected $validator;

    use Message;

    protected function validationData($request){
        $this->validator      = Validator::make(
            $request,
            [
                'name'              => 'required',
                'email'              => 'required|email|max:255|unique:users',
                'phone'              => 'required',
                'password'           => 'required',
            ],
            [
                'required'          => ':attribute harus diisi.'
            ],
            [
                'name'              => 'Nama',
                'email'              => 'Email',
                'phone'              => 'No Telepon',
                'password'           => 'Passwords',
            ]
        );
    }
    public function index()
    {
        $models = User::isNotDeleted();

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

        $model = new User();
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->isAdmin = $request->isAdmin;
        $model->password = bcrypt($request->password);

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
        $model = User::findOrFail($id);
        $model->name = $request->name;
        $model->phone = $request->phone;

        if($request->password != ""){
            $model->password = bcrypt($request->password);
        }
        $model->isAdmin = $request->isAdmin;
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
      $model = User::findOrFail($id);
      $model->status = User::STATUS_DELETE;
      $model->save();

      return redirect()->back()->with('info', $this->SUCCESS_DELETE);
    }
}

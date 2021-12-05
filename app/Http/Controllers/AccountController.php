<?php

namespace App\Http\Controllers;
use App\Helpers\Message;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    protected $view = 'admin.account.';
    protected $back = 'account.index';

    use Message;

    public function index()
    {
        $models = Auth::user();

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

        $model = Auth::user();

        if(\Request::get('type') == 'password'){

            $validator = Validator::make(
                $request->all(),
                [
                    'password_old' => 'required',
                    'password_new' => 'nullable|same:password_new_confirm',
                    'password_new_confirm' => 'required|min:8|max:30',
                ],
                [
                    'required' => ':attribute tidak boleh kosong',
                    'min' => ':attribute minimal 8 karakter',
                    'same' => ':attribute tidak sama',
                ],
                [
                    'password_old' => 'Password lama',
                    'password_new' => 'Password baru',
                    'password_new_confirm' => 'Ulangi password baru',
                ]
            );
    
            if ($validator->fails()) {
                return back()->withInput($request->all())->withErrors($validator->errors());
            }

            if(!Hash::check($request->input('password_old'), $model->password)){
                return redirect()
                        ->back()
                        ->withErrors('Password lama salah');
            }else{

                $model->password = bcrypt($request->password_new);
                $model->save();

                return redirect()
                    ->back()
                    ->with('success', 'Password berhasil diganti');
                }
        }

        $validator       = \Validator::make(
            $request->all(), [
                'name'       => 'required|string',
                'phone'      => 'required|numeric',
            ], [
                'required'          => ':attribute tidak boleh kosong.',
                'numeric'           => ':attribute harus berupa angka',
                'min' => ':attribute minimal 6 karakter',
            ]
        )->setAttributeNames(
            [
                'name'       => 'Nama',
                'phone'      => 'No. Telp',
            ]
        );

        if($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator->errors());
        }

        $model->name    = $request->get('name');
        $model->phone   = $request->get('phone');
        $model->save();
        return redirect()->route($this->back)->with('info', $this->SUCCESS_UPDATE);
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

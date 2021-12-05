<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\CompetitionType;
use App\Helpers\Message;
use Illuminate\Support\Str;
use Validator;
use Auth;

class QuestionController extends Controller
{
    protected $view = 'admin.question.';
    protected $back = 'admin.question.index';
    protected $validator;

    use Message;

    protected function validationData($request){
        $this->validator      = Validator::make(
            $request,
            [
                'question'              => 'required',
                'answer'                => 'required'
            ],
            [
                'required'          => ':attribute harus diisi.'
            ],
            [
                'question'              => 'Pertanyaan',
                'answer'                => 'Jawaban',
                'competition_type_id'   => 'Tipe Pertanyaan'
            ]
        );
    }

    public function index()
    {
        $models = Faq::isNotDeleted();
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
        $models = new Faq();
        $type = CompetitionType::isNotDeleted()->get();
        return view($this->view.'form', compact('models', 'type'));
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

        $model = new Faq();
        $model->question = $request->question;
        $model->answer = $request->answer;
        $model->user_id = Auth::user()->id;
        $model->answer_id = Auth::user()->id;
        $model->answer_time = date('Y-m-d H:i:s');
        $model->competition_type_id = $request->competition_type_id;

        if($model->answer == null) {
            $model->status = 0;
        } else {
            $model->status = 1;

           
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
        $models = Faq::findOrFail($id);
        $type = CompetitionType::isNotDeleted()->get();
        return view($this->view.'form', compact('models', 'type'));
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

        $model = Faq::findOrFail($id);
        $model->question = $request->question;
        $model->answer = $request->answer;
        $model->competition_type_id = $request->competition_type_id;
        $model->answer_id = Auth::user()->id;
        $model->answer_time = date('Y-m-d H:i:s');

        if($model->answer == null) {
            $model->status = 0;
        } else {
            $model->status = 1;

            $msg = new \App\Models\Message;
            $msg->name = 'Jawaban Baru';
            $msg->description = '<b>'.$model->question.'</b>'.$model->answer;
            $msg->type_message = 5;
            $msg->target_id = $model->user_id;
            $msg->user_id = Auth::user()->id;
            $msg->save();
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
        $model = Faq::findOrFail($id);
        $model->status = Faq::STATUS_DELETE;
        $model->save();

        return redirect()->route($this->back)->with('info', $this->SUCCESS_DELETE);
    }
}

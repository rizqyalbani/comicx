<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompetitionCategory;
use App\Models\CompetitorAuth;
use App\Models\SubmissionLog;
use App\Models\Competitor;
use App\Models\CompetitorDetail;
use App\Helpers\Message;
use Illuminate\Support\Str;
use App\Models\TelegramNotification;
use Validator;
use Auth;
use Uuid;

class UploadController extends Controller
{
    use Message;

    protected $view = 'app.upload.';
    protected $back = 'app.upload.create';


    protected $validator;
    protected function validationData($request){
        $this->validator      = Validator::make(
            $request,
            [
                'submission_url'          => 'required|url'
            ],
            [
                'required'          => ':attribute harus diisi.',
                'url'               => ':attribute bukan link yang valid.'
            ],
            [
                'submission_url'          => 'Link Karya'
            ]
        );
    }

    public function index(Request $request)
    {
        $models = Competitor::isLunas()
                  ->where('user_id', Auth::user()->id);

        if($request->status != null){
        
            if($request->get('status') == 1) {
                $models = $models->where('submission_url','!=',NULL);
            } else {
                $models = $models->where('submission_url','=',NULL);
            }
        }

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
    public function show($upload)
    {
        $models = Competitor::isLunas()
                  ->where('uuid', $upload)
                  ->where('user_id', Auth::user()->id);

        $models = $models->first();

        if(!$models) {
            abort(404);
        }
        return view($this->view.'show', compact('models'));
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
    public function update(Request $request, $upload)
    {
        $id = $upload;
        $models = Competitor::isLunas()
                  ->where('uuid', $id)
                  ->where('user_id', Auth::user()->id);

        $models = $models->first();

        if(!$models) {
            abort(404);
        }

        if($models->submission_status == 1) {
            return redirect()->back()->with('error_msg', 'Data sudah dikunci');
        }

        $this->validationData($request->all());
        if ($this->validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($this->validator->errors());
        }

        $name = "";
        if($models->team_name != "") {
            $name = $models->team_name;
        } else {
            $name = $models->competitorDetail != null ? $models->competitorDetail->first()->name : "";
        }

        $tele = new TelegramNotification();
        $tele->name = "[UPLOAD KARYA]";
        $tele->description = "<b>".$models->number()."</b>\n".$name."\n- \nLink Karya : \n".$request->submission_url;
        $tele->type = 5;
        $tele->save();

        $models->submission_url         = $request->submission_url;
        $models->submission_description = $request->submission_description;
        $models->save();

        $log = new SubmissionLog();
        $log->competitor_id = $models->id;
        $log->data = $models;
        $log->description = 'Update data';
        $log->type = 'info';
        $log->save();

        return redirect()->back()->with('success', $this->SUCCESS_UPDATE);

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

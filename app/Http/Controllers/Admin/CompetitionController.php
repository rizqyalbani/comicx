<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompetitionCategory;
use App\Helpers\Message;
use App\Models\CompetitionGender;
use App\Models\CompetitionLevel;
use App\Models\CompetitionType;
use Illuminate\Support\Str;
use Validator;
use Auth;

class CompetitionController extends Controller
{

    protected $view = 'admin.competition.';
    protected $back = 'admin.competition.index';

    use Message;

    public function index()
    {
        $models = CompetitionCategory::isNotDeleted();
        // var_dump($models);

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
        $models = new CompetitionCategory();
        $types = CompetitionType::isNotDeleted()->get();
        $levels = CompetitionLevel::all();
        $genders = CompetitionGender::all();
        return view($this->view.'create', compact('models','types','levels','genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new CompetitionCategory();
            // validasi kelas a dan b
            if ($request->class === "1,2,3") {
                $model->code = "A";
                // $model->save();
            }
            elseif ($request->class === "4,5,6") {
                $model->code = "B";
                // $model->save();

            }
            $model->competition_type_id = $request->name;
            $model->competition_level_id = $request->level;
            $model->competition_gender_id = $request->gender;
            // $model->code = $request->code;
            $model->class = $request->class;
            $model->quota = $request->quota;
            $model->isOnline = $request->online;
            $model->min_member = $request->min_member;
            $model->member = $request->member;
            $model->price = $request->price;
            $model->save();
            return redirect()->back()->with('info', $this->SUCCESS_ADD);
            
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
        $models = CompetitionCategory::findOrFail($id);
        $level = CompetitionLevel::all();
        $gender = CompetitionGender::all();
        $type = CompetitionType::all();
        // $model = $models->get();
        // var_dump($models->quota);
        return view($this->view.'form', ["data" => compact('models'), "level" => $level, "gender" => $gender, "type" => $type]);
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
        $model = CompetitionCategory::findOrFail($id);
        if (isset($request)) {
            // validasi kelas a dan b
            if ($request->class === "1,2,3") {
                $model->code = "A";
                // $model->save();
            }
            elseif ($request->class === "4,5,6") {
                $model->code = "B";
                // $model->save();

            }
            $model->competition_type_id = $request->name;
            $model->competition_level_id = $request->level;
            $model->competition_gender_id = $request->gender;
            // $model->code = $request->code;
            $model->class = $request->class;
            $model->quota = $request->quota;
            $model->isOnline = $request->online;
            $model->min_member = $request->min_member;
            $model->member = $request->member;
            $model->price = $request->price;
            $model->save();
            if ( $model->wasChanged() ) {
                return redirect()->back()->with('info', $this->SUCCESS_UPDATE);
            }
            else{
                return redirect()->back()->with('error_msg', $this->FAILED_UPDATE);
            }
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

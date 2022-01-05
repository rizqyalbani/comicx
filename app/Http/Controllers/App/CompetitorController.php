<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompetitionCategory;
use App\Models\CompetitorAuth;
use App\Models\Competitor;
use App\Models\CompetitorDetail;
use App\Helpers\Message;
use Illuminate\Support\Str;
use Validator;
use Auth;
use Uuid;
use App\Models\TelegramNotification;
use App\Models\Songs;
use App\Models\Surah;
use App\Http\Controllers\PaymentChecker;

class CompetitorController extends Controller
{
    use Message;
    protected $validator;

    protected $view = 'app.competitor.';
    protected $back = 'app.competitor.create';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function validationDataFoto($request){
        $this->validator      = Validator::make(
            $request,
            [
                'image' => 'required|max:5120',
            ],
            [
                'required'          => ':attribute harus diisi.',
                'max'               => ':attribute harus maksimal 5 MB.'
            ],
            [
                'image'          => 'Pas foto'
            ]
        );
    }


    protected function validationDataIdentity($request){
        $this->validator      = Validator::make(
            $request,
            [
                'student_identity' => 'required|max:5120',
            ],
            [
                'required'          => ':attribute harus diisi.',
                'max'               => ':attribute harus maksimal 5 MB.'
            ],
            [
                'student_identity'          => 'Identitas peserta'
            ]
        );
    }

    public function index()
    {
        $models = Competitor::isNotDeleted()->where('user_id', Auth::user()->id)->where('delete_status', '!=', 1);
        $models = $models->get();
        // dd($models);
        $paymentChecker = PaymentChecker::showDataPayment();
        return view($this->view.'index', compact('models', 'paymentChecker'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competition = CompetitionCategory::isActive()->isIndividu()->orderBy('competition_type_id', 'asc')->get();
        // var_dump($competition);
        return view('app.competitor.create', compact('competition'));
    }

    public function createTeam()
    {
        $competition = CompetitionCategory::isActive()->isKelompok()->get();
        return view('app.competitor.createTeam', compact('competition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function createTeamStore(Request $request)
    {
        $model                          = new Competitor();
        $model->competition_category_id = $request->competition;
        $model->user_id                 = Auth::user()->id;
        $model->phone                   = $request->phone;
        $model->team_name               = $request->team_name;
        $model->uuid                    = Uuid::generate(4);
        $competition                    = CompetitionCategory::findOrFail($model->competition_category_id);
        $model->total                   = $competition->price;
        $model->save();

        foreach($request->name as $i => $name) {
            $detail                         = new CompetitorDetail();
            $detail->competitor_id          = $model->id;
            $detail->name                   = $name;
            $detail->from                   = $request->from[$i];
            $detail->class                  = $request->class[$i];
            $detail->gender                 = $request->gender[$i];
            $detail->uuid                   = Uuid::generate(4);
            $detail->save();

            $auth = new CompetitorAuth();
            $auth->competitor_id          = $model->id;
            $auth->username               = date('Ymd').rand(1, 1000);
            $auth->password_decrypt       = date('Ymd').rand(1, 1000).'password';
            $auth->password               = bcrypt($auth->password_decrypt );
            $auth->save();

            // $detail->birth                  = $request->birth[$i];
        }

        return redirect()->back()->with('info', $this->SUCCESS_ADD)->with('alert-success', 'Berhasil tambah data');
    }


    public function store(Request $request)
    {
        foreach($request->name as $i => $name) {
            $model                          = new Competitor();
            $model->competition_category_id = $request->competition;
            $model->user_id                 = Auth::user()->id;
            $model->phone                   = $request->phone[$i];
            $model->uuid                    = Uuid::generate(4);
            $model->pay_deadline            = date("Y-m-d H:i:s", strtotime( "+4 days", time() ));

            $competition                    = CompetitionCategory::findOrFail($model->competition_category_id);
            $model->total                   = $competition->price;
            $model->save();

            $detail                         = new CompetitorDetail();
            $detail->competitor_id          = $model->id;
            $detail->name                   = $name;
            $detail->from                   = $request->from[$i];
            $detail->class                  = $request->class[$i];
            $detail->gender                 = $request->gender[$i];
            $detail->uuid                   = Uuid::generate(4);
            $detail->save();

            $auth = new CompetitorAuth();
            $auth->competitor_id          = $model->id;
            $auth->username               = date('Ymd').rand(1, 1000);
            $auth->password_decrypt       = date('Ymd').rand(1, 1000).'password';
            $auth->password               = bcrypt($auth->password_decrypt );
            $auth->save();

            // $detail->birth                  = $request->birth[$i];

            $tele = new TelegramNotification();
            $tele->name = TelegramNotification::TITLE_NEW_COMPETITOR;
            $tele->description = $model->competitionCategory->name();
            $tele->type = TelegramNotification::TYPE_NEW_COMPETITOR;
            $tele->save();
        }

        

        return redirect()->route($this->back)->with('info', $this->SUCCESS_ADD)->with('alert-success', 'Berhasil tambah data');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailUpdate(Request $request, $id)
    {
        $models = Competitor::where('uuid',$request->competitor_id)->where('user_id', Auth::user()->id)->first();

        if(!$models) {
            abort(404);
        } else {
            $detail = CompetitorDetail::where('competitor_id', $models->id)->where('uuid',$id)->first();

            if(!$detail) { 
                abort(404);
            } else {
                $detail->name = $request->name;
                $detail->from = $request->from;
                $detail->class = $request->class;
                $detail->birth_place = $request->birth_place;
                $detail->birth_date = $request->birth_date;

                if ($request->file('image') != null) {
                    
                    $this->validationDataFoto($request->all());
                    if ($this->validator->fails()) {
                        return redirect()->back()->withInput($request->all())->withErrors($this->validator->errors());
                    }

                    $file   = $request->file('image');
                    $name   = Str::slug($detail->name, '-foto-') . '-' . Str::random(4) . '.' . strtolower($file->getClientOriginalExtension());
                    $detail->image = $name;
                    $detail->save();
                    $detail->uploadFile($file, $name);
                }

                if ($request->file('student_identity') != null) {

                    $this->validationDataIdentity($request->all());
                    if ($this->validator->fails()) {
                        return redirect()->back()->withInput($request->all())->withErrors($this->validator->errors());
                    }

                    $file   = $request->file('student_identity');
                    $name   = Str::slug($detail->name, '-identity-') . '-' . Str::random(4) . '.' . strtolower($file->getClientOriginalExtension());
                    $detail->student_identity = $name;
                    $detail->save();
                    $detail->uploadFile($file, $name, 'identity');
                }

                $detail->save();

                return redirect()->route($this->view.'edit', $models->uuid)->with('success_'.$detail->uuid, "Berhasil update data");
            }

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $models = Competitor::where('uuid',$id)->where('user_id', Auth::user()->id)->first();
        $song = Songs::all();
        $surah = Surah::where('competition_category_id', $models->competition_category_id)
                ->doesnthave('competitor')
                ->get();
                
        if($request->access_edit == 'yes' && $request->detail != null) {

            $detail = CompetitorDetail::where('uuid',$request->detail)->where('competitor_id', $models->id)->first();
            if($detail) {
                $tele = new TelegramNotification();
                $tele->name = '[REQUEST EDIT DETAIL PESERTA]';
                $tele->description = 'No Daftar : '.$models->caNumber().', Nama : '.$detail->name.', Lomba : '.$models->competitionCategory->name();
                $tele->type = 10;
                $tele->save();

                return redirect()->route('app.competitor.edit', $models->uuid)->with('success_'.$detail->uuid, "Request edit data berhasil dilakukan");
            }
            
        }

        return view($this->view.'show', compact('models','song','surah'));
    }
    
    public function chooseSong(Request $request, $id){
        $models = Competitor::where('uuid',$id)->where('user_id', Auth::user()->id)->first();
        if(!$models) {
            abort(404);
        }

        $models->songs_id = $request->songs_id;
        $models->save();

        return redirect()->back()->with('info', "Berhasil pilih lagu");
    }

    public function chooseSurah(Request $request, $id){
        $surah = new Surah();
                $models = Competitor::where('uuid',$id)->where('user_id', Auth::user()->id)->first();
                $surah->surah = $request->surah;
                $surah->ayat = $request->ayat;
                $surah->halaman = $request->halaman;
                $surah->competition_category_id = $models->competition_category_id;
                $surah->id_competitor = $models->id;
                $surah->save();
                if($surah->id_competitor = $models->id){
                    $models->surah_id = $surah->id;
                    $models->save();
                    return redirect()->back()->with('info', "Berhasil pilih maqro");
                }else{
                    return redirect()->back()->with('danger', "Gagal memilik maqro");
        
                }
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
        $models = Competitor::where('uuid', $id)->isNotDeleted()->where('user_id', Auth::user()->id)->first();

        if($models) {
            if($models->competitor_status > 0){
                return redirect()->back()->with('error_msg', 'Data tidak bisa dihapus');
            } else {
                $count = 0;
                foreach($models->invoice_detail as $detail) {
                    if($detail->invoice) {
                        if($detail->invoice->status == 0) {
                            $count++;
                        }
                    }
                }

                if($count == 0) {
                    $models->competitor_status = -1;
                    $models->save();
                    return redirect()->back()->with('info', 'Data berhasil dihapus');
                } else {
                    return redirect()->back()->with('error_msg', 'Data tidak bisa dihapus karena pembayaran belum dikonfirmasi');
                }
                
            }
        } else {
            return redirect()->back()->with('info', 'Data tidak ditemukan');
        }


    }
}

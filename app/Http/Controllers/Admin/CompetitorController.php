<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competitor;
use App\Models\CompetitorDetail;
use App\Models\CompetitionCategory;
use App\Models\SubmissionLog;
use App\Helpers\Message;
use Illuminate\Support\Str;
use App\Models\TelegramNotification;
use Validator;
use Auth;

class CompetitorController extends Controller
{
    protected $view = 'admin.competitor.';
    protected $back = 'admin.competitor.index';
    protected $validator;

    use Message;

    public function tiket(Request $request)
    {
        $models = Competitor::select('competitors.id', 'competition_category_id','team_name')->isNotDeleted()
                    // ->where('invoice_number', '!=', NULL)
                    ->where('competitor_status', '1')
                    ->join('invoices', 'competitors.invoice_id', '=', 'invoices.id')
                    ->orderBy('approved_time')
                    ->orderBy('id');
 
        if($request->get('all')=='yes') {
            $models = $models->get();
        } else {
            $models = $models->paginate(9);
        }
        

        $start = $request->page == null ? 1 : ($request->page-1)*9+1;
        
        
        // return $models;

        return view('print', compact('models', 'start'));
    }
    
    public function index(Request $request)
    {
        $models = Competitor::where('id','!=',0)->where('delete_status', '=', 0);
        $com = CompetitionCategory::isActive()->get();
        // dd($request->type);
        if($request->type != null) {
            $models = $models->where('competition_category_id', $request->type);
            $models = $models->where('competition_number', '!=', NULL);
            $models = $models->orderBy('competition_number');
            
            // $models = $models->where('competition_category_id', $request->type);
            // dd($models->get());
        }


        if($request->status != null) {

            if($request->status ==  1) {
                $models = $models->where('invoice_number', '!=', NULL);
            } else {
                $models = $models->where('invoice_number', '=', NULL);
            }

        }


        if($request->karya != null) {

            if($request->karya ==  2) {
                $models = $models->where('submission_status', '=', '1');
                $models = $models->where('invoice_number', '!=', NULL);
            } else if($request->karya ==  1) {
                $models = $models->where('invoice_number', '!=', NULL);
                $models = $models->where(function($query) {
                    $query->where('submission_url', '!=', NULL);
                    $query->where('submission_status', '!=', '1');
                });
            } else if($request->karya ==  3) {
                // $models = $models->where('invoice_number', '!=', NULL);
                // $models = $models->submissionLogLatest();
            } else {
                $models = $models->where('invoice_number', '!=', NULL);
                $models = $models->where('submission_url', '=', NULL);
            }

        }
        $models = $models->get();

        if($request->download != null) {
            $fileName = 'peserta-'.date('d-m-Y-H-i-s').'.csv';

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('No', 'No Peserta', 'Lomba', 'Nama', 'No Telepon', 'Asal', 'Surah/Lagu', 'Link Karya', 'Status Karya');

            $tasks = $models;
            
            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                
                
                $i = 0;
                foreach ($tasks as $task) {
                    foreach($task->competitorDetail as $detail) {
                        $row['No']              = $i + 1;
                        $row['No Peserta']      = $task->number();
                        $row['Lomba']           = $task->competitionCategory->name();
                        $row['Nama']            = $detail->name;
                        
                        $surah = "";
                        
                        if($task->song) {
                            $surah = $task->song->name;
                        }
                        
                        if($task->surah) {
                            $surah = $task->surah->surah.', ayat '.$task->surah->ayat.', halaman '.$task->surah->halaman;
                        }
                        
                        $row['Surah'] = $surah;
                        $row['No Telepon']      = "'".$task->phone;
                        $row['Asal']            = $task->competitorDetail ? $task->competitorDetail->first()->from : '-';
                        $row['Link Karya']      = $task->submission_url;
                        $row['Status Karya']    = '';
                        fputcsv($file, array($row['No'], $row['No Peserta'], $row['Lomba'], $row['Nama'], $row['No Telepon'], $row['Asal'],  $row['Surah'], $row['Link Karya'], $row['Status Karya']));
                    
                        $i++;
                    }
                    
                    
                    
                }
    
                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }
        // dd($models);
        foreach ($models as $model ) {
            if ($model->pay_deadline == null && ($model->competitor_status == 0 || $model->competitor_status == -1)) {
                $competitor = new Competitor();
                $updateDeadline = date( "Y-m-d H:i:s", strtotime($model->date()."+4 days", time() ));
                $update = $competitor->findOrFail($model->id);
                $update->pay_deadline = $updateDeadline;
                $update->save();
            }
        // dump($model);
        }
        // die;
        return view($this->view.'index', compact('models','com'));
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
    public function edit(Request $request, $id)
    {
        $models = Competitor::where('uuid',$id)->first();

        if($request->access_edit != '' && $request->detail != null) {

            $detail = CompetitorDetail::where('uuid',$request->detail)->where('competitor_id', $models->id)->first();
            $detail->identity_lock = $request->access_edit;
            $detail->save();

            if($detail) {
                $tele = new TelegramNotification();
                $tele->name = '[REQUEST EDIT DETAIL PESERTA]';
                if($request->access_edit == 0) {
                    $m = 'Peserta dengan nama '.$detail->name.' diperbolehkan mengedit data';
                    $tele->description = 'BOLEH. No Daftar : '.$models->caNumber().', Nama : '.$detail->name.', Lomba : '.$models->competitionCategory->name();
                } else if($request->access_edit == 1) {
                    $m = 'Peserta dengan nama '.$detail->name.' tidak diperbolehkan mengedit data. Untuk melakukan pengeditan, silahkan melakukan request edit di halaman detail peserta';
                    $tele->description = 'TIDAK BOLEH. No Daftar : '.$models->caNumber().', Nama : '.$detail->name.', Lomba : '.$models->competitionCategory->name();
                }
                
                $tele->type = 10;
                $tele->save();

                $msg = new \App\Models\Message;
                $msg->name = 'Status Edit Data Peserta';
                $msg->description = $m;
                $msg->type_message = 6;
                $msg->status=1;
                $msg->target_id = $models->user_id;
                $msg->user_id = Auth::user()->id;
                $msg->save();

                return redirect()->route('admin.competitor.edit', $models->uuid)->with('success_'.$detail->uuid, "Request edit data berhasil dilakukan");
            }
            
        }

        return view($this->view.'form', compact('models'));
    }

    public function competitorUpload(Request $request, $id)
    {
        $models = Competitor::where('uuid',$id)->first();

        if($request->status != null){
            $models->submission_status = $request->status;
            $models->submission_approved_time = date('Y-m-d H:i:s');
            $models->submission_approved_by = Auth::user()->id;
            $models->save();
            
            $name = "";
            if($models->team_name != "") {
                $name = $models->team_name;
            } else {
                $name = $models->competitorDetail != null ? $models->competitorDetail->first()->name : "";
            }
            

            if($request->status == 0) {
                $log = new SubmissionLog();
                $log->competitor_id = $models->id;
                $log->description = 'Karya ditolak, silahkan upload ulang';
                $log->type = 'danger';
                $log->data = '-';
                $log->save();

                $msg = new \App\Models\Message;
                $msg->name = 'Upload karya';
                $msg->description = 'Karya '.$models->number().' ('.$name.') ditolak, silahkan upload ulang';
                $msg->type_message = 3;
                $msg->status=1;
                $msg->target_id = $models->user_id;
                $msg->user_id = Auth::user()->id;
                $msg->save();
                
                $tele = new TelegramNotification();
                $tele->name = "[UPLOAD KARYA DITOLAK]";
                $tele->description = "<b>".$models->number()."</b>\n".$name."\n- \nLink Karya : \n".$models->submission_url;
                $tele->type = 5;
                $tele->save();

            } else if($request->status == 1) {
                $log = new SubmissionLog();
                $log->competitor_id = $models->id;
                $log->description = 'Karya diterima';
                $log->type = 'success';
                $log->data = '-';
                $log->save();

                $msg = new \App\Models\Message;
                $msg->name = 'Upload karya';
                $msg->description = 'Karya '.$models->number().' ('.$name.') berhasil dikonfirmasi.';
                $msg->type_message = 3;
                $msg->status = 1;
                $msg->target_id = $models->user_id;
                $msg->user_id = Auth::user()->id;
                $msg->save(); 
                
                $tele = new TelegramNotification();
                $tele->name = "[UPLOAD KARYA DITERIMA]";
                $tele->description = "<b>".$models->number()."</b>\n".$name."\n- \nLink Karya : \n".$models->submission_url;
                $tele->type = 5;
                $tele->save();
            }
        }

        return redirect()->back()->with('info', $this->SUCCESS_UPDATE);
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

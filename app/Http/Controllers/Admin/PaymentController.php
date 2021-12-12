<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Competitor;
use App\Models\Kwitansi;
use App\Helpers\Message;
use Illuminate\Support\Str;
use Validator;
use Auth;

class PaymentController extends Controller
{
    protected $view = 'admin.payment.';
    protected $back = 'admin.payment.index';
    protected $validator;

    use Message;

    public function index(Request $request)
    {
        $models = Invoice::where('id','!=',0)->orderBy('id', 'desc');

        if($request->status != null) {

            if($request->status != null) {
                $models = $models->where('status', $request->status);
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
        $models = Invoice::where('uuid',$id)->first();
        return view($this->view.'form', compact('models'));
    }

    public function decline($id)
    {
        $models = Invoice::where('uuid',$id)->first();
        $models->status = -1;
        $models->save();

        $msg = new \App\Models\Message;
        $msg->name = 'Pembayaran';
        $msg->description = 'Pembayaran '.$models->invoice().' ditolak.';
        $msg->type_message = 2;
        $msg->target_id = $models->user_id;
        $msg->user_id = Auth::user()->id;
        
        $msg->save();

        return redirect()->back()->with('info', $this->SUCCESS_UPDATE);
    }

    public function receive($id)
    {
        $models = Invoice::where('uuid',$id)->first();
        $models->status = 1;
        $models->approved_by = Auth::user()->id;
        $models->approved_time = date('Y-m-d H:i:s');
        $models->save();


        foreach($models->detail as $i => $detail) {
            $competitor = Competitor::where('id', $detail->competitor_id)->where('invoice_id',NULL)->where('invoice_number', NULL)->first();

            if($competitor) {
                

                $number = Kwitansi::all()->count();
                
                $kwitansi = new Kwitansi();
                $kwitansi->number = $number + $i + 1;
                $kwitansi->invoice_id = $models->id;
                $kwitansi->competitor_id = $competitor->id;
                $kwitansi->save();


                $competitor->invoice_id = $models->id;
                $competitor->invoice_number = $kwitansi->id;
                

                $check_number = Competitor::where('competition_category_id', $competitor->competition_category_id)
                                ->where('competitor_status', 1)
                                ->count();

                \Log::info('check '.$check_number);
                
                $competitor->competition_number = $check_number + 1;
                $competitor->competitor_status = 1;
                $competitor->save();

            }
        }


        $msg = new \App\Models\Message;
        $msg->name = 'Pembayaran';
        $msg->description = 'Pembayaran '.$models->invoice().' diterima.';
        $msg->type_message = 2;
        $msg->status = 1;
        $msg->target_id = $models->user_id;
        $msg->user_id = Auth::user()->id;
        $msg->save();

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

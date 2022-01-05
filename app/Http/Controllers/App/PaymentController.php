<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competitor;
use App\Helpers\Message;
use App\Models\PaymentMethod;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Auth;
use Uuid;
use Illuminate\Support\Str;
use Validator;
use App\Models\TelegramNotification;

class PaymentController extends Controller
{
    protected $validator;
    protected $view = 'app.payment.';
    protected $back = 'app.payment.create';

    use Message;

    protected function validationData($request){
        $this->validator      = Validator::make(
            $request,
            [
                'ref_name'          => 'required',
                'ref_number'        => 'required',
                'bank'              => 'required',
                'proof_of_transfer' => 'required|max:5120',
            ],
            [
                'required'          => ':attribute harus diisi.',
                'max'               => ':attribute harus maksimal 5 MB.'
            ],
            [
                'ref_name'          => 'Nama Pengirim',
                'ref_number'        => 'Nomor Rekening',
                'bank'              => 'Nama Bank',
                'proof_of_transfer' => 'Bukti Transfer',
            ]
        );
    }

    

    public function index()
    {
        $models = Invoice::where('user_id', Auth::user()->id)->orderBy('id','desc');

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
        $competitor = Competitor::where('user_id', Auth::user()->id)
            ->withCount('invoice_detail')
            ->where(function($query) {
                $query->doesntHave('invoice_detail')
                        ->orWhereHas('invoice_detail', function($r){
                            $r->whereHas('invoice', function($s) {
                                $s->whereIn('status', array(1, 0))
                                        ->havingRaw('COUNT(*)< ?', [1]);
                            }); 
                        });
        })->where('competitor_status', 0)
        ->where('delete_status', '!=', 1)
        ->get();
        // return $competitor;
        $method = PaymentMethod::first();
        
        return view($this->view.'form', compact('competitor', 'method'));
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

        $model                          = new Invoice();
        $model->bank                    = $request->bank;
        $model->ref_name                = $request->ref_name;
        $model->payment_method_id       = 1;
        $model->unique_number           = Auth::user()->id;
        $model->ref_number              = $request->ref_number;
        $model->uuid                    = Uuid::generate(4);
        $model->status                  = 0;
        $model->subtotal                = 0;
        $model->total                   = 0;
        $model->user_id                 = Auth::user()->id;
        $model->due_time                 = date('Y-m-d H:i:s', strtotime('+5 day', time()));
        $model->save();

        if ($request->file('proof_of_transfer') != null) {
            $file   = $request->file('proof_of_transfer');
            $name   = Str::slug($model->ref_name, '-') . '-' . Str::random(4) . '.' . strtolower($file->getClientOriginalExtension());
            $model->proof_of_transfer = $name;
            $model->save();
            $model->uploadFile($file, $name);
        }

        // $competitor = Competitor::where('user_id', Auth::user()->id)->where('competitor_status', 0)->isBelumLunas()->get();
        $competitor = Competitor::where('user_id', Auth::user()->id)
            ->withCount('invoice_detail')
            ->where(function($query) {
                $query->doesntHave('invoice_detail')
                        ->orWhereHas('invoice_detail', function($r){
                            $r->whereHas('invoice', function($s) {
                                $s->whereIn('status', array(1, 0))
                                        ->havingRaw('COUNT(*)< ?', [1]);
                            }); 
                        });
        })->where('competitor_status', 0)->get();

        foreach($competitor as $item) {
            $detail                             = new InvoiceDetail();
            $detail->invoice_id                 = $model->id;
            $detail->competitor_id              = $item->id;
            $detail->competition_category_id    = $item->competition_category_id;
            $detail->total                      = $item->total;
            $detail->save();

            $model->subtotal += $item->total;
        }

        $model->total = $model->subtotal + $model->unique_number;
        $model->save();

        $tele = new TelegramNotification();
        $tele->name = TelegramNotification::TITLE_NEW_PAYMENT;
        $tele->description = $model->invoice().' - Rp'.$model->total.'. Dari '.$model->bank.' ('.$model->ref_name.' - '.$model->ref_number.')';
        $tele->type = TelegramNotification::TYPE_NEW_PAYMENT;
        $tele->save();

        return redirect()->route($this->view.'index')->with('info', 'Berhasil upload bukti pembayaran')->with('alert-success', 'Berhasil tambah data');

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $models = Invoice::where('uuid',$id)->where('user_id', Auth::user()->id)->first();
        if($models == null) {
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

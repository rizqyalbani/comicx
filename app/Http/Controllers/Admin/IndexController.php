<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompetitionCategory;
use App\Models\CompetitionType;
use App\Models\CompetitorDetail;
use App\Models\Competitor;
use App\Models\Invoice;
use App\Models\InvoiceDetail;

class IndexController extends Controller
{
    protected $view = 'admin.'; 

    public function index()
    {
        $data['user']       = User::isNotDeleted()->count();
        $data['category']   = CompetitionCategory::isNotDeleted()->count();
        $data['type']       = CompetitionType::isNotDeleted()->count();
        $data['pending']       = Invoice::where('status',0)->count();
        $data['dana']       = Invoice::where('status',1)->where('off_status', '!=', 1)->get()->sum('total');
        // $data['competitor'] = CompetitorDetail::whereHas('competitor', function (Builder $query){
        //     // $query->where('competitor_status', '>', 0);
        // })->count();

        // $data['competitor'] = CompetitorDetail::whereHas('competitor', function($query){
        //     $query->where('competitor_status', '>', 0);
        // })->count();

        $models = CompetitionCategory::isActive()->get();

        $data['competitor'] = Competitor::where('competitor_status', '>', 0)->count();
        $data['competitor_total'] = CompetitorDetail::whereHas('competitor', function($query){
            $query->where('competitor_status',1);
        })->count();

        $sdate = DATE('Y-m-d', strtotime(DATE('Y-m-d') . "-14 day"));
        for ($i = 0; $i < 15; $i++) {
            $ndate = DATE('Y-m-d', strtotime($sdate . "+" . $i . " day"));
            $sidate = DATE('d-m-Y', strtotime($sdate . "+" . $i . " day"));
            $date_graph[]   = $sidate;
            $invoice_graph[] = InvoiceDetail::whereHas('invoice', function($query) use ($ndate){
                $query->whereDate('approved_time', $ndate);
            })->count();
        }

        $invoice_graph = json_encode($invoice_graph);
        $date_graph = json_encode($date_graph);
        
        return view($this->view.'home', compact('data','models','date_graph','invoice_graph'));
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

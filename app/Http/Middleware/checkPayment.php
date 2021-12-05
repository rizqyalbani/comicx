<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Competitor;
use App\Models\CompetitorDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class checkPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $curTime = date("Y-m-d H:i:s");
        // var_dump($curTime);
        $modelQuery = Competitor::where("competitor_status", 0)->get();

        $id = Auth::user()->id;

        $data = Competitor::where("user_id", $id)->first();
        $dataExpired = $data->competitorDetail->first();
        // var_dump($dataExpired);
        
        // if ($modelQuery) {
        //     foreach ($modelQuery as $mq) {
        //         if ($curTime > $mq->pay_deadline) {
        //             $data = Competitor::where("competitor_status", 0)->orWhere('id', $mq->id)->orWhere('pay_deadline', "<", $curTime);
        //             $dataNotif = $data->competitorDetail();
        //             $data->delete();
        //         }
        //     }
        // }
        // $request->attributes->add(['name' => $dataExpired->name]);
        // $request->session()->flash("name", $dataExpired->name);
        // echo "test";
        // var_dump($request);
        return $next($request);
    }
}

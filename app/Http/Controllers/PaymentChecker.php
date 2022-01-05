<?php

namespace App\Http\Controllers;

use App\Models\CompetitionCategory;
use App\Models\CompetitionLevel;
use App\Models\CompetitionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Competitor;
use App\Models\CompetitorDetail;
use App\Models\User;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class PaymentChecker extends Controller
{
    static public function showDataPayment(){
        $id_user = Auth::user()->id;
        $data = Competitor::where('user_id', $id_user)->where('competitor_status', 0)->first();
        $time = Carbon::now();
        $now = $time->toDateTimeString();

        if (isset($data->pay_deadline)) {
            if ($now > $data->pay_deadline) {
                $nameCrawl = $data->competitorDetail->first();
                $dataName = $nameCrawl->name;
                $dataDetail = DB::table('competitors AS a')
                ->join('competition_categories AS b', "a.competition_category_id", '=', 'b.id')
                ->join('competition_types AS c', 'b.competition_type_id', '=', 'c.id')->where('a.user_id', $id_user)->where('a.competitor_status', 0)->first();

                $decodeDataDetail = $dataDetail;
                
                $dataLevel = CompetitionCategory::find($decodeDataDetail->competition_type_id);
                $level = CompetitionLevel::find($dataLevel->competition_level_id)->name;
                $gender = $dataLevel->competition_gender_id;

                if ($gender == "U") {
                    $fullGender = "";
                }
                else{
                    $fullGender = " ". $gender;
                }

                $dataAll = compact('dataName', 'dataDetail', 'level', 'fullGender');
                return $dataAll;
            }
        }
    }

    static public function showDataPaymentAll(){
        $time = Carbon::now();
        $now = $time->toDateTimeString();
        $id_user = Auth::user()->id;
        // $data = Competitor::where('competitor_status', 0)->get()->all();
        $dataDetail = DB::table('competitors AS a')
        ->join('competition_categories AS b', "a.competition_category_id", '=', 'b.id')
        ->join('competition_types AS c', 'b.competition_type_id', '=', 'c.id')
        ->join('competition_categories AS d', 'b.competition_type_id', '=', 'd.id')
        ->join('competition_levels AS e', 'b.competition_level_id', '=', 'e.id')
        ->join('competitor_details AS f', 'a.id', '=', 'f.competitor_id')->where(function($query){
            $query->where('a.competitor_status', 0)->orWhere('a.competitor_status', -1);
        })->where('a.pay_deadline', '<', $now)->get()->all();
        $decodeDataDetail = $dataDetail;
        $fullGender = "";

        // update column dan hasil query jika ada yang null;
        foreach ($decodeDataDetail as $dd) {
            // dump($dd->team_name);
            if ($dd->pay_deadline == null && ($dd->competitor_status == 0 || $dd->competitor_status == -1) ) {
                $competitor = new Competitor();
                $updateDeadline = date( "Y-m-d H:i:s", strtotime($dd->date()."+4 days", time() ));
                $update = $competitor->findOrFail($dd->id);
                $update->pay_deadline = $updateDeadline;
                $update->save();
            }

            $deleteColumn = DB::table('competitors')->where('id', $dd->competitor_id)->where(function($query){
                $query->orWhere('competitor_status', 0)->orWhere('competitor_status', -1)->orWhere('competitor_status', "!=", 1);
                })->where(function($query){
                    $query->where('delete_status', 0)->orWhereNull('delete_status');
            })->update(['delete_status' => 1]);

            $compeType = CompetitionType::where('id', $dd->competition_type_id)->first();
            $compeLevel = CompetitionLevel::where('id', $dd->competition_level_id)->first();


            // message
            if ($deleteColumn) {
                $models = User::where('isAdmin', 1)->where('id', Auth::user()->id)->first();
                $msg = new \App\Models\Message;
                $msg->name = 'Batas Pembayaran';
                $msg->description = "Peserta atas nama $dd->name $compeType->name-$compeLevel->name sudah melewati batas waktu pembayaran";
                $msg->type_message = 2;
                $msg->status = 1;
                $msg->target_id = $models->id;
                $msg->user_id = Auth::user()->id;
                
                $msg->save();
            }
            // dd($dd);
            if ($dd->competition_gender_id == "U") {
                $fullGender = "";
            }
            else{
                $fullGender = " ". $dd->competition_gender_id;
            }
        }
        // dd($fullGender);
        $dataAll = compact('dataDetail', 'fullGender');
        return $dataAll;
    }
    
    static public function deleteAutoLatePayment(){
        $id_user = Auth::user()->id;
        $data = Competitor::where('user_id', $id_user)->where('competitor_status', 0)->orWhere('delete_status', 1)->first();
        // dump($data->competitorAuth)->first();
        $dataAuth = $data->competitorAuth->first();
        $dataDetail = $data->competitorDetail->first();
        if ($data) {
            $time = Carbon::now();
            $now = $time->toDateTimeString();

            if ($data) {
                if ($now > $data->pay_deadline) {
                    try {
                        $data->delete();
                        $dataAuth->delete();
                        $dataDetail->delete();
                    } catch (\Throwable $th) {
                        $th->getMessage();
                    }
                }
            }
        }   
    }
    static public function deleteAutoLatePaymentAll(){
        $id_user = Auth::user()->id;
        $data = Competitor::where('competitor_status', 0)->get();
        $dataAuth = $data->competitorAuth->get();
        $dataDetail = $data->competitorDetail->get();
        if ($data) {
            $time = Carbon::now();
            $now = $time->toDateTimeString();

            if ($data) {
                if ($now > $data->pay_deadline) {
                    try {
                        $data->delete();
                        $dataAuth->delete();
                        $dataDetail->delete();
                    } catch (\Throwable $th) {
                        $th->getMessage();
                    }
                }
            }
        }   
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CompetitionCategory;
use App\Models\CompetitionLevel;
use App\Models\CompetitionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Competitor;
use App\Models\CompetitorDetail;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

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
    
    static public function deleteAutoLatePayment(){
        $id_user = Auth::user()->id;
        $data = Competitor::where('user_id', $id_user)->where('competitor_status', 0)->first();
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
}

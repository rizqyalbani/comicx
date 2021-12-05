<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competitor;
use DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pesertaLomba(Request $request)
    {
        $competition_id = $request->get('id');

        $data = Competitor::isLunas()->where('competition_category_id', $competition_id)->leftJoin('competitor_details', function($join) {
            $join->on('competitors.id', '=', 'competitor_details.competitor_id');
        })->leftJoin('competition_categories', function($join) {
            $join->on('competition_categories.id', '=', 'competitors.competition_category_id');
        })->leftJoin('competition_types', function($join) {
            $join->on('competition_types.id', '=', 'competition_categories.competition_type_id');
        })
        ->select('*','competitor_details.name as name')
        // ->select(
        // 'competitor_details.name', 
        // 'competitor_details.gender', 
        // 'competitor_details.from', 
        // DB::raw("CONCAT(`competition_types`.`code`,'-',`competition_categories`.`competition_level_id`,'-', IF(`competition_categories`.`code` IS NOT NULL, (`competition_categories`.`code`) , '') ,IF(`competition_categories`.`competition_gender_id` != 'U', '-' , ''), IF(`competition_categories`.`competition_gender_id` != 'U', (`competition_categories`.`competition_gender_id`) , '-'),`competitors`.`competition_number`) as code"))
        ->orderBy('competition_number')
        ->get();
        
        $array = array();
        
        foreach($data as $item) {
            $data_array = array();
            $data_array['name'] = $item->name;
            $data_array['gender'] = $item->gender;
            $data_array['from'] = $item->from;
            $data_array['code'] = $item->number();
            $array[] = $data_array;
        }
        
        return json_encode($array);
    } 
    public function index()
    {
        //
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

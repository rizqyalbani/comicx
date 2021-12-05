<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetitionType;
use App\Models\Songs;

class CompetitionTypeController extends Controller
{
    public function show($id)
    {
        $models = CompetitionType::where('slug', $id)->first();

        if($models == null) {
            abort(404);
        }

        $data['smp'] = Songs::all();
        $data['sma'] = Songs::all();

        $other = CompetitionType::where('id', '!=' ,$models->id)->get();
        return view('user.competition', compact('models', 'other', 'data'));
    }
}

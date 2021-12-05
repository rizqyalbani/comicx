<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetitionCategory;

class CompetitorController extends Controller
{
    public function index()
    {
        $models = CompetitionCategory::isActive()->get();
        return view('user.competitor', compact('models'));
    }
    
    public function zoom()
    {
        $models = CompetitionCategory::isActive()->get();
        return view('user.zoom', compact('models'));
    }
}

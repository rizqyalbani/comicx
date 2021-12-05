<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentChecker;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $message = Message::isActive()->isForYou()->orderBy('id','desc')->get();
        $paymentChecker = PaymentChecker::showDataPayment();

        return view('home', compact('message','paymentChecker'));

        
    }
}

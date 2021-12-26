<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentChecker;
use Illuminate\Support\Facades\Auth;

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
        // dd(Auth::user()->id);
        $message = Message::isActive()->isForYou()->orderBy('id','desc')->get();
        $paymentChecker = PaymentChecker::showDataPayment();
        // die;
        if (Auth::user()->isAdmin == 1) {
            $all = PaymentChecker::showDataPaymentAll();
        }
        // dd($all);
        // dump($all['dataDetail']);

        return view('home', compact('message','paymentChecker'));
    }

    public function maintenance(){
        $message = Message::isActive()->isForYou()->orderBy('id','desc')->get();
        return view('maintenance', compact('message'));
    }
}

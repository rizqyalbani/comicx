<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetitionType;
use App\Models\Faq;
use App\Models\Message;
use App\Supports\TelegramBot;
use App\Models\User;
use App\Models\TelegramNotification;
use Auth;

class QAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tele = new TelegramBot();
        // $tele->sendMessage("hello\nsada");
        $models = CompetitionType::isNotDeleted()->get();
        $question = Faq::isActive()->isGeneral()->isAnswer()->select('question', 'answer')->get();
        return view('user.qa', compact('models', 'question'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $models = new Faq();
        $models->user_id = Auth::user()->id;
        $models->question = $request->question;
        $models->competition_type_id = $request->competition_type_id;
        $models->save();

        $tele = new TelegramNotification();
        $tele->name = TelegramNotification::TITLE_NEW_QUESTION;
        $tele->description = $request->question;
        $tele->type = TelegramNotification::TYPE_NEW_QUESTION;
        $tele->save();

        $user = User::where('isAdmin', 1)->get();

        foreach ($user as $key => $item) {
            $msg = new \App\Models\Message;
            $msg->name = 'Pertanyaan Baru';
            $msg->description = $request->question;
            $msg->type_message = 4;
            $msg->target_id = $item->id;
            $msg->user_id = Auth::user()->id;
            $msg->save();
        }
       

        return redirect()->back()->with('info', 'Pertanyaan berhasil diajukan');

    }
}

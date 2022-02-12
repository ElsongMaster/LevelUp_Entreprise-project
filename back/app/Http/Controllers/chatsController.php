<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\Messagebis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chatsController extends Controller
{
    protected $i = 0;
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('chats');
    }

    public function fetchMessages()
    {
        // $msgs = [];
        // foreach (Messagebis::all() as $msg) {
        //     array_push($msgs, ["message" => $msg, "user" => $msg->user]);
        // }

        // return $msgs;

        return Messagebis::with('user')->get();
    }
    public function sendMessage(Request $rq)
    {
        $fields = $rq->all();
        $newMessagebis = new Messagebis;
        // dd($fields["message"]);

        $newMessagebis->message = $fields["message"];
        $newMessagebis->user_id = $fields["user"]["id"];
        $newMessagebis->save();
        // dd($newMessagebis->load('user'));
        broadcast((new MessageSent($newMessagebis->load('user'))))->toOthers();

        $this->i++;

        return ['status' => 'succes'];
    }
}

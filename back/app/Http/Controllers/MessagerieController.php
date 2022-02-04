<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Sessionmessage;
use Illuminate\Http\Request;

class MessagerieController extends Controller
{
    public function index(){
        $sessionMessage = Sessionmessage::latest()->first();
        return view('messagerie.chat',compact('sessionMessage'));
    }


    public function store(Request $rq){

        $sessionmsg = Sessionmessage::latest()->first();
        $newMessage = new Message;
        $newMessage->contenu = $rq->contenu;
        $newMessage->user_id = 1 ;
        $newMessage->sessionmessage_id = $sessionmsg->id;
        $newMessage->save();


        return redirect()->back();

        
    }
}

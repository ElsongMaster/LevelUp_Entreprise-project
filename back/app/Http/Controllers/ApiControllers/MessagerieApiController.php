<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sessionmessage;

class MessagerieApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
    }

    public function welcome(Request $rq){
        $newSessionmsg = new Sessionmessage;
        $user = $rq->user();
        $newSessionmsg->user_id = $user->id;

        $newSessionmsg->save();

        $newMessage = new Message;
        $newMessage->contenu = "Bienvenue Mme/Mr. ".$user->name.", que puis-je faire pour vous ?";
        $newMessage->user_id = $user->id;
        $newMessage->sessionmessage_id = $newSessionmsg->id;
        $newMessage->save();


        return response([
            "message" => "Succès.",
            "data" =>[
                "msg"=>$newMessage->contenu
            ],
            "status" => 200,
            "error" => []
        ]);







    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        $fields = $rq->validate([
            'contenu' => 'required|string',

        ]); 

        if(strlen($fields['contenu'])== 0){
            return response([
                "message"=>"Le contenu du msg ne peut pas être vide",
                "status"=>401,
                "error"=>[]
            ]);
        }

        $user = $rq->user();
        $message = new Message;
        $message->contenu = $fields['contenu'];
        $message->user_id = $user->id;
        $message->sessionmessage_id = Sessionmessage::count();
        $message->save();




        return response([
            "message"=>"Message reçu avec succès",
            "data"=>$message,
            "status"=>200,
            "error"=>[]
        ]);
    }

    public function responseAdmin(Request $rq){
        $user = $rq->user();

        $message = new Message;
        $message->contenu = "Quelle est votre probleme ?";
        $message->user_id = $user->id;
        $message->sessionmessage_id = Sessionmessage::count();
        $message->save();





        return response([
            "message"=>" Succès",
            "data"=>[
                "msgAdmin"=>$message->contenu,
                "sessionMsgIsFinish"=>false
            ],
            "status"=>200,
            "error"=>[]
        ]);


        

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

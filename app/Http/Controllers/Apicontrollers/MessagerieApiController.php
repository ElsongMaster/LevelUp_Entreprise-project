<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $message->save();




        return response([
            "message"=>"Message reçu avec succès",
            "data"=>$message,
            "status"=>200,
            "error"=>[]
        ]);
    }

    public function responseAdmin(Request $rq){

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

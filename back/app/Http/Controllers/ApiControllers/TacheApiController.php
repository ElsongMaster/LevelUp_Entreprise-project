<?php

namespace App\Http\Controllers\ApiControllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class TacheApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $user = $rq->user();
        if (!$user) {
            return response([
                "message" => "Vous n'êtes pas connecté.",
                "data" => [],
                "status" => 401,
                "error" => []
            ]);
        }
        return response([
            "message"=>"succés",
            "data"=>$user->taches()->get(),
            "status" => 401,
            "error" => []
        ]);
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

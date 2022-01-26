<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AuthController extends Controller
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
            "message" => "Succès.",
            "data" =>$user,
            "status" => 200,
            "error" => []
        ]);
    }

    public function allUser(){
        return response([
            "message" => "Succès.",
            "data" =>User::all(),
            "status" => 200,
            "error" => []
        ]);      
    }


    public function register(Request $rq)
    {
         $rq->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',

        ]);

        $user = new User;

        $user->name = $rq->name;
        $user->email = $rq->email;
        $user->password = Hash::make($rq->password);
        $user->save();




        return response()->json([
            "message" => "votre compte a bien été crée.",
            "status" => 200,
            "error" => "{}",
        ]);

    }


    public function login(Request $request)
    {

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:4',
        ]);

        // Getting user who want to login
        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response(['message' => 'Bad creds, email or password is not correct'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'message' => 'Vous avez réussi à vous connecter',
            'data' => [
                'type' => 'bearer',
                'token' => $token,
            ],
            'status' => 200,
            'error' => []
        ];

        return response($response);
    }  
    
    
    public function logout(Request $request)
    {
        // Getting the current connected user
        $user = $request->user();

        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return [
            'message' => 'logged out',
            'data' => [],
            'status' => 200,
            'error' => []
        ];
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

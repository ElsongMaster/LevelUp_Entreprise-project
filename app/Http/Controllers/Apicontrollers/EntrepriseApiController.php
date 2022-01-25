<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $user = $rq->user();
        $data = [
            "profile"=>$user->profilecompany(),
            "personne de contact"=>$user->profilecompany()->personnecontact()
        ];

        return response([
            "message" => "Succès.",
            "data" =>$data,

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
    public function store(Request $request)
    {
        $request->validate([
            'num_tva' => 'required|string',
            'activite' => 'required|string|unique:users,email',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'num_fixe' => 'required|string',
            'code_postal' => 'required|string',

        ]);
    }

    public function register(Request $rq){
        $rq->validate([
            'num_tva' => 'required|string',
            'activite' => 'required|string|unique:users,email',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'num_fixe' => 'required|string',
            'code_postal' => 'required|string',
        ]);

        $newEntreprise = new Entreprise;

        $newEntreprise->num_TVA = $rq->num_TVA;
        $newEntreprise->activite = $rq->activite;
        $newEntreprise->adresse = $rq->adresse;
        $newEntreprise->ville = $rq->ville;
        $newEntreprise->pays = $rq->pays;
        $newEntreprise->num_fixe = $rq->num_fixe;
        $newEntreprise->code_postal = $rq->code_postal;
        $newEntreprise->save();
        
        
        return response([
            "message" => "Infos conncernant l'entreprise correctement enregistré",
            "data" => "{}",
            "status" => 200,
            "error" => "{}",
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
    public function update(Request $rq, $id)
    {
        $rq->validate([
            'email' => 'required|string',
            'nom' => 'required|string',
            'num' => 'required|string',

        ]);
        
        $user = $rq->user();
        $personneContact = $user->profilecompany()->personnecontact();
        $personneContact->email = $rq->email;
        $personneContact->nom = $rq->nom;
        $personneContact->num = $rq->num;

        $personneContact->save();
        $data = [
            "profile"=>$user->profilecompany(),
            "personne de contact"=>$user->profilecompany()->personnecontact()
        ];
        return response([
            "message"=>"Votre profil a bien été modifié",
            "data"=>$data,
            "status"=>200,
            "error"=>[],
            

        ]);



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

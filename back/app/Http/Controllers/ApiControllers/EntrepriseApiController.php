<?php

namespace App\Http\Controllers\ApiControllers;


use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Creationcompte;
use App\Mail\Recaptacherestante;
use App\Models\Personnecontact;
use Illuminate\Support\Facades\Mail;

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
            "profile" => $user->profilecompany(),
            "personne de contact" => $user->profilecompany()->personnecontact()
        ];

        return response([
            "message" => "Succès.",
            "data" => $data,
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
            'nom' => 'required|string',
            'activite' => 'required|string|unique:users,email',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'num_fixe' => 'required|string',
            'code_postal' => 'required|string',

        ]);
    }

    public function register(Request $rq)
    {
        $rq->validate([
            'num_tva' => 'required|string',
            'nom' => 'required|string',
            'activite' => 'required|string|unique:users,email',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'num_fixe' => 'required|string',
            'code_postal' => 'required|string',
        ]);



        $newEntreprise = new Entreprise;
        $newEntreprise->num_TVA = $rq->num_tva;
        $newEntreprise->nom = $rq->nom;
        $newEntreprise->activite = $rq->activite;
        $newEntreprise->adresse = $rq->adresse;
        $newEntreprise->ville = $rq->ville;
        $newEntreprise->pays = $rq->pays;
        $newEntreprise->num_fixe = $rq->num_fixe;
        $newEntreprise->code_postal = $rq->code_postal;
        $newEntreprise->user_id = $rq->user()->id;
        $newEntreprise->save();


        return response()->json([
            "message" => "Infos conncernant l'entreprise correctement enregistré",
            "data" => [],
            "status" => 200,
            "error" => "{}",
        ]);
    }
    public function register2(Request $rq)
    {
        $rq->validate([
            'email' => 'required|string|unique:users,email',
            'nom' => 'required|string',
            'num' => 'required|string',

        ]);
        $user = $rq->user();
        // dd($user->entreprise)
        $newPersonnecontact = new Personnecontact;
        $newPersonnecontact->email = $rq->email;
        $newPersonnecontact->nom = $rq->nom;
        $newPersonnecontact->num = $rq->num;
        $newPersonnecontact->entreprise_id = $user->entreprise->id;
        $newPersonnecontact->save();
        // dd($newPersonnecontact->email);
        Mail::to($newPersonnecontact->email)->send(new Creationcompte());
        // $personnesContact = Personnecontact::all();
        // foreach ($personnesContact as $infosPersonne) {
        //     $idEntreprise = $infosPersonne->entreprise->id;
        //     Mail::to($infosPersonne->email)->bcc("dushimeelvis@gmail.com")->send(new Recaptacherestante($idEntreprise));
        // }

        return response()->json([
            "message" => "Infos concernant l'entreprise correctement enregistré, Compte complété avec succès",
            "data" => $newPersonnecontact,
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
        $personneContact = $user->entrprise()->personnecontact();
        $personneContact->email = $rq->email;
        $personneContact->nom = $rq->nom;
        $personneContact->num = $rq->num;

        $personneContact->save();
        $data = [
            "profile" => $user->profilecompany(),
            "personne de contact" => $user->profilecompany()->personnecontact()
        ];
        return response([
            "message" => "Votre profil a bien été modifié",
            "data" => $data,
            "status" => 200,
            "error" => [],


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

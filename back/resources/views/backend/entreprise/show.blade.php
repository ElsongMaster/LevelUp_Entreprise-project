@extends('backend.template.main')



@section('backContent')
<div class="container">

    <h2 class="text-center fs-2 text-decoration-underline">Détails de l'entreprise</h2>



                
            <div class="card m-3 mx-auto   " style="width: 18rem;">

                <div class="card-body">
                    <h5 class="card-title">Nom: <span class="  'text-info'}}">{{$entreprise->nom}}</span></h5>
                    <h5 class="card-title">Activité: <span class="  text-info">{{$entreprise->activite}}</span></h5>
                    <p class="card-text">Adresse: <span class="  text-info">{{$entreprise->adresse}}</span></p>
                    <p class="card-text">Ville: <span class="  text-info">{{$entreprise->ville}}</span></p>
                    <p class="card-text">Effectif: <span class="  text-info">{{$entreprise->pays}}</span></p>
                    <p class="card-text">Numéro fixe: <span class="  text-info">

                    </span></p>
                    <p class="card-text">Code postale: <span class="  text-info">{{$entreprise->code_postal}}</span></p>
                        


                </div>
            </div> 

    </div> 
@endsection
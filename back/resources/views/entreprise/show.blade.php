@extends('adminlte::page')



@section('content')
<div class="container">

    <h2 class="text-center fs-2 text-decoration-underline">Détails de l'entreprise</h2>



                
    <div class="card">
        {{-- <img class="card-img-top" src="https://picsum.photos/200/150/?random
"> --}}
        <div class="card-block">
            {{-- <figure class="profile">
                <img src="https://picsum.photos/200/150/?random" class="profile-avatar" alt="">
            </figure> --}}
            <h4 class="card-title mt-3">{{$entreprise->nom}}</h4>
            {{-- <div class="meta">
                <a>Friends</a>
            </div> --}}
            {{-- <div class="card-text">
                Tawshif is a web designer living in Bangladesh.
            </div> --}}
        </div>
         <!--<div class="card-footer">
            <small>Last updated 3 mins ago</small>
            <button class="btn btn-secondary float-right btn-sm">show</button>
        </div>-->
        <div class="card-footer tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">détails</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">personne de contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false">liste des tâches</a>
            </li>

          </ul>
        </div>
        
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
            <h5 class="card-title "><u>Infos générales</u> </h5><br>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Numéro de TVA:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->num_tva}}"
                  aria-label="disabled input example"
                  disabled
                />

              </div>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Activité:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->activite}}"
                  aria-label="disabled input example"
                  disabled
                />

              </div>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Adresse:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->adresse}}"
                  aria-label="disabled input example"
                  disabled
                />

              </div>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Ville:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->ville}}"
                  aria-label="disabled input example"
                  disabled
                />

              </div>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Pays:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->pays}}"
                  aria-label="disabled input example"
                  disabled
                />

              </div>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Code Postal:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->code_postal}}"
                  aria-label="disabled input example"
                  disabled
                />

              </div>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Numéro fixe:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->num_fixe}}"
                  aria-label="disabled input example"
                  disabled
                />

              </div>
            <a href="{{route('entreprises.index')}}" class="btn btn-primary">Retour</a>              
        </div>
        <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
            <h5 class="card-title "><u>Infos personne de contact</u> </h5><br>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Email:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->personnecontact->email}}"
                  aria-label="disabled input example"
                  disabled
                />

            </div>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Nom:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->personnecontact->nom}}"
                  aria-label="disabled input example"
                  disabled
                />

            </div>
            <div class="form-outline mb-3 d-flex justify-content-center align-items-center my-3" style="width: 22rem;">
                <label class="form-label w-75" for="formControlDisabled">Numéro de tél:</label>
                <input
                  class="form-control"
                  id="formControlDisabled"
                  type="text"
                  placeholder="{{$entreprise->personnecontact->num}}"
                  aria-label="disabled input example"
                  disabled
                />

            </div>
            <a href="{{route('entreprises.index')}}" class="btn btn-primary">Retour</a>              
        </div>

        <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
            <h5 class="card-title "><u>Tâches</u> </h5><br>
            <div class="form-outline mb-3 d-flex flex-wrap border my-3 w-100" >

                <h6 class="underline">Tâches à faire</h6>


                {{-- <ul class="list-group">
                    @foreach($entreprise->taches() as $tache)
                        <li class="list-group-item">{{ $todo->task }}</li>
                    @endforeach
                </ul> --}}
                <div class="container">
                    <div class="row">
                        <div class=" d-flex flex-wrap ">
                            @foreach ($entreprise->taches()->where('status','=','open')->get() as $tache )
                                
                            <div class="cardTask cardTask-margin m-2">
                                {{-- <div class="cardTask-header no-border">
                                    <h5 class="cardTask-title">{{$tache->status}}</h5>
                                </div> --}}
                                <div class="cardTask-body pt-0 ">
                                    <div class="widget-49 p-4">
                                        <div class="widget-49-title-wrapper">
                                            <div class="widget-49-date-primary">
                                                <span class="widget-49-date-day">09</span>
                                                <span class="widget-49-date-month">apr</span>
                                            </div>
                                            <div class="widget-49-meeting-info">
                                                <span class="widget-49-pro-title">PRO-08235 DeskOpe. Website</span>
                                                <span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>
                                            </div>
                                        </div>
                                        <ol class="widget-49-meeting-points">
                                            <li class="widget-49-meeting-item"><span>Expand module is removed</span></li>
                                            <li class="widget-49-meeting-item"><span>Data migration is in scope</span></li>
                                            <li class="widget-49-meeting-item"><span>Session timeout increase to 30 minutes</span></li>
                                        </ol>
                                        <div class="widget-49-meeting-action">
                                            {{-- <a href="#" class="btn btn-sm btn-flash-border-primary">View All</a> --}}
                                            <span class="btn btn-sm btn-flash-border-primary">{{$tache->status}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>


                    </div>
                </div>
                <hr class="border-secondary w-100" height="1px" >
                <h6 class="underline">Tâches éffectué</h6>
                <div class="container">
                    <div class="row">
                        <div class=" d-flex flex-wrap ">
                            @foreach ($entreprise->taches()->where('status','=','done')->get() as $tache )
                                
                            <div class="cardTask cardTask-margin m-2">
                                {{-- <div class="cardTask-header no-border">
                                    <h5 class="cardTask-title">{{$tache->status}}</h5>
                                </div> --}}
                                <div class="cardTask-body pt-0 ">
                                    <div class="widget-49 p-4">
                                        <div class="widget-49-title-wrapper">
                                            <div class="widget-49-date-primary">
                                                <span class="widget-49-date-day">09</span>
                                                <span class="widget-49-date-month">apr</span>
                                            </div>
                                            <div class="widget-49-meeting-info">
                                                <span class="widget-49-pro-title">PRO-08235 DeskOpe. Website</span>
                                                <span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>
                                            </div>
                                        </div>
                                        <ol class="widget-49-meeting-points">
                                            <li class="widget-49-meeting-item"><span>Expand module is removed</span></li>
                                            <li class="widget-49-meeting-item"><span>Data migration is in scope</span></li>
                                            <li class="widget-49-meeting-item"><span>Session timeout increase to 30 minutes</span></li>
                                        </ol>
                                        <div class="widget-49-meeting-action">
                                            {{-- <a href="#" class="btn btn-sm btn-flash-border-primary">View All</a> --}}
                                            <span class="btn btn-sm btn-flash-border-primary">{{$tache->status}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="container d-flex justify-content-center">
            
                            <a href="{{route('taches.create')}}" class="btn btn-warning p-4  my-3 rounded mx-auto"><i class="fas fa-plus text-secondary " style="font-size: 25px"></i></a>
                        </div>

                    </div>
                </div>
            </div>
            <a href="{{route('entreprises.index')}}" class="btn btn-primary">Retour</a> 
        </div>
    </div>

    </div> 
@stop
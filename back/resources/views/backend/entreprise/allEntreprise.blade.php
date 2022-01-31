@extends('backend.template.main')



@section('backContent')
<h1 class="text-center text-decoration-underline fs-4 fw-bold my-3">Adresses de la Newsletter</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Num_tva</th>
      <th scope="col">Nom</th>
      <th scope="col">Activté</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($entreprises as $entreprise )
          
      <tr>
        <th scope="row">{{$entreprise->num_tva}}</th>
        <td>{{$entreprise->nom}}</td>
        <td>{{$entreprise->activité}}</td>
        <td class="d-flex justify-content-evenly">
            <a href="{{route('entreprises.show')}} btn btn-infos"></a>

        </td>
      </tr>
      @endforeach

  </tbody>
</table>  
@endsection
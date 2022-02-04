@extends('adminlte::page')



@section('content')


<div class="container d-flex flex-column  mb-2 w-75" >

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
          <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif



<div class="d-flex my-3 justify-content-end">
<a href="{{route('entreprises.show',["entreprise"=>Auth::user()->entreprise->id])}}" style="font-size:15px;">Retour au profil</a>
</div>
 <h1 class="text-center my-3"> Création d'une tâche</h1>
<form action="{{route('taches.store')}}" method="post"   >
    @csrf




<div class="mb-3">
    <label for="titre" class="form-label">Titre</label>
    <input type="text" value = "{{old('titre')}}"   class="form-control" id="titre" name="titre" >
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" value = "{{old('description')}}"   class="form-control" id="description" name="description" >
</div>

<div class="mb-3">
    <label for="status" class="form-label">Statut</label>
    <select name="status" id="status">


        <option value="open" >open</option>
        <option value="done" >done</option> 



    </select>
</div>

{{-- <div class="mb-3">
    <label for="heure" class="form-label">Heure</label>
    <input type="texte" value = "{{old('heure')}}" placeholder="10AM - 12AM"  class="form-control" id="heure" name="heure" >
</div> --}}


<div class="d-flex justify-content-center">

    <button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>

</div>

@stop

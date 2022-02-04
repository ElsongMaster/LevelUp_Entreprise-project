@extends('adminlte::page')



@section('content')
<h1 class="text-center text-decoration-underline fs-4 fw-bold my-3">Liste des entreprises</h1>
<div class="table100 ver1 m-b-110">
  <div class="table100-head">
    <table>
      <thead>
        <tr class="row100 head">
          <th class="cell100 column1">Numéro TVA</th>
          <th class="cell100 column2">Nom</th>
          <th class="cell100 column3">Activité</th>
          <th class="cell100 column2">Numéro fixe</th>
          <th class="cell100 column4 text-center">Détails</th>
        </tr>
      </thead>
    </table>
  </div>

  <div class="table100-body js-pscroll">
    <table>
      <tbody>
        @foreach ($entreprises as $entreprise )
          
        <tr class="row100 body">
          <td class="cell100 column1">{{$entreprise->num_tva}}</td>
          <td class="cell100 column2">{{$entreprise->nom}}</td>
          <td class="cell100 column3">{{$entreprise->activite}}</td>
          <td class="cell100 column3">{{$entreprise->num_fixe}}</td>
          <td class="cell100 column4"><a class="btn btn-primary" href="{{route('entreprises.show',$entreprise->id)}}"><i class="far fa-eye"></i></a></td>

        </tr>
        @endforeach

        {{-- <tr class="row100 body">
          <td class="cell100 column1">Mind & Body</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">8:00 AM - 9:00 AM</td>
          <td class="cell100 column4">Adam Stewart</td>
          <td class="cell100 column5">15</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Crit Cardio</td>
          <td class="cell100 column2">Gym</td>
          <td class="cell100 column3">9:00 AM - 10:00 AM</td>
          <td class="cell100 column4">Aaron Chapman</td>
          <td class="cell100 column5">10</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Wheel Pose Full Posture</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">7:00 AM - 8:30 AM</td>
          <td class="cell100 column4">Donna Wilson</td>
          <td class="cell100 column5">15</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Playful Dancer's Flow</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">8:00 AM - 9:00 AM</td>
          <td class="cell100 column4">Donna Wilson</td>
          <td class="cell100 column5">10</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Zumba Dance</td>
          <td class="cell100 column2">Dance</td>
          <td class="cell100 column3">5:00 PM - 7:00 PM</td>
          <td class="cell100 column4">Donna Wilson</td>
          <td class="cell100 column5">20</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Cardio Blast</td>
          <td class="cell100 column2">Gym</td>
          <td class="cell100 column3">5:00 PM - 7:00 PM</td>
          <td class="cell100 column4">Randy Porter</td>
          <td class="cell100 column5">10</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Pilates Reformer</td>
          <td class="cell100 column2">Gym</td>
          <td class="cell100 column3">8:00 AM - 9:00 AM</td>
          <td class="cell100 column4">Randy Porter</td>
          <td class="cell100 column5">10</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Supple Spine and Shoulders</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">6:30 AM - 8:00 AM</td>
          <td class="cell100 column4">Randy Porter</td>
          <td class="cell100 column5">15</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Yoga for Divas</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">9:00 AM - 11:00 AM</td>
          <td class="cell100 column4">Donna Wilson</td>
          <td class="cell100 column5">20</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Virtual Cycle</td>
          <td class="cell100 column2">Gym</td>
          <td class="cell100 column3">8:00 AM - 9:00 AM</td>
          <td class="cell100 column4">Randy Porter</td>
          <td class="cell100 column5">20</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Like a butterfly</td>
          <td class="cell100 column2">Boxing</td>
          <td class="cell100 column3">9:00 AM - 11:00 AM</td>
          <td class="cell100 column4">Aaron Chapman</td>
          <td class="cell100 column5">10</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Mind & Body</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">8:00 AM - 9:00 AM</td>
          <td class="cell100 column4">Adam Stewart</td>
          <td class="cell100 column5">15</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Crit Cardio</td>
          <td class="cell100 column2">Gym</td>
          <td class="cell100 column3">9:00 AM - 10:00 AM</td>
          <td class="cell100 column4">Aaron Chapman</td>
          <td class="cell100 column5">10</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Wheel Pose Full Posture</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">7:00 AM - 8:30 AM</td>
          <td class="cell100 column4">Donna Wilson</td>
          <td class="cell100 column5">15</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Playful Dancer's Flow</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">8:00 AM - 9:00 AM</td>
          <td class="cell100 column4">Donna Wilson</td>
          <td class="cell100 column5">10</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Zumba Dance</td>
          <td class="cell100 column2">Dance</td>
          <td class="cell100 column3">5:00 PM - 7:00 PM</td>
          <td class="cell100 column4">Donna Wilson</td>
          <td class="cell100 column5">20</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Cardio Blast</td>
          <td class="cell100 column2">Gym</td>
          <td class="cell100 column3">5:00 PM - 7:00 PM</td>
          <td class="cell100 column4">Randy Porter</td>
          <td class="cell100 column5">10</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Pilates Reformer</td>
          <td class="cell100 column2">Gym</td>
          <td class="cell100 column3">8:00 AM - 9:00 AM</td>
          <td class="cell100 column4">Randy Porter</td>
          <td class="cell100 column5">10</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Supple Spine and Shoulders</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">6:30 AM - 8:00 AM</td>
          <td class="cell100 column4">Randy Porter</td>
          <td class="cell100 column5">15</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Yoga for Divas</td>
          <td class="cell100 column2">Yoga</td>
          <td class="cell100 column3">9:00 AM - 11:00 AM</td>
          <td class="cell100 column4">Donna Wilson</td>
          <td class="cell100 column5">20</td>
        </tr>

        <tr class="row100 body">
          <td class="cell100 column1">Virtual Cycle</td>
          <td class="cell100 column2">Gym</td>
          <td class="cell100 column3">8:00 AM - 9:00 AM</td>
          <td class="cell100 column4">Randy Porter</td>
          <td class="cell100 column5">20</td>
        </tr>
      </tbody>
    </table> --}}
  </div>
</div>
@stop
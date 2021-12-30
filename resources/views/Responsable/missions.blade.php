@extends('master')

@section('title')
Liste des missions
@endsection

@section('content')
<div class="top_navbar">
  <div class="top_menu">
      <div class="logo">Espace responsable</div>
      
          <a href="{{ route('createRessource')}}" class="nav-link">Créer une ressource</a>
          <a href="{{ route('ressources')}}" class="nav-link">List des ressources</a>
          <a href="{{ route('missions')}}" class="nav-link">List des missions</a>
        <ul>
          <li>
              <a onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                <i class="fas fa-sign-out-alt"></i>
              </a>    
              <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </li>
      </ul>
  </div>
</div>
<div class="frame lg" >
    <table 
        id="tableEtu" 
        data-toggle="table"
        data-sort-name="nom"
        data-sort-order="asc"
        data-local="fr-FR"
        data-search="true" 
        data-show-refresh="true"
        data-show-toggle="true"
        data-show-pagination-switch="true"
        data-pagination="true"
        data-page-list="[10, 20, 50, 100, all]"
        >
        <thead>
          <tr>
            <th>Nom</th>
            <th>Localisation</th>
            <th>Nom d'anomalie</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)

          <tr>
            <td>{{ $ticket->ressourceName }}</td>
            <td>{{ $ticket->localisation }}</td>
            <td>{{ $ticket->anomalieName }}</td>            
            <td><button type="button" class="btn btn-success" 
                onclick="document.getElementById('delete-form-{{$ticket->id}}').submit();"> Accomplie</button>
             <form id="delete-form-{{$ticket->id}}" 
                + action="{{route('missions.destroy', $ticket->id)}}"
                method="post">
              @csrf
              @method('DELETE')
          </form></td>
            
          </tr>
          @endforeach

 
        </tbody>
      </table>
  </div>
@endsection
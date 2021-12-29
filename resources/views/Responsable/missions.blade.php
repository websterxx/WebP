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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/locale/bootstrap-table-fr-FR.min.js"></script>
@endsection
@extends('master')

@section('title')
Liste des ressources
@endsection

@section('content')
<div class="top_navbar">
  <div class="top_menu">
      <div class="logo">Espace responsable de maintenance</div>
      <ul>
          <a href="{{ route('createRessource')}}" class="p-3">Créer une ressource</a>
          <a href="{{ route('ressources')}}" class="p-3">List des ressources</a>
          <a href="{{ route('missions')}}" class="p-3">List des missions</a>

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
            <th>ID</th>
            <th>Nom</th>
            <th>Localisation</th>
            <th>Info</th>
            <th>Supprimer</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($ressources as $ressource)

          <tr>
            <td>{{ $ressource->id }}</td>
            <td>{{ $ressource->name }}</td>
            <td>{{ $ressource->localisation }}</td>
            <td>
              <button type="button" class="btn btn-info" onclick="getInfo({{$ressource->id}})">Information</button>
            </td>
            
            <td>
              <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-form-{{$ressource->id}}').submit();">Supprimer</button>
              <form id="delete-form-{{$ressource->id}}" 
                + action="{{route('ressources.destroy', $ressource->id)}}"
                method="post">
                @csrf 
                @method('DELETE')
              </form>
            </td>
            
          </tr>
          @endforeach

 
        </tbody>
      </table>
  </div>

  <script>
    function getInfo(id){
      console.log('DONE');

      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      type: "POST",
      url: "/simple-qrcode",
      data: {
        'id' : id
      },
      dataType: "json",
      success: function (response) {
          console.log('DONE2');
          console.log(response);
      }
    });
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/locale/bootstrap-table-fr-FR.min.js"></script>
@endsection
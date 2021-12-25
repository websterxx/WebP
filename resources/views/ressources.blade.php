@extends('master')



@section('content')
<div class="top_navbar">
    <div class="top_menu">
        <div class="logo">Maintenance </div>
        <ul>
            <li><a onclick="">
                <i class="fas fa-home" onclick="window.location='{{ route("home") }}'"></i>
                </a>
            </li>
            <li><a onclick="">
                <i class="fas fa-sign-out-alt" onclick="window.location='{{ route("home") }}'"></i>
                </a>
            </li>
            <a href="{{ route('createuser')}}" class="p-3">Create User</a>
            <a href="{{ route('listusers')}}" class="p-3">List users</a>
            <a href="{{ route('createRessource')}}" class="p-3">Create Ressource</a>
            <a href="{{ route('ressources')}}" class="p-3">Ressources</a>

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
            <th>Modifier</th>
            <th>Supprimer</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($ressources as $ressource)

          <tr>
            <td>{{ $ressource->id }}</td>
            <td>{{ $ressource->name }}</td>
            <td>{{ $ressource->localisation }}</td>
            <td><a href="#">Edit</a></td>
            
            <td><a href="{{ route('createRessource')}} " 
                onclick="event.preventDefault();
                 document.getElementById(
                   'delete-form-{{$ressource->id}}').submit();"> Delete</a>
             <form id="delete-form-{{$ressource->id}}" 
                + action="{{route('ressources.destroy', $ressource->id)}}"
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
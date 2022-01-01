@extends('master')

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('title')
Liste des utilisateurs
@endsection

@section('content')
<div class="top_navbar">
  <div class="top_menu">
      <div class="logo">Espace Admin</div>
          <a href="{{ route('createuser')}}" class="nav-link">Créer un utilisateur</a>
          <a href="{{ route('listusers')}}" class="nav-link">Liste des utilisateurs</a>
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
            <th>Email</th>
            <th>Username</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
          <tr>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->username}}</td>
            <td><button class="btn btn-danger" onclick="document.getElementById('delete-form-{{$user->id}}').submit();"> Delete</button>
            <form id="delete-form-{{$user->id}}" action="{{route('users.destroy', $user->id)}}"
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
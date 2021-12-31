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

    <!-- Modal -->
    <div id="modalEditer" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modifier l'utilisateur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                
                <form action="{{ route('createuser')}}" method="POST">
                    @csrf
                    <div id="formModif">

                    </div>
                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

  <script>
    const users = @json($user);
    function editer (id){
      console.log(users);
      $('#formModif').append(`
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="name" id="nom" value="${users.nom}" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="${users.username}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address email</label>
                        <input type="email" class="form-control" name="email" id="email" value="${users.email}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" value="${users.password}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirmer mot de passe</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="title">
                        <button type="submit" class="btn btn-primary btn-lg mt-3">Valider</button>
                    </div>
      `)
    }
  </script>
@endsection
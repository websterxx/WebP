@extends('master')

@section('title')
Création des utilisateurs
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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

<div class="frame">
    <div class="titre">
        <label class="fontSize">Créer un nouveau utilisateur</label>
    </div>
    <form action="{{ route('createuser')}}" method="POST" class="needs-validation" oninput='password_confirmation.setCustomValidity(password_confirmation.value != password.value ? "Passwords do not match." : "")' novalidate>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="nom" value="{{ old('name') }}" pattern=".{2,30}" title="Nombre de caractére entre 2 et 15"  required>
            <div class="valid-feedback">
                Semble bon! 
            </div>
            <div id="errorNom" class="invalid-feedback">
                Nombre de caractére doit être entre 2 et 30
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" pattern=".{2,30}" required>
            <div class="valid-feedback">
                Semble bon! 
            </div>
            <div id="errorUsername" class="invalid-feedback">
                Nombre de caractére doit être entre 2 et 30
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            <div class="valid-feedback">
                Semble bon! 
            </div>
            <div id="errorEmail" class="invalid-feedback">
                Format invalide
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
            <div class="valid-feedback">
                Semble bon! 
            </div>
            <div id="errorPassword" class="invalid-feedback">
                Doit contenir 8 caractère avec une lettre majuscule, miniscule et un chiffre
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirmer mot de passe</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" pattern="(?=^.{8,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
            <div class="valid-feedback">
                Semble bon! 
            </div>
            <div id="validate" class="invalid-feedback">
                Les mots de passe saisis ne sont pas identiques
            </div>
        </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        <div class="title">
            <button type="submit" class="btn btn-primary btn-lg mt-3">Valider</button>
        </div>
    </form>
</div>
<script>
    (function () {
          'use strict'
          var forms = document.querySelectorAll('.needs-validation')
          Array.prototype.slice.call(forms)
              .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                  form.classList.add('was-validated')
              }, false)
              })
    })()
</script>
@endsection 
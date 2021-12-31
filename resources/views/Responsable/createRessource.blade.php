@extends('master')

@section('title')
Création d'une ressource
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
<div class="frame">
    <div class="titre">
        <label class="fontSize">Créer une ressources</label>
    </div>
    <form action="{{ route('createRessource')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="nom" value="{{ old('name') }}" pattern=".{2,15}" required >
            <div class="valid-feedback">
              Semble bon! 
            </div>
            <div id="errorNom" class="invalid-feedback">
                Nombre de caractére entre 2 et 15
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Localisation</label>
            <input type="text" class="form-control" name="localisation" id="localisation" value="{{ old('localisation') }}" pattern=".{2,15}" required >
            <div class="valid-feedback">
              Semble bon! 
            </div>
            <div id="errorLoc" class="invalid-feedback">
              Nombre de caractére entre 2 et 15
            </div>
        </div>
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
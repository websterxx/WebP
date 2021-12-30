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
<!--
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Espace responsable</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('createRessource')}}" >Créer une ressourc <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('ressources')}}" class="nav-link">List des ressources</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('missions')}}" class="nav-link">List des missions</a>
        </li>
      </ul>
      <li>
        <a onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
          <i class="fas fa-sign-out-alt"></i>
        </a>    
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
    </li>
    </div>
  </nav>
-->
<div class="frame">
    <div class="titre">
        <label class="fontSize">Créer une ressources</label>
    </div>
    <form action="{{ route('createRessource')}}" method="POST"  class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="nom" required >
            <div class="valid-feedback">
              Semble bon! 
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Localisation</label>
            <input type="text" class="form-control" name="localisation" id="localisation" required >
            <div class="valid-feedback">
              Semble bon! 
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
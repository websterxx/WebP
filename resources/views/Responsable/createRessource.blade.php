@extends('master')

@section('title')
Création d'une ressource
@endsection

@section('content')
<div class="top_navbar">
    <div class="top_menu">
        <div class="logo">Maintenance </div>
        <ul>
            <a href="{{ route('createRessource')}}" class="p-3">Create Ressource</a>
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

    <div class="frame">
        <div class="titre">
            <label class="fontSize">Créer une ressources</label>
        </div>
        <form action="{{ route('createRessource')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" id="nom" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Localisation</label>
                <input type="text" class="form-control" name="localisation" id="localisation" >
            </div>
            <div class="title">
                <button type="submit" class="btn btn-primary btn-lg mt-3">Valider</button>
            </div>
        </form>
    </div>
@endsection 
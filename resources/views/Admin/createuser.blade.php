@extends('master')

@section('title')
Création des utilisateurs
@endsection

@section('content')
<div class="top_navbar">
    <div class="top_menu">
        <div class="logo">Espace Admin </div>
        <ul>
            <!--<li><a onclick="">
                <i class="fas fa-home" onclick="window.location='{{ route("home") }}'"></i>
                </a>
            </li>-->
            
            <a href="{{ route('createuser')}}" class="p-3">Créer un utilisateur</a>
            <a href="{{ route('listusers')}}" class="p-3">Liste des utilisateurs</a>
            <a href="{{ route('createanomalie')}}" class="p-3">Créer une anomalie</a>
            <!--<a href="{{ route('createanomalie')}}" class="p-3">Liste des anomalie</a>-->
            
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
        <form action="{{ route('createuser')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" id="nom" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address email</label>
                <input type="email" class="form-control" name="email" id="email" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirmer mot de passe</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="title">
                <button type="submit" class="btn btn-primary btn-lg mt-3">Valider</button>
            </div>
        </form>
    </div>
@endsection 
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

    <div class="frame">
        <div class="titre">
            <label class="fontSize">Créer une ressources</label>
        </div>
        <form method="POST" action="{{ route('createRessource')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" >
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
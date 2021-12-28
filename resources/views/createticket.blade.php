@extends('master')

@section('title')
    Formulaire
@endsection

@section('content')
<div class="top_navbar">
  <div class="top_menu">
      <div class="logo">Défaillance</div>
  </div>
</div>

<div class="frame">
    <div class="titre">
        <label class="fontSize">Déclarer une défaillance</label>
    </div>
    <form action="{{ route('createticket', $ressource ) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ressource</label>
            <input type="text" class="form-control" name="name" id="nom" value="{{ $ressource->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Localisation</label>
            <input type="text" class="form-control" name="localisation" id="localisation" value="{{ $ressource->localisation }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Responsable</label>
            <input class="form-control" name="responsable" id="responsable" value="{{ $user->name }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Anomalie</label>
            <select name="anomalie" id="anomalie" class="form-control">
                @foreach ($anomalies as $anomalie)
                    <option value="{{ $anomalie->id }}">{{ $anomalie->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="title">
            <button type="submit" class="btn btn-primary btn-lg mt-3">Valider</button>
        </div>
    </form>
</div>
@endsection
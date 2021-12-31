@extends('master')

@section('title')
    Formulaire défaillance
@endsection

@section('content')
<div class="top_navbar">
  <div class="top_menu center_menu">
      <div class="logoExp">Défaillance</div>
  </div>
</div>

<div class="frame">
    <div class="titre">
        <label class="fontSize">Déclarer une défaillance</label>
    </div>
    <form action="{{ route('createticket', $ressource ) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ressource</label>
            <input type="text" class="form-control" name="name" id="nom" value="{{ $ressource->name }}" required disabled>
            <div class="valid-feedback">
                Semble bon! 
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Localisation</label>
            <input type="text" class="form-control" name="localisation" id="localisation" value="{{ $ressource->localisation }}" required disabled>
            <div class="valid-feedback">
                Semble bon! 
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Responsable</label>
            <input class="form-control" name="responsable" id="responsable" value="{{ $user->name }}" required disabled>
            <div class="valid-feedback">
                Semble bon! 
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Anomalie</label>
            <select name="anomalie" id="anomalie" onchange="check(this.value)" class="form-control" required>
                @foreach ($anomalies as $anomalie)
                    <option value="{{ $anomalie->id }}">{{ $anomalie->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Veuillez sélectionner une anomalie.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Nouvelle anomalie</label>
            <input type="text" class="form-control" name="description" id="description" pattern=".{2,50}" required>
            <div class="valid-feedback">
                Semble bon!
            </div>
            <div id="errorDescription" class="invalid-feedback">
                Nombre de caractére doit être entre 2 et 50
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
    function check(value){
        if (value != 1) {
            console.log(value);
            $('#description').val('');
            $('#description').prop('disabled', true);
            }
        else {
            console.log(value);

            $('#description').removeClass('disabled');
            $('#description').prop('disabled', false);
        }
    }
</script>
@endsection
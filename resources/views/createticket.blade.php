@extends('master')

@section('title')
    Formulaire
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
                <option selected disabled value="">Choisir...</option>
                @foreach ($anomalies as $anomalie)
                    <option value="{{ $anomalie->id }}">{{ $anomalie->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Veuillez sélectionner un anomalie valide.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" required>
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
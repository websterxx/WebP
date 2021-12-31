@extends('master')

@section('script')
@endsection

@section('title' , 'Login')

@section('content')
    <div class="top_navbar">
        <div class="top_menu">
            <div class="logoExp">Maintenance </div>
            <ul>
        </div>
    </div>
    <div class="frame">
        <div class="titre">
            <label class="fontSize">Authentification </label>
        </div>
        <form method="POST" action="{{ route('login')}}" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address email </label>
                <input type="email" class="form-control"name="email" id="email" aria-describedby="emailHelp" required>
                    <div class="invalid-feedback">
                        Veuillez choisir un e-mail valide.
                    </div>
                    <div class="valid-feedback">
                        Semble bon! 
                    </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <div class="valid-feedback">
                    Semble bon! 
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
            <div class="title">
                <button type="submit" class="btn btn-primary btn-lg mt-3">Se connecter</button>
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
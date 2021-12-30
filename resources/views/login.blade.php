@extends('master')

@section('script')
@endsection

@section('title' , 'Login')

@section('content')
    <div class="top_navbar">
        <div class="top_menu">
            <div class="logo">Maintenance </div>
            <ul>
            <li><a onclick="">
                <i class="fas fa-home" onclick="window.location='{{ route("home") }}'"></i>
                </a></li>
            </ul>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endsection
@extends('master')

@section('title')
Création des utilisateurs
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("#password_confirmation").on('keyup', function(){
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            $("#validate2").hide();
            /*var string = $("#password_confirmation").val().toString();
            console.log(string.lenght);*/
            if (password != confirmPassword && confirmPassword)
                $("#validate").html("Les mots de passe saisis ne sont pas identiques").css("color","#dc3545");
            else
                $("#validate").html("Les mots de passe sont identiques!").css("color","#28a745");
        });
    });
</script>  
@endsection

@section('content')
<div class="top_navbar">
    <div class="top_menu">
        <div class="logo">Espace Admin</div>
            <a href="{{ route('createuser')}}" class="nav-link">Créer un utilisateur</a>
            <a href="{{ route('listusers')}}" class="nav-link">Liste des utilisateurs</a>
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
        <label class="fontSize">Créer un nouveau utilisateur</label>
    </div>
    <form action="{{ route('createuser')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="nom" required>
            <div class="valid-feedback">
                Semble bon! 
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" required>
            <div class="valid-feedback">
                Semble bon! 
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address email</label>
            <input type="email" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            <div class="valid-feedback">
                Semble bon! 
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
            <div class="valid-feedback">
                Semble bon! 
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirmer mot de passe</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" pattern="(?=^.{8,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
            <div id="validate" class="invalid-feedback">
                Les mots de passe saisis ne sont pas identiques
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
                    /*var email = $("#password").val();
                    var confirmemail = $("#password_confirmation").val();
                    if(email !== confirmemail){ 
                        form.classList.add('was-validated');
                        $("#validate").html("Email Should Match");
                        $("#validate").addClass("error");
                        $("#password_confirmation").addClass("error");
                        event.preventDefault();
                        event.stopPropagation();              
                    }
                    else{
                        $("#validate").removeClass("error");
                        form.classList.add('was-validated');
                        $("#password_confirmation").removeClass("error-text");
                        $("#validate").html("Looks Good!");
                    }*/
                
                  form.classList.add('was-validated')
              }, false)
              })
    })()
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
@endsection 
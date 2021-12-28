@extends('master')

@section('script')
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel="stylesheet" type="text/css" href="css/Form.css">
@endsection

@section('title' , 'Formulaire')


@section('content')
<div class="top_navbar">
	<div class="top_menu">
		<div class="logo">Maintenance </div>
		<ul>
			<li><a onclick="">
				<i class="fas fa-home" onclick="window.location='{{ route("home") }}'"></i>
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="frame">
	<div class="titre">
		<label class="fontSize">Déclarer une défaillance </label>
	</div>
  <form>
	<div class="form-row">
	  <div class="form-group col-md-12">
		<label for="inputState">Ressource</label>
		<select id="inputState" class="form-control">
		  <option selected>Choisir...</option>
		  <option>...</option>
		</select>
	  </div>
	</div>
	<div class="form-row">
	  <div class="form-group col-md-12">
		<label for="inputState">Localisation</label>
		<select id="inputState" class="form-control">
		  <option selected>Choisir...</option>
		  <option>...</option>
		</select>
	  </div>
	</div>
	<div class="form-row">
	  <div class="form-group col-md-12">
		<label for="inputState">Liste des anomalie</label>
		<select id="inputState" class="form-control">
		  <option selected>Choisir...</option>
		  <option>...</option>
		</select>
	  </div>
	</div>
	<div class="form-group">
	  <textarea class="form-control" id="validationTextarea" placeholder="Description de l'anomalie" maxlength="50"></textarea>
	</div>
	<div class="form-row">
	  <div class="form-group col-md-12">
		<label for="inputState">Le responsable</label>
		<select id="inputState" class="form-control">
		  <option selected>Choisir...</option>
		  <option>...</option>
		</select>
	  </div>
	</div>
	<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Valider</button>
  </form>
</div>
@endsection
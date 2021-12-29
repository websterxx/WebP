@extends('master')

@section('title')
Liste des ressources
@endsection

@section('content')
	<!-- On affiche le code QR au format SVG -->
	<div>
		{{ $qrcode }}

		<button type="button" class="btn btn-primary" onclick="getInfo()">DO</button>
	<script>
		function getInfo(){
		var jsvar = {!! json_encode($qrcode) !!}
		console.log("jsvar")
		console.log(jsvar);
	}

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
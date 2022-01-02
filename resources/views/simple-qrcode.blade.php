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
<div class="frame qr">
	<div class="titre">
		<label class="fontSize">Impression du QR Code</label>
	</div>
	<div class="container">
		<div id="etiquette" class="etiquette">
			<div class="row h-100">
				<div class="col-8 my-auto">
				<label class="fontSizeMin">Flashez-moi pour rapporter un problème</label>
				<label class="fontSizeMin qrcode mt-1">Ou visiter : {{$url}}</label>
			</div>
				<div class="col-4 my-auto">
				<div class="qrcode">
					{{ $qrcode }}
				</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="form-group col-md-6 my-3">
			<label class="form-label">Nombre de position vide</label>
			<select id="nbrEmpty" class="form-control" aria-label="Default select example">
				@foreach (range(14, 1) as $item)
					<option value="{{ $item }}">{{ $item }}</option>
				@endforeach
			</select>
		</div>
		<button type="button" class="btn btn-primary col-md-5 p-2 mx-4 my-3" value='Print' onclick="printEtiq('etiquette')">Imprimer</button>
	</div>
</div>
<script>

	function printEtiq(tagid){
		var hashid = "#"+ tagid;
		var tagname =  $(hashid).prop("tagName").toLowerCase() ;
		var attributes = ""; 
		var attrs = document.getElementById(tagid).attributes;
			$.each(attrs,function(i,elem){
			attributes +=  " "+  elem.name+" ='"+elem.value+"' " ;
			})
		var divToPrint= $(hashid).html() ;
		var position = 15 - $('#nbrEmpty').val();
		var classGen = " class='etiquette position" + position + "'";
		var head = "<html><head>"+ $("head").html() + "</head>" ;
		var ticket = "<" + tagname + classGen + ">" +  divToPrint + "</" + tagname + ">";
		var allcontent = "<html><head> <link href='{{ asset('/css/Form.css') }}' rel='stylesheet'>" + "</head>" + "<body  onload='window.print()' >" + ticket + "</body></html>"  ;
		var newWin=window.open('','Print-Window');
		newWin.document.open();
		newWin.document.write(allcontent);
		newWin.document.close();
	}
</script>
@endsection
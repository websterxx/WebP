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
		<label class="fontSize">Authentification </label>
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
	<div class="col text-center">
		<button type="button" class="btn btn-primary p-2 m-4" value='Print' onclick="printEtiq('etiquette')">Imprimer</button>
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
		var head = "<html><head>"+ $("head").html() + "<style>@page { size: auto;  margin: 0mm; }</style>" + "</head>" ;
		var allcontent = head + "<body  onload='window.print()' >"+ "<" + tagname + attributes + ">" +  divToPrint + "</" + tagname + ">" +  "</body></html>"  ;
		var newWin=window.open('','Print-Window');
		newWin.document.open();
		newWin.document.write(allcontent);
		newWin.document.close();
		//setTimeout(function(){newWin.close();},10000);
	}
</script>
@endsection
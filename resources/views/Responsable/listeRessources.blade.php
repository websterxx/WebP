@extends('master')

@section('title')
Liste des ressources
@endsection

@section('content')
<div class="top_navbar">
  <div class="top_menu">
      <div class="logo">Espace responsable</div>
      
          <a href="{{ route('createRessource')}}" class="nav-link">Créer une ressource</a>
          <a href="{{ route('ressources')}}" class="nav-link">List des ressources</a>
          <a href="{{ route('missions')}}" class="nav-link">List des missions</a>
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
<div class="frame lg" >
    <table 
        id="tableEtu" 
        data-toggle="table"
        data-sort-name="nom"
        data-sort-order="asc"
        data-local="fr-FR"
        data-search="true" 
        data-show-refresh="true"
        data-show-toggle="true"
        data-show-pagination-switch="true"
        data-pagination="true"
        data-page-list="[10, 20, 50, 100, all]"
        >
        <thead>
          <tr>
            <th>Nom</th>
            <th>Localisation</th>
            <th>Information</th>
            <th>Imprimer</th>
            <th>Supprimer</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($ressources as $ressource)
          <tr>
            <td>{{ $ressource->name }}</td>
            <td>{{ $ressource->localisation }}</td>
            <td>
              <button type="button" class="btn btn-info" onclick="getInfo({{$ressource}})" data-toggle="modal" data-target="#modalInfo">URL</button>
            </td>
            <td>
              <button class="btn btn-secondary" onclick="document.getElementById('qrcode-form-{{$ressource->id}}').submit();"> QR Code</button>
                <form id="qrcode-form-{{$ressource->id}}" action="{{route('qrcode.generate', $ressource->id)}}"
                    method="GET">
                    @csrf 
                    
                </form>
            </td>
            <td>
              <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-form-{{$ressource->id}}').submit();">Supprimer</button>
              <form id="delete-form-{{$ressource->id}}" 
                + action="{{route('ressources.destroy', $ressource->id)}}"
                method="post">
                @csrf 
                @method('DELETE')
              </form>
            </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

<!-- Modal -->
<div id="modalInfo" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Info ressource</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        L'URL de cette ressource est :
        <a id='url' class="m-0" href="" class="nav-link"></a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<script>
  function getQrCode(ressource){
    console.log('DONE');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/public/simple-qrcode",
      data: {
        'id' : ressource.id
      },
      dataType: "json",
      success: function (response) {
          console.log('DONE2');
          console.log(response);
          $('#qrCode').html(response);
          $('#qrCode').append('response');  
      }
    });
  }

  function getInfo(response){
    $('#url').html(response.url);
    $('#url').attr('href', response.url)
  }

</script>
@endsection
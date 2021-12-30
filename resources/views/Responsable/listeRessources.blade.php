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
              <button type="button" class="btn btn-info" onclick="getInfo({{$ressource->id}})" data-toggle="modal" data-target="#modalInfo">URL</button>
            </td>
            <td>
              <button type="button" class="btn btn-secondary" onclick="print()">Imprimer</button>
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
        <div id="url" class="">
        </div>
            <div id="qrCode" class="">
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<script>
  function getInfo(id){
    console.log('DONE');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/simple-qrcode",
      data: {
        'id' : id
      },
      dataType: "json",
      success: function (response) {
          console.log('DONE2');
          console.log(response);
          //var $con= 'response' + $response;
          $('#qrCode').html(response);
          $('#qrCode').append('response');
          $('#url').html('http://127.0.0.1:8000/createticket/' + id);

          //showInfo(response);
      }
    });
  }

  function showInfo(response){
    $('#qrCode').append(response);
  }

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/locale/bootstrap-table-fr-FR.min.js"></script>
@endsection
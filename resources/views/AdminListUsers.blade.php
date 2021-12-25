@extends('master')

@section('script')
@endsection

@section('title' , 'Accueil')

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
<div class="container card" id="myTableEtudiant"   data-sort-class="table-active">
    <table 
      id="tableEtu" 
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
      
    </table>
  </div>

  <script>
      $('#tableEtu').bootstrapTable('destroy')
          //$("#myTableEtudiant").append("<div><table data-toggle=\"table\" data-pagination=\"true\" data-search=\"true\"><thead class='thead-light'><tr><th>N°</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Date de naissance</th><th>Telephone</th><th>Absence</th></tr></thead><tbody id=\"myTable\"></tbody></table></div>")
          //$('#myTableEtudiant').append('<table data-toggle="table" data-pagination="true" data-search="true"><thead><tr><th>Item ID</th><th>Item Name</th><th>Item Price</th></tr></thead><tbody></tbody></table>')
          $('#tableEtu').bootstrapTable({
            //url: '/professeur/listeEtudiant',
            columns: [{
              field: 'nom',
              title: 'Nom',
              sortable: true,
              align: 'center'
            }, {
              field: 'prenom',
              title: 'Prenom',
              align: 'center',
              sortable: true
            },
            {
              field: 'email',
              title: 'Email',
              align: 'center'
            },
            {
              field: 'dateNaissance',
              title: 'Date de naissance',
              align: 'center'
            },
            {
              field: 'telephone',
              title: 'Telephone',
              align: 'center'
            },
            {
              field: 'Absence',
              title: 'Absence',
              formatter: operateFormatter,
              align: 'center'
            }],
            data: finalArray

          });
          $('#tableEtu').append(`<caption> Nombres total des étudiants : ${finalArray.length}</caption>`)
          console.log(response)
  </script>
@endsection
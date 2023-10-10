@extends('layouts.app')


<title>@yield('title')Gestion Clients</title>





@section('contenu')



<div class="card">
     
     
                                    <div class="card-header"><h3> Gestion Client</h3>
     <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                                <li><i class="ik ik-minus minimize-card"></i></li>
                                                <li><i class="ik ik-x close-card"></i></li>
                                            </ul>
                                        </div>
     
     
     </div>
                                    <div class="card-body">
                                        <ul class="nav nav-pills nav-fill">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-search"></i> Liste</a>
                                            </li>
                                           
                                           
                                            <li class="nav-item">
                                              <a class="nav-link" id="liste-tab" data-toggle="tab" href="#nouveau" role="tab" aria-controls="nouveau" aria-selected="false"><i class="fas fa-folder-plus"></i> Nouveau</a>
  </li>
                                           
                                        </ul>
                                    </div>
                                </div>

<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      
      <div class="row">
      
       <div class="card">
                                    <div class="card-header d-block">
                                        <h3>Listes Clients</h3>
                                    </div>
                                    <div class="card-body table-responsive">
                                            <table id="simpletable" class="table table-bordered nowrap">
                                                <thead class="text-center">
                                                <tr>
                                                    <th class="nosort"><i class="ik ik-settings"></i></th>
                                                    <th>Identifiant</th>
                                                    <th>Date_Création</th>
                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>Ville</th>
                                                    <th>Type</th>
                                                    
                                                    <th>Tel</th>
                                                    <th>Capitale</th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach($client as $row)
                                                <tr>
                                                    <td><button data-role="update" class="btn-icon btn-outline-success" data-toggle="modal" data-target="#edition" data-id="{{$row->ID_CLIENT}}" data-identifiant="{{$row->IDENTIFIANT}}" data-creation="{{$row->DATE_CLT}}" data-nom="{{$row->NOM}}" data-prenom="{{$row->PRENOM}}" data-ville="{{$row->ID_VILLE}}" data-type="{{$row->ID_TYPET}}" data-adresse="{{$row->ADRESSE}}" data-tel="{{$row->TEL}}" data-capitale="{{$row->CAPITALE}}" data-interlocuteur="{{$row->INTERLOCUTEUR}}" data-mobilein="{{$row->MOBILE_IN}}" data-emailin="{{$row->EMAIL_IN}}"><i class="ik ik-edit"></i></button></td>
                                                    <td>{{$row->IDENTIFIANT}}</td>
                                                    <td>{{$row->DATE_CLT}}</td>
                                                    <td>{{$row->NOM}}</td>
                                                    <td>{{$row->PRENOM}}</td>
                                                    <td>{{$row->NOM_VILLE}}</td>
                                                    <td>{{$row->LIBELLE_TYPET}}</td>
                                                   
                                                    <td>{{$row->TEL}}</td>
                                                    <td>{{$row->CAPITALE}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
      
</div>

  <div class="tab-pane fade" id="nouveau" role="tabpanel" aria-labelledby="nouveau-tab">
      
      @include('client/nouveau')
        
        
         </div></div>






<!-- modal -->


 
 @include('client/modifier')                  







<!-- fin modal -->




@endsection












@section('script')


<script>

$(document).ready(function(){
 
      $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    
    $('.chosen-select').select2({width:"100%"});
    $('.chosen-select1').select2({width:"100%",dropdownParent: $('#edition')});
    
    
    @if (Session::has('message'))
    
    'use strict';
    $.toast({
      heading: 'Success',
      text: "Enregistrement Effectué !",
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#f96868',
      position: 'top-center'
    });
    
@endif
      



});
    
    
    //modification
    
    $(document).on('click','button[data-role=update]',function(){
        
        var id          =$(this).data('id');
        var identifiant =$(this).data('identifiant');
        var nom         =$(this).data('nom');
        var prenom      =$(this).data('prenom');
        var ville       =$(this).data('ville');
        var capitale    =$(this).data('capitale');
        var type        =$(this).data('type');
        var adresse     =$(this).data('adresse');
        var tel         =$(this).data('tel');
   //     var interlocuteur =$(this).data('interlocuteur');
        
        
        $('#id').val(id);
        $('#ville').val(ville);
        $('#nom').val(nom);
        $('#prenom').val(prenom);
        $('#identifiant_cl').html(identifiant);
        $('#type').val(type);
        $('#adresse').val(adresse);
        $('#tel').val(tel);
        $('#capitale').val(capitale);
        
        $('#type').val(type);
      //  $('#interlocuteur').val(interlocuteur);
        
        
        
        
        
    });
    
    
    //sauvegarder
    
     $(document).on('click','button[data-role=sauvegarder]',function(){
         
         
         
       
        var id                  =$('#id').val(); 
        var ville               = $('#ville').val();
        var nom                 = $('#nom').val();
        var prenom              = $('#prenom').val();
        var identifiant         = $('#identifiant_cl').html();
        var adresse             = $('#adresse').val();
        var tel                 = $('#tel').val();
        var capitale            = $('#capitale').val();
        
        var type                = $('#type').val();
     
         
         
         var fruits = new Array();
         
         fruits   = [identifiant,nom,prenom,tel,adresse,ville,capitale,type,id]
         
         
         
         $.ajax({
             
             
             url    : "{{url('client/modifier')}}",
             method : "POST",
             data   : {fruits : fruits},
             success:function(data){
                 
                  'use strict';
    $.toast({
      heading: 'Success',
      text: "Mise à jour Effectué !",
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#f96868',
      position: 'top-center'
    });
                 
                 setTimeout(function(){
                     
                  window.location.reload();   
                 },100);
                 
                 
                 
             }
             
             
             
             
             
         });
         
         
         
         
         
         
         
         
         
         
         
         
         
         
        
         
         
         
         
         
         
     });
    
    



</script>






@endsection
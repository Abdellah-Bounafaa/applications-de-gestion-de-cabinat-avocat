@extends('layouts.app')


<title>@yield('title')Gestion Utilisateurs</title>





@section('contenu')



<div class="card">
     
     
                                    <div class="card-header"><h3> Gestion Utilisateurs</h3>
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
                                        <h3>Listes Utilisateurs</h3>
                                    </div>
                                    <div class="card-body table-responsive">
                                            <table id="simpletable" class="table table-bordered nowrap">
                                                <thead class="text-center">
                                                <tr>
                                                    <th class="nosort"><i class="ik ik-settings"></i></th>
                                                    <th>Date_Création</th>
                                                    <th>CIN</th>
                                                    <th>NIVEAU</th>
                                                    <th>PRENOM</th>
                                                    <th>NOM</th>
                                                    <th>ADRESE</th>
                                                    <th>TEL</th>
                                                    <th>EMAIL</th>
                                                    <th>POSTE</th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach($user as $row)
                                                <tr>
                                                    <td>@if(Session::get('cin')==$row->CIN)<button data-role="update" class="btn-icon btn-outline-success" data-toggle="modal" data-target="#edition" data-cin="{{$row->CIN}}" data-niveau="{{$row->ID_NIVEAU}}" data-prenom="{{$row->PRENOM}}" data-nom="{{$row->NOM}}" data-email="{{$row->EMAIL}}" data-poste="{{$row->POSTE}}" data-adresse="{{$row->ADRESSE}}" data-tel="{{$row->TEL}}" data-login="{{$row->LOGIN}}"><i class="ik ik-edit"></i></button>@endif</td>
                                                    <td>{{$row->CREATED}}</td>
                                                    <td>{{$row->CIN}}</td>
                                                    <td>{{$row->NOM_NIVEAU}}</td>
                                                    <td>{{$row->PRENOM}}</td>
                                                    <td>{{$row->NOM}}</td>
                                                     <td>{{$row->ADRESSE}}</td>
                                                    <td>{{$row->TEL}}</td>
                                                     <td>{{$row->EMAIL}}</td>
                                                    <td>{{$row->POSTE}}</td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
      
</div>

  <div class="tab-pane fade" id="nouveau" role="tabpanel" aria-labelledby="nouveau-tab">
      
  
        
        
         </div></div>






<!-- modal -->


 @include('user/modifier')
                 







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
        
        var cin         =$(this).data('cin');
        var niveau      =$(this).data('niveau');
        var nom         =$(this).data('nom');
        var prenom      =$(this).data('prenom');
        var adresse     =$(this).data('adresse');
        var email       =$(this).data('email');
        var poste       =$(this).data('poste');
        var login       =$(this).data('login');
        var tel         =$(this).data('tel');
        var mdp         ="{{Session::get('ps')}}";
        
        
        $('#CIN_MOD').html(cin);
        $('#NIVEAU_MOD').val(niveau).change();
        $('#NOM_MOD').val(nom);
        $('#PRENOM_MOD').val(prenom);
        $('#ADRESSE_MOD').val(adresse);
        $('#EMAIL_MOD').val(email);
        $('#POSTE_MOD').val(poste);
        $('#TEL_MOD').val(tel);
        $('#LOGIN_MOD').val(login);
        $('#MDP_MOD').val(mdp);
        
      
        
        
        
        
        
    });
    
    
    //sauvegarder
    
     $(document).on('click','button[data-role=sauvegarder]',function(){
         
         
         
       
        var cin                  =$('#CIN_MOD').html(); 
        var niveau               = $('#NIVEAU_MOD').val();
        var nom                 = $('#NOM_MOD').val();
        var prenom              = $('#PRENOM_MOD').val();
        var email               = $('#EMAIL_MOD').val();
        var adresse             = $('#ADRESSE_MOD').val();
        var tel                 = $('#TEL_MOD').val();
        var login               = $('#LOGIN_MOD').val();
        var password            = $('#MDP_MOD').val();
         var poste              =$('#POSTE_MOD').val();
     
         
         
         var fruits = new Array();
         
         fruits   = [cin,niveau,nom,prenom,email,adresse,tel,login,password,poste];
         
         
         
         $.ajax({
             
             
             url    : "{{url('users/modifier')}}",
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
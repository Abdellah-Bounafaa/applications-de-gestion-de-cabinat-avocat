@extends('layouts.app')


<title>@yield('title')Gestion Huissier</title>





@section('contenu')
    <div class="card">
        <div class="card-header">
            <h3> Gestion Huissier</h3>
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
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true"><i class="fas fa-search"></i> Liste</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="liste-tab" data-toggle="tab" href="#nouveau" role="tab"
                        aria-controls="nouveau" aria-selected="false"><i class="fas fa-folder-plus"></i> Nouveau</a>
                </li>

            </ul>
        </div>
    </div>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="row">

                <div class="card">
                    <div class="card-header d-block">
                        <h3>Listes Huissier</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="simpletable" class="table table-bordered nowrap">
                            <thead class="text-center">
                                <tr>
                                    <th class="nosort"><i class="ik ik-settings"></i></th>
                                    <th>Id Huissier</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Numéro De Téléphone</th>
                                    <th>Email</th>
                                    <th>Ville</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($huissier as $row)
                                    <tr>
                                        <td><button data-role="update" class="btn-icon btn-outline-success"
                                                data-toggle="modal" data-target="#edition"
                                                data-id_huissier="{{ $row->ID_HUISSIER }}" data-prenom="{{ $row->PRENOM }}"
                                                data-nom="{{ $row->NOM }}" data-email="{{ $row->EMAIL }}"
                                                data-adresse="{{ $row->ADRESS }}" data-telephone="{{ $row->TELEPHONE }}"
                                                data-id_ville="{{ $row->ID_VILLE }}"><i class="ik ik-edit"></i></button>
                                        </td>
                                        <td>{{ $row->ID_HUISSIER }}</td>
                                        <td>{{ $row->PRENOM }}</td>
                                        <td>{{ $row->NOM }}</td>
                                        <td>{{ $row->ADRESS }}</td>
                                        <td>{{ $row->TELEPHONE }}</td>
                                        <td>{{ $row->EMAIL }}</td>
                                        <td> {{ isset($row->ville->NOM_VILLE) ? $row->ville->NOM_VILLE : '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nouveau" role="tabpanel" aria-labelledby="nouveau-tab">

            @include('huissier/nouveau')


        </div>
    </div>






    <!-- modal -->










    <!-- fin modal -->
@endsection







@include('huissier.modifier')




@section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $('.chosen-select').select2({
                width: "100%"
            });
            $('.chosen-select1').select2({
                width: "100%",
                dropdownParent: $('#edition')
            });


            @if (Session::has('nouveau'))

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


        //inserer

        // $(document).on('keyup change', 'form[class=form_add]', function() {



        //     filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        //     var email = $('input[name=email_user]').val();
        //     var login = $('input[name=login_user]').val();
        //     var mdp = $('input[name=mdp_user]').val();
        //     var cin = $('input[name=cin_user]').val();
        //     var adresse = $('input[name=adresse_user]').val();

        //     var nom = $('input[name=nom_user]').val();
        //     var prenom = $('input[name=prenom_user]').val();

        //     var tel = $('input[name=tel_user]').val();
        //     var poste = $('input[name=poste_user]').val();


        //     if (filter.test(email)) {


        //         $('input[name=email_user]')[0].style.borderColor = "green";

        //     } else {
        //         $('input[name=email_user]')[0].style.borderColor = "red";

        //     }



        //     if (login != '') {


        //         $('input[name=login_user]')[0].style.borderColor = "green";

        //     } else {
        //         $('input[name=login_user]')[0].style.borderColor = "red";

        //     }



        //     if (mdp != '') {


        //         $('input[name=mdp_user]')[0].style.borderColor = "green";

        //     } else {
        //         $('input[name=mdp_user]')[0].style.borderColor = "red";

        //     }



        //     if (adresse != '') {


        //         $('input[name=adresse_user]')[0].style.borderColor = "green";

        //     } else {
        //         $('input[name=adresse_user]')[0].style.borderColor = "red";

        //     }



        //     if (poste != '') {


        //         $('input[name=poste_user]')[0].style.borderColor = "green";

        //     } else {
        //         $('input[name=poste_user]')[0].style.borderColor = "red";

        //     }


        //     if (prenom != '') {


        //         $('input[name=prenom_user]')[0].style.borderColor = "green";

        //     } else {
        //         $('input[name=prenom_user]')[0].style.borderColor = "red";

        //     }


        //     if (nom != '') {


        //         $('input[name=nom_user]')[0].style.borderColor = "green";

        //     } else {
        //         $('input[name=nom_user]')[0].style.borderColor = "red";

        //     }


        //     if (cin != '') {


        //         $('input[name=cin_user]')[0].style.borderColor = "green";

        //     } else {
        //         $('input[name=cin_user]')[0].style.borderColor = "red";

        //     }


        //     if (tel != '') {


        //         $('input[name=tel_user]')[0].style.borderColor = "green";

        //     } else {
        //         $('input[name=tel_user]')[0].style.borderColor = "red";

        //     }



        //     if (filter.test(email) && tel != '' && login != '' && prenom != '' && nom != '' && adresse != '' &&
        //         poste != '' && mdp != '' && cin != '') {



        //         $('button[data-role=inserer]')[0].disabled = false;

        //     } else {
        //         $('button[data-role=inserer]')[0].disabled = true;
        //     }


        // });


        //modification

        $(document).on('click', 'button[data-role=update]', function() {

            var id_huissier = $(this).data('id_huissier');
            var nom = $(this).data('nom');
            var prenom = $(this).data('prenom');
            var adress = $(this).data('adresse');
            var tel = $(this).data('telephone');
            var email = $(this).data('email');
            var id_ville = $(this).data('id_ville');



            $('#ID_HUISSIER_MOD').html(id_huissier);
            $('#NOM_MOD').val(nom).change();
            $('#PRENOM_MOD').val(prenom);
            $('#ADRESS_MOD').val(adress);
            $('#TEL_MOD').val(tel);
            $('#EMAIL_MOD').val(email);
            $('#VILLE_MOD').val(id_ville);

        });


        //sauvegarder

        $(document).on('click', 'button[data-role=sauvegarder]', function() {




            var id_huissier = $('#ID_HUISSIER_MOD').html();
            var nom = $('#NOM_MOD').val();
            var prenom = $('#PRENOM_MOD').val();
            var adresse = $('#ADRESS_MOD').val();
            var tel = $('#TEL_MOD').val();
            var email = $('#EMAIL_MOD').val();
            var ville = $('#VILLE_MOD').val();

            var fruits = new Array();
            fruits = [id_huissier, nom, prenom, adresse, tel, email, ville];
            $.ajax({
                url: "{{ url('huissier/modifier') }}",
                method: "POST",
                data: {
                    fruits: fruits
                },
                success: function(data) {

                    'use strict';
                    $.toast({
                        heading: 'Success',
                        text: "Mise à jour Effectué !",
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-center'
                    });

                    setTimeout(function() {

                        window.location.reload();
                    }, 100);



                }





            });





















        });
    </script>
@endsection

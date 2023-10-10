@extends('layouts.app')


<title>
    @yield('title')Gestion Curateurs </title>





@section('contenu')
    <div class="card">


        <div class="card-header">
            <h3> Gestion Curateurs</h3>
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
                        <h3>Listes Curateurs</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="simpletable" class="table table-bordered nowrap">
                            <thead class="text-center">
                                <tr>
                                    <th class="nosort"><i class="ik ik-settings"></i></th>
                                    <th>ID_CURRATEUR</th>
                                    <th>ID_TRIBUNAL</th>
                                    <th>CIN</th>
                                    <th>ID_DOSSIER</th>
                                    <th>ID_PROCEDURE</th>
                                    <th>REF_TRIBUNALE</th>
                                    <th>DATE_ORDONANCE</th>
                                    <th>DATE_DEM_NOTIFICATION</th>
                                    <th>NOM_CURRATEUR</th>
                                    <th>DATE_NOT_CURRATEUR</th>
                                    <th>DATE_INSERTION_JOURNALE</th>
                                    <th>NOM_JOURNALE</th>
                                    <th>DATE_RETOUR</th>
                                    <th>OBS_CUR</th>
                                    <th>ETAT_CURATEUR</th>
                                    <th>URL_CURRATEUR</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($currateurs as $row)
                                    <tr>
                                        <td><button data-role="update" class="btn-icon btn-outline-success"
                                                data-toggle="modal" data-target="#edition"
                                                data-ID_CURRATEUR="{{ $row->ID_CURRATEUR }}"
                                                data-ID_TRIBUNAL="{{ $row->ID_TRIBUNAL }}" data-CIN="{{ $row->CIN }}"
                                                data-ID_DOSSIER="{{ $row->ID_DOSSIER }}"
                                                data-ID_PROCEDURE="{{ $row->ID_PROCEDURE }}"
                                                data-REF_TRIBUNALE="{{ $row->REF_TRIBUNALE }}"
                                                data-DATE_ORDONANCE="{{ $row->DATE_ORDONANCE }}"
                                                data-DATE_DEM_NOTIFICATION="{{ $row->DATE_DEM_NOTIFICATION }}"
                                                data-NOM_CURRATEUR="{{ $row->NOM_CURRATEUR }}"
                                                data-DATE_NOT_CURRATEUR="{{ $row->DATE_NOT_CURRATEUR }}"
                                                data-DATE_INSERTION_JOURNALE="{{ $row->DATE_NOT_CURRATEUR }}"
                                                data-NOM_JOURNALE="{{ $row->NOM_JOURNALE }}"
                                                data-DATE_RETOUR="{{ $row->DATE_RETOUR }}"
                                                data-OBS_CUR="{{ $row->OBS_CUR }}"
                                                data-ETAT_CURATEUR="{{ $row->ETAT_CURATEUR }}"
                                                data-URL_CURRATEUR="{{ $row->URL_CURRATEUR }}">
                                                <i class="ik ik-edit"></i></button>
                                        </td>
                                        <td>{{ $row->ID_CURRATEUR }}</td>
                                        <td>{{ $row->ID_TRIBUNAL }}</td>
                                        <td>{{ $row->CIN }}</td>
                                        <td>{{ $row->ID_DOSSIER }}</td>
                                        <td>{{ $row->ID_PROCEDURE }}</td>
                                        <td>{{ $row->REF_TRIBUNALE }}</td>
                                        <td>{{ $row->DATE_ORDONANCE }}</td>
                                        <td>{{ $row->DATE_DEM_NOTIFICATION }}</td>
                                        <td>{{ $row->NOM_CURRATEUR }}</td>
                                        <td>{{ $row->DATE_NOT_CURRATEUR }}</td>
                                        <td>{{ $row->DATE_INSERTION_JOURNALE }}</td>
                                        <td>{{ $row->NOM_JOURNALE }}</td>
                                        <td>{{ $row->DATE_RETOUR }}</td>
                                        <td>{{ $row->OBS_CUR }}</td>
                                        <td>{{ $row->ETAT_CURATEUR }}</td>
                                        <td>{{ $row->URL_CURRATEUR }}</td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="nouveau" role="tabpanel" aria-labelledby="nouveau-tab">

            @include('currateur/nouveau')


        </div>
    </div>






    <!-- modal -->










    <!-- fin modal -->
@endsection







@include('currateur.modifier')




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

        //     var id_tribunal = $('input[name=ID_TRIBUNAL]').val();
        //     var ville = $('input[name=ID_VILLE]').val();
        //     var type_tribunal = $('input[name=ID_TTRIBUNAL]').val();
        //     var nom = $('input[name=NOM_TRIBUNAL]').val();
        //     var libelle = $('input[name=LIBELLE]').val();
        //     var num = $('input[name=NUM_TRIBUNAL]').val();

        //     if (id_tribunal != '') {
        //         $('input[name=ID_TRIBUNAL]')[0].style.borderColor = "green";
        //     } else {
        //         $('input[name=ID_TRIBUNAL]')[0].style.borderColor = "red";
        //     }

        //     if (nom != '') {
        //         $('input[name=NOM_TRIBUNAL]')[0].style.borderColor = "green";
        //     } else {
        //         $('input[name=NOM_TRIBUNAL]')[0].style.borderColor = "red";
        //     }

        //     if (libelle != '') {
        //         $('input[name=LIBELLE]')[0].style.borderColor = "green";
        //     } else {
        //         $('input[name=LIBELLE]')[0].style.borderColor = "red";
        //     }


        //     if (num != '') {
        //         $('input[name=NUM_TRIBUNAL]')[0].style.borderColor = "green";
        //     } else {
        //         $('input[name=NUM_TRIBUNAL]')[0].style.borderColor = "red";
        //     }

        //     if (id_tribunal != '' && ville != '' && type_tribunal != '' && nom != '' && libelle != '' &&
        //         num != '') {
        //         $('button[data-role=inserer]')[0].disabled = false;
        //     } else {
        //         $('button[data-role=inserer]')[0].disabled = true;
        //     }
        // });


        //modification

        $(document).on('click', 'button[data-role=update]', function() {
            var id_tribunal = $(this).data('id_tribunal');
            var ville = $(this).data('ville');
            var type_tribunal = $(this).data('ttribunal');
            var nom = $(this).data('nom');
            var libelle = $(this).data('libelle');
            var num = $(this).data('num_tribunal');

            $('#ID_TRIBUNAL_MOD').html(id_tribunal);
            $('#NOM_TRIBUNAL_MOD').val(nom);
            $('#ID_VILLE_MOD').val(ville).change();
            $('#ID_TTRIBUNAL_MOD').val(type_tribunal);
            $('#LIBELLE_MOD').val(libelle);
            $('#NUM_TRIBUNAL_MOD').val(num);

        });


        //sauvegarder

        $(document).on('click', 'button[data-role=sauvegarder]', function() {
            var id_tribunal = $('#ID_TRIBUNAL_MOD').html();
            var ville = $('#ID_VILLE_MOD').val();
            var type_tribunal = $('#ID_TTRIBUNAL_MOD').val();
            var nom = $('#NOM_TRIBUNAL_MOD').val();
            var libelle = $('#LIBELLE_MOD').val();
            var num = $('#NUM_TRIBUNAL_MOD').val();

            var donnees = new Array();
            donnees = [id_tribunal, ville, type_tribunal, nom, libelle, num];
            $.ajax({
                url: "{{ url('/tribunal/modifier') }}",
                method: "POST",
                data: {
                    donnees: donnees
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

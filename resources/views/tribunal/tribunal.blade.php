@extends('layouts.app')


<title>
    @yield('title')Gestion Tribunaux</title>





@section('contenu')
    <div class="card">


        <div class="card-header">
            <h3> Gestion Tribunaux</h3>
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
                        <h3>Listes Tribunaux</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="simpletable" class="table table-bordered nowrap">
                            <thead class="text-center">
                                <tr>
                                    <th class="nosort"><i class="ik ik-settings"></i></th>
                                    <th>Id Tribunal</th>
                                    <th>Ville</th>
                                    <th>Nom De Tribunal</th>
                                    <th>Type De Tribunal</th>
                                    <th>Numéro De Tribunal</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($Tribunaux as $row)
                                    <tr>
                                        <td><button data-role="update" class="btn-icon btn-outline-success"
                                                data-toggle="modal" data-target="#edition"
                                                data-id_tribunal="{{ $row->ID_TRIBUNAL }}"
                                                data-ville="{{ $row->Ville->ID_VILLE }}" data-nom="{{ $row->NOM_TRIBUNAL }}"
                                                data-libelle="{{ $row->LIBELLE }}"
                                                data-num_tribunal="{{ $row->NUM_TRIBUNAL }}"
                                                data-ttribunal="{{ $row->type_tribunal->ID_TRIBUNAL }}"><i
                                                    class="ik ik-edit"></i></button>
                                        </td>
                                        <td>{{ $row->ID_TRIBUNAL }}</td>
                                        <td>
                                            {{ $row->ville->NOM_VILLE }}
                                        </td>
                                        <td>{{ $row->NOM_TRIBUNAL }}</td>
                                        <td>{{ $row->type_tribunal->NOM }}</td>
                                        <td>{{ $row->NUM_TRIBUNAL }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="nouveau" role="tabpanel" aria-labelledby="nouveau-tab">

            @include('tribunal/nouveau')


        </div>
    </div>






    <!-- modal -->










    <!-- fin modal -->
@endsection







@include('tribunal.modifier')




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

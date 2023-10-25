@extends('layouts.app')


<title>
    @yield('title')Gestion Des Experts</title>





@section('contenu')
    <div class="card">


        <div class="card-header">
            <h3> Gestion Experts</h3>
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
                        <h3>Listes Experts</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="simpletable" class="table table-bordered nowrap">
                            <thead class="text-center">
                                <tr>
                                    <th class="nosort"><i class="ik ik-settings"></i></th>
                                    <th>Id Expert</th>
                                    <th>Nom</th>
                                    <th>Ville</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($experts as $row)
                                    <tr>
                                        <td><button data-role="update" class="btn-icon btn-outline-success"
                                                data-toggle="modal" data-target="#edition"
                                                data-id_expert="{{ $row->ID_EXPERT }}" data-nom="{{ $row->NOM }}"
                                                data-ville="{{ $row->ville }}"><i class="ik ik-edit"></i></button>
                                        </td>
                                        <td>{{ $row->ID_EXPERT }}</td>
                                        <td>
                                            {{ $row->NOM }}
                                        </td>
                                        <td>
                                            {{ isset($row->ville->NOM_VILLE) ? $row->ville->NOM_VILLE : '' }}
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

            @include('expert/nouveau')


        </div>
    </div>






    <!-- modal -->










    <!-- fin modal -->
@endsection







@include('expert.modifier')




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
            var id_expert = $(this).data('id_expert');
            var nom = $(this).data('nom');
            var ville = $(this).data('ville');
            $('#ID_EXPERT_MOD').html(id_expert);
            $('#NOM_MOD').val(nom);
            $('#Ville_MOD').val(ville);
        });


        //sauvegarder

        $(document).on('click', 'button[data-role=sauvegarder]', function() {
            var id_expert = $('#ID_EXPERT_MOD').html();
            var nom = $('#NOM_MOD').val();
            var ville = $('#Ville_MOD').val();
            var donnees = new Array();
            donnees = [id_expert, nom, ville];
            $.ajax({
                url: "{{ url('/expert/modifier') }}",
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

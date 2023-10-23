@extends('layouts.app')


<title>@yield('title')Gestion Ville</title>





@section('contenu')
    <div class="card">


        <div class="card-header">
            <h3> Gestion Ville</h3>
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
                        <h3>Listes Ville</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="simpletable" class="table table-bordered nowrap">
                            <thead class="text-center">
                                <tr>
                                    <th class="nosort"><i class="ik ik-settings"></i></th>
                                    <th>Id Ville</th>
                                    <th>Nom Ville</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($villes as $row)
                                    <tr>
                                        <td><button data-role="update" class="btn-icon btn-outline-success"
                                                data-toggle="modal" data-target="#edition"
                                                data-id_ville="{{ $row->ID_VILLE }}"
                                                data-nom_ville="{{ $row->NOM_VILLE }}"><i class="ik ik-edit"></i></button>
                                        </td>
                                        <td>{{ $row->ID_VILLE }}</td>
                                        <td>{{ $row->NOM_VILLE }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nouveau" role="tabpanel" aria-labelledby="nouveau-tab">
            @include('ville/nouveau')
        </div>
    </div>






    <!-- modal -->










    <!-- fin modal -->
@endsection







@include('ville.modifier')




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
        //modification

        $(document).on('click', 'button[data-role=update]', function() {

            var id_ville = $(this).data('id_ville');
            var nom_ville = $(this).data('nom_ville');

            $('#ID_VILLE_MOD').html(id_ville);
            $('#NOM_Ville_MOD').val(nom_ville).change();
        });


        //sauvegarder

        $(document).on('click', 'button[data-role=sauvegarder]', function() {
            var id_ville = $('#ID_VILLE_MOD').html();
            var nom_ville = $('#NOM_Ville_MOD').val();

            var donnees = new Array();
            donnees = [id_ville, nom_ville];
            $.ajax({
                url: "{{ url('/ville/modifier') }}",
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

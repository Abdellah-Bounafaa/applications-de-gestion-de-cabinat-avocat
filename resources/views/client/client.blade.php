@extends('layouts.app')


<title>@yield('title')Gestion Clients</title>





@section('contenu')
    <div class="card">


        <div class="card-header">
            <h3> Gestion Client</h3>
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
                                @foreach ($client as $row)
                                    <tr>
                                        <td><button data-role="update" class="btn-icon btn-outline-success"
                                                data-toggle="modal" data-target="#edition" data-id="{{ $row->ID_CLIENT }}"
                                                data-identifiant="{{ $row->IDENTIFIANT }}"
                                                data-creation="{{ $row->DATE_CLT }}" data-nom="{{ $row->NOM }}"
                                                data-prenom="{{ $row->PRENOM }}" data-ville="{{ $row->ID_VILLE }}"
                                                data-type="{{ $row->ID_TYPET }}" data-adresse="{{ $row->ADRESSE }}"
                                                data-tel="{{ $row->TEL }}" data-email="{{ $row->EMAIL }}"
                                                data-capitale="{{ $row->CAPITALE }}"
                                                data-interlocuteur="{{ $row->INTERLOCUTEUR }}"
                                                data-mobilein="{{ $row->MOBILE_IN }}" data-tel2="{{ $row->TEL2 }}"
                                                data-fax="{{ $row->Fax }}" data-emailin="{{ $row->EMAIL_IN }}"><i
                                                    class="ik ik-edit"></i></button>
                                        </td>
                                        <td>{{ $row->IDENTIFIANT }}</td>
                                        <td>{{ $row->DATE_CLT }}</td>
                                        <td>{{ $row->NOM }}</td>
                                        <td {!! $row->ID_TYPET == 2 ? 'style="background-color: #777;opacity:0.1"' : '' !!}>
                                            {{ $row->PRENOM }}
                                        </td>

                                        <td>{{ $row->NOM_VILLE }}</td>
                                        <td>{{ $row->LIBELLE_TYPET }}</td>

                                        <td>{{ $row->TEL }}</td>
                                        <td>{{ $row->CAPITALE }}</td>
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


        </div>
    </div>






    <!-- modal -->



    @include('client/modifier')







    <!-- fin modal -->
@endsection












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

        $(document).on('click', 'button[data-role=update]', function() {
            var id = $(this).data('id');
            var identifiant = $(this).data('identifiant');
            var nom = $(this).data('nom');
            var prenom = $(this).data('prenom');
            var ville = $(this).data('ville');
            var capitale = $(this).data('capitale');
            var type = $(this).data('type');
            var adresse = $(this).data('adresse');
            var tel = $(this).data('tel');
            var email = $(this).data('email');
            var tel2 = $(this).data('tel2');
            var fax = $(this).data('fax');
            var interlocuteur = $(this).data('interlocuteur');
            var mobilein = $(this).data('mobilein');
            var emailin = $(this).data('emailin');
            $('#id').val(id);
            $('#identifiant').val(identifiant);
            $('select[id=ville]').val(ville).change();
            $('select[id=type]').val(type).change();
            // $('select[id=ville]').val(ville).change();

            $('#nom').val(nom);
            $('#prenom').val(prenom);
            // $('#identifiant_cl').html(identifiant);
            // $('#type').val(type);
            $('#adresse').val(adresse);
            $('#tel').val(tel);
            $('#email').val(email);
            $('#tel2').val(tel2);
            $('#fax').val(fax);
            $('#capitale').val(capitale);
            $('#type').val(type);
            $('#interlocuteur').val(interlocuteur);
            $('#emailin').val(emailin);
            $('#mobilein').val(mobilein);





        });

        function togglePrenomField(type, prenom, nom, label) {
            var typeSelect = document.getElementById(type);
            var prenomField = document.getElementById(prenom);
            var nomField = document.getElementById(nom);
            var nomLabel = document.getElementById(label);
            var currentPlaceholder = nomField.getAttribute("placeholder");

            if (typeSelect.value == "2") {
                nomLabel.innerHTML = "Nom D'entreprise : "
                prenomField.disabled = true;
                prenomField.required = false;
                nomField.setAttribute("placeholder", "Nom D'entreprise");
                prenomField.value = "";
            } else {
                nomLabel.innerHTML = "Nom : "
                nomField.setAttribute("placeholder", "Nom De Client :");
                prenomField.disabled = false;
                prenomField.required = true;
            }
        }
        //sauvegarder

        $(document).on('click', 'button[data-role=sauvegarder]', function() {
            var id = $('#id').val();
            var ville = $('#ville').val();
            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var identifiant = $('#identifiant').val();
            var adresse = $('#adresse').val();
            var capitale = $('#capitale').val();
            var type = $('#type').val();
            var tel = $('#tel').val();
            var email = $('#email').val();
            var tel2 = $('#tel2').val();
            var fax = $('#fax').val();
            var interlocuteur = $('#interlocuteur').val();
            var mobilein = $('#mobilein').val();
            var emailin = $('#emailin').val();

            var fruits = new Array();

            fruits = [
                identifiant,
                nom,
                prenom,
                tel,
                adresse,
                ville,
                capitale,
                type,
                id,
                email,
                tel2,
                fax,
                interlocuteur,
                emailin,
                mobilein,
            ]

            $.ajax({
                url: "{{ url('client/modifier') }}",
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

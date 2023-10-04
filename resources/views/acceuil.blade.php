@extends('layouts.app')


        <title>@yield('title')Bienvenue </title>





@section('contenu')


    <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget bg-primary">
                                    <a href="{{url('client')}}">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Clients</h6>
                                                <h2>{{$clients}} <em style="font-size:20px">Client(s)</em></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                        </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget bg-info">
                                     <a href="{{url('adversaire')}}">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Adversaire</h6>
                                                <h2>{{$adversaire}} <em style="font-size:20px">Adversaire(s)</em></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget bg-yellow">
                                    <a href="{{url('dossier/ajouter')}}">
                                    <div class="widget-body">
                                         
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Nouveau Dossier</h6>
                                                <h2>{{$dossier}} <em style="font-size:20px">Dossier(s)</em></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-folder"></i>
                                            </div>
                                        </div>
                                        
                                    </div>
                                        </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget bg-success">
                                    <a href="{{url('dossier/search')}}">
                                    <div class="widget-body">
                                         
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Maj Dossier</h6>
                                                <h2>{{$maj}} <em style="font-size:20px">Dossier(s) modifié(s)</em></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-folder-plus"></i>
                                            </div>
                                        </div>
                                        
                                    </div>
                                      </a>  
                                </div>
                            </div>
</div>
                        


@endsection
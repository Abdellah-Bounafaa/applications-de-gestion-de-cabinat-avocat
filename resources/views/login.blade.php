@extends('layouts.base')


<title>@yield('title')Bienvenue </title>





@section('contenu')
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('theme/login.jpg')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="#"><img src="gca.png" alt="" height="50px"></a>
                    </div>
                    <h3 class="text-center">Bienvenue Sur La GCA </h3>

                    <form method="post" action="{{ url('/connexion') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="login" name="login" class="form-control" placeholder="Login"
                                required>
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" required>
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="row">
                            <div class="col text-left">
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr">
                                            <i class="cr-icon ik ik-check txt-primary"></i>
                                        </span>
                                        <span>Remember Me</span>
                                    </label>
                                </div>
                            </div>
                            <!--
                                        <div class="col text-right">
                                            <a href="forgot-password.html">Forgot Password ?</a>
                                        </div>
    -->
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Connexion</button>
                        </div>
                    </form>
                    <!--
                                <div class="register">
                                    <p>Don't have an account? <a href="register.html">Create an account</a></p>
                                </div>
    -->
                </div>
            </div>
        </div>
    </div>
@endsection



@section('javascript')
    <script>
        $(document).ready(function() {


            @if (Session::has('message'))

                'use strict';
                $.toast({
                    heading: 'Danger',
                    text: "email et/ou mot de passe incorrect !",
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f96868',
                    position: 'top-right'
                });
            @endif

        });
    </script>
@endsection

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token"content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('gca.png') }}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('theme/plugins/jquery-toast-plugin/dist/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet"
        href="{{ asset('theme/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/weather-icons/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/c3/c3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/dist/css/style01.css') }}">
    <script src="{{ asset('theme/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />


    @yield('css')

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="wrapper">
        <header class="header-top" header-theme="dark">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                            </div>
                        </div>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i
                                class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="ik ik-bell"></i><span class="badge bg-yellow">3</span></button>
                            <div class="dropdown-menu dropdown-menu-right notification-dropdown"
                                aria-labelledby="notiDropdown">
                                <h4 class="header">Notifications</h4>
                                <div class="notifications-wrap">
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-check"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">Invitation accepted</span>
                                            <span class="media-content">Your have been Invited ...</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <img src="{{ asset('theme/img/users/1.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">Steve Smith</span>
                                            <span class="media-content">I slowly updated projects</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-calendar"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">To Do</span>
                                            <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                            </div>
                        </div>
                        <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i
                                class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>
                        <!--
                            <div class="dropdown">
                                <button class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></button>
                                <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="ik ik-mail"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Accounts"><i class="ik ik-users"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Sales"><i class="ik ik-shopping-cart"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Purchase"><i class="ik ik-briefcase"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Pages"><i class="ik ik-clipboard"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Chats"><i class="ik ik-message-square"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Contacts"><i class="ik ik-map-pin"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Blocks"><i class="ik ik-inbox"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Events"><i class="ik ik-calendar"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Notifications"><i class="ik ik-bell"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="More"><i class="ik ik-more-horizontal"></i></a>
                                </div>
                            </div>
                            <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
-->
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="color:white;font-size:15px"><em>

                                    @auth


                                        {{ strtoupper(auth()->user()->NOM) }} {{ strtoupper(auth()->user()->PRENOM) }}
                                    @endauth


                                </em>



                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i>
                                    Profile</a>
                                <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i>
                                    Settings</a>
                                <!--
                                    <a class="dropdown-item" href="#"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="ik ik-mail dropdown-icon"></i> Inbox</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> Message</a>
-->
                                <a class="dropdown-item" href="{{ url('logout') }}"><i
                                        class="ik ik-power dropdown-icon"></i> Se déconnecter</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="{{ route('dashboard') }}">
                        <div class="logo-img">
                            <img src="{{ asset('theme/src/img/brand-white.svg') }}" class="header-brand-img"
                                alt="lavalite">
                        </div>
                        <span class="text" style="font-size:15px">GCA</span>
                    </a>
                    <button type="button" class="nav-toggle"><i data-toggle="expanded"
                            class="ik ik-toggle-right toggle-icon"></i></button>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content" style="background-color:black">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">

                            <div class="nav-lavel text-center" style="background-color: black">
                                <img src="{{ asset('theme/img/user1.jpg') }}" class="btn btn-icon btn-outline">
                                <small class="badge badge-success">{{ strtoupper(Session::get('nom')) }}
                                    {{ strtoupper(Session::get('prenom')) }} </small><br>
                                <small style="color:white"><i class="fa fa-circle text-green"></i> En ligne</small>
                            </div>
                            <div class="nav-lavel">Principale</div>
                            <div class="nav-item active">
                                <a href="{{ url('dashboard') }}"><i
                                        class="ik ik-bar-chart-2 text-warning"></i><span>Dashboard</span></a>
                            </div>
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-settings"></i><span>Paramètres</span></a>
                                <div class="submenu-content">

                                    <a href="{{ url('users') }}" class="menu-item">Utilisateurs</a>
                                    <a href="{{ url('huissier') }}" class="menu-item">Huissier</a>
                                    <a href="{{ url('tribunal') }}" class="menu-item">Tribunal</a>
                                    <a href="{{ url('expret') }}" class="menu-item">Expert</a>
                                    <a href="{{ url('nature') }}" class="menu-item">Nature</a>
                                    <a href="{{ url('region') }}" class="menu-item">Ville</a>



                                </div>
                            </div>
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i
                                        class="ik ik-folder text-yellow"></i><span>Dossier</span></a>
                                <div class="submenu-content">
                                    <a href="{{ url('dossier/ajouter') }}" class="menu-item">Nouveau Dossier</a>
                                    <a href="{{ url('dossier/search') }}" class="menu-item">Maj Dossiers</a>

                                </div>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('client') }}"><i class="ik ik-file text-info"></i><span>Fiche
                                        Client</span></a>
                            </div>

                            <div class="nav-item">
                                <a href="{{ url('adversaire') }}"><i
                                        class="ik ik-calendar text-primary"></i><span>Fiche Adversaire</span></a>
                            </div>

                            <!--
                                <div class="nav-item">
                                    <a href="{{ url('consultation/lmd') }}"><i class="ik ik-menu text-light"></i><span>LMD</span></a>
                                </div>
-->

                            <div class="nav-item">
                                <a href="{{ url('lettre_rappel') }}"><i
                                        class="ik ik-inbox text-green"></i><span>Lettres De Rappel</span></a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('consultations') }}"><i
                                        class="ik ik-message-square text-pink"></i><span>Consultations</span></a>
                            </div>

                        </nav>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="container-fluid">

                    @yield('contenu')


                </div>
            </div>
            <aside class="right-sidebar">
                <div class="sidebar-chat" data-plugin="chat-sidebar">
                    <div class="sidebar-chat-info">
                        <h6>Chat List</h6>
                        <form class="mr-t-10">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search for friends ...">
                                <i class="ik ik-search"></i>
                            </div>
                        </form>
                    </div>
                    <div class="chat-list">
                        <div class="list-group row">
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Gene Newman">
                                <figure class="user--online">
                                    <img src="{{ asset('theme/img/users/1.jpg') }}" class="rounded-circle"
                                        alt="">
                                </figure><span><span class="name">Gene Newman</span> <span
                                        class="username">@gene_newman</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Billy Black">
                                <figure class="user--online">
                                    <img src="{{ asset('theme/img/users/2.jpg') }}" class="rounded-circle"
                                        alt="">
                                </figure><span><span class="name">Billy Black</span> <span
                                        class="username">@billyblack</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Herbert Diaz">
                                <figure class="user--online">
                                    <img src="{{ asset('theme/img/users/3.jpg') }}" class="rounded-circle"
                                        alt="">
                                </figure><span><span class="name">Herbert Diaz</span> <span
                                        class="username">@herbert</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Sylvia Harvey">
                                <figure class="user--busy">
                                    <img src="{{ asset('theme/img/users/4.jpg') }}" class="rounded-circle"
                                        alt="">
                                </figure><span><span class="name">Sylvia Harvey</span> <span
                                        class="username">@sylvia</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item active"
                                data-chat-user="Marsha Hoffman">
                                <figure class="user--busy">
                                    <img src="{{ asset('theme/img/users/5.jpg') }}" class="rounded-circle"
                                        alt="">
                                </figure><span><span class="name">Marsha Hoffman</span> <span
                                        class="username">@m_hoffman</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Mason Grant">
                                <figure class="user--offline">
                                    <img src="{{ asset('theme/img/users/1.jpg') }}" class="rounded-circle"
                                        alt="">
                                </figure><span><span class="name">Mason Grant</span> <span
                                        class="username">@masongrant</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Shelly Sullivan">
                                <figure class="user--offline">
                                    <img src="{{ asset('theme/img/users/2.jpg') }}" class="rounded-circle"
                                        alt="">
                                </figure><span><span class="name">Shelly Sullivan</span> <span
                                        class="username">@shelly</span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="chat-panel" hidden>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>
                        <span class="user-name">John Doe</span>
                        <button type="button" class="close" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="card-body">
                        <div class="widget-chat-activity flex-1">
                            <div class="messages">
                                <div class="message media reply">
                                    <figure class="user--online">
                                        <a href="#">
                                            <img src="{{ asset('theme/img/users/3.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>Epic Cheeseburgers come in all kind of styles.</p>
                                    </div>
                                </div>
                                <div class="message media">
                                    <figure class="user--online">
                                        <a href="#">
                                            <img src="{{ asset('theme/img/users/1.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>Cheeseburgers make your knees weak.</p>
                                    </div>
                                </div>
                                <div class="message media reply">
                                    <figure class="user--offline">
                                        <a href="#">
                                            <img src="{{ asset('theme/img/users/5.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>Cheeseburgers will never let you down.</p>
                                        <p>They'll also never run around or desert you.</p>
                                    </div>
                                </div>
                                <div class="message media">
                                    <figure class="user--online">
                                        <a href="#">
                                            <img src="{{ asset('theme/img/users/1.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>A great cheeseburger is a gastronomical event.</p>
                                    </div>
                                </div>
                                <div class="message media reply">
                                    <figure class="user--busy">
                                        <a href="#">
                                            <img src="{{ asset('theme/img/users/5.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>There's a cheesy incarnation waiting for you no matter what you palete
                                            preferences are.</p>
                                    </div>
                                </div>
                                <div class="message media">
                                    <figure class="user--online">
                                        <a href="#">
                                            <img src="{{ asset('theme/img/users/1.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>If you are a vegan, we are sorry for you loss.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="javascript:void(0)" class="card-footer" method="post">
                        <div class="d-flex justify-content-end">
                            <textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
                            <button class="btn btn-icon" type="submit"><i
                                    class="ik ik-arrow-right text-success"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-center text-sm-left d-md-inline-block">Copyright ©{{ date('Y') }}.</span>

                </div>
            </footer>
        </div>
    </div>






    <script src="{{ asset('theme/src/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/screenfull/dist/screenfull.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/js/datatables.js') }}"></script>
    <script src="{{ asset('theme/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('theme/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <script src="{{ asset('theme/plugins/d3/dist/d3.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/c3/c3.min.js') }}"></script>
    <script src="{{ asset('theme/js/tables.js') }}"></script>
    <script src="{{ asset('theme/js/widgets.js') }}"></script>
    <script src="{{ asset('theme/js/charts.js') }}"></script>
    <script src="{{ asset('theme/dist/js/theme.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

    <script src="{{ asset('printThis.js') }}"></script>

    <script src="{{ asset('theme/js/form-components.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="{{ asset('theme/sweetalert/dist/sweetalert.min.js') }}"></script>



    <script>
        $(document).ready(function() {


            if (innerWidth >= 768) {
                $('.nav-toggle').click();
                $('.nav-toggle').hide();


            }




        });
    </script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->


    @yield('script')

</body>

</html>

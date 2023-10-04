<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login | ThemeKit - Admin Template</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{asset('gca.png') }}" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        
         <link rel="stylesheet" href="{{asset('theme/plugins/jquery-toast-plugin/dist/jquery.toast.min.css') }}">
        <link rel="stylesheet" href="{{asset('theme/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{asset('theme/plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{asset('theme/plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{asset('theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{asset('theme/dist/css/theme.css') }}">
        <script src="{{asset('theme/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
      

    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
           @yield('contenu')
        </div>
        
        <script src="{{asset('theme/src/js/vendor/jquery-3.3.1.min.js') }}"></script>
        <script src="{{asset('theme/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{asset('theme/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{asset('theme/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <script src="{{asset('theme/plugins/screenfull/dist/screenfull.js') }}"></script>
        <script src="{{asset('theme/dist/js/theme.js') }}"></script>
          <script src="{{asset('theme/plugins/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        
        
        
        @yield('javascript')
      
    </body>
</html>

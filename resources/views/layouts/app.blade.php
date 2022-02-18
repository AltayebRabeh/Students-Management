<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ cache('settings') != null ? asset('uploads/'.cache('settings')['logo']) : asset('/uploads/settings/logo.png') }}">
    <title>{{ cache('settings') != null ? cache('settings')['university_name'] : '' }} @yield('title')</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('css/simplebar.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('css/app-dark.css') }}" id="darkTheme" disabled>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    
    @livewireStyles
    </head>
    <body class="vertical  light rtl ">

        <div class="wrapper">
            @include('layouts.navbar')
            @include('layouts.aside')
            <!-- Page Content -->
            <main role="main" class="main-content">
                <div class="container-fluid">
                    @include('layouts.modals.students-list-modal')
                    @include('layouts.modals.supplements-list-modal')
                    @include('layouts.modals.student-result-modal')
                    {{ $slot }}
                </div> <!-- .container-fluid -->
                @include('layouts.modals.notify-shortcut')
            </main>
        </div>

        @stack('modals')

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/simplebar.min.js') }}"></script>
        <script src="{{ asset('js/tinycolor-min.js') }}"></script>
        <script src="{{ asset('js/jquery.stickOnScroll.js') }}"></script>
        <script src="{{ asset('js/config.js') }}"></script>
    
        @include('layouts.extends.ajax-get-classrooms')
        @yield('js')
    
        <script src="{{ asset('js/apps.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <script>
          window.dataLayer = window.dataLayer || [];
    
          function gtag()
          {
            dataLayer.push(arguments);
          }
          gtag('js', new Date());
          gtag('config', 'UA-56159088-1');
        </script>
    
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        @toastr_render
        @livewireScripts
    </body>
</html>
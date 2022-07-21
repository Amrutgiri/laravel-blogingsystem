<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- summernote css ingegaration -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- table and pagination links -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0px; !important;
            margin:0px; !important;
        }
        div.dataTables_wrapper div.dataTables_length select{
            width: 60px; !important;
        }
        .post-code-bg{
            width: fit-content;
            min-width: 100%;
            background-color: black !important;
            width: 100% !important;
            overflow-x: scroll !important;
            position: relative;
            padding: 1rem 1rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }
    </style>

</head>
<body>
        @include('layouts.inc.admin-navbar')
   
    <div id="layoutSidenav">
        @include('layouts.inc.admin-sidebar')

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('layouts.inc.admin-footer')          
        </div>
    </div>   
    
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}" ></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

     <!-- summernote js ingegaration -->
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

     <script>
        $(document).ready(function() {
            $("#mysummernote").summernote();
            $('.dropdown-toggle').dropdown();
        });
    </script>

        <!-- pagination jquery function -->
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>


</body>
</html>

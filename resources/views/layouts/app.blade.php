<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>PORPROV</title>
        <link rel="shortcut icon" href="{{URL::asset('/img/only.svg')}}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font-Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- CSS Tabel Data -->
        <link rel = 'stylesheet' href = 'https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css' >
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
        <div class="wrapper">
            @include('layouts.navigation')

            @include('layouts.sidebar')
            <div class="content-wrapper" style="min-height: 303px;">
                <div class="content">
                    <div class="container-fluid">

                    <!-- Page Content -->
                    <main>
                        <!-- Page Heading -->
                        @if (isset($header))
                            <header class="bg-white shadow">
                                <div class="max-w-7xl mx-auto py-6 px-4">
                                    {{ $header }}
                                </div>
                            </header>
                        @endif

                        {{ $slot }}
                    </main>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
        <script src="{{ asset('js/table.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        
        <!-- Data Table JS -->
        <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
        <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
        <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
        <script>
            // cabor
            const routeIndexCabor = "{{route('cabor')}}";
            const routeCreateCabor = "{{route('caborStore')}}";
            const routeEditCabor = "{{route('caborEdit', ['id'=>':id'])}}"
            const routeDeleteCabor = "{{route('caborDelete',['id'=>':id'])}}";
            // nomor
            const routeIndexNomor = "{{route('nomor')}}";
            const routeCreateNomor = "{{route('nomorStore')}}";
            const routeEditNomor = "{{route('nomorEdit',['id'=>':id'])}}";
            const routeDeleteNomor = "{{route('nomorDelete',['id'=>':id'])}}";
            // kontingen
            const routeIndexKontingen = "{{route('kontingen')}}";
            const routeCreateKontingen = "{{route('kontingenStore')}}";
            const routeEditKontingen = "{{route('kontingenEdit',['id'=>':id'])}}";
            const routeDeleteKontingen = "{{route('kontingenDelete',['id'=>':id'])}}";
        </script>
    </body>
</html>

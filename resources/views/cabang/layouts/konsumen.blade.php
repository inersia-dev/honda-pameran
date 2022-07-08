<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} Dealer | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Honda Balikpapan')">
    @yield('meta')

    @stack('before-styles')
    <link href="{{ '/css/backend.css' }}" rel="stylesheet">

    {{-- <livewire:styles /> --}}
    @stack('after-styles')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js" integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .c-sidebar {
            background-color: #29363d;
        }

        .c-sidebar .c-sidebar-nav-link.c-active .c-sidebar-nav-icon {
            color: #ED1B25;
        }
        .select2 {
        width:100%!important;
        }
        .select2-container .select2-selection--single {
            height: 35px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 33px;
        }
        .zoom {
            position: relative;
        }
        .zoom:hover {
            -ms-transform: scale(5); /* IE 9 */
            -webkit-transform: scale(5); /* Safari 3-8 */
            transform: scale(5);
            z-index: 999;
        }
        .dataTables_length {
            margin-top: 6px;
        }
    </style>
    <style>
        #mapid { height: 700px; }
    </style>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
</head>
<body class="c-app">
    @include('cabang.includes.sidebar')

    <div class="c-wrapper c-fixed-components">
        @include('cabang.includes.header')

        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        @include('includes.partials.messages')
                        @yield('content')
                    </div><!--fade-in-->
                </div><!--container-fluid-->
            </main>
        </div><!--c-body-->

        @include('cabang.includes.footer')
    </div><!--c-wrapper-->

    @stack('before-scripts')

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script> --}}

    {{-- <script src="{{ '/js/app.js' }}"></script> --}}
    {{-- <script src="{{ '/js/manifest.js' }}"></script> --}}
    {{-- <script src="https://coreui.io/demo/4.2/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <script src="{{ '/js/vendor.js' }}"></script>
    <script src="{{ '/js/backend.js' }}"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.2.1/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-dr7oDXkaZAtdEhJFaJAnSBk7dpZdkAaqky9tVF8pFrLfBo2D+ABIq8ZiCfHaJs9f" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.2.1/dist/js/coreui.min.js" integrity="sha384-FI3ZcGr5XHHHMfE5DC/gMVe03mmQB8MxeP3No4FUxOrL3a9qvDedrviBTkX+qHtz" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.2.1/dist/js/coreui.bundle.min.js" integrity="sha384-TAGm5uuO3fkc44Hog6/8rCxVuk1QQSmBJQFwLDS0V0CCFCxK6AErZBGKPhaJcrVR" crossorigin="anonymous"></script> --}}
    {{-- <livewire:scripts /> --}}
    @stack('after-scripts')
    <script>
        window.addEventListener( "pageshow", function ( event ) {
        var historyTraversal = event.persisted ||
                                ( typeof window.performance != "undefined" &&
                                    window.performance.navigation.type === 2 );
        if ( historyTraversal ) {
            // Handle page restore.
            window.location.reload();
        }
        });
    </script>

</body>
</html>

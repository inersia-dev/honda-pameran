<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Honda Balikpapan')">
    @yield('meta')

    @stack('before-styles')
    <link href="{{ '/css/backend.css' }}" rel="stylesheet">
    <style>
        .c-sidebar {
            background-color: #29363d;
        }

        .c-sidebar .c-sidebar-nav-link.c-active .c-sidebar-nav-icon {
            color: #ED1B25;
        }
    </style>
    <livewire:styles />
    @stack('after-styles')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body class="c-app">
    @include('pusat.includes.sidebar')

    <div class="c-wrapper c-fixed-components">
        @include('pusat.includes.header')

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

        @include('pusat.includes.footer')
    </div><!--c-wrapper-->

    @stack('before-scripts')
    <script src="{{ '/js/manifest.js' }}"></script>
    <script src="{{ '/js/vendor.js' }}"></script>
    <script src="{{ '/js/backend.js' }}"></script>
    <livewire:scripts />
    @stack('after-scripts')
</body>
</html>

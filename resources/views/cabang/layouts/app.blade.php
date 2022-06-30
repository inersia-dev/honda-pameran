<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Honda Balikpapan') }} :: Dealer</title>

    <!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ '/css/backend.css' }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>
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

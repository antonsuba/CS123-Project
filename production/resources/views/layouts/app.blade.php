<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="/css/semantic.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
<div class="ui one column grid">
    <div class="ui top fixed menu  borderless"><!-- Wild Card Title Bar -->
        <div class="item">
            <h1 class="head-font title-navbar">
                <span class="color-yellow title-mini">W</span><span class="color-red title-mini">I</span><span class="color-blue title-mini">L</span><span class="color-green title-mini">D</span>
                <span class="title-mini">CARD</span>
            </h1>
        </div>
    </div>
</div>

    @yield('content')

    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous">
    </script>

    @yield('scripts')

</body>
</html>
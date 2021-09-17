<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Project Name</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Auth page">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link type="text/css" href="{{ asset('volt_assets/css/volt.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <!-- Section -->
        @yield('content')
    </main>
    <!-- Volt JS -->
    <script src="{{ asset('volt_assets/js/volt.js') }}"></script>
</body>

</html>

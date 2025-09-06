<!DOCTYPE html>
<html lang="en">

<head>
    <title>TrackIn - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main>
        @yield('content')
    </main>
</body>

</html>